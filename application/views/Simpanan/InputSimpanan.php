        <?php echo form_open('SimpananCont/input_simpanan') ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Simpanan Anggota</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Anggota
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="col-lg-12">
                                    <form role="form">
                                        
                                        <div class="form-group">
                                            <label>No Anggota</label>

                                            <?php 
                                            $datanoanggota = array(
                                                'name'          => 'u_anggota',
                                                'id'            => 'provider-json',
                                                'class'         => 'form-control',
                                                'placeholder'   => 'No Anggota',
                                                'maxlength'     => '6',
                                                'size'          => '50',
                                                'style'         => 'width:100%'
                                            );
                                            echo form_input($datanoanggota) ?>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="disabledSelect">Nama</label>
                                            <?php 
                                            $datanamaanggota = array(
                                                'name'          => 'u_nama',
                                                'id'            => 'data-holder',
                                                'class'         => 'form-control',
                                                'maxlength'     => '50',
                                                'size'          => '50',
                                                'style'         => 'width:100%',
                                                'disabled'      => 'true'
                                            );
                                            echo form_input($datanamaanggota) ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledSelect">No Simpanan</label>
                                            <?php 
                                            $datanosimpanan = array(
                                                'name'          => 'nosimpanan',
                                                'id'            => 'nosimpanan',
                                                'class'         => 'form-control',
                                                'value'         => 'SP'.rand('0000','9999'),
                                                'maxlength'     => '6',
                                                'size'          => '25',
                                                'style'         => 'width:100%',
                                                'disabled'      => 'true'
                                            );
                                            echo form_input($datanosimpanan) ?>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->                                
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>

                    <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Staff

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="col-lg-12">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>No Staff</label>
                                            <?php 
                                            $data = array(
                                                'name'          => 'nostaff',
                                                'id'            => 'providerjsonid',
                                                'class'         => 'form-control',
                                                'placeholder'   => 'No Staff',
                                                'maxlength'     => '6',
                                                'size'          => '50',
                                                'style'         => 'width:100%'
                                            );
                                            echo form_input($data) ?>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="disabledSelect">Nama Staff</label>
                                            <?php 
                                            $data = array(
                                                'name'          => 'namastaff',
                                                'id'            => 'dataholderid',
                                                'class'         => 'form-control',
                                                'maxlength'     => '100',
                                                'size'          => '50',
                                                'style'         => 'width:100%',
                                                'disabled'      => 'true'
                                            );
                                            echo form_input($data) ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledSelect">Jabatan</label>
                                            <input class="form-control" id="datajbtn" type="text" placeholder="Disabled input" disabled>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->                                
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>

                    <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Transaksi Simpanan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="col-lg-12">
                                    <form role="form">
                                        <div class="form-group">
                                            <label  style="margin-top: 3px;" for"disableInput">Tanggal Daftar</label>
                                            <div class="input-group">
                                                <?php 
                                                $datadate = array(
                                                    'name'          => 'n_tgl',
                                                    'id'            => 'id_tgl',
                                                    'class'         => 'form-control',
                                                    'maxlength'     => '100',
                                                    'type'          => 'text',
                                                    'value'         => date('Y-m-d'),
                                                    'size'          => '50',
                                                    'style'         => 'width:100%',
                                                    'disabled'       => 'true'
                                                );
                                                echo form_input($datadate)
                                                ?>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="disabledSelect">No Transaksi</label>
                                            <?php 
                                            $data = array(
                                                'name'          => 'notrans',
                                                'id'            => 'nosimpanan',
                                                'class'         => 'form-control',
                                                'value'         => 'TS'.rand('1000','9999'),
                                                'maxlength'     => '6',
                                                'size'          => '50',
                                                'style'         => 'width:100%',
                                                'disabled'       => 'true'
                                            );
                                            echo form_input($data) ?>
                                            
                                        </div>

                                        <div class="form-group">
                                            <label style="margin-top: 5px;">Jenis Transaksi</label>
                                            <label class="checkbox-inline" style="float:right;text-align:left;" placeholder="Jenis Simpanan">
                                            <?php 
                                            $datadd = array(
                                                'name'          => 'n_jnsmpn',
                                                'id'            => 'id_jnsmpn',
                                                'class'         => 'form-control',
                                                'maxlength'     => '100',
                                                'type'          => 'text',
                                                'value'         => 'Simpanan',
                                                'style'         => 'width:100%'
                                            );
                                            
                                            $dataslc = array(
                                                'pokok'         => 'Simpanan Pokok' ,
                                                'wajib'         => 'Simpanan Wajib' ,
                                                'sukarela'      => 'Simpanan Sukarela' ,
                                                'pendidikan'    => 'Simpanan Pendidikan' ,
                                                'rencana'       => 'Simpanan Rencana' ,
                                                'lebaran'       => 'Simpanan Lebaran' 
                                            );

                                            echo form_dropdown('Simpanan', $dataslc, 'smpn', $datadd);
                                            ?>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label for="disabledSelect">Jumlah Transaksi</label>
                                            <input class="form-control" id="disabledInput"  placeholder="Disabled input">
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->                                
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>              
                </div>
                <!-- /.col-lg-8 -->
            </div>
            
            <a href="<?php echo base_url();?>koperasi/setkoperasi" class="btn btn-lg btn-success">Tambah Data</a>
            <a href="mainpage.html" class="btn btn-lg btn-warning">Kembali</a>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url();?>/assets/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin-koperasi/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin-koperasi/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin-koperasi/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>assets/admin-koperasi/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin-koperasi/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin-koperasi/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/admin-koperasi/dist/js/sb-admin-2.js"></script>

    <!--<script src="<?php echo base_url();?>assets/js/jquery-3.1.1.js"></script>-->
    <script src="<?php echo base_url();?>assets/js/easyautocomplete/jquery.easy-autocomplete.min.js"></script> <script src="<?php echo base_url();?>assets/js/easyautocomplete/jquery.easy-autocomplete.min.js"></script> 
    

    <style type="text/css">
    /**
    * Override feedback icon position
    * See http://formvalidation.io/examples/adjusting-feedback-icon-position/
    */
    #eventForm .form-control-feedback {
        top: 0;
        right: -15px;
    }
    </style>

    <script type="text/javascript">
        var options = {
            // url: "<?php echo base_url();?>js/countries.json",
            // url: "<?php echo base_url();?>datos/getdatos",
            url: "<?php echo base_url();?>simpanancontr/getsearch",
            
            getValue: "nama_anggota",
            
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
                 // return item.ciudad + " || " + item.cantHabit + " || " + item.idCiudad;
                return item.id_anggota + " || " + item.nama_anggota;
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
                    var value = $("#provider-json").getSelectedItemData().id_anggota;

                    $("#data-holder").val(value).trigger("change");
                },
                onKeyEnterEvent: function(){
                    var value = $("#provider-json").getSelectedItemData().id_anggota;

                    $("#data-holder").val(value).trigger("change");
                }
            }
        };
        

        $("#provider-json").easyAutocomplete(options);
    </script>

    <script type="text/javascript">
        
        var optionsid = {
            // url: "<?php echo base_url();?>js/countries.json",
            // url: "<?php echo base_url();?>datos/getdatos",
            url: "<?php echo base_url();?>datos/getdatos",
            
            // getValue: "ciudad",

            getValue: function(element) {
                return element.ciudad;
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
                  return item.ciudad + " || " + item.cantHabit + " || " + item.idCiudad;
                // return item.id_anggota + " || " + item.nama_anggota;
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
                    var value = $("#providerjsonid").getSelectedItemData().ciudad;

                    $("#dataholderid").val(value).trigger("change");

                    var values = $("#providerjsonid").getSelectedItemData().cantHabit;
                    $("#datajbtn").val(values).trigger("change");
                },
                onKeyEnterEvent: function(){
                    var value = $("#providerjsonid").getSelectedItemData().ciudad;

                    $("#dataholderid").val(value).trigger("change");
                    
                    var values = $("#providerjsonid").getSelectedItemData().cantHabit;
                    $("#datajbtn").val(values).trigger("change");
                }
            }
        };
        $("#providerjsonid").easyAutocomplete(optionsid);
    </script>

</body>

</html>

<?php echo form_close();?>