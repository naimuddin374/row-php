<?php
class Product extends DataBase {
	public $Id;
	public $Name;
	public $Price;
	public $Vat;
	public $Discount;
	public $Categoryid;
	public $Stock;
	public $Picture;

	function __construct() {
		$this->Connect();
	}
	
	public function Insert() {
		$sql = "insert into 
					    products(name, price, vat, discount, categoryid, stock, picture)
						values(
						'" . $this->Filter($this->Name) . "',
						'" . $this->Filter($this->Price) . "',
						'" . $this->Filter($this->Vat) . "',
						'" . $this->Filter($this->Discount) . "',
						'" . $this->Filter($this->Categoryid) . "',	
						'" . $this->Filter($this->Stock) . "',
						'" .$this->Filter($this->Picture)."'
					)";
		//echo($sql);
		if ( $this->Db->query( $sql ) ) {
			$this->Id = mysqli_insert_id($this->Db);
			return true;
		} else {
			//echo $this->Db->error;
			return false;
		}
	}

	public function View() {
		$sql = "select p.*, c.name as catname 
				from products p, category c 
				where p.categoryid = c.id 
				order by id desc";
		$sql = $this->Db->query( $sql );
		if ( mysqli_num_rows( $sql ) >= 0 ) {
			return ( $sql );
		} else {
			return ( false );
		}
	}
	
	public function Edit(){
		$sql = "select * from products where id = '".$this->Filter($this->Id)."'";
		$sql = $this->Db->query($sql);
		if(mysqli_num_rows($sql) >= 0){
			return($sql);
		}else
			return(false);
	}
	
	public function Update(){
		
		$sql = "update products set
			name = '".$this->Filter($this->Name)."',
			price = '".$this->Filter($this->Price)."',
			vat = '".$this->Filter($this->Vat)."',
			discount = '".$this->Filter($this->Discount)."',
			categoryid = '".$this->Filter($this->Categoryid)."',
			stock = '".$this->Filter($this->Stock)."',
			picture = '" .$this->Filter($this->Picture)."'
			
			where id = '".$this->Filter($this->Id)."' ";
		
		if($this->Db->query($sql))
			return(true);
		else
			return(false);
	}
	
	public function Delete(){
		$sql = "delete from products where id = '".$this->Filter($this->Id)."'";
		$sql = $this->Db->query($sql);
		if(mysqli_affected_rows($this->Db)){
			return(true);
		}else
			return(false);
	} 
}














?>