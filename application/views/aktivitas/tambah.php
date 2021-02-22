<div class="container">
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-header">Tambah Post</h5>
                <a href="<?= base_url('aktivitas'); ?>" class="btn btn-danger">Kembali</a>
                <div class="card-body">
                    <form action="<?= base_url() ?>Aktivitas/prosesTambah" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukkan Judul">

                        </div>
                        <div class="form-group">
                            <label for="isi">Isi</label>
                            <textarea name="isi" id="isi" class="form-control" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Foto</label>
                            <input type="file" name="image" id="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>