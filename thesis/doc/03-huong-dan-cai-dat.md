# 03. Hướng dẫn cài đặt

## Phần mềm cần có

- PHP và Composer.
- MySQL.
- Git.
- Trình duyệt web hiện đại.

## Tải mã nguồn

```bash
git clone <duong-dan-repository>
cd cn-DX23TT10-phamhoangviet-SpeedDo/scr
```

## Cài đặt ứng dụng

```bash
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```

Trước khi chạy migration, cấu hình kết nối MySQL trong tệp `.env` của môi trường cục bộ.

## Truy cập

Mở trình duyệt tại:

```text
http://127.0.0.1:8000/login
```

## Tài khoản dùng thử

| Vai trò | Email | Mật khẩu |
| --- | --- | --- |
| Quản trị viên | admin@example.com | password |
| Quản lý | manager@example.com | password |
| Nhân viên | staff@example.com | password |

## Kiểm tra chức năng chính

- Đăng nhập bằng từng vai trò và kiểm tra dashboard tương ứng.
- Kiểm tra quản lý dự án, danh mục và công việc theo quyền.
- Thực hiện quy trình giao việc, gửi duyệt và duyệt kết quả.
- Mở Kanban, thông báo và báo cáo để kiểm tra dữ liệu hiển thị.
