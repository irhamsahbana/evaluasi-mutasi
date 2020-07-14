<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar</title>
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/admin/'); ?>images/favicon.ico">
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="<?= base_url('assets/new_login/') ?>style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="form">

  <div class="tab-content">
    <h1>Untuk melakukan reset password, silahkan masukkan alamat email Anda</h1>

    <?php if($this->session->flashdata('message')) {?>
    <h2><span style="color: #ffffff"><?php echo $this->session->flashdata('message');?><span></h2>
    <?php }?>

    <form method="post" action="<?= site_url('Login/forgotPassword') ?>">
      <div class="field-wrap">
        <label>
          Email<span class="req">*</span>
        </label>
        <input class="form-control" type="text" name="email" id="email" value="<?php echo set_value('email');?>" required autocomplete="off">
      </div>
      <span style="color:red"><?php echo form_error('email');?></span>
      <button class="button button-block"/>Submit</button>
    </form>

  </div><!-- tab-content -->

     
      
</div> <!-- /form -->
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="<?= base_url('assets/new_login/') ?>script.js"></script>

</body>
</html>
