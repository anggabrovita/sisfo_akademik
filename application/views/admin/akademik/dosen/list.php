<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mx-1">Data Dosen</h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('admin/akademik/dosen/tambah_dosen'); ?>" class="btn btn-primary btn-icon-split">
                <span class='icon text-white-50'>
                  <i class='fas fa-plus'></i>
                </span>
                <span class='text'>Tambah Dosen</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NID</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>NID</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $nomor=1;
                        foreach($dosen as $dosen) :
                        ?>
                        <tr>
                            <td><?= $nomor; ?></td>
                            <td><?= $dosen->nid; ?></td>
                            <td><?= $dosen->nama_lengkap; ?></td>
                            <td><?= $dosen->alamat; ?></td>
                            <td><?= $dosen->telepon; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>admin/akademik/dosen/detail_dosen/<?= $dosen->id_dosen; ?>" class='btn btn-info btn-icon-split' data-toggle="tooltip" title="Lihat detail Dosen">
                                    <span class='icon text-white-50'>
                                      <i class='fas fa-eye'></i>
                                    </span>
                                </a>
                                <a href="<?= base_url(); ?>admin/akademik/dosen/hapus_dosen/<?= $dosen->id_dosen; ?>" onclick="return confirm('Apa anda yakin ingin menghapus <?= $dosen->nama_lengkap ?>?')"class='btn btn-danger btn-icon-split'data-toggle="tooltip" title="Hapus data Dosen">
                                    <span class='icon text-white-50'>
                                      <i class='fas fa-trash'></i>
                                    </span>
                                </a>
                                <a href="<?= base_url('admin/akademik/dosen/update_dosen/'.$dosen->id_dosen); ?>" class='btn btn-warning btn-icon-split' data-toggle="tooltip" title="Edit data Dosen">
                                    <span class='icon text-white-50'>
                                      <i class='fas fa-exclamation-triangle'></i>
                                    </span>
                                </a>
                               
                            </td>
                        </tr>
                        <?php $nomor++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>