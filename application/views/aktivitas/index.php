<div class="container" style="background-color: lightblue;">
    <div class="content">
        <h1 style="text-align: center;">Aktivitas Saya</h1>
        <?php
        if ($this->session->flashdata('message')) {
        ?>
            <script type="text/javascript">
                alert('<?= $this->session->flashdata('message') ?>')
                $_session['message']
            </script>

        <?php
        }
        ?>

        <div class="row pb-3" style="padding-left: 30px;">
            <a href="<?= base_url('Aktivitas/tambah'); ?>" class="btn btn-primary align-self-center"> Tambah Kegiatan</a>
        </div>
    </div>

    <!-- <hr>
    <div class="row mt-3">
        <?php if (isset($kegiatan)) : ?>
            <?php foreach ($kegiatan as $k) : ?>
                <div class="col-md-4 mb-3">
                    <h3 class="text-truncate"><?= $k['judul']; ?></h3>
                    <p class="" style="-webkit-line-clamp:3; overflow:hidden; text-overflow:ellipsis; display: -webkit-box; -webkit-box-orient:vertical;"><?= $k['isi']; ?>
                    </p>
                    <a role="button" href="" class="btn btn-primary">Lihat &raquo;</a>
                    <a role="button" href="<?= base_url() ?>aktivitas/update/<?= $k['id'] ?>" class="btn btn-warning"> Update</a>
                    <a href="<?= base_url() ?>aktivitas/hapus/<?= $k['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus Kegiatan?')">Hapus</a>
                    <hr>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div> -->
    <div class="container" style="background-color: lightblue;">
        <div class="card mb-3 pb-5" style="max-width: 1200px; background-color: lightblue;">
            <?php if (isset($kegiatan)) : ?>
                <?php foreach ($kegiatan as $k) : ?>
                    <div class="row" style="padding-top: 25px;">
                        <div class="col-md-4" width=50px; height=30px;>
                            <img src="<?= base_url('upload/img/'); ?><?= $k['image']; ?>" class="card-img pl-5" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $k['judul']; ?></h5>
                                <p class="card-text"><?= $k['isi']; ?></p>
                                <a role="button" href="<?= base_url() ?>aktivitas/detail/<?= $k['id'] ?>" class="btn btn-outline-info"> Read More</a>
                                <a role="button" href="<?= base_url() ?>aktivitas/update/<?= $k['id'] ?>" class="btn btn-warning"> Update</a>
                                <a href="<?= base_url() ?>aktivitas/hapus/<?= $k['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus Kegiatan?')">Hapus</a>
                                <hr>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>

</div>