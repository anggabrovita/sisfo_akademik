<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Tambah KRS</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/akademik/krs/tambah_krs/') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label>Tahun Akademik</label>
                        <input type="text" class="form-control" name="tahun_akademik" value="<?= set_value('npm') ?>" readonly>
                    </div>
                    <div class="form-group my-3">
                        <label>NPM Mahasiswa</label>
                        <input type="text" class="form-control" name="npm" value="<?= $npm ?>" readonly>
                    </div>
                    <div class="form-group my-3">
                        <label>Mata Kuliah</label>
                        <select class="form-control" name="id_matkul" required="">
                            <option class="form-control" value="">
                                --Pilih Mata Kuliah--
                                <?php foreach ($matkul as $matkul) { ?>
                                    <option value="<?= $matkul->id_matkul ?>"><?= $matkul->nama_matkul ?></option>
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