<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mx-1">Data Mata Kuliah</h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('admin/akademik/matkul/tambah_matkul'); ?>" class="btn btn-primary btn-icon-split">
                <span class='icon text-white-50'>
                  <i class='fas fa-plus'></i>
                </span>
                <span class='text'>Tambah Mata Kuliah</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Mata Kuliah</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th>Program Studi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode Mata Kuliah</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th>Program Studi</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $nomor=1;
                        foreach($matkul as $matkul) :
                        ?>
                        <tr>
                            <td><?= $nomor; ?></td>
                            <td><?= $matkul->kode_matkul; ?></td>
                            <td><?= $matkul->nama_matkul; ?></td>
                            <td><?= $matkul->sks; ?></td>
                            <td><?= $matkul->semester; ?></td>
                            <td><?= $matkul->nama_prodi; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>admin/akademik/matkul/hapus_matkul/<?= $matkul->id_matkul; ?>" onclick="return confirm('Apa anda yakin ingin menghapus <?= $matkul->nama_matkul ?>?')"class='btn btn-danger btn-icon-split' data-toggle="tooltip" title="Hapus data Mata Kuliah">
                                    <span class='icon text-white-50'>
                                      <i class='fas fa-trash'></i>
                                    </span>
                                </a>
                                <a href="<?= base_url('admin/akademik/matkul/update_matkul/'.$matkul->id_matkul); ?>" class='btn btn-warning btn-icon-split' data-toggle="tooltip" title="Edit data Mata Kuliah">
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