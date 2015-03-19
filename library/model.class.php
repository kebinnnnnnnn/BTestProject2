<?php
class Model extends SQLQuery 
{

	protected $_model;

	function __construct() {
		
    $this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$this->_model = get_class($this);
		$this->_table = strtolower($this->_model)."s";
	
  }

  public function select($columns){

    $sql = sprintf("SELECT %s FROM %s", 
                implode(',', $columns), 
                $this->_table);
    return $this->query($sql);

  }

  public function selectByCondition($fields,$columns,$values, $orderByField = "", $ascDesc = ""){

   		$sql = "";   		
      $values = $this->cleanDataInArray($values);
      if(count($values) == 1){

   			$sql = sprintf("SELECT %s FROM %s WHERE %s = '%s' ORDER BY %s %s", 
                         implode(',',$fields),
   				               $this->_table,
   				               $columns[0],
   				               $values[0],
                         $orderByField,
                         $ascDesc);
   		}

      else{

   			$cont = "";
        for($i = 0; $i < count($values);$i++){

   				if($cont != ""){

   					$cont .= " AND ";

   				}
   				$cont .= $columns[$i] . " = '" . $values[$i] . "'";

   			}
   			$sql = sprintf("SELECT %s FROM %s WHERE %s ORDER BY  %s %s", 
                            implode(',',$fields),
                            $this->_table,
                            $cont,
                            $orderByField,
                            $ascDesc);

   		}

   		$result = $this->query($sql);
      return $result;

  }
   
  public function insert($columns,$values){

   	$sql = "";
    $columnsSql = "";
		$valuesSql = "";
    $values = $this->cleanDataInArray($values);

    for($i = 0; $i < count($values);$i++){

			if($columnsSql != ""){

				$columnsSql .= ", ";

			}
      $columnsSql .= $columns[$i];
      if($valuesSql != ""){

				$valuesSql .= ", ";

			}
			$valuesSql .= "'". $values[$i]. "'";

		}

		$columnsSql = " ( " . $columnsSql . " ) ";
		$valuesSql =  " ( " . $valuesSql . " ) ";
		$sql = "INSERT INTO " . $this->_table . $columnsSql . " VALUES " . $valuesSql;
		$result = $this->query($sql);

    return $result;

  }

  public function update($columns, $values, $id){

   	$sql = 'UPDATE ' . $this->_table . ' SET ';
   	$cont = "";
    $values = $this->cleanDataInArray($values);
    for($i = 0; $i < count($values);$i++){
 
			if($cont != ""){

				$cont .= ", ";

			}
			$cont .= $columns[$i] . " = '" . $values[$i] . "'";

		}
   	$sql .= $cont . " WHERE id = '" . $id . "'";
    echo $sql;
    $result = $this->query($sql);


    return $result;

   }

  public function deleteById($id){

   	$sql = sprintf( "DELETE FROM %s WHERE id = '%s'", $this->_table, $id);
   	$result = $this->query($sql);

    return $result;

  }

  public function selectAllWithWhere($ordercolumn, $ascDesc) {

  	$sql = sprintf( "SELECT * FROM %s ORDER BY %s %s", 
                      $this->_table, 
                      $ordercolumn, 
                      $ascDesc);
  	return $this->query($sql);

  }

  public function cleanDataInArray($stringArray){

      $cleanArray = array();
      foreach ($stringArray as $value) {

        $stripped = strip_tags($value);
        array_push($cleanArray, mysql_real_escape_string($stripped));

      }
      
      return $stringArray;

  }


}
