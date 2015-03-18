<?php
class Model extends SQLQuery 
{

	protected $_model;

	function __construct() {
		$this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$this->_model = get_class($this);
		$this->_table = strtolower($this->_model)."s";
	}

   public function selectByCondition($columns,$values)
   {


   		$sql = "";

   		if(count($values) == 1)
   		{

   			$sql = "SELECT * FROM " . $this->_table . " WHERE " . $columns[0] . " = '" . $values[0] . "'";
   			// $sql = sprintf("SELECT * FROM %s WHERE %s = '%s'",
   			// 	$this->_table,
   			// 	$columns[0],
   			// 	$values[0]
   			// );
   		}

   		else
   		{

   			$cont = "";

   			for($i = 0; $i < count($values);$i++)
   			{

   				if($cont != "")
   				{

   					$cont .= " AND ";

   				}

   				$cont .= $columns[$i] . " = '" . $values[$i] . "'";

   				

   			}

   			$sql = "SELECT * FROM " . $this->_table . " WHERE " . $cont;

   		}

     // var_dump($sql);

   		$result = $this->query($sql);

      return $result;

   }
   
   public function insert($columns,$values)
   {

   		$sql = "";

		$columnsSql = "";
		$valuesSql = "";

		for($i = 0; $i < count($values);$i++)
		{

			if($columnsSql != "")
			{

				$columnsSql .= ", ";

			}

			$columnsSql .= $columns[$i];

			if($valuesSql != "")
			{

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

   public function update($columns, $values, $id)
   {

   		$sql = 'UPDATE ' . $this->_table . ' SET ';

   		$cont = "";

		for($i = 0; $i < count($values);$i++)
		{
 
			if($cont != "")
			{

				$cont .= ", ";

			}

			$cont .= $columns[$i] . " = '" . $values[$i] . "'";

			

		}
   		
		$sql .= $cont . " WHERE id = '" . $id . "'";

		$result = $this->query($sql);


        return $result;

   }

   public function deleteById($id)
   {

   		$sql = sprintf( "DELETE FROM %s WHERE id = '%s'", $this->_table, $id);
   		$result = $this->query($sql);

        return $result;

   }

   function selectAllWithWhere($ordercolumn, $ascDesc) 
    {

    	$sql = sprintf( "SELECT * FROM %s ORDER BY %s %s", $this->_table, $ordercolumn, $ascDesc);
    	return $this->query($sql);

    }

}
