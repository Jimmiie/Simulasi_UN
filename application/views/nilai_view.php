	<div class="container">
          <h3>Data Nilai</h3>
        <br />
      <!--  <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Add Person</button>-->
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                <th>Nama User</th>
				<th>Mata Pelajaran</th>
				<th>Tahun</th>
                <th>Nilai</th>
                <th>Tanggal Coba</th>
                    <!-- <th style="width:125px;">Action</th> -->
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 
	
	   scrollY:        "450px",
        scrollX:        true,
        scrollCollapse: true,
       // paging:         false,
       /* columnDefs: [
            { width: '90%', targets: 2 }
        ],*/
        //fixedColumns: {leftColumns: 2,rightColumns: 1,heightMatch: 'auto'},

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('nilai/ajax_list')?>",
            "type": "POST"
        },
    });
});

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

</script>
</body>
</html>