<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title;?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url();?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    </head>

    <body class="bg-black">
        <div class="form-box" id="login-box">
            <div class="header"><?php echo $judul;?></div>
            <form action="<?php echo base_url('login/masuk/');?>" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                    </div>          
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Sign me in</button>  
                </div>
                <?php
                if($this->session->flashdata('pesan') <> ''){
                ?>
                    <div class="alert alert-dismissible alert-danger">
                        <?php echo $this->session->flashdata('pesan');?>
                    </div>
                <?php
                }
                ?>
            </form>
        </div>
    </body>
</html>
