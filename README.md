# WhatsApp Gateway Laravel dengan API WhatsApp Meta

Proyek ini adalah **WhatsApp Gateway** berbasis **Laravel** yang menggunakan **WhatsApp API dari Meta** untuk mengirim dan menerima pesan WhatsApp.

## 📌 Fitur
- Mengirim pesan teks dan media melalui WhatsApp API.
- Menerima pesan masuk dan webhook event.
- Manajemen nomor dan status pengiriman.
- Logging pesan untuk monitoring.

## 🛠️ Teknologi yang Digunakan
- **Laravel** (Backend)
- **WhatsApp Cloud API** (Meta)
- **MySQL** (Database)
- **NGROK** (Untuk testing webhook di localhost)

## 🚀 Instalasi & Konfigurasi
### 1. Clone Repository
```bash
git clone https://github.com/username/wa-gateway-laravel.git
cd wa-gateway-laravel
```

### 2. Install Dependency
```bash
composer install
npm install
```

### 3. Konfigurasi Environment
Buat file `.env` dan sesuaikan dengan konfigurasi berikut:
```ini
APP_NAME=WaGateway
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wa_gateway
DB_USERNAME=root
DB_PASSWORD=

WA_API_URL=https://graph.facebook.com/v17.0
WA_ACCESS_TOKEN=your_meta_access_token
WA_PHONE_ID=your_phone_id
WEBHOOK_VERIFY_TOKEN=your_webhook_verify_token
```

### 4. Generate Key & Migrate Database
```bash
php artisan key:generate
php artisan migrate
```

### 5. Menjalankan Server
```bash
php artisan serve
```

## ⚙️ Konfigurasi WhatsApp Cloud API
1. **Daftar di Meta Developer**: https://developers.facebook.com/
2. **Buat Aplikasi** di Facebook Developer.
3. **Dapatkan WhatsApp API Token** dari **Meta Business Settings**.
4. **Set Webhook URL** menggunakan NGROK:
   ```bash
   ngrok http 8000
   ```
5. **Masukkan URL Webhook** ke **Meta Webhook Settings**:
   ```
   https://your-ngrok-url/api/webhook
   ```

## 📡 API Endpoint
### 1. Mengirim Pesan WhatsApp
**Endpoint:**
```http
POST /api/send-message
```
**Payload:**
```json
{
    "phone": "6281234567890",
    "message": "Halo, ini pesan dari Laravel!"
}
```

### 2. Webhook Penerimaan Pesan
**Endpoint:**
```http
POST /api/webhook
```
Webhook ini akan menerima event dari WhatsApp Cloud API.

## 📝 Lisensi
Proyek ini menggunakan lisensi **MIT**.

