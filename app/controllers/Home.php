<?php  

//child class controller
class Home extends Controller{
    //method default ketika tidak mengetik apapu di url method ini yang akan dipanggil
    public function index(){
        //judul di dalam tab;
        $data['judul'] = 'Home';
        //model bentuknya class -> akan panggil method
        //memanggil class User_model lalu di instansiasi kemudian jalankan methodnya
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('template/header', $data);
        //data dikirim ke index view/home
        $this->view('home/index', $data);
        $this->view('template/footer');
    }
}