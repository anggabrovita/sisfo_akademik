<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Update Dosen</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/akademik/dosen/update_dosen/') ?><?= $dosen->id_dosen ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label>NID</label>
                        <input type="text" class="form-control" name="nid" value="<?php echo $dosen->nid ?>" readonly>
                    </div>
                    <div class="form-group my-3">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $dosen->nama_lengkap ?>" required>
                        <?php echo form_error('nama_lengkap', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group my-3">
                        <label>Alamat</label>
                        <textarea type="text" class="form-control" name="alamat" required><?php echo $dosen->alamat ?></textarea>
                    </div>
                    <div class="form-group my-3">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $dosen->email ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Telepon</label>
                        <input type="number" class="form-control" name="telepon" value="<?php echo $dosen->telepon ?>" required>
                    </div>
                    <div class="my-4">
                        <label>Gambar</label>
                        <div class="row">
                            <div class="col-sm-2">
                                <img src="<?= base_url('assets/admin/img/').$dosen->foto; ?>" width="200">
                            </div>
                        </div>
                    </div>
                    <div class="form-group my-3">
                        <input type="file" class="form-control" name="foto" value="<?php echo $dosen->foto ?>">
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