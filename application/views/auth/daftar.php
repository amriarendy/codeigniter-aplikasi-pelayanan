<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi Desa - Login</title>
  <!-- Favicons -->
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="stylesheet" href="<?= base_url()?>public/admin/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>public/admin/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url()?>public/admin/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>public/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url()?>public/plugins/iCheck/square/blue.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Silahkan Login!</p>
        <form class="user" method="POST" action="<?= site_url('daftar') ?>">

          <div class="form-group">
            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?=set_value('nama');?>" required/>
          </div>

          <div class="form-group">
            <input type="number" name="nik" class="form-control" placeholder="Nomor NIK" value="<?=set_value('nik');?>" required/>
            <?php echo form_error('nik', '<div class="text-danger strong">','</div>')?>
          </div>

          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required/>
          </div>

          <div class="form-group">
            <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?=set_value('tgl_lahir');?>" required/>
          </div>

            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar Akun</button>
              <a href="<?= site_url('login'); ?>" class="btn btn-warning btn-block btn-flat">Ke Halaman Login</a>
            </div>

        </form>
      </div>
      <!-- /.login-box-body -->
    </div>
    <!-- jQuery 3 -->
    <script src="<?= base_url()?>public/admin/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url()?>public/admin/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url()?>public/plugins/iCheck/icheck.min.js"></script>

</body>
</html>
