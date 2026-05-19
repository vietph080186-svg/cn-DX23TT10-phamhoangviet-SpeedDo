# Đồ án học phần: Xây dựng Hệ thống quản lý giao việc

## Thông tin sinh viên

- Họ và tên: Phạm Hoàng Việt
- MSSV: 170123377
- Lớp: DX23TT10
- Định danh repo: vietph080186
- Repo: cn-DX23TT10-phamhoangviet-vietph080186-svg

## Mô tả dự án

Hệ thống quản lý giao việc là ứng dụng web hỗ trợ tổ chức quản lý công việc, phân công nhiệm vụ và theo dõi tiến độ thực hiện. Người quản lý có thể tạo công việc, giao cho nhân viên, theo dõi trạng thái, xem kết quả và thống kê. Người dùng có thể cập nhật trạng thái công việc, gửi kết quả và trao đổi thông tin liên quan đến công việc.

Dự án đang ở giai đoạn chuẩn bị cho phát triển bằng Laravel. Repo hiện tập trung vào cấu trúc thư mục, kế hoạch thực hiện, tài liệu và cấu hình ban đầu. Mã nguồn Laravel dự kiến đặt trong thư mục `src/task-manager`.

## Công nghệ dự kiến

- PHP
- MySQL
- Laravel
- Blade
- Bootstrap hoặc CSS đơn giản
- JavaScript khi cần thiết
- Git và GitHub

## Chức năng chính

- Quản lý người dùng.
- Quản lý danh mục công việc hoặc dự án.
- Quản lý giao việc.
- Cập nhật tiến độ công việc.
- Gửi kết quả thực hiện.
- Bình luận hoặc trao đổi thông tin theo công việc.
- Báo cáo và thống kê.

## Cấu trúc thư mục

```text
.
├── README.md
├── TODO.md
├── .gitignore
├── assets/
├── progress-report/
├── setup/
│   └── database/
├── src/
│   └── task-manager/
└── thesis/
    ├── abs/
    ├── doc/
    ├── html/
    ├── pdf/
    └── refs/
```

## Kế hoạch cài đặt

1. Cài đặt PHP, Composer, MySQL và Git.
2. Tạo project Laravel trong thư mục `src/task-manager`.
3. Cấu hình file `.env` cho kết nối MySQL.
4. Thiết kế cơ sở dữ liệu cho người dùng, dự án, công việc, phân công và báo cáo.
5. Tạo migration, model, controller và giao diện Blade.
6. Kiểm thử từng chức năng trước khi hoàn thiện báo cáo.

## Cách chạy dự kiến

Sau khi tạo project Laravel trong thư mục `src/task-manager`, có thể chạy theo các bước:

```bash
cd src/task-manager
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Sau đó mở trình duyệt tại địa chỉ:

```text
http://127.0.0.1:8000
```

## Quản lý tiến độ

- Công việc cần làm được ghi trong `TODO.md`.
- Báo cáo tiến độ được lưu trong thư mục `progress-report`.
- Tài liệu đồ án được lưu trong thư mục `thesis`.
- File liên quan đến cơ sở dữ liệu ban đầu được lưu trong `setup/database`.

## Thông tin liên hệ

- Sinh viên thực hiện: Phạm Hoàng Việt
- Lớp: DX23TT10
- MSSV: 170123377
- Định danh repo: vietph080186
