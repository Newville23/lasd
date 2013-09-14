<?php 

/**
* 
*/
class Tiempo
{
	
	function __construct()
	{

	}

	public function calcularEdad($fecha_nacimiento)
	{
		$nacimiento = date_parse($fecha_nacimiento);
		//echo "<pre>"; print_r($nacimiento); echo "</pre>";
	
		if (checkdate( $nacimiento['month'] , $nacimiento['day'] , $nacimiento['year'])) {
			//fecha actual
			$day=date('j'); // dia actial sin ceros.
			$month=date('n'); // mes actial sin ceros.
			$year=date('Y');

			//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual
			if (($nacimiento['month'] == $month) && ($nacimiento['day'] > $day)) 
			{
				$year=($year-1); 
			}
			 
			//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual
			if ($nacimiento['month'] > $month) 
			{
				$year=($year-1);
			}
			 
			//ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad
			$edad = ($year-$nacimiento['year']);
			 
			return $edad;
		}
		else{
			return '';
		}

	}


	// Entrada: string de formato: 1993-02-17 10:47:14
	// Salida: string;
	// vuelve una fecha mucho mas amigable ej: 10:47 - 13 Sep de 2013
	public function fechaHumana($fecha)
	{
		date_default_timezone_set('America/Bogota');
    	$mes = array("Jan ","Feb ","Mar ","Apr ","May ","Jun ","Jul ","Aug ","Sep ","Oct ","Nov ","Dec ");


    	list($user, $hora) = explode(" ", $fecha);

		// fecha de entrada
		$fecha = date_parse($fecha);
		//echo "<pre>"; print_r($fecha); echo "</pre>";

		// fecha actual
		$hoy = date("Y-m-d H:i:s");
		$hoy = date_parse($hoy);

		//echo "<pre>"; print_r($hoy); echo "</pre>";


		// la fecha no es de este año
		if ($hoy['year'] > $fecha['year']) {
			
			echo $fechaHumana = $fecha['day'] .' '. $mes[$fecha['month']-1] .' de '. $fecha['year'];
		}
		elseif ($hoy['year'] = $fecha['year']) {

			if ($hoy['month'] == $fecha['month'] && $hoy['day'] == $fecha['day']) {

				$horasPasadas = $hoy['hour'] - $fecha['hour'];
				$minutosPasados = $hoy['minute'] - $fecha['minute'];
				$segundos = "";

				if ($horasPasadas == 0 && $minutosPasados == 0) {

					$segundos = ($hoy['second'] - $fecha['second']) . ' segundos';					
				}

				if ($horasPasadas == 0) {
					$horasPasadas = "";
				}else{
					$horasPasadas = $horasPasadas . " hora(s)";
				}
				
				if ($minutosPasados == 0) {
					$minutosPasados = "";
				}else{
					$minutosPasados = $minutosPasados . " min";
				}
				echo 'Hace ' . $horasPasadas .' '. $minutosPasados .' '. $segundos;
			}
			else{

				$fechaSimple = $fechaHumana = $fecha['day'] .' '. $mes[$fecha['month']-1] .' de '. $fecha['year'];
				echo $hora .' - '. $fechaSimple;
			}
		}
	}


}



?>