
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Akun Pinjaman</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Tabel Akun Pinjaman
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
                                        <th>No Pinjaman</th>
                                        <th>Tanggal</th>
                                        <th>No Anggota</th>
                                        <th style="width:125px;">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody >
                                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No Pinjaman</th>
                                        <th>Tanggal</th>
                                        <th>No Anggota</th>
                                        <th style="width:125px;">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <button type="button" id="btnKptsn" onclick="add_keputusan()" class="btn btn-primary">Save</button>
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
                            <!-- <input type="hidden" value="" name="id"/>  -->
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">No Pinjaman</label>
                                    <div class="col-md-9">
                                        <input name="id_pinjaman" placeholder="" class="form-control" type="text" value="<?php echo set_value('id_pinjaman', 'P'.rand(00000, 99999)); ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="control-label col-md-3">No Bukti</label>
                                    <div class="col-md-9">
                                        <input name="id_Bukti_Pinjaman" id="id_Bukti_Pinjaman" placeholder="" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <label class="control-label col-md-3">Keputusan</label>
                                    <div class="col-md-9">
                                        <input id="id_keputusan" name="id_keputusan" placeholder="Nomer Keputusan" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">No Anggota</label>
                                    <div class="col-md-9">
                                        <input id="id_anggota" name="id_Anggota" placeholder="Nomer Anggota" class="form-control" type="text">
                                        <input name="id_Staff_Pembuat" placeholder="" class="form-control" type="hidden" value="<?php echo $staff; ?>">
                                        <input name="id_Staff_Mod" placeholder="" class="form-control" type="hidden" value="<?php echo $staff; ?>">
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

        <div class="modal fade" id="smallModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Keputusan Form</h3>
                    </div>
                    <div class="modal-body form">
                        <form action="#" id="former" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-9">
                                    Apakah anda ingin memasukkan data pinjaman ?
                                    <?php $this->load->helper('date');?>
                                    <input name="id_keputusan" id="id_keputusan" value="<?php echo set_value('id_keputusan', 'KP'.rand(1000, 9999)); ?>" class="form-control" type="hidden">
                                    <input name="id_Staff" placeholder="" value="<?php echo $staff; ?>" class="form-control" type="hidden">
                                    <input name="jenis_kptsn" placeholder="" value="Pinjaman Anggota" class="form-control" type="hidden">
                                    <input name="dateby" placeholder="" class="form-control" value="<?php echo set_value('dateby', date("Y-m-d") ); ?>" type="hidden">
                                    <input name="status_kptsn" placeholder="" class="form-control" value="0" type="hidden">
                                    <input name="description" placeholder="" value="Pinjaman Anggota" class="form-control" type="hidden">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnKptsn" onclick="savekptsn()" class="btn btn-primary">Save</button>
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
                "url": "<?php echo base_url();?>pinjamancontr/ajax_list",
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

    function add_keputusan() {

        $('#former')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#smallModal').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Pinjaman'); // Set Title to Bootstrap modal title
    }

    function savekptsn() {

        $('#btnKptsn').text('saving...'); //change button text
        $('#btnKptsn').attr('disabled',true); //set button disable 
        var url;

        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        $.ajax({
            url : "<?php echo base_url();?>pinjamancontr/ajax_keputusan/",
            data: $('#former').serialize(),
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {

                if(data.status) //if success close modal and reload ajax table
                {
                    $('#smallModal').modal('hide');
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
                $('#btnKptsn').text('save'); //change button text
                $('#btnKptsn').attr('disabled',false); //set button enable 


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 

            }
        });

    }



    function add_pinjaman()
    {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#myModal').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Pinjaman'); // Set Title to Bootstrap modal title
    }

    function edit_pinjaman(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo base_url();?>pinjamancontr/ajax_edit/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                $('[name="id_pinjaman"]').val(data.id_pinjaman);
                $('[name="id_Bukti_Pinjaman"]').val(data.id_Bukti_Pinjaman);
                $('[name="id_Anggota"]').val(data.id_Anggota);
                $('[name="id_Staff_Pembuat"]').val(data.id_Staff_Pembuat);
                $('[name="id_Staff_Mod"]').val(data.id_Staff_Mod);
                $('[name="dateby"]').datepicker('update',data.dateby);
                $('[name="description"]').val(data.description);
                $('#myModal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Pinjaman'); // Set title to Bootstrap modal title

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
            url = "<?php echo base_url();?>pinjamancontr/ajax_add";
        } else {
            url = "<?php echo base_url();?>pinjamancontr/ajax_update";
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
                url : "<?php echo base_url();?>pinjamancontr/ajax_delete/"+id,
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
            url: "<?php echo base_url();?>anggotacontr/getanggota",
            
            // getValue: "ciudad",

            getValue: function(element) {
                return element.id_anggota;
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
                    var value = $("#id_anggota").getSelectedItemData().id_anggota;

                    $("#id_anggota").val(value).trigger("change");
                },
                onKeyEnterEvent: function(){
                    var value = $("#id_anggota").getSelectedItemData().id_anggota;

                    $("#id_anggota").val(value).trigger("change");
                }
            }
        };

        var optid = {
            // url: "<?php echo base_url();?>js/countries.json",
            url: "<?php echo base_url();?>pinjamancontr/getpinjaman",
            
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
                return item.jenis_Pembayaran ;
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
        $("#id_Bukti_Pinjaman").easyAutocomplete(optid);
        $("#id_anggota").easyAutocomplete(optionsid);
    </script>

    <script type="text/javascript">
        var optbt = {
            // url: "<?php echo base_url();?>js/countries.json",
            url: "<?php echo base_url();?>pinjamancontr/getkeputusan",
            
            // getValue: "ciudad",

            getValue: function(element) {
                return element.id_keputusan;
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
                return item.jenis_kptsn ;
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
                    var value = $("#id_keputusan").getSelectedItemData().id_keputusan;

                    $("#id_keputusan").val(value).trigger("change");
                },
                onKeyEnterEvent: function(){
                    var value = $("#id_keputusan").getSelectedItemData().id_keputusan;

                    $("#id_keputusan").val(value).trigger("change");
                }
            }
        };
        
        $("#id_keputusan").easyAutocomplete(optbt);
    </script>
</body>

</html>
