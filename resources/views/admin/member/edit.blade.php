@extends('admin.includes.admin_design')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Update Slider</h3>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="{{ route('member.index') }}" class="btn add-btn btn-primary" style="background-color: #1a2eb9; border: 1px solid #1a2eb9;color: #fff; margin-right: 7px; border-radius:10px; margin-top: 10px;"  ><i class="fa fa-eye"></i> View Member</a>
            </div>      
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Design </h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />

                        @include('admin.includes._message')
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('updateMember',$member->id)}}" enctype="multipart/form-data">
                        @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name"> Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="name" name="name" value="{{$member->name}}"  class="form-control ">
                                </div>
                            </div>
                            
                            
                            
                             <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" id="image" name="image" accept="image/*" class="form-control" onchange="readURL(this);">
                                    
                                </div>
                                <img src="{{asset('public/uploads/member/'.$member->image)}}" id="one" style="width: 100px">
                        
                            </div> 
                           
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="status">Order <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="order" name="address"  value="{{$member->address}}" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="status">Office Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="officename" name="officename"  value="{{$member->officename}}" class="form-control">
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Description<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea required="required" name='desc' Columns="35" Rows="10">{{$member->desc}}</textarea></div>
                            </div>
                            
                            
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="update" class="btn btn-success">Update Slider</button>
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