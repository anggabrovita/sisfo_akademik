<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Tambah Mata Kuliah</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/akademik/matkul/tambah_matkul/') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label>Kode Mata Kuliah</label>
                        <input type="text" class="form-control" name="kode_matkul" value="<?= set_value('kode_matkul') ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Nama Mata Kuliah</label>
                        <input type="text" class="form-control" name="nama_matkul" value="<?= set_value('nama_matkul') ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>SKS</label>
                        <input type="text" class="form-control" name="sks" value="<?= set_value('sks') ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Semester</label>
                        <select class="form-control" name="semester" required="">
                            <option class="form-control" value="">
                                --Pilih Semester--
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                            </option>
                        </select>
                    </div>
                    <div class="form-group my-3">
                        <label>Nama Jurusan</label>
                        <select class="form-control" name="id_prodi" required="">
                            <option class="form-control" value="">
                                --Pilih Jurusan--
                                <?php foreach ($prodi as $prodi) { ?>
                                    <option value="<?= $prodi->id_prodi ?>"><?= $prodi->nama_prodi ?></option>
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