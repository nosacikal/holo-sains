<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
        </div>
        <div class="card-body">
            <a href="<?= base_url('siswa/tambah') ?>" class="btn btn-primary mb-4"><i class="fas fa-user-plus mr-1"></i>Tambah Data</a>
            <?php if ($siswa) : ?>
                <a href="<?= base_url('siswa/export') ?>" class="btn btn-success mb-4 float-right "><i class="fas fa-download"></i> Export Data</a>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($siswa as $dataSiswa) : ?>
                            <tr>
                                <td align="center"><?= $no++; ?></td>
                                <td><?= $dataSiswa['nis'] ?></td>
                                <td><?= $dataSiswa['nama_siswa'] ?></td>
                                <td><?= $dataSiswa['nama_kelas'] ?></td>
                                <td align="center">
                                    <a href="<?= base_url('siswa/edit/') . $dataSiswa['id_siswa'] ?>" class="btn btn-success btn-sm"><i class="fas fa-edit mr-1"></i>Edit</a>
                                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusSiswa<?= $dataSiswa['id_siswa'] ?>"><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Hapus Siswa Modal-->
<?php
foreach ($siswa as $dataSiswa) :
    $id_siswa = $dataSiswa['id_siswa'];
    $nama_siswa = $dataSiswa['nama_siswa'];
?>

    <div class="modal fade" id="hapusSiswa<?= $id_siswa ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin untuk menghapus data siswa</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tekan tombol "Hapus" Menghapus siswa dengan nama <?= $nama_siswa ?></div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                    <a class="btn btn-primary" href="<?= base_url('siswa/hapus/') . $id_siswa; ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>