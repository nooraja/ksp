<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Simpanan Calon Anggota</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Calon Anggota
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="col-lg-12">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>No Anggota</label>
                                            <input class="form-control" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="disabledSelect">Nama</label>
                                            <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledSelect">No Simpanan</label>
                                            <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>
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
                                            <label>No Anggota</label>
                                            <input class="form-control" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="disabledSelect">Nama</label>
                                            <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledSelect">No Simpanan</label>
                                            <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>
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
                                            <div class="input-group input-append date" id="tgldaftar">
                                                <input type="text" class="form-control" name="date" Disabled/>
                                                <span class="input-group-addon add-on">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="disabledSelect">No Transaksi</label>
                                            <?php echo form_input('No Transaksi') ?>
                                        </div>

                                        <div class="form-group">
                                            <label style="margin-top: 5px;">Jumlah anak</label>
                                            <label class="checkbox-inline" style="float:right;text-align:left;" placeholder="Jenis Simpanan">
                                                <select class="form-control" style="width:100%;">
                                                    <option>Simpanan Pokok</option>
                                                    <option>Simpanan Wajib</option>
                                                    <option>Simpanan Sukarela</option>
                                                    <option>Simpanan Pendidikan</option>
                                                    <option>Simpanan Rencana</option>
                                                    <option>Simpanan Lebaran</option>                         
                                                </select>
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
            <!-- /.row -->
        </div>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/admin-koperasi/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/admin-koperasi/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url();?>assets/admin-koperasi/vendor/bootstrap/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/admin-koperasi/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url();?>assets/admin-koperasi/vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin-koperasi/vendor/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin-koperasi/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/admin-koperasi/dist/js/sb-admin-2.js"></script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

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

    <script>
    $(document).ready(function() {
        $('#datePicker')
            .datepicker({
                format: 'yyyy/mm/dd'
            })
            .on('changeDate', function(e) {
                // Revalidate the date field
                $('#eventForm').formValidation('revalidateField', 'date');
            });
        $('#tgldaftar')
            .datepicker({
                format: 'yyyy/mm/dd'
            })
            .on('changeDate', function(e) {
                $('#eventForm').formValidation('revalidateField', 'date');
            })

        $('#eventForm').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'The name is required'
                        }
                    }
                },
                date: {
                    validators: {
                        notEmpty: {
                            message: 'The date is required'
                        },
                        date: {
                            format: 'MM/DD/YYYY',
                            message: 'The date is not a valid'
                        }
                    }
                }
            }
        });
    });
    </script>

</body>

</html>