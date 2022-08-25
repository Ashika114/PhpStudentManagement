<HTML>
<HEAD>
<?php
  session_start();
  include("csslink.php");
  include('../class/datafunctions.php');
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: ../main/mainhome.php");
    exit;
}
?>

<?php
  $msg="";
  $df=new DataFunctions();

?>

<?php
        $countmsg=$df->getcount("select count(*) from chat");

?>

<style>
  .logo {
    background: rgb(255,204,0);
background: linear-gradient(0deg, rgba(255,204,0,1) 35%, rgba(255,255,255,1) 100%);
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;
}
#header .logo {
  font-size: 30px;
  margin: 0;
  padding: 0;
  line-height: 1;
  font-weight: 600;
  letter-spacing: 1px;
  text-transform: uppercase;
  font-family: "Poppins", sans-serif;
}
#header
{
  background: #50327c;
   position: fixed;
  top: 0;
  width: 100%;
  display: block;
  transition: top 0.3s;
  z-index: 997;
  padding: 5px 0;
  box-shadow: 0px 0 18px rgba(55, 66, 59, 0.08);
}

.nav-menu a {
  display: block;
  position: relative;
  color: white;
  transition: 0.3s;
  font-size: 14px;
  font-family: "Poppins", sans-serif;
  font-weight: 500;
}
.nav-menu a:hover, .nav-menu li:hover > a {
  color:  #FFCC00;
}

.dropdown-menu>li>a {
  display: block;
  padding: 3px 20px;
  clear: both;
  font-weight: 400;
  line-height: 1.42857143;
  color: #333;
  white-space: nowrap;
  font-size: 13px;
}
.dropdown-menu>li>a i {
  color: #1F1F1F;
}

.top-navbar .dropdown-menu{
min-width: 230px;
border-radius: 0 0 4px 4px;
border: 0;}
.top-navbar .dropdown-menu > li > a:hover, .top-navbar .dropdown-menu > li > a:focus{
color: #225081; 
background:none;
}
.dropdown-tasks{
width: 255px;
}
.dropdown-tasks .progress {
height: 8px;
margin-bottom: 8px;
overflow: hidden;
background-color: #f5f5f5;
border-radius: 0px;
}
.dropdown-tasks > li > a { 
padding: 0px 15px;
}
.dropdown-tasks p {
font-size: 13px;
line-height: 21px;
padding-top: 4px;
}
.dropdown-user li {
margin: 8px 0;
}
.dropdown-menu>li>a>strong {
  color: #0866C6;
  padding: 5px 0;
  display: inline-block;
  font-weight: 500;
ul.dropdown-menu.dropdown-messages li a div {
  padding: 2px 0;
}



</style>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'>
</script>
</HEAD>
<BODY>
   <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container-fluid d-flex align-items-center font-weight-bold custom ">

      
      <div class="logo mr-auto"><i class="fas fa-university"></i><a href="mainhome.php">&nbsp;SLATE</a></div>
      <nav class="nav-menu d-none d-lg-block">

        <ul>
          <li class="active"><a href="student_home.php">HOME</a></li>
          <li><a href="staff_table.php">STAFF</a></li>
          
          <li><a href="attendance_table.php">ATTENDANCE</a></li>
          <li><a href="leaveapp_table.php">LEAVE APP</a></li>
          <li><a href="activities_table.php">ACTIVITIES</a></li>
          

           <li class="drop-down"><a href="">ASSESSMENT</a>
            <ul>
                <li><a href="course_table.php">COURSES</a></li>
                <li><a href="subject_table.php">SUBJECT</a></li>
                <li><a href="document_table.php">COURSE MATERIAL (NOTES,ASSIGNMENT)</a></li>
                <li><a href="marksheet.php">MARKSHEET</a></li>
                <li><a href="classroom_table.php">CLASSROOM</a></li>
            </ul>
          </li>
         
          <li class="drop-down"><a href="">COMMUNICATION</a>
            <ul>
                <li><a href="email.php">EMAIL</a></li>
                <li><a href="message.php">MESSAGE</a></li>
                <li><a href="userlist.php">CHAT</a></li>
                 <li><a href="query_table.php">QUERY</a></li>
            </ul>
          </li>

          <li><a href="feedback.php">FEEDBACK</a></li>

         
         <li class="drop-down"><a href=""><i class="fas fa-envelope"></i><span class="badge badge-danger" style="border-radius:50%;position: relative; top: -10px; left: -10px; background:red;"><?php $countmsg ?></span></a>
            <ul>
                <li><a href="email.php">EMAIL</a></li>
                <li><a href="message.php">MESSAGE</a></li>
                <li><a href="userlist.php">CHAT</a></li>
                 <li><a href="query_table.php">QUERY</a></li>
            </ul>
          </li>

          <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" style="color:  #FFCC00;">
                        <i class="fa fa-user fa-fw"></i><?php echo $_SESSION['username'] ?>

                    </a>
                    <ul class="dropdown-menu dropdown-user" >
                        <li><a href="student_profile.php" style="color: black"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="change_password.php" style="color: black"><i class="fa fa-gear fa-fw"></i> Change password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php" style="color: black"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
          
         </ul> 

      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

<script>
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("header").style.top = "0";
  } else {
    document.getElementById("header").style.top = "-70px";
  }
  prevScrollpos = currentScrollPos;
}
</script>


</BODY>
</HTML>