# Laravel Multilingual Blog Admin - Service Container & DI Mastery

## 🧩 Bối cảnh dự án
Bài tập này xây dựng nền tảng cho hệ thống **Blog quản trị đa ngôn ngữ** có khả năng mở rộng. Mục tiêu là chuẩn hóa kiến trúc dự án, cấu trúc code, xử lý cấu hình môi trường, và áp dụng **Service Container** cùng **Dependency Injection (DI)** để quản lý các dịch vụ nội bộ.

## 🏗️ Cấu trúc dự án
- **app/Contracts/**: Chứa các interface (Contracts) để định nghĩa abstraction, ví dụ `TranslatorInterface.php`.
- **app/Services/**: Chứa các service implementation, ví dụ `VietnameseTranslator.php`, `EnglishTranslator.php`.
- **app/Providers/**: Chứa các Service Provider để bind service vào Service Container, ví dụ `TranslatorServiceProvider.php`.
- **routes/**: Khai báo route cho ứng dụng, ví dụ `/greeting`.
- **resources/views/**: Chứa các view (Blade templates) nếu có giao diện.
- **storage/**: Lưu trữ logs, cache, files.
- **bootstrap/**: Cấu hình khởi tạo ứng dụng.

> Áp dụng chuẩn **PSR-4**, **PSR-12** và kiến trúc **Domain → Services → Interfaces**.

## ⚙️ Xây dựng hệ thống dịch đa ngôn ngữ
1. **Tạo interface** `TranslatorInterface` trong `app/Contracts`.
2. **Tạo các translator service**:
   - `VietnameseTranslator` trả về `"Xin chào, quản trị viên"`.
   - `EnglishTranslator` trả về `"Hello, admin"`.
3. **Đăng ký Service Provider** `TranslatorServiceProvider`:
   - Bind `TranslatorInterface` vào implementation tương ứng dựa trên `APP_LOCALE`.
   - Sử dụng `$this->app->bind()` hoặc `$this->app->singleton()` trong `register()` method.
4. **Inject TranslatorInterface** vào `HomeController@index` và trả về greeting.

## 🧪 Route & Unit Test
- Route `/greeting` trả về thông báo từ `TranslatorInterface`.
- Viết **Feature Test** trong `tests/Feature/GreetingTest.php`:
  - Kiểm tra đúng response theo từng locale (`vi` → `"Xin chào, quản trị viên"`, `en` → `"Hello, admin"`).
- Test đảm bảo flow từ **route → controller → service** hoạt động chính xác.

## 🎯 Bonus (Optional)
- Gắn `singleton()` hoặc `bindIf()` để tối ưu Service Container.
- Tạo thêm **WelcomeEmailService** và inject qua constructor.
- Tạo **LoggerService** dùng Monolog để ghi log custom vào `storage/logs/custom.log`.

## ✅ Kết quả kỳ vọng
- Kiến trúc rõ ràng, **tuân thủ SOLID & DI**.
- Service Container sử dụng cho cấu hình động.
- Cấu hình môi trường chuyên nghiệp theo từng context.
- Logic translator được kiểm thử đầy đủ.
