<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mx-1">Data Tahun Akademik</h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('admin/akademik/tahun_akademik/tambah_tahun_akademik'); ?>" class="btn btn-primary btn-icon-split">
                <span class='icon text-white-50'>
                  <i class='fas fa-plus'></i>
                </span>
                <span class='text'>Tambah Tahun Akademik</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun Akademik</th>
                            <th>Semester</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Tahun Akademik</th>
                            <th>Semester</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $nomor=1;
                        foreach($tahun_akademik as $tahun_akademik) :
                        ?>
                        <tr>
                            <td><?= $nomor; ?></td>
                            <td><?= $tahun_akademik->tahun_akademik; ?></td>
                            <td><?= $tahun_akademik->semester; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>admin/akademik/tahun_akademik/hapus_tahun_akademik/<?= $tahun_akademik->id_tahun_akademik; ?>" onclick="return confirm('Apa anda yakin ingin menghapus <?= $tahun_akademik->tahun_akademik ?>?')" data-toggle="tooltip" title="Hapus data Tahun Akademik" class='btn btn-danger btn-icon-split'>
                                    <span class='icon text-white-50'>
                                      <i class='fas fa-trash'></i>
                                    </span>
                                </a>
                                <a href="<?= base_url('admin/akademik/tahun_akademik/update_tahun_akademik/'.$tahun_akademik->id_tahun_akademik); ?>" data-toggle="tooltip" title="Edit data Tahun Akademik" class='btn btn-warning btn-icon-split'>
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