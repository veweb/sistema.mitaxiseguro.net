<?php
class mitaxi {
	/**
	 *
	 * Crea una instancia, ejecuta un query y retorna un arreglo de datos
	 * @param string $query Query a ejecutar
	 * @param bool $scalar Ejecuta un query con respuesta escalar, INSERT, UPDATE, DELETE
	 */
	public function executeQuery ($query, $scalar = false, $returnLastInsertId = false)
	{
		$dbLink = new MySqlConnect();
		if ($dbLink->getMensajeError()) {
			echo $dbLink->getMensajeError();
		} else {
			$rs = $dbLink->query($query);
			if ($dbLink->getMensajeError()) {
				$dbLink->close();
				echo $dbLink->getMensajeError();
			} else {
				if ($scalar){
					$sc = mysql_affected_rows($dbLink->getDbLInk());
					$lastId = $dbLink->getLastInsertId();
					$dbLink->close();

					if ($returnLastInsertId)
					return $lastId;
					else
					return $sc;

				} else {
					if (mysql_num_rows($rs) > 0) {
						while ($row = mysql_fetch_array($rs)) {
							if (count($row) > 0)
							$array[] = $row;
						}
						$dbLink->freeResult($rs);
						$dbLink->close();
						return $array;
					} else {
						$dbLink->close();
						return null;
					}
				}
			}
		}
	}

	/**
	 *
	 * Obtiene los datos de una tabla par utilizarlos en una paginacion tipo Doctrine
	 * @param Array $dataArray
	 * @param string $moduleName
	 * @param strign $orderBy
	 * @param string $orderType
	 * @param Array $where
	 *
	 */
	public function getListForPagination($dataArray, $moduleName, $orderBy = "", $orderType = "", $where = null, $between = null, $select = null, $in = null) {


		$q = Doctrine_Query::create()
		->from("$moduleName c");
		if ($select) {
			$q->select("*, $select");
		}

		// verificar el arreglo de datos si lo encuentra ponerlo en sesion
		if (is_array($dataArray) && count($dataArray) > 0)
		$this->getSession()->dataArray = $dataArray;
		elseif (!$dataArray)
		$this->getSession()->dataArray = null;


		// Realiza uno o varios where especificos en la tabla
		if (is_array($where)) {
			foreach ($where as $item => $val) {
				if ($val)
				$q->andWhere("c.$item = '$val'");
			}
		}

		// Realiza una comparacion de tipo between
		if (is_array($between) && count($between) > 0) {
			foreach ($between as $bcampo => $bval) {
				if ($bval[0] && $bval[1])
				$q->andWhere("c.$bcampo between '$bval[0]' and '$bval[1]'");
			}
		}


		if (is_array($in)) {
			// resetar el query
			$q = Doctrine_Query::create()
			->from("$moduleName c");
			$len = count($in);
			$cont = 1;
			$cad = "";
			foreach ($in as $item) {
				$cad .= $item["id"];
				if ($cont < $len)
				$cad .= ", ";
				$cont++;
			}


			$q->where("c.id in ($cad)");
		}


		// validar el arreglo para la primera vez que ingresa el usuario al sistema
		// y si desea ordenar datos que no falle el query
		if (isset($this->getSession()->dataArray)) {
			foreach ($this->getSession()->dataArray as $item => $val) {
				if ($val)
				$q->andWhere("c.$item like '%$val%'");
			}
		}

		if ($orderBy && $orderType)
		$q->orderBy("c.$orderBy $orderType");


		return $q;

	}

	/**
	 *
	 * Retorna el arreglo de variables en sesion
	 */
	public function getSession() {
		if (isset($_SESSION["_jre_session"]))
		return $_SESSION["_jre_session"];
		else
		$_SESSION["_jre_session"] = new stdClass();
		return $_SESSION["_jre_session"];
	}

	public function processForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid()) {
			$res = $form->save();
			return $res;
		} else
		return false;
	}

	/**
	 *
	 * Imprime un arreglo con los tags <pre></pre>
	 * @param array $array
	 */
	public static function printr($array) {
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}

	/**
	 *
	 * Sube un arreglo de archivos al servidor
	 * @param FILE $files
	 * @param boolean $thumbnail
	 * @param string $path
	 * @param array $onlyThisExtensions
	 * arreglo con todas las extenciones a validar
	 *
	 */
	public function uploadImages($files, $thumbnail = false, $path, $onlyThisExtensions = false)
	{
		try {
			if (is_array($files)) {
				if (isset($files["logo_path"])) {
					if (!$files["logo_path"]["error"]) {
						// realizar upload de logo
						$size = $files["logo_path"]["size"];
						$type = $files["logo_path"]["type"];
						$name = $files["logo_path"]["name"];
						$tmp = $files["logo_path"]['tmp_name'];
						$ext = substr($name, strlen($name) - 3, strlen($name));
						$prefix = substr(md5($name . time()),0,16);
						$xpath = $path . $prefix . "." . $ext;
						if ($onlyThisExtensions) {
							if (!array_search($ext, $onlyThisExtensions))
							return false;
						}


						// subir archivo
						if (copy($tmp, $xpath))
						$rsImages["logo_path"] = $prefix . "." . $ext;
						else
						$rsImages["logo_path"] = "error";
						// eliminar logo del arreglo
						unset($files["logo_path"]);
					}
				}
				foreach ($files as $picture) {
					if (!$picture["error"]) {
						// si no hay error en la subida realizar el upload de la imagen

						// obtener data
						$size = $picture["size"];
						$type = $picture["type"];
						$name = $picture["name"];
						$tmp =  $picture['tmp_name'];
						$ext = substr($name, strlen($name) - 3, strlen($name));
						$prefix = substr(md5($name . time()),0,16);
						$xpath = $path . $prefix . "." . $ext;
						
						// Validar extenciones
						if ($onlyThisExtensions) {
							if (!in_array($ext, $onlyThisExtensions))
							return false;
						}
						// subir imagen
						if (copy($tmp, $xpath))
						$rsImages[] = $prefix . "." . $ext;
						else
						$rsImages[] = "error";

						if ($thumbnail) {
							$thumb = new Thumbnail($xpath);
							$thumb->size_width(800);
							$thumb->save($xpath);
						}

					}
				}

				if (isset($rsImages))
				return $rsImages;
				else
				return false;

			}
		} catch (Exception $ex) {

			$error = array (
			"action" => "Cempro",
			"description" => $ex->getMessage(),
			"modules" => "Cempro::uploadImages",
			"tags" => "uploadImages",
			"created_by" => @$this->getSession()->id
			);
			Doctrine::getTable('ErrorLog')->saveErrorLog($error);
			return false;
		}
	}

	/**
	 *
	 * Elimina archivos de la url especificada
	 * @param Array $arrayImages
	 */
	public function deleteFilesFrom($arrayImages, $path) {
		try {
			if (is_array($arrayImages)) {
				foreach ($arrayImages as $item) {
					unlink($path.$item);
				}
			}
			return true;
		} catch (Exception $ex) {
			echo $ex->getMessage();
			return false;
		}
	}

	/**
	 *
	 * Copia archivos de un lugar hacia otra url especificada
	 * @param Array $arrayImages
	 * @param string $from
	 * @param string $to
	 */
	public function moveFilesTo($arrayImages, $from, $to) {
		try {
			if (is_array($arrayImages)) {
				foreach ($arrayImages as $item) {

					if (copy($from.$item, $to.$item))
					unlink($from.$item);
				}
			}
			return true;
		} catch (Exception $ex) {
			echo $ex->getMessage();
			return false;
		}
	}

	/**
	 *
	 * Retorna un archivo CSV con el query enviado, las columnas $cols deben hacer match con los campos de la tabla
	 *
	 * @param Doctrine_Query $q
	 * @param array $cols
	 */
	public function createCSVReport(Doctrine_Query $q, array $cols) {
		try {
			$res = $q->execute();
			$filename = substr(md5(date("d-m-Y h:i:s")), 0, 16) . ".csv";
			$handle = fopen(sfConfig::get('app_csv_reports').$filename, 'w+');
			$keys = array_keys($cols);
			foreach ($keys as $ncols) {
				fwrite($handle, $ncols . ", ");
			}
			fwrite($handle, "\r\n");
			fwrite($handle, "\r\n");
			foreach ($res as $items) {
				foreach ($cols as $ncols) {
					// realizar cambios para relaciones
					switch ($ncols) {
						case "id":
							fwrite($handle, $items->getUser()->getId() . ", ");
							break;
						case "name":
							fwrite($handle, $items->getUser()->getFirstName() . " " . $items->getUser()->getLastName() . ", ");
							break;
						case "age":
							fwrite($handle, $items->getUser()->getAge() . ", ");
							break;
						case "email":
							fwrite($handle, $items->getUser()->getEmail() . ", ");
							break;
						case "phone":
							fwrite($handle, $items->getUser()->getPhoneNumber() . ", ");
							break;
						case "votes":
							fwrite($handle, count($items->getUserVote())  . ", ");
							break;
						case "description":
							fwrite($handle, $items->getContent() . ", ");
							break;
						default:
							fwrite($handle, $items[$ncols] . ", ");
							break;
					}
				}
				fwrite($handle, "\r\n");
			}
			fclose($handle);
			return $filename;
		} catch (Exception $ex) {
			$data["action"] = "Cempro::createCSVReport";
			$data["description"] = $ex->getMessage();
			$data["tags"] = "Cempro, createCSVReport";
			Doctrine::getTable('ErrorLog')->saveErrorLog($data);
			return false;
		}
	}

	public function createCSVReportSimple(Doctrine_Query $q, array $cols) {
		try {
			$res = $q->execute();
			$filename = substr(md5(date("d-m-Y h:i:s")), 0, 16) . ".csv";
			$handle = fopen(sfConfig::get('app_csv_reports').$filename, 'w+');
			$keys = array_keys($cols);
			foreach ($keys as $ncols) {
				fwrite($handle, $ncols . ", ");
			}
			fwrite($handle, "\r\n");
			fwrite($handle, "\r\n");
			foreach ($res as $items) {
				foreach ($cols as $ncols) {
					// realizar cambios para relaciones
					switch ($ncols) {
						default:
							fwrite($handle, $items[$ncols] . ", ");
							break;
					}
				}
				fwrite($handle, "\r\n");
			}
			fclose($handle);
			return $filename;
		} catch (Exception $ex) {
			$data["action"] = "Cempro::createCSVReport";
			$data["description"] = $ex->getMessage();
			$data["tags"] = "Cempro, createCSVReport";
			Doctrine::getTable('ErrorLog')->saveErrorLog($data);
			return false;
		}
	}

	/**
	 *
	 * Enter description here ...
	 * @param Doctrine_Query $q
	 * @param array $cols
	 */
	public function createCSVReportVotes(Doctrine_Query $q, array $cols) {
		try {
			$res = $q->execute();
			$filename = substr(md5(date("d-m-Y h:i:s")), 0, 16) . ".csv";
			$handle = fopen(sfConfig::get('app_csv_reports').$filename, 'w+');
			$keys = array_keys($cols);
			foreach ($keys as $ncols) {
				fwrite($handle, $ncols . ", ");
			}
			fwrite($handle, "\r\n");
			fwrite($handle, "\r\n");
			foreach ($res as $items) {
				foreach ($cols as $ncols) {
					// realizar cambios para relaciones
					switch ($ncols) {
						case "name":
							fwrite($handle, $items->getUser()->getFirstName() . " " . $items->getUser()->getLastName() . ", ");
							break;
						case "phone_number":
							fwrite($handle, $items->getUser()->getPhoneNumber() .  ", ");
							break;
						case "user_id_vote":
							fwrite($handle, $items->getMedia()->getUserId() . ", ");
							break;
						case "name_vote":
							fwrite($handle, $items->getMedia()->getUser()->getFirstName() . " " . $items->getMedia()->getUser()->getLastName() . ", ");
							break;
						default:
							fwrite($handle, $items[$ncols] . ", ");
							break;
					}
				}
				fwrite($handle, "\r\n");
			}
			fclose($handle);
			return $filename;
		} catch (Exception $ex) {
			$data["action"] = "Cempro::createCSVReport";
			$data["description"] = $ex->getMessage();
			$data["tags"] = "Cempro, createCSVReport";
			Doctrine::getTable('ErrorLog')->saveErrorLog($data);
			return false;
		}
	}



	/**
	 * Renato Chea
	 * devuelve fecha formateada
	 * @param
	 * @param
	 */

	public function realdate($format, $timestamp = null, $dst = FALSE)
	{
		if($timestamp == null)$timestamp = time();
		$timeoffset = -21600 + (0 * 24 * 60 * 60);//ese 0 es dias, osea, le sumo 0 dias, este se edita cuando queremos movernos en el tiempo, osea sumar 1 dia por ejemplo;
		$dstoffset = 0;
	  
		$timestamp = $timestamp + $timeoffset + ((int)$dst * $dstoffset);
		return gmdate($format, $timestamp);
	}


	/**
	 * Renato Chea
	 * Funcion que trae las restricciones de un campo tipo ENUM en mysql ...
	 * @param nombre de la tabla $table
	 * @param nombre del campo/columna en la tabla $field
	 */

	function enum_select( $table , $field ){/////retorna los constraints de enum de dicha tabla y campo.
			

		$enum = "";
		$query = " SHOW COLUMNS FROM `$table` LIKE '$field' ";
		$selectQuery = $this->executeQuery($query);


		if (count($selectQuery[0]) > 0){
			$enum = $selectQuery[0][1];

		}

		$enumArr = array();
		$enum = substr($enum, 5);
		$enum = substr($enum, 0, strlen($enum)-1);
		$enumArr = explode("','", $enum);

		$enumArr[0] = substr($enumArr[0], 1);
		$last = count($enumArr)-1;
		$enumArr[$last] = substr($enumArr[$last], 0,strlen($enumArr[$last])-1);

		return $enumArr;

	}

	/**
	 *
	 * Enter description here ...
	 * @param unknown_type $data
	 */
	public function saveData($data, $modelName) {
		try {
			//$userData = sfContext::getInstance()->getUser()->getAttribute('userData');
			if (is_array($data)) {
				if ($data["id"]) {
					// realizar update
					$q = Doctrine_Query::create()
					->update($modelName);
					foreach ($data as $item => $value) {
						$q->set("$item", "?", "$value");
					}
					//$q->set("updated_by", "?", $userData->getId());
					$q->where('id = ?', $data["id"]);
					$res = $q->execute();
					if ($res) {
						Doctrine::getTable('EventLog')->saveEventLog(array(
							'action' => "$modelName::saveData", 
							'description' => sfConfig::get('app_action_update'), 
							'affected_id' => $data["id"]
						));
					}
					return $data["id"];
				} else {
					// realizar insert
					$obj = new $modelName();
					foreach ($data as $item => $value) {
						$obj->$item = $value;
					}
					//$obj->created_by = $userData->getId();
					$obj->save();
					if ($obj->getId()) {
						Doctrine::getTable('EventLog')->saveEventLog(array(
							'action' => "$modelName::saveData", 
							'description' => sfConfig::get('app_action_new'), 
							'affected_id' => $obj->getId()
						));
					}
					return $obj->getId();
				}
			} else return false;
		} catch (Exception $ex) {
			$xdata["action"] = "save";
			$xdata["description"] = $ex->getMessage();
			$xdata["tags"] = "$modelName::saveData";
			Doctrine::getTable('ErrorLog')->saveErrorLog($xdata);
			return false;
		}
	}


}
