<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | Website Saya</title>

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
      background: #11224E;
      height: 100vh;
    }

    .register-box {
      width: 450px;
    }

    .register-icon {
      font-size: 65px;
      color: #fff;
      margin-bottom: 10px;
    }

    .card {
      border-radius: 15px;
      box-shadow: 0 5px 18px rgba(0, 0, 0, 0.2);
    }

    .card-body {
      padding: 30px;
    }

    .form-control {
      border-radius: 10px 0 0 10px;
    }

    .input-group-text {
      background: #f0f0f0;
      border-radius: 0 10px 10px 0;
    }

    .btn-primary {
      border-radius: 10px;
      padding: 10px;
      font-weight: 600;
      font-size: 16px;
    }

    .login-link a {
      color: #0d6efd;
      font-weight: 600;
    }
  </style>
</head>

<body class="hold-transition d-flex justify-content-center align-items-center">

  <div class="register-box">

    <div class="text-center mb-3">
      <i class="fas fa-user-plus register-icon"></i>
      <h3 class="text-white">Buat Akun Baru</h3>
      <p class="small">Silakan lengkapi data berikut</p>
    </div>

    <div class="card">
      <div class="card-body">

        <form method="post" action="<?= base_url('register/aksi'); ?>">

          <!-- Nama Lengkap -->
          <label>Nama Lengkap</label>
          <div class="input-group mb-2">
            <input type="text" name="nama"
              class="form-control"
              placeholder="Masukkan nama lengkap"
              value="<?= set_value('nama'); ?>">
            <div class="input-group-append">
              <div class="input-group-text"><i class="fas fa-id-card"></i></div>
            </div>
          </div>
          <?= form_error('nama','<small class="text-danger">','</small>'); ?>

          <!-- Email -->
          <label>Email</label>
          <div class="input-group mb-2">
            <input type="email" name="email"
              class="form-control"
              placeholder="Masukkan email"
              value="<?= set_value('email'); ?>">
            <div class="input-group-append">
              <div class="input-group-text"><i class="fas fa-envelope"></i></div>
            </div>
          </div>
          <?= form_error('email','<small class="text-danger">','</small>'); ?>

          <!-- Username -->
          <label>Username</label>
          <div class="input-group mb-2">
            <input type="text" name="username"
              class="form-control"
              placeholder="Masukkan username"
              value="<?= set_value('username'); ?>">
            <div class="input-group-append">
              <div class="input-group-text"><i class="fas fa-user"></i></div>
            </div>
          </div>
          <?= form_error('username','<small class="text-danger">','</small>'); ?>

          <!-- Password -->
          <label>Password</label>
          <div class="input-group mb-2">
            <input type="password" name="password"
              class="form-control"
              placeholder="Masukkan password">
            <div class="input-group-append">
              <div class="input-group-text"><i class="fas fa-lock"></i></div>
            </div>
          </div>
          <?= form_error('password','<small class="text-danger">','</small>'); ?>

          <!-- Konfirmasi Password -->
          <label>Konfirmasi Password</label>
          <div class="input-group mb-3">
            <input type="password" name="password2"
              class="form-control"
              placeholder="Ulangi password">
            <div class="input-group-append">
              <div class="input-group-text"><i class="fas fa-check-circle"></i></div>
            </div>
          </div>
          <?= form_error('password2','<small class="text-danger">','</small>'); ?>

          <button type="submit" class="btn btn-primary btn-block">
            <i class="fas fa-user-plus"></i> Daftar Sekarang
          </button>

        </form>

        <div class="mt-3 text-center login-link">
          <span>Sudah punya akun?</span>
          <a href="<?= base_url('login'); ?>">
            <i class="fas fa-sign-in-alt"></i> Login
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
