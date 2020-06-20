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
            <h6 class="m-0 font-weight-bold text-primary">Data Materi Kurikulum 2013</h6>
        </div>
        <div class="card-body">
            <a href="<?= base_url('materi/tambah') ?>" class="btn btn-primary mb-4"><i class="fas fa-plus mr-1"></i>Tambah Data</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Judul Materi</th>
                            <th>Sub</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($materi as $dataMateri) : ?>
                            <tr>
                                <td align="center"><?= $no++; ?></td>
                                <td><?= $dataMateri['judul_materi']; ?></td>
                                <td><?= $dataMateri['judul']; ?></td>
                                <td align="center">
                                    <img src="<?= base_url('assets/img/materi/') . $dataMateri['gambar'] ?>" class=" img-thumbnail" width="120" height="120">
                                </td>
                                <td align="center">
                                    <a id="detail" href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailMateri<?= $dataMateri['id_materi'] ?>"><i class="fas fa-info-circle"></i> Detail</a>
                                    <a href="<?= base_url('materi/edit/') . $dataMateri['id_materi'] ?>" class="btn btn-success btn-sm"><i class="fas fa-edit mr-1"></i>Edit</a>
                                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusMateri<?= $dataMateri['id_materi'] ?>"><i class="fas fa-trash"></i> Hapus</a>
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



<!-- Hapus Materi Modal-->
<?php
foreach ($materi as $dataMateri) :
    $id_materi = $dataMateri['id_materi'];
    $id_sub_tema = $dataMateri['id_sub_tema'];
    $judul_materi = $dataMateri['judul_materi'];
    $gambar = $dataMateri['gambar'];
?>
    <!-- Detail Materi Modal-->
    <div class="modal fade bd-example-modal-lg" id="detailMateri<?= $dataMateri['id_materi'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Materi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <fieldset disabled>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="judul" class="col-sm-4 col-form-label">Sub Tema</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $dataMateri['judul']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="judul_materi" class="col-sm-4 col-form-label">Judul Materi</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="judul_materi" name="judul_materi" value="<?= $dataMateri['judul_materi']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="isi_materi" class="col-sm-4 col-form-label">Isi Materi</label>
                                    <div class="col-sm-12">
                                        <textarea type="text" class="form-control" id="isi_materi" name="isi_materi" rows="5"><?= $dataMateri['isi_materi']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="gambar" class="col-sm-12 col-form-label">Gambar</label>
                                    <div class="col-sm-12">
                                        <img src="<?= base_url('assets/img/materi/') . $dataMateri['gambar'] ?>" class="img-thumbnail rounded" width="250" height="250">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Detail Materi Modal-->

    <!-- Hapus Materi Model -->
    <div class="modal fade" id="hapusMateri<?= $id_materi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin untuk menghapus data materi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tekan tombol "Hapus" Menghapus materi <?= $judul_materi ?></div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                    <a class="btn btn-primary" href="<?= base_url('materi/hapus/') . $id_materi; ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hapus Materi Model -->
<?php endforeach; ?>