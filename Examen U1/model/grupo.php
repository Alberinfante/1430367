<?php
class Grupo
{
	private $pdo;
    
    public $id;
    public $cuatrimestre;
    public $nombre;

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

	public function ListarGrupo()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM grupos");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ObtenerGrupo($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM grupos WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function EliminarGrupo($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM grupos WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ActualizarGrupo($data)
	{
		try 
		{
			$sql = "UPDATE grupos SET 
						cuatrimestre          = ?, 
						nombre = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->cuatrimestre, 
                        $data->nombre,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function RegistrarGrupo(Grupo $data)
	{
		try 
		{
		$sql = "INSERT INTO grupos (cuatrimestre,nombre) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->cuatrimestre,
                    $data->nombre, 
                 
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}