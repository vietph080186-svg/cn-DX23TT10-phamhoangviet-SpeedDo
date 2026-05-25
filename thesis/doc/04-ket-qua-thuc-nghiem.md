# 04. Kết quả thực nghiệm

## Chức năng đã hoàn thành

- Giao diện đăng nhập và dashboard theo vai trò.
- Quản lý người dùng, phòng ban, dự án, danh mục và công việc.
- Giao việc, cập nhật trạng thái, bình luận và lịch sử trạng thái.
- Thông báo trong hệ thống cho các sự kiện nghiệp vụ chính.
- Bảng Kanban theo trạng thái và bộ lọc cơ bản.
- Báo cáo tổng quan, báo cáo công việc, người dùng và dự án.

## Trường hợp kiểm thử

| STT | Nội dung kiểm thử | Kết quả mong đợi | Trạng thái |
| --- | --- | --- | --- |
| 1 | Đăng nhập bằng tài khoản mẫu | Mở đúng dashboard theo vai trò | Đạt |
| 2 | Admin quản lý người dùng và phòng ban | Thao tác được phép thực hiện thành công | Đạt |
| 3 | Manager tạo và giao công việc | Staff nhìn thấy công việc được giao | Đạt |
| 4 | Staff gửi công việc chờ duyệt | Trạng thái và lịch sử được cập nhật | Đạt |
| 5 | Manager duyệt hoàn thành hoặc yêu cầu sửa | Staff nhận được thông báo phù hợp | Đạt |
| 6 | Mở bảng Kanban | Công việc hiển thị theo trạng thái | Đạt |
| 7 | Mở báo cáo bằng từng vai trò | Dữ liệu được giới hạn theo quyền | Đạt |

## Đánh giá

SpeedDo đáp ứng các nghiệp vụ chính của bài toán quản lý giao việc: phân quyền, quản lý dữ liệu nền tảng, giao nhiệm vụ, theo dõi quy trình và tổng hợp kết quả. Giao diện tiếng Việt giúp việc trình diễn và kiểm tra chức năng thuận tiện.

## Hạn chế và hướng phát triển

- Bảng Kanban hiện chuyển trạng thái bằng thao tác nút, chưa hỗ trợ kéo thả.
- Thông báo đang lưu trong hệ thống, chưa cập nhật thời gian thực.
- Báo cáo có thể được mở rộng thêm chức năng xuất tệp và biểu đồ chi tiết.
