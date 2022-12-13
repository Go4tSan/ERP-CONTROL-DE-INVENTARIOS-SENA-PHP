<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bienvenido, <?php echo $_SESSION['nombre'] ?></title>

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url; ?>Assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url; ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url;?>">
                <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-fw fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Inventario Sena</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
          
            <?php if ($_SESSION['Tipo_Usuario']=="1"): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url; ?>RegistrarUsuario">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Registrar Admins</span></a>
            </li>
              <?php endif; ?>

              <hr class="sidebar-divider my-0">
              
           
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url; ?>UsuariosTelefonos">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Usuarios de telefonos</span></a>
            </li>
             

            <!-- Divider -->
            <?php if (header("VistaRapida")): ?>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url ?>VistaRapida">
                    <i class="fas fa-fw fa-eye"></i>
                    <span>Vista rápida</span></a>
            </li>
            <?php endif; ?>
            <!-- Heading -->
            <div class="sidebar-heading">
               <!-- Elementos -->
            </div>
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-wrench" ></i>
                    <span>Elementos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header" >Elementos del inventario</h6>
                        <a class="collapse-item" href="<?php echo base_url; ?>Telefonos" >☎ Teléfonos</a>
                        <a class="collapse-item" href="<?php echo base_url;?>AccessPoint">📡 Access points</a>
                        <a class="collapse-item" href="<?php echo base_url;?>Impresoras">🖨 Impresoras</a>
                        <a class="collapse-item" href="<?php echo base_url; ?>Switches">📻 Switches</a>
                    </div>
                </div>
            </li>

          
        

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <div class="general">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                  <!--  <form class="form-inline"> -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                    
                        <div class="topbar-divider d-none d-sm-block"></div> 

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo $_SESSION['correo'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url; ?>img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                             
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->