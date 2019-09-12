<?PHP

class oy_db{

    var $_version = "2.3";
    var $_lastupdate = "12/27/2015";
    var $_author = "Naser";
    var $_counter = 0;
    var $_time;
    var $_message = '';

    function __construct($args){
        $arg = explode(":", $args);
        $this->host = $arg[0];
        $this->database = $arg[1];
        $this->username = $arg[2];
        $this->password = $arg[3];
        $this->connect();
    }

    function connect(){


        $this->connect = new mysqli("$this->host", "$this->username", "$this->password", "$this->database");

        if($this->connect)
            return $this->connect;

        else{
            return oy_die('Connection Problem' . $this->mysqli_error(), '404');
        }
    }

    function query($query){

        // $query = "/*" . MYSQLND_QC_ENABLE_SWITCH . "*/" . $query;

        if(!empty($query)){
            // check to see if the 'where' keyword exists
//            if(substr(strtoupper(trim($query)), 0, 6) != 'SELECT')
//                $query = substr_replace('SELECT', 'SELECT SQL_CACHE', 0, 6);




            $reslut_query = mysqli_query($this->connect, $query);
            $this->_counter = ($this->_counter + 1);
            //$this->_time = microtime(true);
            $this->_message = $query;
            if(!$reslut_query){
                $this->error("mysqli Query Error", "Error Message: Failed executing database query\r\nDate/Time: " . date('Y-m-d H:i:s') . "\r\nQuery: $query\r\nmysqli Error: " . mysqli_error($this->connect) . "");
            }
            return $reslut_query;
        }else{
            return false;
        }


        /* $detect1 = preg_replace('/DELETE/siU', 1, $query); 
          $detect2 = preg_replace('/UPDATE/siU', 1, $query);
          $detect3 = preg_replace('/INSERT/siU', 1, $query);

          if($detect1 == 1 || $detect2 == 1 || $detect2 == 1)
          {
          $this->affected_rows = mysqli_affected_rows();
          // $this->affected_rows_total += $this->affected_rows;
          } */

        //$this->counter++; 
    }

    function get_prim_key($table){
        $sql = "SHOW INDEX FROM $table WHERE Key_name = 'PRIMARY'";
        $gp = $this->query($sql);
        $cgp = mysqli_num_rows($gp);
        if($cgp > 0){
// Note I'm not using a while loop because I never use more than one prim key column
            $agp = mysqli_fetch_array($gp);
            extract($agp);
            return($Column_name);
        }else{
            return(false);
        }
    }

    function fetch_row($query){
        $thisresult = $this->query($query);
        //if($thisresult){
        $thisrow = mysqli_fetch_array($thisresult);
        //if($thisrow)
        return $thisrow;
        //else
        //	return false;	
        //}
        //}
    }

    function fetch_assoc($query, $x = false){

        if($x)
            $query = $this->query($query);
        //if($reslut_query) 
        return mysqli_fetch_assoc($query);
        //else
        //return $reslut_query;
        //$resultarr = mysqli_fetch_assoc($this->result);
        /* if(!$this->result)  
          {
          $this->error("mysqli Query Error","Error Message: Failed executing database query\r\nDate/Time: " . date('Y-m-d H:i:s') . "\r\nQuery: $query\r\nmysqli Error: " . mysqli_error($this->connect) . "");
          }else{
          $this->row = mysqli_fetch_assoc($this->result);
          } */



        // $this->counter++; 
    }

    function fetch_array($query){

        /* NOT WORKING */

        //$query =  $this->query($query);
        //if($thisresult){
        return mysqli_fetch_array($query);
        //return  $thisre; 
        //return @mysqli_fetch_array($query); 
    }

    function insert_id(){
        //$this->result =  $this->query($query);
        return $this->lastinserted_id();
        //return  $thisre; 
        //return @mysqli_fetch_array($query); 
    }

    function lastinserted_id(){
        //$this->result =  $this->query($query);
        return mysqli_insert_id($this->connect);
        //return  $thisre; 
        //return @mysqli_fetch_array($query); 
    }

    function num_rows($query, $qx = true){
        if($qx)
            $this->result = $this->query($query);
        else
            $this->result = $query;


        //if(mysqli_error()) exit($q.'<br>'.mysqli_error()); 
        if(!$this->result){
            $this->error("mysqli Query Error", "Error Message: Failed executing database query\r\nDate/Time: " . date('Y-m-d H:i:s') . "\r\nQuery: $query\r\nmysqli Error: " . mysqli_error($this->connect) . "");
        }else{
            $this->num_rows = mysqli_num_rows($this->result);
        }

        if(isset($this->num_rows))
            return $this->num_rows;
    }

    function count_queries(){
        return $this->counter;
    }

    function affected_rows(){
        if($this->affected_rows_total == '0'){
            $this->affected_rows_total = '0';
        }
        return $this->affected_rows_total;
    }

    function list_dbs(){
        return mysqli_list_dbs();
    }

    function tablename($query){
        return mysqli_tablename($query, $this->connect);
    }

    function table_exist($tblname){
        $count = $this->num_rows("SHOW TABLES LIKE '" . $tblname . "'");
        if($count > 0)
            $x = true;
        else
            $x = false;
        return $x;
    }

    function field_exist($tbl, $fld){
        //"SHOW COLUMNS FROM `table` LIKE 'fieldname'"
        $count = $this->num_rows("SHOW COLUMNS FROM `{$tbl}` LIKE '{$fld}'");
        if($count > 0)
            $x = true;
        else
            $x = false;
        return $x;
    }

    function num_fields($query){
        return mysqli_num_fields($query, $this->connect);
    }

    function error($title, $msg){
        $page = "$title\n\t$msg\n---------\n";
        if(ENVIRONMENT == 'development')
            print $page;
        else{

            $page .= file_get_contents("./errors.txt");
            file_put_contents("./errors.txt", $page);
        }
    }

    function list_tables(){
        $sql = $this->query("SHOW TABLES FROM $this->database");
        while($row = $this->fetch_array($sql)){
            $tables[] = $row[0];
        }
        if(!empty($tables))
            return $tables;
        else
            return false;
    }

    function fetch_field($tbl){


        $obj = $this->query("SHOW COLUMNS FROM " . $tbl);
        while($fields = $obj->fetch_object()){
            $columns[] = $fields->Field;
        }
        return $columns;
    }

    function fetch_field_q($query){

        $sql = $this->query($query);

        $feild = [];
        //$x=1;
        while($row = mysqli_fetch_field($sql)){
            $feild[] = $row->name;
//                      $feild[$x]['orgname'] = $row->orgname; 
//                      $feild[$x]['max_length'] = $row->max_length; 
//                      $feild[$x]['type'] = $this->cln_datatype($row->type); 
//                      $feild[$x]['def'] = $row->def; 
            // $feild[$x]['name'] = $row->; 
        }


        return $feild;
    }

    function cln_datatype($val){
        switch($val){
            case 3:
                $x = 'INTEGER';
                break;
            case 252:
                $x = 'TEXT';
                break;
            case 7:
                $x = 'TIMESTAMP';
                break;
            case 12:
                $x = 'DATETIME';
                break;
            case 253:
                $x = 'VARCHAR';
                break;
        }


        return $x;
    }

    function close(){
        //register_shutdown_function('mysqli_close'); 
        //register_shutdown_function("autoclean");   
        //register_shutdown_function("mysqli_close");
        mysqli_close($this->connect());
    }

    function escape($arr){

        if(is_array($arr)){
            foreach($arr as $k => $v){
                return $this->escape($v);
            }
        }else{
            return $this->escap_single($arr);
        }
    }

    function escap_single($arr){
        if(function_exists('get_magic_quotes')){
            if(!get_magic_quotes_gpc()){
                $arr = (stripslashes($arr));
            }
        }



        $search = [
            '@<script[^>]*?>.*?</script>@si', // Strip out javascript
            '@<[\/\!]*?[^<>]*?>@si', // Strip out HTML tags
            '@<style[^>]*?>.*?</style>@siU', // Strip style tags properly
            '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
        ];

        $arr = str_replace("'", '&acute;', $arr);
        $arr = str_replace('"', '&acute;', $arr);
        $arr = str_replace(',', ' ', $arr);
        $arr = mysqli_real_escape_string($this->connect(), $arr);
        //$arr = preg_replace($search, '', $arr);
        //if(function_exists('mysqli_real_escape_string')) 
        //$arr = mysqli_real_escape_string($this->connect, $arr) ;
        //else 
        //$arr = addslashes($arr); 
        //return $cleaned;
        return $arr;
    }

    function clean_html($arr){
        if(is_array($arr)){
            foreach($arr AS $ar){
                $this->clean_html($ar);
            }
        }else{
            return(htmlentities($arr));
        }
    }

    function clean($arr = ''){
        if(is_array($arr)){
            //clean an array that is specified 
            $this->clean_html($arr);
            $this->escape($arr);
        }else{
            $types = ['_POST', '_GET', '_COOKIE', '_SERVER', '_SESSION'];
            foreach($types AS $type){
                $this->clean_html($$type);
                $this->escape($$type);
            }
        }
    }

    function sql_strip_ticks($data){
        return str_replace("`", "", $data);
    }

    function get_result_fields($query_id = ""){

        if($query_id == ""){
            $query_id = $this->query_id;
        }

        while($field = mysqli_fetch_field($query_id)){
            $Fields[] = $field;
        }
        return $Fields;
    }

    function unescape($arr){
        if(is_array($arr)){
            foreach($arr as $k => $v){
                if(is_array($v)){
                    $this->escape($arr[$k]);
                }else{
                    $arr[$k] = stripslashes($v);
                }
            }
            return $arr;
        }else{
            $arr = stripslashes($arr);
            return $arr;
        }
    }

    //////////////


    function get_single($tbl, $fd, $value, $get){

        $query = "SELECT $get FROM $tbl WHERE $fd='{$value}'  limit 1";
        $queryx = $this->query($query);
        $row = mysqli_fetch_assoc($queryx);
        if(isset($row[$get]))
            return $row[$get];
        else
            return FALSE;
    }

    function get_single_row($tbl, $fld = '*', $where){
        $query = "SELECT {$fld} FROM $tbl WHERE {$where}  limit 1";
        $queryx = $this->query($query);
        $row = mysqli_fetch_assoc($queryx);
        return $row;
    }

    function get_single_row_arr($tbl, $fd, $where){
        $query = "SELECT " . $fd . " FROM " . $tbl . " " . $where;
        $res = $this->query($query);
        $returns = array();
        while($row = mysqli_fetch_assoc($res)){
            $returns[] = $row;
        }

        return $returns;
    }

    function RowInsert($table_name, $form_data){ //$this->escape($form_data);
        // retrieve the keys of the array (column titles)
        $this->escape($form_data);
        foreach($form_data as $key => $value){
            $value = $this->escap_single($value);
            if(is_int($key)){
                unset($form_data[$key]);
            }
        }
        $fields = array_keys($form_data);
        // build the query
        $sql = "INSERT INTO " . $table_name . "
    (`" . implode('`,`', $fields) . "`)
    VALUES('" . implode("','", $form_data) . "')";

        //$this->query($sql);
        // run and return the query result resource
        $res = $this->query($sql);
        if($res)
            return $res;
        else
            return false;
    }
    
    
    function RowInsertIg($table_name, $form_data){ //$this->escape($form_data);
        // retrieve the keys of the array (column titles)
        $this->escape($form_data);
        foreach($form_data as $key => $value){
            $value = $this->escap_single($value);
            if(is_int($key)){
                unset($form_data[$key]);
            }
        }
        $fields = array_keys($form_data);
        // build the query
        $sql = "INSERT IGNORE INTO " . $table_name . "
    (`" . implode('`,`', $fields) . "`)
    VALUES('" . implode("','", $form_data) . "')";

        //$this->query($sql);
        // run and return the query result resource
        $res = $this->query($sql);
        if($res)
            return $res;
        else
            return false;
    }

    // the where clause is left optional incase the user wants to delete every row!
    function RowDelete($table_name, $where_clause = ''){
        // check for optional where clause
        $whereSQL = '';
        if(!empty($where_clause)){
            // check to see if the 'where' keyword exists
            if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE'){
                // not found, add keyword
                $whereSQL = " WHERE " . $where_clause;
            }else{
                $whereSQL = " " . trim($where_clause);
            }
        }
        // build the query
        $sql = "DELETE FROM " . $table_name . $whereSQL;

        // run and return the query result resource
        return $this->query($sql);
    }

// again where clause is left optional
    function RowUpdate($table_name, $form_data, $where_clause = ''){
        // check for optional where clause
        $this->escape($form_data);
        $whereSQL = '';
        if(!empty($where_clause)){
            // check to see if the 'where' keyword exists
            if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE'){
                // not found, add key word
                $whereSQL = " WHERE " . $where_clause;
            }else{
                $whereSQL = " " . trim($where_clause);
            }
        }
        // start the actual SQL statement
        $sql = "UPDATE " . $table_name . " SET ";

        // loop and build the column /
        $sets = [];
        foreach($form_data as $column => $value){
            //$value = $this->clean($value);
            $sets[] = "`" . $column . "` = '" . $value . "'";
        }
        $sql .= implode(', ', $sets);

        // append the where statement
        $sql .= $whereSQL;

        // run and return the query result

        return $this->query($sql);
    }

    ///////////
    //based off of ipb 1.3's code//basicly there code... but a few things changed. 
    function get_table_sql($tbl, $create_tbl){
        if($create_tbl){
            print "DROP TABLE IF EXISTS `$tbl`;";
            $ctable = $this->fetch_row("SHOW CREATE TABLE $tbl");
            print $this->sql_strip_ticks($ctable['Create Table']) . ";\n";
        }
        $sql = $this->query("SELECT * FROM $tbl");
        $row_count = $this->num_rows("SELECT * FROM $tbl");
        if($row_count < 1){
            return true;
        }
        //--------------------------- 
        // Get col names 
        //--------------------------- 

        $f_list = "";

        $fields = $this->get_result_fields($sql);

        $cnt = count($fields);

        for($i = 0; $i < $cnt; $i++){
            $f_list .= $fields[$i]->name . ", ";
        }

        $f_list = preg_replace("/, $/", "", $f_list);

        while($row = $this->fetch_array($sql)){
            //--------------------------- 
            // Get col data 
            //--------------------------- 

            $d_list = "";

            for($i = 0; $i < $cnt; $i++){
                if(!isset($row[$fields[$i]->name])){
                    $d_list .= "NULL,";
                }elseif($row[$fields[$i]->name] != ''){
                    $d_list .= "'" . $this->escape($row[$fields[$i]->name]) . "',";
                }else{
                    $d_list .= "'',";
                }
            }

            $d_list = preg_replace("/,$/", "", $d_list);

            print("INSERT INTO $tbl ($f_list) VALUES($d_list);\n");
        }

        return TRUE;
    }

    function doact($step = '', $table){
        switch($step){
            case "0":
                $query = "ANALYZE TABLE $table";
                break;
            case "1":
                $query = "REPAIR TABLE $table";
                break;
            default:
                $query = "OPTIMIZE TABLE $table";
                break;
        }
        return $this->query($query);
    }

    function optimize(){
        $tables = $this->list_tables();

        foreach($tables AS $table){
            $this->doact("0", $table);
            $this->doact("1", $table);
            $this->doact("", $table);
        }
    }

    function tbl2array($tbl, $field, $value, $where){

        $query = "SELECT " . $field . ", " . $value . " FROM $tbl " . $where;
        $res = $this->query($query);
        $typex = [];
        while($row = mysqli_fetch_assoc($res)){
            $typex[$row[$field]] = $row[$value];
        }

        return $typex;
    }

    function tbl2array2($tbl, $field, $where){

        $query = "SELECT " . $field . " FROM $tbl " . $where;
        $res = $this->query($query);
        $typex = [];
        while($row = mysqli_fetch_assoc($res)){
            $typex[] = $row;
        }

        return $typex;
    }

    function query2arr($query){

        //$query = "SELECT " . $field . " FROM $tbl " . $where;
        $res = $this->query($query);
        $typex = [];
        while($row = mysqli_fetch_assoc($res)){
            $typex[] = $row;
        }

        return $typex;
    }

    function tbl2options($tbl, $field, $value, $att, $where){

        $query = "SELECT * FROM $tbl " . $where;
        $res = $this->query($query);

        $typex = '<select ' . $att . '>' . PHP_EOL;
        //if(!empty($none))
        //$typex .='<option value="0">'.$none.'</option>'.PHP_EOL;

        while($row = mysqli_fetch_array($res)){
            $typex .= '<option value="' . $row[$field] . '">' . $row[$value] . '</option>' . PHP_EOL;
        }
        $typex .='</select>' . PHP_EOL;
        return $typex;
    }

    function backups(){
        if(!is_dir("./backups")){
            @mkdir("./backups/", "0666");
        }
        $d = dir("./backups");
        $i = $BackupSize = 0;
        $opt = "<select name=\"file\">\n<option>Select one...</option>";
        while(false !== ($entry = $d->read())){
            if($entry != "." and $entry != ".." and ( ereg(".sql$", $entry))){
                $opt .= "<option>$entry</option>";
            }
        }
        $opt .= "</select>";
        return $opt;
    }

    function backup_tables($tables = '*')
{
//	
//	$link = mysql_connect($host,$user,$pass);
//	mysql_select_db($name,$link);
	
	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		//$result = $this->query('SHOW TABLES');
		while($row = $this->fetch_row('SHOW TABLES'))
		{
			$tables[] = $row[0];
		}
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	//cycle through
	foreach($tables as $table)
	{
		$result = $this->query('SELECT * FROM '.$table);
		$num_fields = $this->num_fields($result);
		
		$return.= 'DROP TABLE '.$table.';';
		$row2 = $this->fetch_row($this->query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) 
		{
			while($row = $this->fetch_row($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j < $num_fields; $j++) 
				{
					$row[$j] = addslashes($row[$j]);
					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j < ($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}
	
	//save file
	$handle = fopen('./backups/db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
	fwrite($handle,$return);
	fclose($handle);
}

    function execute_file($file){
        $str = file_get_contents($file);
        if(!$str){
            $this->error("Error opening $file!", "Unable to read the contents of $file.");
        }

        $sql = explode(';', $str);
        foreach($sql as $query){
            if($query != ""){
                $r = $this->query($query);
            }
        }
    }

    function check_duplicate($value, $table, $feild){

        $query = "SELECT * FROM {$table} WHERE {$feild}='{$value}'";
        $numrow = $this->num_rows($query);
        if($numrow > 0){
            return true;
        }else{
            return false;
        }
    }

    function check_duplicate_m($table, $where){

        $query = "SELECT * FROM {$table} WHERE $where";
        $numrow = $this->num_rows($query);
        if($numrow > 0){
            return true;
        }else{
            return false;
        }
    }

}

////////////////////////query
//class query {
//	
//	/* record information will be held in here */
//	private $info;
//	
//	/* constructor */
//	function query($record_array) {
//		$this->info = $record_array;
//	}
//	
//	/* dynamic function server */
//	function __call($method,$arguments) {
//		$meth = $this->from_camel_case(substr($method,3,strlen($method)-3));
//		return array_key_exists($meth,$this->info) ? $this->info[$meth] : false;
//	}
//
//	function from_camel_case($str) {
//		$str[0] = strtolower($str[0]);
//		$func = create_function('$c', 'return "_" . strtolower($c[0]);');
//		return preg_replace_callback('/([A-Z])/', $func, $str);
//	}	
//}
//
//
?>