<body class="bg-gradient-primary">

    <div class="container">

</br> </br> </br>
        <div class="container-fluid">


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Usuarios registrados</h6>
    </div>
    <div class="card-body">
        <center>
        <button class="btn btn-success mb-4" type="button" id="Boton" onclick="frmUsuarios();">👩‍💼 Crear nuevo usuario 👨‍💼</button>
        </center>
        <div class="table-responsive">
            <table class="table table-bordered" id="tblUsuarios" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo de usuario</th>
                        <th>Correo</th>
                        <th>Nombre</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tipo de usuario</th>
                        <th>Correo</th>
                        <th>Nombre</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    
                </tbody>
            </table>
            <div id="nuevoUsuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="titleM">Creación de usuario</h5>
                            <button class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="frmUsuario">

                            <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                   <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                   <div class="login"></div> 
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4" id="title">Registrar usuario</h1>
                            </div>
                            <form class="user">
                                <div class="form-group ">

                              <input type="hidden" id="id" name="id">

                                   <!-- <div class="col-sm-6 mb-3 mb-sm-0"> -->
                                        <input type="text" class="form-control form-control-user" name="nombre"
                                            placeholder="Nombre" id="nombre" >
                            
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="correo"
                                        placeholder="Correo Sena" id="correo" >
                                </div>
                                <div class="form-group">
                                    <label for="Tipo">Tipo de usuario:</label>
                                    <select id="Tipo" class="form-control" name="Tipo">
                                        <option value="2">Admin</option>
                                        <option value="1">Super Admin</option>
                                    </select>
                                </div>
                                <div class="form-group row" id="contras">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            name="clave" placeholder="Contraseña " id="clave" >
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            name="repetir" placeholder="Repetir Contraseña" id="repetir" >
                                    </div>
                                </div>
                                <center>
                                <button type="submit"  class="btn btn-success"  id="editarU" onclick="registrarUser(event);">📁 Registrar</button>
                                </center>
                            </form>                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
                            </form>
                        </div>
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

      <!-- Bootstrap core JavaScript-->
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