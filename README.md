# Đồ án học phần: Hệ thống quản lý giao việc

## Thông tin sinh viên

- Họ và tên: Phạm Hoàng Việt
- MSSV: 170123377
- Lớp: DX23TT10
- Định danh repo: vietph080186
- Repo: cn-DX23TT10-phamhoangviet-vietph080186-svg

## Mô tả dự án

Hệ thống quản lý giao việc là ứng dụng web hỗ trợ tổ chức quản lý dự án, phân công nhiệm vụ, theo dõi trạng thái công việc và trao đổi thông tin trong quá trình thực hiện.

Dự án sử dụng Laravel. Mã nguồn chính hiện nằm trong thư mục `scr`.

## Công nghệ sử dụng

- PHP
- Laravel
- MySQL
- Blade
- Bootstrap hoặc CSS đơn giản
- JavaScript khi cần thiết

## Chức năng dự kiến

- Quản lý người dùng, vai trò và phòng ban.
- Quản lý dự án.
- Quản lý danh mục công việc.
- Giao việc cho nhân viên.
- Theo dõi trạng thái và mức độ ưu tiên công việc.
- Bình luận và ghi nhận lịch sử thay đổi trạng thái.
- Thông báo cho người dùng.
- Báo cáo và thống kê cơ bản.

## Cấu trúc thư mục

```text
.
├── README.md
├── TODO.md
├── assets/
├── progress-report/
├── setup/
│   └── database/
├── scr/
└── thesis/
```

## Thiết lập cơ sở dữ liệu

1. Cấu hình kết nối cơ sở dữ liệu trong `scr/.env`.
2. Chạy migration và seed dữ liệu mẫu:

```bash
cd scr
php artisan migrate:fresh --seed
```

Nếu chỉ muốn chạy thêm dữ liệu mẫu sau khi đã migrate:

```bash
cd scr
php artisan db:seed
```

## Tài khoản demo

| Vai trò | Email | Mật khẩu |
| --- | --- | --- |
| Admin | admin@example.com | password |
| Manager | manager@example.com | password |
| Staff | staff@example.com | password |

## Tệp SQL tham khảo

- `setup/database/schema.sql`: cấu trúc bảng cơ sở dữ liệu chính.
- `setup/database/seed.sql`: dữ liệu mẫu tương ứng với seeder Laravel.

## Trạng thái hiện tại

Đã xây dựng nền tảng cơ sở dữ liệu gồm migration, model, quan hệ Eloquent và dữ liệu mẫu cho hệ thống quản lý giao việc. Các chức năng CRUD và giao diện sẽ được thực hiện ở giai đoạn sau.
