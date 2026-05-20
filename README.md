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
- CSS đơn giản

## Chức năng hiện có

- Đăng nhập và đăng xuất bằng session Laravel.
- Điều hướng dashboard theo vai trò Admin, Manager, Staff.
- Dashboard Admin hiển thị tổng người dùng, phòng ban, dự án và công việc.
- Dashboard Manager hiển thị thống kê công việc đã tạo và được giao.
- Dashboard Staff hiển thị thống kê công việc cá nhân.
- Admin quản lý người dùng: danh sách, thêm, xem, sửa, xóa, tìm kiếm và lọc.
- Admin quản lý phòng ban: danh sách, thêm, xem, sửa, xóa, tìm kiếm và lọc.
- Chặn Manager và Staff truy cập trang quản lý người dùng, phòng ban.
- Nền tảng cơ sở dữ liệu cho vai trò, phòng ban, dự án, danh mục công việc, công việc, bình luận, lịch sử trạng thái và thông báo.

## Thiết lập cơ sở dữ liệu

1. Cấu hình kết nối cơ sở dữ liệu trong `scr/.env`.
2. Chạy migration và seed dữ liệu mẫu:

```bash
cd scr
php artisan migrate:fresh --seed
```

## Chạy ứng dụng

```bash
cd scr
php artisan serve
```

Sau đó mở trình duyệt tại:

```text
http://127.0.0.1:8000/login
```

## Tài khoản demo

| Vai trò | Email | Mật khẩu |
| --- | --- | --- |
| Admin | admin@example.com | password |
| Manager | manager@example.com | password |
| Staff | staff@example.com | password |

Chỉ tài khoản Admin được truy cập các trang:

- `http://127.0.0.1:8000/admin/users`
- `http://127.0.0.1:8000/admin/departments`

## Tệp SQL tham khảo

- `setup/database/schema.sql`: cấu trúc bảng cơ sở dữ liệu chính.
- `setup/database/seed.sql`: dữ liệu mẫu tương ứng với seeder Laravel.

## Trạng thái hiện tại

Đã hoàn thành nền tảng cơ sở dữ liệu, đăng nhập, đăng xuất, dashboard theo vai trò, quản lý người dùng và quản lý phòng ban. Các chức năng CRUD công việc sẽ được thực hiện ở giai đoạn sau.
