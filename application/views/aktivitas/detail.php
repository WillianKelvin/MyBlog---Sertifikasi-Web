<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
</head>

<body>
    <div class="container">
        <?php foreach ($post as $k) : ?>
            <div class="card mb-3" style="background-color: lightblue;">
                <img src="<?= base_url('upload/img/'); ?><?= $k['image']; ?>" class="card-img" style="width: 25%; height:25%; margin: 50px auto;" alt="...">
                <div class="card-body">
                    <h5 class="card-title-center" style="margin-left: 450px; margin-top: 0%;"><?= $k['judul'] ?></h5>
                    <p class="card-text" style="text-indent: 45px;"><?= $k['isi']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>