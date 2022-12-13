<?php 


class AccessExcel extends Controller{
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

    $data = $this->model->getAccessE();
    header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=Reporte_AccessPoint_'.$Fecha_Reporte.'.xls');
header('Pragma: no-cache');
header('Expires: 0');

echo'<table border=1>';
echo'<tr>';
echo'<th colspan=13>Reporte de Access points</th>';
echo'</tr>';
echo'<tr><th>ID</th><th>Switch</th><th>Ambiente</th><th>Piso</th><th>Serial</th><th>Placa telefonica</th><th>Foto del objeto</th><th>Foto del ambiente</th><th>Marca</th><th>Observacion</th><th>Fecha de la observacion</th><th>MAC</th><th>Estado</th></tr>';
for( $i=0; $i < count($data); $i++) {
 echo '<tr>';
 echo '<td>'.$data[$i]['Id_Access'].'</td>';
 echo '<td>'.$data[$i]['Switch'].'</td>';
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
 if ($data[$i]['Estado'] == 1) {
 echo '<td>'.$data[$i]['Estado']='<span class="badge badge-primary">Operativo</span>'.'</td>';
 }else {
    echo'<td>'.$data[$i]['Estado'] = '<span class="badge badge-danger">Inhabilitado </span>'.'</td>';
 }
 echo '</tr>';
}
echo'</table>';

die();
}

}
?>