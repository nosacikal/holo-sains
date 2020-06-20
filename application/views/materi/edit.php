<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?php echo form_open_multipart(); ?>
            <input type="hidden" class="form-control" id="id_materi" name="id_materi" value="<?= $materi['id_materi'] ?>">
            <div class="form-group row">
                <label for="judul_materi" class="col-sm-3 col-form-label">Judul Materi</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="judul_materi" name="judul_materi" value="<?= $materi['judul_materi'] ?>">
                    <?= form_error('judul_materi', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="sub_tema" class="col-sm-3 col-form-label">Sub Tema</label>
                <div class="col-sm-9">
                    <select class="form-control" id="exampleFormControlSelect1" name="sub_tema">
                        <option value="">- Pilih -</option>
                        <?php $no = 1;
                        foreach ($subtema as $dataSubTema) : ?>
                            <?php if ($dataSubTema['id_sub_tema'] == $materi['id_sub_tema']) : ?>
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
                <label for="isi_materi" class="col-sm-3 col-form-label">Isi Materi</label>
                <div class="col-sm-9">
                    <textarea type="text" class="form-control" id="isi_materi" name="isi_materi" rows="10"><?= $materi['isi_materi'] ?></textarea>
                    <?= form_error('isi_materi', '<small class="text-danger ">', '</small>'); ?>
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
                            <small>* biarkan kosong jika tidak diganti</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary">Edit Materi</button>
                </div>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->