<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Simulasi Ujian</title>

    <!-- Bootstrap -->
    <link href="<<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('vendors/nprogress/nprogress.css');?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url('vendors/animate.css/animate.min.css')?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('build/css/custom.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('asset/bootstrap_3_3_6/css/bootstrap.min.css'); ?>" rel="stylesheet"> 
  </head>

  <body class="login">
  <div>
          <?php if(!($this->session->flashdata('pesan_error')=='')) :?>
<div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error!</strong> <br><?php echo $this->session->flashdata('pesan_error')?>
</div>
  <?php endif ?>
<?php if(!($this->session->flashdata('hasil')=='')) :?>
<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> <br><?php echo $this->session->flashdata('hasil')?>
</div>
  <?php endif ?>

  </div>
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
  
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          <img src="images/TWH.png" width="70%" height="50%"> </img>
            <form action="<?php echo site_url('login');?>" method="post"> 
              <h1>Login Form</h1>
              <div>
                <input name="username" type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input name="password" type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
        <button class="btn btn-default submit" type="submit">Login</button>
            
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Belum punya Akun? 
                  <a href="#signup" class="to_register"> Buat Akun</a>
                </p>

                <div class="clearfix"></div>
                <br />

  <!--               <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div> -->
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
		  <img src="images/TWH.png" width="70%" height="50%"> </img>
            <form action="<?php echo site_url('login/daftar');?>" method="post">
              <h1>Create Account</h1>
              <div>
                <input name="username" type="text" class="form-control" placeholder="Username" required="" />
              </div>
             <!--  <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div> -->
              <div>
                <input name="password" type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button class="btn btn-default submit" type="submit">Create</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Sudah punya Akun
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

<!--                 <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div> -->
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('build/js/custom.min.js');?>"></script>

    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
  </body>
</html>
