<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Pengaturan Umum Website</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/akademik/pengaturan/simpan/') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label>Judul Website</label>
                        <input type="text" class="form-control" name="judul" value="<?php echo $pengaturan->judul ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Logo Website</label>
                        <input type="text" class="form-control" name="logo" value="<?php echo $pengaturan->logo ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $pengaturan->email ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Telepon</label>
                        <input type="number" class="form-control" name="telepon" value="<?php echo $pengaturan->telepon ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Alamat</label>
                        <textarea cols="5" class="form-control" name="alamat"><?php echo $pengaturan->alamat ?></textarea>
                    </div>
                    <div class="form-group my-3">
                        <label>Alamat Facebook</label>
                        <input type="text" class="form-control" name="facebook" value="<?php echo $pengaturan->facebook ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Alamat Instagram</label>
                        <input type="text" class="form-control" name="instagram" value="<?php echo $pengaturan->instagram ?>" required>
                    </div>
                    <a href="#" class="btn btn-secondary mb-3 btn-icon-split" onclick="window.history.go(-1)">
                        <span class="icon text-white-50">
                        <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a>
                    <button type="submit" name="submit" value="Submit" class="btn btn-primary mb-3 btn-icon-split">
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