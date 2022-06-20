@php
   $site =App\Models\Site::first();  
   $theme =App\Models\Theme::first();  
@endphp
<footer>
    <div class="top-footer">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 footer-logo">
            <img src="{{asset('public/uploads/theme/'.$theme->footer_logo)}}" alt="">
            <p>{{$site->about_info}}</p>
          </div>
          <div class="col-12 col-sm-12 col-md-4 col-lg-4 footer-left">
            <h4>Let's Connect</h4>
            <p>{{$site->location}}</p>
            <p><a href="tel:०७१-५४२६००">{{$site->phoneno}}</a></p>
            <p><a href="mailto:test@test.com">{{$site->email}}</a></p>
          </div>
          <div class="col-12 col-sm-12 col-md-8 col-lg-8 footer-right">
            <ul>
              <li><a href="#">गृहपृष्ठ</a></li>
              <li><a href="#">हाम्रो बारेमा</a></li>
              <li><a href="#">कार्यसमिति</a></li>
              <li><a href="#">सदस्यहरू</a></li>
              <li><a href="#">फोटो ग्यालरी</a></li>
              <li><a href="#">प्रकाशन</a></li>
              <li><a href="#">आर्थिक गतिविधि</a></li>
              <li><a href="#">उजुरी</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom-footer">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-6 col-lg-6 copyright">
            <p>प्रतीलिपी अधीकार © 2021, लुम्बिनी फोटोग्राफर संघ | Designed & Developed by: <a href="https://lgmnepal.com.np/" target="_blank">lgmnepal</p>
          </div>
          <div class="col-12 col-sm-12 col-md-6 col-lg-6 footer-icons">
            <ul>
              <li><a href="{{$site->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="{{$site->twitter}}"><i class="fab fa-twitter"></i></a></li>
              <li><a href="{{$site->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
              <li><a href="{{$site->youtube}}"><i class="fab fa-youtube"></i></a></li>
            </ul>  
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div class="contact-box">
    <p><a href="#" id="myBtn1"><i class="far fa-comment-alt"></i></a></p>
  </div>
  
  <div id="myModal1" class="modal1">
  
    <!-- Modal content -->
    <div class="modal-content1">
      <span class="close1">&times;</span>
      <form>
        <div class="row">
          <div class="col-md-12">
            <h2>Welcome</h2>
          </div>
          <div class="col-md-12">
            <div class="md-form">
              <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
          </div>  
          <div class="col-md-12">
            <div class="md-form">
              <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
          </div>
          <div class="col-md-12">
            <div class="md-form">
              <textarea placeholder="Message"></textarea>
            </div>
          </div>  
          <div class="col-md-12">
            <div class="md-form">
              <input type="file" id="myFile" name="filename">
            </div>
          </div>             
          <div class="col-md-12">
            <div class="md-form">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  
  </div>
  
  
  <!-- <div class="scroll-top-wrapper show">
    <span class="scroll-top-inner">
      <i class="far fa-arrow-alt-circle-up"></i>
    </span>
  </div> -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>    
  <script src= "{{asset('public/frontend/js/popper.min.js')}}"></script> 
  <script src= "{{asset('public/frontend/js/main.js')}}"></script>
  <script src= "{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>   
  <script src= "{{asset('public/frontend/js/wow.min.js')}}"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
  
  <script>
    new WOW().init();
  </script>
  <script>
    $(window).scroll(function() {    
  var scroll = $(window).scrollTop();
  
  if (scroll >= 200) {
      $(".menu-section").addClass("fixed-top");
  } else {
      $(".menu-section").removeClass("fixed-top");
  }
  });
  </script>
  
  <script>
  // Get the modal
  var modal = document.getElementById("myModal");
  
  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");
  
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  
  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }
  
  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  </script>
  
  
  <script>
    //SLIDER
  wow = new WOW(
    {
      animateClass: 'animated',
      offset:       100,
      callback:     function(box) {
        console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
      }
    }
  );
  wow.init();
  document.getElementById('moar').onclick = function() {
    var section = document.createElement('section');
    section.className = 'section--purple wow fadeInDown';
    this.parentNode.insertBefore(section, this);
  };
  
  </script>
  <script>
       var sp = document.querySelector('.search-open');
    var searchbar = document.querySelector('.search-inline');
    var shclose = document.querySelector('.search-close');
    function changeClass() {
      searchbar.classList.add('search-visible');
    }
    function closesearch() {
      searchbar.classList.remove('search-visible');
    }
    sp.addEventListener('click', changeClass);
    shclose.addEventListener('click', closesearch);  
  
  </script>
  <script>
    $('.portfolio-item').isotope({
      itemSelector: '.item',
      layoutMode: 'fitRows'
     });
     $('.portfolio-menu ul li').click(function(){
      $('.portfolio-menu ul li').removeClass('active');
      $(this).addClass('active');
      
      var selector = $(this).attr('data-filter');
      $('.portfolio-item').isotope({
        filter:selector
      });
      return  false;
     });
     $(document).ready(function() {
     var popup_btn = $('.popup-btn');
     popup_btn.magnificPopup({
     type : 'image',
     gallery : {
      enabled : true
     }
   });
  });
  </script>
  
  