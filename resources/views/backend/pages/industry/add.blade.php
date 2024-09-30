<form id="add_industry_form" action="{{ route('manage.create_industry') }}" method="POST">
    @csrf
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>Name <span class="red">*</span></label>
            <input type="text" class="form-control" name="name" required>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>Industry Type <span class="red">*</span></label>
            <select name="type" id="type" class="form-control" required>
                <option value="1">Main</option>
                <option value="2">Sub</option>
                <option value="3">Child</option>
            </select>
        </div>
    </div>

    <div class="col-sm-12 d-none" id="sub-select">
        <div class="form-group mb-3">
            <label>Industry Main <span class="red">*</span></label>
            <select class="select2" name="sub" id="sub" class="form-control" required>
                @php $industry_sub = $industry->where('main', 1)  @endphp
                @foreach($industry_sub as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="col-sm-12 d-none" id="child-select" >
        <div class="form-group mb-3">
            <label>Industry Sub <span class="red">*</span></label>
            <select class="select2" name="child" id="child" class="form-control" required>
                @php $industry_child = $industry->where('main_partent_id','!=', 0)  @endphp
                @foreach($industry_child as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    {{-- <div class="col-sm-12">
        <div class="form-group mb-3">
            <label>Status <span class="red">*</span></label>
            <select name="status" class="form-control" required>
                <option value="1">Activate</option>
                <option value="0">Deactivate</option>
            </select>
        </div>
    </div> --}}
    <div class="col-sm-12">
        <div class="form-group mb-3 text-end">
            <button type="submit" class="btn btn-block btn-primary main_button1">Submit</button>
        </div>
    </div>
</form>



<script>
    $(document).ready(function() {
        initValidate('#add_industry_form');
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

    });


    $("#add_industry_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    var responseHandler = function(response) {
        location.reload();
    }
</script>
