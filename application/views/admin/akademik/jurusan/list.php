<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mx-1">Data Jurusan</h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('admin/akademik/jurusan/tambah_jurusan'); ?>" class="btn btn-primary btn-icon-split">
                <span class='icon text-white-50'>
                  <i class='fas fa-plus'></i>
                </span>
                <span class='text'>Tambah Jurusan</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Jurusan</th>
                            <th>Nama Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode Jurusan</th>
                            <th>Nama Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $nomor=1;
                        foreach($jurusan as $jurusan) :
                        ?>
                        <tr>
                            <td><?= $nomor; ?></td>
                            <td><?= $jurusan->kode_jurusan; ?></td>
                            <td><?= $jurusan->nama_jurusan; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>admin/akademik/jurusan/hapus_jurusan/<?= $jurusan->id_jurusan; ?>" onclick="return confirm('Apa anda yakin ingin menghapus <?= $jurusan->nama_jurusan ?>?')"class='btn btn-danger btn-icon-split' data-toggle="tooltip" title="Hapus data Jurusan">
                                    <span class='icon text-white-50'>
                                      <i class='fas fa-trash'></i>
                                    </span>
                                </a>
                                <a href="<?= base_url('admin/akademik/jurusan/update_jurusan/'.$jurusan->id_jurusan); ?>" class='btn btn-warning btn-icon-split' data-toggle="tooltip" title="Edit data Jurusan">
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