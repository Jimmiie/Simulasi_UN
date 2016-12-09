<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentellela Alela! | </title>

    <link href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('build/css/custom.min.css');?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
  </head> 
 <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url('home'); ?>" class="site_title"><i class="fa fa-paw"></i> <span>Simulasi UN</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
           <!--    <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div> -->
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata('username'); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
<br><br><br>
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <!-- <h3>General</h3> -->
                <ul class="nav side-menu">
                <?php if($this->session->userdata('level')=='admin'): ?>
                <li><a href="<?php echo base_url('user'); ?>"><i class="fa fa-user"></i>User</a></li>             
                 <li><a href="<?php echo base_url('soal'); ?>"><i class="fa fa-edit"></i>Soal</a></li>
                  <li><a href="<?php echo base_url('nilai'); ?>"><i class="fa fa-bar-chart-o"></i> Nilai</a></li>
                <?php endif ?>
                 <?php if($this->session->userdata('level')=='user'): ?>
                  <li><a href="<?php echo base_url('simulasi'); ?>"><i class="fa fa-edit"></i>Simulasi</a></li>
                  <li><a href="<?php echo base_url('nilai'); ?>"><i class="fa fa-bar-chart-o"></i> Nilai</a></li>
                <?php endif ?>
				  </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
         <br> Aplikasi Simulasi UN

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $this->session->userdata('username'); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo base_url('gpassword'); ?>"><i class="fa fa-gear pull-right"></i> Change Password</a></li>
                    <li><a href="<?php echo base_url('login/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

               </ul>
               </nav>
		</div>
		</div>
		
    <div class="right_col" role="main">
    <?php $this->load->view($main_view); ?></div>
	</div>
      <footer>
          <div class="pull-right">
            Simulasi UN buatan 3 Matahari
          </div>
          <div class="clearfix"></div>
        </footer>
	</div>
    <script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('build/js/custom.min.js');?>"></script>

    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
  </body>
</html>
