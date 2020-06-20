<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <!-- form open -->
    <?php echo form_open_multipart(); ?>
    <div class="row">
        <div class="col-lg-6">
            <input type="hidden" value="<?= $soal['id_soal_evaluasi'] ?>">
            <div class="form-group row">
                <label for="sub_tema" class="col-sm-3 col-form-label">Sub Tema</label>
                <div class="col-sm-9">
                    <select class="form-control" id="exampleFormControlSelect1" name="sub_tema">
                        <option value="">- Pilih -</option>
                        <?php $no = 1;
                        foreach ($subtema as $dataSubTema) : ?>
                            <?php if ($dataSubTema['id_sub_tema'] == $soal['id_sub_tema']) : ?>
                                <option value="<?= $dataSubTema['id_sub_tema'] ?>" selected> <?= $no++ . '. ' . $dataSubTema['judul'] ?></option>
                            <?php else : ?>
                                <option value="<?= $dataSubTema['id_sub_tema'] ?>"> <?= $no++ . '. ' . $dataSubTema['judul'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('sub_tema', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="pertanyaan" class="col-sm-3 col-form-label">Pertanyaan</label>
                <div class="col-sm-9">
                    <textarea type="text" class="form-control" id="pertanyaan" name="pertanyaan" rows="10"><?= $soal['pertanyaan']; ?></textarea>
                    <?= form_error('pertanyaan', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3">Gambar</div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label class="custom-file-label" for="gambar">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- <div class="form-group row">
                <label for="jawaban_benar" class="col-sm-3 col-form-label">Jawaban</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="jawaban_benar" name="jawaban_benar" value="<?= $soal['jawaban_benar']; ?>">
                    <?= form_error('jawaban_benar', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div> -->
            <div class="form-group row">
                <label for="pilihan_A" class="col-sm-3 col-form-label">Pilihan A</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="pilihan_A" name="pilihan_A" value="<?= $soal['pilihan_A']; ?>">
                    <?= form_error('pilihan_A', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="pilihan_B" class="col-sm-3 col-form-label">Pilihan B</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="pilihan_B" name="pilihan_B" value="<?= $soal['pilihan_B']; ?>">
                    <?= form_error('pilihan_B', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="pilihan_C" class="col-sm-3 col-form-label">Pilihan C</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="pilihan_C" name="pilihan_C" value="<?= $soal['pilihan_C']; ?>">
                    <?= form_error('pilihan_C', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>
            <div class=" form-group row">
                <label for="pilihan_D" class="col-sm-3 col-form-label">Pilihan D</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="pilihan_D" name="pilihan_D" value="<?= $soal['pilihan_D']; ?>">
                    <?= form_error('pilihan_D', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="jawaban_benar" class="col-sm-3 col-form-label">Jawaban</label>
                <div class="col-sm-9">
                    <select class="form-control" id="jawaban_benar" name="jawaban_benar">
                        <option value="">- Pilih -</option>
                        <?php $no = 1;
                        foreach ($option as $dataOption) : ?>
                            <?php if ($dataOption == $soal['jawaban_benar']) : ?>
                                <option value="<?= $dataOption; ?>" selected> <?= $jawaban[$dataOption - 1] ?> </option>
                            <?php else : ?>
                                <option value="<?= $dataOption; ?>"> <?= $jawaban[$dataOption - 1] ?> </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('jawaban_benar', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

        </div>
    </div>
    <!-- button -->
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group row justify-content-end mr-2">
                <button type="submit" class="btn btn-primary">Edit Soal</button>

            </div>
        </div>
    </div>
    <!-- button -->
    </form>
    <!-- form close -->



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->