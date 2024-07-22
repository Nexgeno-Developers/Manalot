@extends('frontend.layouts.app')

@section('page.title', 'Manalot')

@section('page.description', 'Manalot')

@section('page.type', 'website')

@section('page.content')

<style>
	body
	{
		background-color: #f6f6f6;
	}

	.box_shadows
	{
		box-shadow: 0px 8px 40px 0px #0000001A;
		background-color:#fff;
		border-radius:25px;

	}
	.container {
    max-width: 900px;
}

.profile-content h3
{
	padding-top: 35px;
    font-weight: 400;
    font-size: 28px;
}

.profile-content p
{
	    font-size: 20px;
    font-weight: 300;
    margin-bottom: 0px;
    padding-bottom: 5px;
}

.profile-content span
{
	    font-size: 16px;
    font-weight: 300;
}
.bg-profile-content {
    padding: 0px 40px 40px 40px;
    margin-top: -100px;
}
.mt-35
{
	margin-top:25px;
}
.padd-40
{
	 padding: 30px 40px 10px 40px;
}

.profile_heds
{
	color: #AE446A;
    padding-bottom: 15px;
}
.profile-page p
{
	font-weight:300;
	color:#6F6F6F;
}

.profile-page strong
{
	font-weight:bold;
}
</style>


<div class="profile-page pb-5">
<div class="container">

<div class="top-section">
		<div class="row align-items-center">
			<div class="col-md-6">
				<a href="/login"><img src="http://127.0.0.1:8000/assets/images/namalot_logo.png"></a>
			</div>

			<div class="col-md-6">
				<div class="blue_btn text-end">
				<a  href="/login" class="text-decoration-none text-white">Continue to Login</a>
				</div>
			</div>


		</div>
	 </div>



	<div class="image-profile box_shadows">
		<div class="bg-profile-cover">
		   <img  class="img-fluid" src="/assets/images/profile-bg.svg"/>
		</div>

		<div class="bg-profile-content">
			<img src="/assets/images/profile-user.png"/>
			
			<div class="profile-content">
				<h3>Mahtab Alam</h3>
				<p>Front-end Developer at Nexgeno Technology Private Limited</p>
				<span>Mumbai, Maharashtra, India.</span>
	        </div>
        </div>
     </div>


	 <div class="profile-information box_shadows mt-35 padd-40">
		<div class="row">
		<div class="col-md-6"><h4 class="profile_heds">Personal Information</h4></div>
		<div class="col-md-6"></div>
		
			<div class="col-md-4">
				<p><strong>Date of Birth: </strong> 04/07/1996</p>
			</div>

			<div class="col-md-4">
				<p><strong>Gender: </strong> Male</p>
			</div>

			<div class="col-md-4">
				<p><strong>Phone: </strong> +91 9892334709</p>
			</div>

			<div class="col-md-4">
				<p><strong>Email: </strong>  graphics@nexgeno.in</p>
			</div>

			<div class="col-md-4">
				<p><strong>Zip/Postal Code: </strong> 400017</p>
			</div>

			<div class="col-md-4">
				<p><strong>City: </strong>  Mumbai</p>
			</div>

			<div class="col-md-4">
				<p><strong>Country: </strong>  India</p>
			</div>

			<div class="col-md-4">
				<p><strong>State: </strong> Maharashtra</p>
			</div>

			<div class="col-md-12">
				<p><strong>Address: </strong>  407, Avighna Park, Malad West, Mumbai, Maharshtra, India,</p>
			</div>
		</div>
	 </div>


	 <div class="profile-information box_shadows mt-35 padd-40">
		<div class="row">
		<div class="col-md-6"><h4 class="profile_heds">Work Experience</h4></div>
		<div class="col-md-6"></div>
		
			<div class="col-md-4">
				<p><strong>Professional Title: </strong> UI/UX Designer</p>
			</div>

			<div class="col-md-8">
				<p><strong>Company Name: </strong> Nexgeno Technology Pvt Ltd</p>
			</div>

			<div class="col-md-4">
				<p><strong>Years of Experience: </strong> 5-7 Yrs</p>
			</div>

			<div class="col-md-4">
				<p><strong>Industry: </strong>  IT</p>
			</div>

			<div class="col-md-4">
				<p><strong>Skills: </strong> HTML, CSS, PHP</p>
			</div>

			<div class="col-md-12">
				<p><strong>Responsibilities/Achievements: </strong>  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
			</div>
		</div>
	 </div>


	 <div class="profile-information box_shadows mt-35 padd-40">
		<div class="row">
		<div class="col-md-6"><h4 class="profile_heds">Education</h4></div>
		<div class="col-md-6"></div>
		
			<div class="col-md-12">
				<p><strong>School/University Name: </strong> Don Bosco</p>
			</div>

			<div class="col-md-4">
				<p><strong>Degree: </strong> BSc in Design</p>
			</div>

			<div class="col-md-4">
				<p><strong>Graduation Year: </strong> 2016</p>
			</div>

			<div class="col-md-4">
				<p><strong>Major/Field of Study:  </strong> Arts</p>
			</div>
		</div>
	 </div>


	 <div class="profile-information box_shadows mt-35 padd-40">
		<div class="row">
		<div class="col-md-6"><h4 class="profile_heds">Certifications</h4></div>
		<div class="col-md-6"></div>
		
			<div class="col-md-12">
				<p><strong>Certificate Name: </strong> Completion of Figma Mega Course </p>
			</div>

			<div class="col-md-6">
				<p><strong>Date Obtained: </strong> BSc in Design</p>
			</div>

			<div class="col-md-6">
				<p><strong>Registration Number, If Applicable: </strong> 3132123</p>
			</div>

		</div>
	 </div>


	 <div class="profile-information box_shadows mt-35 padd-40">
		<div class="row">
		<div class="col-md-6"><h4 class="profile_heds">Availability </h4></div>
		<div class="col-md-6"></div>
		
			<div class="col-md-6">
				<p><strong>Preferred Title/Role: </strong> UI/UX Designer</p>
			</div>

			<div class="col-md-6">
				<p><strong>Desired Job Location: </strong> Mumbai</p>
			</div>


			<div class="col-md-4">
				<p><strong>Employment Type: </strong> Full Time</p>
			</div>

			<div class="col-md-4">
				<p><strong>Preferred Industry: </strong> IT</p>
			</div>

			

			<div class="col-md-4">
				<p><strong>Expected Salary: </strong> 5LPA</p>
			</div>
		</div>
	 </div>


	  <div class="profile-information box_shadows mt-35 padd-40">
		<div class="row">
		<div class="col-md-6"><h4 class="profile_heds">References </h4></div>
		<div class="col-md-6"></div>
		
			<div class="col-md-6">
				<p><strong>Name: </strong> Lorem Ipsum </p>
			</div>

			<div class="col-md-6">
				<p><strong>Mobile No: </strong> 9865121545</p>
			</div>
		</div>
	 </div>


	 <div class="profile-information box_shadows mt-35 padd-40">
		<div class="row">
		<div class="col-md-6"><h4 class="profile_heds">Work Authorization </h4></div>
		<div class="col-md-6"></div>
		
			<div class="col-md-6">
				<p><strong>Legal Authorization to work status: </strong> Yes </p>
			</div>

			<div class="col-md-3">
				<p><strong>Availability : </strong> Yes</p>
			</div>

			<div class="col-md-3">
				<p><strong>Notice Period : </strong> Yes</p>
			</div>
		</div>
	 </div>

	 <div class="profile-information box_shadows mt-35 padd-40">
		<div class="row">
		<div class="col-md-6"><h4 class="profile_heds">Social Media Links</h4></div>
		<div class="col-md-6"></div>
		
			<div class="col-md-6">
				<p><strong>Linkdin: </strong> https://www.linkdin.com/Mahtab </p>
			</div>

			<div class="col-md-6">
				<p><strong>X : </strong> https://www.twitter.com/Mahtab </p>
			</div>

			<div class="col-md-6">
				<p><strong>Instagram : </strong>https://www.instagram.com/Mahtab</p>
			</div>

			<div class="col-md-6">
				<p><strong>Facebook : </strong>https://www.facebook.com/Mahtab</p>
			</div>

			<div class="col-md-6">
				<p><strong>Other : </strong>https://www.other.com/Mahtab</p>
			</div>
		</div>
	 </div>




</div>
</div>


@endsection