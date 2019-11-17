<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Konfigurasi Icon</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/akademik/pengaturan/simpan_icon/') ?>" method="POST" enctype="multipart/form-data">
                    <div class="my-3">
                        <label>Icon Lama</label>
                        <div class="row">
                            <div class="col-sm-2">
                                <img src="<?= base_url('assets/admin/foto/').$pengaturan->icon; ?>" width="150">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-5">
                        <label>Upload Icon Baru</label>
                        <input type="file" class="form-control" name="icon" value="<?php echo $pengaturan->icon ?>">
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