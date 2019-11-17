<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Update Mata Kuliah</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/akademik/matkul/update_matkul/'.$matkul->id_matkul) ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label>Kode Mata Kuliah</label>
                        <input type="text" class="form-control" name="kode_matkul" value="<?php echo $matkul->kode_matkul ?>" readonly>
                    </div>
                    <div class="form-group my-3">
                        <label>Nama Mata Kuliah</label>
                        <input type="text" class="form-control" name="nama_matkul" value="<?php echo $matkul->nama_matkul ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>SKS</label>
                        <input type="text" class="form-control" name="sks" value="<?php echo $matkul->sks ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Semester</label>
                        <select class="form-control" name="semester">
                            <option class="form-control"><?php echo $matkul->semester ?></option>
                            <option class="form-control">1</option>
                            <option class="form-control">2</option>
                            <option class="form-control">3</option>
                            <option class="form-control">4</option>
                            <option class="form-control">5</option>
                            <option class="form-control">6</option>
                            <option class="form-control">7</option>
                            <option class="form-control">8</option>
                        </select>
                    </div>
                    <div class="form-group my-3">
                        <label>Program Studi</label>
                        <select name="id_prodi" class="form-control">
                            <?php foreach ($prodi as $prodi) { ?>
                            <option value="<?= $prodi->id_prodi ?>" <?php if($matkul->id_prodi==$prodi->id_prodi){ echo "selected"; } ?>> <?= $prodi->nama_prodi ?>
                            </option>
                            <?php } ?>
                        </select>
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