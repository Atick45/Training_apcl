<?php
   
   if(isset($_GET["page"])){
	   
	   $page=$_GET["page"];
	   
	   if($page==1){
		   
		 include("pages/role/add_role.php"); 
		   
	   }else if($page==2){
		   
		   include("pages/role/manage_role.php");
		  
	   }else if($page==3){
		   
		   include("pages/role/view_role.php");
		  
	   }else if($page==4){
		   
		   include("pages/user/add_user.php");
		  
	   }else if($page==5){
		   
		   include("pages/user/manage_user.php");
		  
	   }else if($page==6){
		   
		   include("pages/user/view_user.php");
		  
	   }else if($page==7){
		   
		   include("pages/uom/add_uom.php");
		  
	   }else if($page==8){
		   
		   include("pages/uom/manage_uom.php");
		  
	   }else if($page==9){
		   
		   include("pages/uom/view_uom.php");
		  
	   }else if($page==10){
		   
		   include("pages/product/add_product.php");
		  
	   }else if($page==11){
		   
		   include("pages/product/manage_product.php");
		  
	   }else if($page==12){
		   
		   include("pages/product/view_product.php");
		  
	   }else if($page==13){
		   
		   include("pages/purchase/add_purchase.php");
		  
	   }else if($page==14){
		   
		   include("pages/purchase/manage_purchase.php");
		  
	   }else if($page==15){
		   
		   include("pages/purchase/view_purchase.php");
		  
	   }else if($page==16){
		   
		   include("pages/production/bom.php");
		  
	   }else if($page==17){
		   
		   include("pages/production/stock.php");
		  
	   }else if($page==18){
		   
		   include("pages/production/build_work_order.php");
		  
	   }else if($page==19){
		   
		   include("pages/contact/add_contact.php");
		  
	   }else if($page==20){
		   
		   include("pages/contact/manage_contact.php");
		  
	   }else if($page==21){
		   
		   include("pages/contact/view_contact.php");
		  
	   }else if($page==22){
		   
		   include("pages/supplier/add_supplier.php");
		  
	   }else if($page==23){
		   
		   include("pages/supplier/manage_supplier.php");
		  
	   }else if($page==24){
		   
		   include("pages/supplier/view_supplier.php");
		  
	   }else if($page==25){
		   
		   include("pages/product_type/add_product_type.php");
		  
	   }else if($page==26){
		   
		   include("pages/product_type/manage_product_type.php");
		  
	   }else if($page==27){
		   
		   include("pages/product_type/view_product_type.php");
		  
	   }else if($page==28){
		   
		   include("pages/role/edite_role.php");
		  
	   }
	   
	   
   }else{
	   
       echo "Welcome to my feed book";
	   
	   
   }

?>