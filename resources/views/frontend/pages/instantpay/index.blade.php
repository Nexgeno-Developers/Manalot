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
	<section class="instant_section pt-5 pb-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4 class="title_heading text-center black_color pb-3 heading_font">Instant Pay</h4>
				</div>

				<div class="col-md-12">
					<p class="text-center">Paying your Golden Harvest instalment is now easier. <span class="d-lg-block">Pay online through Debit card, Credit card or Net Banking.</span></p>
				</div>

				<div class="col-md-12">
					<form action="" method="post" class="instant_pay">
						<div class="form-group mt-4 adhar_field">
                                <label class="pb-3">Account Number* </label>
                                <input type="tel" class="form-control" name="mobile_number" placeholder="Please Enter Your Account Number"/>
                            </div>


                            <div class="form-group mt-5 adhar_field">
                                <label class="pb-3">Mobile Number* </label>
                                <input type="tel" class="form-control" name="mobile_number" placeholder="Please Enter Your Mobile Number"/>
                            </div>

                            <div class="form-group text-center">
                                <div class="buttonclass1 mt60">
                                         <button type="button">Proceed <i class="las la-arrow-right"></i></button>
                                </div>
                            </div>
                      
				   </form>  
				</div>
		  </div>
		</div>
	</section>
</main>
@endsection