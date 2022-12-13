<body class="bg-gradient-primary">
<form id="frmLogin" >
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                        <!--    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                        <div class="login"></div> 
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Inicio de sesión</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="usuario" name="usuario"
                                                aria-describedby="emailHelp"
                                                placeholder="Digite su correo . . ."   required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="clave" name="clave"
                                               placeholder="Digite su Contraseña . . ." required>
                                        </div>
                                      
                                       
                                        <hr>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" onclick="frmLogin(event);"> Entrar </button>
                                            
                                      
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="Recuperar_Contra.php">Recuperación de contraseña</a>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</form>
    <!-- Bootstrap core JavaScript -->
 <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
   <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../Assets/js/sb-admin-2.min.js"></script> 
    <script>
    const base_url = "<?php echo base_url; ?>"
</script>
    <script src="../Assets/js/funciones.js"></script>
</body>
</html>