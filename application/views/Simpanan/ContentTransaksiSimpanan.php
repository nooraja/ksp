        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bukti Transaksi Simpanan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Tabel Bukti Transaksi Simpanan 
                            <div class="btn-group pull-right">
                                <button class="btn btn-danger btn-xs" onclick="add_simpanan()" data-toggle="modal" data-target=""><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add category"></i></button>
                                <button class="btn btn-default btn-xs" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i></button>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>No Bukti</th>
                                        <th>Tgl Transaksi</th>
                                        <th>Jenis Simpanan</th>
                                        <th>Debet</th>
                                        <th>Kredit</th>
                                        <th>Saldo</th>
                                        <th style="width:125px;">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody >
                                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No Bukti</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Jenis Simpanan</th>
                                        <th>Debet</th>
                                        <th>Kredit</th>
                                        <th>Saldo</th>
                                        <th style="width:125px;">Action</th>
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

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Person Form</h3>
                    </div>
                    <div class="modal-body form">
                        <form action="#" id="form" class="form-horizontal">
                            <input type="hidden" value="" name="id"/> 
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">No Bukti</label>
                                    <div class="col-md-9">
                                        <input name="id_Bukti_Simpanan" placeholder="No Simpanan" class="form-control" type="text" value="<?php echo set_value('id_Bukti_Simpanan', 'TS'.rand(1000, 9999)); ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">No Simpanan</label>
                                    <div class="col-md-9">
                                        <input name="id_Simpanan" placeholder="First Name" class="form-control" type="text" >
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Jenis Simpanan</label>
                                    <div class="col-md-9">
                                        <select name="id_Jenis_Simpanan" id="id_jenis_simpanan" class="form-control">
                                            <option value="">--Select Jenis Simpanan--</option>
                                            <option value="JS0001">Simpanan Pokok</option>
                                            <option value="JS0002">Simpanan Wajib</option>
                                            <option value="JS0003">Simpanan Sukarela</option>
                                            <option value="JS0004">Simpanan Pendidikan</option>
                                            <option value="JS0005">Simpanan Rencanan</option>
                                            <option value="JS0006">Simpanan Lebaran</option>

                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Debet</label>
                                    <div class="col-md-9">
                                        <input id="debet" name="debet" value="0" placeholder="Debet Simpanan" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Kredit</label>
                                    <div class="col-md-9">
                                        <input name="kredit" value="0" placeholder="Kredit Simpanan" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Transaksi</label>
                                    <div class="col-md-9">
                                        <input name="dateby" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                        <input name="id_Staff_Pembuat"  placeholder="" class="form-control" type="hidden" value="<?php echo $staff; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Status</label>
                                    <div class="col-md-9">
                                        <input name="status_bukti_simpanan" placeholder="1 = ya dan 0 = tidak" class="form-control" type="text" >
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
        
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

    <script type="text/javascript">
        
        var optionsid = {
            // url: "<?php echo base_url();?>js/countries.json",
            // url: "<?php echo base_url();?>datos/getdatos",
            url: "<?php echo base_url();?>transsimpanancontr/getjenissimpanan",
            
            // getValue: "ciudad",

            getValue: function(element) {
                return element.id_jenis_simpanan;
            },
            
            theme:"blue-light",

            // template: {
            //  type: "description",
            //  fields: {
            //      description: "alamat"
            //  }
            // },

            template: {
             type: "custom",
             method: function(value, item) {
                  // return item.nama_koperasi + " || " + item.cantHabit + " || " + item.idCiudad;
                return item.nama_simpanan ;
             }
            },

            // template: {
            //     type: "iconLeft",
            //     fields: {
            //         iconSrc: "img"
            //     }
            // },

            list: {
                maxNumberOfElements: 5,
                match: {
                    enabled: true
                },
                // onClickEvent: function(value, item) {
                //  alert('seleccionado');
                // },
                onClickEvent: function() {
                    var value = $("#id_jenis_simpanan").getSelectedItemData().id_jenis_simpanan;

                    $("#id_jenis_simpanan").val(value).trigger("change");
                },
                onKeyEnterEvent: function(){
                    var value = $("#id_jenis_simpanan").getSelectedItemData().id_jenis_simpanan;

                    $("#id_jenis_simpanan").val(value).trigger("change");
                }
            }
        };
        // $("#id_jenis_simpanan").easyAutocomplete(optionsid);
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
                    "url": "<?php echo base_url();?>transsimpanancontr/ajax_list",
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
        function add_simpanan()
        {
            save_method = 'add';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#myModal').modal('show'); // show bootstrap modal
            $('.modal-title').text('Tambah Bukti Transaksi Simpanan'); // Set Title to Bootstrap modal title
        }

        function edit_simpanan(id)
        {
            save_method = 'update';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo base_url();?>transsimpanancontr/ajax_edit/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="id_Bukti_Simpanan"]').val(data.id_Bukti_Simpanan);
                    $('[name="id_Staff_Pembuat"]').val(data.id_Staff_Pembuat);
                    $('[name="id_Staff_Mod"]').val(data.id_Staff_Mod);
                    $('[name="id_Jenis_Simpanan"]').val(data.id_Jenis_Simpanan);
                    $('[name="debet"]').val(data.debet);
                    $('[name="kredit"]').val(data.kredit);
                    $('[name="jumlah_TransSimpanan"]').val(data.jumlah_TransSimpanan);
                    $('[name="saldo"]').val(data.saldo);
                    $('[name="dateby"]').datepicker('update',data.dateby);
                    $('#myModal').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Bukti Transaksi Simpanan'); // Set title to Bootstrap modal title

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function reload_table()
        {
            table.ajax.reload(null,false); //reload datatable ajax 
        }

        function save()
        {
            $('#btnSave').text('saving...'); //change button text
            $('#btnSave').attr('disabled',true); //set button disable 
            var url;

            if(save_method == 'add') {
                url = "<?php echo base_url();?>transsimpanancontr/ajax_add";
            } else {
                url = "<?php echo base_url();?>transsimpanancontr/ajax_update";
            }

            // ajax adding data to database
            $.ajax({
                url : url,
                type: "POST",
                data: $('#form').serialize(),
                dataType: "JSON",
                success: function(data)
                {

                    if(data.status) //if success close modal and reload ajax table
                    {
                        $('#myModal').modal('hide');
                        reload_table();
                    }
                    else
                    {
                        for (var i = 0; i < data.inputerror.length; i++) 
                        {
                            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                        }
                    }
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled',false); //set button enable 


                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled',false); //set button enable 

                }
            });
        }

        function delete_simpanan(id)
        {
            if(confirm('Are you sure delete this data?'))
            {
                // ajax delete data to database
                $.ajax({
                    url : "<?php echo base_url();?>transsimpanancontr/ajax_delete/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        //if success reload ajax table
                        $('#myModal').modal('hide');
                        reload_table();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error deleting data');
                    }
                });
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function (e) {
            $("input").change(function () {
                var toplam = 0;
                // $("input[name=debet]").each(function () {
                //     toplam = parseInt($("input[name=kredit]").val()) + parseInt($(this).val());
                // })
                $("input[name=kredi]").each(function () {
                    // toplam = parseInt($("input[name=saldo]").val()) - parseInt($(this).val());
                })
                // $("input[name=saldo]").val(toplam);
            });
        });
    </script>
</body>

</html>
