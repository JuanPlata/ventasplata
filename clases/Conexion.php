<?php 

	class conectar{
		private $servidor="localhost";
		private $usuario="root";
		private $password="Chivas 09";
		private $bd="ventas";

		public function conexion(){
			$conexion=mysqli_connect($this->servidor,
									 $this->usuario,
									 $this->password,
									 $this->bd);
			return $conexion;
		}
	}
	

/*
class conectar{
	private $servidor="localhost";
	private $usuario="id18162310_platajuan179";
	private $password="Chivas_09BDV";
	private $bd="id18162310_ventassoftware";

	public function conexion(){
		$conexion=mysqli_connect($this->servidor,
								 $this->usuario,
								 $this->password,
								 $this->bd);
		return $conexion;
	}
}
*/

 ?>