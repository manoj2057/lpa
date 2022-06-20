<!DOCTYPE html>
<html lang="en">
    @include('frontend.includes.head')
    
<body>
    @include('frontend.includes.header')
<div class="team-banner">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h1> हाम्रो ग्यालेरी</h1>
          <ul class="breadcrumb">
            <li><a href="{{route('index')}}">गृहपृष्ठ</a></li>
            <li>हाम्रो ग्यालेरी</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="gallery-section">
    <div class="container">
      <div class="portfolio-item row"> 
        <div class="row">
          
          @foreach($galleries as $gallery)
          <div class="item selfie col-12 col-sm-12 col-md-6 col-lg-6 gallery-left">
            <a href="{{asset('public/uploads/gallery/'.$gallery->image)}}" class="fancylight popup-btn" data-fancybox-group="light"> 
             <figure>
               <img class="img-fluid" src="{{asset('public/uploads/gallery/'.$gallery->image)}}" alt="">
             </figure>
            </a>
         </div>
          @endforeach

          
        </div>
      </div>
   </div> 
</div>


@include('frontend.includes.footer')


</body>
</html>