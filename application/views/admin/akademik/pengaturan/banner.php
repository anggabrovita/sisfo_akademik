<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Konfigurasi Banner</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/akademik/pengaturan/simpan_banner/') ?>" method="POST" enctype="multipart/form-data">
                    <div class="my-4">
                        <label>Banner Lama</label>
                        <div class="row">
                            <div class="col-sm-2">
                                <img src="<?= base_url('assets/admin/foto/').$pengaturan->banner; ?>" width="550">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-5">
                        <label>Upload Banner Baru</label>
                        <input type="file" class="form-control" name="banner" value="<?php echo $pengaturan->banner ?>">
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