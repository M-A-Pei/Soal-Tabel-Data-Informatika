## Soal Teori

1. **Laravel Lumen:** *(5 point)*
- Apa perbedaan utama antara Laravel dan Laravel Lumen? Jelaskan dalam konteks
penggunaan aplikasi yang ringan dan performa API. *(2 point)*
> Laravel Lumen adalah versi lebih ringanya Laravel yang bermaksud untuk hanya fokus kepada pengembangan API
- Jelaskan konsep middleware di Laravel Lumen dan berikan contoh penggunaannya. *(2 point)*
> Middleware adalah sebuah proses yang perlu dilalui sebuah request sebelum menyampai di endpoint yang ditujui, Contoh: middleware untuk mengupload file ke cloud
- Apa itu dependency injection, dan bagaimana Laravel Lumen memanfaatkannya? *(1 point)*
> Dependency Injection adalah pola design dimana suatu kelas menerima Dependency dari luar, lalu membuatnya sendiri di class tersebut. Laravel Lumen memanfaatkanya untuk meningkatkan modularitas, fleksibilitas, dan kemudahan membaca sebuah projek
2. **Vue.js:** *(5 point)*
- Jelaskan apa itu reactive data binding di Vue.js dan bagaimana ini membantu
dalam pengembangan front-end? *(2 point)*
> Reactive data binding di Vue.js adalah mekanisme di mana data dalam aplikasi dan elemen DOM saling terhubung secara otomatis. ini membantu pengembangan frontend karena Ketika data berubah, tampilan akan berubah secara langsung tanpa perlu manipulasi DOM manual.
- Sebutkan dan jelaskan perbedaan utama antara computed properties dan
methods di Vue.js. *(2 point)*
> Computer Properties digunakan untuk mengolah data secara reaktif, sementara Methods digunakan untuk menjalankan function kapan saja dibutuhkan
- Apa keuntungan menggunakan Vuex dalam aplikasi Vue.js? *(1 point)*
> Vuex Memungkin kita untuk menyimpan data global di applikasi kita, seperti dala login seorang user
3. **MySQL:** *(5 point)*
- Jelaskan apa itu indexing di MySQL, dan bagaimana ini mempengaruhi performa
query? *(2 point)*
> Indexing di MySQL adalah teknik yang digunakan untuk mempercepat pencarian data dalam sebuah tabel. ini memengaruhi kecepatan dengan sangat baik, karena MYSQL tidak harus menelusuri seluruh tabel, melainkan bisa langsung menuju ke data yang ingin di telusuri
- Apa perbedaan antara INNER JOIN dan LEFT JOIN? Berikan contoh kasus
penggunaan keduanya. *(2 point)*
> INNER JOIN hanya mengambil data yang mencocoki kedua table, Left Join Mengambil semua data di table kiri, dan jika ada data yang mencocoki di table kanan, itu juga akan ikut keambil. Sebagai contoh kita bisa menggukan INNER JOIN jika kita mau menelusuri user apa saja yang sudah membeli sebuah produk. jika kita menggunakan LEFT JOIN kita bisa menggukanya untuk menelusuri SEMUA user, sekalian juga dengan produk yang mereka beli 
- Apa tujuan dari normalisasi database? Sebutkan salah satu kelemahannya. *(1
point)*
> Tujuan utama dari normalisasi adalah untuk mengorganisir data agar lebih efisien, menghindari duplikasi data, dan meminimalkan potensi anomali saat melakukan operasi seperti INSERT, UPDATE, dan DELETE. Salah satu kelemahan dari normalisasi adalah potensi penurunan kinerja query. Karena data dibagi menjadi banyak tabel, operasi yang melibatkan banyak tabel (seperti join) dapat menjadi lebih lambat, terutama jika tabel-tabel tersebut sangat besar.
