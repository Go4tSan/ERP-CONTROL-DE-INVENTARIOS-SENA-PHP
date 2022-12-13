<?php 


class TelefonosExcel extends Controller{
    public function __construct()
    {
        parent::__construct();
}
 public function index()
    {
      $this->views->getView($this, "index");
    }


public function excel()
{
    date_default_timezone_set('America/Bogota'); 
    $Fecha_Reporte=date("d-m-Y - H:i:s"); 

    $data = $this->model->getTelefonosE();
    header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=Reporte_Telefonos_'.$Fecha_Reporte.'.xls');
header('Pragma: no-cache');
header('Expires: 0');

echo'<table border=1>';
echo'<tr>';
echo'<th colspan=14>Reporte de Telefonos</th>';
echo'</tr>';
echo'<tr><th>ID</th><th>Usuarios</th><th>Ambiente</th><th>Piso</th><th>Serial</th><th>Placa telefonica</th><th>Foto del objeto</th><th>Foto del ambiente</th><th>Marca</th><th>Observacion</th><th>Fecha de la observacion</th><th>MAC</th><th>Extencion</th><th>Estado</th></tr>';
for( $i=0; $i < count($data); $i++) {
 echo '<tr>';
 echo '<td>'.$data[$i]['Id_Telefono'].'</td>';
 echo '<td>'.$data[$i]['Nombre'].'</td>';
 echo '<td>'.$data[$i]['Ambiente'].'</td>';
 echo '<td>'.$data[$i]['Piso'].'</td>';
 echo '<td>'.$data[$i]['Seria'].'</td>';
 echo '<td>'.$data[$i]['Placa_Telefonica'].'</td>';
 echo '<td>'.$data[$i]['Foto_Objeto'].'</td>';
 echo '<td>'.$data[$i]['Foto_Ambiente'].'</td>';
 echo '<td>'.$data[$i]['Marca'].'</td>';
 echo '<td>'.$data[$i]['Observacion'].'</td>';
 echo '<td>'.$data[$i]['Fecha_Observacion'].'</td>';
 echo '<td>'.$data[$i]['MAC'].'</td>';
 echo '<td>'.$data[$i]['Extencion'].'</td>';
 if ($data[$i]['Asignacion'] == 1) {
 echo '<td>'.$data[$i]['Asignacion']='<span class="badge badge-primary">Asignado</span>'.'</td>';
 }  elseif($data[$i]['Asignacion'] == 3){
    echo'<td>'.  $data[$i]['Asignacion'] = '<span class="badge badge-danger">Inhabilitado</span>'.'</td>';
 }
 else {
    echo'<td>'.$data[$i]['Asignacion'] = '<span class="badge badge-danger">Disponible</span>'.'</td>';
 }
 echo '</tr>';
}
echo'</table>';

die();
}

}
?>