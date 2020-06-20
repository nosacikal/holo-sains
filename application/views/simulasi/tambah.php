<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <?php echo form_open_multipart('simulasi/tambah'); ?>
            <div class="form-group row">
                <label for="judul_simulasi" class="col-sm-3 col-form-label">Judul Simulasi</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="judul_simulasi" name="judul_simulasi">
                    <?= form_error('judul_simulasi', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

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
                <label for="keyword" class="col-sm-3 col-form-label">Keyword Hologram</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="keyword" name="keyword">
                    <?= form_error('keyword', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3">Video</div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="video" name="video">
                                <label class="custom-file-label" for="video">Pilih Video</label>
                            </div>
                            <small>* Video Simulasi harus diisi</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary">Tambah Simulasi</button>
                </div>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->