
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bukti Transaksi PUK</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Tabel Bukti Transaksi PUK
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
                                        <th>No Bukti</th>
                                        <th>Tanggal</th>
                                        <th>Jenis Pinjaman</th>
                                        <th>Jumlah Transaksi</th>
                                        <th style="width:125px;">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody >
                                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No Bukti</th>
                                        <th>Tanggal</th>
                                        <th>Jenis Pinjaman</th>
                                        <th>Jumlah Transaksi</th>
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
                                    <label class="control-label col-md-3">No Bukti</label>
                                    <div class="col-md-9">
                                        <input name="id_Bukti_Pinjaman" id="id_Bukti_Pinjaman" placeholder="No Bukti Transaksi Pinjaman" class="form-control" type="text" value="<?php echo set_value('id_Bukti_Pinjaman', 'TP'.rand(1000, 9999)); ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Jenis Pinjaman</label>
                                    <div class="col-md-9">
                                        <select name="id_Jenis_Pinjaman" id="id_jenis_pinjaman" class="form-control">
                                            <option value="">--Select Jenis Pinjaman--</option>
                                            <option value="JP0001">Pinjaman Anggota</option>
                                            <option value="JP0002">Pinjaman PUK</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Biaya Admin</label>
                                    <div class="col-md-9">
                                        <select name="id_Administrasi" id="id_Administrasi" class="form-control">
                                            <option value="">--Select Biaya Admin--</option>
                                            <option value="ADS001">Administrasi Awal</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Biaya Bunga</label>
                                    <div class="col-md-9">
                                        <select name="id_Bunga" id="id_Bunga" class="form-control">
                                            <option value="">--Select Biaya Bunga--</option>
                                            <option value="BU0001">Bunga Anggota</option>
                                            <option value="BU0002">Bunga Puk</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3">Keputusan</label>
                                    <div class="col-md-9">
                                        <input id="id_keputusan" name="id_keputusan" placeholder="Keputusan " class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Biaya Premi</label>
                                    <div class="col-md-9">
                                        <select name="id_Premi" id="id_Premi" class="form-control">
                                            <option value="">--Select Biaya Premi--</option>
                                            <option value="PRE001">Asuransi</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Biaya Voucher</label>
                                    <div class="col-md-9">
                                        <select name="id_Voucher" id="id_Voucher" class="form-control">
                                            <option value="">--Select Biaya Voucher--</option>
                                            <option value="VC0001">25000</option>
                                            <option value="VC0002">50000</option>
                                            <option value="VC0003">100000</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="control-label col-md-3">Jenis Pembayaran</label>
                                    <div class="col-md-9">
                                        <select name="jenis_Pembayaran" id="id_jenis_pinjaman" class="form-control">
                                            <option value="">--Select Jenis Pembayaran--</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Transfer">Transfer</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Akun Pinjaman</label>
                                    <div class="col-md-9">
                                        <input id="cicilan" maxlength="2" name="cicilan" placeholder="Akun Pinjaman" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Akun PUK</label>
                                    <div class="col-md-9">
                                        <input id="cicilan" maxlength="2" name="cicilan" placeholder="Akun PUK" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Cicilan</label>
                                    <div class="col-md-9">
                                        <input id="cicilan" name="cicilan" placeholder="Biaya Cicilan" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Sisa Pinjaman</label>
                                    <div class="col-md-9">
                                        <input id="pinjaman_terbayar" name="pinjaman_terbayar" placeholder="Sisa Pinjaman" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Jumlah Transaksi</label>
                                    <div class="col-md-9">
                                        <input id="jumlah_TransPinjaman" name="jumlah_TransPinjaman" placeholder="Jumlah Transaksi Pinjaman" class="form-control" type="text">
                                        <input name="id_Staff_Pembuat" placeholder="" class="form-control" type="hidden" value="<?php echo $staff; ?>">
                                        <input name="id_Staff_Mod" placeholder="" class="form-control" type="hidden" value="<?php echo $staff; ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal</label>
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

                                <div class="form-group">
                                    <label class="control-label col-md-3">status</label>
                                    <div class="col-md-9">
                                        <input name="status_bukti_pinjaman" placeholder="1 = ya dan 0 = tidak" class="form-control" type="text" >
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
                                    <input name="jenis_kptsn" placeholder="" value="Bukti PUK" class="form-control" type="hidden">
                                    <input name="dateby" placeholder="" class="form-control" value="<?php echo set_value('dateby', date("Y-m-d") ); ?>" type="hidden">
                                    <input name="status_kptsn" placeholder="" class="form-control" value="0" type="hidden">
                                    <input name="description" placeholder="" value="Bukti PUK" class="form-control" type="hidden">
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

    <script type="text/javascript">
        
        var optionsid = {
            // url: "<?php echo base_url();?>js/countries.json",
            // url: "<?php echo base_url();?>datos/getdatos",
            url: "<?php echo base_url();?>transpukcontr/getjenissimpanan",
            
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
        $("#id_jenis_simpanan").easyAutocomplete(optionsid);
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
                "url": "<?php echo base_url();?>transpukcontr/ajax_list",
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
        $('.modal-title').text('Tambah Bukti Transaksi PUK'); // Set Title to Bootstrap modal title
    }

    function savekptsn() {

        $('#btnKptsn').text('saving...'); //change button text
        $('#btnKptsn').attr('disabled',true); //set button disable 
        var url;

        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        $.ajax({
            url : "<?php echo base_url();?>transpukcontr/ajax_keputusan/",
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
            url : "<?php echo base_url();?>transpukcontr/ajax_edit/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="id_Bukti_Pinjaman"]').val(data.id_Bukti_Pinjaman);
                $('[name="id_Jenis_Pinjaman"]').val(data.id_Jenis_Pinjaman);
                $('[name="id_Staff_Pembuat"]').val(data.id_Staff_Pembuat);
                $('[name="id_Staff_Mod"]').val(data.id_Staff_Mod);
                $('[name="id_Administrasi"]').val(data.id_Administrasi);
                $('[name="id_Bunga"]').val(data.id_Bunga);
                $('[name="id_keputusan"]').val(data.id_keputusan);
                $('[name="id_Premi"]').val(data.id_Premi);
                $('[name="id_Voucher"]').val(data.id_Voucher);
                $('[name="jenis_Pembayaran"]').val(data.jenis_Pembayaran);
                $('[name="cicilan"]').val(data.cicilan);
                $('[name="sisa_Pinjaman"]').val(data.sisa_Pinjaman);
                $('[name="jumlah_TransPinjaman"]').val(data.jumlah_TransPinjaman);
                $('[name="dateby"]').datepicker('update',data.dateby);
                $('[name="description"]').val(data.description);
                $('#myModal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Bukti Transaksi PUK'); // Set title to Bootstrap modal title

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
            url = "<?php echo base_url();?>transpukcontr/ajax_add";
        } else {
            url = "<?php echo base_url();?>transpukcontr/ajax_update";
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
                url : "<?php echo base_url();?>transpukcontr/ajax_delete/"+id,
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
        $("#id_anggota").easyAutocomplete(optionsid);
    </script>

    <script type="text/javascript">
        var optbt = {
            // url: "<?php echo base_url();?>js/countries.json",
            url: "<?php echo base_url();?>transpukcontr/getkeputusan",
            
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
                return item.jenis_kptsn + " || " + item.id_keputusan;
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
