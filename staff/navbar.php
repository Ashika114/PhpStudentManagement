<style type="text/css">
    .logo{
   
  font-size: 45px;
  line-height: 2;
  font-weight: 600;
  letter-spacing: 1px;
  text-transform: uppercase;
  font-family: "Poppins", sans-serif;

}

</style>

<nav class="navbar navbar-default top-navbar" role="navigation" style="font-weight: bold;">
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="logo"><a class="navbar-brand" href="staff_home.php">SLATE STAFF</a></div>
            </div>

                <li>

            <ul class="nav navbar-top-links navbar-right">

                <li>
                        <a href="staff_home.php">HOME</a>
                    </li>
                     
                <li>
                        <a href="attendance_table.php">ATTENDENCE</a>
                </li>
                     
                    <li>
                        <a href="query_table.php">QUERY</a>
                    </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" style="color:  #F09B22;">
                    <i class="fa fa-user fa-fw"></i><?php echo $_SESSION['username'] ?> <i class="fa fa-caret-down"></i> 

                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="staff.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="change_password.php"><i class="fa fa-gear fa-fw"></i>Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>