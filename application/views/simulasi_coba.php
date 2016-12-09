    <div class="container">
        <h2>Simulasi Ujian</h2>

<div style="font-weight: bold" id="quiz-time-left"></div>
<script type="text/javascript">
    var total_seconds = 60*<?php  $nama=$namasoal->row();echo $nama->waktu;?>;
    var c_minutes = parseInt(total_seconds/60);
    var c_seconds = parseInt(total_seconds%60);
    function CheckTime(){
        document.getElementById("quiz-time-left").innerHTML = 'Sisa Waktu : '+c_minutes+ ' Menit '+ c_seconds + ' Detik';
        if(total_seconds<=0){
            setTimeout('document.form.submit()',1);
        }
        else{
            total_seconds =total_seconds-1;
            c_minutes=parseInt(total_seconds/60);
            c_seconds=parseInt(total_seconds%60);
        setTimeout("CheckTime()",1000);
        }
    }
    setTimeout("CheckTime()",1000);
</script>


        <br>
        <center><h3><?php $nama=$namasoal->row(); 
                    echo $nama->nama_soal.' '.$nama->tahun_soal; ?></h3></center>
        <form  action="<?php echo site_url('simulasi/cek');?>" name="form" method="post"> 
             <!-- <input type="hidden" value="<?php echo $soal->num_rows();?>" name="soal"/>  -->
            <div class="form-group">
            <?php $no=1;
                foreach ($soal->result() as $row) {
                    echo '<label>'.$no.'. '.$row->soal.'</label><br>';
                    $pilih=$this->simulasi->pilihan($row->id_soal);
                    foreach ($pilih->result() as $pil) {
                      echo '<div class="radio"><label><input type="radio" name="soal'.$no.'" value="'.$pil->id_pil.'">'.$pil->pil.'</label></div>';
                    }
                    $no+=1;
                    echo '<br>';
            } ?>
                <br>
                <button class="btn btn-primary submit" type="submit">Submit</button>
            </div>
        </form>
</div>