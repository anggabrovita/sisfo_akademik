<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Detail Mahasiswa</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4"> 
                <form class="col-lg-12" action="<?php echo base_url('admin/akademik/mahasiswa/detail_mahasiswa/.$mahasiswa->id_mahasiswa') ?>" method="POST" enctype="multipart/form-data">
                    <div class="col-sm-10">
                        <table class="table table-bordered table-striped">
                        <?php foreach($mahasiswa as $mahasiswa): ?>
                            <div class="my-4">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img src="<?= base_url('assets/admin/img/').$mahasiswa->foto; ?>" width="250">
                                    </div>
                                </div>
                            </div>
                            <tr>
                                <td width="200px">NPM</td>
                                <td> <?= $mahasiswa->npm; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Nama Lengkap</td>
                                <td> <?= $mahasiswa->nama_lengkap; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Alamat</td>
                                <td> <?= $mahasiswa->alamat; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Email</td>
                                <td> <?= $mahasiswa->email; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Telepon</td>
                                <td> <?= $mahasiswa->telepon; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Tempat Lahir</td>
                                <td> <?= $mahasiswa->tempat_lahir; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Tanggal Lahir</td>
                                <td> <?= date('d-m-Y', strtotime($mahasiswa->tanggal_lahir)); ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Jenis Kelamin</td>
                                <td> <?= $mahasiswa->jenis_kelamin; ?></td>
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
    