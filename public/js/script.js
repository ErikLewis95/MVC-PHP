$(function() {  
    // untuk tambha data
    $('.tombolTambahData').on('click', function(){
        $('#judulModal').html('Tambah Data Mahasiswa')
        $('.modal-footer button[type=submit]').html('Tambah Data');
    
    })

    // ketika diclick class yg namanya tombolModalUbah jalankan fungsinya
    $('.tombolUbahData').on('click', function(){
        // ubah id JudulModal dengan tulisan Ubah Data Mahasiswa
        $('#judulModal').html('Ubah Data Mahasiswa')
        //ubah tulisan tombol menjadi  Ubah Data
        $('.modal-footer button[type=submit]').html('Ubah Data');
        
        //problem ketika tombol ubah di click yang terjadi adalah malah menambah data baru tdk merubah datanya, itu karena pada <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post"> menggunakan method tambah ubah method tersebut menjadi ubah seperti scrip dibawah ini.
        //jquery cari element yang nama class modal-body cari form didalamnya dan ubah attributnya yang name action menjadi method ubah
        $('.modal-body form').attr('action', 'http://localhost/MVC-PHP/public/mahasiswa/ubah');



       
        // this tombol yang akan diclick ambil data yang namanya id
        const id = $(this).data('id');
          console.log(id);//hasilnya ketika diclik tombol ubah maka akan muncul id untuk setiap datanya. 

        //jalankan ajax
        $.ajax({
            // app: http://localhost/MVC-PHP/public, controller: /mahasiswa, method: /getubah. artinya mau ambil data dari url mana dengan menggunakan urlnya.
            url: 'http://localhost/MVC-PHP/public/mahasiswa/getUbah',
            //id kiri nama data yang dikirimkan dan id yang kanan isi data
            data: {id : id},
            //dikirimkan menggunakan method apa?
            method: 'post',
            //type datanya mau apa? bisa text biasa atau json
            dataType : 'json',

            // kalau permintaan ke url nya berhasil kalau ada data yang akan dikembalikan maka akan ditangkap sama parameter data
            success: function(data){
                // console.log(data); untuk melihat data di console dengan method getUbah dimana data ini akan menangkap object json.
                //Jquery carikan saya element yang idnya 'nama'.
                $('#nama').val(data.nama);
                //kalau di php ambil objek pakai -> kalau javascript pake.
                $('#email').val(data.email);
                $('#nrp').val(data.nrp);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
                // datanya akan dikirimkan ke method ubah
            } 
        });
    });



});

//jquery tolong carikan saya sebuah element yang nama classnya tampilModalUbah ketika di click jalankan fungsi berikut ini
   
// . untuk mencari class dan # untuk mencari id 

//$(document).ready(function() =$(function(){});

//baris ini akan dijalankan ketika halaman telah selesai di load

//ketika dokumennya sudah siap jalankan methodnya

