# 🚚 Driver Directory (Sürücü Rehberi)

Bu proje, mülakat değerlendirme süreci kapsamında hazırlanmış; sistemdeki sürücülerin kayıt altına alındığı, listelendiği ve durumlarına/araç tiplerine göre filtrelenebildiği minimal bir yönetim panelidir. 

Karmaşık mimarilerden kaçınılarak, Temiz Kod (Clean Code) prensipleri gözetilmiş ve güncel standartlara uygun bir şekilde geliştirilmiştir.

## 🚀 Kullanılan Teknolojiler ve Ortam

* **Backend:** Laravel 12.0 (PHP 8.2.29)
* **Frontend:** Tailwind CSS v4, Blade (Vite Entegrasyonu)
* **Veritabanı:** SQLite (Kurulum gerektirmez)
* **Paket Yöneticileri:** Composer, NPM

## 📋 Öne Çıkan Geliştirmeler ve Özellikler

* **Mobil Uyumlu (Responsive) Tasarım:** Tailwind CSS kullanılarak tüm cihazlara (mobil, tablet, masaüstü) tam uyumlu arayüz kodlanmıştır.
* **Gelişmiş Filtreleme Sistemi:** Kullanıcı deneyimini artırmak adına sürücüleri "Durum" (Aktif/Pasif) ve "Araç Sınıfı" bazında anlık filtreleme özelliği eklenmiştir.
* **Çift Katmanlı Güvenlik (Validation):** Telefon numarasının benzersiz olması ve istenen formatta girilmesi gibi zorunluluklar için, hem veritabanı (Migration) düzeyinde hem de uygulama (Form Request) düzeyinde koruma sağlanmış, Controller sınıfı temiz tutulmuştur.
* **Sahte Veri Üretimi (Seeder & Factory):** Test ortamı için, projenin tek komutla ayağa kalkmasını sağlayan, gerçeğe uygun formattaki (Türkçe isimler ve geçerli telefon numaraları) örnek veriler kurgulanmıştır.

## ⚙️ Kurulum ve Çalıştırma

Projeyi yerel ortamınızda test etmek oldukça basittir. Ekstra bir veritabanı sunucusuna ihtiyaç duymadan, aşağıdaki adımları sırasıyla terminalinizde uygulayınız:

**1. Projeyi Klonlayın ve Dizinine Girin**
```bash
git clone https://github.com/furkanabali/Driver-Directory
cd driver-directory
```

**2. Bağımlılıkları Yükleyin**
```bash
composer install
npm install
```

**3. Çevre Değişkenlerini Ayarlayın**
```bash
cp .env.example .env
php artisan key:generate
```

**4. Veritabanını Oluşturun ve Örnek Verileri Yükleyin**
```bash
php artisan migrate:fresh --seed
```

**5. Uygulamayı Başlatın**

Birinci Terminal Sekmesinde;
```bash
npm run dev
```
İkinci Terminal Sekmesinde;
```bash
php artisan serve
```
**Böylelikle proje bilgisayarınızda çalışacaktır.**

