<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Project;
use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    private array $statuses = [
        'new' => 'Mới giao',
        'in_progress' => 'Đang làm',
        'review' => 'Chờ duyệt',
        'completed' => 'Hoàn thành',
        'overdue' => 'Quá hạn',
        'revision' => 'Cần sửa lại',
    ];

    private array $priorities = [
        'low' => 'Thấp',
        'medium' => 'Trung bình',
        'high' => 'Cao',
        'urgent' => 'Khẩn cấp',
    ];

    public function index(Request $request)
    {
        $tasks = $this->filteredTasks($request)->get();
        $stats = $this->summary($tasks);

        return view('reports.index', $this->baseData($request, [
            'stats' => $stats,
            'statusCounts' => $this->countsByStatus($tasks),
            'priorityCounts' => $this->countsByPriority($tasks),
        ]));
    }

    public function tasks(Request $request)
    {
        $tasks = $this->filteredTasks($request)->with(['project', 'assignee.department'])->get();

        return view('reports.tasks', $this->baseData($request, [
            'statusCounts' => $this->countsByStatus($tasks),
            'priorityCounts' => $this->countsByPriority($tasks),
            'projectCounts' => $tasks->groupBy('project.name')->map->count(),
            'assigneeCounts' => $tasks->groupBy('assignee.full_name')->map->count(),
            'departmentCounts' => $tasks->groupBy('assignee.department.name')->map->count(),
            'overdueCount' => $this->overdueCount($tasks),
            'totalTasks' => $tasks->count(),
        ]));
    }

    public function users(Request $request)
    {
        $tasks = $this->filteredTasks($request)->with(['assignee.department'])->get();
        $staffIds = $tasks->pluck('assignee_id')->filter()->unique();
        $staffUsers = User::with('department')->whereIn('id', $staffIds)->orderBy('full_name')->get();

        if ($this->isStaff()) {
            $staffUsers = User::with('department')->where('id', Auth::id())->get();
        }

        return view('reports.users', $this->baseData($request, [
            'staffUsers' => $staffUsers,
            'tasks' => $tasks,
        ]));
    }

    public function projects(Request $request)
    {
        $tasks = $this->filteredTasks($request)->with('project')->get();
        $projectIds = $tasks->pluck('project_id')->filter()->unique();
        $projects = Project::whereIn('id', $projectIds)->orderBy('name')->get();

        return view('reports.projects', $this->baseData($request, [
            'projectsReport' => $projects,
            'tasks' => $tasks,
        ]));
    }

    private function filteredTasks(Request $request): Builder
    {
        return $this->scopedTasks()
            ->when($request->from_date, fn ($query, $date) => $query->whereDate('due_date', '>=', $date))
            ->when($request->to_date, fn ($query, $date) => $query->whereDate('due_date', '<=', $date))
            ->when($request->project_id, fn ($query, $projectId) => $query->where('project_id', $projectId))
            ->when($request->assignee_id, fn ($query, $assigneeId) => $query->where('assignee_id', $assigneeId))
            ->when($request->status, function ($query, $status) {
                if ($status !== 'overdue') {
                    $query->where('status', $status);
                } else {
                    $query->whereDate('due_date', '<', today())->where('status', '!=', 'completed');
                }
            })
            ->when($request->priority, fn ($query, $priority) => $query->where('priority', $priority))
            ->when($request->department_id, function ($query, $departmentId) {
                $query->whereHas('assignee', fn ($userQuery) => $userQuery->where('department_id', $departmentId));
            });
    }

    private function scopedTasks(): Builder
    {
        $query = Task::query();

        if ($this->isManager()) {
            $query->where(function ($subQuery) {
                $subQuery->where('creator_id', Auth::id())
                    ->orWhere('assignee_id', Auth::id());
            });
        }

        if ($this->isStaff()) {
            $query->where('assignee_id', Auth::id());
        }

        return $query;
    }

    private function summary($tasks): array
    {
        $total = $tasks->count();
        $completed = $tasks->where('status', 'completed')->count();

        return [
            'total' => $total,
            'new' => $tasks->where('status', 'new')->count(),
            'in_progress' => $tasks->where('status', 'in_progress')->count(),
            'review' => $tasks->where('status', 'review')->count(),
            'completed' => $completed,
            'revision' => $tasks->where('status', 'revision')->count(),
            'overdue' => $this->overdueCount($tasks),
            'completionRate' => $total > 0 ? round($completed / $total * 100) : 0,
        ];
    }

    private function countsByStatus($tasks)
    {
        return collect($this->statuses)->map(fn ($label, $status) => [
            'label' => $label,
            'count' => $status === 'overdue' ? $this->overdueCount($tasks) : $tasks->where('status', $status)->count(),
        ]);
    }

    private function countsByPriority($tasks)
    {
        return collect($this->priorities)->map(fn ($label, $priority) => [
            'label' => $label,
            'count' => $tasks->where('priority', $priority)->count(),
        ]);
    }

    private function overdueCount($tasks): int
    {
        return $tasks->filter(fn ($task) => $task->due_date && $task->due_date->isPast() && $task->status !== 'completed')->count();
    }

    private function baseData(Request $request, array $extra = []): array
    {
        $staffRoleId = Role::where('name', 'Staff')->value('id');

        return array_merge([
            'statuses' => $this->statuses,
            'priorities' => $this->priorities,
            'projects' => Project::orderBy('name')->get(),
            'departments' => Department::orderBy('name')->get(),
            'staffUsers' => User::where('role_id', $staffRoleId)->orderBy('full_name')->get(),
            'request' => $request,
        ], $extra);
    }

    private function roleName(): string
    {
        return strtolower(Auth::user()->role?->name ?? '');
    }

    private function isManager(): bool
    {
        return $this->roleName() === 'manager';
    }

    private function isStaff(): bool
    {
        return $this->roleName() === 'staff';
    }
}
