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
        $adminRole = Role::updateOrCreate(
            ['name' => 'Admin'],
            ['description' => 'Quản trị toàn hệ thống'],
        );

        $managerRole = Role::updateOrCreate(
            ['name' => 'Manager'],
            ['description' => 'Quản lý dự án và giao việc'],
        );

        $staffRole = Role::updateOrCreate(
            ['name' => 'Staff'],
            ['description' => 'Nhân viên thực hiện công việc'],
        );

        $departments = [
            'Phòng Công nghệ thông tin' => 'Quản trị hệ thống, hỗ trợ kỹ thuật và phát triển các công cụ nội bộ.',
            'Phòng Kinh doanh' => 'Tìm kiếm khách hàng, chăm sóc cơ hội bán hàng và theo dõi doanh thu.',
            'Phòng Marketing' => 'Lập kế hoạch truyền thông, quảng bá sản phẩm và xây dựng hình ảnh công ty.',
        ];

        $departmentModels = [];

        foreach ($departments as $name => $description) {
            $departmentModels[$name] = Department::updateOrCreate(
                ['name' => $name],
                [
                    'description' => $description,
                    'status' => 'active',
                ],
            );
        }

        $itDepartment = $departmentModels['Phòng Công nghệ thông tin'];
        $salesDepartment = $departmentModels['Phòng Kinh doanh'];
        $marketingDepartment = $departmentModels['Phòng Marketing'];

        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'role_id' => $adminRole->id,
                'department_id' => $itDepartment->id,
                'name' => 'admin',
                'full_name' => 'Quản trị viên',
                'phone' => '0901000001',
                'status' => 'active',
                'password' => Hash::make('password'),
            ],
        );

        $manager = User::updateOrCreate(
            ['email' => 'manager@example.com'],
            [
                'role_id' => $managerRole->id,
                'department_id' => $salesDepartment->id,
                'name' => 'manager',
                'full_name' => 'Người quản lý',
                'phone' => '0901000002',
                'status' => 'active',
                'password' => Hash::make('password'),
            ],
        );

        $staff = User::updateOrCreate(
            ['email' => 'staff@example.com'],
            [
                'role_id' => $staffRole->id,
                'department_id' => $marketingDepartment->id,
                'name' => 'staff',
                'full_name' => 'Nhân viên',
                'phone' => '0901000003',
                'status' => 'active',
                'password' => Hash::make('password'),
            ],
        );

        $internalProject = Project::updateOrCreate(
            ['name' => 'Triển khai hệ thống giao việc nội bộ'],
            [
                'description' => 'Xây dựng nền tảng quản lý và theo dõi công việc cho doanh nghiệp.',
                'start_date' => '2026-05-01',
                'end_date' => '2026-06-30',
                'status' => 'active',
            ],
        );

        $websiteProject = Project::updateOrCreate(
            ['name' => 'Cập nhật website công ty'],
            [
                'description' => 'Cải thiện nội dung, giao diện và quy trình đăng tin.',
                'start_date' => '2026-05-10',
                'end_date' => '2026-06-15',
                'status' => 'active',
            ],
        );

        $analysisCategory = TaskCategory::updateOrCreate(
            ['name' => 'Phân tích'],
            [
                'description' => 'Công việc phân tích yêu cầu và quy trình.',
                'color' => '#2563eb',
                'status' => 'active',
            ],
        );

        $developmentCategory = TaskCategory::updateOrCreate(
            ['name' => 'Phát triển'],
            [
                'description' => 'Công việc lập trình và cấu hình hệ thống.',
                'color' => '#16a34a',
                'status' => 'active',
            ],
        );

        $testingCategory = TaskCategory::updateOrCreate(
            ['name' => 'Kiểm thử'],
            [
                'description' => 'Công việc kiểm tra chất lượng và nghiệm thu.',
                'color' => '#f59e0b',
                'status' => 'active',
            ],
        );

        Task::updateOrCreate(
            ['title' => 'Khảo sát quy trình giao việc hiện tại'],
            [
                'project_id' => $internalProject->id,
                'task_category_id' => $analysisCategory->id,
                'creator_id' => $manager->id,
                'assignee_id' => $staff->id,
                'department_id' => $staff->department_id,
                'description' => 'Thu thập thông tin về cách giao việc và theo dõi tiến độ.',
                'status' => 'in_progress',
                'priority' => 'high',
                'due_date' => '2026-05-25',
            ],
        );

        Task::updateOrCreate(
            ['title' => 'Thiết kế cơ sở dữ liệu ban đầu'],
            [
                'project_id' => $internalProject->id,
                'task_category_id' => $developmentCategory->id,
                'creator_id' => $admin->id,
                'assignee_id' => $staff->id,
                'department_id' => $staff->department_id,
                'description' => 'Xác định bảng, khóa ngoại và dữ liệu mẫu cho hệ thống.',
                'status' => 'review',
                'priority' => 'urgent',
                'due_date' => '2026-05-22',
            ],
        );

        Task::updateOrCreate(
            ['title' => 'Kiểm tra nội dung trang giới thiệu'],
            [
                'project_id' => $websiteProject->id,
                'task_category_id' => $testingCategory->id,
                'creator_id' => $manager->id,
                'assignee_id' => $staff->id,
                'department_id' => $staff->department_id,
                'description' => 'Rà soát lỗi chính tả và thông tin hiển thị trên website.',
                'status' => 'new',
                'priority' => 'medium',
                'due_date' => '2026-05-28',
            ],
        );
    }
}
