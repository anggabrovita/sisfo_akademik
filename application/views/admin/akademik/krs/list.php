<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mx-1">Kartu Rencana Studi</h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
        	<form class="col-lg-12" action="<?php echo base_url('admin/akademik/krs/proses_krs') ?>" method="POST" enctype="multipart/form-data">
	        	<div class="form-group my-3">
		            <label>NPM Mahasiswa</label>
		            <input type="text" class="form-control col-md-6" name="npm" placeholder="Masukan NPM Mahasiswa" value="<?= set_value('npm') ?>" required>
		        </div>
		        <div class="form-group my-3">
		            <label>Tahun Akademik / Semester</label>
		            <select name="tahun_akademik" class="form-control col-md-6" required>
                        <?php foreach ($ta as $ta) { ?>
                        <option value="<?= $ta->id_tahun_akademik ?>"> <?= $ta->tahun_semester ?>
                        </option>
                        <?php } ?>
                    </select>
		        </div>
                <button type="submit" name="submit" class="btn btn-primary mb-3 btn-icon-split">
                    <span class="icon text-white-50">
                    <i class="fas fa-download"></i>
                    </span>
                    <span class="text">Proses</span>
                </button>
		    </form>
        </div>
    </div>
</div>