# 🛍️ Website Bán Hàng Thời Trang (Laravel)

## 📌 Giới thiệu

Đây là dự án website thương mại điện tử được xây dựng bằng **Laravel**, phục vụ cho việc bán sản phẩm thời trang (quần áo, phụ kiện,...).

Hệ thống hỗ trợ:

- Quản lý sản phẩm, danh mục
- Giỏ hàng, thanh toán
- Voucher giảm giá
- Dashboard thống kê cho admin

---

## 🚀 Công nghệ sử dụng

- **Backend:** Laravel (PHP)
- **Frontend:** Blade + TailwindCSS + Bootstrap
- **Database:** MySQL
- **Authentication:** Laravel Auth (custom)
- **Session:** Cart lưu bằng session

---

## 🧩 Chức năng chính

### 👤 Người dùng (Client)

- Đăng ký / Đăng nhập
- Xem danh sách sản phẩm
- Xem chi tiết sản phẩm
- Thêm vào giỏ hàng
- Cập nhật số lượng sản phẩm
- Thanh toán đơn hàng
- Áp dụng voucher
- Sao chép mã voucher

---

### 🛒 Giỏ hàng

- Lưu bằng session
- Cập nhật số lượng
- Kiểm tra tồn kho khi update
- Tính tổng tiền realtime

---

### 💳 Thanh toán

- Nhập thông tin nhận hàng
- Tạo đơn hàng + order items
- Trừ số lượng sản phẩm trong kho
- Sử dụng transaction để tránh lỗi

---

### 🎟️ Voucher

- Hỗ trợ:
    - Giảm theo %
    - Giảm theo số tiền

- Có điều kiện đơn tối thiểu

---

### 🛠️ Admin Dashboard

- Tổng sản phẩm
- Tổng danh mục
- Tổng đơn hàng
- Lợi nhuận

👉 Công thức lợi nhuận:

```
Lợi nhuận = (Giá bán - Giá nhập) * số lượng - voucher
```

---

### 📊 Thống kê

- Đơn hàng gần đây
- Sản phẩm mới
- Sản phẩm sắp hết hàng (stock < 5)

---

app/
├── Http/
│ ├── Controllers/
│ │ ├── Client/ # Xử lý logic phía người dùng (frontend)
│ │ │ ├── CartController.php
│ │ │ │ - Quản lý giỏ hàng (session)
│ │ │ │ - Thêm / sửa / xoá sản phẩm
│ │ │ │ - Kiểm tra tồn kho khi cập nhật
│ │ │ │
│ │ │ ├── CheckoutController.php
│ │ │ │ - Xử lý thanh toán
│ │ │ │ - Tạo Order + OrderItem
│ │ │ │ - Tính tổng tiền
│ │ │ │ - Trừ số lượng sản phẩm (stock)
│ │ │ │ - Sử dụng Transaction để tránh lỗi giữa chừng
│ │ │ │
│ │ │ └── AuthController.php
│ │ │ - Đăng ký / đăng nhập / đăng xuất
│ │ │ - Hash password
│ │ │ - Bảo mật session (regenerate)
│ │ │
│ │ └── DashboardController.php # Controller phía admin
│ │ - Thống kê hệ thống
│ │ - Tính lợi nhuận:
│ │ (giá bán - giá nhập) \* số lượng - voucher
│ │ - Lấy:
│ │ + Đơn hàng mới
│ │ + Sản phẩm mới
│ │ + Sản phẩm sắp hết hàng (stock < 5)
│
├── Models/ # Tầng làm việc với database (Eloquent ORM)
│ ├── Product.php
│ │ - Thông tin sản phẩm
│ │ - Field quan trọng:
│ │ + price (giá bán)
│ │ + cost_price (giá nhập)
│ │ + stock (tồn kho)
│ │
│ ├── Order.php
│ │ - Đơn hàng
│ │ - Chứa tổng tiền, trạng thái, voucher
│ │ - Quan hệ: hasMany(OrderItem)
│ │
│ ├── OrderItem.php
│ │ - Chi tiết đơn hàng
│ │ - Lưu snapshot tại thời điểm mua:
│ │ + price
│ │ + cost_price
│ │ + quantity
│ │
│ └── Voucher.php
│ - Mã giảm giá
│ - Hỗ trợ:
│ + Giảm theo %
│ + Giảm theo tiền
│ - Có điều kiện đơn tối thiểu (min_order)
│
resources/
├── views/
│ ├── client/ # Giao diện người dùng (frontend)
│ │ - Trang chủ, sản phẩm, giỏ hàng, checkout
│ │ - Hiển thị voucher
│ │ - Sử dụng Blade + TailwindCSS
│ │
│ └── dashboard.blade.php # Giao diện admin
│ - Hiển thị thống kê
│ - Danh sách đơn hàng
│ - Sản phẩm mới
│ - Sản phẩm sắp hết hàng
│ - Có tương tác click (đi tới chi tiết)

## ⚙️ Cài đặt

### 1. Clone project

```bash
git clone <repo-url>
cd project
```

---

### 2. Cài đặt package

```bash
composer install
npm install
```

---

### 3. Cấu hình môi trường

```bash
cp .env.example .env
php artisan key:generate
```

---

### 4. Cấu hình database

Trong `.env`:

```
DB_DATABASE=shop_fashion
DB_USERNAME=root
DB_PASSWORD=
```

---

### 5. Chạy migrate

```bash
php artisan migrate
```

---

### 6. Chạy server

```bash
composer run dev
```

---

## 🔐 Phân quyền

- **Admin**
    - Quản lý toàn bộ hệ thống

- **User**
    - Mua hàng

Middleware:

```
auth
admin
```

---

## ⚠️ Các vấn đề đã xử lý

- ✔️ Kiểm tra tồn kho khi thêm/cập nhật giỏ hàng
- ✔️ Tránh lỗi dữ liệu khi checkout bằng transaction
- ✔️ Fix lỗi route admin
- ✔️ Fix overflow total_price
- ✔️ Fix logic tính lợi nhuận

---

## 💡 Hướng phát triển

- Thanh toán online (VNPay, Momo)
- Thống kê biểu đồ (Chart.js)
- Realtime stock
- Wishlist
- Đánh giá sản phẩm

---

## 📄 License

Dự án phục vụ mục đích học tập.
