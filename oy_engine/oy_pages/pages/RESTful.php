<?php
//var_dump($_SERVER['REQUEST_METHOD'],$_SERVER['PATH_INFO']); die();
ini_set('session.cookie_domain', 'naserlap2');
session_set_cookie_params(0, '/', 'naserlap2');
session_start();

interface DatabaseInterface {
	public function getSql($name);
	public function connect($hostname,$username,$password,$database,$port,$socket,$charset);
	public function query($sql,$params=array());
	public function fetchAssoc($result,$fields=false);
	public function fetchRow($result,$fields=false);
	public function insertId($result);
	public function affectedRows($result);
	public function close($result);
	public function fetchFields($table);
	public function addLimitToSql($sql,$limit,$offset);
	public function likeEscape($string);
	public function isNumericType($field);
	public function isBinaryType($field);
	public function isGeometryType($field);
	public function getDefaultCharset();
	public function beginTransaction();
	public function commitTransaction();
	public function rollbackTransaction();
}

class MySQL implements DatabaseInterface {

	protected $db;
	protected $queries;

	public function __construct() {
		$this->queries = array(
			'list_tables'=>'SELECT
					"TABLE_NAME","TABLE_COMMENT"
				FROM
					"INFORMATION_SCHEMA"."TABLES"
				WHERE
					"TABLE_SCHEMA" = ?',
			'reflect_table'=>'SELECT
					"TABLE_NAME"
				FROM
					"INFORMATION_SCHEMA"."TABLES"
				WHERE
					"TABLE_NAME" COLLATE \'utf8_bin\' = ? AND
					"TABLE_SCHEMA" = ?',
			'reflect_pk'=>'SELECT
					"COLUMN_NAME"
				FROM
					"INFORMATION_SCHEMA"."COLUMNS"
				WHERE
					"COLUMN_KEY" = \'PRI\' AND
					"TABLE_NAME" = ? AND
					"TABLE_SCHEMA" = ?',
			'reflect_belongs_to'=>'SELECT
					"TABLE_NAME","COLUMN_NAME",
					"REFERENCED_TABLE_NAME","REFERENCED_COLUMN_NAME"
				FROM
					"INFORMATION_SCHEMA"."KEY_COLUMN_USAGE"
				WHERE
					"TABLE_NAME" COLLATE \'utf8_bin\' = ? AND
					"REFERENCED_TABLE_NAME" COLLATE \'utf8_bin\' IN ? AND
					"TABLE_SCHEMA" = ? AND
					"REFERENCED_TABLE_SCHEMA" = ?',
			'reflect_has_many'=>'SELECT
					"TABLE_NAME","COLUMN_NAME",
					"REFERENCED_TABLE_NAME","REFERENCED_COLUMN_NAME"
				FROM
					"INFORMATION_SCHEMA"."KEY_COLUMN_USAGE"
				WHERE
					"TABLE_NAME" COLLATE \'utf8_bin\' IN ? AND
					"REFERENCED_TABLE_NAME" COLLATE \'utf8_bin\' = ? AND
					"TABLE_SCHEMA" = ? AND
					"REFERENCED_TABLE_SCHEMA" = ?',
			'reflect_habtm'=>'SELECT
					k1."TABLE_NAME", k1."COLUMN_NAME",
					k1."REFERENCED_TABLE_NAME", k1."REFERENCED_COLUMN_NAME",
					k2."TABLE_NAME", k2."COLUMN_NAME",
					k2."REFERENCED_TABLE_NAME", k2."REFERENCED_COLUMN_NAME"
				FROM
					"INFORMATION_SCHEMA"."KEY_COLUMN_USAGE" k1,
					"INFORMATION_SCHEMA"."KEY_COLUMN_USAGE" k2
				WHERE
					k1."TABLE_SCHEMA" = ? AND
					k2."TABLE_SCHEMA" = ? AND
					k1."REFERENCED_TABLE_SCHEMA" = ? AND
					k2."REFERENCED_TABLE_SCHEMA" = ? AND
					k1."TABLE_NAME" COLLATE \'utf8_bin\' = k2."TABLE_NAME" COLLATE \'utf8_bin\' AND
					k1."REFERENCED_TABLE_NAME" COLLATE \'utf8_bin\' = ? AND
					k2."REFERENCED_TABLE_NAME" COLLATE \'utf8_bin\' IN ?'
		);
	}

	public function getSql($name) {
		return isset($this->queries[$name])?$this->queries[$name]:false;
	}

	public function connect($hostname,$username,$password,$database,$port,$socket,$charset) {
		$db = mysqli_init();
		if (defined('MYSQLI_OPT_INT_AND_FLOAT_NATIVE')) {
			mysqli_options($db,MYSQLI_OPT_INT_AND_FLOAT_NATIVE,true);
		}
		$success = mysqli_real_connect($db,$hostname,$username,$password,$database,$port,$socket,MYSQLI_CLIENT_FOUND_ROWS);
		if (!$success) {
			throw new \Exception('Connect failed. '.mysqli_connect_error());
		}
		if (!mysqli_set_charset($db,$charset)) {
			throw new \Exception('Error setting charset. '.mysqli_error($db));
		}
		if (!mysqli_query($db,'SET SESSION sql_mode = \'ANSI_QUOTES\';')) {
			throw new \Exception('Error setting ANSI quotes. '.mysqli_error($db));
		}
		$this->db = $db;
	}

	public function query($sql,$params=array()) {
		$db = $this->db;
		$sql = preg_replace_callback('/\!|\?/', function ($matches) use (&$db,&$params) {
			$param = array_shift($params);
			if ($matches[0]=='!') {
				$key = preg_replace('/[^a-zA-Z0-9\-_=<> ]/','',is_object($param)?$param->key:$param);
				if (is_object($param) && $param->type=='base64') {
					return "TO_BASE64(\"$key\") as \"$key\"";
				}
				if (is_object($param) && $param->type=='wkt') {
					return "ST_AsText(\"$key\") as \"$key\"";
				}
				return '"'.$key.'"';
			} else {
				if (is_array($param)) return '('.implode(',',array_map(function($v) use (&$db) {
					return "'".mysqli_real_escape_string($db,$v)."'";
				},$param)).')';
				if (is_object($param) && $param->type=='base64') {
					return "x'".bin2hex(base64_decode($param->value))."'";
				}
				if (is_object($param) && $param->type=='wkt') {
					return "ST_GeomFromText('".mysqli_real_escape_string($db,$param->value)."')";
				}
				if ($param===null) return 'NULL';
				return "'".mysqli_real_escape_string($db,$param)."'";
			}
		}, $sql);
		//if (!strpos($sql,'INFORMATION_SCHEMA')) echo "\n$sql\n";
		//if (!strpos($sql,'INFORMATION_SCHEMA')) file_put_contents('log.txt',"\n$sql\n",FILE_APPEND);
		return mysqli_query($db,$sql);
	}

	protected function convertFloatAndInt($result,&$values,&$fields) {
		array_walk($values, function(&$v,$i) use ($result,$fields){
			if (is_string($v) && $this->isNumericType($fields[$i])) {
				$v+=0;
			}
		});
	}

	public function fetchAssoc($result,$fields=false) {
		$values = mysqli_fetch_assoc($result);
		if ($values && $fields && !defined('MYSQLI_OPT_INT_AND_FLOAT_NATIVE')) {
			$this->convertFloatAndInt($result,$values,$fields);
		}
		return $values;
	}

	public function fetchRow($result,$fields=false) {
		$values = mysqli_fetch_row($result);
		if ($values && $fields && !defined('MYSQLI_OPT_INT_AND_FLOAT_NATIVE')) {
			$fields = array_values($fields);
			$this->convertFloatAndInt($result,$values,$fields);
		}
		return $values;
	}

	public function insertId($result) {
		return mysqli_insert_id($this->db);
	}

	public function affectedRows($result) {
		return mysqli_affected_rows($this->db);
	}

	public function close($result) {
		return mysqli_free_result($result);
	}

	public function fetchFields($table) {
		$result = $this->query('SELECT * FROM ! WHERE 1=2;',array($table));
		return mysqli_fetch_fields($result);
	}

	public function addLimitToSql($sql,$limit,$offset) {
		return "$sql LIMIT $limit OFFSET $offset";
	}

	public function likeEscape($string) {
		return addcslashes($string,'%_');
	}

	public function convertFilter($field, $comparator, $value) {
		return false;
	}

	public function isNumericType($field) {
		return in_array($field->type,array(1,2,3,4,5,6,8,9));
	}

	public function isBinaryType($field) {
		//echo "$field->name: $field->type ($field->flags)\n";
		return (($field->flags & 128) && ($field->type>=249) && ($field->type<=252));
	}

	public function isGeometryType($field) {
		return ($field->type==255);
	}

	public function getDefaultCharset() {
		return 'utf8';
	}

	public function beginTransaction() {
		mysqli_query($this->db,'BEGIN');
		//return mysqli_begin_transaction($this->db);
	}

	public function commitTransaction() {
		mysqli_query($this->db,'COMMIT');
		//return mysqli_commit($this->db);
	}

	public function rollbackTransaction() {
		mysqli_query($this->db,'ROLLBACK');
		//return mysqli_rollback($this->db);
	}

}


class PHP_CRUD_API {

	protected $db;
	protected $settings;

	protected function mapMethodToAction($method,$key) {
		switch ($method) {
			case 'OPTIONS': return 'headers';
			case 'GET': return ($key===false)?'list':'read';
			case 'PUT': return 'update';
			case 'POST': return 'create';
			case 'DELETE': return 'delete';
			case 'PATCH': return 'increment';
			default: $this->exitWith404('method');
		}
		return false;
	}

	protected function parseRequestParameter(&$request,$characters) {
		if ($request==='') return false;
		$pos = strpos($request,'/');
		$value = $pos?substr($request,0,$pos):$request;
		$request = $pos?substr($request,$pos+1):'';
		if (!$characters) return $value;
		return preg_replace("/[^$characters]/",'',$value);
	}

	protected function parseGetParameter($get,$name,$characters) {
		$value = isset($get[$name])?$get[$name]:false;
		return $characters?preg_replace("/[^$characters]/",'',$value):$value;
	}

	protected function parseGetParameterArray($get,$name,$characters) {
		$values = isset($get[$name])?$get[$name]:false;
		if (!is_array($values)) $values = array($values);
		if ($characters) {
			foreach ($values as &$value) {
				$value = preg_replace("/[^$characters]/",'',$value);
			}
		}
		return $values;
	}

	protected function applyTableAuthorizer($callback,$action,$database,&$tables) {
		if (is_callable($callback,true)) foreach ($tables as $i=>$table) {
			if (!$callback($action,$database,$table)) {
				unset($tables[$i]);
			}
		}
	}

	protected function applyRecordFilter($callback,$action,$database,$tables,&$filters) {
		if (is_callable($callback,true)) foreach ($tables as $i=>$table) {
			$this->addFilters($filters,$table,array($table=>'and'),$callback($action,$database,$table));
		}
	}

	protected function applyTenancyFunction($callback,$action,$database,$fields,&$filters) {
		if (is_callable($callback,true)) foreach ($fields as $table=>$keys) {
			foreach ($keys as $field) {
				$v = $callback($action,$database,$table,$field->name);
				if ($v!==null) {
					if (is_array($v)) $this->addFilter($filters,$table,'and',$field->name,'in',implode(',',$v));
					else $this->addFilter($filters,$table,'and',$field->name,'eq',$v);
				}
			}
		}
	}

	protected function applyColumnAuthorizer($callback,$action,$database,&$fields) {
		if (is_callable($callback,true)) foreach ($fields as $table=>$keys) {
			foreach ($keys as $field) {
				if (!$callback($action,$database,$table,$field->name)) {
					unset($fields[$table][$field->name]);
				}
			}
		}
	}

	protected function applyInputTenancy($callback,$action,$database,$table,&$input,$keys) {
		if (is_callable($callback,true)) foreach ($keys as $key=>$field) {
			$v = $callback($action,$database,$table,$key);
			if ($v!==null && (isset($input->$key) || $action=='create')) {
				if (is_array($v)) {
					if (!count($v)) {
						$input->$key = null;
					} elseif (!isset($input->$key)) {
						$input->$key = $v[0];
					} elseif (!in_array($input->$key,$v)) {
						$input->$key = null;
					}
				} else {
					$input->$key = $v;
				}
			}
		}
	}

	protected function applyInputSanitizer($callback,$action,$database,$table,&$input,$keys) {
		if (is_callable($callback,true)) foreach ((array)$input as $key=>$value) {
			if (isset($keys[$key])) {
				$input->$key = $callback($action,$database,$table,$key,$keys[$key]->type,$value);
			}
		}
	}

	protected function applyInputValidator($callback,$action,$database,$table,$input,$keys,$context) {
		$errors = array();
		if (is_callable($callback,true)) foreach ((array)$input as $key=>$value) {
			if (isset($keys[$key])) {
				$error = $callback($action,$database,$table,$key,$keys[$key]->type,$value,$context);
				if ($error!==true && $error!==null) $errors[$key] = $error;
			}
		}
		if (!empty($errors)) $this->exitWith422($errors);
	}

	protected function processTableAndIncludeParameters($database,$table,$include,$action) {
		$blacklist = array('information_schema','mysql','sys','pg_catalog');
		if (in_array(strtolower($database), $blacklist)) return array();
		$table_list = array();
		if ($result = $this->db->query($this->db->getSql('reflect_table'),array($table,$database))) {
			while ($row = $this->db->fetchRow($result)) $table_list[] = $row[0];
			$this->db->close($result);
		}
		if (empty($table_list)) $this->exitWith404('entity');
		if ($action=='list') {
			foreach (explode(',',$include) as $table) {
				if ($result = $this->db->query($this->db->getSql('reflect_table'),array($table,$database))) {
					while ($row = $this->db->fetchRow($result)) $table_list[] = $row[0];
					$this->db->close($result);
				}
			}
		}
		return $table_list;
	}

	protected function exitWith404($type) {
		if (isset($_SERVER['REQUEST_METHOD'])) {
			header('Content-Type:',true,404);
			die("Not found ($type)");
		} else {
			throw new \Exception("Not found ($type)");
		}
	}

	protected function exitWith422($object) {
		if (isset($_SERVER['REQUEST_METHOD'])) {
			header('Content-Type:',true,422);
			die(json_encode($object));
		} else {
			throw new \Exception(json_encode($object));
		}
	}

	protected function headersCommand($parameters) {
		$headers = array();
		$headers[]='Access-Control-Allow-Headers: Content-Type';
		$headers[]='Access-Control-Allow-Methods: OPTIONS, GET, PUT, POST, DELETE';
		$headers[]='Access-Control-Allow-Credentials: true';
		$headers[]='Access-Control-Max-Age: 1728000';
		if (isset($_SERVER['REQUEST_METHOD'])) {
			foreach ($headers as $header) header($header);
		} else {
			echo json_encode($headers);
		}
	}

	protected function startOutput() {
		if (isset($_SERVER['REQUEST_METHOD'])) {
			header('Content-Type: application/json; charset=utf-8');
		}
	}

	protected function findPrimaryKeys($table,$database) {
		$fields = array();
		if ($result = $this->db->query($this->db->getSql('reflect_pk'),array($table,$database))) {
			while ($row = $this->db->fetchRow($result)) {
				$fields[] = $row[0];
			}
			$this->db->close($result);
		}
		return $fields;
	}

	protected function processKeyParameter($key,$tables,$database) {
		if ($key===false) return false;
		$fields = $this->findPrimaryKeys($tables[0],$database);
		if (count($fields)!=1) $this->exitWith404('1pk');
		return array($key,$fields[0]);
	}

	protected function processOrderingsParameter($orderings) {
		if (!$orderings) return false;
		foreach ($orderings as &$order) {
			$order = explode(',',$order,2);
			if (count($order)<2) $order[1]='ASC';
			if (!strlen($order[0])) return false;
			$direction = strtoupper($order[1]);
			if (in_array($direction,array('ASC','DESC'))) {
				$order[1] = $direction;
			}
		}
		return $orderings;
	}

	protected function convertFilter($field, $comparator, $value) {
		$result = $this->db->convertFilter($field,$comparator,$value);
		if ($result) return $result;
		// default behavior 					
		$comparator = strtolower($comparator);
		if ($comparator[0]!='n') {
			if (strlen($comparator)==2) {
				switch ($comparator) {
					case 'cs': return array('! LIKE ?',$field,'%'.$this->db->likeEscape($value).'%');
					case 'sw': return array('! LIKE ?',$field,$this->db->likeEscape($value).'%');
					case 'ew': return array('! LIKE ?',$field,'%'.$this->db->likeEscape($value));
					case 'eq': return array('! = ?',$field,$value);
					case 'lt': return array('! < ?',$field,$value);
					case 'le': return array('! <= ?',$field,$value);
					case 'ge': return array('! >= ?',$field,$value);
					case 'gt': return array('! > ?',$field,$value);
					case 'bt': $v = explode(',',$value); if (count($v)<2) return false;
						   return array('! BETWEEN ? AND ?',$field,$v[0],$v[1]);
					case 'in': return array('! IN ?',$field,explode(',',$value));
					case 'is': return array('! IS NULL',$field);
				}
			} else {
				switch ($comparator) {
					case 'sco': return array('ST_Contains(!,ST_GeomFromText(?))=TRUE',$field,$value);
					case 'scr': return array('ST_Crosses(!,ST_GeomFromText(?))=TRUE',$field,$value);
					case 'sdi': return array('ST_Disjoint(!,ST_GeomFromText(?))=TRUE',$field,$value);
					case 'seq': return array('ST_Equals(!,ST_GeomFromText(?))=TRUE',$field,$value);
					case 'sin': return array('ST_Intersects(!,ST_GeomFromText(?))=TRUE',$field,$value);
					case 'sov': return array('ST_Overlaps(!,ST_GeomFromText(?))=TRUE',$field,$value);
					case 'sto': return array('ST_Touches(!,ST_GeomFromText(?))=TRUE',$field,$value);
					case 'swi': return array('ST_Within(!,ST_GeomFromText(?))=TRUE',$field,$value);
					case 'sic': return array('ST_IsClosed(!)=TRUE',$field);
					case 'sis': return array('ST_IsSimple(!)=TRUE',$field);
					case 'siv': return array('ST_IsValid(!)=TRUE',$field);
				}
			}
		} else {
			if (strlen($comparator)==2) {
				switch ($comparator) {
					case 'ne': return $this->convertFilter($field, 'neq', $value); // deprecated
					case 'ni': return $this->convertFilter($field, 'nin', $value); // deprecated
					case 'no': return $this->convertFilter($field, 'nis', $value); // deprecated
				}
			} elseif (strlen($comparator)==3) {
				switch ($comparator) {
					case 'ncs': return array('! NOT LIKE ?',$field,'%'.$this->db->likeEscape($value).'%');
					case 'nsw': return array('! NOT LIKE ?',$field,$this->db->likeEscape($value).'%');
					case 'new': return array('! NOT LIKE ?',$field,'%'.$this->db->likeEscape($value));
					case 'neq': return array('! <> ?',$field,$value);
					case 'nlt': return array('! >= ?',$field,$value);
					case 'nle': return array('! > ?',$field,$value);
					case 'nge': return array('! < ?',$field,$value);
					case 'ngt': return array('! <= ?',$field,$value);
					case 'nbt': $v = explode(',',$value); if (count($v)<2) return false;
						    return array('! NOT BETWEEN ? AND ?',$field,$v[0],$v[1]);
					case 'nin': return array('! NOT IN ?',$field,explode(',',$value));
					case 'nis': return array('! IS NOT NULL',$field);
				}
			} else {
				switch ($comparator) {
					case 'nsco': return array('ST_Contains(!,ST_GeomFromText(?))=FALSE',$field,$value);
					case 'nscr': return array('ST_Crosses(!,ST_GeomFromText(?))=FALSE',$field,$value);
					case 'nsdi': return array('ST_Disjoint(!,ST_GeomFromText(?))=FALSE',$field,$value);
					case 'nseq': return array('ST_Equals(!,ST_GeomFromText(?))=FALSE',$field,$value);
					case 'nsin': return array('ST_Intersects(!,ST_GeomFromText(?))=FALSE',$field,$value);
					case 'nsov': return array('ST_Overlaps(!,ST_GeomFromText(?))=FALSE',$field,$value);
					case 'nsto': return array('ST_Touches(!,ST_GeomFromText(?))=FALSE',$field,$value);
					case 'nswi': return array('ST_Within(!,ST_GeomFromText(?))=FALSE',$field,$value);
					case 'nsic': return array('ST_IsClosed(!)=FALSE',$field);
					case 'nsis': return array('ST_IsSimple(!)=FALSE',$field);
					case 'nsiv': return array('ST_IsValid(!)=FALSE',$field);
				}
			}
		}
		return false;
	}

	public function addFilter(&$filters,$table,$and,$field,$comparator,$value) {
		if (!isset($filters[$table])) $filters[$table] = array();
		if (!isset($filters[$table][$and])) $filters[$table][$and] = array();
		$filter = $this->convertFilter($field,$comparator,$value);
		if ($filter) $filters[$table][$and][] = $filter;
	}

	public function addFilters(&$filters,$table,$satisfy,$filterStrings) {
		if ($filterStrings) {
			for ($i=0;$i<count($filterStrings);$i++) {
				$parts = explode(',',$filterStrings[$i],3);
				if (count($parts)>=2) {
					if (strpos($parts[0],'.')) list($t,$f) = explode('.',$parts[0],2);
					else list($t,$f) = array($table,$parts[0]);
					$comparator = $parts[1];
					$value = isset($parts[2])?$parts[2]:null;
					$and = isset($satisfy[$t])?$satisfy[$t]:'and';
					$this->addFilter($filters,$t,$and,$f,$comparator,$value);
				}
			}
		}
	}

	protected function processSatisfyParameter($tables,$satisfyString) {
		$satisfy = array();
		foreach (explode(',',$satisfyString) as $str) {
			if (strpos($str,'.')) list($t,$s) = explode('.',$str,2);
			else list($t,$s) = array($tables[0],$str);
			$and = ($s && strtolower($s)=='any')?'or':'and';
			$satisfy[$t] = $and;
		}
		return $satisfy;
	}

	protected function processFiltersParameter($tables,$satisfy,$filterStrings) {
		$filters = array();
		$this->addFilters($filters,$tables[0],$satisfy,$filterStrings);
		return $filters;
	}

	protected function processPageParameter($page) {
		if (!$page) return false;
		$page = explode(',',$page,2);
		if (count($page)<2) $page[1]=20;
		$page[0] = ($page[0]-1)*$page[1];
		return $page;
	}

	protected function retrieveObject($key,$fields,$filters,$tables) {
		if (!$key) return false;
		$table = $tables[0];
		$params = array();
		$sql = 'SELECT ';
		$this->convertOutputs($sql,$params,$fields[$table]);
		$sql .= ' FROM !';
		$params[] =  $table;
		$this->addFilter($filters,$table,'and',$key[1],'eq',$key[0]);
		$this->addWhereFromFilters($filters[$table],$sql,$params);
		$object = null;
		if ($result = $this->db->query($sql,$params)) {
			$object = $this->db->fetchAssoc($result,$fields[$table]);
			$this->db->close($result);
		}
		return $object;
	}

	protected function retrieveObjects($key,$fields,$filters,$tables) {
		$keyField = $key[1];
		$keys = explode(',',$key[0]);
		$rows = array();
		foreach ($keys as $key) {
			$result = $this->retrieveObject(array($key,$keyField),$fields,$filters,$tables);
			if ($result===null) {
				return null;
			}
			$rows[] = $result;
		}
		return $rows;
	}

	protected function createObject($input,$tables) {
		if (!$input) return false;
		$input = (array)$input;
		$keys = implode(',',str_split(str_repeat('!', count($input))));
		$values = implode(',',str_split(str_repeat('?', count($input))));
		$params = array_merge(array_keys($input),array_values($input));
		array_unshift($params, $tables[0]);
		$result = $this->db->query('INSERT INTO ! ('.$keys.') VALUES ('.$values.')',$params);
		if (!$result) return null;
		return $this->db->insertId($result);
	}

	protected function createObjects($inputs,$tables) {
		if (!$inputs) return false;
		$ids = array();
		$this->db->beginTransaction();
		foreach ($inputs as $input) {
			$result = $this->createObject($input,$tables);
			if ($result===null) {
				$this->db->rollbackTransaction();
				return null;
			}
			$ids[] = $result;
		}
		$this->db->commitTransaction();
		return $ids;
	}

	protected function updateObject($key,$input,$filters,$tables) {
		if (!$input) return false;
		$input = (array)$input;
		$table = $tables[0];
		$sql = 'UPDATE ! SET ';
		$params = array($table);
		foreach (array_keys($input) as $j=>$k) {
			if ($j) $sql .= ',';
			$v = $input[$k];
			$sql .= '!=?';
			$params[] = $k;
			$params[] = $v;
		}
		$this->addFilter($filters,$table,'and',$key[1],'eq',$key[0]);
		$this->addWhereFromFilters($filters[$table],$sql,$params);
		$result = $this->db->query($sql,$params);
		if (!$result) return null;
		return $this->db->affectedRows($result);
	}

	protected function updateObjects($key,$inputs,$filters,$tables) {
		if (!$inputs) return false;
		$keyField = $key[1];
		$keys = explode(',',$key[0]);
		if (count($inputs)!=count($keys)) {
			$this->exitWith404('subject');
		}
		$rows = array();
		$this->db->beginTransaction();
		foreach ($inputs as $i=>$input) {
			$result = $this->updateObject(array($keys[$i],$keyField),$input,$filters,$tables);
			if ($result===null) {
				$this->db->rollbackTransaction();
				return null;
			}
			$rows[] = $result;
		}
		$this->db->commitTransaction();
		return $rows;
	}

	protected function deleteObject($key,$filters,$tables) {
		$table = $tables[0];
		$sql = 'DELETE FROM !';
		$params = array($table);
		$this->addFilter($filters,$table,'and',$key[1],'eq',$key[0]);
		$this->addWhereFromFilters($filters[$table],$sql,$params);
		$result = $this->db->query($sql,$params);
		if (!$result) return null;
		return $this->db->affectedRows($result);
	}

	protected function deleteObjects($key,$filters,$tables) {
		$keyField = $key[1];
		$keys = explode(',',$key[0]);
		$rows = array();
		$this->db->beginTransaction();
		foreach ($keys as $key) {
			$result = $this->deleteObject(array($key,$keyField),$filters,$tables);
			if ($result===null) {
				$this->db->rollbackTransaction();
				return null;
			}
			$rows[] = $result;
		}
		$this->db->commitTransaction();
		return $rows;
	}

	protected function incrementObject($key,$input,$filters,$tables,$fields) {
		if (!$input) return false;
		$input = (array)$input;
		$table = $tables[0];
		$sql = 'UPDATE ! SET ';
		$params = array($table);
		foreach (array_keys($input) as $j=>$k) {
			if ($j) $sql .= ',';
			$v = $input[$k];
			if ($this->db->isNumericType($fields[$table][$k])) {
				$sql .= '!=!+?';
				$params[] = $k;
				$params[] = $k;
				$params[] = $v;
			} else {
				$sql .= '!=!';
				$params[] = $k;
				$params[] = $k;
			}
		}
		$this->addFilter($filters,$table,'and',$key[1],'eq',$key[0]);
		$this->addWhereFromFilters($filters[$table],$sql,$params);
		$result = $this->db->query($sql,$params);
		if (!$result) return null;
		return $this->db->affectedRows($result);
	}

	protected function incrementObjects($key,$inputs,$filters,$tables,$fields) {
		if (!$inputs) return false;
		$keyField = $key[1];
		$keys = explode(',',$key[0]);
		if (count($inputs)!=count($keys)) {
			$this->exitWith404('subject');
		}
		$rows = array();
		$this->db->beginTransaction();
		foreach ($inputs as $i=>$input) {
			$result = $this->incrementObject(array($keys[$i],$keyField),$input,$filters,$tables,$fields);
			if ($result===null) {
				$this->db->rollbackTransaction();
				return null;
			}
			$rows[] = $result;
		}
		$this->db->commitTransaction();
		return $rows;
	}

	protected function findRelations($tables,$database,$auto_include) {
		$tableset = array();
		$collect = array();
		$select = array();

		while (count($tables)>1) {
			$table0 = array_shift($tables);
			$tableset[] = $table0;

			$result = $this->db->query($this->db->getSql('reflect_belongs_to'),array($table0,$tables,$database,$database));
			while ($row = $this->db->fetchRow($result)) {
				if (!$auto_include && !in_array($row[0],array_merge($tables,$tableset))) continue;
				$collect[$row[0]][$row[1]]=array();
				$select[$row[2]][$row[3]]=array($row[0],$row[1]);
				if (!in_array($row[0],$tableset)) $tableset[] = $row[0];
			}
			$result = $this->db->query($this->db->getSql('reflect_has_many'),array($tables,$table0,$database,$database));
			while ($row = $this->db->fetchRow($result)) {
				if (!$auto_include && !in_array($row[2],array_merge($tables,$tableset))) continue;
				$collect[$row[2]][$row[3]]=array();
				$select[$row[0]][$row[1]]=array($row[2],$row[3]);
				if (!in_array($row[2],$tableset)) $tableset[] = $row[2];
			}
			$result = $this->db->query($this->db->getSql('reflect_habtm'),array($database,$database,$database,$database,$table0,$tables));
			while ($row = $this->db->fetchRow($result)) {
				if (!$auto_include && !in_array($row[2],array_merge($tables,$tableset))) continue;
				if (!$auto_include && !in_array($row[4],array_merge($tables,$tableset))) continue;
				$collect[$row[2]][$row[3]]=array();
				$select[$row[0]][$row[1]]=array($row[2],$row[3]);
				$collect[$row[4]][$row[5]]=array();
				$select[$row[6]][$row[7]]=array($row[4],$row[5]);
				if (!in_array($row[2],$tableset)) $tableset[] = $row[2];
				if (!in_array($row[4],$tableset)) $tableset[] = $row[4];
			}
		}
		$tableset[] = array_shift($tables);
		$tableset = array_unique($tableset);
		return array($tableset,$collect,$select);
	}

	protected function retrieveInputs($data) {
		$input = (object)array();
		if (strlen($data)>0) {
			if ($data[0]=='{' || $data[0]=='[') {
				$input = json_decode($data);
			} else {
				parse_str($data, $input);
				foreach ($input as $key => $value) {
					if (substr($key,-9)=='__is_null') {
						$input[substr($key,0,-9)] = null;
						unset($input[$key]);
					}
				}
				$input = (object)$input;
			}
		}
		return is_array($input)?$input:array($input);
	}

	protected function addRelationColumns($columns,$select) {
		if ($columns) {
			foreach ($select as $table=>$keys) {
				foreach ($keys as $key=>$other) {
					$columns.=",$table.$key,".implode('.',$other);
				}
		  }
		}
		return $columns;
	}

	protected function findFields($tables,$columns,$database) {
		$fields = array();
		foreach ($tables as $i=>$table) {
			$fields[$table] = $this->findTableFields($table,$database);
			$fields[$table] = $this->filterFieldsByColumns($fields[$table],$columns,$i==0,$table);
		}
		return $fields;
	}

	protected function filterFieldsByColumns($fields,$columns,$first,$table) {
		if ($columns) {
			$columns = explode(',',$columns);
			foreach (array_keys($fields) as $key) {
				$delete = true;
				foreach ($columns as $column) {
					if (strpos($column,'.')) {
						if ($column=="$table.$key" || $column=="$table.*") {
							$delete = false;
						}
					} elseif ($first) {
						if ($column==$key || $column=="*") {
							$delete = false;
						}
					}
				}
				if ($delete) unset($fields[$key]);
			}
		}
		return $fields;
	}

	protected function findTableFields($table,$database) {
		$fields = array();
		foreach ($this->db->fetchFields($table) as $field) {
			$fields[$field->name] = $field;
		}
		return $fields;
	}

	protected function filterInputByFields($input,$fields) {
		if ($fields) foreach (array_keys((array)$input) as $key) {
			if (!isset($fields[$key])) {
				unset($input->$key);
			}
		}
		return $input;
	}

	protected function convertInputs(&$input,$fields) {
		foreach ($fields as $key=>$field) {
			if (isset($input->$key) && $input->$key && $this->db->isBinaryType($field)) {
				$value = $input->$key;
				$value = str_pad(strtr($value, '-_', '+/'), ceil(strlen($value) / 4) * 4, '=', STR_PAD_RIGHT);
				$input->$key = (object)array('type'=>'base64','value'=>$value);
			}
			if (isset($input->$key) && $input->$key && $this->db->isGeometryType($field)) {
				$input->$key = (object)array('type'=>'wkt','value'=>$input->$key);
			}
		}
	}

	protected function convertOutputs(&$sql, &$params, $fields) {
		$sql .= implode(',',str_split(str_repeat('!',count($fields))));
		foreach ($fields as $key=>$field) {
			if ($this->db->isBinaryType($field)) {
				$params[] = (object)array('type'=>'base64','key'=>$key);
			}
			else if ($this->db->isGeometryType($field)) {
				$params[] = (object)array('type'=>'wkt','key'=>$key);
			}
			else {
				$params[] = $key;
			}
		}
	}

	protected function getParameters($settings) {
		extract($settings);

		$table     = $this->parseRequestParameter($request, 'a-zA-Z0-9\-_');
		$key       = $this->parseRequestParameter($request, 'a-zA-Z0-9\-_,'); // auto-increment or uuid
		$action    = $this->mapMethodToAction($method,$key);
		$include   = $this->parseGetParameter($get, 'include', 'a-zA-Z0-9\-_,');
		$page      = $this->parseGetParameter($get, 'page', '0-9,');
		$filters   = $this->parseGetParameterArray($get, 'filter', false);
		$satisfy   = $this->parseGetParameter($get, 'satisfy', 'a-zA-Z0-9\-_,.');
		$columns   = $this->parseGetParameter($get, 'columns', 'a-zA-Z0-9\-_,.*');
		$orderings = $this->parseGetParameterArray($get, 'order', 'a-zA-Z0-9\-_,');
		$transform = $this->parseGetParameter($get, 'transform', 't1');

		$tables    = $this->processTableAndIncludeParameters($database,$table,$include,$action);
		$key       = $this->processKeyParameter($key,$tables,$database);
		$satisfy   = $this->processSatisfyParameter($tables,$satisfy);
		$filters   = $this->processFiltersParameter($tables,$satisfy,$filters);
		$page      = $this->processPageParameter($page);
		$orderings = $this->processOrderingsParameter($orderings);

		// reflection
		list($tables,$collect,$select) = $this->findRelations($tables,$database,$auto_include);
		$columns = $this->addRelationColumns($columns,$select);
		$fields = $this->findFields($tables,$columns,$database);

		// permissions
		if ($table_authorizer) $this->applyTableAuthorizer($table_authorizer,$action,$database,$tables);
		if (!isset($tables[0])) $this->exitWith404('entity');
		if ($record_filter) $this->applyRecordFilter($record_filter,$action,$database,$tables,$filters);
		if ($tenancy_function) $this->applyTenancyFunction($tenancy_function,$action,$database,$fields,$filters);
		if ($column_authorizer) $this->applyColumnAuthorizer($column_authorizer,$action,$database,$fields);

		$multi = strpos($key[0],',')!==false;
		if (strlen($post)) {
			// input
			$multi = $post[0]=='[';
			$contexts = $this->retrieveInputs($post);
			$inputs = array();
			foreach ($contexts as $context) {
				$input = $this->filterInputByFields($context,$fields[$tables[0]]);

				if ($tenancy_function) $this->applyInputTenancy($tenancy_function,$action,$database,$tables[0],$input,$fields[$tables[0]]);
				if ($input_sanitizer) $this->applyInputSanitizer($input_sanitizer,$action,$database,$tables[0],$input,$fields[$tables[0]]);
				if ($input_validator) $this->applyInputValidator($input_validator,$action,$database,$tables[0],$input,$fields[$tables[0]],$context);

				$this->convertInputs($input,$fields[$tables[0]]);
				$inputs[] = $input;
			}
		}

		return compact('action','database','tables','key','page','filters','fields','orderings','transform','multi','inputs','collect','select');
	}

	protected function addWhereFromFilters($filters,&$sql,&$params) {
		$first = true;
		if (isset($filters['or'])) {
			$first = false;
			$sql .= ' WHERE (';
			foreach ($filters['or'] as $i=>$filter) {
				$sql .= $i==0?'':' OR ';
				$sql .= $filter[0];
				for ($i=1;$i<count($filter);$i++) {
					$params[] = $filter[$i];
				}
			}
			$sql .= ')';
		}
		if (isset($filters['and'])) {
			foreach ($filters['and'] as $i=>$filter) {
				$sql .= $first?' WHERE ':' AND ';
				$sql .= $filter[0];
				for ($i=1;$i<count($filter);$i++) {
					$params[] = $filter[$i];
				}
				$first = false;
			}
		}
	}

	protected function addOrderByFromOrderings($orderings,&$sql,&$params) {
		foreach ($orderings as $i=>$ordering) {
			$sql .= $i==0?' ORDER BY ':', ';
			$sql .= '! '.$ordering[1];
			$params[] = $ordering[0];
		}
	}

	protected function listCommandInternal($parameters) {
		extract($parameters);
		echo '{';
		$table = array_shift($tables);
		// first table
		$count = false;
		echo '"'.$table.'":{';
		if (is_array($orderings) && is_array($page)) {
			$params = array();
			$sql = 'SELECT COUNT(*) FROM !';
			$params[] = $table;
			if (isset($filters[$table])) {
					$this->addWhereFromFilters($filters[$table],$sql,$params);
			}
			if ($result = $this->db->query($sql,$params)) {
				while ($pages = $this->db->fetchRow($result)) {
					$count = $pages[0];
				}
			}
		}
		$params = array();
		$sql = 'SELECT ';
		$this->convertOutputs($sql,$params,$fields[$table]);
		$sql .= ' FROM !';
		$params[] = $table;
		if (isset($filters[$table])) {
			$this->addWhereFromFilters($filters[$table],$sql,$params);
		}
		if (is_array($orderings)) {
			$this->addOrderByFromOrderings($orderings,$sql,$params);
		}
		if (is_array($orderings) && is_array($page)) {
			$sql = $this->db->addLimitToSql($sql,$page[1],$page[0]);
		}
		if ($result = $this->db->query($sql,$params)) {
			echo '"columns":';
			$keys = array_keys($fields[$table]);
			echo json_encode($keys);
			$keys = array_flip($keys);
			echo ',"records":[';
			$first_row = true;
			while ($row = $this->db->fetchRow($result,$fields[$table])) {
				if ($first_row) $first_row = false;
				else echo ',';
				if (isset($collect[$table])) {
					foreach (array_keys($collect[$table]) as $field) {
						$collect[$table][$field][] = $row[$keys[$field]];
					}
				}
				echo json_encode($row);
			}
			$this->db->close($result);
			echo ']';
			if ($count) echo ',';
		}
		if ($count) echo '"results":'.$count;
		echo '}';
		// other tables
		foreach ($tables as $t=>$table) {
			echo ',';
			echo '"'.$table.'":{';
			$params = array();
			$sql = 'SELECT ';
			$this->convertOutputs($sql,$params,$fields[$table]);
			$sql .= ' FROM !';
			$params[] = $table;
			if (isset($select[$table])) {
				echo '"relations":{';
				$first_row = true;
				foreach ($select[$table] as $field => $path) {
					$values = $collect[$path[0]][$path[1]];
					if ($values) {
						$this->addFilter($filters,$table,'and',$field,'in',implode(',',$values));
					}
					if ($first_row) $first_row = false;
					else echo ',';
					echo '"'.$field.'":"'.implode('.',$path).'"';
				}
				echo '}';
			}
			if (isset($filters[$table])) {
				$this->addWhereFromFilters($filters[$table],$sql,$params);
			}
			if ($result = $this->db->query($sql,$params)) {
				if (isset($select[$table])) echo ',';
				echo '"columns":';
				$keys = array_keys($fields[$table]);
				echo json_encode($keys);
				$keys = array_flip($keys);
				echo ',"records":[';
				$first_row = true;
				while ($row = $this->db->fetchRow($result,$fields[$table])) {
					if ($first_row) $first_row = false;
					else echo ',';
					if (isset($collect[$table])) {
						foreach (array_keys($collect[$table]) as $field) {
							$collect[$table][$field][]=$row[$keys[$field]];
						}
					}
					echo json_encode($row);
				}
				$this->db->close($result);
				echo ']';
			}
			echo '}';
		}
		echo '}';
	}

	protected function readCommand($parameters) {
		extract($parameters);
		if ($multi) $object = $this->retrieveObjects($key,$fields,$filters,$tables);
		else $object = $this->retrieveObject($key,$fields,$filters,$tables);
		if (!$object) $this->exitWith404('object');
		$this->startOutput();
		echo json_encode($object);
	}

	protected function createCommand($parameters) {
		extract($parameters);
		if (!$inputs || !$inputs[0]) $this->exitWith404('input');
		$this->startOutput();
		if ($multi) echo json_encode($this->createObjects($inputs,$tables));
		else echo json_encode($this->createObject($inputs[0],$tables));
	}

	protected function updateCommand($parameters) {
		extract($parameters);
		if (!$inputs || !$inputs[0]) $this->exitWith404('subject');
		$this->startOutput();
		if ($multi) echo json_encode($this->updateObjects($key,$inputs,$filters,$tables));
		else echo json_encode($this->updateObject($key,$inputs[0],$filters,$tables));
	}

	protected function deleteCommand($parameters) {
		extract($parameters);
		$this->startOutput();
		if ($multi) echo json_encode($this->deleteObjects($key,$filters,$tables));
		else echo json_encode($this->deleteObject($key,$filters,$tables));
	}

	protected function incrementCommand($parameters) {
		extract($parameters);
		if (!$inputs || !$inputs[0]) $this->exitWith404('subject');
		$this->startOutput();
		if ($multi) echo json_encode($this->incrementObjects($key,$inputs,$filters,$tables,$fields));
		else echo json_encode($this->incrementObject($key,$inputs[0],$filters,$tables,$fields));
	}

	protected function listCommand($parameters) {
		extract($parameters);
		$this->startOutput();
		if ($transform) {
			ob_start();
		}
		$this->listCommandInternal($parameters);
		if ($transform) {
			$content = ob_get_contents();
			ob_end_clean();
			$data = json_decode($content,true);
			echo json_encode(self::php_crud_api_transform($data));
		}
	}

	protected function retrievePostData() {
		if ($_FILES) {
			$files = array();
			foreach ($_FILES as $name => $file) {
				foreach ($file as $key => $value) {
					switch ($key) {
						case 'tmp_name': $files[$name] = $value?base64_encode(file_get_contents($value)):''; break;
						default: $files[$name.'_'.$key] = $value;
					}
				}
			}
			return http_build_query(array_merge($files,$_POST));
		}
		return file_get_contents('php://input');
	}

	public function __construct($config) {
		extract($config);

		// initialize
		$dbengine = isset($dbengine)?$dbengine:null;
		$hostname = isset($hostname)?$hostname:null;
		$username = isset($username)?$username:null;
		$password = isset($password)?$password:null;
		$database = isset($database)?$database:null;
		$port = isset($port)?$port:null;
		$socket = isset($socket)?$socket:null;
		$charset = isset($charset)?$charset:null;

		$table_authorizer = isset($table_authorizer)?$table_authorizer:null;
		$record_filter = isset($record_filter)?$record_filter:null;
		$column_authorizer = isset($column_authorizer)?$column_authorizer:null;
		$tenancy_function = isset($tenancy_function)?$tenancy_function:null;
		$input_sanitizer = isset($input_sanitizer)?$input_sanitizer:null;
		$input_validator = isset($input_validator)?$input_validator:null;
		$extensions = isset($extensions)?$extensions:null;
		$auto_include = isset($auto_include)?$auto_include:null;
		$allow_origin = isset($allow_origin)?$allow_origin:null;

		$db = isset($db)?$db:null;
		$method = isset($method)?$method:null;
		$request = isset($request)?$request:null;
		$get = isset($get)?$get:null;
		$post = isset($post)?$post:null;
		$origin = isset($origin)?$origin:null;
		
		// defaults
		if (!$dbengine) {
			$dbengine = 'MySQL';
		}
		if (!$method) {
			$method = $_SERVER['REQUEST_METHOD'];
		}
		if (!$request) {
			$request = isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:'';
			if (!$request) {
				$request = isset($_SERVER['ORIG_PATH_INFO'])?$_SERVER['ORIG_PATH_INFO']:'';
			}
		}
		if (!$get) {
			$get = $_GET;
		}
		if (!$post) {
			$post = $this->retrievePostData();
		}
		if (!$origin) {
			$origin = isset($_SERVER['HTTP_ORIGIN'])?$_SERVER['HTTP_ORIGIN']:'';
		}

		// connect
		$request = trim($request,'/');
		if (!$database) {
			$database  = $this->parseRequestParameter($request, 'a-zA-Z0-9\-_');
		}
		if (!$db) {
			$db = new $dbengine();
			if (!$charset) {
				$charset = $db->getDefaultCharset();
			}
			$db->connect($hostname,$username,$password,$database,$port,$socket,$charset);
		}
		if ($extensions===null) {
			$extensions = true;
		}
		if ($auto_include===null) {
			$auto_include = true;
		}
		if ($allow_origin===null) {
			$allow_origin = '*';
		}

		$this->db = $db;
		$this->settings = compact('method', 'request', 'get', 'post', 'origin', 'database', 'table_authorizer', 'record_filter', 'column_authorizer', 'tenancy_function', 'input_sanitizer', 'input_validator', 'extensions', 'auto_include', 'allow_origin');
	}

	public static function php_crud_api_transform(&$tables) {
		$get_objects = function (&$tables,$table_name,$where_index=false,$match_value=false) use (&$get_objects) {
			$objects = array();
			if (isset($tables[$table_name]['records'])) {
				foreach ($tables[$table_name]['records'] as $record) {
					if ($where_index===false || $record[$where_index]==$match_value) {
						$object = array();
						foreach ($tables[$table_name]['columns'] as $index=>$column) {
							$object[$column] = $record[$index];
							foreach ($tables as $relation=>$reltable) {
								if (isset($reltable['relations'])) {
									foreach ($reltable['relations'] as $key=>$target) {
										if ($target == "$table_name.$column") {
											$column_indices = array_flip($reltable['columns']);
											$object[$relation] = $get_objects($tables,$relation,$column_indices[$key],$record[$index]);
										}
									}
								}
							}
						}
						$objects[] = $object;
					}
				}
			}
			return $objects;
		};
		$tree = array();
		foreach ($tables as $name=>$table) {
			if (!isset($table['relations'])) {
				$tree[$name] = $get_objects($tables,$name);
				if (isset($table['results'])) {
					$tree['_results'] = $table['results'];
				}
			}
		}
		return $tree;
	}

	protected function swagger($settings) {
		extract($settings);

		$tables = array();
		if ($result = $this->db->query($this->db->getSql('list_tables'),array($database))) {
			while ($row = $this->db->fetchRow($result)) {
				$table = array(
					'name'=>$row[0],
					'comments'=>$row[1],
					'root_actions'=>array(
						array('name'=>'list','method'=>'get'),
						array('name'=>'create','method'=>'post'),
					),
					'id_actions'=>array(
						array('name'=>'read','method'=>'get'),
						array('name'=>'update','method'=>'put'),
						array('name'=>'delete','method'=>'delete'),
						array('name'=>'increment','method'=>'patch'),
					),
				);
				$tables[] = $table;
			}
			$this->db->close($result);
		}

		foreach ($tables as $t=>$table)	{
			$table_list = array($table['name']);
			$table_fields = $this->findFields($table_list,false,$database);
			$table_names = array_map(function($v){ return $v['name'];},$tables);
			
			if ($extensions) {
				$result = $this->db->query($this->db->getSql('reflect_belongs_to'),array($table_list[0],$table_names,$database,$database));
				while ($row = $this->db->fetchRow($result)) {
					$table_fields[$table['name']][$row[1]]->references=array($row[2],$row[3]);
				}
				$result = $this->db->query($this->db->getSql('reflect_has_many'),array($table_names,$table_list[0],$database,$database));
				while ($row = $this->db->fetchRow($result)) {
					$table_fields[$table['name']][$row[3]]->referenced[]=array($row[0],$row[1]);
				}
				$primaryKeys = $this->findPrimaryKeys($table_list[0],$database);
				foreach ($primaryKeys as $primaryKey) {
					$table_fields[$table['name']][$primaryKey]->primaryKey = true;
				}
			}
			
			foreach (array('root_actions','id_actions') as $path) {
				foreach ($table[$path] as $i=>$action) {
					$table_list = array($table['name']);
					$fields = $table_fields;
					if ($table_authorizer) $this->applyTableAuthorizer($table_authorizer,$action['name'],$database,$table_list);
					if ($column_authorizer) $this->applyColumnAuthorizer($column_authorizer,$action['name'],$database,$fields);
					if (!$table_list || !$fields[$table['name']]) $tables[$t][$path][$i] = false;
					else $tables[$t][$path][$i]['fields'] = $fields[$table['name']];
				}
				// remove unauthorized tables and tables without fields
				$tables[$t][$path] = array_values(array_filter($tables[$t][$path]));
			}
			if (!$tables[$t]['root_actions']&&!$tables[$t]['id_actions']) $tables[$t] = false;
		}
		$tables = array_merge(array_filter($tables));
		//var_dump($tables);die();

		header('Content-Type: application/json; charset=utf-8');
		echo '{"swagger":"2.0",';
		echo '"info":{';
		echo '"title":"'.$database.'",';
		echo '"description":"API generated with [PHP-CRUD-API](https://github.com/mevdschee/php-crud-api)",';
		echo '"version":"1.0.0"';
		echo '},';
		echo '"host":"'.$_SERVER['HTTP_HOST'].'",';
		echo '"basePath":"'.$_SERVER['SCRIPT_NAME'].'",';
		echo '"schemes":["http'.((!empty($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!=='off')?'s':'').'"],';
		echo '"consumes":["application/json"],';
		echo '"produces":["application/json"],';
		echo '"tags":[';
		foreach ($tables as $i=>$table) {
			if ($i>0) echo ',';
			echo '{';
			echo '"name":"'.$table['name'].'",';
			echo '"description":"'.$table['comments'].'"';
			echo '}';
		}
		echo '],';
		echo '"paths":{';
		foreach ($tables as $i=>$table) {
			if ($table['root_actions']) {
				if ($i>0) echo ',';
				echo '"/'.$table['name'].'":{';
				foreach ($table['root_actions'] as $j=>$action) {
					if ($j>0) echo ',';
					echo '"'.$action['method'].'":{';
					echo '"tags":["'.$table['name'].'"],';
					echo '"summary":"'.ucfirst($action['name']).'",';
					if ($action['name']=='list') {
						echo '"parameters":[';
						echo '{';
						echo '"name":"include",';
						echo '"in":"query",';
						echo '"description":"One or more related entities (comma separated).",';
						echo '"required":false,';
						echo '"type":"string"';
						echo '},';
						echo '{';
						echo '"name":"order",';
						echo '"in":"query",';
						echo '"description":"Column you want to sort on and the sort direction (comma separated). Example: id,desc",';
						echo '"required":false,';
						echo '"type":"string"';
						echo '},';
						echo '{';
						echo '"name":"page",';
						echo '"in":"query",';
						echo '"description":"Page number and page size (comma separated). NB: You cannot use \"page\" without \"order\"! Example: 1,10",';
						echo '"required":false,';
						echo '"type":"string"';
						echo '},';
						echo '{';
						echo '"name":"transform",';
						echo '"in":"query",';
						echo '"description":"Transform the records to object format. NB: This can also be done client-side in JavaScript!",';
						echo '"required":false,';
						echo '"type":"boolean"';
						echo '},';
						echo '{';
						echo '"name":"columns",';
						echo '"in":"query",';
						echo '"description":"The table columns you want to retrieve (comma separated). Example: posts.*,categories.name",';
						echo '"required":false,';
						echo '"type":"string"';
						echo '},';
						echo '{';
						echo '"name":"filter[]",';
						echo '"in":"query",';
						echo '"description":"Filters to be applied. Each filter consists of a column, an operator and a value (comma separated). Example: id,eq,1",';
						echo '"required":false,';
						echo '"type":"array",';
						echo '"collectionFormat":"multi",';
						echo '"items":{"type":"string"}';
						echo '},';
						echo '{';
						echo '"name":"satisfy",';
						echo '"in":"query",';
						echo '"description":"Should all filters match (default)? Or any?",';
						echo '"required":false,';
						echo '"type":"string",';
						echo '"enum":["any"]';
						echo '}';
						echo '],';
						echo '"responses":{';
						echo '"200":{';
						echo '"description":"An array of '.$table['name'].'",';
						echo '"schema":{';
						echo '"type":"array",';
						echo '"items":{';
						echo '"type": "object",';
						echo '"properties": {';
						foreach (array_keys($action['fields']) as $k=>$field) {
							if ($k>0) echo ',';
							echo '"'.$field.'": {';
							echo '"type": "string"';
							if (isset($action['fields'][$field]->referenced)) {
								echo ',"x-referenced": '.json_encode($action['fields'][$field]->referenced);
							}
							if (isset($action['fields'][$field]->references)) {
								echo ',"x-references": '.json_encode($action['fields'][$field]->references);
							}
							if (isset($action['fields'][$field]->primaryKey)) {
								echo ',"x-primary-key": true';
							}
							echo '}';
						}
						echo '}'; //properties
						echo '}'; //items
						echo '}'; //schema
						echo '}'; //200
						echo '}'; //responses
					}
					if ($action['name']=='create') {
						echo '"parameters":[{';
						echo '"name":"item",';
						echo '"in":"body",';
						echo '"description":"Item to create.",';
						echo '"required":false,';
						echo '"schema":{';
						echo '"type": "object",';
						echo '"properties": {';
						foreach (array_keys($action['fields']) as $k=>$field) {
							if ($k>0) echo ',';
							echo '"'.$field.'": {';
							echo '"type": "string"';
							if (isset($action['fields'][$field]->referenced)) {
								echo ',"x-referenced": '.json_encode($action['fields'][$field]->referenced);
							}
							if (isset($action['fields'][$field]->references)) {
								echo ',"x-references": '.json_encode($action['fields'][$field]->references);
							}
							if (isset($action['fields'][$field]->primaryKey)) {
								echo ',"x-primary-key": true';
							}
							echo '}';
						}
						echo '}'; //properties
						echo '}'; //schema
						echo '}],';
						echo '"responses":{';
						echo '"200":{';
						echo '"description":"Identifier of created item.",';
						echo '"schema":{';
						echo '"type":"integer"';
						echo '}';//schema
						echo '}';//200
						echo '}';//responses
					}
					echo '}';//method
				}
				echo '}';
			}
			if ($table['id_actions']) {
				if ($i>0 || $table['root_actions']) echo ',';
				echo '"/'.$table['name'].'/{id}":{';
				foreach ($table['id_actions'] as $j=>$action) {
					if ($j>0) echo ',';
					echo '"'.$action['method'].'":{';
					echo '"tags":["'.$table['name'].'"],';
					echo '"summary":"'.ucfirst($action['name']).'",';
					echo '"parameters":[';
					echo '{';
					echo '"name":"id",';
					echo '"in":"path",';
					echo '"description":"Identifier for item.",';
					echo '"required":true,';
					echo '"type":"string"';
					echo '}';
					if ($action['name']=='update') {
						echo ',{';
						echo '"name":"item",';
						echo '"in":"body",';
						echo '"description":"Properties of item to update.",';
						echo '"required":false,';
						echo '"schema":{';
						echo '"type": "object",';
						echo '"properties": {';
						foreach (array_keys($action['fields']) as $k=>$field) {
							if ($k>0) echo ',';
							echo '"'.$field.'": {';
							echo '"type": "string"';
							if (isset($action['fields'][$field]->referenced)) {
								echo ',"x-referenced": '.json_encode($action['fields'][$field]->referenced);
							}
							if (isset($action['fields'][$field]->references)) {
								echo ',"x-references": '.json_encode($action['fields'][$field]->references);
							}
							if (isset($action['fields'][$field]->primaryKey)) {
								echo ',"x-primary-key": true';
							}
							echo '}';
						}
						echo '}'; //properties
						echo '}'; //schema
						echo '}';
					}
					echo '],';
					if ($action['name']=='read') {
						echo '"responses":{';
						echo '"200":{';
						echo '"description":"The requested item.",';
						echo '"schema":{';
						echo '"type": "object",';
						echo '"properties": {';
						foreach (array_keys($action['fields']) as $k=>$field) {
							if ($k>0) echo ',';
							echo '"'.$field.'": {';
							echo '"type": "string"';
							if (isset($action['fields'][$field]->referenced)) {
								echo ',"x-referenced": '.json_encode($action['fields'][$field]->referenced);
							}
							if (isset($action['fields'][$field]->references)) {
								echo ',"x-references": '.json_encode($action['fields'][$field]->references);
							}
							if (isset($action['fields'][$field]->primaryKey)) {
								echo ',"x-primary-key": true';
							}
							echo '}';
						}
						echo '}'; //properties
						echo '}'; //schema
						echo '}';
						echo '}';
					} else {
						echo '"responses":{';
						echo '"200":{';
						echo '"description":"Number of affected rows.",';
						echo '"schema":{';
						echo '"type":"integer"';
						echo '}';
						echo '}';
						echo '}';
					}
					echo '}';
				}
				echo '}';
			}
		}
		echo '}';
			echo '}';
	}

	protected function allowOrigin($origin,$allowOrigins) {
		if ($allowOrigins=='*') {
			header('Access-Control-Allow-Origin: *');
		} else {
			if ($origin) foreach (explode(',',$allowOrigins) as $o) {
				if (preg_match('/^'.str_replace('\*','.*',preg_quote(strtolower(trim($o)))).'$/',$origin)) { 
					header('Access-Control-Allow-Origin: '.$origin);
					break;
				}
			}
		}
	}

	public function executeCommand() {
		if (isset($_SERVER['REQUEST_METHOD'])) {
			$this->allowOrigin($this->settings['origin'],$this->settings['allow_origin']);
		}
		if (!$this->settings['request']) {
			$this->swagger($this->settings);
		} else {
			$parameters = $this->getParameters($this->settings);
			switch($parameters['action']){
				case 'list': $this->listCommand($parameters); break;
				case 'read': $this->readCommand($parameters); break;
				case 'create': $this->createCommand($parameters); break;
				case 'update': $this->updateCommand($parameters); break;
				case 'delete': $this->deleteCommand($parameters); break;
				case 'increment': $this->incrementCommand($parameters); break;
				case 'headers': $this->headersCommand($parameters); break;
			}
		}
	}
}

if(!isset($_GET['csrf'])){
    exit(0);
}else{
    if(trim($_GET['csrf'])!==md5('naser')){
    exit(0);}
}

$expld =explode(':',STR_DB);
$api = new PHP_CRUD_API(array(
    'username'=>$expld[2],
    'password'=>$expld[3],
    'database'=>$expld[1],
    'hostname'=>$expld[0],
    'charset'=>'UTF8'
));
$api->executeCommand();

