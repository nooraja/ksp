
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $judul;?></title>
    <script src="<?php echo base_url();?>assets/js/jquery-3.1.1.js"></script>
    <link href="<?php echo base_url();?>assets/admin-koperasi/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker3.min.css" />
    <script src="<?php echo base_url();?>assets/js/easyautocomplete/jquery.easy-autocomplete.min.js"></script> 
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css" />
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/js/easyautocomplete/easy-autocomplete.min.css"><link rel="stylesheet" href="<?php echo base_url();?>assets/js/easyautocomplete/easy-autocomplete.themes.min.css">

    
    <link href="<?php echo base_url();?>assets/admin-koperasi/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin-koperasi/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin-koperasi/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin-koperasi/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/admin-koperasi/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    
</head>

<body style="background:#2980b9;">

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Koperasi Tunas Wanita Abadi v1.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a onclick="window.location='<?php echo base_url("login/keluar");?>'"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <!-- /.navbar-top-links -->