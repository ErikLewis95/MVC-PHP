<?php  
class Mahasiswa_model {
    // Sebelum Class Database dapat digunakan di Mahasiswa_model maka harus di load/di panggil di dalam app/init

    //membuat data dengan array assosiative langsung di script:
    // private $mhs = [
    //     [
    //         "nama"=>"Erik lewis Simaremare",
    //         "nrp"=>"097123401",
    //         "email"=>"eriksimare@gmail.com",
    //         "jurusan"=>"Teknik Informatika"
    //     ],
    //     [
    //         "nama"=>"Sandhika Galih",
    //         "nrp"=>"087712390",
    //         "email"=>"sandhikagalih-1@gmail.com",
    //         "jurusan"=>"Teknik Industri"
    //     ],
    //     [
    //         "nama"=>"Dody Derdiansyah",
    //         "nrp"=>"900812877",
    //         "email"=>"dody@gmail.com",
    //         "jurusan"=>"Teknik Sipil"
    //     ],
    //     [
    //         "nama"=>"Megawati Chan",
    //         "nrp"=>"999111222",
    //         "email"=>"megawati_chan@gmail.com",
    //         "jurusan"=>"Sastra Inggris"
    //     ]
    //     ];

        
        //variabel buat menampung koneksi  ke pdo database dengan menggunakan driver pdo $databasehandler akan lebih flexible dan mudah di banding msqli
        // private $dbh;
        // //buat nyimpan query atau statement
        // private $stmt;

        // //method __construct__ ketika model ini dipanggil yang pertama kali dilakukan connection ke database
        // public function __construct()
        // {
        //     // data source name
        //     $dsn='mysql:host=localhost;dbname=phpdasar';
        //     //cek menggunakan try & cath
        //     try{
        //         // apakah conectionnya berhasil apa tidak
        //         //panggil PDOnya lalu instan object dsn isi dengan usernamer: 'root', dan password =''
        //         $this->dbh = new PDO($dsn, 'root', '');
        //     // ketika terjadi error panggil PDOnya masukkan ke variable $e
        //     } catch(PDOException $e){
        //         //jika error hentikan programnya lalu panggil pessan error
        //         die($e->getMessage());
        //     }
        // }
        //spesifik untuk model ini menggunakan  table mahasiswa   
        private $table= 'mahasiswa';
        private $db;

        //begitu di class model dipanggil otomatis langsung instansiasi database 
        public function __construct()
        {
            $this->db = new Database;
        }

    public function getAllMahasiswa()
        {
            //untuk mendapatkan semua mahasiswanya dibutuhkan querynya
            // $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
            // $this->stmt->execute();
            // return $this->stmt->fetchALL(PDO::FETCH_ASSOC);
            
            //query didapat dari class DATABASE
            $this->db->query('SELECT * FROM ' . $this->table   );
            //resultSet() mengembalikan seluruh data mahasiswa
            return $this->db->resultSet();
        }

        //mecari mahasiswa berdasarkan id
    public function getMahasiswaById($id)
        {
            $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id' );
            $this->db->bind('id', $id);
            return $this->db->single();
        }

        //method untuk menambahkan
        
        //$data menerima data dari $_POST yang ada di class Mahasiswa 
    public function tambahDataMahasiswa($data)
        {
            //sesuikan nama field yang ada pada database table mahasiswa '' merupakan id yang isinya merupakan autoincrement jadi kosongkan.
            $query = "INSERT INTO mahasiswa VALUES ('', :nama, :nrp, :email, :jurusan )";
            
            //jalankan querynya
            $this->db->query($query);
            //binding field 'nama' dabatabse table mahasiswa dengan nama yang ada pada form yang dikirim menggunakan method $_POST kemudian ditangkap $data, Catatan : pastikan semua penulisannya nya sama
            $this->db->bind('nama', $data['nama']);
            //nama dapat dari name yang dikirimkan dari form yang ada pada view/mahasiswa/index.
             $this->db->bind('nrp', $data['nrp']);
             $this->db->bind('email', $data['email']);
             $this->db->bind('jurusan', $data['jurusan']);
            
           

            $this->db->execute();
            //fungsi butuh mengembalikan angka sehingga jika tambahDataMahasiswa($_POST) > 0 atau 1 berati ketika nilainya 1 maka ada 1 baris baru yang ditambahkan ke dalam table kita.
            return $this->db->rowCount();
            // return 0; //untuk mencoba flash message gagal.
        }

           public function hapusDataMahasiswa($id)
        {
            //sesuikan nama field yang ada pada database table mahasiswa '' merupakan id yang isinya merupakan autoincrement jadi kosongkan.
            $query = "DELETE FROM mahasiswa WHERE id = :id";
            
            //jalankan querynya
            $this->db->query($query);
            //binding field 'nama' dabatabse table mahasiswa dengan nama yang ada pada form yang dikirim menggunakan method $_POST kemudian ditangkap $data, Catatan : pastikan semua penulisannya nya sama
            $this->db->bind('id', $id);
            //nama dapat dari name yang dikirimkan dari form yang ada pada view/mahasiswa/index.
            
            $this->db->execute();
            //fungsi butuh mengembalikan angka sehingga jika hapusDataMahasiswa($_POST) > 0 atau 1 berati ketika nilainya 1 maka bernilai true jalankan sukses jika tidak jalankan error.
            return $this->db->rowCount();
            // return 0; //untuk mencoba flash message gagal.
        }


        public function ubahDataMahasiswa($data)
        {
            //sesuikan nama field yang ada pada database table mahasiswa '' merupakan id yang isinya merupakan autoincrement jadi kosongkan.
            $query = "UPDATE mahasiswa SET
                        nama = :nama,
                        nrp = :nrp,
                        email = :email,
                        jurusan = :jurusan
                        WHERE id = :id";
            
            //jalankan querynya
            $this->db->query($query);
            //binding field 'nama' dabatabse table mahasiswa dengan nama yang ada pada form yang dikirim menggunakan method $_POST kemudian ditangkap $data, Catatan : pastikan semua penulisannya nya sama
            $this->db->bind('nama', $data['nama']);
            //nama dapat dari name yang dikirimkan dari form yang ada pada view/mahasiswa/index.
             $this->db->bind('nrp', $data['nrp']);
             $this->db->bind('email', $data['email']);
             $this->db->bind('jurusan', $data['jurusan']);
             $this->db->bind('id', $data['id']);
            
           

            $this->db->execute();
            //fungsi butuh mengembalikan angka sehingga jika tambahDataMahasiswa($_POST) > 0 atau 1 berati ketika nilainya 1 maka ada 1 baris baru yang ditambahkan ke dalam table kita.
            return $this->db->rowCount();
            // return 0; //untuk mencoba flash message gagal.
        }


        public  function cariDataMahasiswa()
        {
            $keyword = $_POST['keyword'];
            // wild card LIKE gunanya untuk mencari data yang tdk sama persis , kalau nama = :keyword maka mencari nama yang sama contoh nama Data SANDHIKA GALIH kalau diinput diketik SAN maka tidak akan muncul 
            $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        

            $this->db->query($query);
            
            $this->db->bind('keyword', "%$keyword%");
            
            return $this->db->resultSet();
        }
        
}