<?php  
class Flasher{
    // Class flasher ini khusus untuk mengelola flash Message dan menampilkannya berhasil menambah atau mengubah
    //method static agar kita dapat memanggil methodnya tanpa harus instansiasi pada class ini
    // pesan flash menggunakan pesan bantuan bootstrap: https://getbootstrap.com/docs/5.3/components/alerts/
    //param $pesan = berhasil atau gagal
    //param $aksi  = digunakan secara generik bisa untuk method tambah data, ubah, hapus atau apapun contoh pesnanya gagal menambah data, berhasil menghapus data, dll.
    // param $tipe = untuk menentukan dari class bootstrap mana yang akan dipakai karena ada banyak untuk menentukan warna apa yang di pakai lihat documented warna: succes warning, atau erro
    public static function setFlash($pesan, $aksi, $tipe)
    {
        //nama session flash isinya array assoc
      $_SESSION['flash'] =[
        'pesan' =>$pesan,
        'aksi' =>$aksi,
        'tipe' =>$tipe
      ];  
    }

    //method untuk menampilkan pesan
    public static function flash(){
        //cek dulu didalam halamannya ada sessionnya gk?
        if(isset($_SESSION['flash'])){
        //kalau ada tampilkan pesannya
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
                    Data Mahasiswa <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        // hanya berlaku 1 kali jika sudah tampil halaman di refresh / close/ pindah halaman sessionnya sudah hilang.
        unset($_SESSION['flash']);              
        }
    }
    

}