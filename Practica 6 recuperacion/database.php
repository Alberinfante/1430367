<?php
	
	class DatabaseMaestro{
		private $con;
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="usbw";
		private $dbname="recu p6";
		function __construct(){
			$this->connect_db();
		}
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
		
		public function sanitize($var){
			$return = mysqli_real_escape_string($this->con, $var);
			return $return;
		}
		public function createMaestro($nombres,$apellidos,$correo_electronico,$carrera){
			$sql = "INSERT INTO `maestros` (nombres, apellidos, correo_electronico, carrera) VALUES ('$nombres', '$apellidos', 'correo_electronico', '$carrera')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		public function readMaestro(){
			$sql = "SELECT * FROM maestros";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function single_recordMaestro($id){
			$sql = "SELECT * FROM maestros where id='$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}

		public function updateMaestro($nombres,$apellidos,$correo_electronico,$carrera, $id){
			$sql = "UPDATE maestros SET nombres='$nombres', apellidos='$apellidos', correo_electronico='$correo_electronico', carrera='$correo_electronico' WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		public function deleteMaestro($id){
			$sql = "DELETE FROM maestros WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
	}




	class DatabaseAlumno{
		private $con;
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="usbw";
		private $dbname="recu p6";
		function __construct(){
			$this->connect_db();
		}
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
		
		public function sanitize($var){
			$return = mysqli_real_escape_string($this->con, $var);
			return $return;
		}

		public function createAlumno($nombres,$apellidos,$correo_electronico,$carrera){
			$sql = "INSERT INTO `alumnos` (nombres, apellidos, correo_electronico, carrera) VALUES ('$nombres', '$apellidos', 'correo_electronico', '$carrera')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		public function readAlumno(){
			$sql = "SELECT * FROM alumnos";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function single_recordAlumno($matricula){
			$sql = "SELECT * FROM alumnos where matricula='$matricula'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}

		public function updateAlumno($nombres,$apellidos,$correo_electronico,$carrera, $matricula){
			$sql = "UPDATE alumnos SET nombres='$nombres', apellidos='$apellidos', correo_electronico='$correo_electronico', carrera='$correo_electronico' WHERE matricula=$matricula";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		public function deleteAlumno($matricula){
			$sql = "DELETE FROM alumnos WHERE matricula=$matricula";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
	}
	
	

?>	

