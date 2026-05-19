INSERT INTO roles (id, name, description, created_at, updated_at) VALUES
(1, 'Admin', 'Quản trị toàn hệ thống', NOW(), NOW()),
(2, 'Manager', 'Quản lý dự án và giao việc', NOW(), NOW()),
(3, 'Staff', 'Nhân viên thực hiện công việc', NOW(), NOW());

INSERT INTO departments (id, name, description, created_at, updated_at) VALUES
(1, 'Phòng Công nghệ thông tin', NULL, NOW(), NOW()),
(2, 'Phòng Kinh doanh', NULL, NOW(), NOW()),
(3, 'Phòng Marketing', NULL, NOW(), NOW());

INSERT INTO users (id, role_id, department_id, name, full_name, email, phone, status, password, created_at, updated_at) VALUES
(1, 1, 1, 'admin', 'Quản trị viên', 'admin@example.com', '0901000001', 'active', '$2y$10$p2Xfbl6FoECPIZkZWGStke64dwuMbrKV9slF6c4bAJIWzhnogQKHG', NOW(), NOW()),
(2, 2, 2, 'manager', 'Người quản lý', 'manager@example.com', '0901000002', 'active', '$2y$10$p2Xfbl6FoECPIZkZWGStke64dwuMbrKV9slF6c4bAJIWzhnogQKHG', NOW(), NOW()),
(3, 3, 3, 'staff', 'Nhân viên', 'staff@example.com', '0901000003', 'active', '$2y$10$p2Xfbl6FoECPIZkZWGStke64dwuMbrKV9slF6c4bAJIWzhnogQKHG', NOW(), NOW());

INSERT INTO projects (id, name, description, start_date, end_date, status, created_at, updated_at) VALUES
(1, 'Triển khai hệ thống giao việc nội bộ', 'Xây dựng nền tảng quản lý và theo dõi công việc cho doanh nghiệp.', '2026-05-01', '2026-06-30', 'active', NOW(), NOW()),
(2, 'Cập nhật website công ty', 'Cải thiện nội dung, giao diện và quy trình đăng tin.', '2026-05-10', '2026-06-15', 'active', NOW(), NOW());

INSERT INTO task_categories (id, name, description, created_at, updated_at) VALUES
(1, 'Phân tích', 'Công việc phân tích yêu cầu và quy trình.', NOW(), NOW()),
(2, 'Phát triển', 'Công việc lập trình và cấu hình hệ thống.', NOW(), NOW()),
(3, 'Kiểm thử', 'Công việc kiểm tra chất lượng và nghiệm thu.', NOW(), NOW());

INSERT INTO tasks (id, project_id, task_category_id, creator_id, assignee_id, title, description, status, priority, due_date, created_at, updated_at) VALUES
(1, 1, 1, 2, 3, 'Khảo sát quy trình giao việc hiện tại', 'Thu thập thông tin về cách giao việc và theo dõi tiến độ.', 'in_progress', 'high', '2026-05-25', NOW(), NOW()),
(2, 1, 2, 1, 2, 'Thiết kế cơ sở dữ liệu ban đầu', 'Xác định bảng, khóa ngoại và dữ liệu mẫu cho hệ thống.', 'review', 'urgent', '2026-05-22', NOW(), NOW()),
(3, 2, 3, 2, 3, 'Kiểm tra nội dung trang giới thiệu', 'Rà soát lỗi chính tả và thông tin hiển thị trên website.', 'new', 'medium', '2026-05-28', NOW(), NOW());
