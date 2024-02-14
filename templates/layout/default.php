<?php

/**
 * @var \App\View\AppView $this
 * @var \CakeLte\View\Helper\CakeLteHelper $this->CakeLte
 */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->assign('title', $title); ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    
    <?= $this->Html->css('cstyle.css') ?>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>

    <?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>


    <!-- Ionicons -->
    <?= $this->Html->css('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') ?>

    <!-- Theme style -->
    <?= $this->Html->css('CakeLte./AdminLTE/dist/css/adminlte.min.css') ?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <?= $this->Html->css('CakeLte.style') ?>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    
    <?= $this->Html->css('CakeLte./AdminLTE/plugins/toastr/toastr.min.css') ?>
    
    <?= $this->element('layout/css') ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->css('header.css') ?>
    

    <!-- jQuery -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min.js') ?>
    <!-- Bootstrap 4 -->
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>
    <!-- AdminLTE App -->
    <?= $this->Html->script('CakeLte./AdminLTE/dist/js/adminlte.min.js') ?>
    
    <?= $this->Html->script("CakeLte./AdminLTE/plugins/jquery-validation/jquery.validate.min.js") ?>
    <?= $this->Html->script("CakeLte./AdminLTE/plugins/sweetalert2/sweetalert2.min.js") ?>
    <?= $this->Html->script('CakeLte./AdminLTE/plugins/toastr/toastr.min.js') ?>
    <?= $this->Html->script('/js/cscript.js') ?>
    <script>
        var baseurl = "<?= $this->Url->build('/') ?>";
    </script>

</head>

<body class="hold-transition <?= $this->CakeLte->getBodyClass() ?>">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand <?= $this->CakeLte->getHeaderClass() ?>">
            <?= $this->element('header/main') ?>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside  class="main-sidebar <?= $this->CakeLte->getSidebarClass() ?>">
            <!-- Brand Logo -->
            <a href="<?= $this->Url->build('/buyer/dashboard') ?>" class="brand-link"
                style="background-color:#ffffff; text-align-last:left;">
                <?= $this->Html->image('ft_rect_logo.png', ['width' => '150', 'class' => 'ft_rect_logo', 'data-image' => '1']) ?>
            </a>
            <div class="sidebar">
                <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="text-align-last: center;">
                    <div class="text-light">
                        Welcome,
                        <?=$full_name?> (
                        <?=$group_name?> )
                    </div>
                </div> -->
                <?php if($Session->read('user.user_type') == 'seller') :?>
                    <?= $this->element('sidebar/seller/main') ?>
                <?php else : ?>
                    <?= $this->element('sidebar/buyer/main') ?>
                <?php endif; ?>
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- <div class="content-header"> -->
                <!-- <div class="container-fluid"> -->
                    <?= $this->element('content/header') ?>
                <!-- </div> -->
                <!-- /.container-fluid -->
            <!-- </div> -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <?= $this->element('aside/main') ?>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <?= $this->element('footer/main') ?>
        </footer>
    </div>
    <!-- ./wrapper -->



    <?= $this->Html->script('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js') ?>
    <?= $this->Html->script('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js') ?>


    <!-- DataTables  & Plugins -->
  

    <?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables/jquery.dataTables.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/jszip/jszip.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/pdfmake/pdfmake.min.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/pdfmake/vfs_fonts.js') ?>
<?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') ?>

    <?= $this->element('layout/script') ?>
    <?= $this->fetch('script') ?>
</body>

</html>