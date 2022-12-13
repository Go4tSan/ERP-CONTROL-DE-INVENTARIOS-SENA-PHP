<?php  require_once "Views/Templates/Tables_Top.php"?>

          
              <!-- Begin Page Content -->
              <div class="container-fluid">


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Usuarios de teléfonos</h6>
    </div>
    <div class="card-body">
    </br>
    <?php if ($_SESSION['Tipo_Usuario']=="1"): ?>
    <center>
        <button class="btn btn-primary mb-4" type="button" id="Boton" onclick="frmUsuariosTelefonos();">👩‍💼 Crear nuevo usuario de teléfono ☎</button>
        </center>
        </br>

        </br>
        <button class="btn btn-success mb-4" type="button" id="Boton" onclick="UserTE();"> 📑 Generar reporte 👩‍💼</button>
    </br>


    <?php endif; ?>
    </br>
    
    <?php foreach ($data['Asignacion'] as $row){                                    
    echo '<span class="badge badge-success ">USUARIOS ACTIVOS: </span>'; echo $row['COUNT(*)']; }?>                               

<?php 
foreach ($data['Asignacion1'] as $row){ 
  echo "ㅤㅤ";  echo '<span class="badge badge-danger ">USUARIOS INACTIVOS: </span>';  echo $row['COUNT(*)']; }?>

</br>
</br>
</br>
        <div class="table-responsive">
            <table class="table table-bordered" id="tblUsuariosTelefonos" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Ubicación</th>
                        <th>Observación</th>
                        <th>Fecha de la Observacion</th>
                        <th>Extención</th>
                        <th>Estado</th>
                        <th>Opciones</th> 
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Ubicación</th>
                        <th>Observación</th>
                        <th>Fecha de la Observacion</th>
                        <th>Extención</th>
                        <th>Estado</th>
                        <th>Opciones</th> 
                    </tr>
                </tfoot>
                <tbody>   
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<div id="nuevoUsuarioTelefono" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="titleM">Usuario de teléfono</h5>
                            <button class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="frmUsuarioTelefono">

                            <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                   <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                   <div class="login"></div> 
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4" id="title">Registrar usuario de teléfono</h1>
                            </div>
                            <form class="user">
                                <div class="form-group ">

                              <input type="hidden" id="ID_Usuario" name="ID_Usuario">

                                   <!-- <div class="col-sm-6 mb-3 mb-sm-0"> -->
                                        <input type="text" class="form-control form-control-user" name="Nombre"
                                            placeholder="Nombre" id="Nombre" >
                            
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="Observacion"
                                        placeholder="Observación" id="Observacion" >
                                </div>
                                
                                <div class="form-group row" id="Tel">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            name="Ubicacion" placeholder="Ubicación" id="Ubicacion" >
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            name="Extencion" placeholder="Extención" id="Extencion" >
                                    </div>
                                </div>
                                <center>
                                <button type="submit"  class="btn btn-success"  id="editarUT" onclick="registrarUserTelefono(event);">📁 Registrar</button>
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
<!-- /.container-fluid -->

</div>
<?php require_once "Views/Templates/Tables_Bot.php"?>