# Checklist kiểm thử thủ công

## 1. Kiểm thử môi trường

- [ ] Kiểm tra máy có PHP, Composer, MySQL và các extension PHP cần thiết.
- [ ] Chạy `cd scr` và `composer install` thành công.
- [ ] Kiểm tra file `.env` đã cấu hình đúng database, app key và môi trường local.
- [ ] Chạy `php artisan key:generate` khi cài mới.
- [ ] Chạy `php artisan serve` và mở được `http://127.0.0.1:8000/login`.

## 2. Kiểm thử cơ sở dữ liệu

- [ ] Chạy `php artisan migrate:fresh --seed` thành công.
- [ ] Kiểm tra có đủ vai trò Admin, Manager, Staff.
- [ ] Kiểm tra có dữ liệu mẫu phòng ban, dự án, danh mục và công việc.
- [ ] Kiểm tra các khóa ngoại không gây lỗi khi xem danh sách và chi tiết.
- [ ] Kiểm tra dữ liệu mẫu đăng nhập được bằng tài khoản demo.

## 3. Kiểm thử đăng nhập

- [ ] Đăng nhập Admin bằng `admin@example.com` / `password`.
- [ ] Đăng nhập Manager bằng `manager@example.com` / `password`.
- [ ] Đăng nhập Staff bằng `staff@example.com` / `password`.
- [ ] Nhập sai email hoặc mật khẩu và kiểm tra thông báo lỗi.
- [ ] Bỏ trống email, mật khẩu và kiểm tra lỗi validate.
- [ ] Đăng xuất và kiểm tra quay về trang đăng nhập.

## 4. Kiểm thử phân quyền

- [ ] Guest không truy cập được `/dashboard`, `/tasks`, `/kanban`, `/reports`, `/notifications`.
- [ ] Admin truy cập được quản lý người dùng, phòng ban, dự án, danh mục, công việc, Kanban, báo cáo.
- [ ] Manager không truy cập được `/admin/users` và `/admin/departments`.
- [ ] Manager truy cập được dự án, danh mục, công việc, Kanban và báo cáo liên quan.
- [ ] Staff không truy cập được trang thêm, sửa, xóa công việc.
- [ ] Staff chỉ xem được công việc được giao cho mình.
- [ ] Người dùng không xem hoặc đánh dấu đã đọc thông báo của người khác.

## 5. Kiểm thử quản lý người dùng

- [ ] Admin mở danh sách người dùng.
- [ ] Thêm người dùng mới với đầy đủ họ tên, email, mật khẩu, vai trò, phòng ban, trạng thái.
- [ ] Kiểm tra lỗi khi bỏ trống dữ liệu bắt buộc.
- [ ] Kiểm tra lỗi email sai định dạng hoặc trùng email.
- [ ] Sửa thông tin người dùng và lưu thành công.
- [ ] Đổi mật khẩu khi sửa người dùng.
- [ ] Không nhập mật khẩu khi sửa và kiểm tra mật khẩu cũ không bị mất.
- [ ] Xóa người dùng không phải tài khoản đang đăng nhập.
- [ ] Kiểm tra không thể xóa chính tài khoản đang đăng nhập.

## 6. Kiểm thử quản lý phòng ban

- [ ] Admin xem danh sách phòng ban.
- [ ] Thêm phòng ban mới.
- [ ] Kiểm tra lỗi khi bỏ trống tên phòng ban.
- [ ] Kiểm tra lỗi khi nhập tên phòng ban trùng.
- [ ] Sửa tên, mô tả, trạng thái phòng ban.
- [ ] Xóa phòng ban chưa có người dùng.
- [ ] Kiểm tra không thể xóa phòng ban đang có người dùng.

## 7. Kiểm thử quản lý dự án

- [ ] Admin hoặc Manager xem danh sách dự án.
- [ ] Thêm dự án mới với tên, ngày bắt đầu, ngày kết thúc, trạng thái.
- [ ] Kiểm tra lỗi khi bỏ trống tên hoặc trạng thái.
- [ ] Kiểm tra lỗi ngày kết thúc trước ngày bắt đầu.
- [ ] Sửa thông tin dự án.
- [ ] Xóa dự án chưa có công việc.
- [ ] Kiểm tra không thể xóa dự án đang có công việc.

## 8. Kiểm thử quản lý danh mục công việc

- [ ] Admin hoặc Manager xem danh sách danh mục.
- [ ] Thêm danh mục mới với tên, màu, mô tả, trạng thái.
- [ ] Kiểm tra lỗi khi bỏ trống tên danh mục.
- [ ] Kiểm tra lỗi khi nhập tên danh mục trùng.
- [ ] Sửa danh mục.
- [ ] Xóa danh mục chưa có công việc.
- [ ] Kiểm tra không thể xóa danh mục đang có công việc.

## 9. Kiểm thử quản lý công việc

- [ ] Admin hoặc Manager xem danh sách công việc.
- [ ] Tìm kiếm và lọc theo dự án, người được giao, trạng thái, ưu tiên.
- [ ] Thêm công việc mới và giao cho Staff.
- [ ] Kiểm tra lỗi khi bỏ trống tiêu đề, dự án, người được giao, ưu tiên, trạng thái, hạn hoàn thành.
- [ ] Kiểm tra người được giao phải là Staff.
- [ ] Kiểm tra lỗi hạn hoàn thành trước ngày bắt đầu.
- [ ] Sửa công việc.
- [ ] Xóa công việc theo đúng quyền.
- [ ] Staff không thấy nút thêm, sửa, xóa công việc.

## 10. Kiểm thử quy trình trạng thái công việc

- [ ] Staff chuyển `new` sang `in_progress`.
- [ ] Staff chuyển `in_progress` sang `review`.
- [ ] Staff chuyển `revision` sang `in_progress`.
- [ ] Staff không chuyển được `new` sang `completed`.
- [ ] Staff không chuyển được `in_progress` sang `completed`.
- [ ] Staff không chuyển được `review` sang `completed`.
- [ ] Admin hoặc Manager chuyển `review` sang `completed`.
- [ ] Admin hoặc Manager chuyển `review` sang `revision`.
- [ ] Admin hoặc Manager chuyển `in_progress` sang `revision`.
- [ ] Mỗi lần đổi trạng thái đều cập nhật trạng thái công việc.
- [ ] Mỗi lần đổi trạng thái đều tạo lịch sử trong `task_status_logs`.
- [ ] Khi hoàn thành, `completed_at` có giá trị.
- [ ] Khi chuyển khỏi hoàn thành, `completed_at` được xóa.
- [ ] Kiểm tra thông báo được tạo khi giao việc, gửi duyệt, duyệt hoàn thành, yêu cầu sửa.

## 11. Kiểm thử bình luận

- [ ] Người có quyền xem công việc thêm được bình luận.
- [ ] Bỏ trống nội dung bình luận và kiểm tra lỗi validate.
- [ ] Nội dung bình luận dài quá giới hạn bị báo lỗi.
- [ ] Bình luận hiển thị đúng người gửi và thời gian.
- [ ] Người tạo và người được giao nhận thông báo khi có bình luận mới nếu không phải người vừa bình luận.

## 12. Kiểm thử Kanban

- [ ] Mở `/kanban` bằng Admin, Manager, Staff.
- [ ] Kiểm tra Staff chỉ thấy công việc của mình.
- [ ] Kiểm tra Manager chỉ thấy công việc liên quan.
- [ ] Kiểm tra các cột trạng thái hiển thị đúng.
- [ ] Dùng nút trên thẻ Kanban để chuyển trạng thái hợp lệ.
- [ ] Kiểm tra các nút không cho phép chuyển trạng thái sai quy trình.
- [ ] Lọc theo dự án, người được giao, ưu tiên, trạng thái.
- [ ] Công việc quá hạn hiển thị khi `due_date < hôm nay` và trạng thái khác `completed`.

## 13. Kiểm thử báo cáo và thống kê

- [ ] Admin xem được dữ liệu toàn hệ thống.
- [ ] Manager chỉ xem dữ liệu công việc liên quan.
- [ ] Staff chỉ xem dữ liệu cá nhân.
- [ ] Kiểm tra báo cáo tổng quan.
- [ ] Kiểm tra báo cáo công việc theo trạng thái, ưu tiên, dự án, người được giao, phòng ban.
- [ ] Kiểm tra báo cáo hiệu suất người dùng.
- [ ] Kiểm tra báo cáo tiến độ dự án.
- [ ] Kiểm tra lọc theo ngày, dự án, phòng ban, người được giao, trạng thái, ưu tiên.
- [ ] Kiểm tra quá hạn được tính đúng: `due_date < hôm nay` và `status != completed`.

## 14. Kiểm thử thông báo

- [ ] Khi tạo công việc mới, Staff được giao nhận thông báo.
- [ ] Khi Staff gửi duyệt, người tạo công việc nhận thông báo.
- [ ] Khi Admin hoặc Manager duyệt hoàn thành, Staff nhận thông báo.
- [ ] Khi Admin hoặc Manager yêu cầu sửa, Staff nhận thông báo.
- [ ] Khi có bình luận mới, người liên quan nhận thông báo.
- [ ] Người dùng chỉ thấy thông báo của chính mình.
- [ ] Đánh dấu một thông báo đã đọc.
- [ ] Đánh dấu tất cả thông báo đã đọc.
- [ ] Thử đánh dấu thông báo của người khác bằng URL trực tiếp và kiểm tra bị chặn.

## 15. Kiểm thử bảo mật và truy cập cơ bản

- [ ] Các form POST, PATCH, DELETE có CSRF token.
- [ ] Guest bị chuyển về đăng nhập khi mở trang cần đăng nhập.
- [ ] URL quản trị trả về 403 hoặc chuyển hướng phù hợp với Manager và Staff.
- [ ] Staff không gửi request trực tiếp để sửa hoặc xóa công việc.
- [ ] Staff không xem chi tiết công việc không được giao.
- [ ] Dữ liệu nhập trong form hiển thị an toàn, không chạy HTML hoặc script.
- [ ] Link kết quả công việc yêu cầu đúng định dạng URL.

## 16. Kiểm thử cài đặt sạch

- [ ] Clone project vào thư mục mới.
- [ ] Chạy `cd scr`.
- [ ] Chạy `composer install`.
- [ ] Tạo `.env` từ `.env.example`.
- [ ] Cấu hình database mới.
- [ ] Chạy `php artisan key:generate`.
- [ ] Chạy `php artisan migrate:fresh --seed`.
- [ ] Chạy `php artisan serve`.
- [ ] Đăng nhập bằng 3 tài khoản demo.
- [ ] Mở các URL chính và kiểm tra không có lỗi 500.
