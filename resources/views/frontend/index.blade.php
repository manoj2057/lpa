<!DOCTYPE html>
<html lang="en">
    @include('frontend.includes.head')

<body>
    @include('frontend.includes.header')

    @include('frontend.includes.slider')


  @php
    $about=App\Models\About::first();;  
  @endphp

<div class="welcome-section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-8 col-lg-8">
        <h1>{{$about->heading}}</h1>
        <p>{{Str::limit($about->content,650)}}</p>
        <a href="{{route('singlePage')}}" class="btn btn-check">Read More</a><br><br>
        @php
        $callouts=App\Models\Callout::latest()->get();;;  
      @endphp
        <div class="row">
          @foreach($callouts as $callout)
          <div class="col-md-4 p-0">
            <a href="#" class="callout">
              <div class="benefit-box">
                <i class="{{ $callout->icon }}"></i>
                <h4>{{$callout->heading}}</h4>
                <p>{!!Str::limit($callout->content,55) !!}</p>
                <h6>View More</h6>
              </div>
            </a>
          </div>
          @endforeach
          
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 welcome-right">
        @include('admin.includes._message')
        <form method="post" action="{{route('storeUser')}}">
          @csrf
          <h2>Join LPA Now</h2>
          <div class="row">
            <div class="col-md-12">
              <p>Interested in becoming a member? Get started by simply filling out the below information.</p>
            </div>
            <div class="col-md-12">
              <div class="md-form">
                <input type="text" name="name" class="form-control" placeholder="Your name">
              </div>
            </div>
            <div class="col-md-12">
              <div class="md-form">
                <input type="email" name="email" class="form-control" placeholder="Email">
              </div>
            </div>
            <div class="col-md-12">
              <div class="md-form">
                <input type="text" name="phoneno" class="form-control" placeholder="Phone Number">
              </div>
            </div>
            <div class="col-md-12">
              <div class="md-form">
                <input type="text" name="studio_name" class="form-control" placeholder="Photo Studio Name">
              </div>
            </div>
            <div class="col-md-12">
              <div class="md-form">
                <textarea type="text" name="address" placeholder="Address"></textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group"><div class="custom-control custom-checkbox">
                <input id="agree_checkbox" type="checkbox" name="gdpr_agree" value="yes" class="custom-control-input required"><label for="agree_checkbox" class="custom-control-label fine-print">
                By checking this box, I agree to LPA’s <a href="#" title="">privacy policy</a>, <a href="#">terms and conditions</a>, and use of <a href="#">cookies</a> and confirm that I am over the age of 16 and that LPA can contact me for marketing purposes.
                </label></div></div>
              </div>
            <div class="col-md-12">
              <div class="md-form">
                <button type="submit" class="btn btn-primary">Join Now</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@php
$benefit=App\Models\Benefit::first();; 
@endphp
<div class="benefit-section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 benefit-left">
        <h3>Benefits</h3>
        <h4>{{$benefit->title}}</h4>
        <a href="#" class="btn btn-check">Check Out Our Benefits</a>
      </div>
      <div class="col-12 col-sm-12 col-md-8 col-lg-8 benefit-right">
        
      </div>
    </div>
  </div>
</div>
<div class="peace-section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-6 col-lg-6">
        <h3>True Peace of Mind</h3>
        <h5>Protection for LPA members</h5>
        <p>विकाहकालाई अगाडी वढ्ने भनेर नेपाल फोटो ग्राफर महासंघ गठनघभई सकेको छ र संघलाई वैधानिकता प्रदान गरी फोटो ग्राफि व्यवसायलाई विशेष रुपमा सम्बोधन गरोस भन्ने जुन अभिप्रायले महासंघ शदन भएको हो त्यो प्राप्तीका लागि केहि प्राविधिक कारणले ढिलो भएतापनि ओलीका दिनमा सक्रियताका अघि वढ्ने र वास्तवमा एक व्यवसायीक फोटो ग्राफरलाई पर्ने समस्या र यसको विकास र यो पेशा गर्ने व्यवसायीलाई समृद्ध पर्ने र राज्यले ल्याएको अवधारणा समृद्ध नेपाल सुखि नेपालीको अभियानमा टेवा पुरयाउने महासंघको लक्ष्यलाई पुरा गर्ने प्रतिवद्धता व्यक्त गर्दछु।</p>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-6">
        <a href="#" class="btn btn-join">Join LPA Now!</a>
      </div>
    </div>
    @php
    $insurances=App\Models\Insurance::latest()->get();;;  
  @endphp
    <div class="row">
      <div class="col-md-12">
        <h2>Insurance Offerings</h2>
      </div>
      @foreach($insurances as $insurance)
      <div class="col-md-3 p-0">
        <a href="#" class="callout">
          <div class="benefit-box">
            <h4>{{$insurance->title}}</h4>
            <h6>View More</h6>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</div>
@php
    $galleries=App\Models\Gallery::latest()->take(4)->get(); 
  @endphp
<div class="gallery-section">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h4>फोटो ग्यालरी</h4>
        </div>
      </div>
      <div class="portfolio-item row">  
        <div class="row">
          @foreach($galleries as $gallery)
          <div class="item selfie col-12 col-sm-12 col-md-6 col-lg-6 gallery-left">
             <a href="{{asset('public/frontend./images/gallery5.jpg')}}" class="fancylight popup-btn" data-fancybox-group="light"> 
              <figure>
                <img class="img-fluid" src= "{{'public/uploads/gallery/'.$gallery->image}}" alt="">
              </figure>
             </a>
          </div>
          @endforeach
          
        </div>
      </div>
   </div> 
</div>
@php
$blogs=App\Models\Blog::latest()->take(3)->get();
@endphp
<div class="faqs-section">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12">
          <h3>Find the answers you need.</h3>
          <p class="faqs-text">लुम्बिनी फोटोग्राफ संघ नेपाली पत्रकारहरुको छाता संगठन हो । पत्रकारहरुलाई संगठित गरी व्यावसायिक नेतृत्व प्रदान गर्दै उनीहरुको हक–अधिकार प्रवद्र्धन गर्ने महासंघको मूल ध्येय, लक्ष्य र दायित्व हो ।</p>
          <div class="row">
            @foreach($blogs as $blog)
            <div class="col-md-4 p-0">
              <a href="{{route('blogDetails',$blog->id)}}" class="callout">
                <div class="benefit-box">
                  <h5>{{$blog->created_at->format('D,d M,Y')}}</h5>
                  <hr>
                  <p>{{$blog->title}} </p>
                  <h6>More Info</h6>
                </div>
              </a>
            </div>
            @endforeach
           
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@php
    $inspiration=App\Models\Inspiration::first();;  
  @endphp
<div class="inspiration-section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 inspire-left">
        <img src= "{{asset('public/uploads/inspiration/'.$inspiration->image)}}" alt="">
      </div>
      <div class="col-12 col-sm-12 col-md-8 col-lg-8 inspire-right">
        <h4>{{$inspiration->heading}}</h4>
        <p>{{$inspiration->content}}</p>
        <a href="#" class="btn btn-take">Take a Closer Look</a>
      </div>
    </div>
  </div>
</div>


@include('frontend.includes.footer')






</body>
</html>