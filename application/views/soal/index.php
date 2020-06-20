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
            <h6 class="m-0 font-weight-bold text-primary">Data Soal Evaluasi</h6>
        </div>
        <div class="card-body">
            <a href="<?= base_url('soal/tambah') ?>" class="btn btn-primary mb-4"><i class="fas fa-plus mr-1"></i>Tambah Data</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>pertanyaan</th>
                            <th>jawaban</th>
                            <th>sub</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($soal as $dataSoal) : ?>
                            <?php
                            if ($dataSoal['jawaban_benar'] == 1) {
                                $jawaban = 'A';
                            } elseif ($dataSoal['jawaban_benar'] == 2) {
                                $jawaban = 'B';
                            } elseif ($dataSoal['jawaban_benar'] == 3) {
                                $jawaban = 'C';
                            } else {
                                $jawaban = 'D';
                            }

                            if (strlen($dataSoal['pertanyaan']) > 40) {
                                $pertanyaan = substr($dataSoal['pertanyaan'], 0, 40) . "...";
                            } else {
                                $pertanyaan = $dataSoal['pertanyaan'];
                            }

                            ?>
                            <tr>
                                <td align="center"><?= $no++; ?></td>
                                <td><?= $pertanyaan; ?></td>
                                <td><?= $jawaban ?></td>
                                <td><?= $dataSoal['judul'] ?></td>
                                <td align="center">
                                    <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailSoal<?= $dataSoal['id_soal_evaluasi'] ?>"><i class="fas fa-info-circle"></i> Detail</a>
                                    <a href="<?= base_url('soal/edit/') . $dataSoal['id_soal_evaluasi'] ?>" class="btn btn-success btn-sm"><i class="fas fa-edit mr-1"></i>Edit</a>
                                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusSoal<?= $dataSoal['id_soal_evaluasi'] ?>"><i class="fas fa-trash"></i> Hapus</a>
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

<?php
$no = 1;
foreach ($soal as $dataSoal) :
    $id_soal_evaluasi = $dataSoal['id_soal_evaluasi'];
    $id_sub_tema = $dataSoal['id_sub_tema'];
    $jawaban_benar = $dataSoal['jawaban_benar'];
    $pilihan_A = $dataSoal['pilihan_A'];
    $pilihan_B = $dataSoal['pilihan_B'];
    $pilihan_C = $dataSoal['pilihan_C'];
    $pilihan_D = $dataSoal['pilihan_D'];
    $gambar = $dataSoal['gambar'];
    $no++;
?>

    <?php
    if ($jawaban_benar == 1) {
        $jawaban = 'A';
    } elseif ($jawaban_benar == 2) {
        $jawaban = 'B';
    } elseif ($jawaban_benar == 3) {
        $jawaban = 'C';
    } else {
        $jawaban = 'D';
    }
    ?>

    <!-- Detail Soal Modal-->
    <div class="modal fade bd-example-modal-lg" id="detailSoal<?= $id_soal_evaluasi ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title">Detail Soal Evaluasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <fieldset disabled>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pertanyaan" class="col-sm-4 col-form-label">Sub Tema</label>
                                    <div class="col-sm-11">
                                        <select class="form-control">
                                            <option><?= $dataSoal['judul']; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pertanyaan" class="col-sm-3 col-form-label">Pertanyaan</label>
                                    <div class="col-sm-11">
                                        <textarea type="text" class="form-control" id="pertanyaan" name="pertanyaan" rows="5"><?= $dataSoal['pertanyaan']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gambar" class="col-sm-3 col-form-label">Gambar</label>
                                    <div class="col-sm-11">
                                        <img src="<?= base_url('assets/img/soal/') . $dataSoal['gambar'] ?>" class="img-thumbnail rounded" width="250" height="250">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="pilihan_A" class="col-sm-3 col-form-label">Pilihan A</label>
                                    <div class="col-sm-11">
                                        <input type="text" class="form-control" id="pilihan_A" name="pilihan_A" value="<?= $dataSoal['pilihan_A']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pilihan_B" class="col-sm-3 col-form-label">Pilihan B</label>
                                    <div class="col-sm-11">
                                        <input type="text" class="form-control" id="pilihan_B" name="pilihan_B" value="<?= $dataSoal['pilihan_B']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pilihan_C" class="col-sm-3 col-form-label">Pilihan C</label>
                                    <div class="col-sm-11">
                                        <input type="text" class="form-control" id="pilihan_C" name="pilihan_C" value="<?= $dataSoal['pilihan_C']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pilihan_D" class="col-sm-3 col-form-label">Pilihan D</label>
                                    <div class="col-sm-11">
                                        <input type="text" class="form-control" id="pilihan_D" name="pilihan_D" value="<?= $dataSoal['pilihan_D']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jawaban_benar" class="col-sm-3 col-form-label">Jawaban</label>
                                    <div class="col-sm-11">
                                        <input type="text" class="form-control" id="jawaban_benar" name="jawaban_benar" value="<?= $jawaban ?>" disabled>
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
    <!-- End Detail Soal Modal-->

    <!-- Hapus Soal Modal -->
    <div class="modal fade" id="hapusSoal<?= $id_soal_evaluasi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin untuk menghapus data materi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tekan tombol "Hapus" Menghapus soal</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                    <a class="btn btn-primary" href="<?= base_url('soal/hapus/') . $id_soal_evaluasi; ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hapus Soal Modal -->
<?php endforeach; ?>