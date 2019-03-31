<?php

include "server_vars.php";

class Database
{
	private $mysqli;
	private $results;
	
	function __construct($hostname, $username, $password, $dbname)
	{
		//constructor to instantiate a new db. All db related crap will happen with $mysqli.
		$mysqli = new mysqli($hostname, $username, $password, $dbname);
	}
	
	function select($table, $fields, $where, $condition_fields, $condition_values)
	{
		$query = "SELECT ";
		for($i=0;$i<count($fields);$i++)
		{
			$query .= $fields[$i] . " ";
		}
		$query .= "FROM " . $table . "";
		if($where == 1)
		{
			$query .= " WHERE ";
			for($i=0;$i<count($condition_fields);$i++)
			{
				$query .= $condition_fields[$i];
				$query .= "=?"
				if(($i+2) != count($condition_fields))
				{
					$query .= " AND ";
				}
				else
				{
					break;
				}
			}
			$query .= $condition_fields[$i+1];
		}
		if($q1 = $mysqli->prepare($query))
		{
			$mysqli = 
		}
	}
}

?>
