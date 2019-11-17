<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Pengaturan Informasi Universitas</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/akademik/pengaturan/simpan_info/') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label>Pengumuman Univ.</label>
                        <textarea cols="5" class="form-control" name="info"><?php echo $pengaturan->info ?></textarea>
                    </div>
                    <div class="form-group my-3">
                        <label>Tentang Univ.</label>
                        <textarea cols="5" class="form-control" name="tentang"><?php echo $pengaturan->tentang ?></textarea>
                    </div>
                    <div class="form-group my-3">
                        <label>Visi</label>
                        <textarea cols="5" class="form-control" name="visi"><?php echo $pengaturan->visi ?></textarea>
                    </div>
                    <div class="form-group my-3">
                        <label>Misi</label>
                        <textarea cols="5" class="form-control" name="misi"><?php echo $pengaturan->misi ?></textarea>
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