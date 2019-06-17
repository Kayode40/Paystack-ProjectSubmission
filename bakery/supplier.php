<html>
<head>
<title>
Suppliers
</title>
<?php
	//require_once('auth.php');
?>
 <link href="main/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="main/css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="main/css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="main/css/bootstrap-responsive.css" rel="stylesheet">


<link href="main/style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="main/src/jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="main/js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="main/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="main/lib/jquery.js" type="text/javascript"></script>
<script src="main/src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
</head>

 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>
<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
              <ul class="nav nav-list">
   <li class="active"><a href="#">Dashboard </a></li> 
			<li><a href="supplier.php"> Suppliers</a></li>
			<li><a href="payment.php" > Make Payment</a></li>
            <br><br><br><br><br>		
			<li>
			<div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Time: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
			</form>
			  </div>
			</li>
				
				</ul>     
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			Suppliers
			</div>
			<ul class="breadcrumb">
			<li><a href="home.php">Dashboard</a></li> /
			<li class="active">Suppliers</li>
			</ul>


<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="home.php"><button class="btn btn-default btn-large" style="float: left;"> Back</button></a>
<?php 
			include('config.php');
				$qry = "SELECT * FROM supplier ORDER BY supplier_id DESC";
				$result = mysqli_query($conn, $qry);
				$rowcount = mysqli_num_rows($result)
			?>
			<div style="text-align:center;">
			Total Number of Suppliers: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount;?></font>
			</div>
</div>
<a rel="facebox" href="addsupplier.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" />Add Supplier</button></a><br><br>


<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th> Supplier ID</th>
			<th> Supplier Name </th>
			<th> Contact No</th>
			<th> Email</th>
			<th> Item Supplying</th>
            <th> Delivery Status</th>
			<th width="120"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('config.php');
				$qry = "SELECT * FROM supplier ORDER BY supplier_id ASC";
				$result = mysqli_query($conn, $qry);
				for($i=0; $row = mysqli_fetch_assoc($result); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['supplier_id']; ?></td>
			<td><?php echo $row['supplier_name']; ?></td>
			<td><?php echo $row['supplier_contact']; ?></td>
			<td><?php echo $row['supplier_email']; ?></td>
            <td><?php echo $row['supply']; ?></td>
            <td><?php echo $row['delivery_status']; ?></td>
			<td><a rel="facebox" href="editsupplier.php?id=<?php echo $row['supplier_id']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a>
			<a href="#" id="<?php echo $row['supplier_id']; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button></a></td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
<div class="clearfix"></div>
</div>
</div>
</div>

<script src="main/js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Are you sure want to delete? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletesupplier.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>

</html>