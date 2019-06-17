<?php
    require('config.php');
	
	$id=$_GET['id'];
	$qry = "SELECT * from supplier WHERE supplier_id = '$id'";
	$result = mysqli_query($conn, $qry);
    $num = mysqli_num_rows($result);
 	for($i=0; $row = mysqli_fetch_assoc($result); $i++)
	{
		
		$get_name=$row['supplier_name'];
        $get_address=$row['supplier_email'];
		$get_contact=$row['supplier_contact'];
		$get_item=$row['supply'];
        $get_status=$row['delivery_status'];
		$get_amount=$row['Amount'];
}
?>

<link href="main/style.css" media="screen" rel="stylesheet" type="text/css" />
<a  href="supplier.php"><button class="btn btn-default btn-small" style="float: left;"> Back</button></a>
<form action="saveeditsupplier.php" method="post">

	<center><h4>Edit Supplier</h4></center><hr>
	
	<div id="ac">
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<span>Supplier Name : </span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $get_name; ?>" /><br>	
		<span>Email: </span><input type="text" style="width:265px; height:30px;" name="email" value="<?php echo $get_address; ?>" /><br>
		<span>Contact No: </span><input type="text" style="width:265px; height:30px;" name="contact" value="<?php echo $get_contact; ?>" /><br>
		<span>Item Supplied : </span><textarea style="width:265px; height:80px;" name="supply"><?php echo $get_item; ?></textarea><br>
		<span>Delivery Status : </span><input type="text" style="width:265px; height:30px;" name="status" value="<?php echo $get_status;?>" /><br>
		<span>Amount : </span><input type="text" style="width:265px; height:30px;" name="amount" value="<?php echo $get_amount;?>" /><br>
        <div style="float:right; margin-right:10px;">
			<button class="btn btn-success btn-block btn-large" style="width:267px;">Save Changes</button>
		</div>
	</div>

</form>


