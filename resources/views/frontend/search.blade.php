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
          <h1>Search</h1>
          <ul class="breadcrumb">
            <li><a href="{{route('index')}}">गृहपृष्ठ</a></li>
            <li>Search</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="search-body">
  <div class="container">
    <div class="row">
      @foreach($blogs as $blog)
      <div class="col-12 col-sm-12">
        <div class="search-box">
          <img src= "{{asset('public/uploads/blog/'.$blog->image)}}" alt="">
          <h2><a href="#">{{$blog->title}}</a></h2>
          <p>{{Str::limit(strip_tags($blog->content),193, '.....')}}</p>
        </div>
      </div>
      @endforeach
     
    </div>
  </div>
</div>

@include('frontend.includes.footer')
</body>
</html>