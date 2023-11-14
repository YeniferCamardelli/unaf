<?php

/**
* Clase Fecha
*/
abstract class FechayHora
{

	public static function FechaHoraFormatoLargo($fechayhora){
		//Retorna Jueves, 17 de Marzo de 2016 a las 16:52:48
		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

		return $dias[date('w',strtotime($fechayhora))].", "
				.date('d',strtotime($fechayhora))." de "
				.$meses[date('n',strtotime($fechayhora))-1]. " de "
				.date('Y') . " a las " . date('H:i:s',strtotime($fechayhora));

	}

	public static function FechaFormatoCorto($fechayhora){
		//Retorna Jueves, 17 de Marzo de 2016 a las 16:52:48
		return date('d/m/Y',strtotime($fechayhora));

	}

	public static function HoraFormatoCorto($fechayhora){
		//Retorna Jueves, 17 de Marzo de 2016 a las 16:52:48
		return date('H:i:s',strtotime($fechayhora));

	}

	public static function FechaHoraFormatoCorto($fechayhora){
		//Retorna Jueves, 17 de Marzo de 2016 a las 16:52:48
		return date('d/m/Y H:i:s',strtotime($fechayhora));

	}

}