<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Content Row -->
    <div class="row">
        <!-- Materi -->
        <div class="col-xl-6 col-md-6 mb-4">
            <a href="<?= base_url('materi') ?>" style="text-decoration: none !important;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xl-left font-weight-bold text-primary text-uppercase mb-1">Materi</div>
                                <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $materi; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Simulasi -->
        <div class="col-xl-6 col-md-6 mb-4">
            <a href="<?= base_url('simulasi') ?>" style="text-decoration: none !important;">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xl-left font-weight-bold text-success text-uppercase mb-1">Simulasi</div>
                                <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $simulasi; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-photo-video fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Soal Latihan -->
        <div class="col-xl-6 col-md-6 mb-4">
            <a href="<?= base_url('soal') ?>" style="text-decoration: none !important;">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xl-left font-weight-bold text-warning text-uppercase mb-1">Soal Evaluasi</div>
                                <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $soal; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-chalkboard-teacher fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- Siswa -->
        <div class="col-xl-6 col-md-6 mb-4">
            <a href="<?= base_url('siswa') ?>" style="text-decoration: none !important;">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xl-left font-weight-bold text-info text-uppercase mb-1">Siswa</div>
                                <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $siswa; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-graduation-cap fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Content Row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->