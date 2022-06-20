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
          <h1>Blog Details</h1>
          <ul class="breadcrumb">
            <li><a href="{{route('index')}}">गृहपृष्ठ</a></li>
            <li>Blog Details</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="detail-body">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-8 col-lg-9 detail-left">
        <img src="{{asset('public/uploads/blog/'.$blogs->image)}}" alt="">
        <h4>{{$blogs->title}}</h4>
        <p style="text-align:justify">{{strip_tags($blogs->content)}}</p>
        <h3>Write a reply or comment</h3>
        @include('admin.includes._message')
        <form method="post" action="{{route('storeComment')}}">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <div class="md-form">
                <textarea type="text" placeholder="Your message" name="content"></textarea>
              </div>
            </div>
            <div class="col-md-4">
              <div class="md-form">
                <input type="text" name="name" class="form-control" placeholder="Your name">
              </div>
            </div>
            <div class="col-md-4">
              <div class="md-form">
                <input type="email" name="email" class="form-control" placeholder="Your email">
              </div>
            </div>
            <div class="col-md-4">
              <div class="md-form">
                <input type="url" name="website_url" class="form-control" placeholder="Website">
              </div>
            </div>
            <div class="col-md-4">
              <div class="md-form">
                <input type="number" class="form-control" name="blog_id" value={{$blogs->id}}>
              </div>
            </div>
           
            <div class="col-md-12">
              <div class="md-form">
                <button type="submit" class="btn btn-primary">Send</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-12 col-sm-12 col-md-4 col-lg-3">
        <div class="row">
          <div class="posts">
            <div class="col-12 col-sm-12">
              <h4>Recent Comments</h4>
            </div>
            @foreach($comments as $comment)
            <div class="col-12 col-sm-12">
              <div class="recent-post">
                <p style="text-align: justify;">{{ Str::limit(strip_tags($comment->content), 320, '.....') }}</p>
                <ul>
                  <li><i class="fa fa-user"></i> By: <a href="#">{{$comment->name}}</a></li>
                  <li><i class="fa fa-user"></i> <a href="#">{{$comment->created_at->format('D,d M,Y')}}</a></li>
                </ul>
              </div>
            </div>
            @endforeach
            
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('frontend.includes.footer')

</body>
</html>