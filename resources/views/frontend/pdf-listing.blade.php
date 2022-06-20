@php
    $pdfs=App\Models\PdfListing::latest()->get();;  
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
          <h1>प्रकाशन</h1>
          <ul class="breadcrumb">
            <li><a href="{{route('index')}}">गृहपृष्ठ</a></li>
            <li>प्रकाशन</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="pdf-section">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12">
        <div class="table-responsive">
          <table class="table table-bordred table-striped">
            <thead>
              <tr>
                <th scope="col">सि न.</th>
                <th scope="col">नाम</th>
                <th scope="col">मिति</th>
                <th scope="col"><i class="fas fa-download"></i> डाउनलोड</th>
              </tr>
            </thead>
            <tbody>
              @foreach($pdfs as $pdf)
              <tr>
                <th scope="row">1</th>
                <td>{{$pdf->name}}</td>
                <td>{{$pdf->date}}</td>
                <td><a href="{{route('downloadPdf',$pdf)}}">{{$pdf->file}}</a></td>
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