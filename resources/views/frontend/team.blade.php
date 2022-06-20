<!DOCTYPE html>
<html lang="en">
    @include('frontend.includes.head')

<body>
    @include('frontend.includes.header')

    @php
    $ourTeams=App\Models\OurTeam::latest()->get();
    @endphp
   
  
    <div class="team-banner">
      <div class="overlay">
        <div class="container">
          <div class="row">
            <div class="col-12 col-sm-12">
              <h1>हाम्रा सदस्यहरु</h1>
              <ul class="breadcrumb">
                <li><a href="{{route('index')}}">गृहपृष्ठ</a></li>
                <li>हाम्रा सदस्यहरु</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="team-body">
      <div class="container">
        <div class="row team-row">
          <div class="col-12 col-sm-12">
            <h2>केन्द्रिय सदस्यहरु</h2>
          </div>
          
          @foreach($ourTeams as $ourTeam)
          @if($ourTeam->team == "board")
          <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <img src= "{{asset('public/uploads/ourTeam/'.$ourTeam->image)}}" alt="">
            <h4>{{$ourTeam->name}}</h4>
            <p>- {{$ourTeam->position}}</p>
          </div>'
          @endif
          @endforeach
         
          
         </div>
        <div class="row team-row">
          <div class="col-12 col-sm-12">
            <h2>ब्यवस्थापन सदस्यहरु</h2>
          </div>
          @foreach($ourTeams as $ourTeam)
          @if($ourTeam->team == "management")
          <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <img src= "{{asset('public/uploads/ourTeam/'.$ourTeam->image)}}" alt="">
            <h4>{{$ourTeam->name}}</h4>
            <p>- {{$ourTeam->position}}</p>
          </div>'
          @endif
          @endforeach
          
        </div>
        <div class="row">
          <div class="col-12 col-sm-12">
            <h2>प्राविधिक सदस्यहरु </h2>
          </div>
          @foreach($ourTeams as $ourTeam)
          @if($ourTeam->team == "technical")
          <div class="col-12 col-sm-12 col-md-6 col-lg-3">
            <img src= "{{asset('public/uploads/ourTeam/'.$ourTeam->image)}}" alt="">
            <h4>{{$ourTeam->name}}</h4>
            <p>- {{$ourTeam->position}}</p>
          </div>
          @endif
          @endforeach
        </div>
      </div>
    </div>
    @include('frontend.includes.footer')
    
    
    </body>
    </html>