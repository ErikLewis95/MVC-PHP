menulis ulang url agar rapi (prettier URL):
htaccess-> file yang digunakan untuk memodifikasi configurasi dari server appache dan bisa dilakukan setiap foldernya.

kalau kita masuk ke urlnya kita bisa melihat struktur dan isi folder App dan menjalankan file initnya, ini akan berbahaya jika user bisa mengakses folder App maka dari itu bisa dilakukan dengan memblokya dalam file .htaccess.
Options -Multiviews -> menghindari kesalahan/ambigu ketika kita memanggil folder/file didalam publik.
RewriteEngine -> menulis ulang url yang ada di browser

RewriteEngine On     -> menjalankan proses RewriteEngineCond {REQUEST_FILENAME} !-d -> URL yang diketik di browser merupakan folder/directory maka kita abaikan.
RewriteEngineCond {REQUEST_FILENAME} !-f -> untuk file menghindari ketika ada nama file yang sama dengan controller dan method.
RewriteRule ^(.*)$ index.php?url=$1 [L] -> menuliskan ulang url dengan aturan Regex:
^(carrot)  -> akan membaca tulisan url mulai dari awal yakni setelah folder Public/blabla... lalu akan diambil stringnya.
(.*)       -> ambil apapun karekter keculai enter satu persatu sampai selesai. 
contoh public/post.php atau public/blabla.html apapun extensinya.
index.php?url=$1 -> akan dikirimkan ke index.php yang mengirimkan url dan disimpan ke variable $1
[L] -> flag [L] ini artinya kalau ada rule yang sudah terpenuhi jangan menjalankan aturan setelahnya, untuk menghindarkan user melakukan sesuatu yang jahat.

sehingga jika urlnya yang diimput :
http://localhost/MVC-PHP/Public/about/page/satu/dua/
kemudian var_dump($url) diambil dari Core/App.php pada method public function __construct
maka akan menjadi seperti ini:
C:\Desktop\project\MVC-PHP\App\Core\App.php:9:
array (size=4)
  0 => string 'about' (length=5)
  1 => string 'page' (length=4)
  2 => string 'satu' (length=4)
  3 => string 'dua' (length=3)

