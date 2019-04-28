<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>PD perpus|Login</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="http://localhost/perpusv2/assets/css/style.css">
</head>

<body id="bg">
  <div id="scontainer">
    <div id=formbg></div>
    <div class="box">
      <form action="<?= base_url('auth/index'); ?>" method="post">
        <h1><b>PD</b>perpus</h1>
        <hr>
        <h2>LOGIN</h2>
        <input type="text" name="username" placeholder="Username" value="<?= set_value('fullname') ?>">
        <?= form_error('username', '<small class="text-danger">', '</small>') ?>
        <input type="password" name="password" placeholder="Password">
        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
        <input type="submit" name="login" value="Login">
      </form>
      <a href="<?= base_url() ?>auth/registration?>" class="text-center">Register a new membership</a>
    </div>
  </div>
</body>

</html>