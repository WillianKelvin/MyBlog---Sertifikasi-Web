<main class="bg-light vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mt-5">
                    <div class="card-body">
                        <form action="<?= base_url('auth'); ?>" method="POST">
                            <div class="text-center">
                                <h1>Form Login</h1>
                            </div>

                            <?php
                            if ($this->session->flashdata('message')) {
                            ?>
                                <script type="text/javascript">
                                    alert('<?= $this->session->flashdata('message') ?>')
                                </script>
                            <?php
                            }
                            ?>

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="pl-3 text-danger">', '</small>'); ?>

                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                                <?= form_error('password', '<small class="pl-3 text-danger">', '</small>'); ?>

                            </div>
                            <button type="submit" class="btn btn-primary">Masuk</button>
                        </form>
                        <small>Belum punya akun? <a href="<?= base_url('auth/register'); ?> " class="font-weight-bold">Daftar</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>