<div class="container">
    <div>
        <h2 class="h1">Soal <?php echo $nama;?></h2>
<!-- <div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content"> -->
            <div class="modal-header">
<!--                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                <h3 class="modal-title">Edit Soal</h3>
            </div>
            <div class="modal-body form">
                <form action="<?php echo base_url('soal/edit_soal_proses')?>" method="post" name="form" id="form" class="form-horizontal">
                    <input type="hidden" value="<?php echo $this->input->get('id_soal') ?>" name="id_soal"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Soal</label>
                            <div class="col-md-9">
                                <textarea name="soal" placeholder="soal" class="form-control" required="" type="textarea" ><?php echo $soal; ?></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Pilihan 1</label>
                            <div class="col-md-9">
                                <input name="pil1" placeholder="Pilihan 1" class="form-control" type="textarea" value="<?php echo $pil1; ?>" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>     
                        <div class="form-group">
                            <label class="control-label col-md-3">Pilihan 2</label>
                            <div class="col-md-9">
                                <input name="pil2" placeholder="Pilihan 2" class="form-control" type="textarea" required="" value="<?php echo $pil2; ?>">
                                <span class="help-block"></span>
                            </div>
                        </div>                          
                        <div class="form-group">
                            <label class="control-label col-md-3">Pilihan 3</label>
                            <div class="col-md-9">
                                <input name="pil3" placeholder="Pilihan 3" class="form-control" type="textarea" required="" value="<?php echo $pil3; ?>">
                                <span class="help-block"></span>
                            </div>
                        </div>                          
                        <div class="form-group">
                            <label class="control-label col-md-3">Pilihan 4</label>
                            <div class="col-md-9">
                                <input name="pil4" placeholder="Pilihan 4" class="form-control" type="textarea" required="" value="<?php echo $pil4; ?>">
                                <span class="help-block"></span>
                                <button class="btn btn-primary" type="submit" name="submit" value="tambah">Submit</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
</div>