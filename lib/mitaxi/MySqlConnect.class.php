<?php

/***
 * CLASE CONSTRUCTORA DE LA CONEXION A LA BASE DE DATOS
 */
class MySqlConnect
{
	private $link;
	private $mensajeError;

	const STATUS_MENSAJE_OK									= 'Ok';
	const STATUS_MENSAJE_LA_CONSULTA_NO_PUDO_SER_PROCESADA 	= 'La Consulta no pudo ser Procesada';
	const STATUS_MENSAJE_INTERVALO_NO_PERMITIDO				= 'Intervalo no permitido';
	const STATUS_MENSAJE_FECHA_INVALIDA						= 'Fecha Invalida';
	const STATUS_MENSAJE_FORMATO_INVALIDO					= 'Formato Invalido';
	const STATUS_MENSAJE_FILTRO_INVALIDO					= 'Filtro Invalido';
	const STATUS_MENSAJE_UNIDAD_DE_TIEMPO_INVALIDO			= 'Unidad Invalido';
	const STATUS_MENSAJE_RANGO_DE_FECHA_INVALIDO			= 'Rango de Fecha Invalido';
	const STATUS_MENSAJE_SESSION_INVALIDA					= 'Session Invalida';
	const STATUS_MENSAJE_DATOS_INVALIDOS					= 'Datos Invalidos';
	const STATUS_MENSAJE_NO_TIENE_PERMISO					= 'No tiene permiso';
	const STATUS_MENSAJE_MYSQL_SERVER_NO_ENCONTRADO			= 'No se pudo conectar con el Servidor de MySQL';
	const STATUS_MENSAJE_MYSQL_DATABASE_NO_ENCONTRADA		= 'No se encontro la Base de Datos';
	const STATUS_MENSAJE_NO_DEFINIDO						= 'Otro No Definido';
	const STATUS_MENSAJE_MYSQL_CONEXION_INVALIDA			= "No se puede establecer una conexion ";



	public function getMensajeError()
	{
		return $this->mensajeError;
	}

	public function getDbLInk() {
		return $this->link;
	}

	public function getArray($sql)
	{
			
	$arreglo[] = null;
	$result = $this->query($sql);
	while ($registro = mysql_fetch_array($result)) {
		$arreglo[] = $registro;
	}
	$this->freeResult($result);

	return $arreglo;
	}

	public function query($sql)
	{
		$result = mysql_query($sql, $this->link);
		if (!$result) {
			file_put_contents('error.sql', $sql);
			$this->mensajeError = MySqlConnect::STATUS_MENSAJE_LA_CONSULTA_NO_PUDO_SER_PROCESADA;
		}
		return $result;
	}

	public function escape($valor)
	{
		return mysql_real_escape_string($valor, $this->link);
	}

	public function freeResult($result)
	{
		mysql_free_result($result);
	}

	public function close()
	{
		mysql_close($this->link);
		$this->link = null;
	}

	public function __construct()
	{
		// Para mejorar rendimiento, el query anterior se traslada a:
		$databaseConf = sfYaml::load(sfConfig::get('sf_config_dir') . '/databases.yml');
		//para dev
		//$params   = $databaseConf ['dev']['doctrine']['param'];
		//para prod
		$params   = $databaseConf ['prod']['doctrine']['param'];
		
		$dsn      = $params['dsn'];
		$username = $params['username'];
		$password = $params['password'];
		$database = substr($dsn, strpos($dsn, 'dbname=')+7);
		$host = substr($dsn, strpos($dsn, 'host=')+5, strpos($dsn, ';dbname')-11);


		$this->link = mysql_connect($host, $username, $password);
		if (!$this->link) {
			$this->mensajeError = MySqlConnect::STATUS_MENSAJE_MYSQL_SERVER_NO_ENCONTRADO;
		} else {
			$db = mysql_select_db($database, $this->link);
			if (!$db) {
				$this->mensajeError = MySqlConnect::STATUS_MENSAJE_MYSQL_DATABASE_NO_ENCONTRADA;
			}
		}
	}
}

?>