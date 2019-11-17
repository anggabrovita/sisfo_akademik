<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mx-1">Data Program Studi</h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('admin/akademik/prodi/tambah_prodi'); ?>" class="btn btn-primary btn-icon-split">
                <span class='icon text-white-50'>
                  <i class='fas fa-plus'></i>
                </span>
                <span class='text'>Tambah Prodi</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Prodi</th>
                            <th>Nama Prodi</th>
                            <th>Nama Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode Prodi</th>
                            <th>Nama Prodi</th>
                            <th>Nama Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $nomor=1;
                        foreach($prodi as $prodi) :
                        ?>
                        <tr>
                            <td><?= $nomor; ?></td>
                            <td><?= $prodi->kode_prodi; ?></td>
                            <td><?= $prodi->nama_prodi; ?></td>
                            <td><?= $prodi->nama_jurusan; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>admin/akademik/prodi/hapus_prodi/<?= $prodi->id_prodi; ?>" onclick="return confirm('Apa anda yakin ingin menghapus <?= $prodi->nama_prodi ?>?')"class='btn btn-danger btn-icon-split' data-toggle="tooltip" title="Hapus data Prodi">
                                    <span class='icon text-white-50'>
                                      <i class='fas fa-trash'></i>
                                    </span>
                                </a>
                                <a href="<?= base_url('admin/akademik/prodi/update_prodi/'.$prodi->id_prodi); ?>" class='btn btn-warning btn-icon-split' data-toggle="tooltip" title="Edit data Prodi">
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