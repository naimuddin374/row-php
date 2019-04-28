<?php
	class Customers extends DataBase{
		public $Id;
		public $Name;
		public $Email;
		public $Password;
		public $Type;
		
		public function __construct(){
			$this->Connect();
		}
		public function Registration(){
			$sql = "insert into customer(name, email, password, type) 
					values(
						'".$this->Filter($this->Name)."',
						'".$this->Filter($this->Email)."',
						'".$this->Filter(md5($this->Password))."',
						'".$this->Filter($this->Type)."'
					)";
			if($this->Db->query($sql)){
				return(true);
			}else{
				return(false);
			}
		}
		public function Login(){
			$sql = "select * from customer where email = '".$this->filter($this->Email)."' and password = '".md5($this->Password)."'";
			
			$sql = $this->Db->query($sql);
			
			if(mysqli_num_rows($sql) > 0){
				while($data = mysqli_fetch_object($sql)){
					$this->Id = $data->id;
					$this->Type = $data->type;
				}
				return(true);
			}else{
				return(false);
			}
		}
	}
?>