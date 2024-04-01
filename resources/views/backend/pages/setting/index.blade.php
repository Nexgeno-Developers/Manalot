@extends('backend.layouts.app')

@section('page.name', 'Setting')

@section('page.content')
<div class="card">
   <div class="card-body">
    {{--
      <div class="row mb-2">
         <div class="col-sm-5">
            <h3>Setting</h3>
         </div>
      </div> ---}}

      <section>
            <form id="add_setting_form" action="{{url(route('setting.update'))}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="header-title"><b>General</b></h4>
                                        <hr>
                                    </div>                         
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" value="{{ get_settings('email') }}">
                                        </div>
                                    </div>        
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label>Phone No</label>
                                            <input type="text" class="form-control" name="mobile" value="{{ get_settings('mobile') }}" >
                                        </div>
                                    </div>                                                                                                                                                                   
                                </div>                                      
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <h4 class="header-title">Address</h4>
                                    <hr>
                                </div>
                                {{-- 
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Delhi (Head Office)</label>
                                        <textarea class="form-control" name="delhi_address" rows="3">{{ get_settings('delhi_address') }}</textarea>
                                    </div>
                                </div> --}} 
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        {{--<label>Mumbai</label> --}}
                                        <textarea class="form-control" name="mumbai_address" rows="3">{{ get_settings('mumbai_address') }}</textarea>
                                    </div>
                                </div> 
                                {{--
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Chandigarh</label>
                                        <textarea class="form-control" name="chandigarh_address" rows="3">{{ get_settings('mumbai_address') }}</textarea>
                                    </div>
                                </div> --}}                   
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <h4 class="header-title">Home Page Banner</h4>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="form-group mb-3">
                                        <label>Banner 1 <span class="red">*</span> <span class="font-size11">(Max file size 80kb - 1125*196)</span></label>
                                            <input class="form-control" type="file" id="image" name="Banner_1">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        @if(get_settings('Banner_1')) 
                                            <img src="{{ asset('storage/' . get_settings('Banner_1')) }}" class="img-thumbnail"> 
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="form-group mb-3">
                                            <label>Banner 2 <span class="red">*</span> <span class="font-size11">(Max file size 80kb - 1125*196)</span></label>
                                            <input class="form-control" type="file" id="image" name="Banner_2">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        @if(get_settings('Banner_2')) 
                                            <img src="{{ asset('storage/' . get_settings('Banner_2')) }}" class="img-thumbnail"> 
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="form-group mb-3">
                                            <label>Banner 3 <span class="red">*</span> <span class="font-size11">(Max file size 80kb - 1125*196)</span></label>
                                            <input class="form-control" type="file" id="image" name="Banner_3">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        @if(get_settings('Banner_3')) 
                                            <img src="{{ asset('storage/' . get_settings('Banner_3')) }}" class="img-thumbnail"> 
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="form-group mb-3">
                                            <label>Banner 4 <span class="red">*</span> <span class="font-size11">(Max file size 80kb - 1125*196)</span></label>
                                            <input class="form-control" type="file" id="image" name="Banner_4">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        @if(get_settings('Banner_4')) 
                                            <img src="{{ asset('storage/' . get_settings('Banner_4')) }}" class="img-thumbnail"> 
                                        @endif
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <h4 class="header-title">Banner Content First Slide</h4>
                                    <hr>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="b_title1" value="{{ get_settings('b_title1') }}">
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Description</label>
                                        <input type="text" class="form-control" name="b_desc1" value="{{ get_settings('b_desc1') }}">
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <h4 class="header-title">Banner Content Second Slide</h4>
                                    <hr>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="b_title2" value="{{ get_settings('b_title2') }}">
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Description</label>
                                        <input type="text" class="form-control" name="b_desc2" value="{{ get_settings('b_desc2') }}">
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <h4 class="header-title">Home Who We Are Section</h4>
                                    <hr>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="h_title" value="{{ get_settings('h_title') }}">
                                    </div>
                                </div>  
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Description</label>
                                        <textarea class="form-control" name="h_description" rows="3">{{ get_settings('h_description') }}</textarea>
                                    </div>
                                </div> 
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Vision</label>
                                        <textarea class="form-control" name="h_vision" rows="3">{{ get_settings('h_vision') }}</textarea>
                                    </div>
                                </div> 
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Mission</label>
                                        <textarea class="form-control" name="h_mission" rows="3">{{ get_settings('h_mission') }}</textarea>
                                    </div>
                                </div>                
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">

                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <h4 class="header-title"><b>Home Page Counter</b></h4>
                                    <hr>
                                </div>                    
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Years of Experience</label>
                                        <input type="text" class="form-control" name="c_exp" value="{{ get_settings('c_exp') }}" >
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Satisfied Clients</label>
                                        <input type="text" class="form-control" name="c_client" value="{{ get_settings('c_client') }}" >
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Licenses & Registration Done</label>
                                        <input type="text" class="form-control" name="c_lic" value="{{ get_settings('c_lic') }}" >
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Team of Experts</label>
                                        <input type="text" class="form-control" name="c_team" value="{{ get_settings('c_team') }}" >
                                    </div>
                                </div>                                        
                            </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <h4 class="header-title"><b>Social Media</b></h4>
                                    <hr>
                                </div>                    
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Whatapp</label>
                                        <input type="text" class="form-control" name="whatsapp" value="{{ get_settings('whatsapp') }}" >
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Instagram</label>
                                        <input type="text" class="form-control" name="instagram" value="{{ get_settings('instagram') }}" >
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Facebook</label>
                                        <input type="text" class="form-control" name="facebook" value="{{ get_settings('facebook') }}" >
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Linkedin</label>
                                        <input type="text" class="form-control" name="linkedin" value="{{ get_settings('linkedin') }}" >
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Twitter \ X</label>
                                        <input type="text" class="form-control" name="twitter" value="{{ get_settings('twitter') }}" >
                                    </div>
                                </div>                                        
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <!--<div class="col-md-12">
                                    <h4 class="header-title">Submission</h4>
                                    <hr>
                                </div>--> 
                                <div class="col-sm-12">
                                    <div class="form-group d-grid mb-3 text-end">
                                        <button type="submit" class="btn btn-block btn-primary">Update</button>
                                    </div>
                                </div>                    
                            </div>
                        </div>                
                    </div>               
                </div>
            </form>
    </section>
    
   </div>
   <!-- end card-body-->
</div>
@endsection

@section("page.scripts")
<script>
    $(document).ready(function() {
        initValidate('#add_setting_form');
    });
    
    $("#add_setting_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });
    
    var responseHandler = function(response) {
        location.reload();
    }
</script>
@endsection