# Project: Website bán gấu bông
## Giới thiệu
### Thông tin cá nhân
  1. Họ và tên sinh viên: Phạm Hồng Đức
  2. MSV 23010338
  3. Lớp: K17-CNTT4
  4. Môn học: Thiết kế web nâng cao(TH3)
### Tóm tắt
Dự án xây dựng website bán hàng “Teddy Paradise” được phát triển dựa trên framework Laravel của PHP nhằm cung cấp một nền tảng thương mại điện tử đơn giản, dễ sử dụng. Ứng dụng tích hợp các công nghệ như Laravel Breeze để xác thực người dùng, Eloquent ORM để thao tác với cơ sở dữ liệu MySQL trên nền tảng cloud Aiven, cùng với Blade Template Engine và Tailwind CSS cho giao diện người dùng hiện đại, t# 🧸 Website Bán Gấu Bông - Teddy Paradise

## 👤 Thông tin sinh viên

- **Họ và tên:** Phạm Hồng Đức  
- **Mã sinh viên:** 23010338  
- **Lớp:** K17-CNTT4  
- **Môn học:** Thiết kế Web nâng cao (TH3)  

---

## 📝 Giới thiệu dự án

**Teddy Paradise** là một website thương mại điện tử đơn giản chuyên bán các sản phẩm gấu bông. Dự án được phát triển bằng **Laravel Framework** với thiết kế hiện đại, dễ sử dụng và tích hợp các công nghệ phổ biến:

- Laravel Breeze (Xác thực người dùng)
- Blade Template Engine (Giao diện)
- Tailwind CSS (Thiết kế responsive)
- Eloquent ORM (Tương tác CSDL)
- MySQL (Trên nền tảng cloud Aiven)
- Hệ thống bảo mật CSRF, session, validation, chống SQL Injection/XSS

Người dùng có thể duyệt sản phẩm, thêm vào giỏ hàng và thanh toán mà không cần đăng nhập. Quản trị viên có thể thực hiện các thao tác CRUD với sản phẩm.

---

## 🛠️ Công nghệ sử dụng

| Công nghệ | Mô tả |
|----------|-------|
| **Laravel (PHP)** | Backend framework chính |
| **Laravel Breeze** | Hệ thống xác thực, session |
| **Blade + Tailwind CSS** | Giao diện người dùng |
| **MySQL (Aiven)** | Cơ sở dữ liệu |
| **Eloquent ORM** | Truy vấn và xử lý dữ liệu |
| **Middleware** | Bảo mật CSRF, kiểm soát truy cập |

---

## 🧩 Sơ đồ hệ thống

### Sơ đồ khối
![Sơ đồ khối](https://github.com/user-attachments/assets/6061be48-5b07-4199-8fd2-467b983f99b9)

### Sơ đồ chức năng
![Sơ đồ chức năng](https://github.com/user-attachments/assets/973c2243-6ba7-4de1-bc1a-b401c84590f7)

---

## 🔄 Sơ đồ thuật toán

- **Duyệt sản phẩm:**  
  ![Browse Products](https://github.com/user-attachments/assets/2197b990-7727-4112-91ec-af36d21a97a1)

- **Thêm vào giỏ hàng:**  
  ![Add to Cart](https://github.com/user-attachments/assets/d07f1e59-64ff-426d-82ba-faeabcb1cfc8)

- **Xem giỏ hàng:**  
  ![View Cart](https://github.com/user-attachments/assets/8bb49cc6-9b6b-4182-bc84-479a04310968)

- **Thanh toán:**  
  ![Checkout](https://github.com/user-attachments/assets/6439109c-03e1-454f-8bc5-4baed19a06dd)

- **Đăng nhập/Đăng ký:**  
  ![Login/Register](https://github.com/user-attachments/assets/31ddbcf4-abf8-448d-bf1c-7bbb377d4692)

- **CRUD Sản phẩm (Admin):**  
  ![Admin CRUD](https://github.com/user-attachments/assets/62836107-a20a-409e-8dc2-51e3ee4416d2)

---

## 💻 Một số đoạn mã chính

- **Model – Order**
  ![Order Model](https://github.com/user-attachments/assets/b0ac2a02-ed4a-41f6-a7a9-aad78a2310a5)

- **Controller – Order**
  ![Order Controller](https://github.com/user-attachments/assets/d5edb143-1241-4b78-aaae-a7dd30cf32f8)

- **Migration – Bảng Order**
  ![Order Table](https://github.com/user-attachments/assets/1662403c-cf90-4dbf-bfb7-3ae531477a50)

- **Giao diện – Thanh toán**
  ![Payment Blade](https://github.com/user-attachments/assets/454dac45-6d1a-4ea8-ace0-84e9fd694d18)

---

## 🔐 Bảo mật

| Thành phần | Hình ảnh minh họa |
|------------|------------------|
| CSRF | ![CSRF](https://github.com/user-attachments/assets/bd64b98a-3bfd-4ff1-b8ee-1bda0dd703ad) |
| Kiểm tra đầu vào | ![Validation](https://github.com/user-attachments/assets/d95973cd-7465-425b-ba2a-f8ba67f01c02) |
| SQL Injection | ![SQL](https://github.com/user-attachments/assets/6c75741d-9bfd-4329-b608-1bbb489da31c) |
| XSS | ![XSS](https://github.com/user-attachments/assets/a670d9a4-59b7-40fa-8883-6c2e7cdaba85) |
| Session & Cookie | ![Session](https://github.com/user-attachments/assets/229268f9-39b8-429b-828e-df33512168af) |
| Laravel Breeze | Hỗ trợ xác thực, hash mật khẩu |

---

## 🔗 Link dự án

- 💻 **Source code:** [https://github.com/Tedomi2525/Web-nang-cao](https://github.com/Tedomi2525/Web-nang-cao)  
- 🎬 **Demo Video:** [Xem trên YouTube](https://www.youtube.com/watch?v=CFo7yaAWPu0)  
- 🌍 **Public Website:** *(Thêm link nếu có deploy)*

---

## 🖼️ Một số hình ảnh giao diện chính

| Trang chủ | Sản phẩm | Giỏ hàng | Thanh toán | Đăng nhập |
|----------|----------|----------|------------|------------|
| ![Index](https://github.com/user-attachments/assets/4f9bf8ad-21f7-4ffa-a7a4-217b00e6a8f3) | ![Products](https://github.com/user-attachments/assets/db8ed404-1b71-4e11-83f7-1c8ffd43d87d) | ![Cart](https://github.com/user-attachments/assets/600c7cc3-6b7f-416c-8999-e57a4eb01118) | ![Payment](https://github.com/user-attachments/assets/8a47787e-b18f-48e8-92cd-9f51ff87bd27) | ![Login](https://github.com/user-attachments/assets/11b520e5-ce80-4ff6-a854-e2582e023f14) |

---

## 📜 License

This project is licensed under the MIT License.  
The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

> 🧸 *Teddy Paradise* – một dự án học tập kết hợp thực hành xây dựng web thương mại điện tử mini với Laravel.
hân thiện. Người dùng có thể xem sản phẩm, thêm vào giỏ hàng và thanh toán mà không cần đăng nhập. Hệ thống đảm bảo các yếu tố bảo mật quan trọng như xác thực, chống CSRF, quản lý phiên làm việc và kiểm tra dữ liệu đầu vào. Dự án minh họa các thao tác CRUD cơ bản đối với sản phẩm, đồng thời mô hình hóa rõ ràng luồng hoạt động và kiến trúc hệ thống qua sơ đồ UML, flowchart và cơ sở dữ liệu.
  
### Công nghệ được sử dụng
1. PHP (Laravel framework)
2. Laravel Breeze
3. MySQL (Aiven Cloud)
4. Eloquent ORM (Hệ thống ORM giúp tương tác với CSDL)
5. Frontend & UI (Blade engine, Tailwind CSS)
6. Laravel Security (CSRF, Auth, ...)
##  Sơ đồ khối
![image](https://github.com/user-attachments/assets/6061be48-5b07-4199-8fd2-467b983f99b9)
## Sơ đồ chức năng 
![image](https://github.com/user-attachments/assets/973c2243-6ba7-4de1-bc1a-b401c84590f7)
## Sơ đồ thuật toán
### Browse Products 
![image](https://github.com/user-attachments/assets/2197b990-7727-4112-91ec-af36d21a97a1)
### Add to cart
![image](https://github.com/user-attachments/assets/d07f1e59-64ff-426d-82ba-faeabcb1cfc8)
### View cart
![image](https://github.com/user-attachments/assets/8bb49cc6-9b6b-4182-bc84-479a04310968)
### Check out
![image](https://github.com/user-attachments/assets/6439109c-03e1-454f-8bc5-4baed19a06dd)
### Login/Register
![image](https://github.com/user-attachments/assets/31ddbcf4-abf8-448d-bf1c-7bbb377d4692)
### Admin CRUD Products
![image](https://github.com/user-attachments/assets/62836107-a20a-409e-8dc2-51e3ee4416d2)
# Một số code chính minh họa
### Model (Order) 
![Order-model](https://github.com/user-attachments/assets/b0ac2a02-ed4a-41f6-a7a9-aad78a2310a5)
### Controller (Order)
![order-controller](https://github.com/user-attachments/assets/d5edb143-1241-4b78-aaae-a7dd30cf32f8)
### Migrations (Order-table)
![order table](https://github.com/user-attachments/assets/1662403c-cf90-4dbf-bfb7-3ae531477a50)
### Blade ( Payment)
![payment](https://github.com/user-attachments/assets/454dac45-6d1a-4ea8-ace0-84e9fd694d18)
# Security Setup
### CSRF
![image](https://github.com/user-attachments/assets/bd64b98a-3bfd-4ff1-b8ee-1bda0dd703ad)
### Input Validation
![image](https://github.com/user-attachments/assets/d95973cd-7465-425b-ba2a-f8ba67f01c02)
### SQL Injection
![image](https://github.com/user-attachments/assets/6c75741d-9bfd-4329-b608-1bbb489da31c)
### XSS
![image](https://github.com/user-attachments/assets/a670d9a4-59b7-40fa-8883-6c2e7cdaba85)
### Session & Cookie
![image](https://github.com/user-attachments/assets/229268f9-39b8-429b-828e-df33512168af)
### Authentication (Laravel Breeze)
# Link
### Link Repo: https://github.com/Tedomi2525/Web-nang-cao
### Link Demo (link youtube): https://www.youtube.com/watch?v=CFo7yaAWPu0
### Link Public
# Một số hình ảnh chức năng chính 
### Index 
![image](https://github.com/user-attachments/assets/4f9bf8ad-21f7-4ffa-a7a4-217b00e6a8f3)
### Products
![image](https://github.com/user-attachments/assets/db8ed404-1b71-4e11-83f7-1c8ffd43d87d)
### Cart
![image](https://github.com/user-attachments/assets/600c7cc3-6b7f-416c-8999-e57a4eb01118)
### Payment
![image](https://github.com/user-attachments/assets/8a47787e-b18f-48e8-92cd-9f51ff87bd27)
### Login
![image](https://github.com/user-attachments/assets/11b520e5-ce80-4ff6-a854-e2582e023f14)
# License & Copy Rights
The Laravel framework is open-sourced software licensed under the MIT license.






