<?php  
class Database{
    //Database Wrapper
    // variable ini menangkap data yang ada pada config/config.php
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    //database handler
    private $dbh;
    //statement
    private $stmt;

    //function __construct merupakan function yang pertama sekali di jalankan ketika connection dilakukan.
    public function __construct()
        {
            // data source name
             $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

            
            //parameter option digunakan ketika kita ingin mengoptimasi ke database

            $option = [
                //agar db connectionnya terjaga terus
                PDO::ATTR_PERSISTENT => true,
                //untuk mode error tampilkan exeption
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              
            ];
            
            //cek connection menggunakan try & cath
            try{
                // apakah conectionnya berhasil apa tidak
                //panggil PDOnya lalu instan object dsn isi dengan usernamer: 'root', dan password =''
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $option); 
            // ketika terjadi error panggil PDOnya masukkan ke variable $e
            } catch(PDOException $e){
                //jika error hentikan programnya lalu panggil pessan error
                die($e->getMessage());
            }
        }

        //function untuk jalankan query() menjadi generik sehingga querynya  dapat dipake untuk apapun / flexible
    public function query($query)
        {
            $this->stmt = $this->dbh->prepare($query);
        }

        //binding datanya sapa tahu didalam query nya ada where nya kalau insert into valuenya apa ? kalau update set datanya apa? atau dalm artinya parameternya.

        //ikat parameter yang nilainya apa dan typenya ada secara default nilai awalnya null, agar yang menentukan bukan kita tapi aplikasinya
    public function bind($param, $value, $type= null)
        {
            //kalau typenya null lakukan
            if(is_null($type)){
                //agar switchnya jalan
                switch (true){
                    //kalau case valuenya int  
                    case is_int($value) :
                        //set typenya otomatis menjadi int
                        $type = PDO::PARAM_INT;
                        break;
                        //jika boolean valuenya is bool true or false set typenya otomatis menjadi bool
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                        //jika valuenya null mka tyoenya juga paramnya
                    case is_null($value) :
                        $type = PDO::PARAM_NULL;
                        break;
                        //selain dari itu typenya adalah string
                    default :
                        $type = PDO::PARAM_STR;

                }
            }
            //where id = 1, maka akan di cek 1 itu termasuk typenya apa? int, maka kasi optionnya int kemudian valuenya di bind dengan typenya,param, value
            $this->stmt->bindValue($param, $value, $type); 
            //kenapa querynya di binding tidak langsung dimasukkan ke querynya tujuannya agar aman dari serangan SQL INJECTION karena querynya dieksekusi setelah stringnya dibersihkan terlebih dahulu.
        }

        //eksekusi querynya yang telah di binding dengan param value type
    public function execute()
        {
            $this->stmt->execute();
        }
        
        //mengeksekusi jika banyak data contoh : SELECT * FROM mahasiswa
    public function resultSet()
        {
            $this->execute();
            return $this->stmt->fetchALL(PDO::FETCH_ASSOC);      
        }

        //mengeksekusi jika cuman satu data contoh : SELECT * FROM mahasiswa WHERE id = :id
    public function single()
        {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);      
        }
        
        //fungsi untuk menghitung berapa baris baru yang berubah
        //method ini milik kita
    public function rowCount()
        {
           
            //rowCount() merupakan method milik PDO
            return $this->stmt->rowCount(); 
            //kalau berhasil mengembalikan angka 1    
        }
}