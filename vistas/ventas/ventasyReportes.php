<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";

	$c= new conectar();
	$conexion=$c->conexion();
	
	$obj= new ventas();
	
	$sql="SELECT id_venta,
				fechaCompra,
				id_cliente,
				pago 
			from ventas group by id_venta order by id_venta DESC";
	$result=mysqli_query($conexion,$sql); 
	?>

<h4>Reportes general</h4>

<form id="frmreport" method="GET" action="../procesos/ventas/crearReportePdf.php" >
  <div>
<label for="start">Desde:</label>
<input type="date" id="FI" name="FI"
       value=""
       min="2018-01-01" max="2030-12-31">
<label for="start">Hasta:</label>
<input type="date" id="FF" name="FF"
       value=""
       min="2018-01-01" max="2030-12-31">

<input type="submit" value="Generar reporte" class="btn btn-primary btn-sm" >

<!--<span id="btn1" class="btn btn-danger btn-sm">
		Reporte <span class="glyphicon glyphicon-file"></span>
</span>
-->
<!--
<a href="../procesos/ventas/crearReportePdf.php?FI=2021-12-11&FF=2021-12-11" class="btn btn-danger btn-sm">
		Reporte <span class="glyphicon glyphicon-file"></span>
</a>-->	
	   </div>
</form>





<hr>
<h4>Ventas individuales</h4>
<div class="row">
<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="table-responsive">
			<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
				<caption><label>Ventas :)</label></caption>
				<tr>
					<td>Folio</td>
					<td>Fecha</td>
					<td>Cliente</td>
					<td>Total de compra</td>
					<td>Metodo pago</td>
					<td>Ticket</td>
					
				</tr>
		<?php while($ver=mysqli_fetch_row($result)): ?>
				<tr>
					<td><?php echo $ver[0] ?></td>
					<td><?php echo $ver[1] ?></td>
					<td>
						<?php
							if($obj->nombreCliente($ver[2])==" "){
								echo "S/C";
							}else{
								echo $obj->nombreCliente($ver[2]);
							}
						 ?>
					</td>
					<td>
						<?php 
							echo "$".$obj->obtenerTotal($ver[0]);
						 ?>
					</td>
					
					<td>
					<?php
							if($ver[3]== 1){
								echo "Efectivo";
							}else{
								echo "Tarjeta";
							}
						 ?>
						   
					</td>

					<td>
						<a href="../procesos/ventas/crearTicketPdf.php?idventa=<?php echo $ver[0] ?>" class="btn btn-danger btn-sm">
							Ticket <span class="glyphicon glyphicon-list-alt"></span>
						</a>
					</td>
					
				</tr>
		<?php endwhile; ?>
			</table>
		</div>
	</div>
	<div class="col-sm-1"></div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	
});
</script>
