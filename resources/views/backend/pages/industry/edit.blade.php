<form id="edit_industry_form" action="{{ route('manage.update_industry') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $industry->id }}">
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>Name <span class="red">*</span></label>
            <input type="text" class="form-control" name="name" value="{{ $industry->name  }}" required>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>Industry Type <span class="red">*</span></label>
            <select name="type" id="type" class="form-control" required>
                <option value="1" @if($industry->main != 0) selected @endif>Main</option>
                <option value="2" @if($industry->main_partent_id != 0) selected @endif>Sub</option>
                <option value="3" @if($industry->sub_parent_id != 0) selected @endif>Child</option>
            </select>
        </div>
    </div>

    <div class="col-sm-12 d-none" id="sub-select">
        <div class="form-group mb-3">
            <label>Industry Main <span class="red">*</span></label>
            <select class="select2" name="sub" id="sub" class="form-control" required>
                @php $industry_sub = $all_industry->where('main', 1)  @endphp
                @foreach($industry_sub as $row)
                    <option value="{{ $row->id }}" @if($industry->main_partent_id == $row->id) selected @endif>{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="col-sm-12 d-none" id="child-select" >
        <div class="form-group mb-3">
            <label>Industry Sub <span class="red">*</span></label>
            <select class="select2" name="child" id="child" class="form-control" required>
                @php $industry_child = $all_industry->where('main_partent_id','!=', 0)  @endphp
                @foreach($industry_child as $row)
                    <option value="{{ $row->id }}" @if($industry->sub_parent_id == $row->id) selected @endif">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>


    {{-- <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>Status <span class="red">*</span></label>
            <select name="status" class="form-control" required>
                <option value="1" {{ $industry->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $industry->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
    </div> --}}
    <div class="text-end">
    <button type="submit" class="btn btn-primary main_button1">Update</button>
</div>
</form>

<script>
$(document).ready(function() {
    initValidate('#edit_industry_form');
    initTrumbowyg('.trumbowyg');
    initSelect2('.select2');
});


$(document).ready(function() {    
    const typeSelect = document.getElementById('type');
    const subSelectDiv = document.getElementById('sub-select');
    const childSelectDiv = document.getElementById('child-select');
    const subSelect = document.getElementById('sub');
    const childSelect = document.getElementById('child');

    typeSelect.addEventListener('change', function() {
        const selectedValue = this.value;

        if (selectedValue == '2') {
            subSelectDiv.classList.remove('d-none');
            subSelect.setAttribute('required', 'required');
            
            childSelectDiv.classList.add('d-none');
            childSelect.removeAttribute('required');
        } else if (selectedValue == '3') {
            childSelectDiv.classList.remove('d-none');
            childSelect.setAttribute('required', 'required');
            
            subSelectDiv.classList.add('d-none');
            subSelect.removeAttribute('required');
        } else {
            subSelectDiv.classList.add('d-none');
            subSelect.removeAttribute('required');
            
            childSelectDiv.classList.add('d-none');
            childSelect.removeAttribute('required');
        }
    });



    function check_selection() {
        const selectedValue = typeSelect.value;
        if (selectedValue == '2') {
                subSelectDiv.classList.remove('d-none');
                subSelect.setAttribute('required', 'required');
                
                childSelectDiv.classList.add('d-none');
                childSelect.removeAttribute('required');
            } else if (selectedValue == '3') {
                childSelectDiv.classList.remove('d-none');
                childSelect.setAttribute('required', 'required');
                
                subSelectDiv.classList.add('d-none');
                subSelect.removeAttribute('required');
            } else {
                subSelectDiv.classList.add('d-none');
                subSelect.removeAttribute('required');
                
                childSelectDiv.classList.add('d-none');
                childSelect.removeAttribute('required');
            }
    }


    check_selection();
});



$("#edit_industry_form").submit(function(e) {
    var form = $(this);
    ajaxSubmit(e, form, responseHandler);
});

var responseHandler = function(response) {
    location.reload();
}
</script>