@extends('frontend.layouts.app')


@section('page.content')


{{-- <style>
    .dropdown {
        position: relative;
        display: inline-block;
        width: 500px;
    }
    .dropdown-select {
        padding: 10px;
        border: 1px solid #ccc;
        cursor: pointer;
        background-color: #f9f9f9;
        text-align: center;
        width: 100%;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        padding: 0px;
        z-index: 1;
        width: 100%;
        max-height: 200px; /* max height for scroll */
        overflow-y: auto;  /* enable vertical scroll */
    }
    .dropdown-content section {
        margin-bottom: 20px;
    }
    .dropdown-content input[type="text"] {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
    }
    .dropdown-content label {
        display: block;
        margin-bottom: 5px;
        cursor: pointer;
    }
    .dropdown-content .select-all {
        margin-bottom: 10px;
        cursor: pointer;
        padding: 10px 10px 0px 10px;
    }
    .dropdown-content .languages {
        list-style: none;
        padding: 0;
        padding-left: 30px;
        margin-top: 10px;
    }
    .dropdown-content .languages li {
        margin-bottom: 5px;
    }



    .custom-dropdown {
        position: relative;
        display: inline-block;
        width: 500px;
    }
    .custom-dropdown-select {
        padding: 10px;
        border: 1px solid #ccc;
        cursor: pointer;
        background-color: #f9f9f9;
        text-align: center;
        width: 100%;
    }
    .custom-dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        padding: 0px;
        z-index: 1;
        width: 100%;
        max-height: 200px; /* max height for scroll */
        overflow-y: auto;  /* enable vertical scroll */
    }
    .custom-dropdown-content section {
        margin-bottom: 20px;
    }
    .custom-dropdown-content input[type="text"] {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
    }
    .custom-dropdown-content label {
        display: block;
        margin-bottom: 5px;
        cursor: pointer;
    }
    .custom-dropdown-content .select-all {
        margin-bottom: 10px;
        cursor: pointer;
        padding: 10px 10px 0px 10px;
    }
    .custom-dropdown-content .languages {
        list-style: none;
        padding: 0;
        padding-left: 30px;
        margin-top: 10px;
    }
    .custom-dropdown-content .languages li {
        margin-bottom: 5px;
    }



</style> --}}




<style>
    /* styles.css */
    #dropdown-container {
        margin: 20px;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-toggle {
        background-color: #007bff;
        color: white;
        padding: 10px;
        border: none;
        cursor: pointer;
        border-radius: 4px;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        z-index: 1000;
        width: 300px;
        max-height: 300px;
        overflow-y: auto;
        padding: 10px;
        box-sizing: border-box;
    }

    .title {
        font-weight: bold;
        margin-top: 10px;
    }

    .option {
        margin-top: 10px;
    }

    .child-options {
        margin-left: 20px;
    }

    #selected-values {
        margin-top: 20px;
        font-size: 16px;
        color: #333;
    }

    /* #selected-values-ids {
        margin-top: 10px;
        font-size: 16px;
        color: #333;
    } */

    #dropdown-container-new {
        margin: 20px;
    }

    .dropdown-new {
        position: relative;
        display: inline-block;
    }

    .dropdown-toggle-new {
        background-color: #007bff;
        color: white;
        padding: 10px;
        border: none;
        cursor: pointer;
        border-radius: 4px;
    }

    .dropdown-menu-new {
        display: none;
        position: absolute;
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        width: 300px;
        max-height: 300px;
        overflow-y: auto;
        padding: 10px;
        box-sizing: border-box;
    }

    .title-new {
        font-weight: bold;
        margin-top: 10px;
    }

    .option-new {
        margin-top: 10px;
    }

    .child-options-new {
        margin-left: 20px;
    }

    #selected-values-new {
        margin-top: 20px;
        font-size: 16px;
        color: #333;
    }

</style>

<div class="login_logo">
    <a href="/"><img src="/assets/images/namalot_logo.png" /></a>
</div>
<!----------========================== Registration ============----------->

<section class="auth_form">
    <div class="fluid-container">
        <div class="row align-items-center">

            <div class="col-md-4">
                <img class="register_image" src="/assets/images/register_image2.png">
            </div>

            <div class="col-md-8 pddleft50">

                @include('frontend.pages.registration.registration_form')

            </div>

            
        </div>
    </div>
</section>

@endsection


@section('component.scripts')

    {{-- <script>

        const labelText = [];
        const industrialList = document.getElementById('list-industry');
        function processIndustries(input) {

            // Clear the container
            industrialList.innerHTML = '';

            // Check if the input is empty or blank
            if (!input.trim()) {
                industrialList.classList.add('d-none');
                return;
            }

            // Split and trim the input
            const industries = input.split(',').map(industry => industry.trim());

            // Create and append div elements
            industries.forEach(industry => {
                const div = document.createElement('li');
                div.textContent = industry;
                industrialList.appendChild(div);
            });

            // Remove d-none class
            industrialList.classList.remove('d-none');
        }


        function toggleDropdown() {
            const dropdownContent = document.querySelector('.dropdown-content');
            dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
        }

        function toggleSelectAll(element, label) {
            const section = element.closest('section');
            const checkboxes = section.querySelectorAll('.language-option');
            checkboxes.forEach(cb => cb.checked = element.checked);
            updateLabel(label);
        }

        function updateLabel(label = '') {
            const select = document.querySelector('.dropdown-select');
            const selectedLanguages = [];
            const selectedLanguagesId = [];
            const selectedLabels = new Set();

            // Check all programming language options
            const programmingOptions = document.querySelectorAll(`.language-option.${label}`);
            const allProgrammingChecked = Array.from(programmingOptions).every(cb => cb.checked);

            if (allProgrammingChecked || Array.from(programmingOptions).some(cb => cb.checked)) {
                document.getElementById(`select-all-${label}`).checked = true;
                if (!labelText.includes(label)) {
                    labelText.push(label);
                }
                selectedLabels.add(`${labelText.join(', ')}`);
            } else {
                const index = labelText.indexOf(label);
                if (index > -1) {
                    labelText.splice(index, 1);
                }
                document.getElementById(`select-all-${label}`).checked = false;
            }

            // console.log(labelText);

            // Collect selected individual languages and their ids
            document.querySelectorAll('.language-option:checked').forEach(cb => {
                selectedLanguages.push(cb.value);
                selectedLanguagesId.push(cb.getAttribute('dataid'));
            });

            // Update the dropdown label
            select.innerHTML = '';
            const option = document.createElement('option');
            if (selectedLanguages.length > 0) {
                const optionText = `${Array.from(labelText).join(', ')}, ${selectedLanguages.join(', ')}`;

                option.text = 'Select Industry';

                // option.text = optionText;
                option.value = `${selectedLanguagesId.join(', ')}`;
                option.selected = true;
            } else {
                option.text = 'Select Industry';
                industrialList.classList.add('d-none');

            }
            select.add(option);


            const listIndustryDiv = `${Array.from(labelText).join(', ')}, ${selectedLanguages.join(', ')}`;

            console.log(listIndustryDiv);
            processIndustries(listIndustryDiv);



            if (selectedLanguages.length <= 0) {
                industrialList.classList.add('d-none');
            }
        }

        // Hide dropdown if clicked outside
        document.addEventListener('click', function(event) {
            const dropdown = document.querySelector('.dropdown');
            if (!dropdown.contains(event.target)) {
                document.querySelector('.dropdown-content').style.display = 'none';
                // document.querySelector('.dropdown-content1').style.display = 'none';
            }
        });


        function check_option(){
            const checkboxes = document.querySelectorAll('.language-option');
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    const dataparent = checkbox.getAttribute('dataparent');
                    updateLabel(dataparent);
                }
            });

        }

        check_option();

    </script>


    <script>
        const customLabelText = [];
        const custom_industrialList = document.getElementById('list-Preferred-industry');

        function processPreferredIndustries(input) {
            
            // Clear the container
            custom_industrialList.innerHTML = '';

            // Check if the input is empty or blank
            if (!input.trim()) {
                custom_industrialList.classList.add('d-none');
                return;
            }

            // Split and trim the input
            const industries = input.split(',').map(industry => industry.trim());

            // Create and append div elements
            industries.forEach(industry => {
                const div = document.createElement('li');
                div.textContent = industry;
                custom_industrialList.appendChild(div);
            });

            // Remove d-none class
            custom_industrialList.classList.remove('d-none');
        }


        function toggleCustomDropdown() {
            const dropdownContent = document.querySelector('.custom-dropdown-content');
            dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
        }

        function toggleCustomSelectAll(element, label1) {
            const section = element.closest('section');
            const checkboxes = section.querySelectorAll('.custom-language-option');
            checkboxes.forEach(cb => cb.checked = element.checked);
            updateCustomLabel(label1);
        }

        function updateCustomLabel(label1 = '') {

            const select = document.querySelector('.custom-dropdown-select');
            const selectedLanguages = [];
            const selectedLanguagesId = [];
            const selectedLabels = new Set();

            // Check all programming language options
            const programmingOptions = document.querySelectorAll(`.custom-language-option.${label1}`);
            const allProgrammingChecked = Array.from(programmingOptions).every(cb => cb.checked);

            if (allProgrammingChecked || Array.from(programmingOptions).some(cb => cb.checked)) {
                document.getElementById(`custom-select-all-${label1}`).checked = true;
                if (!customLabelText.includes(label1)) {
                    customLabelText.push(label1);
                }
                selectedLabels.add(`${customLabelText.join(', ')}`);
            } else {
                const index1 = customLabelText.indexOf(label1);
                if (index1 > -1) {
                    customLabelText.splice(index1, 1);
                }
                document.getElementById(`custom-select-all-${label1}`).checked = false;
            }

            // Collect selected individual languages and their ids
            document.querySelectorAll('.custom-language-option:checked').forEach(cb => {
                selectedLanguages.push(cb.value);
                selectedLanguagesId.push(cb.getAttribute('data-id'));
            });

            // Update the dropdown label
            select.innerHTML = '';
            const option = document.createElement('option');
            if (selectedLanguages.length > 0) {
                const optionText = `${Array.from(customLabelText).join(', ')}, ${selectedLanguages.join(', ')}`;
                option.text = 'Select Preferred Industry';

                // option.text = optionText;
                option.value = `${selectedLanguagesId.join(', ')}`;
                option.selected = true;
            } else {
                option.text = 'Select Preferred Industry';
            }
            select.add(option);

            const listPreIndustryDiv = `${Array.from(customLabelText).join(', ')}, ${selectedLanguages.join(', ')}`;

            console.log(listPreIndustryDiv);
            processPreferredIndustries(listPreIndustryDiv);

            if (selectedLanguages.length <= 0) {
                custom_industrialList.classList.add('d-none');
            }
        }

        // Hide dropdown if clicked outside
        document.addEventListener('click', function(event) {
            const dropdown = document.querySelector('.custom-dropdown');
            if (!dropdown.contains(event.target)) {
                document.querySelector('.custom-dropdown-content').style.display = 'none';
            }
        });

        function checkCustomOption(){
            const checkboxes = document.querySelectorAll('.custom-language-option');
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    const dataParent = checkbox.getAttribute('data-parent');
                    updateCustomLabel(dataParent);
                }
            });
        }

        checkCustomOption();
    </script> --}}



    <script>

        const industrialList = document.getElementById('list-industry');
        
        function processIndustries(input) {

            // Clear the container
            industrialList.innerHTML = '';

            // Check if the input is empty or blank
            if (!input.trim()) {
                industrialList.classList.add('d-none');
                return;
            }

            // Split and trim the input
            const industries = input.split(',').map(industry => industry.trim());

            // Create and append div elements
            industries.forEach(industry => {
                const div = document.createElement('li');
                div.textContent = industry;
                industrialList.appendChild(div);
            });

            // Remove d-none class
            industrialList.classList.remove('d-none');
        }


        $(document).ready(function () {
            // Toggle dropdown visibility
            $('.dropdown-toggle').click(function () {
                $('.dropdown-menu').toggle();
            });

            // Function to check/uncheck main option based on child options
            function updateMainCheckbox(mainCheckbox) {
                var anyChildChecked = false;

                // Check if any child checkboxes are checked
                $(mainCheckbox).siblings('.child-options').find('input[type="checkbox"]').each(function () {
                    if ($(this).prop('checked')) {
                        anyChildChecked = true;
                    }
                });

                // Update the main checkbox based on child checkboxes
                $(mainCheckbox).prop('checked', anyChildChecked);
            }

            // Function to update selected values
            function updateSelectedValues() {
                var selectedLabels = [];
                var selectedIds = [];
                $('#dropdown-container').find('input[type="checkbox"]:checked').each(function () {
                    selectedLabels.push($(this).next('label').text());
                    selectedIds.push($(this).data('id'));
                });
                // $('#selected-values').text('Selected values: ' + selectedLabels.join(', '));
                $('#selected-values-ids').val(selectedIds.join(', '));

                processIndustries(selectedLabels.join(', '));

                if (selectedLabels.length <= 0) {
                    industrialList.classList.add('d-none');
                }
            }

            // Event listener for child checkboxes
            $('#dropdown-container').on('change', '.child-options input[type="checkbox"]', function () {
                var mainCheckbox = $(this).closest('.option').find('input[type="checkbox"]').first();
                updateMainCheckbox(mainCheckbox);
                updateSelectedValues();
            });

            // Event listener for main checkboxes
            $('#dropdown-container').on('change', '.option > input[type="checkbox"]', function () {
                var isChecked = $(this).prop('checked');
                $(this).siblings('.child-options').find('input[type="checkbox"]').prop('checked', isChecked);
                updateSelectedValues();
            });

            // Close dropdown when clicking outside
            $(document).click(function(event) {
                if (!$(event.target).closest('.dropdown').length) {
                    $('.dropdown-menu').hide();
                }
            });

            updateSelectedValues();
        });

    </script>


    <script>
        const preferredIndustryList = document.getElementById('list-preferred-industry');

        function processPreferredIndustries(input) {
            preferredIndustryList.innerHTML = '';

            if (!input.trim()) {
                preferredIndustryList.classList.add('d-none-new');
                return;
            }

            const industries = input.split(',').map(industry => industry.trim());

            industries.forEach(industry => {
                const li = document.createElement('li');
                li.textContent = industry;
                preferredIndustryList.appendChild(li);
            });

            preferredIndustryList.classList.remove('d-none-new');
        }

        $(document).ready(function () {
            $('.dropdown-toggle-new').click(function () {
                $('.dropdown-menu-new').toggle();
            });

            function updateMainCheckbox(mainCheckbox) {
                var anyChildChecked = false;

                $(mainCheckbox).siblings('.child-options-new').find('input[type="checkbox"]').each(function () {
                    if ($(this).prop('checked')) {
                        anyChildChecked = true;
                    }
                });

                $(mainCheckbox).prop('checked', anyChildChecked);
            }

            function updateSelectedValues() {
                var selectedLabels = [];
                var selectedIds = [];
                $('#dropdown-container-new').find('input[type="checkbox"]:checked').each(function () {
                    selectedLabels.push($(this).next('label').text());
                    selectedIds.push($(this).data('id'));
                });
                $('#selected-values-ids-new').val(selectedIds.join(', '));

                processPreferredIndustries(selectedLabels.join(', '));

                if (selectedLabels.length <= 0) {
                    preferredIndustryList.classList.add('d-none-new');
                }
            }

            $('#dropdown-container-new').on('change', '.child-options-new input[type="checkbox"]', function () {
                var mainCheckbox = $(this).closest('.option-new').find('input[type="checkbox"]').first();
                updateMainCheckbox(mainCheckbox);
                updateSelectedValues();
            });

            $('#dropdown-container-new').on('change', '.option-new > input[type="checkbox"]', function () {
                var isChecked = $(this).prop('checked');
                $(this).siblings('.child-options-new').find('input[type="checkbox"]').prop('checked', isChecked);
                updateSelectedValues();
            });

            $(document).click(function(event) {
                if (!$(event.target).closest('.dropdown-new').length) {
                    $('.dropdown-menu-new').hide();
                }
            });

            updateSelectedValues();
        });
    </script>



    <script>

    $('#skills-data').on('focusout', function() {
        $('#option-skills').addClass('d-none');
    });

    function skill_dropdown(){
        $('#skills-data').select2({
            placeholder: 'Select Key Relevant Skills',
            minimumInputLength: 2,
            // tags: true,
            ajax: {
                url: '{{ url(route('get.skills')) }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term // search term
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.name
                            }
                        })
                    };
                },
                cache: true
            }
        });
    }

    $(document).ready(function() {
        let selectedSkillsOrder = [];
        let updating = false; // Flag to prevent recursive loop

        skill_dropdown();

        $('#skills-data').on('change', function() {
            if (updating) return; // Prevent recursive call
            const selectedSkills = $(this).val() || [];
            // console.log(selectedSkills);
            selectedSkillsOrder = selectedSkillsOrder.filter(skill => selectedSkills.includes(skill));
            selectedSkills.forEach(skill => {
                if (!selectedSkillsOrder.includes(skill)) {
                    selectedSkillsOrder.push(skill);
                }
            });
            // console.log(selectedSkillsOrder);
            renderSkills();
            loadRelatedSkills(selectedSkillsOrder[selectedSkillsOrder.length - 1]);
        });

        function renderSkills() {
            updating = true; // Set flag to prevent recursive call
            const $select = $('#skills-data');
            const options = selectedSkillsOrder.map(skill => `<option value="${skill}" selected>${skill}</option>`);
            $select.html(options.join('')).trigger('change');
            updating = false; // Reset flag
        }

        function loadRelatedSkills(skill) {
            if (skill) {
                $.ajax({
                    url: '/related-skills',
                    data: { skill: skill },
                    success: function(data) {
                        let optionsHtml = '';
                        data.forEach(function(skill) {
                            optionsHtml += '<li class="list-group-item">' + skill.name + '</li>';
                        });
                        $('#option-skills').html('<ul class="list-group">' + optionsHtml + '</ul>').removeClass('d-none');
                    }
                });
            } else {
                $('#option-skills').addClass('d-none');
            }
        }

        $('#option-skills').on('click', 'li', function() {
            const skillText = $(this).text();
            if (!selectedSkillsOrder.includes(skillText)) {
                selectedSkillsOrder.push(skillText);
                renderSkills();
            }
            $('#option-skills').addClass('d-none');
            loadRelatedSkills(skillText)
        });
    });

    $(document).on('click', function(event) {
        var $optionSkills = $('#option-skills');
        if (!$optionSkills.is(event.target) && $optionSkills.has(event.target).length === 0) {
            $optionSkills.addClass('d-none');
        }
    });

    // // For demonstration purposes, remove the d-none class when the option-skills div is clicked
    // $('#option-skills').on('click', function(event) {
    //     $(this).removeClass('d-none');
    // });

    document.getElementById('Mobile').addEventListener('input', function (event) {
        this.value = this.value.replace(/[^0-9+ ]/g, '');
    });

    document.getElementById('Current-Salary').addEventListener('input', function (event) {
        this.value = this.value.replace(/[^0-9 ]/g, '');
    });

    document.getElementById('Expected-Salary').addEventListener('input', function (event) {
        this.value = this.value.replace(/[^0-9 ]/g, '');
    });

    function next_page_preview(step_info){
        var step = {{ Session::has('step') ? Session::get('step') : '0' }};
        
        var elements = [
            'user-add-details',
            'personal-details',
            'work-details-div',
            'cirtificate_one',
            'availibility_one',
            'social_media_div',
            'doc_verify_div',
            'thankyou-page'
        ];

        // Update the step value if step_info is passed
        if (step_info !== undefined) {
            step = step_info;
        }

        // console.log('step');
        // console.log(step);

        // Hide all elements
        elements.forEach(function(id) {
            document.getElementById(id).classList.remove('fade-in');
            document.getElementById(id).classList.add('d-none');
            document.getElementById(id).classList.add('fade-out');
        });

        // Show elements based on step
        switch(step) {
            case 1:
                document.getElementById('user-add-details').classList.remove('d-none');
                document.getElementById('user-add-details').classList.remove('fade-out');
                document.getElementById('user-add-details').classList.add('fade-in');
                break;
            case 2:
                document.getElementById('personal-details').classList.remove('d-none');
                document.getElementById('personal-details').classList.remove('fade-out');
                document.getElementById('personal-details').classList.add('fade-in');
                break;
            case 3:
                document.getElementById('work-details-div').classList.remove('d-none');
                document.getElementById('work-details-div').classList.remove('fade-out');
                document.getElementById('work-details-div').classList.add('fade-in');
                break;
            case 4:
                document.getElementById('cirtificate_one').classList.remove('d-none');
                document.getElementById('cirtificate_one').classList.remove('fade-out');
                document.getElementById('cirtificate_one').classList.add('fade-in');
                break;
            case 5:
                document.getElementById('availibility_one').classList.remove('d-none');
                document.getElementById('availibility_one').classList.remove('fade-out');
                document.getElementById('availibility_one').classList.add('fade-in');
                break;
            case 6:
                document.getElementById('social_media_div').classList.remove('d-none');
                document.getElementById('social_media_div').classList.remove('fade-out');
                document.getElementById('social_media_div').classList.add('fade-in');
                break;
            case 7:
                document.getElementById('doc_verify_div').classList.remove('d-none');
                document.getElementById('doc_verify_div').classList.remove('fade-out');
                document.getElementById('doc_verify_div').classList.add('fade-in');
                break;
            case 8:
                document.getElementById('thankyou-page').classList.remove('d-none');
                document.getElementById('thankyou-page').classList.remove('fade-out');
                document.getElementById('thankyou-page').classList.add('fade-in');
                break;
            default:
                document.getElementById('user-add-details').classList.remove('d-none');
                document.getElementById('user-add-details').classList.remove('fade-out');
                document.getElementById('user-add-details').classList.add('fade-in');
                break;
        }

        // initSelect2('.select21');

        initSelect3('.old-select2');
        initSelect4('#industry');
        initSelect4('#pref_industry');

        // check_option();
        // checkCustomOption();
    }




    $(document).ready(function() {
        // Set up an event listener for changes on the .select2 element
        $('.select2').on('change', function() {
            // Check if the .select2 element has a value
            if ($(this).val()) {
                // Hide the nearest #pref_emp_type-error element
                $(this).closest('.form-group').find('.invalid-feedback').addClass('d-none');
            } else {
                // Optionally, show the error element if no value is selected
                $(this).closest('.form-group').find('.invalid-feedback').removeClass('d-none');
            }
        });
    });


    // $(document).ready(function() {
    //     initSelect2('.select2');
    //     initTrumbowyg('.trumbowyg');
    // });


    $(document).ready(function() {
        // initSelect2('.select21');
        initSelect3('.old-select2');
        initSelect3('#industry');
        initSelect3('#pref_industry');
    });

    function back_to_privious(link){
        
        link.style.pointerEvents = 'none';
        link.style.opacity = 0.5;
        // Create an XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Specify the URL to hit using the route name
        var url = '{{ route("get-previous-page") }}';

        // Send a GET request to the URL asynchronously
        xhr.open('GET', url, true);
        xhr.send();

        setTimeout(function () {
            location.reload();
        }, 60);
    }

    /*--------------------- user info ------------------*/

        initValidate('#user-info');

        $('#user-info').on('submit', function(e){
            var form = $(this);
            ajax_form_submit(e, form, responseHandler_user_info);
        });

        var responseHandler_user_info = function (response) {
            /* var form = $('#user-info'); 
            
            form.find("input[type=text], input[type=email], input[type=password], textarea").val("");
            form.find("select").prop("selectedIndex", 0); */

            @if(Session::has('google_email') && Session::get('google_login') == 1)
                setTimeout(function () {
                    location.reload();
                }, 100);
            @else
                setTimeout(function () {
                    // location.reload();
                    $('#email_otp_model').modal('show');
                }, 100);
            @endif

            // Show resend OTP button after 30 seconds
            setTimeout(function() {
                var resendButton = document.getElementById('resendOTPButton');
                resendButton.style.display = 'block';
            }, 30000); // 30 seconds

        };

    /*--------------------- user info ------------------*/ 

    /*--------------------- email verify otp ------------------*/

        initValidate('#email-verify-otp');

        $('#email-verify-otp').on('submit', function(e){
            var form = $(this);
            ajax_form_submit(e, form, responseHandler_email_verify_otp);
        });

        var responseHandler_email_verify_otp = function (response) {
            var form = $('#email-verify-otp'); 
            
            form.find("input[type=text], input[type=email], input[type=password], textarea").val("");
            form.find("select").prop("selectedIndex", 0); 
            // setTimeout(function () {
            //     location.reload();
            // }, 100);
            $('#email_otp_model').modal('toggle');
            location.reload();
            // next_page_preview(2);
            
        };

        function close_Emai_modal() {
            $('#email_otp_model').modal('toggle');
        };
    /*--------------------- email verify otp ------------------*/ 

    /*--------------------- Resend-otp------------------*/    

        $(document).ready(function(){



            $('#resendOTPButton').click(function(e){
                e.preventDefault();

                var csrfToken = '{{ csrf_token() }}';

                $.ajax({
                    url: "{{ route('account.create', ['param' =>'resend-otp']) }}",
                    type: "Post",
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        toastr.success(response.response_message.message, response.response_message.response);
                    },
                    error: function(xhr, status, error) {
                        toastr.error(response.response_message.message, response.response_message.response);
                    }
                });
            });
        });

    /*--------------------- Resend-otp------------------*/  

    /*--------------------- personal info ------------------*/

        initValidate('#personal-info');

        $('#personal-info').on('submit', function(e){
            var form = $(this);
            ajax_form_submit(e, form, responseHandler_personal_info);
        });

        var responseHandler_personal_info = function (response) {
            var form = $('#personal-info'); 
            
            form.find("input[type=text], input[type=email], input[type=password], textarea").val("");
            form.find("select").prop("selectedIndex", 0); 
            // setTimeout(function () {
            //     location.reload();
            // }, 100);

            next_page_preview(3);
            skill_dropdown();
        };

    /*---------------------  personal info ------------------*/ 

    /*--------------------- personal work info ------------------*/

        initValidate('#personal-work-info');

        $('#personal-work-info').on('submit', function(e){
            var form = $(this);
            ajax_form_submit(e, form, responseHandler_personal_work_info);
        });

        var responseHandler_personal_work_info = function (response) {
            var form = $('#personal-work-info');

            form.find("input[type=text], input[type=email], input[type=password], textarea").val("");
            form.find("select").prop("selectedIndex", 0); 
            // setTimeout(function () {
            //     location.reload();
            // }, 100);

            next_page_preview(4);
        };

    /*---------------------  personal work info ------------------*/ 

    /*--------------------- skills-info ------------------*/

        initValidate('#skills-info');

        $('#skills-info').on('submit', function(e){
            var form = $(this);
            ajax_form_submit(e, form, responseHandler_skill_info);
        });

        var responseHandler_skill_info = function (response) {
            var form = $('#skills-info');

            form.find("input[type=text], input[type=email], input[type=password], textarea").val("");
            form.find("select").prop("selectedIndex", 0); 
            // setTimeout(function () {
            //     location.reload();
            // }, 100);

            next_page_preview(5);
        };

    /*---------------------  skills-info ------------------*/ 

    /*--------------------- Preferences-info ------------------*/

        initValidate('#preferences-info');

        $('#preferences-info').on('submit', function(e){
            var form = $(this);
            ajax_form_submit(e, form, responseHandler_preference_info);
        });

        var responseHandler_preference_info = function (response) {
            var form = $('#preferences-info');

            form.find("input[type=text], input[type=email], input[type=password], textarea").val("");
            form.find("select").prop("selectedIndex", 0); 
            // setTimeout(function () {
            //     location.reload();
            // }, 100);

            next_page_preview(6);
        };

    /*---------------------  preferences-info ------------------*/ 



    /*--------------------- social-media-info ------------------*/

        initValidate('#social-media-info');

        $('#social-media-info').on('submit', function(e){
            var form = $(this);
            ajax_form_submit(e, form, responseHandler_social_media_info);
        });

        var responseHandler_social_media_info = function (response) {
            var form = $('#social-media-info');
    
            form.find("input[type=text], input[type=email], input[type=password], textarea").val("");
            form.find("select").prop("selectedIndex", 0); 
            // setTimeout(function () {
            //     location.reload();
            // }, 100);

            next_page_preview(7);
        };

    /*---------------------  social-media-info ------------------*/ 
    
    /*--------------------- proceeding_info ------------------*/

        initValidate('#proceeding-info');

        $('#proceeding-info').on('submit', function(e){
            var form = $(this);
            ajax_form_submit(e, form, responseHandler_proceeding_info);
        });

        var responseHandler_proceeding_info = function (response) {
            $("input, textarea").val("");
            $("select option:first").prop("selected", !0);
            // setTimeout(function () {
            //     window.location.href = "{{ url(route('index')) }}";
            // }, 100);
            next_page_preview(8);
        };

    /*---------------------  proceeding_info ------------------*/ 

    next_page_preview();

    
    /*--------------------- duplicate forms inputs ------------------*/

    $(document).ready(function () {
            // Add row functionality
            $(document).on('click', '.add-row', function () {
                var newRow = $('.certificate-row').first().clone(); // Clone the first row
                newRow.find('input').val(''); // Clear input values in the cloned row
                newRow.find('.add-row').remove(); // Remove add button from the cloned row
                newRow.append('<div class="col-md-12 d-flex gap-3 mb-2"><button type="button" class="btn btn-success add-row">Add More +</button><button type="button" class="btn btn-danger remove-row">Remove</button></div>'); // Add new add and remove buttons
                $('.certificate-row').last().after(newRow); // Append the cloned row at the end
            });

            // Remove row functionality
            $(document).on('click', '.remove-row', function () {
                if ($('.certificate-row').length > 1) {
                    $(this).closest('.certificate-row').remove(); // Remove the closest row
                } else {
                    alert('At least one row is required.'); // Alert if only one row is left
                }
            });


            // Add row for Education
            $(document).on('click', '.add-edu-row', function () {
                var newRow = $('.education-row').first().clone(); // Clone the first row
                newRow.find('input').val(''); // Clear input values in the cloned row
                newRow.find('.add-edu-row').remove(); // Remove add button from the cloned row
                newRow.append('<div class="col-md-12 d-flex gap-3 mb-2"><button type="button" class="btn btn-success add-edu-row">Add More +</button><button type="button" class="btn btn-danger remove-edu-row">Remove</button></div>'); // Add new add and remove buttons
                $('.education-row').last().after(newRow); // Append the cloned row at the end
            });

            // Remove row functionality
            $(document).on('click', '.remove-edu-row', function () {
                if ($('.education-row').length > 1) {
                    $(this).closest('.education-row').remove(); // Remove the closest row
                } else {
                    alert('At least one row is required.'); // Alert if only one row is left
                }
            });

            // Add row for Education

        
            var rowIndex = $('.reference-row').length; // Initialize with the number of existing rows

            // Function to update IDs and initialize intlTelInput
            function updateIDsAndInitialize() {
                $('.reference-row').each(function(index) {
                    var phoneInput = $(this).find('.reference_phone');
                    phoneInput.attr('id', 'Phone' + (index + 1));
                    phoneInput.intlTelInput({
                        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                    });

                    document.getElementById('Phone' + (index + 1)).addEventListener('input', function (event) {
                        this.value = this.value.replace(/[^0-9+ ]/g, '');
                    });

                });
            }

            // Add row functionality for references
            $(document).on('click', '.add-reference-row', function () {
                var newRow = $('.reference-row').first().clone(); // Clone the first row
                newRow.find('input').val(''); // Clear input values in the cloned row
                newRow.find('.add-reference-row').remove(); // Remove add button from the cloned row
                newRow.append('<div class="col-md-12 d-flex gap-3 mb-2"><button type="button" class="btn btn-success add-reference-row">Add More +</button><button type="button" class="btn btn-danger remove-reference-row">Remove -</button></div>'); // Add new add and remove buttons
                $('.reference-row').last().after(newRow); // Append the cloned row at the end
                rowIndex++; // Increment row index
                updateIDsAndInitialize(); // Update IDs and initialize intlTelInput
            });

            // Remove row functionality for references
            $(document).on('click', '.remove-reference-row', function () {
                if ($('.reference-row').length > 1) {
                    $(this).closest('.reference-row').remove(); // Remove the closest row
                    rowIndex--; // Decrement row index
                    updateIDsAndInitialize(); // Update IDs and initialize intlTelInput
                } else {
                    alert('At least one reference is required.'); // Alert if only one row is left
                }
            });

            updateIDsAndInitialize(); // Initial ID update and intlTelInput initialization
    

        });

     /*--------------------- duplicate forms inputs ------------------*/
     
     
     /*--------------------- API forms ------------------*/
     
     $(document).ready(function () {
        var typingTimer;
        var typingDelay = 1200; // 1.2 seconds delay

        $('#pincode').on('keyup', function () {
            clearTimeout(typingTimer);
            var postalCode = $(this).val();

            if (postalCode.length === 0) {
                $('#country_name').val('');
                $('#city').val(''); 
                $('#state').val('');
            }


            if (postalCode.length > 0) {
                typingTimer = setTimeout(function () {
                    $.ajax({
                        url: 'https://secure.geonames.org/postalCodeSearchJSON',
                        dataType: 'json',
                        data: {
                            postalcode: postalCode,
                            country: '',
                            username: 'umair.makent'
                        },
                        success: function (data) {
                            if (data.postalCodes.length > 0) {
                                $('#country_name').val(data.postalCodes[0].countryCode).focus();
                                $('#city').val(data.postalCodes[0].adminName2).focus();
                                $('#state').val(data.postalCodes[0].adminName1).focus();
                                $('#pincode').focus();

                                // $('#placeName').val(data.postalCodes[0].placeName);

                                // Display response in a pretty format
                                var responseHtml = '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
                                $('#response').html(responseHtml);
                            } else {
                                // alert('Postal code not found');
                            }
                        },
                        error: function () {
                            // alert('Error fetching data');
                        }
                    });
                }, typingDelay);
            }
        });

        // Reset form on click of reset button
        // $('#resetButton').click(function () {
        //     $('#postalCodeForm')[0].reset();
        //     $('#response').empty();
        // });
    });


     /*--------------------- API forms ------------------*/



    // -----==================== Not working ======================= 


    // /*--------------------- work-authorization-info ------------------*/

    //     initValidate('#work-authorization-info');

    //     $('#work-authorization-info').on('submit', function(e){
    //         var form = $(this);
    //         ajax_form_submit(e, form, responseHandler);
    //     });

    //     var responseHandler = function (response) {
    //         $("input, textarea").val("");
    //         $("select option:first").prop("selected", !0);
    //         setTimeout(function () {
    //             location.reload();
    //         }, 100);
    //     };

    // /*---------------------  work-authorization-info ------------------*/ 

    // /*--------------------- education-info ------------------*/

    // initValidate('#education-info');

    //     $('#education-info').on('submit', function(e){
    //         var form = $(this);
    //         ajax_form_submit(e, form, responseHandler);
    //     });

    //     var responseHandler = function (response) {
    //         $("input, textarea").val("");
    //         $("select option:first").prop("selected", !0);
    //         setTimeout(function () {
    //             location.reload();
    //         }, 100);
    //     };

    // /*---------------------  education-info ------------------*/ 

    // /*--------------------- login info ------------------*/

    //     initValidate('#login-info');

    //     $('#login-info').on('submit', function(e){
    //         var form = $(this);
    //         ajax_form_submit(e, form, responseHandler);
    //     });

    //     var responseHandler = function (response) {
    //         $("input, textarea").val("");
    //         $("select option:first").prop("selected", !0);
    //         setTimeout(function () {
    //             location.reload();
    //         }, 100);
    //     };

    // /*---------------------  Login info ------------------*/ 

     </script>


















    
@endsection
