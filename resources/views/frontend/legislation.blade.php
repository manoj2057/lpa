<!DOCTYPE html>
<html lang="en">
    @include('frontend.includes.head')

<body>
    @include('frontend.includes.header')

    @php
    $about=App\Models\About::first();;  
  @endphp
    
    <div class="team-banner">
      <div class="overlay">
        <div class="container">
          <div class="row">
            <div class="col-12 col-sm-12">
              <h1>विधानलुम्बिनी फोटोग्राफ संघको <br />विधान २०६०  (पाँचौ संशोधन २०७५)</h1>
              <ul class="breadcrumb">
                <li><a href="{{route('index')}}">गृहपृष्ठ</a></li>
                <li>विधानलुम्बिनी फोटोग्राफ संघको <br />विधान २०६०  (पाँचौ संशोधन २०७५)</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="single-body">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12" style="text-align:justify;">
            <p>{{$about->legislation}}</p>
          </div>
        </div>
      </div>
    </div>
    @include('frontend.includes.footer')
 
    </body>
    </html>