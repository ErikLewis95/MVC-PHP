<?php
if ( !session_id() ) session_start();
//cara sederhana kalau 1 baris perintahnya tidak menggunakan curly bracket{}
// cara biasa
// kalau didalam applikasi tidak terindentifikasi ada session id maka jalankan sessionnya session_start();
// if (!session_id()){
//     session_start();
// }

require_once '../app/init.php';

$app = new App;