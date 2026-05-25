# 02. Thiết kế hệ thống

## Cấu trúc mã nguồn

```text
.
|-- README.md
|-- TODO.md
|-- progress-report/
|-- setup/database/
|-- scr/
|   |-- app/
|   |-- database/
|   |-- resources/views/
|   |-- routes/
|   `-- tests/
`-- thesis/doc/
```

Mã nguồn Laravel của SpeedDo nằm trong thư mục `scr`. Các tài liệu tiến độ, tài liệu đồ án và tệp SQL tham khảo được tổ chức riêng để phục vụ báo cáo và kiểm thử.

## Thành phần chính

- `scr/app/Models`: mô hình dữ liệu người dùng, phòng ban, dự án, công việc, bình luận, lịch sử và thông báo.
- `scr/app/Http/Controllers`: xử lý đăng nhập, dashboard, CRUD, Kanban, báo cáo và thông báo.
- `scr/resources/views`: giao diện Blade tiếng Việt theo vai trò sử dụng.
- `scr/routes/web.php`: định tuyến web và nhóm truy cập cần đăng nhập hoặc phân quyền.
- `scr/database/migrations` và `seeders`: cấu trúc cơ sở dữ liệu và dữ liệu trình diễn.

## Phân quyền

- Admin quản lý toàn hệ thống và dữ liệu nền tảng.
- Manager quản lý nghiệp vụ dự án, danh mục và công việc liên quan.
- Staff xem công việc được giao, cập nhật tiến độ và gửi kết quả.

## Luồng xử lý công việc

1. Admin hoặc Manager tạo công việc và giao cho Staff.
2. Staff chuyển công việc từ `Mới giao` sang `Đang làm`.
3. Staff nhập kết quả và gửi công việc sang `Chờ duyệt`.
4. Admin hoặc Manager duyệt `Hoàn thành` hoặc chuyển sang `Cần sửa lại`.
5. Hệ thống ghi lịch sử trạng thái và tạo thông báo cho người liên quan.

## Giao diện

Giao diện sử dụng bố cục sidebar, thanh tiêu đề và khu vực nội dung chính. Dashboard cung cấp lối tắt theo vai trò; Kanban trình bày công việc theo trạng thái; báo cáo tổng hợp dữ liệu phù hợp với quyền truy cập.
