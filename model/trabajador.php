<?php

class Trabajador {
	private $pdo;
    
    public $id_trabajador;
    public $nombre;
    public $apellido_p;
    public $apellido_m;
	public $tipo_doc;
	public $num_doc;
	public $sexo;
	public $fecha_nacimiento;
	public $departamento;
	public $provincia;
	public $distrito;
	public $direccion;
	public $estado;
    public $fecha_registro;

	public function __CONSTRUCT(){
		try{
			$this->pdo = Database::connect();     
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Listar(){
		try{
			$result = array();

			$stm = $this->pdo->prepare("SELECT t.*, d.nombre_departamento, p.nombre_provincia, di.nombre_distrito FROM trabajador t INNER JOIN departamentos d ON t.departamento = d.id_departamento INNER JOIN provincias p ON p.id_provincia = t.provincia INNER JOIN distritos di ON di.id_distrito = t.distrito  WHERE t.estado = true");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Obtener($id_trabajador){
		try{
			$stm = $this->pdo->prepare("SELECT * FROM trabajador WHERE id_trabajador = ?");
			          
			$stm->execute(array($id_trabajador));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}

	public function Eliminar($id_trabajador){
		try{
			$stm = $this->pdo->prepare("DELETE FROM trabajador WHERE id_trabajador = ?");			          

			$stm->execute(array($id_trabajador));
		} catch (Exception $e){
			die($e->getMessage());
		}
	}

	public function Actualizar($data){
		try{
			$sql = "UPDATE trabajador SET 
						nombre          = ?, 
						apellido_p        = ?,
						apellido_m        = ?,
						tipo_doc        = ?,
						num_doc        = ?,
						sexo        = ?,
						fecha_nacimiento        = ?,
                        departamento        = ?,
						provincia            = ?, 
						distrito = ?,
						direccion = ?
				    WHERE id_trabajador = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                        $data->apellido_p,
                        $data->apellido_m,
                        $data->tipo_doc,
                        $data->num_doc,
                        $data->sexo,
						$data->fecha_nacimiento,
						$data->departamento,
						$data->provincia,
						$data->distrito,
						$data->direccion,
						$data->id
					)
				);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}

	public function Registrar(Trabajador $data){
		try{
			$numero_doc = $data->num_doc;
			$nuevo_usuario="SELECT num_doc FROM trabajador WHERE num_doc='$numero_doc'";
			$query = $this->pdo->prepare($nuevo_usuario);
			$query->execute();
			if($query->fetchColumn()>0){
				echo '<script>alert("Usuario ya existe")</script>';
			}else{
			$sql = "INSERT INTO trabajador (nombre,apellido_p,apellido_m,tipo_doc,num_doc,sexo,fecha_nacimiento,departamento,provincia,distrito,direccion,estado,fecha_registro) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->nombre,
                        $data->apellido_p, 
                        $data->apellido_m, 
                        $data->tipo_doc,
                        $data->num_doc,
						$data->sexo,
						$data->fecha_nacimiento,
						$data->departamento,
						$data->provincia,
						$data->distrito,
						$data->direccion,
						1,
                        date('Y-m-d')
                    )
                );
			}
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
}