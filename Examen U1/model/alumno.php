<?php
class Alumno
{
	private $pdo;
    
    public $id;
    public $matricula;
    public $nombre;
    public $apellidos;
    public $carrera;
    public $ano_ingreso;
    public $Foto;
    public $id_grupo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM alumnos");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM alumnos WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM alumnos WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE alumnos SET 
						matricula          = ?,
						nombre          = ?, 
						apellidos        = ?,
                        carrera        = ?,
						ano_ingreso            = ?, 
						id_grupo = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->matricula, 
                        $data->nombre,
                        $data->apellidos,
                        $data->carrera,
                        $data->ano_ingreso,
                        $data->id_grupo,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Alumno $data)
	{
		try 
		{
		$sql = "INSERT INTO alumnos (matricula,nombre,apellidos,carrera,ano_ingreso,id_grupo) 
		        VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->matricula,
                    $data->nombre, 
                    $data->apellidos, 
                    $data->carrera,
                    $data->ano_ingreso,
                    $data->id_grupo
                 
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}