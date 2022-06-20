
       
<!-- menu profile quick info -->
@php
$current_user =Auth::guard('admin')->user();


@endphp
<!-- menu profile quick info -->
<div class="profile clearfix">
  <div class="profile_pic">
    <img src="{{asset('public/uploads/admin/'. $current_user->image)}}" alt="..." class="img-circle profile_img">
  </div>
  <div class="profile_info">
    <span>Welcome,</span>
    <h2>{{$current_user->name}}</h2>
  </div>
</div>
<!-- /menu profile quick info -->

<br />

<!-- /menu profile quick info -->

<br />

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <ul class="nav side-menu">
      <li><a href="{{route('adminDashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>
      <li><a href="{{route('user.index')}}"><i class="fa fa-user"></i> User</a></li>
      <li><a href="{{route('userFeedback.index')}}"><i class="fa fa-user"></i> User Feedback</a></li>
      <li><a><i class="fa fa-sliders"></i>Slider <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('addSlider')}}">Add Slider</a></li>
            <li><a href="{{route('slider.index')}}"> View Slider</a></li>
          </ul>
      </li>
      <li><a><i class="fa fa-envelope"></i>Blog <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('addBlog')}}">Add Blog</a></li>
          <li><a href="{{route('blog.index')}}"> View Blog</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-user"></i>Member <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('addMember')}}">Add Member</a></li>
          <li><a href="{{route('member.index')}}"> View Member</a></li>
        </ul>
     </li>
      <li><a><i class="fa fa-file-pdf-o"></i>PDF <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('addPdf')}}">Add Pdf</a></li>
          <li><a href="{{route('pdf.index')}}"> View Pdf</a></li>
       </ul>
      </li>
      <li><a href="{{route('about')}}"><i class="fa fa-home"></i> AboutUs</a></li>
      <li><a><i class="fa fa-cog"></i>Callout <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('addCallout')}}">Add Callout</a></li>
          <li><a href="{{route('callout.index')}}"> View Callout</a></li>
        </ul>
      </li>
      <li><a href="{{route('benefit')}}"><i class="fa fa-home"></i> Benefit</a></li>
      <li><a><i class="fa fa-cog"></i>Insurance <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('addInsurance')}}">Add Insurance</a></li>
          <li><a href="{{route('insurance.index')}}"> View Insurance</a></li>
        </ul>
      </li>
      <li><a href="{{route('inspiration')}}"><i class="fa fa-home"></i> Inspiration</a></li>
      
      <li><a><i class="fa fa-image"></i>Gallery <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('addGallery')}}">Add Gallery</a></li>
          <li><a href="{{route('gallery.index')}}"> View Gallery</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-cog"></i>Faq <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="">Add Faq</a></li>
          <li><a href=""> View Faq</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-user"></i>Our Team <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('addOurTeam')}}">Add OurTeam</a></li>
          <li><a href="{{route('OurTeam.index')}}"> View OurTeam</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-cog"></i>Settings <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route("theme")}}">Theme setting</a></li>
          <li><a>Site Settings <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
          <li><a href="{{route('site')}}">Information setting</a></li>
          <li><a href="{{route('socialmedia')}}">Social media setting</a></li>
          
        </ul>
      </li>
    
      
        
        
     
    </ul>
  </div>
  

</div>