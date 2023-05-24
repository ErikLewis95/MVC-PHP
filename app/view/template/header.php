<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul']; ?></title>
    <link href="<?= BASEURL; ?>/css/bootstrap.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="<?= BASEURL;?>">
                <img src="<?= BASEURL;?>/img/download.png" width="100" height="50" alt="logo" width="30" height="24">
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/mahasiswa">Mahasiswa</a>
                    </li>
                </ul>
                <form action="<?= BASEURL;?>/mahasiswa/cari" method="post">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Cari Data..." name="keyword" id="keyword"
                            autocomplete="off">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="submit" id="tombolCari">SEARCH</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>