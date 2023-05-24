<?php  

class About extends Controller{
    //method default, untuk jaga" ketika kita nulis di urlnya nama method yang tidak ada, dan bisa mengirimkan data melalui parameternya
    public function index($nama='Erik', $pekerjaan='programmer', $umur=28){
      //inputan yang diketik oleh user kemudian dikirimkan ke index about/
      //$data akan dikirmkan ke controller view dan ditangkap dengan array
      $data['nama'] = $nama;
      $data['pekerjaan'] = $pekerjaan;
      $data['umur'] = $umur;
      $data['judul'] =  'About Me';
      $this->view('template/header', $data);
      $this->view('about/index', $data);
      $this->view('template/footer');
    }
    public function page(){
      //controller about method page; 
      $data['judul'] = 'Landing Page';
      $this->view('template/header', $data);
      $this->view ('about/page');
      $this->view('template/footer');
    }
}