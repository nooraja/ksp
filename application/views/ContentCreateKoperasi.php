        <?php echo form_open('koperasi/inputkoperasi') ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Data Koperasi</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-12"> 
                    <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Koperasi
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>No Koperasi</label>
                                            <?php 
                                            $idkoperasi = array(
                                                'name'          => 'id_koperasi',
                                                'id'            => 'id_koperasi',
                                                'class'         => 'form-control',
                                                'placeholder'   => 'No Anggota',
                                                'value'			=> 'KSP'.rand(0, 999),
                                                'maxlength'     => '6',
                                                'size'          => '50',
                                                'style'         => 'width:100%'
                                            );
                                            echo form_input($idkoperasi, 'KSP'.rand(0, 999)); ?>
                                        </div>
                                        <div class="form-group">
                                            <?php 
                                            $idkeputusan = array(
                                                'name'          => 'id_keputusan',
                                                'id'            => 'id_keputusan',
                                                'class'         => 'form-control',
                                                'placeholder'   => 'No Anggota',
                                                'value'			=> 'SJ'.rand(0, 9999),
                                                'maxlength'     => '6',
                                                'type'			=> 'hidden',
                                                'size'          => '50',
                                                'style'         => 'width:100%'
                                            );
                                            echo form_input($idkeputusan, 'SJ'.rand(0, 9999)); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Koperasi</label>
                                            <?php 
                                            $namaksp = array(
                                                'name'          => 'nama_koperasi',
                                                'id'            => 'nama_koperasi',
                                                'class'         => 'form-control',
                                                'maxlength'     => '50',
                                                'size'          => '50',
                                                'style'         => 'width:100%'
                                            );
                                            echo form_input($namaksp); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <?php 
                                            $alamat = array(
                                                'name'          => 'alamat',
                                                'id'            => 'alamat',
                                                'class'         => 'form-control input-lg',
                                                'rows'          => '3',
                                                'cols'          => '5',
                                                'placeholder'   => 'Alamat Lengkap Anda',
                                                'style'         => 'width:100%'
                                            );
                                            echo form_textarea($alamat);
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label>No Telepon</label>
                                            <?php 
                                            $notlpn = array(
                                                'name'          => 'no_telp',
                                                'id'            => 'no_telp',
                                                'class'         => 'form-control',
                                                'maxlength'     => '50',
                                                'size'          => '50',
                                                'style'         => 'width:100%'
                                            );
                                            echo form_input($notlpn); ?>
                                        </div>
                                        <div class="form-group" id="datePicker" aria-hidden='true'>
                                            <label  style="margin-top: 5px;">Tanggal Dibentuknya Koperasi</label>
                                            <div class="input-group">
                                                <?php 
                                                $tgl_koperasi = array(
                                                    'name'          => 'tgl_koperasi',
                                                    'id'            => 'tgl_koperasi',
                                                    'class'         => 'form-control',
                                                    'maxlength'     => '100',
                                                    'placeholder'   => 'YYYY/MM/DD | 1993/12/30',
                                                    'type'          => 'text',
                                                    'size'          => '50',
                                                    'style'         => 'width:100%'
                                                );
                                                echo form_input($tgl_koperasi);
                                                ?>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label >Email</label>
                                            <?php 
                                            $email = array(
                                                'name'          => 'email',
                                                'id'            => 'email',
                                                'class'         => 'form-control',
                                                'maxlength'     => '30',
                                                'size'          => '25',
                                                'style'         => 'width:100%',
                                            );
                                            echo form_input($email); ?>
                                        </div>
                                        <div class="form-group">
                                        <label>Badan Hukum</label>
                                        <?php 
                                        $bdnhkm = array(
                                            'name'          => 'badan_hukum',
                                            'id'            => 'badan_hukum',
                                            'class'         => 'form-control',
                                            'maxlength'     => '30',
                                            'size'          => '25',
                                            'style'         => 'width:100%',
                                        );
                                        echo form_input('badan_hukum','',$bdnhkm); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Domisili</label>
                                            <?php 
                                            $domisili = array(
                                                'name'          => 'u_domisili',
                                                'id'            => 'domisili',
                                                'class'         => 'form-control',
                                                'maxlength'     => '30',
                                                'size'          => '25',
                                                'style'         => 'width:100%',
                                            );
                                            echo form_input('domisili','',$domisili); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>SIUP</label>
                                            <?php 
                                            $siup = array(
                                                'name'          => 'siup',
                                                'id'            => 'siup',
                                                'class'         => 'form-control',
                                                'maxlength'     => '30',
                                                'size'          => '25',
                                                'style'         => 'width:100%',
                                            );
                                            echo form_input($siup); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>TDP</label>
                                            <?php 
                                            $tdp = array(
                                                'name'          => 'tdp',
                                                'id'            => 'tdp',
                                                'class'         => 'form-control',
                                                'maxlength'     => '30',
                                                'size'          => '25',
                                                'style'         => 'width:100%',
                                            );
                                            echo form_input($tdp); ?>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Keterangan Lain</label>
                                            <?php 
                                            $ktrlain = array(
                                                'name'          => 'description',
                                                'id'            => 'description',
                                                'class'         => 'form-control input-lg',
                                                'rows'          => '3',
                                                'cols'          => '5',
                                                'placeholder'   => 'Keterangan lain',
                                                'style'         => 'width:100%'
                                            );
                                            echo form_textarea($ktrlain);
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <?php 
                                                $submited = array(
                                                    'class'     => 'btn btn-lg btn-success'
                                                );
                                                $reseted = array(
                                                    'class'     => 'btn btn-lg btn-warning'
                                                );
                                            ?>
                                            <? echo form_submit('submit', 'Tambah', $submited); ?>
                                            <? echo form_submit('reset', 'Reset', $reseted); ?>
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