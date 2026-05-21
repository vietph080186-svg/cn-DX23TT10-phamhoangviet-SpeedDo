<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /**
     * A basic test example.
     */
    public function test_home_page_redirects_to_dashboard(): void
    {
        $response = $this->get('/');

        $response->assertRedirect('/dashboard');
    }

    public function test_staff_old_task_link_redirects_to_my_task_when_assigned(): void
    {
        $staff = User::where('email', 'staff@example.com')->firstOrFail();
        $task = Task::where('assignee_id', $staff->id)->firstOrFail();

        $response = $this->actingAs($staff)->get(route('tasks.show', $task));

        $response->assertRedirect(route('my-tasks.show', $task));
    }

    public function test_staff_cannot_view_task_assigned_to_another_user(): void
    {
        $staffRole = Role::where('name', 'Staff')->firstOrFail();
        $department = Department::firstOrFail();
        $staff = User::where('email', 'staff@example.com')->firstOrFail();
        $otherStaff = User::create([
            'role_id' => $staffRole->id,
            'department_id' => $department->id,
            'name' => 'staff2',
            'full_name' => 'Nhân viên 2',
            'email' => 'staff2@example.com',
            'status' => 'active',
            'password' => Hash::make('password'),
        ]);

        $task = Task::firstOrFail()->replicate();
        $task->assignee_id = $otherStaff->id;
        $task->save();

        $response = $this->actingAs($staff)->get(route('tasks.show', $task));

        $response->assertForbidden();
    }
}
