    <div class="container">
        <h2>Simulasi Ujian</h2>
        <br>
        <center>
            <h3><?php echo $nama; ?></h3>
            <h3>Skor : <?php echo $nilai; ?> (Max: 100)</h3>
        </center>
        <?php 
        $no=1;
        foreach ($id_pil as $row) {
            $soal=$this->simulasi->cekbenar($row);
            $soal1=$soal->row();
            echo $no.'. '.$soal1->soal.'<br>';
            if($soal1->benar=='1'){
                echo '<i class="fa fa-circle"></i>    '. $soal1->pil.' <i class="fa fa-check"></i><br><br>';
            }
            else{
                echo '<i class="fa fa-circle"></i>    '. $soal1->pil.' <i class="fa fa-close"> Jawaban Anda Salah</i><br>';
                $jwban=$this->simulasi->jawabanbenar($soal1->id_soal);
                $jwb=$jwban->row();
                echo '<i class="fa fa-circle"></i>    '. $jwb->pil.' <i class="fa fa-check"></i><br><br>';
            }
            $no+=1;
        } ?>
</div>