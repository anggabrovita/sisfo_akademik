<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Tambah Dosen</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/akademik/dosen/tambah_dosen/') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label>NID</label>
                        <input type="text" class="form-control" name="nid" value="<?= set_value('nid') ?>" required>
                        <?php echo form_error('nid', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group my-3">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" value="<?= set_value('nama_lengkap') ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Alamat</label>
                        <textarea cols="5" type="text" class="form-control" name="alamat" ><?= set_value('alamat') ?></textarea>
                    </div>
                    <div class="form-group my-3">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?= set_value('email') ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Telepon</label>
                        <input type="number" class="form-control" name="telepon" value="<?= set_value('telepon') ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Gambar</label>
                        <input type="file" class="form-control" name="foto" value="<?= set_value('foto') ?>" required>
                    </div>
                    <a href="#" class="btn btn-secondary mb-3 btn-icon-split" onclick="window.history.go(-1)">
                        <span class="icon text-white-50">
                        <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a>
                    <button type="submit" name="submit" class="btn btn-primary mb-3 btn-icon-split">
                        <span class="icon text-white-50">
                        <i class="fas fa-download"></i>
                        </span>
                        <span class="text">Simpan</span>
                    </button>
                </form>               
            </div>
        </div>
    </div>
</div>