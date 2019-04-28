<?php
	class DataBase{
		protected $Db;
		
		protected function Connect(){
			$this->Db = new mysqli("localhost", "root", "", "php_105");
		}
		
		protected function Filter($data){
			return trim(strip_tags(mysqli_real_escape_string($this->Db, $data)));
		}
		
		public function Calculator($p, $v, $d){
			$p = $p-($p*$d)/100;
			$p = round($p+($p*$v)/100);
			return($p);
			}
	}
	
?>