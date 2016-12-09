<div class="container">
    <div>
        <h2 class="h1">Soal <?php echo $judul;?></h2>
        <a class="btn btn-sm btn-primary" href="#" title="View" onclick="tambah_soal()"><i class="glyphicon glyphicon-pencil"></i> Tambah Soal</a>
        <br><br>
        <?php $no=1;
        foreach($soal->result() as $row) {
        	echo '<p>'.$no.' . '.$row->soal.'<br>';
        	$id_soal=$row->id_soal;
        	$pil=$this->lihat->pil($id_soal);
        	foreach ($pil->result() as $pil1) {
        		if($pil1->benar==1){
        		echo '<i class="fa fa-circle"></i>    '. $pil1->pil.' <i class="fa fa-check"></i><br>';
        		}
        		else{
        			echo '<i class="fa fa-circle"></i>    '.$pil1->pil.'<br>';
        		}
        	}
        	echo '<a class="btn btn-sm btn-primary" href="'.base_url('soal/edit_soal?id_soal=').$row->id_soal.'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a> <a class="btn btn-sm btn-danger" onclick="return konfirmasi()" href="'.base_url('soal/hapus?id_soal=').$row->id_soal.'&id_paket='.$this->input->get('id_paket').'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Hapus</a> </p>';
        	$no+=1;
        	}?>
    </div>
</div>
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Tambah soal</h3>
            </div>
            <div class="modal-body form">
                <form action="<?php echo base_url('soal/edit')?>" method="post" name="form" id="form" class="form-horizontal">
                    <input type="hidden" value="<?php echo $this->input->get('id_paket') ?>" name="id_paket"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Soal</label>
                            <div class="col-md-9">
                                <textarea name="soal" placeholder="soal" class="form-control" required=""></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Pilihan 1</label>
                            <div class="col-md-9">
                                <input name="pil1" placeholder="Pilihan 1" class="form-control" type="textarea" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>     
                        <div class="form-group">
                            <label class="control-label col-md-3">Pilihan 2</label>
                            <div class="col-md-9">
                                <input name="pil2" placeholder="Pilihan 2" class="form-control" type="textarea" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>                          
                        <div class="form-group">
                            <label class="control-label col-md-3">Pilihan 3</label>
                            <div class="col-md-9">
                                <input name="pil3" placeholder="Pilihan 3" class="form-control" type="textarea" required="">
                                <span class="help-block"></span>
                            </div>
                        </div>                          
                        <div class="form-group">
                            <label class="control-label col-md-3">Pilihan 4</label>
                            <div class="col-md-9">
                                <input name="pil4" placeholder="Pilihan 4" class="form-control" type="textarea" required="">
                                <span class="help-block"></span>
                                <button class="btn btn-primary" type="submit" name="submit" value="tambah">Submit</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
<!--             <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div> -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script type="text/javascript">

var save_method; //for save method string
var table;
function tambah_soal()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Soal'); // Set Title to Bootstrap modal title
}

function konfirmasi()
{
    if(confirm('Anda yakin ingin menghapus soal ini?')){
        return true;
    }
    else{
        return false;
    }

}

</script>