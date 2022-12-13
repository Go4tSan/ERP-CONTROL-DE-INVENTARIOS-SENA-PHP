<div class="container">
<form method="post" id="frmUsuarioRecuperar">
<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                <div class="login"></div>
                  <!---  <div class="col-lg-6 d-none d-lg-block bg-password-image"></div> -->
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-2">Recuperar contraseña</h1>
                                <p class="mb-4">Digite su correo y en unos segundos su nueva contraseña aparecerá en pantalla</p>
                            </div>
                          <!--  <form class="user"> -->
                                <div class="form-group">

                                    <input type="email" class="form-control form-control-user" id="correo"
                                        name="correo" aria-describedby="emailHelp"
                                        placeholder="Correo . . ." required>
                                </div>
                                <hr>
<center>
                                <button type="submit" class="btn btn-primary" id="RecuperarU" onclick="recuperarUser(event);">Enviar</button>
</center>
                            </form> 
                          
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>

<!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url; ?>Assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url; ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url; ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url; ?>Assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url; ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url; ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url; ?>Assets/js/demo/datatables-demo.js"></script>


    <script>
    const base_url = "<?php echo base_url; ?>"
    </script>

<script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>

    <script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>

</body>

</html>