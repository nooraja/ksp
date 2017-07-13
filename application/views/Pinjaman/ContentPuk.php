
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Akun PUK</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Tabel Akun PUK
                            <div class="btn-group pull-right">
                                <button class="btn btn-danger btn-xs" onclick="add_pinjaman()" data-toggle="modal" data-target=""><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add category"></i></button>
                                <button class="btn btn-default btn-xs" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i></button>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>No PUK</th>
                                        <th>Tanggal</th>
                                        <th>No Anggota</th>
                                        <th style="width:125px;">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody >
                                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No PUK</th>
                                        <th>Tanggal</th>
                                        <th>No Anggota</th>
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
                        <h3 class="modal-title">P</h3>
                    </div>
                    <div class="modal-body form">
                        <form action="#" id="form" class="form-horizontal">
                            <!-- <input type="hidden" value="" name="id"/>  -->
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">No PUK</label>
                                    <div class="col-md-9">
                                        <input name="id_puk" placeholder="" class="form-control" type="text" value="<?php echo set_value('id_puk', 'PK'.rand(1000, 9999)); ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="control-label col-md-3">No Bukti</label>
                                    <div class="col-md-9">
                                        <input id="id_Bukti_Pinjaman" name="id_Bukti_Pinjaman" placeholder="" class="form-control" type="hidden"  >
                                        <span class="help-block"></span>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label class="control-label col-md-3">No Anggota Puk</label>
                                    <div class="col-md-9">
                                        <input id="id_anggota_puk" name="id_anggota_puk" placeholder="Nomer Anggota PUK" class="form-control" type="text">
                                        <input name="id_Staff_Pembuat" id="id_Staff_Pembuat" placeholder="Last Name" class="form-control" type="hidden" >
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">No Keputusan</label>
                                    <div class="col-md-9">
                                        <input name="id_Staff_Pembuat" id="id_Staff_Pembuat" placeholder="Nomer Keputusan" class="form-control" type="text" >
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal Transaksi</label>
                                    <div class="col-md-9">
                                        <input name="dateby" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Deskripsi</label>
                                    <div class="col-md-9">
                                        <textarea name="description" placeholder="Keterangan Lain" class="form-control"></textarea>
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
                "url": "<?php echo base_url();?>pukcontr/ajax_list",
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



    function add_pinjaman()
    {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#myModal').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Pinjaman Usaha Kredit'); // Set Title to Bootstrap modal title
    }

    function edit_pinjaman(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo base_url();?>pukcontr/ajax_edit/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                $('[name="id_puk"]').val(data.id_puk);
                $('[name="id_Bukti_Pinjaman"]').val(data.id_Bukti_Pinjaman);
                $('[name="id_anggota_puk"]').val(data.id_anggota_puk);
                $('[name="id_Staff_Pembuat"]').val(data.id_Staff_Pembuat);
                $('[name="id_Staff_Mod"]').val(data.id_Staff_Mod);
                $('[name="dateby"]').datepicker('update',data.dateby);
                $('[name="description"]').val(data.description);
                $('#myModal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Pinjaman Usaha Kredit'); // Set title to Bootstrap modal title

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
            url = "<?php echo base_url();?>pukcontr/ajax_add";
        } else {
            url = "<?php echo base_url();?>pukcontr/ajax_update";
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

    function delete_pinjaman(id)
    {
        if(confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo base_url();?>pukcontr/ajax_delete/"+id,
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
        var optionsid = {
            // url: "<?php echo base_url();?>js/countries.json",
            // url: "<?php echo base_url();?>anggotapukcontr/getanggotapuk",
            url: "<?php echo base_url();?>pukcontr/getanggotapuk",
            
            // getValue: "ciudad",

            getValue: function(element) {
                return element.id_anggota_puk;
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
                return item.nama_anggota ;
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
                    var value = $("#id_anggota_puk").getSelectedItemData().id_anggota_puk;

                    $("#id_anggota_puk").val(value).trigger("change");
                },
                onKeyEnterEvent: function(){
                    var value = $("#id_anggota_puk").getSelectedItemData().id_anggota_puk;

                    $("#id_anggota_puk").val(value).trigger("change");
                }
            }
        };

        var optd = {
            // url: "<?php echo base_url();?>js/countries.json",
            // url: "<?php echo base_url();?>anggotapukcontr/getanggotapuk",
            url: "<?php echo base_url();?>pukcontr/getbuktipuk",
            
            // getValue: "ciudad",

            getValue: function(element) {
                return element.id_Bukti_Pinjaman;
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
                return item.id_Jenis_Pinjaman ;
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
                    var value = $("#id_Bukti_Pinjaman").getSelectedItemData().id_Bukti_Pinjaman;

                    $("#id_Bukti_Pinjaman").val(value).trigger("change");
                },
                onKeyEnterEvent: function(){
                    var value = $("#id_Bukti_Pinjaman").getSelectedItemData().id_Bukti_Pinjaman;

                    $("#id_Bukti_Pinjaman").val(value).trigger("change");
                }
            }
        };
        var optstf = {
            // url: "<?php echo base_url();?>js/countries.json",
            // url: "<?php echo base_url();?>anggotapukcontr/getanggotapuk",
            url: "<?php echo base_url();?>pukcontr/getstaff",
            
            // getValue: "ciudad",

            getValue: function(element) {
                return element.id_Staff;
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
                return item.level ;
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
                    var value = $("#id_Staff_Pembuat").getSelectedItemData().id_Staff;

                    $("#id_Staff_Pembuat").val(value).trigger("change");
                },
                onKeyEnterEvent: function(){
                    var value = $("#id_Staff_Pembuat").getSelectedItemData().id_Staff;

                    $("#id_Staff_Pembuat").val(value).trigger("change");
                }
            }
        };
        $("#id_Staff_Pembuat").easyAutocomplete(optstf);
        $("#id_Bukti_Pinjaman").easyAutocomplete(optd);
        $("#id_anggota_puk").easyAutocomplete(optionsid);
    </script>
</body>

</html>
