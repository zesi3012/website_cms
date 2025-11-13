<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-3 align-items-center">
        <div class="col-sm-6">
          <h1 class="m-0 text-primary">
            <i class="fas fa-tachometer-alt"></i> <b>Dashboard</b>
          </h1>
          <span class="text-muted">Control Panel</span>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- Welcome Card -->
      <div class="card shadow-sm border-0 mb-4">
        <div class="card-body bg-light rounded-3">
          <?php
          $id_user = $this->session->userdata('id');
          $user = $this->db->query("SELECT * FROM pengguna WHERE pengguna_id='$id_user'")->row();
          ?>
          <h4 class="mb-3">
            <i class="fas fa-user-check text-success"></i> Selamat Datang, 
            <b><?php echo $user->pengguna_nama; ?></b> 🎉
          </h4>
          <p class="mb-1">Anda berhasil login ke sistem.</p>
          <p class="text-muted mb-0">Gunakan menu di sidebar untuk mengelola data Anda.</p>
        </div>
      </div>

      <!-- User Info Cards -->
<style>
  .info-card {
    border: none;
    border-radius: 15px;
    background: #fff;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }
  .info-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.1);
  }
  .info-icon {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
  }
  .info-title {
    font-size: 0.9rem;
    color: #6c757d;
    margin-bottom: 3px;
  }
  .info-value {
    font-size: 1.2rem;
    font-weight: 600;
    margin: 0;
  }
  /* Warna gradasi tiap kartu */
  .bg-primary-gradient { background: linear-gradient(45deg, #007bff, #00c6ff); }
  .bg-success-gradient { background: linear-gradient(45deg, #28a745, #88d498); }
  .bg-warning-gradient { background: linear-gradient(45deg, #ffc107, #ffda79); }
  .bg-info-gradient    { background: linear-gradient(45deg, #17a2b8, #63cdda); }
</style>

<div class="row g-3">
  <!-- ID Pengguna -->
  <div class="col-md-3 col-sm-6">
    <div class="card info-card">
      <div class="card-body d-flex align-items-center">
        <div class="info-icon bg-primary-gradient me-3">
          <i class="fas fa-id-card fa-lg"></i>
        </div>
        <div>
          <div class="info-title">ID Pengguna</div>
          <div class="info-value"><?php echo $this->session->userdata('id') ?></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Username -->
  <div class="col-md-3 col-sm-6">
    <div class="card info-card">
      <div class="card-body d-flex align-items-center">
        <div class="info-icon bg-success-gradient me-3">
          <i class="fas fa-user fa-lg"></i>
        </div>
        <div>
          <div class="info-title">Username</div>
          <div class="info-value"><?php echo $this->session->userdata('username') ?></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Level -->
  <div class="col-md-3 col-sm-6">
    <div class="card info-card">
      <div class="card-body d-flex align-items-center">
        <div class="info-icon bg-warning-gradient me-3">
          <i class="fas fa-user-shield fa-lg"></i>
        </div>
        <div>
          <div class="info-title">Level</div>
          <div class="info-value"><?php echo ucfirst($this->session->userdata('level')) ?></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Status -->
  <div class="col-md-3 col-sm-6">
    <div class="card info-card">
      <div class="card-body d-flex align-items-center">
        <div class="info-icon bg-info-gradient me-3">
          <i class="fas fa-check-circle fa-lg"></i>
        </div>
        <div>
          <div class="info-title">Status</div>
          <div class="info-value text-success">Online</div>
        </div>
      </div>
    </div>
  </div>
</div>


      <!-- Additional Info / Charts Section -->
      <div class="card mt-4 shadow-sm">
        <div class="card-header bg-primary text-white">
          <i class="fas fa-chart-bar"></i> Aktivitas Sistem
        </div>
        <div class="card-body text-center text-muted">
          <p>Belum ada data aktivitas yang ditampilkan.</p>
        </div>
      </div>

    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
