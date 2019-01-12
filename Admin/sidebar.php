
 <?php
    require_once("../includes/db.php");
?>

 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
     


      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
<!--        <li class="header">MAIN NAVIGATION</li>-->
        <li>
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
          
        </li>
        <li>
          <a href="student_register.php">
            <i class="fa fa-user"></i>
            <span>Add Student</span>
            <span class="pull-right-container">
<!--              <span class="label label-primary pull-right">4</span>-->
            </span>
          </a>
          
        </li>
        <li>
          <a href="teacher_register.php">
            <i class="fa fa-user"></i>
            <span>Add Teacher</span>
            <span class="pull-right-container">
<!--              <span class="label label-primary pull-right">4</span>-->
            </span>
          </a>
          
        </li>
        <li>
          <a href="create_group.php">
            <i class="fa fa-user"></i>
            <span>Create Group</span>
            <span class="pull-right-container">
<!--              <span class="label label-primary pull-right">4</span>-->
            </span>
          </a>
          
        </li>
       
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Edit</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
<!--            <li><a href="#"><i class="fa fa-circle-o"></i>Teacher</a></li>-->
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Teacher
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
<!--                <li><a href="#"><i class="fa fa-circle-o"></i> inft</a></li>-->
                <li>
                  <a href="teacher_inft.php"><i class="fa fa-circle-o"></i>Inft</a>
                </li>
                <li>
                  <a href="teacher_cmpn.php"><i class="fa fa-circle-o"></i>Cmpn</a>
                </li>
                <li >
                  <a href="#"><i class="fa fa-circle-o"></i>Extc</a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i>Instrumental</a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i>Etrx</a>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Student
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
<!--                <li><a href="#"><i class="fa fa-circle-o"></i> inft</a></li>-->
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Inft
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>D5</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>D10</a></li>
                    <li><a href="student_inft_d15.php"><i class="fa fa-circle-o"></i>D15</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>D20</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Cmpn
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>c1</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>c2</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>c2</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>c2</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>c2</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>c2</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>c2</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>c2</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>c2</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>c2</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Extc
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>e1</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>e2</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Instrumental
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>i1</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>i2</a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Etrx
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>D5</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>D10</a></li>
                  </ul>
                </li>
              </ul>
            </li>
<!--            <li><a href="#"><i class="fa fa-circle-o"></i>Group</a></li>-->
             <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Group
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
<!--                <li><a href="#"><i class="fa fa-circle-o"></i> inft</a></li>-->
               <?php
                  
                 $query = 'SELECT * FROM group_name';
                                $select_group = mysqli_query($connection , $query);
                    
                                 while($row = mysqli_fetch_assoc($select_group)){
                                $group_id = $row['group_id'];
                                 $group_name= $row['group_name'];
                                 
                                 
                                  
                                     
                                     
                                    echo "<li>
                                        <a href='group_students.php?click={$group_id}&deletegroup={$group_id}&add={$group_id}'><i class='fa fa-circle-o'></i>$group_name</a>
                                    </li>"
                                        
                                        ?>
                                 
                                 <?php }  
                  
                  
                  
                  
                  
                  
                  
                  
                ?>
               
        
              </ul>
            </li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>