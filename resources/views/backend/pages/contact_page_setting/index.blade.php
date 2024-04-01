@extends('backend.layouts.app')

@section('page.name', 'Contact Page Content Setting')

@section('page.content')
<div class="card">
   <div class="card-body">

      <section>
            <form id="add_contact_setting_form" action="{{url(route('contactpage.update'))}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="header-title"><b>Process</b></h4>
                                        <hr>
                                    </div>                         
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="p_title" value="{{ get_contactpage('p_title') }}">
                                        </div>
                                    </div>        
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label>Short Description</label>
                                            <input type="text" class="form-control" name="p_description" value="{{ get_contactpage('p_description') }}" >
                                        </div>
                                    </div>                                                                                                                                                                   
                                </div>                                      
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <h4 class="header-title">Steps</h4>
                                    <hr>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Steps Content</label>
                                        <div id="step_bar_add_more" style="margin: 10px;"> @php $i = 1; 
                                        $step_bar = json_decode(get_contactpage('steps')); 
                                        if(!empty($step_bar)) { foreach ($step_bar as $fkey => $fvalue) { $farr_value = (array)$fvalue; foreach ($farr_value as $fkey1 => $fvalue1) { @endphp
                                            <div class="step_bar">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="row">
                                                                <input type="text" style="margin-bottom: 3px;" class="form-control" name="step_bar[]" placeholder="Enter Title here..." value="{{ $fkey1 }}"> <span class="glyphicon form-control-feedback"></span>
                                                                <input class="form-control" name="step_bar_description[]" placeholder="Enter Description here..."
                                                                value="{{ $fvalue1 }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1"> @if($i == 1) <i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 10px;" class="ri-add-circle-fill" id="add_step_bar"></i> @else <i style="font-size: 25px; color: red; cursor: pointer; margin-left: 10px;" class="ri-delete-bin-2-fill" onclick="remove_step_bar($(this));"></i> @endif </div>
                                                    </div>
                                                </div>
                                                </br>
                                            </div> @php $i++; } @endphp @php } @endphp @php } else { @endphp
                                                <div class="form-group">
                                                <div class="row">
                                                <div class="col-md-11">
                                                    <div class="row">
                                                        <input type="text" style="margin-bottom: 5px;" class="form-control" name="step_bar[]" placeholder="Enter Title here...">
                                                        <span class="glyphicon form-control-feedback"></span>
                                                        <input class="form-control" name="step_bar_description[]" placeholder="Enter Description here...">
                                                    </div>
                                                </div>
                                                <div class="col-md-1"><i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 10px;" class="ri-add-circle-fill" id="add_step_bar"></i></div>
                                                </div>
                                                </br>
                                            </div> @php } @endphp </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <h4 class="header-title">Consultation Form</h4>
                                    <hr>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Price For 20 Min</label>
                                        <input type="text" class="form-control" name="p_20" value="{{ get_contactpage('p_20') }}" >
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Price For 40 Min</label>
                                        <input type="text" class="form-control" name="p_40" value="{{ get_contactpage('p_40') }}" >
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Short Description For Form</label>
                                        <input type="text" class="form-control" name="f_description" value="{{ get_contactpage('f_description') }}" >
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <h4 class="header-title">Details</h4>
                                    <hr>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Location</label>
                                        <textarea class="form-control" name="location" rows="3">{{ get_contactpage('location') }}</textarea>
                                    </div>
                                </div> 
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Mobile Number</label>
                                        <input type="text" class="form-control" name="number" value="{{ get_contactpage('number') }}" >
                                    </div>
                                </div> 
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email" value="{{ get_contactpage('email') }}" >
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
        initValidate('#add_contact_setting_form');
    });
    
    $("#add_contact_setting_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });
    
    var responseHandler = function(response) {
        location.reload();
    }
</script>

<script>
   
    function remove_step_bar(_this) {
        _this.closest(".step_bar").remove();
    }
    
    
    $("#add_step_bar").on("click", function() {
    
    var new_step_bar = `
        <div class="step_bar form-group">
            <div class="row">
                <div class="col-md-11">
                    <div class="row">
                        <input type="text" style="margin-bottom: 3px;" class="form-control" name="step_bar[]" placeholder="Enter Title here...">
                        <span class="glyphicon form-control-feedback"></span>
                        <input type="text" class="form-control" name="step_bar_description[]" placeholder="Enter Description here...">
                    </div>
                </div>
                <div class="col-md-1"><i style="font-size: 25px; color: red; cursor: pointer; margin-left: 10px;" class="ri-delete-bin-2-fill" onclick="remove_step_bar($(this));"></i></div>
            </div>
            </br>
        </div>
    `;
    
    $("#step_bar_add_more").append(new_step_bar);
    });

</script>


@endsection