@php
   $site =App\Models\Site::first();  
    
@endphp
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
          <h1>सम्पर्क</h1>
          <ul class="breadcrumb">
            <li><a href="{{route('index')}}">गृहपृष्ठ</a></li>
            <li>सम्पर्क</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="contact-body">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 contactbox">
        <i class="fa fa-map-marker-alt"></i>
        <h4>Address</h4>
        <p>{{$site->location}}</p>
      </div>
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 contactbox">
        <i class="fa fa-phone-volume"></i>
        <h4>Phone</h4>
        <p>{{$site->phoneno}}</p>
      </div>
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 contactbox">
        <i class="fa fa-envelope"></i>
        <h4>Email Address</h4>
        <p>{{$site->email}}</p>
      </div>
    </div>
  </div>
</div>
<div class="contact-message">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <h4>Send Us Message</h4>
        @include('admin.includes._message')
        <form method="post" action="{{route('storeuserFeedback')}}">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="md-form">
                <input type="text" name="name" class="form-control" placeholder="Your name">
              </div>
              <div class="md-form">
                <input type="email" name="email" class="form-control" placeholder="Your email">
              </div>
              <div class="md-form">
                <input type="text" name="phoneno" class="form-control" placeholder="Phone Numaber">
              </div>
              <div class="md-form">
                <input type="text" name="subject" class="form-control" placeholder="Subject">
              </div>
            </div>
            <div class="col-md-6">
              <div class="md-form">
                <textarea type="text" name="message" placeholder="Your message"></textarea>
              </div>
            </div>
            <div class="col-md-2">
              <div class="md-form">
               <button type="submit" class="btn btn-primary">Send</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@include('frontend.includes.footer')
</body>
</html>