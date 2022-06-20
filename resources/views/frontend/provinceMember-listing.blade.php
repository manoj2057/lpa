@php
    $members=App\Models\Member::where("member_type", 'province')->latest()->get();;  
  @endphp
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
          <h1>प्रदेश समिति </h1>
          <ul class="breadcrumb">
            <li><a href="{{route('index')}}">गृहपृष्ठ</a></li>
            <li> प्रदेश कार्यसमिति</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="profile-body">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <div class="table-responsive">
          <table class="table table-bordred table-striped">
            <thead>
              <tr>
                <th scope="col">सि न.</th>
                <th scope="col">नाम</th>
                <th scope="col">फोटो</th>
                <th scope="col">ठेगाना</th>
                <th scope="col">कम्पनीको नाम</th>
                <th scope="col">वर्णन</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($members as $member)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$member->name}}</td>
                <td><img src="{{asset('public/uploads/member/'.$member->image)}}" style="height:80px;width:80px;" alt=""></td>
                <td>{{$member->address}}</td>
                <td>{{$member->officename}}</td>
                <td>{{$member->desc}}</td>
                <td><a href="{{route('memberDetails',$member->id)}}" class="view-details">विवरण हेर्नुहोस् <i class="fa fa-eye"></i></a></td>
              </tr>
              @endforeach
             
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@include('frontend.includes.footer')
</body>
</html>