<section>
    <form id="add_practicearea_form" action="{{url(route('practicearea.create'))}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
<!---------------------------------------Breadcrumb-------------------------------------------->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="header-title"><b>Breadcrumb</b></h4>
                                <hr>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Main Title <span class="red">*</span></label>
                                    <input type="text" class="form-control" name="breadcrumb_title" value="" required>
                                </div>
                            </div>        
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Breadcrumb Subtitle <span class="red">*</span></label>
                                    <input type="text" class="form-control" name="breadcrumb_subtitle" value="" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Indian Price <span class="red">*</span></label>
                                    <input type="text" class="form-control" name="indian_price" value="" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Foreign Price <span class="red">*</span></label>
                                    <input type="text" class="form-control" name="foreign_price" value="" required>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
<!---------------------------------------Breadcrumb-------------------------------------------->
<!---------------------------------------Overview ---------------------------------------------->

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="header-title"><b>Page</b></h4>
                                <hr>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Title <span class="red">*</span></label>
                                    <input type="text" class="form-control" name="title" value="" required>
                                </div>
                            </div> 
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Short Description <span class="red">*</span></label>
                                    <input type="text" class="form-control" name="short_description" value="" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Slug <span class="red">*</span></label>
                                    <input type="text" class="form-control" name="slug" value="" required>
                                </div>
                            </div>
                            {{--<div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Dropdown Practice Area</label>
                                    <select class="form-select select2" name="parent_id">
                                        <option value="1">--Select--</option>
                                        @foreach($practicearea as $row)
                                            <option value="{{ $row->id }}">{{ $row->title }}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div> --}}
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Dropdown Practice Area</label>
                                    <select class="form-select select2" name="parent_id">
                                        <option value="">--Select--</option>
                                        <option value="1">Start a Business</option>
                                        <option value="2">License & Registration</option>
                                        <option value="3">Taxation</option>
                                        <option value="4">IPR & Gaming Services</option>
                                        <option value="5">NGO Compliances </option>
                                    </select> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<!--------------------------------------overview------------------------------------------------>

<!------------------------------------- Progress Bar ------------------------------------------->

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="header-title"><b>Progress Bar</b></h4>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>progress bar Title</label>
                                    <input type="text" class="form-control" name="progress_bar_title" value="" >
                                </div>
                            </div> 

                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>progress bar Content</label>
                                    <div id="progress_bar_add_more" style="margin: 10px;">
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-11">
                                                <div class="row">
                                                    <input type="text" style="margin-bottom: 5px;" class="form-control" name="progress_bar[]" placeholder="Enter Title here...">
                                                    <span class="glyphicon form-control-feedback"></span>
                                                    <input class="form-control" name="progress_bar_description[]" placeholder="Enter Description here...">
                                                </div>
                                            </div>
                                            <div class="col-md-1"><i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 10px;" class="ri-add-circle-fill" id="add_progress_bar"></i></div>
                                            </div>
                                            </br>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                        </div>
                    </div>
                </div>

<!------------------------------------- Progress Bar -------------------------------------------->

<!------------------------------------- contain section ----------------------------------------->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="header-title"><b>Page Content</b></h4>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Section Title</label>
                                    <input type="text" class="form-control" name="Content_title" value="">
                                </div>
                            </div> 
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Content</label>
                                    <textarea class="form-control trumbowyg" name="content" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Content List Title</label>
                                    <input type="text" class="form-control" name="Content_list_title" value="">
                                </div>
                            </div> 

                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Content List</label>
                                    <div id="Content_list_add_more" style="margin: 10px;">
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-11">
                                                <div class="row">
                                                    <input type="text" style="margin-bottom: 5px;" class="form-control" name="Content_list[]" placeholder="Enter Content List here...">
                                                </div>
                                            </div>
                                            <div class="col-md-1"><i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 10px;" class="ri-add-circle-fill" id="add_Content_list"></i></div>
                                            </div>
                                            </br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Other Content</label>
                                    <textarea class="form-control trumbowyg" name="other_content" rows="2"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
<!------------------------------------- contain section ----------------------------------------->
<!------------------------------------- Eligibility --------------------------------------------->

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="header-title"><b>Eligibility Content</b></h4>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Section Title</label>
                                    <input type="text" class="form-control" name="Section_title_el" value="">
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Eligibility Title</label>
                                    <input type="text" class="form-control" name="eligibility_title" value="">
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Eligibility Sub Title</label>
                                    <input type="text" class="form-control" name="eligibility_sub_title" value="">
                                </div>
                            </div> 

                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Eligibility List</label>
                                    <div id="eligibility_list_add_more" style="margin: 10px;">
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-11">
                                                <div class="row">
                                                    <input type="text" style="margin-bottom: 5px;" class="form-control" name="eligibility_list[]" placeholder="Enter Eligibility List here...">
                                                </div>
                                            </div>
                                            <div class="col-md-1"><i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 10px;" class="ri-add-circle-fill" id="add_eligibility_list"></i></div>
                                            </div>
                                            </br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Eligibility Content</label>
                                    <textarea class="form-control trumbowyg" name="eligibility_content" rows="2" ></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

<!------------------------------------- Eligibility --------------------------------------------->
<!---------------------------------Documents required-------------------------------------------->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="header-title"><b>Documents Required Content</b></h4>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Section Title</label>
                                    <input type="text" class="form-control" name="Section_title_doc" value="">
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Documents Title</label>
                                    <input type="text" class="form-control" name="doc_title" value="">
                                </div>
                            </div> 

                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Documents Required List</label>
                                    <div id="doc_list_add_more" style="margin: 10px;">
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-11">
                                                <div class="row">
                                                    <input type="text" style="margin-bottom: 5px;" class="form-control" name="doc_list[]" placeholder="Enter Documents Required List here...">
                                                </div>
                                            </div>
                                            <div class="col-md-1"><i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 10px;" class="ri-add-circle-fill" id="add_doc_list"></i></div>
                                            </div>
                                            </br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Documents Required Content</label>
                                    <textarea class="form-control trumbowyg" name="doc_content" rows="2" ></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
<!---------------------------------Documents required-------------------------------------------->

<!---------------------------------Process required-------------------------------------------->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="header-title"><b>Process Content</b></h4>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Section Title</label>
                                    <input type="text" class="form-control" name="Section_title_pro" value="">
                                </div>
                            </div> 
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Process Content</label>
                                    <textarea class="form-control trumbowyg" name="process_content" rows="2" ></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Process List Title</label>
                                    <input type="text" class="form-control" name="process_list_title" value="">
                                </div>
                            </div> 

                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Process List</label>
                                    <div id="process_list_add_more" style="margin: 10px;">
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-11">
                                                <div class="row">
                                                    <input type="text" style="margin-bottom: 5px;" class="form-control" name="process_list[]" placeholder="Enter Process List here...">
                                                </div>
                                            </div>
                                            <div class="col-md-1"><i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 10px;" class="ri-add-circle-fill" id="add_process_list"></i></div>
                                            </div>
                                            </br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Process Other Content</label>
                                    <textarea class="form-control trumbowyg" name="other_content_pro" rows="2" ></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

<!---------------------------------Process required-------------------------------------------->

<!---------------------------------Compliances-------------------------------------------->

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="header-title"><b>Compliances Content</b></h4>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Section Title</label>
                                    <input type="text" class="form-control" name="Section_title_comp" value="">
                                </div>
                            </div> 
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Compliances Content</label>
                                    <textarea class="form-control trumbowyg" name="compliances_content" rows="2" ></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>compliances</label>
                                    <div id="compliances_add_more" style="margin: 10px;">
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-11">
                                                <div class="row">
                                                    <input type="text" style="margin-bottom: 5px;" class="form-control" name="compliances[]" placeholder="Enter compliances here...">
                                                    <span class="glyphicon form-control-feedback"></span>
                                                    <input class="form-control" name="compliances_description[]" placeholder="Enter compliances here...">
                                                </div>
                                            </div>
                                            <div class="col-md-1"><i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 10px;" class="ri-add-circle-fill" id="add_compliances"></i></div>
                                            </div>
                                            </br>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Compliances Other Content</label>
                                    <textarea class="form-control trumbowyg" name="other_content_comp" rows="2" ></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


<!---------------------------------Compliances-------------------------------------------->

<!---------------------------------Our Assistance-------------------------------------------->

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="header-title"><b>Assistance Content</b></h4>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Section Title</label>
                                    <input type="text" class="form-control" name="Section_title_asst" value="">
                                </div>
                            </div> 
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Assistance Content</label>
                                    <textarea class="form-control trumbowyg" name="assistance_content" rows="2" ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<!---------------------------------Our Assistance-------------------------------------------->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="header-title"><b>FAQ's</b></h4>
                                <hr>
                            </div>                                                 

                            {{--<div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Focus Area</label>
                                    <select class="select2 form-select" name="focus_area[]" multiple>
                                        <option value="" disabled>Select Focus Area</option>
                                        @foreach($practicearea as $row)
                                            <option value="{{ $row->id }}">{{ $row->title }}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div> --}} 
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>FAQs</label>
                                    <div id="faq_add_more" style="margin: 10px;">
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-11">
                                                <div class="row">
                                                    <input type="text" style="margin-bottom: 5px;" class="form-control" name="faq[]" placeholder="Enter Question here...">
                                                    <span class="glyphicon form-control-feedback"></span>
                                                    <textarea id="trumbowyg_0" class="form-control" name="faq_description[]" rows="2" placeholder="Enter Answer here..."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-1"><i style="font-size: 25px; color: #0b0; cursor: pointer; margin-left: 10px;" class="ri-add-circle-fill" id="add_faq"></i></div>
                                            </div>
                                            </br>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                                                                                                                                                                  
                        </div>                                      
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="header-title">SEO</h4>
                            <hr>
                        </div> 
                        <div class="col-sm-12">
                            <div class="form-group mb-3">
                                <label>Meta Title <span class="red">*</span></label>
                                <input type="text" class="form-control" name="meta_title" value="" required>
                            </div>
                        </div> 
                        <div class="col-sm-12">
                            <div class="form-group mb-3">
                                <label>Meta Description <span class="red">*</span></label>
                                <textarea class="form-control" name="meta_description" rows="3" required></textarea>
                            </div>
                        </div>                    
                    </div>
                </div>                
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <h4 class="header-title"><b>Image</b></h4>
                            <hr>
                        </div> 
                        <div class="col-sm-12">
                            <div class="form-group mb-3">
                                <label>Breadcrumb Image  <span class="font-size11">(Max file size 80kb - 1125*196)</span></label>
                                <input class="form-control" type="file" id="breadcrumb_image" name="breadcrumb_image">
                            </div>
                        </div>                    
                        <div class="col-sm-12">
                            <div class="form-group mb-3">
                                <label>Thumnail Icon <span class="font-size11">(Max file size 5kb - 70*70)</span></label></label>
                                <input class="form-control" type="file" id="image" name="image">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-3">
                                <label>Alt Thumnail Image</label>
                                <input type="text" class="form-control" name="alt_thumnail_image" value="" >
                            </div>
                        </div>
                        {{-- 
                        <div class="col-sm-12">
                            <div class="form-group mb-3">
                                <label>Section Image <span class="font-size11">(Max file size 80kb - 1125*460)</span></label>
                                <input class="form-control" type="file" id="section_image" name="section_image">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-3">
                                <label>Alt Section Image</label>
                                <input type="text" class="form-control" name="alt_section_image" value="">
                            </div>
                        </div> --}}                                        
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
                                <button type="submit" class="btn btn-block btn-primary">Create</button>
                            </div>
                        </div>                    
                    </div>
                </div>                
            </div>               
        </div>
    </form>
</section>


<script>
$(document).ready(function() {
    initValidate('#add_practicearea_form');
    initSelect2('.select2');
    initTrumbowyg('.trumbowyg');
    initTrumbowyg('#trumbowyg_0');
});

$("#add_practicearea_form").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, responseHandler);
});

var responseHandler = function(response) {
    location.reload();
}

function remove_faq(_this) {
    _this.closest(".faq").remove();
}

function remove_progress_bar(_this) {
    _this.closest(".progress_bar").remove();
}

function remove_Content_list(_this) {
    _this.closest(".Content_list").remove();
}

function remove_eligibility_list(_this) {
    _this.closest(".eligibility_list").remove();
}

function remove_doc_list(_this) {
    _this.closest(".doc_list").remove();
}

function remove_process_list(_this) {
    _this.closest(".process_list").remove();
}

function remove_compliances(_this) {
    _this.closest(".compliances").remove();
}



var textareaIdCounter = 0;

$("#add_faq").on("click", function() {
    textareaIdCounter++;

    var newFaq = `
        <div class="faq form-group">
            <div class="row" data-id="${textareaIdCounter}">
                <div class="col-md-11">
                    <div class="row">
                        <input type="text" style="margin-bottom: 3px;" class="form-control" name="faq[]" placeholder="Enter Question here...">
                        <span class="glyphicon form-control-feedback"></span>
                        <textarea id="trumbowyg_${textareaIdCounter}" class="trumbowyg form-control" name="faq_description[]" rows="2" placeholder="Enter Answer here..."></textarea>
                    </div>
                </div>
                <div class="col-md-1"><i style="font-size: 25px; color: red; cursor: pointer; margin-left: 10px;" class="ri-delete-bin-2-fill" onclick="remove_faq($(this));"></i></div>
            </div>
            </br>
        </div>
    `;

    $("#faq_add_more").append(newFaq);
    initTrumbowyg(`#trumbowyg_${textareaIdCounter}`);
});


$("#add_progress_bar").on("click", function() {

    var new_progress_bar = `
        <div class="progress_bar form-group">
            <div class="row">
                <div class="col-md-11">
                    <div class="row">
                        <input type="text" style="margin-bottom: 3px;" class="form-control" name="progress_bar[]" placeholder="Enter Title here...">
                        <span class="glyphicon form-control-feedback"></span>
                        <input type="text" class="form-control" name="progress_bar_description[]" placeholder="Enter Description here...">
                    </div>
                </div>
                <div class="col-md-1"><i style="font-size: 25px; color: red; cursor: pointer; margin-left: 10px;" class="ri-delete-bin-2-fill" onclick="remove_progress_bar($(this));"></i></div>
            </div>
            </br>
        </div>
    `;

    $("#progress_bar_add_more").append(new_progress_bar);
});

$("#add_Content_list").on("click", function() {

var new_Content_list = `
    <div class="Content_list form-group">
        <div class="row">
            <div class="col-md-11">
                <div class="row">
                    <input type="text" style="margin-bottom: 3px;" class="form-control" name="Content_list[]" placeholder="Enter Content List here...">
                </div>
            </div>
            <div class="col-md-1"><i style="font-size: 25px; color: red; cursor: pointer; margin-left: 10px;" class="ri-delete-bin-2-fill" onclick="remove_Content_list($(this));"></i></div>
        </div>
        </br>
    </div>
`;

$("#Content_list_add_more").append(new_Content_list);
});

$("#add_eligibility_list").on("click", function() {

var new_eligibility_list = `
    <div class="eligibility_list form-group">
        <div class="row">
            <div class="col-md-11">
                <div class="row">
                    <input type="text" style="margin-bottom: 3px;" class="form-control" name="eligibility_list[]" placeholder="Enter Eligibility List here...">
                </div>
            </div>
            <div class="col-md-1"><i style="font-size: 25px; color: red; cursor: pointer; margin-left: 10px;" class="ri-delete-bin-2-fill" onclick="remove_eligibility_list($(this));"></i></div>
        </div>
        </br>
    </div>
`;

$("#eligibility_list_add_more").append(new_eligibility_list);
});


$("#add_doc_list").on("click", function() {

var new_doc_list = `
    <div class="doc_list form-group">
        <div class="row">
            <div class="col-md-11">
                <div class="row">
                    <input type="text" style="margin-bottom: 3px;" class="form-control" name="doc_list[]" placeholder="Enter Documents Required List here...">
                </div>
            </div>
            <div class="col-md-1"><i style="font-size: 25px; color: red; cursor: pointer; margin-left: 10px;" class="ri-delete-bin-2-fill" onclick="remove_doc_list($(this));"></i></div>
        </div>
        </br>
    </div>
`;

$("#doc_list_add_more").append(new_doc_list);
});

$("#add_process_list").on("click", function() {

var new_process_list = `
    <div class="process_list form-group">
        <div class="row">
            <div class="col-md-11">
                <div class="row">
                    <input type="text" style="margin-bottom: 3px;" class="form-control" name="process_list[]" placeholder="Enter Process List here...">
                </div>
            </div>
            <div class="col-md-1"><i style="font-size: 25px; color: red; cursor: pointer; margin-left: 10px;" class="ri-delete-bin-2-fill" onclick="remove_process_list($(this));"></i></div>
        </div>
        </br>
    </div>
`;

$("#process_list_add_more").append(new_process_list);
});

$("#add_compliances").on("click", function() {

var new_compliances = `
    <div class="compliances form-group">
        <div class="row">
            <div class="col-md-11">
                <div class="row">
                    <input type="text" style="margin-bottom: 3px;" class="form-control" name="compliances[]" placeholder="Enter Compliances here...">
                    <span class="glyphicon form-control-feedback"></span>
                    <input type="text" class="form-control" name="compliances_description[]" placeholder="Enter compliances here...">
                </div>
            </div>
            <div class="col-md-1"><i style="font-size: 25px; color: red; cursor: pointer; margin-left: 10px;" class="ri-delete-bin-2-fill" onclick="remove_compliances($(this));"></i></div>
        </div>
        </br>
    </div>
`;

$("#compliances_add_more").append(new_compliances);
});
</script>