<?php 
ob_start();
class Mahasiswa extends Controller{
//extend merupakan child dari extend agar mengenali class controller alamat file view dan model

    //Method index adalah alamat yang pertama sekali ditampilkan pada saat membuka halaman Mahasiswa
    public function index(){
        $data['judul'] = 'Daftar Mahasiswa';
        //semua data yang di kirim dari controller akan ditangkap lalu dikirim ke view melalui mahasiswa/index, $data
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('template/header', $data);
        $this->view('mahasiswa/index', $data); 
        $this->view('template/footer'); 
    }

        //parameter id diambil ketika tombol detail disorot disebelah kiri ada no id dari database
      public function detail($id){
        $data['judul'] = 'Detail Mahasiswa';
        //semua data yang di kirim dari controller akan ditangkap lalu dikirim ke view melalui mahasiswa/index, $data
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('template/header', $data);
        $this->view('mahasiswa/detail', $data); 
        $this->view('template/footer'); 
    }

    public function tambah(){
        // coba tambah data di dalam input kalau dapat string nya berarti tinggal jalankan contoh isinya
        // C:\Desktop\project\MVC-PHP\app\controllers\Mahasiswa.php:26:
        // array (size=4)
        //   'nama' => string 'asdda' (length=5)
        //   'nrp' => string '2312241' (length=7)
        //   'email' => string 'asddasdsa@gmail.com' (length=19)
        //   'jurusan' => string 'Teknik Informatika' (length=18)
        //panggil model lalu panggil method tambahDataMahasiswa yang mengirimkan data $_POST menghasilkan nilai > 0 artinya ada baris baru yang ditambahkan maka datanya berhasil masuk
         if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 )
         {
            //set flasher sebelum di redirect,  dengan 3 parameter dalam class Flaser dan method setFlash $pesan, $aksi, $tipe 
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/mahasiswa'); 
            exit;
                        // jika ada baris baru bertambah maka data berhasil masuk maka redirect / pindahkan ke halaman BASEURL mahasiswa/index
         }else{
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa'); 
            exit;
            // untuk mencoba pesan gagalnya commad semua script implementasi dari method tambahDataMahasiswa() lalu dibawahnya return 0; kemudian isikan data sembarang di browser maka akan muncul pesan danger/merah.
         }
    }


      public function hapus($id){
        // coba tambah data di dalam input kalau dapat string nya berarti tinggal jalankan contoh isinya
        // C:\Desktop\project\MVC-PHP\app\controllers\Mahasiswa.php:26:
        // array (size=4)
        //   'nama' => string 'asdda' (length=5)
        //   'nrp' => string '2312241' (length=7)
        //   'email' => string 'asddasdsa@gmail.com' (length=19)
        //   'jurusan' => string 'Teknik Informatika' (length=18)
        //panggil model lalu panggil method tambahDataMahasiswa yang mengirimkan data $_POST menghasilkan nilai > 0 artinya ada baris baru yang ditambahkan maka datanya berhasil masuk
         if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0 )
         {
            //set flasher sebelum di redirect,  dengan 3 parameter dalam class Flaser dan method setFlash $pesan, $aksi, $tipe 
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/mahasiswa'); 
            exit;
                        // jika ada baris baru bertambah maka data berhasil masuk maka redirect / pindahkan ke halaman BASEURL mahasiswa/index
         }else{
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa'); 
            exit;
            // untuk mencoba pesan gagalnya commad semua script implementasi dari method tambahDataMahasiswa() lalu dibawahnya return 0; kemudian isikan data sembarang di browser maka akan muncul pesan danger/merah.
         }
    }

    public function getUbah(){
      //coba jalankan console
      // echo $_POST["id"];
      //echo $this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']) bentuknya array associative.
      //agar data bentuknya json.
     echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah()
    {
      //syntax biasa tdk pakai ajax sama seperti insert
       if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0 )
         {
            //set flasher sebelum di redirect,  dengan 3 parameter dalam class Flaser dan method setFlash $pesan, $aksi, $tipe 
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/mahasiswa'); 
            exit;
                        // jika ada baris baru bertambah maka data berhasil masuk maka redirect / pindahkan ke halaman BASEURL mahasiswa/index
         }else{
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa'); 
            exit;
          }
    }

    public function cari()
    {
       $data['judul'] = 'Daftar Mahasiswa';
        //semua data yang di kirim dari controller akan ditangkap lalu dikirim ke view melalui mahasiswa/index, $data
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('template/header', $data);
        $this->view('mahasiswa/index', $data); 
        $this->view('template/footer'); 
    }
}