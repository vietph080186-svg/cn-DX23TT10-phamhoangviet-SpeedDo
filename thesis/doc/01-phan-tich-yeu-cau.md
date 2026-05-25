# 01. Phân tích yêu cầu

## Mục đích dự án

Hệ thống quản lý giao việc SpeedDo hỗ trợ tổ chức phân công nhiệm vụ, theo dõi tiến độ và kiểm soát kết quả thực hiện. Ứng dụng giúp người quản lý nắm tình trạng công việc, đồng thời giúp nhân viên tiếp nhận và báo cáo kết quả rõ ràng.

## Người dùng mục tiêu

- Admin quản trị tài khoản, phòng ban và theo dõi toàn bộ hệ thống.
- Manager quản lý dự án, danh mục, giao việc và duyệt kết quả liên quan.
- Staff tiếp nhận công việc, cập nhật trạng thái, gửi kết quả và trao đổi.

## Yêu cầu chức năng

- Đăng nhập, đăng xuất và điều hướng dashboard theo vai trò.
- Quản lý người dùng, phòng ban, dự án và danh mục công việc.
- Tạo, sửa, xem, xóa, tìm kiếm và lọc công việc theo quyền.
- Giao công việc cho nhân viên và gắn công việc với phòng ban, dự án.
- Cập nhật trạng thái theo luồng `Mới giao`, `Đang làm`, `Chờ duyệt`, `Hoàn thành` và `Cần sửa lại`.
- Ghi nhận bình luận, kết quả thực hiện và lịch sử trạng thái.
- Hiển thị Kanban, thông báo trong hệ thống và báo cáo cơ bản.

## Yêu cầu phi chức năng

- Giao diện tiếng Việt, nhất quán với nhận diện SpeedDo.
- Phân quyền rõ ràng, ngăn truy cập trái phép vào dữ liệu và thao tác quản trị.
- Dữ liệu được lưu trong cơ sở dữ liệu và có dữ liệu mẫu để trình diễn.
- Ứng dụng có thể chạy trong môi trường phát triển Laravel thông dụng.

## Phạm vi

Đề tài tập trung vào quy trình quản lý giao việc nội bộ. Các chức năng nâng cao như thông báo thời gian thực, xuất báo cáo nâng cao và Kanban kéo thả được định hướng phát triển sau.
