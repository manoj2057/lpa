<!DOCTYPE html>
<html lang="en">
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
          <h1>कार्यसमिति बारेमा </h1>
          <ul class="breadcrumb">
            <li><a href="{{route('index')}}">गृहपृष्ठ</a></li>
            <li>कार्यसमिति बारेमा </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="profiledetail-body">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <img src= "{{asset('public/uploads/member/'.$member->image)}}" alt="">
        <p><span>नाम: </span>{{$member->name}}</p>
        <p><span>ठेगाना: </span>{{$member->address}}</p>
        <p><span>कम्पनीको नाम: </span> {{$member->officename}}</p>
        <p><span>वर्णन: </span>{{$member->desc}}</p>
      </div>
    </div>
  </div>
</div>

@include('frontend.includes.footer')
</body>
</html>