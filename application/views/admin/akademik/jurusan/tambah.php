<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Tambah Jurusan</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/akademik/jurusan/tambah_jurusan/') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label>Kode Jurusan</label>
                        <input type="text" class="form-control" name="kode_jurusan" value="<?= set_value('kode_jurusan') ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Nama Jurusan</label>
                        <input type="text" class="form-control" name="nama_jurusan" value="<?= set_value('nama_jurusan') ?>" required>
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