<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?php echo form_open(); ?>
            <input type="hidden" value="<?= $siswa['id_siswa']; ?>">
            <div class="form-group row">
                <label for="nis" class="col-sm-3 col-form-label">NIS</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nis" name="nis" value="<?= $siswa['nis'] ?>">
                    <?= form_error('nis', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_siswa" class="col-sm-3 col-form-label">Nama Siswa</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>">
                    <?= form_error('nama_siswa', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary">Edit Siswa</button>
                </div>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->