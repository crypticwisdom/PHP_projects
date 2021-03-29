<?php 


class DB_class
{		
	public $connect;
	
	function __construct($host, $root, $password, $db_name)
	{
		$this->connect = new mysqli($host, $root, $password, $db_name);
		return $this->connect;
	}

	// execute all queries 

	public function execute($connection, $sql){
		return mysqli_query($connection, $sql);
	}
	
	// select statement 

	public function select($tablename, $query){
		$sql = "select * from $tablename $query";
		return $this->execute($this->connect, $sql);
		
	}

	//fetch statement 

	public function fetch($result, $data){
		$fetch = mysqli_fetch_array($result);
		if($fetch == true){
			return $fetch[$data];
		}else{
			return false;
		}
	}

	// insert statement 

	public function insert($tablename, $query){
		$sql = "insert into $tablename $query";
		return $this->execute($this->connect, $sql);
	}

	// update statement 

	protected function update($tablename, $query){
		$sql = "update $tablename set $query ";
		return $this->execute($this->connect, $sql);
	}


	// terminate connection 

	public function terminate(){
		return mysqli_close($this->connect);
	}
}