<?php 




class Product{
	
	private $name;
	private $product_type_id;
	private $uom_id;
	private $manufacturer;
	private $photo;
	private $description;
	
	public function __construct($_name,$_product_type_id, $_uom_id, $_manufacturer, $_photo, $_description){
		$this->name= $_name;
		$this->product_type_id= $_product_type_id;
		$this->uom_id= $_uom_id;
		$this->manufacturer= $_manufacturer;
		$this->photo= $_photo;
		$this->description= $_description;
	}
	
	public function valid(){
		
		
	}
	
	public function save(){
		global $db;
		global $ext_new;
		
		$db->query("insert into {$ext_new}product(name,product_type_id,uom_id,manufacturer,photo,description)values('$this->name','$this->product_type_id','$this->uom_id','$this->manufacturer','$this->photo','$this->description')");
		return $db->insert_id;
	}
		
	public static function delete($id){
		global $db;
		global $ext_new;
		$db->query("delete from {$ext_new}product where id='id'");
	}
	
	
	public static function show(){
		global $db;
		global $ext_new;
		$con_table=$db->query("select p.id,p.name,p.manufacturer,p.description,p.photo,pt.name,um.name from {$ext_new}product p,{$ext_new}product_type pt,{$ext_new}uom um where pt.id=p.product_type_id and um.id=p.uom_id");
		   
		echo "<table class='table'>";
		echo "<tr><th>Id</th><th>Name</th><th>Manufacturer</th><th>Description</th><th>Type</th><th>Uom</th><th>Image</th></tr>";
		   
		while(list($id,$pname,$manufacturer,$description,$photo,$ptype,$uname)=$con_table->fetch_row()){
			   
			   //$added_on=date("d M Y h:i A",strtotime($added_on));
			   
			echo "<tr>";
			
			 echo "<td>$id</td><td>$pname</td><td>$manufacturer</td><td>$description</td><td>$ptype</td><td>$uname</td><td><img src='img/$photo' height='50' /></td>";  
			 
			echo "</tr>";
		}
		   
		echo "</table>";
	}	
	
	public static function show_manage(){
		global $db;
		global $ext_new;
		$con_table=$db->query("select p.id,p.name,p.manufacturer,p.description,p.photo,pt.name,um.name,pt.id,um.id from {$ext_new}product p,{$ext_new}product_type pt,{$ext_new}uom um where pt.id=p.product_type_id and um.id=p.uom_id order by p.id desc");
		   
		echo "<table class='table'>";
		echo "<tr><th>Id</th><th>Name</th><th>Manufacturer</th><th>Description</th><th>Type</th><th>Uom</th><th>Image</th><th>Options</th></tr>";
		   
		while(list($id,$pname,$manufacturer,$description,$photo,$ptype,$uname,$ptid,$umid)=$con_table->fetch_row()){
			   
			   //$added_on=date("d M Y h:i A",strtotime($added_on));
			   
			echo "<tr>";
			
			 echo "<td>$id</td><td>$pname</td><td>$manufacturer</td><td>$description</td><td>$ptype</td><td>$uname</td><td><img src='img/$photo' height='50' /></td>";  
			 echo "<td>"; ?>
				<form action="#" style="display:inline-block;" method="post">
					<input type="hidden" name="pid" value="<?php echo $id ?> " />
					<input type="hidden" name="pname" value="<?php echo $pname ?> " />
					<input type="hidden" name="manufacturer" value="<?php echo $manufacturer ?> " />
					<input type="hidden" name="description" value="<?php echo $description ?> " />
					<input type="hidden" name="ptid" value="<?php echo $ptid ?> " />
					<input type="hidden" name="umid" value="<?php echo $umid ?> " />
					<input type="hidden" name="photo" value="<?php echo $photo ?> " />
					<input type="submit" name="btnedit" class="material-icons btn-primary" value="create" />
				</form>
				<form action="#" style="display:inline-block;" method="post">
					<input type="hidden" name="pid" value="<?php echo $id ?> " />
					<input type="submit" name="btndelte" class="material-icons btn-danger" value="delete" />
				</form>
			<?php
			 
			echo "</td></tr>";
		}
		   
		echo "</table>";
	}
	
	
	
	
	
	
}