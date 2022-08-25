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
  font-size: 15px;
  font-family: "Poppins", sans-serif;
  font-weight: 500;
}
.nav-menu a:hover, .nav-menu li:hover > a {
  color:  #FFCC00;
}

.get-started-btn {
  margin-left: 22px;
  background: #FFCC00;
  color: black;
  border-radius: 50px;
  padding: 8px 25px;
  white-space: nowrap;
  transition: 0.3s;
  font-size: 14px;
  display: inline-block;
}

.get-started-btn:hover {
  background: #FFCC00;
  color: black;
}

.about .content ul i {
  font-size: 20px;
  padding-right: 4px;
  color:  #FFCC00;
}

.about .content .learn-more-btn {
  background:  #FFCC00c7;
  color: black;
  border-radius:50px;
  padding: 8px 25px 9px 25px;
  white-space: nowrap;
  transition: 0.3s;
  font-size: 14px;
  display: inline-block;
  font-weight: bold;
}

.about .content .learn-more-btn:hover {
  background:  #FFCC00;
  color: black;
  font-weight: bold;
}

.why-us .content {
  padding: 30px;
  background: ##7fbb90;
  border-radius: 4px;
  color: black;
}



</style>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'>
</script>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container-fluid d-flex align-items-center font-weight-bold custom ">

      
      <div class="logo mr-auto"><i class="fas fa-university"></i><a href="mainhome.php">&nbsp;SLATE</a></div>
      <nav class="nav-menu d-none d-lg-block">

        <ul style="margin-left: 200px;">
          <li class="active"><a href="mainhome.php">HOME</a></li>
          <li><a href="aboutus.php">ABOUT</a></li>
          <li><a href="gallery.php">GALLERY</a></li>
          <li><a href="course.php">COURSES</a></li>
          <li><a href="contactus.php">CONTACT</a></li>
          
         </ul> 

      </nav><!-- .nav-menu -->


	      <a href="register.php" class="get-started-btn" style="margin-left: 170px;" >SIGN UP</a>
	      <a href="login.php" class="get-started-btn">LOGIN</a>

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
