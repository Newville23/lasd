<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 
*/
class Sesion
{
	
	function __construct()
	{
		// Define el tiempo de sesion donde el valor entero indica en tiempo en minutos.
		define('SESSION_TIME', 50);
		session_start();
	}

	/* session_start() crea una sesión o reanuda la actual basada en un identificador de sesión 
	*pasado mediante una petición GET o POST, o pasado mediante una cookie. */
	public static function init()
    {
        session_start();
    }

	//-----------------------------------------------------------------------
	
	/**
	* @access	public
	* Destruye variables de sessión.
	* Entrada: nada: detruye todo, variable: la destruye, array: destruye el grupo.	
	*/
		public static function destroy($clave = false)
		{
			if ($clave) {
				if (is_array($clave)) {
					for ($i=0; $i < count($clave); $i++) { 
						if (isset($_SESSION[$clave[$i]])) {
							unset($_SESSION[$clave[$i]]);
						}
					}
				}
				else{
					if (isset($_SESSION[$clave])) {
							unset($_SESSION[$clave]);
					}
				}
			}
			else{
				session_destroy();
			}
		}


	//------------------------------------------------------------------------

	/** 
	*
	* Añade un $valor a la variable $_SESSION[$clave] 
	* @access	public
	* @param string
	* @param mixto, puede ser cualquier variable que soporte una variable $_SESSION[]
	*/
		public static function set($clave, $valor)
		{
			if (!empty($clave))
				$_SESSION[$clave] = $valor;
		}

	//----------------------------------------------------------------------

	/**
	 * @access	public
	 * @param	string
	 * @return	Retorna el valor de la variable $_SESSION[$clave]
	*/

		public static function get($clave)
		{
			if (isset($_SESSION[$clave])){
				return $_SESSION[$clave];
			}
		}


	//----------------------------------------------------------------------

	/**
	 * @access	public
	 * @param	string, la key (string $level) del usuario 'admin', 'especial' o 'usuario'
	 *
	 * Esta funcion compara el nivel de acceso de un usuario con el $level (string) ingresado
	 * Si es mayor lo permite que continue la ejecucion de lo contrarion redirecciona a un error
	 * Entrada: un estring 'admin', 'especial' o 'usuario'
	 */

		public static function acceso($level)
		{

			if (!Sesion::get('autenticado')) {

				show_error('Acceso restringido!');
				//header('location:' . BASE_URL . 'error/access/5050');
				exit;
			}
			Sesion::tiempo();

			//$_SESSION['level'] : variable 'string' que se crea al usuario iniciar sesión
			if (Sesion::getLevel($level) > Sesion::getLevel(Sesion::get('level'))) {
				// header('location:' . BASE_URL . 'error/access/5050');
				show_error('¡Acceso restringido!');
				exit;
			}
		}

	//-------------------------------------------------------------------------
		public static function accesoView($level)
		{
			if (!Sesion::get('autenticado')) {
				return false;
			}

			if (Sesion::getLevel($level) > Sesion::getLevel(Sesion::get('level'))) {
				return false;
			}

			return true;
		}


	//----------------------------------------------------------------------
	/**
	 * @access	public
	 * @param	la key (string $level) del usuario 'admin', 'especial' o 'usuario'
	 * @return	entero, Retorna el nivel de usario (un entero).
	*/
		public static function getLevel($level)
		{
			$role['admin'] = 3;
			$role['especial'] = 4;
			$role['estudiante'] = 2;
			$role['profesor'] = 2;
			$role['usuario'] = 1;

			// 'array_key_exists' Verifica si el índice o clave dada existe en el array
			if (!array_key_exists($level, $role)) {
				// throw new Exception("Error de acceso");
				show_error('Error de acceso');

			}
			else{
				return $role[$level];
			}
		}

	//----------------------------------------------------------------------
	/**
	 * @access	public
	 * @param	
	 * @return	
	*/
		public static function accesoEstricto(array $level, $noAdmin = false)
		{
			if (!Sesion::get('autenticado')) {
				// header('location:' . BASE_URL . 'error/access/5050');
				show_error('¡Acceso restringido!');
				exit;
			}
			if ($noAdmin == false) {
				if (Sesion::get('level') == 'admin') {
					return;
				}
			}
			if (count($level)) {
				if (in_array(Sesion::get('level'), $level)) {
					return;
				}
			}

			// header('location:' . BASE_URL . 'error/access/5050');
			show_error('¡Acceso restringido!');
		}
	

	//----------------------------------------------------------------------------

	/**
	 * @access	public
	 * @param	
	 * @return	
	*/
		public static function accesoViewEstricto(array $level, $noAdmin = false)
		{
			if (!Sesion::get('autenticado')) {
				return false;
			}
			if ($noAdmin == false) {
				if (Sesion::get('level') == 'admin') {
					return true;
				}
			}
			if (count($level)) {
				if (in_array(Sesion::get('level'), $level)) {
					return true;
				}
			}

			return false;
		}

	//----------------------------------------------------------------------

	/**
	 * @access	public
	 * @param	
	 * @return	
	*/
		public static function tiempo()
		{
			if (!Sesion::get('tiempo') || !defined('SESSION_TIME')) {
				show_error('No se ha definido el tiempo de sesión');
				// throw new Exception("No se ha definido el tiempo de sesión");
				
			}
			if (SESSION_TIME == 0) {
				return;
			}

			if (time() - Sesion::get('tiempo') > (SESSION_TIME * 60)) {
				Sesion::destroy();
				// header('location:' . BASE_URL . 'error/access/8080');
				show_error('¡Acceso restringido!');

			}
			else{
				Sesion::set('tiempo', time());
			}
		}

}

?>