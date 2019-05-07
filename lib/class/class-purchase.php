<?php

	class Purchase{
	
		private $supplier;
		private $added_on;
		private $product;
		private $qty;
		private $uom;
		private $price;
		private $total;
		
		public function __construct($_supplier,$_added_on,$_product,$_qty,$_uom,$_price,$_total){
			
			$this->supplier= $_supplier;
			$this->added_on= $_added_on;
			$this->product= $_product;
			$this->qty= $_qty;
			$this->uom= $_uom;
			$this->price= $_price;
			$this->total= $_total;
		}
		
		public static function view(){
			global $db;
			global $ext_new;
			$result = $db->query(" select inv.id,inv.reference_id,sup.name,p.name,dinv.qty,um.name,dinv.qty,inv.date,u.name,dinv.qty*dinv.qty from {$ext_new}purchase_invoice inv,{$ext_new}supplier sup,{$ext_new}product p,{$ext_new}purchase_invoice_details dinv,{$ext_new}uom um,{$ext_new}user u where inv.id=dinv.invoice_id and sup.id=inv.supplier_id and p.id=dinv.product_id and um.id=dinv.uom_id and u.id=inv.user_id ");
			
			echo "<table class='table table-border'>";
			echo "<tr>
					<th>ID</th>
					<th>Referance</th>
					<th>Supplier Name</th>					
					<th>Product</th>
					<th>Qty</th>
					<th>Uom</th>
					<th>Price</th>
					<th>Total</th>
					<th>Date</th>
					<th>Added By</th>
				</tr>";
			
			while(list($id,$ref,$sname,$proname,$qty,$uom,$price,$date,$added_by,$total)= $result->fetch_row()){
				echo "<tr>
						<td>$id</td>
						<td>$ref</td>
						<td>$sname</td>
						<td>$proname</td>
						<td>$qty</td>
						<td>$uom</td>
						<td>$price</td>
						<td>$date</td>
						<td>$added_by</td>
						<td>$total</td>
					</tr>";
				
			}
			
			echo "</table>";
		}

	}
?>