<?php
	class Category extends DataBase{
		public $Id;
		public $Name;
		
		public function __construct(){
			$this->Connect();
		}
		public function View(){
			$sql = "select * from category order by name asc";
			$sql = $this->Db->query($sql);
			if(mysqli_num_rows($sql)){
				return($sql);
			}else{
				return(false);
			}
		}
	}
?>