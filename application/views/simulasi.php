    <div class="container">
        <h3>Simulasi Ujian</h3>
        <br>
        <form  action="<?php echo site_url('simulasi');?>" method="get"> 
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="text" name="search" class="form-control" placeholder="Seacrh"> 
                </div>
                <button class="btn btn-primary submit" type="submit">Search</button>
            </div>
        </form>
        <h4>List Soal</h4>
        <ul>
            <?php  foreach($list->result() as $row){
                // $id_paket=$row->id_paket;
                echo '<li><a href="'.base_url('simulasi/coba?id_paket='.$row->id_paket).'">'.$row->nama_soal.' '.$row->tahun_soal.'</a></li>';
                }?>
        </ul>
</div>
