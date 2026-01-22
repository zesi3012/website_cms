<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | Website Saya</title>

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css'); ?>">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #0f1c3f, #142b63);
      min-height: 100vh;
    }

    .login-box {
      width: 420px;
    }

    /* header icon */
    .login-header {
      text-align: center;
      margin-bottom: 25px;
    }

    .login-header i {
      font-size: 72px;
      color: #ffffff;
      margin-bottom: 8px;
    }

    .login-header h3 {
      color: #ffffff;
      font-weight: 600;
      margin-bottom: 2px;
    }

    .login-header p {
      color: #cfd8ff;
      font-size: 14px;
    }

    /* card */
    .card {
      border-radius: 22px;
      border: none;
      background: rgba(255,255,255,0.95);
      box-shadow: 0 20px 40px rgba(0,0,0,0.25);
    }

    .login-card-body {
      padding: 35px 30px;
      border-radius: 22px;
    }

    .login-box-msg {
      font-size: 14px;
      margin-bottom: 25px;
      color: #555;
    }

    /* input */
    .input-group-text {
      background: #f4f6f9;
      border-radius: 0 12px 12px 0;
    }

    .form-control {
      border-radius: 12px 0 0 12px;
      height: 46px;
    }

    /* button */
    .btn-primary {
      border-radius: 12px;
      padding: 11px;
      font-size: 15px;
      font-weight: 600;
      transition: all .3s ease;
    }

    .btn-primary:hover {
      transform: translateY(-1px);
      box-shadow: 0 8px 18px rgba(13,110,253,.4);
    }

    /* alert */
    .alert {
      border-radius: 14px;
      font-size: 14px;
    }

    /* link */
    .register-link a {
      color: #0d6efd;
      font-weight: 600;
    }

    .register-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body class="hold-transition d-flex justify-content-center align-items-center">

  <div class="login-box">

    <!-- HEADER -->
    <div class="login-header">
      <i class="fas fa-user-shield"></i>
      <h3>Selamat Datang</h3>
      <p>Silakan login untuk melanjutkan</p>
    </div>

    <!-- ALERT -->
    <?php if (isset($_GET['alert'])): ?>
      <?php if ($_GET['alert'] == 'gagal'): ?>
        <div class="alert alert-danger text-center">
          <i class="fas fa-exclamation-circle"></i> Username atau password salah
        </div>
      <?php elseif ($_GET['alert'] == 'belum_login'): ?>
        <div class="alert alert-warning text-center">
          <i class="fas fa-info-circle"></i> Silakan login terlebih dahulu
        </div>
      <?php elseif ($_GET['alert'] == 'logout'): ?>
        <div class="alert alert-success text-center">
          <i class="fas fa-check-circle"></i> Anda telah logout
        </div>
      <?php endif; ?>
    <?php endif; ?>

    <!-- CARD -->
    <div class="card">
      <div class="card-body login-card-body">

        <p class="login-box-msg">Masukkan username dan password Anda</p>

        <form action="<?= base_url('login/aksi'); ?>" method="post">

          <!-- Username -->
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control"
                   placeholder="Username" value="<?= set_value('username'); ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <?= form_error('username','<small class="text-danger">','</small>'); ?>

          <!-- Password -->
          <div class="input-group mb-4">
            <input type="password" name="password" class="form-control"
                   placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <?= form_error('password','<small class="text-danger">','</small>'); ?>

          <button type="submit" class="btn btn-primary btn-block">
            <i class="fas fa-sign-in-alt"></i> Login
          </button>
        </form>

        <div class="mt-4 text-center register-link">
          <span>Belum punya akun?</span>
          <a href="<?= base_url('register'); ?>">
            <i class="fas fa-user-plus"></i> Daftar
          </a>
        </div>

      </div>
    </div>

  </div>

  <!-- Scripts -->
  <script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('assets/dist/js/adminlte.min.js'); ?>"></script>

</body>
</html>
