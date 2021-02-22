<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <title><?= $judul; ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
        <div class="container">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 pl-5">
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('home'); ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('aktivitas'); ?>">Aktivitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('about_me') ?>">Tentang Saya</a>
                </li>
                <li>
                    <form class="form-inline pl-5" action="<?= base_url(); ?>aktivitas" method="POST">
                        <input class="form-control mr-sm-2" type="text" placeholder="Cari Judul.." aria-label="Search" name="cari">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
                    </form>
                </li>
                <div class="col" style="padding-left: 350px;">
                    <a class="btn btn-danger" onclick="return confirm('Yakin ingin Logout?')" href="<?= base_url('auth/'); ?>logout"> Logout</a>
                </div>
            </ul>
        </div>
    </nav>