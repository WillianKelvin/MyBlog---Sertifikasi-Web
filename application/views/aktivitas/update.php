<div class="container">
    <div class="row mt-4">
        <div class="col-md-4">
            <?php foreach ($post as $k) : ?>
                <div class="card">
                    <h5 class="card-header">Update Kegiatan</h5>
                    <a href="<?= base_url('aktivitas'); ?>" class="btn btn-danger">Kembali</a>
                    <div class="card-body">
                        <form action="<?= base_url(); ?>Aktivitas/prosesUpdate/<?= $k['id'] ?>" method="POST">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukkan Judul" value="<?= $k['judul'] ?>">

                            </div>
                            <div class="form-group">
                                <label for="isi">Isi</label>
                                <textarea name="isi" id="isi" class="form-control" rows="3"> <?= $k['isi'] ?></textarea>

                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="<?= base_url() ?>aktivitas" class="btn btn-secondary">Batal Update</a>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>