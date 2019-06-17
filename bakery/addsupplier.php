<link href="main/style.css" media="screen" rel="stylesheet" type="text/css" />
<a  href="supplier.php"><button class="btn btn-default btn-small" style="float: left;"> Back</button></a>
<form action="savesupplier.php" method="post">

	<center><h4> Add Supplier</h4></center>
	<hr>
	<div id="ac">
		
		<span>Supplier Name: </span><input type="text" style="width:265px; height:30px;" name="name" required/><br>
		<span>Supplier Contact: </span><input type="text" style="width:265px; height:30px;" name="contact" required/><br>
		<span>Supplier Email: </span><input type="text" style="width:265px; height:30px;" name="email" /><br>
		<span>Supply: </span><input type="text" style="width:265px; height:30px;" name="supply" required/><br>
		
		
		<div style="float:right; margin-right:10px;">
			<button class="btn btn-success btn-block btn-large" style="width:267px;">Save</button>
		</div>
	</div>
</form>