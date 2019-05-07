<?php 
require_once("lib.php");
require_once("con_db.php");
//$db=new mysqli('localhost','root','','feed_manufacture') or die("database not connected");
?>

<?php
  
  if(isset($_POST["btnSave"])){
	  
	  $supplier_id=  $_POST["cmbSupplier"];
	  $ref_invoiceid= $_POST["txtInvoiceRef"];
	  $month=$_POST["cmbMonth"];
	  $day=$_POST["cmbDay"];
	  $year=$_POST["cmbYear"];
	  
	  $user_id = $_SESSION["s_id"];
	  
	  
  
      if(checkdate($month,$day,$year)){
		   
		 $date_str=$year."-".$month."-".$day;	  
	     $purchase_date=date("Y-m-d H:i:s",strtotime($date_str));
	  
	     global $db;
		 $db->query("insert into {$ext_new}purchase_invoice(supplier_id, date, user_id,reference_id)value('$supplier_id','$purchase_date','$user_id','$ref_invoiceid')");
		 $invoice_id=$db->insert_id;
		 
		 foreach($_SESSION["cart"] as $row){	  
			$product_id=$row["id"];
			$qty=$row["qty"];
			$uom=$row["uom"];
			$price=$row["price"];
	   
			$uom_r=	$db->query("select id from {$ext_new}uom where name='$uom'");
			list($uom_id)=$uom_r->fetch_row();

			global $db;
			$db->query("insert into {$ext_new}purchase_invoice_details(invoice_id,product_id,qty,uom_id,price)value('$invoice_id','$product_id','$qty','$uom_id','$price')");
	   
		 }
     
	      unset($_SESSION["cart"]);
	      echo "Saved";
	  
	  }else{
		  
		  echo "Invalid Date";
	  }
  
  
  }

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Shopping Cart</title>
</head>

<body>
<h3 class='text-center'>Add Purchase</h3>
<form action="#" class="table table-bordered" method="post">
 
<div>
<table class="table table-bordered">
 <tr><td>Item</td><td>Qty</td><td>UoM</td><td>Price</td><td>Total</td></tr>
  <tr><td><select name="cmbProduct">
  
   <?php
      $item_result=$db->query("select id,name from {$ext_new}product");
	  
	  while(list($id,$name)=$item_result->fetch_row()){
		  echo "<option value='$id'>$name</option>";
	  }
	  
	?>
  
  </select></td><td><input type="text" size="4" name="txtQty" /></td><td><select name="cmbUoM"><option>Piece</option><option>Kg</option></select></td><td><input type="text" size="5" name="txtPrice" /></td><td><input type="submit" value="Add"  name="btnAdd"/></td></tr>
 
</table>
</div>



<?php
function getname($id){
	global $db,$ext_new;
	
	$row=$db->query("select name from {$ext_new}product where id='$id'");
	list($name)=$row->fetch_row();
	

	return $name;
}

	
	if(!isset($_SESSION['cart'])){
   		$_SESSION['cart'] = array();
	}
			
	if(isset($_POST['btnAdd'])){
			
			 $id=$_POST["cmbProduct"];
			 $product_name=getname($id);
			 $price=$_POST["txtPrice"];
			 $uom=$_POST["cmbUoM"];
			 $qty=$_POST["txtQty"];
			 $total=$price*$qty;
					 
		  		 
		add_item($id,$qty,$product_name,$price,$uom);
	}
	
	
	if(isset($_POST['btnRemove'])){
				$rid=$_POST['rid'];
				remove_item($rid);
		
	}
	
			
	 print_cart();		 
			
 
?>
<hr>
<div>
Invoice Id
<input type="text" name="txtInvoiceRef"/>
</div>
<div>
 Suppler<br><select name="cmbSupplier" class="custom-select">
    <?php
      $supplier_result=$db->query("select id,name from {$ext_new}supplier");
	  
	  while(list($sid,$sname)=$supplier_result->fetch_row()){
		  echo "<option value='$sid'>$sname</option>";
	  }
	  
	?>
 </select>
</div>
<div>
 Purchase Date<br/>
 <select name="cmbDay" class="custom-select">
  <option>DD</option>
 <?php
    for($i=1;$i<=31;$i++){
		echo "<option>$i</option>";
	}
 ?>
 </select>
 <select name="cmbMonth" class="custom-select">
 <option>MM</option>
 <?php
    
	$months=array(1=>"Jan",2=>"Feb",3=>"Mar",4=>"Apr",5=>"May",6=>"June",7=>"July",8=>"Aug",9=>"Sep",10=>"Oct",11=>"Nov",12=>"Dec");
   foreach($months as $key=>$value){
		echo "<option value='$key'>$value</option>";
	}
 ?>
 </select>
 <select name="cmbYear" class="custom-select">
   <option>YYYY</option>
    <?php
    for($i=date("Y")-5;$i<=date("Y")+5;$i++){
		echo "<option>$i</option>";
	}
   ?>
 </select>
</div>
<input type="submit" class="btn btn-primary" name="btnSave" value="Save" />

</form>


</body>
</html>