# QUIZ WEEK 3
Pada tugas ini saya membuat sebuah program click counter yang akan menghitung berapa kali tombol diklik dalam satu sesi browser.

# cobaClick.html
Program ini merupakan aplikasi sederhana yang digunakan untuk menghitung jumlah klik yang dilakukan pengguna pada sebuah tombol. Program dirancang dengan interface yang minimalis dan fungsionalitas yang jelas.

# Cara Kerja Program

# Sebelum Tombol Diklik
Saat halaman pertama kali dibuka, pengguna akan melihat:
- Sebuah tombol bertuliskan "Click me!"
- Dua baris teks penjelasan:
  - "Click the button to see the counter increase."
  - "Close the browser tab (or window), and try again, and the counter is reset."

Area di atas teks penjelasan tersebut masih kosong, belum ada informasi tentang jumlah klik.

# Setelah Tombol Diklik
Setiap kali pengguna menekan tombol "Click me!", hal-hal berikut terjadi:
1. Fungsi `counter()` akan dijalankan
2. Program akan mengecek apakah browser mendukung sessionStorage
3. Jika sudah ada data klik sebelumnya, jumlahnya akan ditambah 1
4. Jika belum ada, maka data diciptakan dengan nilai 1
5. Pesan akan muncul di bagian atas bertuliskan: "You have clicked the button X time(s) in this session." (dengan X adalah jumlah klik)
6. Pesan ini akan terus diperbarui setiap kali tombol diklik

# Penanganan Data

Program menggunakan **sessionStorage** untuk menyimpan data jumlah klik. Ini berarti:
- Data tetap tersimpan selama browser atau tab masih terbuka
- Pengguna bisa refresh halaman dan data klik masih akan ada
- Ketika browser atau tab ditutup, semua data akan otomatis hilang
- Jika membuka ulang halaman, counter akan kembali dari angka 0

Oleh karena itu, pesan yang tertera di halaman mengingatkan pengguna bahwa "data akan hilang saat browser ditutup."

## Analisis Program

Mengapa menggunakan sessionStorage dan bukan localStorage?
- **localStorage**: Data akan tetap tersimpan bahkan setelah browser ditutup. Cocok untuk data yang perlu diingat jangka panjang.
- **sessionStorage**: Data hanya berlaku untuk satu sesi. Cocok untuk aktivitas sementara seperti counter klik, cart belanja, atau preferensi pengguna untuk satu sesi browsing.

Karena persyaratan program menyatakan bahwa "data akan hilang saat browser close, selebihnya data masih tersimpan", maka sessionStorage adalah pilihan paling tepat untuk kasus ini.

# Teknologi yang Digunakan
Project ini dibuat menggunakan:
- HTML
- CSS
- JavaScript

# Konsep yang Dipakai

Pada project ini digunakan sessionStorage, yaitu fitur dari JavaScript yang digunakan untuk menyimpan data sementara di browser.

Karakteristiknya:
- Data tetap ada selama browser atau tab masih terbuka
- Data tidak hilang saat halaman di-refresh
- Data akan hilang secara otomatis jika browser atau tab ditutup

Teknologi ini dipilih karena sesuai dengan kebutuhan program yang menginginkan counter untuk direset setiap kali browser ditutup.


# Struktur Project
week-3/
│
├── cobaClick.html  
└── README.md  

# Referensi
Saya menggunakan referensi dari:
https://www.w3schools.com/js/js_api_web_storage.asp

# Pernyataan

"saya mengerjakan tugas ini sendiri tanpa melakukan kecurangan seperti menggunakan, mendupliaksi kode perogram kode program yang ada. jia saya melakukan kecurangan dalam perngerjaan tugas ini maka saya siap menerima sanksi atau hukuman dari dari dosen mata kuliah dan tuhan / allah swt"
