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
            <h6 class="m-0 font-weight-bold text-primary">Data Simulasi Hologram </h6>
        </div>
        <div class="card-body">
            <a href="<?= base_url('simulasi/tambah') ?>" class="btn btn-primary mb-4"><i class="fas fa-plus mr-1"></i>Tambah Data</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Judul Simulasi</th>
                            <th>Sub</th>
                            <th>Keyword</th>
                            <th>Video</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($simulasi as $dataSimulasi) : ?>
                            <tr>
                                <td align="center"><?= ++$start; ?></td>
                                <td><?= $dataSimulasi['judul_simulasi']; ?></td>
                                <td><?= $dataSimulasi['judul']; ?></td>
                                <td><?= $dataSimulasi['keyword']; ?></td>

                                <td align="center">
                                    <video width="180" height="120" Pause>
                                        <source src="<?= base_url('assets/img/simulasi/') . $dataSimulasi['video']; ?>" type="video/mp4">
                                    </video>
                                </td>
                                <td align="center">
                                    <a href="<?= base_url('simulasi/edit/') . $dataSimulasi['id_simulasi'] ?>" class="btn btn-success btn-sm"><i class="fas fa-edit mr-1"></i>Edit</a>
                                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusSimulasi<?= $dataSimulasi['id_simulasi'] ?>"><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>

                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->




<!-- Hapus Simulasi Modal-->
<?php
foreach ($simulasi as $dataSimulasi) :
    $id_simulasi = $dataSimulasi['id_simulasi'];
    $judul_simulasi = $dataSimulasi['judul_simulasi'];
?>

    <div class="modal fade" id="hapusSimulasi<?= $id_simulasi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin untuk menghapus data simulasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tekan tombol "Hapus" Menghapus materi <?= $judul_simulasi ?></div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                    <a class="btn btn-primary" href="<?= base_url('simulasi/hapus/') . $id_simulasi; ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>