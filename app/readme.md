menulis ulang url agar rapi
htaccess-> file yang digunakan untuk memodifikasi configurasi dari server appache dan bisa dilakukan setiap foldernya.

kalau kita masuk ke urlnya kita bisa melihat struktur dan isi folder App dan menjalankan file initnya, ini akan berbahaya jika user bisa mengakses folder App maka dari itu bisa dilakukan dengan memblokya dalam file .htaccess.
Options -Indexes -> selama didalam folder itu ada index baik php maupun html jangan tampilkan isi foldernya/blok.

contoh data yang diketik di url
http://localhost/MVC-PHP/Public/about/page/10/20
controller -> about
method -> page
params -> 10/20
