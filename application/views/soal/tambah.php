<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <!-- form open -->
    <?php echo form_open_multipart('soal/tambah'); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group row">
                <label for="sub_tema" class="col-sm-3 col-form-label">Sub Tema</label>
                <div class="col-sm-9">
                    <select class="form-control" id="exampleFormControlSelect1" name="sub_tema">
                        <option value="">- Pilih -</option>
                        <?php $no = 1;
                        foreach ($subtema as $dataSubTema) : ?>
                            <option value="<?= $dataSubTema['id_sub_tema'] ?>"> <?= $no++ . '. ' . $dataSubTema['judul'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('sub_tema', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="pertanyaan" class="col-sm-3 col-form-label">Pertanyaan</label>
                <div class="col-sm-9">
                    <textarea type="text" class="form-control" id="pertanyaan" name="pertanyaan" rows="10"><?= set_value('pertanyaan'); ?></textarea>
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
                            <small>* Gambar Simulasi harus diisi</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label for="pilihan_A" class="col-sm-3 col-form-label">Pilihan A</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="pilihan_A" name="pilihan_A" value="<?= set_value('pilihan_A'); ?>">
                    <?= form_error('pilihan_A', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="pilihan_B" class="col-sm-3 col-form-label">Pilihan B</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="pilihan_B" name="pilihan_B" value="<?= set_value('pilihan_B'); ?>">
                    <?= form_error('pilihan_B', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="pilihan_C" class="col-sm-3 col-form-label">Pilihan C</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="pilihan_C" name="pilihan_C" value="<?= set_value('pilihan_C'); ?>">
                    <?= form_error('pilihan_C', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>
            <div class=" form-group row">
                <label for="pilihan_D" class="col-sm-3 col-form-label">Pilihan D</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="pilihan_D" name="pilihan_D" value="<?= set_value('pilihan_D'); ?>">
                    <?= form_error('pilihan_D', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="jawaban_benar" class="col-sm-3 col-form-label">Jawaban</label>
                <div class="col-sm-9">
                    <select class="form-control" id="exampleFormControlSelect1" name="jawaban_benar">
                        <option value="">- Pilih -</option>
                        <?php
                        foreach ($option as $dataOption) : ?>
                            <option value="<?= $dataOption; ?>"> <?= $jawaban[$dataOption - 1] ?> </option>
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
                <button type="submit" class="btn btn-primary">Tambah Soal</button>

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