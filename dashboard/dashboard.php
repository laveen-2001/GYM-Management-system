
<?php include('header.php');?>
  <body class="skin-blue">
    <div class="wrapper">
      
      <?php include('menu.php');?>
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
        <?php
          $dbhost = 'localhost';
                       $dbuser = 'root';
                       $dbpass = '';

                       $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
                           
                        mysqli_select_db($conn,'fitness_club');
            require_once 'db.php';
             $sql = 'SELECT COUNT(*) as total FROM users';
             $sql1 = 'SELECT COUNT(*) as total FROM trainer';
             $sql2 = 'SELECT SUM(package_price) AS Total FROM users join package p on p.package_id = users.user_package';
             $retval = mysqli_query($conn, $sql);
             $retval1 = mysqli_query($conn, $sql1);
             $retval2 = mysqli_query($conn, $sql2);
             
             if(! $retval ) {
                die('Could not get data: ' . mysql_error());
           }?>
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <?php  while($row = mysqli_fetch_array($retval2)) {  ?>
                  <h3><?php print_r($row['Total']); ?></h3>
                  <?php } ?>
                  <p>Total Sell</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="report-list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">

                  <?php  while($row = mysqli_fetch_array($retval)) {  ?>
                  <h3><?php echo count($row); ?></h3>
                  <?php } ?>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="user-list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <?php  while($row = mysqli_fetch_array($retval1)) {  ?>
                  <h3><?php echo count($row); ?></h3>
                  <?php } ?>
                  <p>Trainer
                  </p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="trainer-list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
           
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">

            

            </section><!-- right col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     <?php include('footer.php');?>