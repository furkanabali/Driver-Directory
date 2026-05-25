# 🚚 Driver Directory (Sürücü Rehberi)

Bu proje, sürücülerin kayıt altına alındığı, listelendiği ve durumlarına/araç tiplerine göre filtrelenebildiği minimal bir yönetim panelidir. 

Temiz kod (Clean Code) prensipleri gözetilerek, modern standartlara uygun bir şekilde geliştirilmiştir.

## 🚀 Kullanılan Teknolojiler

* **Backend:** Laravel 12 (PHP 8.2+)
* **Frontend:** Tailwind CSS v4, Blade
* **Veritabanı:** SQLite (Kurulum gerektirmez)
* **Paket Yöneticileri:** Composer, NPM

## 📋 Öne Çıkan Özellikler

* **Mobil Uyumlu (Responsive) Tasarım:** Tailwind CSS ile tüm cihazlara uyumlu arayüz.
* **Filtreleme Sistemi:** Sürücüleri "Durum" (Aktif/Pasif) ve "Araç Sınıfı" bazında filtreleme.
* **Çift Katmanlı Validasyon:** Telefon numarası gibi benzersiz (unique) ve formatlı veriler için hem veritabanı (Migration) hem de uygulama (Form Request) seviyesinde koruma.
* **Sahte Veri (Seeder & Factory):** Test ortamı için otomatik üretilmiş, gerçeğe uygun formattaki örnek veriler.
