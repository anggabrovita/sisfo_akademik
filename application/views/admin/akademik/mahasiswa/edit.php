<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Update Mahasiswa</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/akademik/mahasiswa/update_mahasiswa/') ?><?= $mahasiswa->id_mahasiswa ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label>NPM</label>
                        <input type="text" class="form-control" name="npm" value="<?php echo $mahasiswa->npm ?>" readonly>
                    </div>
                    <div class="form-group my-3">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $mahasiswa->nama_lengkap ?>" required>
                        <?php echo form_error('nama_lengkap', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group my-3">
                        <label>Alamat</label>
                        <textarea type="text" class="form-control" name="alamat" required><?php echo $mahasiswa->alamat ?></textarea>
                    </div>
                    <div class="form-group my-3">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $mahasiswa->email ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Telepon</label>
                        <input type="number" class="form-control" name="telepon" value="<?php echo $mahasiswa->telepon ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $mahasiswa->tempat_lahir ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $mahasiswa->tanggal_lahir ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option class="form-control"><?php echo $mahasiswa->jenis_kelamin ?></option>
                            <option class="form-control">Laki-laki</option>
                            <option class="form-control">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group my-3">
                        <label>Program Studi</label>
                        <select name="id_prodi" class="form-control">
                            <?php foreach ($prodi as $prodi) { ?>
                            <option value="<?= $prodi->id_prodi ?>" <?php if($mahasiswa->id_prodi==$prodi->id_prodi){ echo "selected"; } ?>> <?= $prodi->nama_prodi ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="my-4">
                        <label>Gambar</label>
                        <div class="row">
                            <div class="col-sm-2">
                                <img src="<?= base_url('assets/admin/img/').$mahasiswa->foto; ?>" width="200">
                            </div>
                        </div>
                    </div>
                    <div class="form-group my-3">
                        <input type="file" class="form-control" name="foto" value="<?php echo $mahasiswa->foto ?>">
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