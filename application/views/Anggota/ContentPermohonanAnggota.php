            <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Anggota</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Tabel Anggota
                            <div class="btn-group pull-right">
                                <button class="btn btn-danger btn-xs" onclick="add_anggota()" data-toggle="modal" data-target=""><i class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Add category"></i></button>
                                <button class="btn btn-default btn-xs" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i></button>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <!-- <th>No Anggota</th>
                                        <th>No Anggota</th>
                                        <th>Jumlah Anggota</th>
                                        <th>Edit</th> -->
                                        <th>No Anggota</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th style="width:125px;">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody >
                                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No Anggota</th>
                                        <th>Username</th>
                                        <th>Nama</th>
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
                        <h3 class="modal-title">Anggota Form</h3>
                    </div>
                    <div class="modal-body form">
                        <form action="#" id="form" class="form-horizontal">
                            <input type="hidden" value="" name="id"/> 
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">No Anggota</label>
                                    <div class="col-md-9">
                                        <input id="id_anggota" name="id_anggota" placeholder="Last Name" class="form-control" type="text" value="<?php echo set_value('id_anggota', 'A'.rand(10000, 99999)); ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">No Pengeluaran</label>
                                    <div class="col-md-9">
                                        <input style="width: 100%;" name="id_pengeluaran_anggota" id="id_pengeluaran_anggota" placeholder="Nomer Pengeluaran Anggota" class="form-control" type="text" disabled="true">
                                    
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">No Slot</label>
                                    <div class="col-md-9">
                                        <input style="width: 100%;" name="id_slot" id="id_slot" placeholder="Nomer Slot" class="form-control" type="text" >
                                        <input name="id_Staff_Pembuat" placeholder="" value="<?php echo $staff; ?>" class="form-control" type="hidden">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">No Otoritas</label>
                                    <div class="col-md-9">
                                        <input style="width: 100%;" name="id_otoritas" id="id_otoritas" placeholder="Nomer Otoritas" class="form-control" type="text" >
                                    
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">No Agama</label>
                                    <div class="col-md-9">
                                        <input style="width: 100%;" name="id_agama" id="id_agama" placeholder="Nomer Agama" class="form-control" type="text">
                                    
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">No Keputusan</label>
                                    <div class="col-md-9">
                                        
                                        <input name="id_keputusan" id="id_keputusan" placeholder="Nomer Keputusan" class="form-control" type="text">

                                        <span class="help-block"></span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3">T.Lahir</label>
                                    <div class="col-md-9">
                                        <input name="tgl_lahir" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" >
                                        <input name="dateby" placeholder="" class="form-control datepicker" type="hidden" value="<?php echo set_value('dateby', date('Y-m-d')); ?>" >
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Status Perkawinan</label>
                                    <div class="col-md-9">
                                        <select name="status_perkawinan" class="form-control">
                                            <option value="">--Status Menikah--</option>
                                            <option value="0">Tidak Menikah</option>
                                            <option value="1">Menikah</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama Pasangan</label>
                                    <div class="col-md-9">
                                        <input id="nama_pasangan" name="nama_pasangan" placeholder="Nama Pasangan" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Pekerjaan Pasangan</label>
                                    <div class="col-md-9">
                                        <input id="pekerjaan_pasangan" name="pekerjaan_pasangan" placeholder="Pekerjaan Pasangan" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Jumlah Anak</label>
                                    <div class="col-md-9">
                                        <input id="jumlah_anak" name="jumlah_anak" placeholder="Jumlah Anak" class="form-control" type="number">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Email</label>
                                    <div class="col-md-9">
                                        <input name="email" placeholder="Email" class="form-control" type="email">
                                        <input id="foto" name="foto" placeholder="" class="form-control" type="hidden">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <label class="control-label col-md-3">Status Anggota</label>
                                    <div class="col-md-9">
                                        <select name="status_anggota" class="form-control">
                                            <option value="">--Pilih Status--</option>
                                            <option value="1">Aktif</option>
                                            <option value="0">Tidak Aktif</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div> -->
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
                                    Apakah anda ingin memasukkan data transaksis pinjaman ?
                                    <?php $this->load->helper('date');?>
                                    <input name="id_keputusan" id="id_keputusan" value="<?php echo set_value('id_keputusan', 'KP'.rand(1000, 9999)); ?>" class="form-control" type="hidden">
                                    <input name="id_Staff" placeholder="" value="<?php echo $staff; ?>" class="form-control" type="hidden">
                                    <input name="jenis_kptsn" placeholder="" value="Anggota Baru" class="form-control" type="hidden">
                                    <input name="dateby" placeholder="" class="form-control" value="<?php echo set_value('dateby', date("Y-m-d") ); ?>" type="hidden">
                                    <input name="status_kptsn" placeholder="" class="form-control" value="0" type="hidden">
                                    <input name="description" placeholder="" value="Anggota Baru" class="form-control" type="hidden">
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
                "url": "<?php echo base_url();?>anggotacontr/ajax_list",
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
        $('.modal-title').text('Tambah Anggota'); // Set Title to Bootstrap modal title
    }

    function savekptsn() {

        $('#btnKptsn').text('saving...'); //change button text
        $('#btnKptsn').attr('disabled',true); //set button disable 
        var url;

        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        $.ajax({
            url : "<?php echo base_url();?>anggotacontr/ajax_keputusan/",
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

    function add_anggota()
    {
        save_method = 'add';

        
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#myModal').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Anggota'); // Set Title to Bootstrap modal title
    }

    function edit_anggota(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo base_url();?>anggotacontr/ajax_edit/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                $('[name="id_anggota"]').val(data.id_anggota);
                $('[name="id_koperasi"]').val(data.id_koperasi);
                $('[name="id_keputusan"]').val(data.id_keputusan);
                $('[name="list_otoritas"]').val(data.list_otoritas);
                $('[name="id_Staff_Pembuat"]').val(data.id_Staff_Pembuat);
                $('[name="username"]').val(data.username);
                $('[name="password"]').val(data.password);
                $('[name="nama_anggota"]').val(data.nama_anggota);
                $('[name="no_ktp"]').val(data.no_ktp);
                $('[name="jenis_kelamin"]').val(data.jenis_kelamin);
                $('[name="alamat"]').val(data.alamat);
                $('[name="tgl_lahir"]').val(data.tgl_lahir);
                $('[name="no_telp"]').val(data.no_telp);
                $('[name="nama_pasangan"]').val(data.nama_pasangan);
                $('[name="status_perkawinan"]').val(data.status_perkawinan);
                $('[name="pekerjaan_pasangan"]').val(data.pekerjaan_pasangan);
                $('[name="jumlah_anak"]').val(data.jumlah_anak);
                $('[name="email"]').val(data.email);
                $('[name="status_anggota"]').val(data.status_anggota);
                $('[name="foto"]').val(data.foto);
                $('[name="dateby"]').datepicker('update',data.dateby);
                $('[name="description"]').val(data.description);
                $('#myModal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Anggota'); // Set title to Bootstrap modal title

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
            url = "<?php echo base_url();?>anggotacontr/ajax_add";
        } else {
            url = "<?php echo base_url();?>anggotacontr/ajax_update";
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
                    alert('success close modal and reload ajax table');
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
                alert('Error adding / update data' + data);
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 

            }
        });
    }

    function delete_anggota(ide)
    {
        if(confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo base_url();?>anggotacontr/ajax_delete/"+ide,
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
            url: "<?php echo base_url();?>anggotacontr/getkoperasi",
            // url: "<?php echo base_url();?>koperasi/getkoperasi",
            
            // getValue: "ciudad",

            getValue: function(element) {
                return element.id_koperasi;
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
                return item.nama_koperasi + " || " + item.id_koperasi ;
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
                    var value = $("#id_koperasi").getSelectedItemData().id_koperasi;

                    $("#id_koperasi").val(value).trigger("change");
                },
                onKeyEnterEvent: function(){
                    var value = $("#id_koperasi").getSelectedItemData().id_koperasi;

                    $("#id_koperasi").val(value).trigger("change");
                }
            }
        };
        var optchoice = {
            // url: "<?php echo base_url();?>js/countries.json",
            url: "<?php echo base_url();?>anggotacontr/getstaff",
            // url: "<?php echo base_url();?>koperasi/getkoperasi",
            
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
                return item.level;
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
        $("#id_Staff_Pembuat").easyAutocomplete(optchoice);
        $("#id_koperasi").easyAutocomplete(optionsid);
    </script>

    <script type="text/javascript">
        var optbt = {
            // url: "<?php echo base_url();?>js/countries.json",
            url: "<?php echo base_url();?>transpinjamancontr/getkeputusan",
            
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
