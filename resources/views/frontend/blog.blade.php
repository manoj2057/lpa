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
          <h1>Blog</h1>
          <ul class="breadcrumb">
            <li><a href="{{route('index')}}">गृहपृष्ठ</a></li>
            <li>Blog</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="blog-body">
  <div class="container">
    <div class="row">
      @foreach($blogs as $blog)
      <div class="col-12 col-sm-12 col-md-6 col-lg-6">
        <a href="{{route('blogDetails',$blog->id)}}"><img src= "{{asset('public/uploads/blog/'.$blog->image)}}" alt=""></a>
        <div class="blog-content">
          <h4><a href="#">{{$blog->title}}</a></h4>
          <ul>
            <li><i class="fa fa-user"></i> By: <a href="#">{{$blog->author_name}}</a></li>
            <li><i class="fa fa-comment-alt"></i> Comments: 2</li>
          </ul>
          <p style="text-align: justify;">{{ Str::limit(strip_tags($blog->content), 320, '.....') }}</p>
        </div>
      </div>
      @endforeach
      
    </div>
  </div>
</div>

@include('frontend.includes.footer')





</body>
</html>