<?php

class App
{
    //membuat property untuk menentukan Controller, method, parameter Default
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];
    private $file = '../app/controllers/';
    public function __construct()
    {
        //$url berisi apapun yang akan diketik di url
        $url = $this->parseURL();

        //controller
        // cek adakah file didalam Controller yang namanya Home posisi satat ini ada di public/index.php
        if (isset($url[0])) {
            if (file_exists($this->file . $url[0] . '.php')) {
                //kalau ada timpa property $controller dengan yang baru dengan index ke 0 lihat readme Public/ contoh ulr index ke 0
                $this->controller = $url[0];
                //tidak memasang/menghaps url index 0
                unset($url[0]);
                // var_dump($url[0]);
            }
        }
        require_once $this->file . $this->controller . '.php';
        //instnsiasi object new timpa dengan  instansiasi agar dapat memanggil methodnya
        $this->controller = new $this->controller;

        //method
        //apakah methodnya ada ditulis index 1
        if (isset($url[1])) {
            //cek methodnya ditulis adakah pada objek instans controllernya jika ada method index 1 maka timpa
            if (method_exists($this->controller, $url[1])) {
                //kalau ada timpa property dengan $url[1];
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //params
        //jika tidak empty arraynya
        if (!empty($url)) {
            // mengambil data /Public/home/index/10/20 =>10/20 merupakan datanya
            $this->params = array_values($url);
        }

        //jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        //jika ada url yang dikirimkan
        if (isset($_GET['url'])) {
            //ambil url isi dengan ?url=... rtrim fungsi untuk menghapus tanda /
            $url = rtrim($_GET['url'], '/');
            //filter_var = fungsi untuk  memifilter character yang aneh untuk menghindari kemungkinan sistem di hack, FILTER_SANITIZE_URL kemudian urlnya dibersihkan atau dihapus dari variable $url
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //pecah url dengan delimiter / sehingga tanda / ilang string"nya berubah menjadi element array dari url;  
            $url = explode('/', $url);
            return $url;
        }
    }
}