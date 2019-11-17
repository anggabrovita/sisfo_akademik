<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mx-1">Kartu Rencana Studi (KRS)</h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-5">
        <div class="card-header py-3">
        	<center>
             <legend class="mt-3 mb-4"><strong>Kartu Rencana Studi</strong></legend><hr>  
                <table>
                    <tr>
                        <td><strong>NPM</strong></td>
                        <td>: <?= $npm ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nama Lengkap</strong></td>
                        <td>: <?= $nama_lengkap ?></td>
                    </tr>
                    <tr>
                        <td><strong>Program Studi</strong></td>
                        <td>: <?= $prodi ?></td>
                    </tr>
                    <tr>
                        <td><strong>Tahun Akademik</strong></td>
                        <td>: <?= $tahun_akademik.'&nbsp;('.$semester.')'; ?></td>
                    </tr>
                </table>
            </center>
            <a href="<?= base_url('admin/akademik/krs/tambah_krs/'.$npm.'/'.$id_tahun_akademik); ?>" class="btn mt-3 btn-primary btn-icon-split">
                <span class='icon text-white-50'>
                  <i class='fas fa-plus'></i>
                </span>
                <span class='text'>Tambah Data KRS</span>
            </a>
            <table class="table mt-3 table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor=1;
                    $jumlahSks=0;
                    foreach($krs_data as $data) :
                    ?>
                    <tr>
                        <td><?= $nomor; ?></td>
                        <td><?= $data->kode_matkul; ?></td>
                        <td><?= $data->nama_matkul; ?></td>
                        <td><?= $data->sks; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>admin/akademik/krs/hapus_krs/<?= $data->id_krs; ?>" onclick="return confirm('Apa anda yakin ingin menghapus <?= $data->kode_matkul ?>?')"class='btn btn-danger btn-icon-split' data-toggle="tooltip" title="Hapus data KRS">
                                <span class='icon text-white-50'>
                                  <i class='fas fa-trash'></i>
                                </span>
                            </a>
                        </td>
                    </tr>
                    <?php $nomor++;
                     $jumlahSks+=$data->sks?>
                    <?php endforeach; ?>
                </tbody>
                <tr>
                    <th colspan="3">Total SKS</th>
                    <td class="border font-20"> <?= $jumlahSks?></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</div>