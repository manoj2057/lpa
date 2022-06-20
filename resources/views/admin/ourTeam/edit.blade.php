@extends('admin.includes.admin_design')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Update OurTeam</h3>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="{{ route('OurTeam.index') }}" class="btn add-btn btn-primary" style="background-color: #1a2eb9; border: 1px solid #1a2eb9;color: #fff; margin-right: 7px; border-radius:10px; margin-top: 10px;"  ><i class="fa fa-eye"></i> View Team</a>
            </div>

            
        </div>
        <div class="clearfix"></div>
       
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>OurTeam </h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />

                        @include('admin.includes._message')
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('updateOurTeam',$ourTeam->id)}}" enctype="multipart/form-data">
                        @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name"> Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="name" name="name" value="{{$ourTeam->name}}"  class="form-control ">
                                </div>
                            </div>
                            
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="position"> Position <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="position" name="position" value="{{$ourTeam->position}}"  class="form-control ">
                                </div>
                            </div>
                            
                             <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" id="image" name="image" accept="image/*" class="form-control" onchange="readURL(this);">
                                    
                                </div>
                                <img src="{{asset('public/uploads/ourTeam/'.$ourTeam->image)}}" id="one" style="width: 100px">
                        
                            </div> 
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="team"> Team <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="team" name="team" value="{{$ourTeam->team}}"  class="form-control ">
                                </div>
                            </div>
                            
                            
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="update" class="btn btn-success">Update OurTeam</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        

        

        
    </div>
</div>
@endsection
@section('js')
<script>
    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload= function(e){
                $('#one')
                .attr('src',e.target.result)
                .width(100)
            };
            reader.readAsDataURL(input.files[0]);
        }



    }
    
</script>

    
@endsection