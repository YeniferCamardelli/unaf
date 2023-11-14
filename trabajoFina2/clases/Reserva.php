<?php

/**
* Clase Reserva.
*/

include "Conexion.php";

class Reserva extends Conexion
{
	private $Id;	
	public $Rela_Tipohabitacion;
	public $reserva_cant_adultos;
    public $reserva_cant_habitaciones;
    public $reserva_cant_menores ;
    public $reserva_email;
    public $reserva_entrada;
    public $reserva_mensaje;
    public $reserva_nombre;
    public $reserva_salida;
    public $reserva_telefono;
	const TABLA = 'reservas';
	
	function __construct($id=0){
		parent::__construct();
		if ($id != 0){
			$reservas = $this->seleccionarId($id)->fetch(PDO::FETCH_ASSOC);
			if ($noticia){                                                               
				$this->Id = $reservas['id'];
				$this->Rela_Tipohabitacion = $reservas['rela_tipohabitacion'];
				$this->reserva_cant_adultos = $reservas['reserva_cant_adultos'];
				$this->reserva_cant_habitaciones = $reservas['reserva_cant_habitaciones'];
				$this->reserva_cant_menores = $reservas['reserva_cant_menores'];
				$this->reserva_email = $reservas['reserva_email'];
				$this->reserva_entrada = $reservas['reserva_entrada'];
				$this->reserva_mensaje = $reservas['reserva_mensaje'];
				$this->reserva_nombre = $reservas['reserva_nombre'];
				$this->reserva_salida = $reservas['reserva_salida'];
				$this->reserva_telefono = $reservas['reserva_telefono'];
			}
		}
	}

	public function reserva_fecha_alta(){
		return $this->reserva_Fecha_Alta;
	}

	

	public function id(){
		return $this->Id;
	}
	
	public function seleccionarFiltro($filtro="",$orden=""){
		$query = "SELECT reservas.id
					,rela_tipohabitacion
					,reserva_nombre
					,reserva_telefono
					,reserva_cant_adultos
					,reserva_cant_habitaciones
					,reserva_cant_menores
					,reserva_email
					,reserva_entrada
					,reserva_salida
					,reserva_mensaje
					FROM ". self::TABLA. " WHERE 1=1";
		if (!empty($filtro)){
			 $query .= " And $filtro";			
		}	
		if (!empty($orden)){
			$query .= " Order By $orden";
		}
		$resultado = $this->link->query($query);
		return $resultado;

	}

	public  function seleccionarId($id=0){
		if ($id != 0){
			$query = "SELECT reservas.id
					,rela_tipohabitacion
					,reserva_cant_adultos
					,reserva_cant_habitaciones
					,reserva_cant_menores
					,reserva_email
					,reserva_entrada
					,reserva_mensaje
					,reserva_nombre
					,reserva_salida
					,reserva_telefono
					,tipo_habitacion_descri FROM ". self::TABLA .",tipo_habitacion WHERE rela_tipohabitacion = tipo_habitacion.id And ". self::TABLA.".id=$id";
		}	
		$resultado = $this->link->query($query);
		return $resultado;
	}

	public function insertar(){	
		$query = "INSERT INTO ". self::TABLA ." (rela_tipohabitacion
					,reserva_cant_adultos
					,reserva_cant_habitaciones
					,reserva_cant_menores
					,reserva_email
					,reserva_entrada
					,reserva_mensaje
					,reserva_nombre
					,reserva_salida
					,reserva_telefono) VALUES ($this->Rela_Tipohabitacion, '$this->reserva_cant_adultos', '$this->reserva_cant_habitaciones', '$this->reserva_cant_menores', '$this->reserva_email', '$this->reserva_entrada', '$this->reserva_mensaje', '$this->reserva_nombre', '$this->reserva_salida', $this->reserva_telefono)";				
		$resultado = $this->link->query($query);
		return $resultado;
	}


	public function eliminar(){
		$query = "DELETE FROM ". self::TABLA ." WHERE id = $this->Id";		
		$resultado = $this->link->query($query);
		return $resultado;		
	}

}

/**
* Clase TipoHabitacion
*/

class TipoHabitacion extends Conexion
{

	public function __construct()
	{
		parent::__construct();
	}

	public function seleccionarFiltro($filtro="",$orden=""){
		$query = "SELECT id,tipo_habitacion_descri FROM tipo_habitacion WHERE 1=1 ";
		if (!empty($filtro)){
			 $query .= " And $filtro";			
		}	
		if (!empty($orden)){
			$query .= " Order By $orden";
		}
		$resultado = $this->link->query($query);
		return $resultado;	
	}
}