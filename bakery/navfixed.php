 <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#"><b>IBRAHIM BAKERY</b></a>
          <div class="nav-collapse collapse">
            <ul class="nav pull-right">
              <li><a> Welcome:<strong> <?php echo $_SESSION['SESS_USER_ID'];?></strong></a></li>
			 <li><a></i>
								<?php
								$Today = date('y:m:d',time());
								$new = date('l, F d, Y', strtotime($Today));
								echo $new;
								?>

				</a></li>
              <li><a href="index.php"><font color="red"></font> Log Out</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	