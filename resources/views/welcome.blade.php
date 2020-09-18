<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Meta Including Start -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- End of Meta Including -->

	<!-- Title Start -->
	<title>Home | LewongQ</title>
	<!-- End of Title -->

	<!-- CSS and JavaScript Including File -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <!-- End of Including File -->
<style>
  body{
    background-color: #A8CBFF;
    color: white;;
    font-family: Montserrat;
  }
  

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
    ul li{
        margin-right: 10px;
    }
   .card{
     left: 15px;
     background-color: #4093FB;
     box-shadow: #67A9FB  8px 0 7px;
   }
   .icon-card{
     font-size: 80px;
   }
   .card-text{
     font-size: 14px;
   }
   .big-icon{
    font-size: 70px;
   }
   .number-count{
    font-size: 21px;
    margin-top: -15px;
   }
   .text-count{
    font-size: 17px;
    margin-top: -10px;
    font-weight: bold;
   }
   .copyright {
    float: left;
}

.social { 
    float: right;
    margin-right: 10px;
}
.footer-title{
  font-weight: bold;
}
.sub-account{
  margin-bottom: 5px;
}
.sub-account a{
  color: white;
}
.img-google {
  margin-left: -7px;
  width: 120px;
}

.img-apple {
  width: 105px;
}

</style>
</head>

<body>

	<!-- Header Start -->

                
         
      <nav class="navbar navbar-expand-lg navbar-light navbar-dark fixed-top" style="background-color: #2E86DE;">
        <div class="container">
            <a href="{{ route('index') }}" class="navbar-brand d-flex align-items-center">
            <img src="{{asset('images/websites/Logo_VeCo.png') }}" alt="Logo" style="width:40px;">
                <strong class="ml-2">VeCo</strong>
            </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Dashboard </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#" style="color:#F3F8FF">Developer</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#" style="color:#F3F8FF">Project</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#" style="color:#F3F8FF">About Us</a>
                </li>
          </ul>
          <!-- <form class="form-inline my-2 my-lg-0">
            <a class="btn btn-sm my-2 btn-info my-sm-0" type="submit" style="background-color: #67A9FB; width: 100px;"><i class="fa fa-user"></i> Account</a>
        </form> -->
        <div class="dropdown my-2 my-lg-0">
          <a class="btn btn-sm my-2 btn-info my-sm-0 dropbtn" type="submit" style="background-color: #67A9FB; width: 100px;"><i class="fa fa-user"></i> Account</a>
          <div class="dropdown-content">
            <a href="#">Company</a>
            <a href="#">Developer</a>
          </div>
        </div>
        </div>
        </div>
      </nav> 
    <!-- End of Header -->

      <div class="scroll" id="home"></div>
      <div class="container-fluid" style="margin-top:100px ;">
        <div class="row">
          <div class="col-2"></div>
          <div class="col-4" style="top: 100px; left: -30px;  font-size: 17px;">
           
            <h1>Work With Us</h1>
            <br>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
          </div>
          <div class="col-6" style="padding-right: 0; top: -100px;">
            <img src="{{asset('images/websites/Group 2.png') }}" width="100%" alt="">
           

          </div>
          <!-- <div class="col-6" style="margin-left: 7px; top: -5px;">
            <img src="assets/img/Group 1.png" width="100%" alt="">
          </div> -->
        </div>
      </div>
      
      <div class="container">
        <center>
          <h1>Work With Us</h1>
        </center>
        <br>
        <div class="row">
          <div class="col-4">
            <div class="card" style="width: 20rem;">
             <center>
              <div class="card-body" style="padding: 60px 30px">
                <i class="fa fa-trophy icon-card"></i>
                <br>
                <br>
                <h3 class="card-title">Best Project</h3>
                <br>
                <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              </div>
            </center>
            </div>
          </div>
          <div class="col-4">
            <div class="card" style="width: 20rem;">
              <center>
               <div class="card-body" style="padding: 60px 30px">
                 <i class="fa fa-trophy icon-card"></i>
                 <br>
                 <br>
                 <h3 class="card-title">Best Project</h3>
                 <br>
                 <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
               </div>
             </center>
             </div>
          </div>
          <div class="col-4">
            <div class="card" style="width: 20rem;">
              <center>
               <div class="card-body" style="padding: 60px 30px">
                 <i class="fa fa-trophy icon-card"></i>
                 <br>
                 <br>
                 <h3 class="card-title">Best Project</h3>
                 <br>
                 <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
               </div>
             </center>
             </div>
          </div>
        </div>
      </div>
      <br>
      <br>
      <div class="" style="background-color: #4093FB; padding: 10px;">
        <center><h3 style="font-weight: bold;">Login Now</h3>
        <div class="container login-banner" style="text-align: center; padding: 10px 0;">
          <!-- <div class="container"> -->
            <div class="row">
              <div class="col-4"></div>
              <div class="col-4">
                <div class="container-fluid" >
                  <div class="row">
                    <div class="col-5">
          <a class="btn btn-md my-2 btn-info my-sm-0" type="submit" style="background-color: #67A9FB; padding: 5px 13px;"><i class="fa fa-building"></i> Company</a>
        </div>
        <div class="col-3">
          <h2 style="">&nbsp;|</h2>
          </div>
          <div class="col-4">
            <a class="btn btn-md my-2 btn-info my-sm-0" type="submit" style="background-color: #67A9FB;width: 120px; padding: 5px 13px;"><i class="fa fa-user"></i> Developer</a>
          </div>
        </div>
        </div>
          </div>
          <div class="col-4"></div>
        <!-- </div> -->
        </div>
      </div>
      </center>
      </div>
      <br>
      <br>
      <br>

      <div class="container">
        <center>
          <h1>Developers</h1>
        </center>
        <br>
        <div class="row">
          <div class="col-4">
            <div class="card" style="padding: 10px;">
              <div class="card-body">
                <div class="row">
                  <div class="col-4">
                    <img src="https://robohash.org/68.186.255.198.png" alt="" class="mx-auto rounded-circle img-fluid" style="border: black solid 1px;">
                  </div>
                  <div class="col-8" style="font-size: 16px; ">
                    <h4>Bara Laily M</h4>
                    <p>5.0 / 5.0</p>
                    <p>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                    </p>
                  </div>
                </div>
                <div>
                  <h5 class="card-title">About</h5>
                </div>
                <div style="font-size: 14px;">
                  <p class="cart-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
              </div>
              <br>
              <br>
              <div class="card-footer" style="background-color: #4093FB; border: 0px;">
                <div class="row">
                  <div class="col-3"></div>
                  <div class="col-4">
                    <a class="btn btn-sm  text-light" type="submit" style="width:100px; background-color:#47C363 "><i class="fa fa-eyes"></i> Details</a>
                  </div>
                  <div class="col-2">
                    <a class="btn btn-sm btn-danger text-light" type="submit" style="width:100px; background-color: #FC544B;"><i class="fa fa-user"></i> Hire</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card" style="padding: 10px;">
              <div class="card-body">
                <div class="row">
                  <div class="col-4">
                    <img src="https://robohash.org/68.186.255.198.png" alt="" class="mx-auto rounded-circle img-fluid" style="border: black solid 1px;">
                  </div>
                  <div class="col-8" style="font-size: 16px; ">
                    <h4>Bara Laily M</h4>
                    <p>5.0 / 5.0</p>
                    <p>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                    </p>
                  </div>
                </div>
                <div>
                  <h5 class="card-title">About</h5>
                </div>
                <div style="font-size: 14px;">
                  <p class="cart-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
              </div>
              <br>
              <br>
              <div class="card-footer" style="background-color: #4093FB; border: 0px;">
                <div class="row">
                  <div class="col-3"></div>
                  <div class="col-4">
                    <a class="btn btn-sm  text-light" type="submit" style="width:100px; background-color:#47C363 "><i class="fa fa-eyes"></i> Details</a>
                  </div>
                  <div class="col-2">
                    <a class="btn btn-sm btn-danger text-light" type="submit" style="width:100px; background-color: #FC544B;"><i class="fa fa-user"></i> Hire</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="card" style="padding: 10px;">
              <div class="card-body">
                <div class="row">
                  <div class="col-4">
                    <img src="https://robohash.org/68.186.255.198.png" alt="" class="mx-auto rounded-circle img-fluid" style="border: black solid 1px;">
                  </div>
                  <div class="col-8" style="font-size: 16px; ">
                    <h4>Bara Laily M</h4>
                    <p>5.0 / 5.0</p>
                    <p>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                    </p>
                  </div>
                </div>
                <div>
                  <h5 class="card-title">About</h5>
                </div>
                <div style="font-size: 14px;">
                  <p class="cart-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
              </div>
              <br>
              <br>
              <div class="card-footer" style="background-color: #4093FB; border: 0px;">
                <div class="row">
                  <div class="col-3"></div>
                  <div class="col-4">
                    <a class="btn btn-sm  text-light" type="submit" style="width:100px; background-color:#47C363 "><i class="fa fa-eyes"></i> Details</a>
                  </div>
                  <div class="col-2">
                    <a class="btn btn-sm btn-danger text-light" type="submit" style="width:100px; background-color: #FC544B;"><i class="fa fa-user"></i> Hire</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
      
      <div class="" style="background-color: #4093FB; padding: 10px;">
        <div class="container">
          <div class="row" style="text-align: center;">
            <div class="col-3">
              <p class="big-icon"><i class="fa fa-building"></i></p>
              <p class="number-count">200+</p>
              <p class="text-count">Companies</p>
            </div>
            <div class="col-3">
              <p class="big-icon"><i class="fa fa-code"></i></p>
              <p class="number-count">200+</p>
              <p class="text-count">Companies</p>
            </div>
            <div class="col-3">
              <p class="big-icon"><i class="fa fa-television"></i></p>
              <p class="number-count">200+</p>
              <p class="text-count">Companies</p>
            </div>
            <div class="col-3">
              <p class="big-icon"><i class="fa fa-check-square-o"></i></p>
              <p class="number-count">200+</p>
              <p class="text-count">Companies</p>
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
      <br>
      <br>

      <div class="container">
        <center>
          <h1>Developers</h1>
        </center>
        <br>
        <div class="row">
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="card" style="height:100%">
              <div class="card-body">
                <div class="row">
                <div class="col-4 col-sm-4"> 
                  <img src="https://robohash.org/68.186.255.198.png" alt="" class="mx-auto rounded-circle img-fluid" style="border: black solid 1px;">
                </div>
                <div class="col-8 col-sm-8">
                  <h4 class="title-card">Bara Corp</h4>
                  <p class="date_card" style="font-size: 15px;"><i class="fa fa-clock-o"></i> 06/08/2020</p>
                </div>
                </div>
                <!-- <div class="row" style="margin-top:50px;"> -->
                  <div class="" style="margin-top:40px;">
                    <center><h5>Mobile App Design</h5></center>
                    <ul style="margin-top:20px;">
                      <li style="margin: 10px 0px;">Requirement 1</li>
                      <li style="margin: 10px 0px;">Requirement 1</li>
                      <li>Requirement 1</li>
                    </ul>
                    </div>
                <!-- </div> -->
              </div>
              <div class="footer-card row" style=" padding: 10px;">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-5" style="font-size: 15px; margin-top: 5px;">
                  <p><i class="fa fa-desktop"></i> 0 Applicants</p>
                </div>
                <div class="col-lg-4">
                  <a class="btn btn-sm text-light" type="submit" style="width:100%; background-color: #47C363;"><i class="fa fa-user"></i> Details</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="card" style="height:100%">
              <div class="card-body">
                <div class="row">
                <div class="col-4 col-sm-4"> 
                  <img src="https://robohash.org/68.186.255.198.png" alt="" class="mx-auto rounded-circle img-fluid" style="border: black solid 1px;">
                </div>
                <div class="col-8 col-sm-8">
                  <h4 class="title-card">Bara Corp</h4>
                  <p class="date_card" style="font-size: 15px;"><i class="fa fa-clock-o"></i> 06/08/2020</p>
                </div>
                </div>
                <!-- <div class="row" style="margin-top:50px;"> -->
                  <div class="" style="margin-top:40px;">
                    <center><h5>Mobile App Design</h5></center>
                    <ul style="margin-top:20px;">
                      <li style="margin: 10px 0px;">Requirement 1</li>
                      <li style="margin: 10px 0px;">Requirement 1</li>
                      <li>Requirement 1</li>
                    </ul>
                    </div>
                <!-- </div> -->
              </div>
              <div class="footer-card row" style=" padding: 10px;">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-5" style="font-size: 15px; margin-top: 5px;">
                  <p><i class="fa fa-desktop"></i> 0 Applicants</p>
                </div>
                <div class="col-lg-4">
                  <a class="btn btn-sm text-light" type="submit" style="width:100%; background-color: #47C363;"><i class="fa fa-user"></i> Details</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="card" style="height:100%">
              <div class="card-body">
                <div class="row">
                <div class="col-4 col-sm-4"> 
                  <img src="https://robohash.org/68.186.255.198.png" alt="" class="mx-auto rounded-circle img-fluid" style="border: black solid 1px;">
                </div>
                <div class="col-8 col-sm-8">
                  <h4 class="title-card">Bara Corp</h4>
                  <p class="date_card" style="font-size: 15px;"><i class="fa fa-clock-o"></i> 06/08/2020</p>
                </div>
                </div>
                <!-- <div class="row" style="margin-top:50px;"> -->
                  <div class="" style="margin-top:40px;">
                    <center><h5>Mobile App Design</h5></center>
                    <ul style="margin-top:20px;">
                      <li style="margin: 10px 0px;">Requirement 1</li>
                      <li style="margin: 10px 0px;">Requirement 1</li>
                      <li>Requirement 1</li>
                    </ul>
                    </div>
                <!-- </div> -->
              </div>
              <div class="footer-card row" style=" padding: 10px;">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-5" style="font-size: 15px; margin-top: 5px;">
                  <p><i class="fa fa-desktop"></i> 0 Applicants</p>
                </div>
                <div class="col-lg-4">
                  <a class="btn btn-sm text-light" type="submit" style="width:100%; background-color: #47C363;"><i class="fa fa-user"></i> Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
      <div class="scroll" id="footer" style="background-color:#4093FB ;">
       
<!-- Footer -->
<footer class="page-footer font-small unique-color-dark">

  

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5" style="padding-top: 30px;">
    <div class="row mt-3">
      <div class="col-md-6 col-lg-7 col-xl-6 mx-auto mb-4 d-flex align-items-center">
        <img src="{{ asset('images/websites/Logo_VeCo.png') }}" class="img-responsive" style="width: 12%">
            <strong class="ml-3" style="font-size: 35px;">VeCo</strong>
      </div>
      <div class="col-md-6 col-lg-5 mx-auto mb-4">
        <div class="row">
          <div class="col-4">
            <h6 class="footer-title">Account</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p class="sub-account">
              <a href="#!">Company</a>
            </p>
            <p class="sub-account">
              <a href="#!">Developer</a>
            </p>
          </div>
          <div class="col-4" style="padding-right: 10px;">
            <h6 class="footer-title">About Us</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p class="sub-account">
              <a href="#!"><i class="fa fa-twitter mr-1" aria-hidden="true"></i> @crazysmile</a>
            </p>
            <p class="sub-account">
              <a href="#!">Developer</a>
            </p>
          </div>
          <div class="col-4">
            <h6 class="footer-title">Mobile Apps</h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p class="sub-account">
              <img src="{{ asset('images/websites/google_play.png') }}" class="img-google">
            </p>
            <p class="sub-account">
              <img src="{{ asset('images/websites/app_store.png') }}" class="img-apple">
            </p>
          </div>
         
          </div>
      </div>
    </div>
  </div>
  <center>
    <hr class=" accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 80%; background-color: white;">
  </center>
  <!-- Footer Links -->

  <!-- Copyright -->

  <!-- Copyright -->
  <div class="container" style="padding-bottom: 40px;">
    <span class="">&reg; 2020 Alright Reserved by VeCo Team</span>
    <span class="social"> <i class="fa fa-telegram"></i></span>
    <span class="social"> <i class="fa fa-facebook"></i></span>
    <span class="social"> <i class="fa fa-instagram"></i></span>
    <span class="social">Follow us : </span>
    <div style="clear: both"></div>
</div>
</footer>
<!-- Footer -->
          
       
    </div>
    </body>
    </html>