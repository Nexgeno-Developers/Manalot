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
	<section class="pt-5 information_section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4 class="title_heading text-left black_color pb-3 heading_font">Information</h4>
				</div>

				<div class="col-md-12">
					<h5 class="black_color"><b>Motiwala & Sons Golden Harvest</b></h5>
					<p>Motiwala & Sons Golden Harvest is a smart, secure and convenient way to own the Motiwala & Sons jewellery you desire. Through this plan, you can buy more than what you pay for because Tanishq will add a special discount upon maturity.</p>
				</div>

<div class="col-md-12">
					<h5 class="black_color pt-4 pb-3"><b>Golden Harvest - 10 Months</b></h5>
				</div>
				
				
        <div class="col-md-6">
          <div class="d-flex gap-4 pb-2 information_box" data-aos-once="true" data-aos="fade-up">
            <div class="step_box_icon">
              <div class="step_box_img">
                <img src="/assets/frontend/images/information_user.png" class="d-block" alt="...">
              </div>
            </div>
            <div class="choose_content">
              <p class="black_color">You can open a Golden Harvest account online using our website 
or App or by visiting your nearest Motiwala & Sons showroom.</p>
            </div>
          </div>
        </div>
		
		 <div class="col-md-6">
          <div class="d-flex gap-4 pb-2 information_box" data-aos-once="true" data-aos="fade-up">
            <div class="step_box_icon">
              <div class="step_box_img">
                <img src="/assets/frontend/images/information_card.png" class="d-block" alt="...">
              </div>
            </div>
            <div class="choose_content">
              <p class="black_color">You have the option to pay monthly instalments by cash, card, 
online banking using SI, ACH or post dated cheque facilities.</p>
            </div>
          </div>
        </div>
		
		 <div class="col-md-6">
          <div class="d-flex gap-4 pb-2 information_box" data-aos-once="true" data-aos="fade-up">
            <div class="step_box_icon">
              <div class="step_box_img">
                <img src="/assets/frontend/images/information_calender.png" class="d-block" alt="...">
              </div>
            </div>
            <div class="choose_content">
              <p class="black_color">You must pay a fixed instalment amount on the due date every month for 10 months (minimum instalment value - INR 2000. It can go up to any amount in multiples of INR 1000).</p>
            </div>
          </div>
        </div>
		
		 <div class="col-md-6">
          <div class="d-flex gap-4 pb-2 information_box" data-aos-once="true" data-aos="fade-up">
            <div class="step_box_icon">
              <div class="step_box_img">
                <img src="/assets/frontend/images/information_percent.png" class="d-block" alt="...">
              </div>
            </div>
            <div class="choose_content">
              <p class="black_color">After 10 months, you will be eligible for a special discount of upto 75% of the 1st instalment value paid.</p>
            </div>
          </div>
        </div>

		<div class="col-md-12">
           <p class="pt-4 pb-4">You must mandatorily close the account within 400 days from the date of opening your Golden Harvest account.</p>
           <p>For Example ( Only if all installments are paid on due date )</p>
        
		   <div class="information_tb">
               <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Enrolment Date</th>
      <th scope="col">Maturity Date</th>
      <th scope="col">Instalment per month (in ₹)</th>
      <th scope="col">Discount on Jewellery purchase (in ₹)</th>
	  <th scope="col">% of monthly installment</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>1st Jan 2021</th>
      <td>1st Jan 2022</td>
      <td>2000</td>
      <td>1500</td>
	  <td>75%</td>
    </tr>
  </tbody>
</table>
		   </div>
		
		</div>
		
		
		  </div>
		</div>
	</section>
</main>
@endsection