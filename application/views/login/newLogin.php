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
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Administrator</a></li>
        <li class="tab"><a href="#login">Approval Committee</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Selamat Datang Kembali!</h1>
          <h4 align="center" style="color: red;">
                  <?php
                      $info = $this->session->flashdata('info');
                      if(!empty($info)){
                                  echo $info;
                      }
                  ?>
          </h4>
          
          <form method="post" action="<?= site_url('Login/loginAdmin') ?>">

          <div class="field-wrap">
            <label>
              Nomor Induk Pegawai<span class="req">*</span>
            </label>
            <input type="text" name="nip_administrator" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password_administrator" required autocomplete="off"/>
          </div>
          
          <button type="submit" class="button button-block"/>Masuk</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Selamat Datang Kembali!</h1>
          
          <form method="post" action="<?= site_url('Login/loginApproval') ?>">
          
            <div class="field-wrap">
            <label>
              Nomor Induk Pegawai<span class="req">*</span>
            </label>
            <input type="text" name="nip_approval" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password_approval" required autocomplete="off"/>
          </div>
          
<!--           <p class="forgot"><a href="#">Forgot Password?</a></p> -->
          
          <button class="button button-block"/>Masuk</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="<?= base_url('assets/new_login/') ?>script.js"></script>

</body>
</html>
