@extends('frontend.layouts.app')

@section('page.title', 'Motiwala')

@section('page.description', 'Seedling & Associates is one of the best law firms in Delhi, India. We provide legal
assistance for startups, FDI, Property law, IP, and more')

@section('page.type', 'website')

@section('page.content')

<!--banner start -->
<section class="banner_section">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/assets/frontend/images/main_banner_images.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block text-start">
          <h3 class="black_color heading_font">Gold Jewellery & Diamonds1</h3>
          <p class="black_color">If you are looking for the perfect diamond, you have come to the right place. Our site features the world's top diamonds and jewellery. </p>
          <div class="buttonclass mt-4">
            <a href="">Explore <i class="las la-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/assets/frontend/images/main_banner_images.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block text-start">
          <h3 class="black_color heading_font">Gold Jewellery & Diamonds</h3>
          <p class="black_color">If you are looking for the perfect diamond, you have come to the right place. Our site features the world's top diamonds and jewellery. </p>
          <div class="buttonclass mt-4">
            <a href="">Explore <i class="las la-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/assets/frontend/images/main_banner_images.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block text-start">
          <h3 class="black_color heading_font">Gold Jewellery & Diamonds</h3>
          <p class="black_color">If you are looking for the perfect diamond, you have come to the right place. Our site features the world's top diamonds and jewellery. </p>
          <div class="buttonclass mt-4">
            <a href="">Explore <i class="las la-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--banner close -->
<main class="main">
  <!--benefits calculator open-->
  <section class="steps_section">
    <div class="container">
      <div class="top_step_content">
        <p class="text-center black_color" data-aos-once="true" data-aos="fade-up">Aiming for that perfect necklace?</p>
        <p class="text-center black_color" data-aos-once="true" data-aos="fade-up">Open a Motiwala & Sons Golden Harvest account with an amount as low as <span> ₹2000. Regular payment of a fixed installment for 10 months will get you a </span> special discount of up to 75% of the 1st installment value paid</p>
        <h4 class="title_heading text-center black_color pb-1 heading_font pt-4 " data-aos-once="true" data-aos="fade-up">4 Easy Steps </h4>
        <p class="text-center black_color" data-aos-once="true" data-aos="fade-up">to purchase the jewellery of your dreams</p>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="step_border_img">
            <img src="/assets/frontend/images/round_bg_image.png" class="d-block" alt="...">
          </div>
        </div>
        <div class="col-md-3">
          <div class="step_box steps1">
            <div class="step_content1">
              <p class="black_color" data-aos-once="true" data-aos="fade-right">Open a new account on the website, Motiwala & Sons app or in one of our 350+ stores.</p>
            </div>
            <div class="step_box_icon">
              <div class="step_box_img">
                <img src="/assets/frontend/images/user_icon.png" class="d-block" alt="...">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="step_box steps2">
            <div class="step_content2">
              <p class="black_color" data-aos-once="true" data-aos="fade-right">Pay a monthly installment of minimum ₹2000 or any greater multiples of ₹1000 for 10 months with cash/online banking using ACH / SI or Post dated cheque facilities</p>
            </div>
            <div class="step_box_icon">
              <div class="step_box_img">
                <img src="/assets/frontend/images/wallet_icon.png" class="d-block" alt="...">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="step_box steps3">
            <div class="step_content3">
              <p class="black_color" data-aos-once="true" data-aos="fade-left">Avail a special discount of upto 75% of the 1st installment value, at the time of redemption</p>
            </div>
            <div class="step_box_icon">
              <div class="step_box_img">
                <img src="/assets/frontend/images/percent_icon.png" class="d-block" alt="...">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="step_box steps4">
            <div class="step_content4">
              <p class="black_color" data-aos-once="true" data-aos="fade-left">Own your favourite Motiwala & Sons jewellery with the total redemption value</p>
            </div>
            <div class="step_box_icon">
              <div class="step_box_img">
                <img src="/assets/frontend/images/gold_icons.png" class="d-block" alt="...">
              </div>
            </div>
          </div>
        </div>
      </div>

          <div class="step_bottom_text" >
              <p class="black_color text-center" data-aos-once="true" data-aos="fade-up">“Bringing you the best quality jewelry, latest designs at an <span> affordable price, we bring over 100 years of industry <span> experience to you.”</p>
              <div class="buttonclass mt-4" data-aos-once="true" data-aos="fade-up">
                <a href="">Explore <i class="las la-arrow-right"></i>
                </a>
              </div>
          </div>

    </div>
  </section>



   <div class="container">
    <div class="benefits_calculator sip-calculator"  data-aos-once="true" data-aos="fade-up">
      <h4 class="title_heading text-center black_color pb-3 heading_font">Benefits Calculator</h4>
      <form>
        <div class="row">

        <div class="col-md-12"><p>Slide or enter monthly installment amount</p></div>
            <div class="col-md-6">
              
              <div class="sip-calculator-amount">
                <div class="amount_monthly1">
                  <label id="amountLabel"> MONTHLY AMOUNT <span>₹ 2000</span></label>
                </div>
                <div class="amount_check">
                  <button class="btn btn-block btn-primary">Check</button>
                </div>
              </div>
            </div>
    
             <div class="col-md-6">
              <div class="sip-calculator-amount">
                <div class="amount_monthly2">
                  <label id="amountLabel"> YOUR TOTAL AMOUNT <span>₹ 2000</span></label>
                </div>
              </div>
             </div>


              <div class="col-md-6">
                 <div class="amount_price_view">
                     <div class="total_payment_text">
                      <p>Your Total Payment <span>(11 installment)</span></p>
                    </div>

                    <div class="total_number">
                      <p>₹ 20,900</p>
                    </div>
                 </div>
             </div>

              <div class="col-md-6">
                 <div class="amount_price_view">
                     <div class="total_payment_text">
                      <p>Special Discount
 <span>(Equal to 1 month installment)</span></p>
                    </div>

                    <div class="total_number">
                      <p>₹ 19,00</p>
                    </div>
                 </div>
             </div>


             <div class="col-md-12"><hr></div>
             <div class="col-md-6">
                      <p class="pt-2">You can Buy Jewellery worth: (in 12th month)</p>
             </div>

             <div class="col-md-6">
                    <div class="total_number_main">
                      <p>₹ 22,800</p>
                    </div>
             </div>

             <div class="col-md-12 text-center">
  <div class="buttonclass mt-4">
                <a href="">Open a New Account <i class="las la-arrow-right"></i>
                </a>
              </div>
</div>

        </div>
      </form>
    </div>
  </div>


  <!--why choose us section start-->
  <section class="why_choose_section">
    <div class="container">
      <h4 class="title_heading text-center black_color pb-4 heading_font">Why Choose Us ?</h4>
      <div class="row">
        <div class="col-md-4">
          <div class="d-flex gap-4 pb-4" data-aos-once="true" data-aos="fade-up">
            <img class="choose_img" src="/assets/frontend/images/best_icons.png" class="d-block w-100" alt="...">
            <div class="choose_content">
              <h5 class="black_color">Best Price Guarantee</h5>
              <p class="black_color">We offer the best prices in the online Diamond Jewellery Business.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex gap-4 pb-4" data-aos-once="true" data-aos="fade-up">
            <img class="choose_img" src="/assets/frontend/images/refer_icons.png" class="d-block w-100" alt="...">
            <div class="choose_content">
              <h5 class="black_color">Refer and Earn</h5>
              <p class="black_color">Refer your friend/family and earn 20% of your referral’s order’s Diamond Amount.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex gap-4 pb-4" data-aos-once="true" data-aos="fade-up">
            <img class="choose_img" src="/assets/frontend/images/earnings_icons.png" class="d-block w-100" alt="...">
            <div class="choose_content">
              <h5 class="black_color">Motiwala Harvest</h5>
              <p class="black_color">A unique easy-pay system which gives you a benefit of 18.24%</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex gap-4" data-aos-once="true" data-aos="fade-up">
            <img class="choose_img" src="/assets/frontend/images/certified_icons.png" class="d-block w-100" alt="...">
            <div class="choose_content">
              <h5 class="black_color">100% Certified Jewellery</h5>
              <p class="black_color">Our jewellery always comes with a certificate of authentication.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex gap-4" data-aos-once="true" data-aos="fade-up">
            <img class="choose_img" src="/assets/frontend/images/exchange_icons.png" class="d-block w-100" alt="...">
            <div class="choose_content">
              <h5 class="black_color">Lifetime Exchange</h5>
              <p class="black_color">Exchange your old designs anytime you want an upgrade.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex gap-4" data-aos-once="true" data-aos="fade-up">
            <img class="choose_img" src="/assets/frontend/images/warranty_icons.png" class="d-block w-100" alt="...">
            <div class="choose_content">
              <h5 class="black_color">One Year Warranty</h5>
              <p class="black_color">If your jewellery has a defect, we will fix it.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--faq start -->
  <section class="faq_section">
    <div class="container">
      <h4 class="title_heading text-center black_color pb-3 heading_font">Frequently Asked Questions</h4>
      <div class="accordion" id="accordionExample">
        <div class="accordion-item" data-aos-once="true" data-aos="fade-up">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Where can I buy ? </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item" data-aos-once="true" data-aos="fade-up">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> What can I buy ? </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item" data-aos-once="true" data-aos="fade-up">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Can I reedem and purchase before 11 months ? </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>

        <div class="accordion-item" data-aos-once="true" data-aos="fade-up">
          <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"> If I pay for 10 months, when will I get special discount ? </button>
          </h2>
          <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>

        <div class="accordion-item" data-aos-once="true" data-aos="fade-up">
          <h2 class="accordion-header" id="headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"> What other benifits you get? </button>
          </h2>
          <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</main>


@endsection