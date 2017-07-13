
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Laporan Simpanan
                            <div class="btn-group pull-right">
                                <button class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></button>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>No Bukti</th>
                                        <th>Jenis Simpanan</th>
                                        <th>Debet</th>
                                        <th>Kredit</th>
                                        <th>Saldo</th>
                                    </tr>
                                </thead>
                                
                                <tbody >
                                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>No Bukti</th>
                                        <th>Jenis Simpanan</th>
                                        <th>Debet</th>
                                        <th>Kredit</th>
                                        <th>Saldo</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <!-- /.row -->
        </div>

        

        
        
        
    <script src="<?php echo base_url();?>assets/admin-koperasi/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin-koperasi/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>assets/admin-koperasi/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin-koperasi/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin-koperasi/vendor/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/bootstrap-datepicker.min.js"></script>
    <!-- <script src="<?php echo base_url();?>/assets/js/bootstrap-datetimepicker.min.js"></script> -->

    
    
    <script src="<?php echo base_url();?>assets/admin-koperasi/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/admin-koperasi/dist/js/sb-admin-2.js"></script>

    <!--<script src="<?php echo base_url();?>assets/js/jquery-3.1.1.js"></script>-->
    <script src="<?php echo base_url();?>assets/js/easyautocomplete/jquery.easy-autocomplete.min.js"></script> <script src="<?php echo base_url();?>assets/js/easyautocomplete/jquery.easy-autocomplete.min.js"></script> 
    
    

    <style type="text/css">
    #eventForm .form-control-feedback {
        top: 0;
        right: -15px;
    }
    </style>

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip(); 

        });
    </script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

    
    <script>
    var save_method; //for save method string
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({ 

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url();?>lpsmpncontr/ajax_list",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            ],

        });

        //datepicker
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,  
        });

        //set input/textarea/select event when change value, remove class error and remove text help block 
        $("input").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

    });



    // function add_biaya()
    // {
    //     save_method = 'add';
    //     $('#form')[0].reset(); // reset form on modals
    //     $('.form-group').removeClass('has-error'); // clear error class
    //     $('.help-block').empty(); // clear error string
    //     $('#myModal').modal('show'); // show bootstrap modal
    //     $('.modal-title').text('Tambah Biaya'); // Set Title to Bootstrap modal title
    // }

    // function edit_biaya(id)
    // {
    //     save_method = 'update';
    //     $('#form')[0].reset(); // reset form on modals
    //     $('.form-group').removeClass('has-error'); // clear error class
    //     $('.help-block').empty(); // clear error string

    //     //Ajax Load data from ajax
    //     $.ajax({
    //         url : "<?php echo base_url();?>premicontr/ajax_edit/" + id,
    //         type: "GET",
    //         dataType: "JSON",
    //         success: function(data)
    //         {

    //             $('[name="id_Premi"]').val(data.id_Premi);
    //             $('[name="nama_premi"]').val(data.nama_premi);
    //             $('[name="nilai"]').val(data.nilai);
    //             $('[name="id_Staff_Pembuat"]').val(data.id_Staff_Pembuat);
    //             $('[name="id_Staff_Mod"]').val(data.id_Staff_Mod);
    //             $('[name="dateby"]').datepicker('update',data.dateby);
    //             $('[name="description"]').val(data.description);
    //             $('#myModal').modal('show'); // show bootstrap modal when complete loaded
    //             $('.modal-title').text('Edit Biaya'); // Set title to Bootstrap modal title

    //         },
    //         error: function (jqXHR, textStatus, errorThrown)
    //         {
    //             alert('Error get data from ajax');
    //         }
    //     });
    // }

    // function reload_table()
    // {
    //     table.ajax.reload(null,false); //reload datatable ajax 
    // }

    // function save()
    // {
    //     $('#btnSave').text('saving...'); //change button text
    //     $('#btnSave').attr('disabled',true); //set button disable 
    //     var url;

    //     if(save_method == 'add') {
    //         url = "<?php echo base_url();?>premicontr/ajax_add";
    //     } else {
    //         url = "<?php echo base_url();?>premicontr/ajax_update";
    //     }

    //     // ajax adding data to database
    //     $.ajax({
    //         url : url,
    //         type: "POST",
    //         data: $('#form').serialize(),
    //         dataType: "JSON",
    //         success: function(data)
    //         {

    //             if(data.status) //if success close modal and reload ajax table
    //             {
    //                 $('#myModal').modal('hide');
    //                 reload_table();
    //             }
    //             else
    //             {
    //                 for (var i = 0; i < data.inputerror.length; i++) 
    //                 {
    //                     $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
    //                     $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
    //                 }
    //             }
    //             $('#btnSave').text('save'); //change button text
    //             $('#btnSave').attr('disabled',false); //set button enable 


    //         },
    //         error: function (jqXHR, textStatus, errorThrown)
    //         {
    //             alert('Error adding / update data');
    //             $('#btnSave').text('save'); //change button text
    //             $('#btnSave').attr('disabled',false); //set button enable 

    //         }
    //     });
    // }

    // function delete_biaya(id)
    // {
    //     if(confirm('Are you sure delete this data?'))
    //     {
    //         // ajax delete data to database
    //         $.ajax({
    //             url : "<?php echo base_url();?>premicontr/ajax_delete/"+id,
    //             type: "POST",
    //             dataType: "JSON",
    //             success: function(data)
    //             {
    //                 //if success reload ajax table
    //                 $('#myModal').modal('hide');
    //                 reload_table();
    //             },
    //             error: function (jqXHR, textStatus, errorThrown)
    //             {
    //                 alert('Error deleting data');
    //             }
    //         });

    //     }
    // }
    </script>
    
</body>

</html>
