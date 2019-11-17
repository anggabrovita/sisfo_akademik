<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mx-1">Data Mahasiswa</h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('admin/akademik/mahasiswa/tambah_mahasiswa'); ?>" class="btn btn-primary btn-icon-split">
                <span class='icon text-white-50'>
                  <i class='fas fa-plus'></i>
                </span>
                <span class='text'>Tambah Mahasiswa</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NPM</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>Nama Prodi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>NPM</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>Nama Prodi</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $nomor=1;
                        foreach($mahasiswa as $mahasiswa) :
                        ?>
                        <tr>
                            <td><?= $nomor; ?></td>
                            <td><?= $mahasiswa->npm; ?></td>
                            <td><?= $mahasiswa->nama_lengkap; ?></td>
                            <td><?= $mahasiswa->alamat; ?></td>
                            <td><?= $mahasiswa->nama_prodi; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>admin/akademik/mahasiswa/detail_mahasiswa/<?= $mahasiswa->id_mahasiswa; ?>" class='btn btn-info btn-icon-split' data-toggle="tooltip" title="Lihat detail Mahasiswa">
                                    <span class='icon text-white-50'>
                                      <i class='fas fa-eye'></i>
                                    </span>
                                </a>
                                <a href="<?= base_url(); ?>admin/akademik/mahasiswa/hapus_mahasiswa/<?= $mahasiswa->id_mahasiswa; ?>" onclick="return confirm('Apa anda yakin ingin menghapus <?= $mahasiswa->nama_lengkap ?>?')"class='btn btn-danger btn-icon-split'data-toggle="tooltip" title="Hapus data Mahasiswa">
                                    <span class='icon text-white-50'>
                                      <i class='fas fa-trash'></i>
                                    </span>
                                </a>
                                <a href="<?= base_url('admin/akademik/mahasiswa/update_mahasiswa/'.$mahasiswa->id_mahasiswa); ?>" class='btn btn-warning btn-icon-split' data-toggle="tooltip" title="Edit data Mahasiswa">
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