<header>
    <div class="menu-section">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-11">
            <nav class="navbar navbar-expand-lg navbar-light">
              @php
                $site =App\Models\Site::first();  
                $theme =App\Models\Theme::first();  
              @endphp
              <a class="navbar-brand" href="{{route('index')}}"><img src="{{asset('public/uploads/theme/'.$theme->logo)}}" style=" width:70px;height:70px;" alt=""></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
  
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="{{route('index')}}">गृहपृष्ठ</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                      हाम्रो बारेमा
                    </a>
                    <div class="dropdown-menu sm-menu">
                      <a class="dropdown-item" href='{{route('aboutPage')}}'>परिचय</a>
                      <a class="dropdown-item" href='{{route('legislation')}}'>विधानलुम्बिनी फोटोग्राफ संघको <br />विधान २०६०  (पाँचौ संशोधन २०७५) </a>
                      <a class="dropdown-item" href='{{route('objective')}}'>रणनीति</a>
                      <a class="dropdown-item" href='{{route('policies')}}'>नीतिहरू</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{route('memberListing')}}" id="navbardrop" data-toggle="dropdown">
                      कार्यसमिति
                    </a>
                    <div class="dropdown-menu sm-menu">
                      <a class="dropdown-item" href='{{route('memberListing')}}'>केन्द्रीय समिति</a>
                      <a class="dropdown-item" href='{{route('provinceMemberListing')}}'>प्रदेश समिति</a>
                      <a class="dropdown-item" href='{{route('memberListing')}}'>केन्द्रीय कार्यालयका कर्मचारी</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('team')}}">सदस्यहरू</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('gallery')}}">फोटो ग्यालरी</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('pdfListing')}}">प्रकाशन</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('pdfListing')}}">आर्थिक गतिविधि</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('contactUs')}}">सम्पर्क</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('contactUs')}}">उजुरी</a>
                  </li>
                </ul>
              </div>
            <div class="searching">
               <center>
                    <a href="javascript:void(0)" class="search-open">
                    <i class="fa fa-search"></i>
                </a>
  
                   
               </center>
               
                <div class="search-inline">
                    <form>
                        <input type="text" class="form-control" placeholder="Searching...">
                        <button type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                        <a href="javascript:void(0)" class="search-close">
                            <i class="fa fa-times"></i>
                        </a>
                    </form>
                </div>
              </div>
            </nav>
          </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-1 header-login">
            <p><a href="#" id="myBtn">Login</a></p>
          </div>
  
  
          <div id="myModal" class="modal">
  
              <!-- Modal content -->
              <div class="modal-content">
                <span class="close">&times;</span>
                <form>
                  <div class="row">
                    <div class="col-md-12">
                      <h2>LPA Login</h2>
                    </div>
                    <div class="col-md-12">
                      <div class="md-form">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="md-form">
                        <input type="password" name="Password" class="form-control" placeholder="Password">
                      </div>
                    </div>             
                    <div class="col-md-12">
                      <div class="md-form">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <p><a href="#">Need A Password / Forgot Password?</a></p>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
  
            </div>
  
  
        </div>
  
        <span class="clickmenus" onclick="openNav()">&#9776; </span>
            <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <div class="mobile-menus">
                <ul>
                  <li><a href="{{route('index')}}">गृहपृष्ठ</a></li>
                  <li><a href="#">समाचार</a></li>
                  <li><a href="#">राजनीति</a></li>
                  <li>
                    <a href="#" type="text" data-toggle="collapse" data-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample3"> हाम्रो बारेमा <i class="wsmenu-arrow fa fa-angle-down"></i></a>
                    <div class="collapse multi-collapse" id="multiCollapseExample3">
                      <div class="card card-body">
                      <ul>
                        <li><a  href="{{route('aboutPage')}}">परिचय</a></li>
                        <li><a  href="{{route('legislation')}}">विधानलुम्बिनी फोटोग्राफ संघको <br />विधान २०६०  (पाँचौ संशोधन २०७५)</a></li>
                        <li><a  href="{{route('objective')}}">रणनीति</a></li>
                        <li><a  href="{{route('policies')}}">नीतिहरु</a></li>
                      </ul>
                    </div>
                  </li>
        
                    <li>
                      <a href="#" type="text" data-toggle="collapse" data-target="#multiCollapseExample4" aria-expanded="false" aria-controls="multiCollapseExample3"> कार्यसमिति <i class="wsmenu-arrow fa fa-angle-down"></i></a>
                      <div class="collapse multi-collapse" id="multiCollapseExample4">
                        <div class="card card-body">
                        <ul>
                          <li><a  href="{{route('memberListing')}}">केन्द्रिय कार्यसमिति</a></li>
                          <li><a  href="{{route('provinceMemberListing')}}">प्रदेश कार्यसमिति</a></li>
                          <li><a  href="{{route('memberListing')}}">केन्द्रिय कार्यसमिति कर्मचारी</a></li>
                        </ul>
                      </div>
                    </li>

                    <li > <a  href="{{route('team')}}">सदस्यहरू</a></li>
                    <li ><a  href="{{route('gallery')}}">फोटो ग्यालरी</a></li>
                    <li > <a  href="{{route('pdfListing')}}">प्रकाशन</a> </li>
                    <li ><a  href="{{route('pdfListing')}}">आर्थिक गतिविधि</a></li>
                    <li > <a  href="{{route('contactUs')}}">सम्पर्क</a></li>
                    <li > <a  href="{{route('contactUs')}}">उजुरी</a></li>
              </div>  
            </div>
  
  
      </div>    
    </div>
  </header>