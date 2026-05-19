# 02. Thiết kế hệ thống

## Cấu trúc thư mục

```text
.
├── README.md
├── TODO.md
├── index.html
├── assets/
├── progress-report/
├── setup/
├── src/
│   ├── main.js
│   └── style.css
└── thesis/
    ├── abs/
    ├── doc/
    ├── html/
    ├── pdf/
    └── refs/
```

## Các file chính

- `index.html`: chứa cấu trúc giao diện, khu vực hiển thị SVG và các điều khiển.
- `src/style.css`: định dạng giao diện, bố cục, màu sắc, trạng thái nút và hiển thị responsive.
- `src/main.js`: xử lý tương tác của người dùng và cập nhật thuộc tính của SVG.
- `README.md`: mô tả dự án, chức năng, cấu trúc thư mục và cách chạy.
- `TODO.md`: ghi lại các công việc đã hoàn thành và các công việc còn lại.

## Ý tưởng thiết kế giao diện

Giao diện được chia thành hai phần chính:

- Khu vực hiển thị SVG: nằm ở bên trái hoặc phía trên trên màn hình nhỏ, dùng để xem kết quả thay đổi.
- Bảng điều khiển: chứa các thành phần cho phép người dùng chọn hình dạng, màu sắc, kích thước, góc xoay và độ dày viền.

Thiết kế hướng đến sự đơn giản, dễ quan sát và phù hợp với người mới học. Các nút và thanh kéo được đặt rõ ràng để người dùng dễ thao tác.

## Luồng tương tác SVG

1. Người dùng chọn một điều khiển trên giao diện.
2. JavaScript nhận sự kiện từ điều khiển đó.
3. Giá trị hiện tại được cập nhật trong biến trạng thái.
4. Hàm cập nhật SVG thay đổi các thuộc tính như màu, hình dạng, kích thước, góc xoay và độ dày viền.
5. Dòng trạng thái được cập nhật để mô tả kết quả hiện tại.

Ví dụ:

- Khi người dùng chọn màu đỏ, JavaScript thay đổi thuộc tính `fill` của hình SVG.
- Khi người dùng kéo thanh kích thước, JavaScript thay đổi tỉ lệ hiển thị của nhóm SVG.
- Khi người dùng bấm “Đặt lại”, các giá trị trở về trạng thái mặc định.
