<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Tambah Prodi</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/akademik/prodi/tambah_prodi/') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label>Kode Prodi</label>
                        <input type="text" class="form-control" name="kode_prodi" value="<?= set_value('kode_prodi') ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Nama Prodi</label>
                        <input type="text" class="form-control" name="nama_prodi" value="<?= set_value('nama_prodi') ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Nama Jurusan</label>
                        <select class="form-control" name="id_jurusan" required="">
                            <option class="form-control" value="">
                                --Pilih Jurusan--
                                <?php foreach ($jurusan as $jurusan) { ?>
                                    <option value="<?= $jurusan->id_jurusan ?>"><?= $jurusan->nama_jurusan ?></option>
                                <?php } ?>
                            </option>
                        </select>
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