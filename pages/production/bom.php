<?php
require_once("lib.php");
require_once("con_db.php");
?>
<?php
if(isset($_POST["btnSave"])){

    $ref_invoiceid= $_POST["txtInvoiceRef"];
    $product_type= $_POST["cmbProduct"];
    $unit=$_POST["cmbUom"];

    global $db;
    
    $db->query("insert into {$ext_new}bill_of_materials
    
    ");


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bill of Materials Cart</title>
</head>
<body>
<h3 class='text-center'>Create Bill Of Materials</h3>


<form action="#" class="table table-bordered" method="post">
    <div>
        <table class="table table-bordered">
        <tr><td>Serial number</td><td>Production Name</td><td>Qty</td><td>Price</td><td>Total</td></tr>
        <tr><td><input type="text" size="4" name="txtSId"/></td><td><input type="text" size="4" name="txtProduction_Name" /></td><td><input type="text" size="5" name="txtQty" /></td><td><input type="text" size="5" name="txtPrice" /></td><td><input type="submit" value="Add"  name="btnAdd"/></td></tr>
        
        </table>
    </div>
    <?php
    function getname(){
        global $db,$ext_new;

       
    }
        if(!isset($_SESSION['cart'])){

            $_SESSION['cart'] = array();
        }
        if(isset($_POST['btnAdd'])){

            $id=$_POST["txtSId"];
            $production_name=$_POST["txtProduction_Name"];
            $qty=$_POST["txtQty"];
            $price=$_POST["txtPrice"];
            $total=$price*$qty;


            add_item($id,$production_name,$qty,$price);
        }

        if(isset($_POST['btnRemove'])){
            $rid=$_POST['rid'];
            remove_item($rid);
    
        }

        print_cart();

    ?>

<hr/>
<div class="form-row align-items-center">
    <div class="col-auto">
    Referance Id
    <input type="text" name="txtInvoiceRef"/>
    </div>
    <div class="col-auto">
    Production Type
    
    <select name="cmbProduct">
    <?php
    $product_res= $db->query("select id,name from {$ext_new}product_type");
    while(list($pdid,$pdname)=$product_res->fetch_row()){

        echo "<option value='$pdid'>$pdname</option>";
    }
    ?>
    </select>
    </div>
    <div class="col-auto">
    Unit of Measurement
    <select name="cmbUom">
    <?php
    $product_res= $db->query("select id,name from {$ext_new}uom");
    while(list($updid,$updname)=$product_res->fetch_row()){

        echo "<option value='$updid'>$updname</option>";
    }
    ?>
    </select>
    </div>

    <input type="submit" class="btn btn-primary" name="btnSave" value="Save" />

</div>

</form> 
</body>
</html>
