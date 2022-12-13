<?php  require_once "Views/Templates/Tables_Top.php"?>

    <?php 
     
     /*header("Content-type: application/vnd.ms-excel");
     header("Content-Disposition: attachment; filename=impresoras.xls");
     header("Pragma: no-cache");
     header("Expires");*/
     
     ?>    
              <!-- Begin Page Content -->
              <div class="container-fluid">


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Impresoras</h6>
    </div>
    <div class="card-body">
    </br>
    <?php if ($_SESSION['Tipo_Usuario']=="1"): ?>
    <center>
        <button class="btn btn-primary mb-4" type="button" id="Boton" onclick="frmImpresora();"> 📟 Registrar impresora 🖨</button>
        </center>
        </br>
        <button class="btn btn-success mb-4" type="button" id="Boton" onclick="ImpresoraE();"> 📑 Generar reporte 🖨</button>
    </br>

    <?php endif; ?>
    </br>
    <?php foreach ($data['Estado'] as $row){                                    
    echo '<span class="badge badge-success ">IMPRESORAS ACTIVAS: </span>'; echo $row['COUNT(*)']; }?>                               

<?php 
foreach ($data['Estado1'] as $row){ 
  echo "ㅤㅤ";  echo '<span class="badge badge-danger ">IMPRESORAS INACTIVAS: </span>';  echo $row['COUNT(*)']; }?>

</br>
</br>
</br>
 
        <div class="table-responsive">
            <table class="table table-bordered" id="tblImpresora" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>MAC</th>
                        <th>IP</th>
                        <th>Modelo</th>
                        <th>Ambiente</th>
                        <th>Piso</th>
                        <th>Serial</th>
                        <th>Placa</th>
                        <th>Foto del switch</th> 
                        <th>Foto del ambiente</th>
                        <th>Marca</th>
                        <th>Observación</th>
                        <th>Fecha de la Observación</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>MAC</th>
                        <th>IP</th>
                        <th>Modelo</th>
                        <th>Ambiente</th>
                        <th>Piso</th>
                        <th>Serial</th>
                        <th>Placa</th>
                        <th>Foto del switch</th> 
                        <th>Foto del ambiente</th>
                        <th>Marca</th>
                        <th>Observación</th>
                        <th>Fecha de la Observación</th>
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
<div id="nuevoImpresora" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="titleM">Impresora</h5>
                            <button class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="frmImpresora">

                            <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  
                   <div class="login"></div> 
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4" id="title">Registrar Impresora</h1>
                            </div>
                            <form class="user">
                                <div class="form-group ">

                              <input type="hidden" id="Id_Impresora" name="Id_Impresora">

                           

                             <div class="form-group row" >
                                 
                            
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="MAC"
                                            placeholder="MAC" id="MAC" >
                                    </div>

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="Ip"
                                            placeholder="IP" id="Ip" >
                                    </div>
                            
                                </div>         
                                
                                <div class="form-group row" >  
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" name="Modelo"
                                            placeholder="Modelo" id="Modelo" >
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" name="Ambiente"
                                            placeholder="Ambiente" id="Ambiente" >
                                </div>

                                </div>
    </p>
                                    <label for="Piso">Piso:</label>
                                    <select id="Piso" class="form-control" name="Piso">
                                        <option value="No aplica">No aplica</option>
                                        <option value="1">Primer piso</option>
                                        <option value="2">Segundo piso</option>
                                        <option value="3">Tercer piso</option>
                                    </select>

                                </div>
                                                              
                                <div class="form-group row" id="Tel">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            name="Serial" placeholder="Serial" id="Serial" >
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            name="Placa_Telefonica" placeholder="Placa" id="Placa_Telefonica" >
                                    </div>
                                </div>
<div class="">
    <div class="form-group" >
                                  <div class="card border-primary">
                                  <div class="card-body">
    </p>                          <label for="Foto_Objeto" class="btn btn-primary" id="Label"> 📷 Foto de la Impresora: 🖨 </label>
                                  <input type="file"  class="d-none" name="Foto_Objeto" id="Foto_Objeto" onchange="preview(event);">
                                  <img class="img-thumbnail"  id="img-preview">
                                  </div>
                                  </div>
    </p>                 <div class="card border-primary">
                         <div class="card-body">
                         <label for="Foto_Ambiente" class="btn btn-primary" id="Label1">📸 Foto del Ambiente: 🏢</label>
                         <input type="file"  class="d-none" name="Foto_Ambiente" id="Foto_Ambiente" onchange="preview1(event);">
                         <img class="img-thumbnail"  id="img-preview1">
                         <input type="hidden" id="foto_actual" name="foto_actual">
                         <input type="hidden" id="foto_actual2" name="foto_actual2">
                         </div>
                         </div>
    </div>
</div>
    </p>     
                                <div class="form-group row" id="">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            name="Marca" placeholder="Marca" id="Marca" >
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            name="Observacion" placeholder="Observacion" id="Observacion" >
                                    </div>
                                </div>
    </p>
                                   
    </br>
                                <center>
                                <button type="submit"  class="btn btn-success"  id="editarI" onclick="registrarImpresora(event);">📁 Registrar</button>
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
