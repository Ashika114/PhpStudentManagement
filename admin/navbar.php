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
                <div class="logo"><a class="navbar-brand" href="admin_home.php">SLATE ADMIN</a></div>
            </div>

                <li>

            <ul class="nav navbar-top-links navbar-right">

                <li>
                        <a href="admin_home.php">HOME</a>
                    </li>
                     <li>
                        <a href="addstudent.php">ADD STUDENT</a>
                    </li>
                     
                <li>
                        <a href="admission_table.php">ADMISSION</a>
                    </li>
                     
                     <li>
                        <a href="register_table.php">REGISTER</a>
                    </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" style="color:  #F09B22;">
                        <i class="fa fa-user fa-fw"></i><?php echo $_SESSION['username'] ?> <i class="fa fa-caret-down"></i>

                    </a>
                    <ul class="dropdown-menu dropdown-user">
                       
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>