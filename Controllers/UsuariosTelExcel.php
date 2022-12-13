<?php 


class UsuariosTelExcel extends Controller{
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

    $data = $this->model->getUsuarioTelE();
    header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=Reporte_Usuarios_'.$Fecha_Reporte.'.xls');
header('Pragma: no-cache');
header('Expires: 0');

echo'<table border=1>';
echo'<tr>';
echo'<th colspan=7>Reporte de usuarios de telefonos</th>';
echo'</tr>';
echo'<tr><th>ID</th><th>Nombre</th><th>Ubicacion</th><th>Observacion</th><th>Fecha de la observacion</th><th>Extencion</th><th>Estado</th></tr>';
for( $i=0; $i < count($data); $i++) {
 echo '<tr>';
 echo '<td>'.$data[$i]['ID_Usuario'].'</td>';
 echo '<td>'.$data[$i]['Nombre'].'</td>';
 echo '<td>'.$data[$i]['Ubicacion'].'</td>';
 echo '<td>'.$data[$i]['Observacion'].'</td>';
 echo '<td>'.$data[$i]['Fecha_Observacion'].'</td>';
 echo '<td>'.$data[$i]['Extencion'].'</td>';
 if ($data[$i]['Estado'] == 1) {
 echo '<td>'.$data[$i]['Estado']='<span class="badge badge-primary">Activo</span>'.'</td>';
 }else {
    echo'<td>'.$data[$i]['Estado'] = '<span class="badge badge-danger">Inactivo</span>'.'</td>';
 }
 echo '</tr>';
}
echo'</table>';

die();
}

}
?>