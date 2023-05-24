<div class="container mt-3">
    <!-- flasher massage  -->
    <div class="row">
        <div class="col-lg-6">
            <!-- panggil class Flasher dan method static dengan ::flash(); -->
            <?php Flasher::flash(); ?>
            <!-- agar pesannya terset simpan di controllers/Mahasiswa.php -->
        </div>
    </div>

    <!--Menampilkan data Mahasiswa  -->
    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal"
                data-bs-target="#formModal">
                Tambah Data Mahasiswa
            </button>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <!-- perulangan untuk data mahasiswa hingga mahasiswa ke n -->
                <?php foreach( $data['mhs'] as $mhs) : ?>
                <li class="list-group-item ">
                    <!-- menampilkan hanya nama mahasiswa -->
                    <?= $mhs['nama']?>

                    <!-- detailnya akan mengirikan id dari mahasiswanya -->
                    <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']?> " class="badge bg-danger float-end ms-1"
                        style="text-decoration: none;" onclick="return confirm('Yakin ingin Menghapus?')">DELETE</a>

                    <!--class tampilModalUbah merupakan class yang digunakan untuk mencari document didalam script js  -->
                    <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']?> "
                        class="badge bg-success float-end ms-1 tombolUbahData" style="text-decoration: none;"
                        data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs['id']; ?>">EDIT</a>
                    <!-- data-bs-toggle & data-bs-target merupakan atribut yang sama ketika dengan button tombol ketriger maka modal muncul namun isi formnya sama dibutuhkan ajax untuk mengubah-->

                    <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']?> " class="badge bg-primary float-end ms-1"
                        style="text-decoration: none;">DETAIL</a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!--formModal ini merupakan form yang akan ke trigger ketika button Tambah Data Mahasiswa di pencet data-bs-target harus sama dengan dengan id modal dibawah  -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <!-- aria-labelledby = id -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Tambah Data Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- manfaatkan class modal-body untuk mengubah method saat mengclick tombol ubah -->
            <div class="modal-body">
                <!-- menggunakan method tambah -->
                <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
                    <!--input ini khusus mengirimkan id ketika mengubah type hidden agar tidak kelihatan  -->
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <!-- propety name gunanya agar dapat diambil assoc array -->
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" id="email" type="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="nrp">NRP</label>
                        <input type="number" class="form-control" name="nrp" id="nrp">
                    </div>

                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select name="jurusan" class="form-control" id="jurusan">
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                            <option value="Teknik Sipil">Tenik Sipil</option>
                            <option value="Teknik Lingkungan">Tenik Lingkungan</option>
                            <option value="Teknik Planalogi">Teknik Planalogi</option>
                        </select>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- agar dapat mengirimkan data jgn tipenya button tapi submit mengirimkan semua data -->
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>

        </div>
    </div>
</div>