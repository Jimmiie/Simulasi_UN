<div class="container">
<?php if(!($this->session->flashdata('error')=='')) :?>
<div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error!</strong> <?=$this->session->flashdata('error')?>
</div>
  <?php endif ?>
 <?php if(!($this->session->flashdata('hasil')=='')) :?>
<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> <?=$this->session->flashdata('hasil')?>
</div>
  <?php endif ?>
 

 <h2>Ganti Password</h2>
    <hr>

    <?php echo form_open('gpassword', array('id'=>'myform', 'class'=>'form-horizontal','method'=>'post')) ?>

		 <div class="form-group form-group-sm has-feedback  <?php set_validation_style('passwordlama')?> ">
            <?php echo form_label('Password Lama', 'passwordlama', array('class' => 'control-label col-sm-3')) ?>
		<div class="col-sm-4">
            <?php echo form_password(array('id' => 'passwordlama', 'name' => 'passwordlama','value'=>set_value('passwordlama'), 'class'=>'form-control','maxlength'=>'10','placeholder' => 'Password Lama')) ?>
            <?php set_validation_icon('passwordlama') ?>
		</div>
		<?php if (form_error('passwordlama')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
            <?php echo form_error('passwordlama', '<span class="help-block">', '</span>');?>
        </div>
		<?php endif ?>
		</div>

        <div class="form-group form-group-sm has-feedback <?php set_validation_style('password')?>">
            <?php echo form_label('Password Baru', 'password', array('class' => 'control-label col-sm-3')) ?>
		<div class="col-sm-4">
            <?php echo form_password(array('id' => 'password', 'name' => 'password','value'=>set_value('password'), 'class'=>'form-control','maxlength'=>'10','placeholder' => 'Password (Max 10 karakter)')) ?>
            <?php set_validation_icon('password') ?>
		</div>
		<?php if (form_error('password')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
            <?php echo form_error('password', '<span class="help-block">', '</span>');?>
        </div>
		<?php endif ?>
		</div>
		
		<div class="form-group form-group-sm has-feedback <?php set_validation_style('passconf')?>">
            <?php echo form_label('Konfirmasi Password', 'passconf', array('class' => 'control-label col-sm-3')) ?>
		<div class="col-sm-4">
            <?php echo form_password(array('id' => 'passconf', 'name' => 'passconf','value'=>set_value('passconf'), 'class'=>'form-control','maxlength'=>'10','placeholder' => 'Password Confirm')) ?>
            <?php set_validation_icon('passconf') ?>
		</div>
		<?php if (form_error('passconf')) : ?>
            <div class="col-sm-9 col-sm-offset-3">
            <?php echo form_error('passconf', '<span class="help-block">', '</span>');?>
        </div>
		<?php endif ?>
		</div>
		<div class="col-sm-9 col-sm-offset-3">
        <?php echo form_button(array('content'=>'Submit', 'type'=>'submit', 'class'=>'btn btn-primary', 'data-confirm'=>'Anda yakin akan mengganti password?')) ?>
		</div>
   <?php echo form_close() ?>

    <br>
    <p class="text-danger"><strong>Catatan:</strong></p>
    <p class="text-danger">Password dan Konfirmasi Password harus sama. </p>

</div>