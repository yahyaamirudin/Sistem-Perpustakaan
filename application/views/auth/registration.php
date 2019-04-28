<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>PD perpus|Login</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/css/style.css">
</head>
<body id="bg">
  <div id="scontainer">
    <div id=formbg></div>
    <div class="box">
      <form action="<?=base_url('auth/registration')?>" method="post">
        <h2>REGISTER</h2>
        <input type="text" name="fullname" placeholder="Fullname" value="<?= set_value('fullname')?>">
        <?= form_error('fullname','<small class="text-danger">','</small>') ?>

        <input type="text" name="username" placeholder="Username" value="<?= set_value('username')?>">
        <?= form_error('username','<small class="text-danger">','</small>') ?>

        <input type="text" name="id" placeholder="ID" value="<?= set_value('id')?>">
        <?= form_error('id','<small class="text-danger">','</small>') ?>

        <input type="password" name="password" placeholder="Password">
        <?= form_error('password','<small class="text-danger">','</small>') ?>

        <input type="password" name="password2" placeholder="Retype Password">
       <!--  <input type="radio" class="radio" name="level" value="1"><font style=" color:white;">Admin</font>
        <input type="radio" class="radio" name="level" value="2"><font style=" color:white;">User</font> -->
        <input type="submit" name="login" value="Login">
      </form>
      <a href="<?=base_url()?>auth/index?>">I already have a membership</a>
    </div>
  </div>
</body>
</html>
