<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href=" <?= base_url('admin') ?>"">
        <div class=" sidebar-brand-icon rotate-n-15">
        <i class="fas fa-flask"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Holo Sains</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $this->uri->segment(1) == 'admin' || $this->uri->segment(1) == '' ? 'active' : ''; ?> ">
        <a class="nav-link" href="<?= base_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Monitoring</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Mata Pelajaran
    </div>

    <li class="nav-item <?= $this->uri->segment(1) == 'materi' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('materi') ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>Materi</span></a>
    </li>
    <li class="nav-item <?= $this->uri->segment(1) == 'simulasi' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('simulasi') ?>">
            <i class="fas fa-fw fa-photo-video"></i>
            <span>Simulasi</span></a>
    </li>
    <li class="nav-item <?= $this->uri->segment(1) == 'soal' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('soal') ?>">
            <i class="fas fa-fw fa-chalkboard-teacher"></i>
            <span>Soal</span></a>
    </li>
    <li class="nav-item <?= $this->uri->segment(1) == 'siswa' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('siswa') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Siswa</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout') ?> " data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->