<?php
class DBMysql 
{
	private $conn;
	private $array;
	public function __construct()
	{
		$this->array=array();
		$this->connect();
	}
	private function connect()
	{
		try{
			$this->conn = new PDO("mysql:host=localhost;dbname=store","root","");	
		}
		catch(PDOException $e){
			echo "Failaure :",$e->getMessage();
		}
	}
	protected function select(){
		try{
			$this->array= func_get_args();
			$this->result=$this->conn->prepare($this->array[0]);
			if(isset($this->array[1])){
				$this->result->execute($this->array[1]);	
			}
			else{
				$this->result->execute();	
			}
			return $this->result->fetch();			
		}
		catch(PDOException $e){
			echo "Failaure:",$e->getMessage();
		}
		
	}
	protected function insert(){
		try{
			$this->array= func_get_args();
			$this->conn->prepare($array[0]);
			if(isset($this->array[1])){
				$this->result->execute($this->array[1]);	
			}
			else{
				$this->result->execute();	
			}
		}
		catch(PDOException $e){
			echo "Failaure:",$e->getMessage();
		}
	}
	protected function update(){
		try{
			$this->array= func_get_args();
			$this->conn->prepare($array[0]);
			if(isset($this->array[1])){
				$this->result->execute($this->array[1]);	
			}
			else{
				$this->result->execute();	
			}
		}
		catch(PDOException $e){
			echo "Failaure:",$e->getMessage();
		}
	}
	protected function delete(){
		try{
			$this->array= func_get_args();
			$this->conn->prepare($array[0]);
			if(isset($this->array[1])){
				$this->result->execute($this->array[1]);	
			}
			else{
				$this->result->execute();	
			}
		}
		catch(PDOException $e){
			echo "Failaure:",$e->getMessage();
		}
	}

}
class DBMani extends DBMysql {
	private $row;
	private $obj_Mysql;
	public function __construct(){
		$this->obj_Mysql = new DBMysql();
		$this->row = array();
		$this->row = $this->obj_Mysql->select('select * from product where product_id=:pid',array(':pid'=>3));
		$this->fetch_data();
	}
	protected function fetch_data(){
		echo $this->row[1];
	}

}

$obj= new DBMani();


?>
