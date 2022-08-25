<HTML>
<HEAD>
<?php
  session_start();
  include("csslink.php");
  include('../class/datafunctions.php');
?>

<?php
  $contactdate="";
  $name="";
  $details="";
  $contactno="";
  $emailid="";
  $response="";
  $df=new DataFunctions();

?>

<?php

if(isset($_POST['btnsubmit']))
{
   $contactdate=date('y-m-d');
   $name=$_POST['txtname'];
   $details=$_POST['txtmessage'];
   $contactno=$_POST['txtcontactno'];
   $emailid=$_POST['txtemail'];

     
          $query="insert into contactus(contactdate,name,details,contactno,emailid) values('$contactdate','$name','$details','$contactno','$emailid')";
          $result=$df->saveRecord($query);
          if($result)
          {
                echo '<script>alert("Your message has been sent. Thank you!")</script>'; 
          }
          else
         {
               echo '<script>alert("Message not sent")</script>'; 
         }

}

?>

</HEAD>
<BODY>

 <?php  include("menu.php"); ?>
  


 <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Contact Us</h2>
        <p>Need to get in touch? <br>We'd love to hear from you! Please fill out our form below and we'll contact you as soon as possible.   </p>
      </div>
    </div><!-- End Breadcrumbs -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed/v1/place?q=ssagrawal+navsari&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8" frameborder="0" allowfullscreen></iframe>
      </div>
      
      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Nr. Devina Park Society. <br>
              Gandevi Road, Navsari-396445 <br>
              Gujarat, India </p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>info@ssagrawal.org</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>02637-232667 / 232857</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="" method="post" name="frm">

              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="txtname" class="form-control"  placeholder="Your Name"  />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="txtemail"  placeholder="Your Email"  />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="txtcontactno"  placeholder="Contact Number" />
                <div class="validate"></div>

              </div>
              <div class="form-group">
                <textarea class="form-control" name="txtmessage" rows="5" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>

              <div class="text-center"><button type="submit"  name="btnsubmit" class="btn btn-success font-weight-bold" >Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
   

  <?php  include("footer.php"); ?>
<?php  include("jslink.php"); ?>
</BODY>
</HTML>