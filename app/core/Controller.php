<?php  

//class ini akan di extends di class child di folder controller
class Controller {
        //params $view = ('home/index'), data siapa tahu ada dadta yang dikirim kedalam view tsb)
    public function view($view, $data = []){
        //karena ini hanya tampilan maka tidak menggunakan return
        require_once '../app/view/' . $view . '.php';
    }

    public function model($model){
        //class User_model digabung dengan parameter model digabung dengan nama filenya dimana $model akan menampung semua data dari database models/Mahasiswa_models kemudian dikirimka ke controllers/Mahasiswa.php 
        require_once '../app/models/' . $model . '.php';
        //karena class instansiasi dulu agar bisa dipake
        return new $model;
    }
}