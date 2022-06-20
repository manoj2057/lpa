@php
  $sliders=App\Models\Slider::latest()->get();  
@endphp
<div class="slider">
  <div id="slider-animation" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <!-- <ul class="carousel-indicators">
      <li data-target="#slider-animation" data-slide-to="0" class="active"></li>
      <li data-target="#slider-animation" data-slide-to="1"></li>
      <li data-target="#slider-animation" data-slide-to="2"></li>
    </ul> -->

    <!-- The slideshow -->
      @foreach($sliders as $slider)
      @if($slider->status == 1)
      <div class="carousel-item active">
        <img src="{{asset('public/uploads/slider/'.$slider->image)}}" alt="">
        <div class="text-box">
          <h2 class="wow slideInUp animated animated" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s;">{{$slider->title}}</h2>
        </div>
      </div>  
             
      @else
      <div class="carousel-item">
        <img src="{{asset('public/uploads/slider/'.$slider->image)}}" alt="">
        <div class="text-box">
          <h2 class="wow slideInUp animated animated" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s;">{{$slider->title}}</h2>
        </div>
      </div>
              
      @endif
      
      @endforeach
      

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#slider-animation" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#slider-animation" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>

  </div>
</div>