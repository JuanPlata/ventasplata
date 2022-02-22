<?php 

	session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";
			
				$objv= new ventas();
			
			
				$c=new conectar();
				$conexion= $c->conexion();
	
	
	//print_r($_SESSION['tablaComprasTemp']);
 ?>

 <h4>Hacer venta</h4>
 
 <h4><strong><div id="nombreclienteVenta"></div></strong></h4>
 
 <table class="table table-bordered table-hover table-condensed" style="text-align: center;">
 	<caption>
	 <label>Seleciona metodo de pago</label>
			<select class="form-control input-sm" id="metodopago" name="metodopago">
				<option value="1">Efectivo</option>
				<option value="0">Tarjeta</option>
	</select>
	<p></p>
	 <span class="btn btn-success" onclick="crearVenta()"> Generar venta
 			<span class="glyphicon glyphicon-usd"></span>
 		</span>
 	</caption>
 	<tr>
 		<td>Nombre</td>
 		<td>Descripcion</td>
 		<td>Precio</td>
 		<td>Cantidad</td>
 		<td>Quitar</td>
 	</tr>
 	<?php 
 	$total=0;//esta variable tendra el total de la compra en dinero
 	$cliente=""; //en esta se guarda el nombre del cliente
 		if(isset($_SESSION['tablaComprasTemp'])):
 			$i=0;
 			foreach (@$_SESSION['tablaComprasTemp'] as $key) {

 				$d=explode("||", @$key);
 	 ?>

 	<tr>
 		<td><?php echo $d[1] ?></td>
 		<td><?php echo $d[2] ?></td>
 		<td><?php echo $d[3] ?></td>
 		<td><?php echo $d[6]; ?></td>
 		<td>
 			<span class="btn btn-danger btn-xs" onclick="quitarP('<?php echo $i; ?>')">
 				<span class="glyphicon glyphicon-remove"></span>
 			</span>
 		</td>
 	</tr>

 <?php 
 		$total=$total + $d[3] * $d[6];
 		$i++;
 		$cliente=$d[4];
 	}
 	endif; 
 ?>

 	<tr>
 		<td>Total de venta: <?php echo "$".$total; ?></td>
 	</tr>

 </table>


 <script type="text/javascript">
 	$(document).ready(function(){
 		nombre="<?php echo @$cliente ?>";
 		$('#nombreclienteVenta').text("Nombre de cliente: " + nombre);
 	});
 </script>