<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Project;
use App\Models\Role;
use App\Models\Task;
use App\Models\TaskCategory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'Admin',
            'description' => 'Quản trị toàn hệ thống',
        ]);

        $managerRole = Role::create([
            'name' => 'Manager',
            'description' => 'Quản lý dự án và giao việc',
        ]);

        $staffRole = Role::create([
            'name' => 'Staff',
            'description' => 'Nhân viên thực hiện công việc',
        ]);

        $itDepartment = Department::create(['name' => 'Phòng Công nghệ thông tin', 'status' => 'active']);
        $salesDepartment = Department::create(['name' => 'Phòng Kinh doanh', 'status' => 'active']);
        $marketingDepartment = Department::create(['name' => 'Phòng Marketing', 'status' => 'active']);

        $admin = User::create([
            'role_id' => $adminRole->id,
            'department_id' => $itDepartment->id,
            'name' => 'admin',
            'full_name' => 'Quản trị viên',
            'email' => 'admin@example.com',
            'phone' => '0901000001',
            'status' => 'active',
            'password' => Hash::make('password'),
        ]);

        $manager = User::create([
            'role_id' => $managerRole->id,
            'department_id' => $salesDepartment->id,
            'name' => 'manager',
            'full_name' => 'Người quản lý',
            'email' => 'manager@example.com',
            'phone' => '0901000002',
            'status' => 'active',
            'password' => Hash::make('password'),
        ]);

        $staff = User::create([
            'role_id' => $staffRole->id,
            'department_id' => $marketingDepartment->id,
            'name' => 'staff',
            'full_name' => 'Nhân viên',
            'email' => 'staff@example.com',
            'phone' => '0901000003',
            'status' => 'active',
            'password' => Hash::make('password'),
        ]);

        $internalProject = Project::create([
            'name' => 'Triển khai hệ thống giao việc nội bộ',
            'description' => 'Xây dựng nền tảng quản lý và theo dõi công việc cho doanh nghiệp.',
            'start_date' => '2026-05-01',
            'end_date' => '2026-06-30',
            'status' => 'active',
        ]);

        $websiteProject = Project::create([
            'name' => 'Cập nhật website công ty',
            'description' => 'Cải thiện nội dung, giao diện và quy trình đăng tin.',
            'start_date' => '2026-05-10',
            'end_date' => '2026-06-15',
            'status' => 'active',
        ]);

        $analysisCategory = TaskCategory::create([
            'name' => 'Phân tích',
            'description' => 'Công việc phân tích yêu cầu và quy trình.',
        ]);

        $developmentCategory = TaskCategory::create([
            'name' => 'Phát triển',
            'description' => 'Công việc lập trình và cấu hình hệ thống.',
        ]);

        $testingCategory = TaskCategory::create([
            'name' => 'Kiểm thử',
            'description' => 'Công việc kiểm tra chất lượng và nghiệm thu.',
        ]);

        Task::create([
            'project_id' => $internalProject->id,
            'task_category_id' => $analysisCategory->id,
            'creator_id' => $manager->id,
            'assignee_id' => $staff->id,
            'title' => 'Khảo sát quy trình giao việc hiện tại',
            'description' => 'Thu thập thông tin về cách giao việc và theo dõi tiến độ.',
            'status' => 'in_progress',
            'priority' => 'high',
            'due_date' => '2026-05-25',
        ]);

        Task::create([
            'project_id' => $internalProject->id,
            'task_category_id' => $developmentCategory->id,
            'creator_id' => $admin->id,
            'assignee_id' => $manager->id,
            'title' => 'Thiết kế cơ sở dữ liệu ban đầu',
            'description' => 'Xác định bảng, khóa ngoại và dữ liệu mẫu cho hệ thống.',
            'status' => 'review',
            'priority' => 'urgent',
            'due_date' => '2026-05-22',
        ]);

        Task::create([
            'project_id' => $websiteProject->id,
            'task_category_id' => $testingCategory->id,
            'creator_id' => $manager->id,
            'assignee_id' => $staff->id,
            'title' => 'Kiểm tra nội dung trang giới thiệu',
            'description' => 'Rà soát lỗi chính tả và thông tin hiển thị trên website.',
            'status' => 'new',
            'priority' => 'medium',
            'due_date' => '2026-05-28',
        ]);
    }
}
