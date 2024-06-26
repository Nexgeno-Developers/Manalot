
<script src="/assets/frontend/js/bootstrap.bundle.min.js"></script>
<script src="/assets/frontend/js/jquery.min.js"></script>


<!--owl carousel js-->
<script src="/assets/frontend/js/owl.carousel.js"></script>

<!--moment js-->
<script defer src="/assets/frontend/js/moment.min.js"></script>

<!--jQuery Validate-->
<script src="/assets/frontend/js/jquery.validate.min.js"></script>

<!--select2-->
<script src="/assets/frontend/js/select2.full.min.js"></script>

<!--select2--->
<script defer src="/assets/frontend/js/select2.min.js"></script>

<!--Toast Js-->
<script defer src="/assets/frontend/js/toastr.min.js"></script>

<!-- <script defer src="/assets/frontend/js/aos.js"></script> -->

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- to show country code and flags in mobile view field -->
<script src="/assets/frontend/js/utils.min.js"></script>
<script src="/assets/frontend/js/inteliput.min.js"></script>
    


<!--------------------- extra ------------------------------->
<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!--------------------- extra ------------------------------->

<!--Custom Js-->
<script src="/assets/frontend/js/Init.js"></script>
<script src="/assets/frontend/js/script.js"></script>

<script>
  // to show country code and flags in mobile view field
    $(document).ready(function() {
      const phoneInputField = $("#Mobile");
      phoneInputField.intlTelInput({
          utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
      });
    });

    function openDatePicker() {
        document.getElementById('Date').click();
    }
</script>

<script>
$(document).ready(function(){
  $(".notification_button").click(function(){
    $(".notification_box").toggle();
  });
});
</script>



