<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Detail Dosen</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4"> 
                <form class="col-lg-12" action="<?php echo base_url('admin/akademik/dosen/detail_dosen/.$dosen->id_dosen') ?>" method="POST" enctype="multipart/form-data">
                    <div class="col-sm-10">
                        <table class="table table-bordered table-striped">
                        <?php foreach($dosen as $dosen): ?>
                            <div class="my-4">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img src="<?= base_url('assets/admin/img/').$dosen->foto; ?>" width="250">
                                    </div>
                                </div>
                            </div>
                            <tr>
                                <td width="200px">NID</td>
                                <td> <?= $dosen->nid; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Nama Lengkap</td>
                                <td> <?= $dosen->nama_lengkap; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Alamat</td>
                                <td> <?= $dosen->alamat; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Email</td>
                                <td> <?= $dosen->email; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Telepon</td>
                                <td> <?= $dosen->telepon; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div><br>
                        <a href="#" class="btn btn-secondary mb-3 ml-3 btn-icon-split" onclick="window.history.go(-1)">
                            <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </a>
                </form>               
                        </div>
                    </div>
            </div>
        </div>
    