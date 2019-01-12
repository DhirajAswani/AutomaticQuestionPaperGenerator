<?php
//session_start();
require_once("../includes/db.php");
global $connection;
//$id=$_GET['id'];
$id=$_SESSION['student_id'];
   ?>

   <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Q</b>PG</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Vesit QP</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="notification.php?id=$id" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              
              <?php
                require_once("../includes/db.php");
                global $connection;
//                echo $_SESSION['student_id'];
//                $id=$_GET['id'];
                $query="select * from student where student_id=$id";
//                echo $query;
                $result_set = mysqli_query($connection,$query);
                $row=mysqli_fetch_assoc($result_set);
                $value=$row['notification_status'];
                $name = $row['student_name'];
                if($value !=0){
             echo  "<span class='label label-warning' >$value</span>";
                }
                
              ?>
              
            </a>
            <ul class="dropdown-menu">
              <li class="header"><?php echo "$value new papers have been shared with you"?></li>
<!--
              <li>
                
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
-->
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<!--              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
              <span class="hidden-xs"><?php echo $name ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="student_change_password.php" class="btn btn-default btn-flat">Change Password</a>
                </div>
                <div class="pull-right">
                  <form action="logout.php" method = "post">
                      <button class="btn btn-default btn-flat" name="logout">Logout</button>
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
