@extends('frontend.layouts.app')

@section('page.title', 'Motiwala')

@section('page.description', 'Motiwala')

@section('page.type', 'website')

@section('page.content')



<!-- -------------------- career banner start ---------------- -->

<section class="inner_page_banner">
     <img src="/assets/frontend/images/innwe_imagebanner.jpg" class="d-block w-100" alt="...">
</section>


<main class="main">
	<section class="openaccount pt-5 pb-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4 class="title_heading text-center black_color pb-3 heading_font">Open New Account</h4>
				</div>

				<div class="col-md-12">
					<p>Hello, <br> Greetings from Motiwala & Sons !</p>
					<p>Thank you very much for expressing your interest in opening a new Motiwala & Sons Golden Harvest account. 
	Please complete the process below for us to facilitate your request.</p>
				</div>

				<div class="col-md-12">
					<form action="" method="post">
						<div class="form-group mt-2">
							<input type="checkbox" name="agree" id="agree" value="yes" />
							<label for="agree">I accept  <a href="">“Terms and conditions”</a> of Motiwala & Sons Golden Harvest.</label>
						</div>


                        <div class="d-flex">
                            <div class="form-group mt-4 adhar_field">
                                <label class="pb-3">Mobile Number* (As per Aadhaar)</label>
                                <input type="tel" class="form-control" name="mobile_number" placeholder="Please Enter Mobile Number"/>
                            </div>

                            <div class="form-group">
                                 <div class="buttonclass1 mt60">
                <button type="button">Proceed <i class="las la-arrow-right"></i></button>
              </div>
                            </div>
                        </div>
				       
				   </form>  
				</div>
		  </div>
		</div>
	</section>
</main>
@endsection