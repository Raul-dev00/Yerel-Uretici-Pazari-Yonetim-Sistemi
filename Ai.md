# AI.md

## Yapay Zeka Kullanımı

Bu projeyi geliştirirken ChatGPT (OpenAI) ile aşağıdaki konularda sohbet edilmiştir:

### Konu: Proje konusu seçimi
- Yerel Üretici Pazarı Yönetim Sistemi fikrinin belirlenmesi

### Konu: Proje dosya yapısı ve veritabanı tasarımı
- Kullanılacak dosyaların yapısı
- Veritabanı tablolarının oluşturulması

### Konu: Kullanıcı kayıt, giriş, ürün CRUD işlemleri
- Kullanıcı kayıt ve şifre hashleme
- Oturum yönetimi (Session)
- Ürün ekleme, listeleme, güncelleme, silme işlemleri

### Konu: Hosting ayarları ve dosya yükleme
- Hosting veritabanı bağlantısının yapılması
- FTP ile dosya yükleme
- CSS (Bootstrap) kullanımı

**Kullanılan Yapay Zeka Aracı:** ChatGPT (OpenAI)  
---

**Ben:**  
"Here are your hosting informations: ..." → Hosting bilgilerini sağladım.

**ChatGPT:**  
`includes/db.php` dosyasının hosting bilgilerime göre güncellenmesi için doğru bağlantı kodunu sundu.

---

**Ben:**  
"filezilla indirdim ve kurdum. sonraki adıma geçebiliriz."

**ChatGPT:**  
public_html dizinine hangi dosyaların yüklenmesi gerektiğini, css klasörü gerekip gerekmediğini netleştirdi.

---

**Ben:**  
"bizim dosyalarda `<link href="css/bootstrap.min.css" rel="stylesheet">` bu satır var. Ne yapmamız gerekiyor?"

**ChatGPT:**  
Bootstrap CDN kullanımı önerildi ve doğru `<link>` satırı sağlandı.

---

**Ben:**  
"Kayıt oluşturdum, giriş yaptım, ürün kaydı oluşturdum."

**ChatGPT:**  
Test adımlarını verdi (listeleme, düzenleme, silme) → tüm işlemlerin çalıştığı teyit edildi.

---
