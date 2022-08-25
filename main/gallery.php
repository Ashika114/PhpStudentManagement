<HTML>
<HEAD>
<?php
  session_start();
  include("csslink.php");
  include('../class/datafunctions.php');
?>

<?php
  $msg="";
  $df=new DataFunctions();

?>

<?php



?>

<style type="text/css">
  $bootstrap-sm: 576px;
$bootstrap-md: 768px;
$bootstrap-lg: 992px;
$bootstrap-xl: 1200px;


#gallery {
  
  img {
    height: 75vw;
    object-fit: cover;
    
    @media (min-width: $bootstrap-sm) {
      height: 35vw;
    }
    
    @media (min-width: $bootstrap-lg) {
      height: 18vw;
    }
  }
}


// Crop images in lightbox.
.carousel-item {
  
  img {
    height: 60vw;
    object-fit: cover;
    
    @media (min-width: $bootstrap-sm) {
      height: 350px;
    }
  }
}



* {
  transition: 0.3s;
}

#gallery.custom {
  padding: 0 15px;
  
  img {
    display: block;
    margin: 15px 0;
    border-radius: 300px 30px 300px 300px;
    
    &:hover {
      border-radius: 30px 90px 30px 30px;
    }
  }
}

#exampleModal.custom {
  .modal-content {
    background: none;
    border: none;
  }
  
  .modal-header {
    border:none;
    
    button {
      background: none;
      border-radius: 100px 100px 0 0;
      padding: 5px 10px;
      opacity: 1;
      position: relative;
      top: 3px;
      border: solid 2px white;
      
      @media (min-width: $bootstrap-lg) {
        top: 15px;
      }
      
      &:hover {
        top: 3px;
      }
    }
    
    span {
      color: white;
    }
  }
  
  .modal-body {
    padding: 0;
    border: none;
    position: relative;
    
    &::before, &::after {
      content: '';
      height: 50px;
      width: 50px;
      display: block;
      position: absolute;
      background: white;
      border-radius: 3px 10px;
      
      @media (min-width: $bootstrap-md) {
        border-radius: 3px 30px;
        height: 100px;
        width: 100px;
      }
    }
    
    &::before {
      top: -5px;
      left: -5px;
      
      @media (min-width: $bootstrap-md) {
        top: -15px;
        left: -15px;
      }
    }
    
    &::after {
      bottom: -5px;
      right: -5px;
      z-index: -1;
      
      @media (min-width: $bootstrap-md) {
        bottom: -15px;
        right: -15px;
      }
    }
  }
  
  .modal-footer {
    border: none;
    margin-top: 60px;
    
    @media (min-width: $bootstrap-lg) {
      margin-top: 40px;
    }
    
    .btn {
      margin: auto;
      border: solid 2px white;
      background: none;
      text-transform: uppercase;
      font-size: 0.8em;
      letter-spacing: 0.1em;
      font-weight: bold;
      padding: 0.2em 0.7em;
      
      &:hover {
        background: white;
        color: black;
      }
    }
  }
  
  .carousel-control-prev, .carousel-control-next {
    font-size: 2em;
    top: auto;
    opacity: 1;
    bottom: -52px;
    
    @media (min-width: $bootstrap-md) {
      top: 0;
      opacity: 0.5;
      bottom: 0;
    }
  }
  
  .carousel-control-next-icon,  .carousel-control-prev-icon {
    height: 30px;
    width: 30px;
  }
  
  .carousel-control-prev {
    @media (min-width: $bootstrap-md) {
      left: -90px;
    }
  }
  
  .carousel-control-next {
    @media (min-width: $bootstrap-md) {
      right: -90px;
    }
  }
  
  .carousel-indicators {
    bottom: -60px;
    
    @media (min-width: $bootstrap-lg) {
      bottom: -30px;
    }
    
    li {
      height: 30px;
      border-radius: 100px;
      background: none;
      border: solid 2px white;
      
      @media (min-width: $bootstrap-lg) {
        height: 10px;
      }
      
      &:hover {
        background: white;
      }
      
      &.active {
        background: white;
      }
    }
  }
}


/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.switch-wrap {
  text-align: center;
  background-color: #b1fbc1;
  padding: 30px;
  border-radius: 3px;
  margin: 30px 0 0;
  
  @media (min-width: $bootstrap-sm) {
    position: fixed;
    bottom: 0;
    display: flex;
    flex-direction: row-reverse;
    align-items: center;
    width: 100%;
    justify-content: center;
    padding: 10px;
  }
}

.switch-text {
  display: block;
  margin: 0.5em;
  
  @media (min-width: $bootstrap-sm) {
    margin: 0 1em 0 0;
  }
}

img{
  border: 2px groove;
  border-radius: 10px;
}

</style>

<script type="text/javascript">
    function switchStyle() {
  if (document.getElementById('styleSwitch').checked) {
    document.getElementById('gallery').classList.add("custom");
    document.getElementById('exampleModal').classList.add("custom");
  } else {
    document.getElementById('gallery').classList.remove("custom");
    document.getElementById('exampleModal').classList.remove("custom");
  }
}
</script>


</HEAD>
<BODY>

 <?php  include("menu.php"); ?>

 <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" style="margin-bottom: 10PX;
    " data-aos="fade-in">
      <div class="container">
        <h2>GALLERY</h2>
        <p>SLATE provides a simple interface for maintenance of student
information. It can be used by educational institutes or colleges to maintain the records of students easily </p>
      </div>
    </div><!-- End Breadcrumbs -->
  

<div class="row" id="gallery" style="padding: 20px;" data-toggle="modal" data-target="#exampleModal">
  <div class="col-12 col-sm-6 col-lg-3">
    <img class="w-100" src="assets/img/gallery/1.png" alt="First slide" data-target="#carouselExample" data-slide-to="0">
  </div>
  <div class="col-12 col-sm-6 col-lg-3">
    <img class="w-100" src="assets/img/gallery/2.jpg" alt="First slide" data-target="#carouselExample" data-slide-to="1">
  </div>
  <div class="col-12 col-sm-6 col-lg-3">
    <img class="w-100" src="assets/img/gallery/3.jpg" alt="First slide" data-target="#carouselExample" data-slide-to="2">
  </div>
  <div class="col-12 col-sm-6 col-lg-3">
    <img class="w-100" src="assets/img/gallery/4.jpg" data-target="#carouselExample" data-slide-to="3">
  </div>
   <div class="col-12 col-sm-6 col-lg-3" style="margin-top: 20px;">
    <img class="w-100" src="assets/img/gallery/12.jpg" alt="First slide" data-target="#carouselExample" data-slide-to="0">
  </div>
  <div class="col-12 col-sm-6 col-lg-3" style="margin-top: 20px;">
    <img class="w-100" src="assets/img/gallery/6.jpg" alt="First slide" data-target="#carouselExample" data-slide-to="1">
  </div>
  <div class="col-12 col-sm-6 col-lg-3" style="margin-top: 20px;">
    <img class="w-100" src="assets/img/gallery/11.jpg" alt="First slide" data-target="#carouselExample" data-slide-to="2">
  </div>
  <div class="col-12 col-sm-6 col-lg-3" style="margin-top: 20px;">
    <img class="w-100" src="assets/img/gallery/8.jpg" data-target="#carouselExample" data-slide-to="3">
  </div>
</div>

<!-- Modal -->
<!-- 
This part is straight out of Bootstrap docs. Just a carousel inside a modal.
-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="carouselExample" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExample" data-slide-to="1"></li>
            <li data-target="#carouselExample" data-slide-to="2"></li>
            <li data-target="#carouselExample" data-slide-to="3"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="assets/img/gallery/1.png" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="assets/img/gallery/2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="assets/img/gallery/3.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="assets/img/gallery/4.jpg" alt="Fourth slide">
            </div>

             <div class="carousel-item">
              <img class="d-block w-100" src="assets/img/gallery/12.jpg" alt="Fourth slide">
            </div>
             <div class="carousel-item">
              <img class="d-block w-100" src="assets/img/gallery/6.jpg" alt="Fourth slide">
            </div>
             <div class="carousel-item">
              <img class="d-block w-100" src="assets/img/gallery/11.jpg" alt="Fourth slide">
            </div>
             <div class="carousel-item">
              <img class="d-block w-100" src="assets/img/gallery/8.jpg" alt="Fourth slide">
            </div>
          </div>

          <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




  <?php  include("footer.php"); ?>
<?php  include("jslink.php"); ?>
</BODY>
</HTML>