@php
$practice_Area = DB::table('practice_areas')->where('parent_id', null)->limit(4)->orderBy('id', 'asc')->get();
@endphp


<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-6">
        <div class="footer-widget" data-aos-once="true" data-aos="fade-up">
          <h3 class="widget-title">USEFUL LINKS</h3>
          <ul class="widget-menu">
            <li>
              <a href="">
                <i class="las la-angle-right"></i> Sign In </a>
            </li>
            <li>
              <a href="">
                <i class="las la-angle-right"></i> New Account </a>
            </li>
            <li>
              <a href="">
                <i class="las la-angle-right"></i> Instant Pay </a>
            </li>
            <li>
              <a href="">
                <i class="las la-angle-right"></i> Auto Debit </a>
            </li>
            <li>
              <a href="">
                <i class="las la-angle-right"></i> Information </a>
            </li>
            <li>
              <a href="">
                <i class="las la-angle-right"></i> FAQ </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-2 col-md-6">
        <div class="footer-widget" data-aos-once="true" data-aos="fade-up">
          <h3 class="widget-title">My Account</h3>
          <ul class="widget-menu">
            <li>
              <a href="">
                <i class="las la-angle-right"></i> My Profile </a>
            </li>
            <li>
              <a href="">
                <i class="las la-angle-right"></i> My Orders </a>
            </li>
            <li>
              <a href="">
                <i class="las la-angle-right"></i> My Whishlist </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-2 col-md-6">
        <div class="footer-widget" data-aos-once="true" data-aos="fade-up">
          <h3 class="widget-title">Categories</h3>
          <ul class="widget-menu">
            <li>
              <a href="">
                <i class="las la-angle-right"></i> Rings </a>
            </li>
            <li>
              <a href="">
                <i class="las la-angle-right"></i> Earrings </a>
            </li>
            <li>
              <a href="">
                <i class="las la-angle-right"></i> Pendants </a>
            </li>
            <li>
              <a href="">
                <i class="las la-angle-right"></i> Gold </a>
            </li>
            <li>
              <a href="">
                <i class="las la-angle-right"></i> Bracelets & Bangels </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="footer-widget" data-aos-once="true" data-aos="fade-up">
          <h4 class="heading_font line-height35">Download <br>Our App </h4>
          <p>Shining new app, made just for you! It's Free, Easy & Smart</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="footer-app-image" data-aos-once="true" data-aos="fade-up">
          <img src="/assets/frontend/images/app_images.png" class="d-block w-100" alt="...">
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="footer-widget mt-5" data-aos-once="true" data-aos="fade-up">
          <p class="pb-0 mb-0">Contact Us: 1800-255-10234</p>
          <p>Email: care@motiwalasons.in</p>
        </div>
      </div>
      <div class="col-lg-5 col-md-6">
        <h6 class="font-alt mt-4 mb-3 heading_font font-size20" data-aos-once="true" data-aos="fade-up">Subscribe to our Newsletter</h6>
        <form class="form-subscribe" action="#">
          <div class="input-group" data-aos-once="true" data-aos="fade-up">
            <input type="text" class="form-control input-lg" placeholder="Write Your Email Address">
            <span class="input-group-btn">
              <button class="btn btn-success btn-lg" type="submit">Subscribe</button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="copyright_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <ul>
            <li>
              <a href="/terms"> Term of Use</a>
            </li>
            <li>|</li>
            <li>
              <a href=""> Privacy Policy</a>
            </li>
            <li>|</li>
            <li>
              <a href=""> Give Us Feedback</a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <p class="text-center">Copyright © 2024 Under Motiwala & Sons</p>
        </div>
        <div class="col-md-4">
          <ul class="float_right">
            <li>
              <a href="">
                <i class="lab la-whatsapp"></i>
              </a>
            </li>
            <li>
              <a href="">
                <i class="lab la-facebook-f"></i>
              </a>
            </li>
            <li>
              <a href="">
                <i class="lab la-instagram"></i>
              </a>
            </li>
            <li>
              <a href="">
                <i class="lab la-twitter"></i>
              </a>
            </li>
            <li>Let's Get Together</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>



<!-- login modal popup open-->
<div class="modal fade modal_popup_cls" id="loginmodal" aria-hidden="true" aria-labelledby="loginmodal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title title_heading black_color heading_font" id="loginmodal">Sign In</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group mt-4">
            <input type="text" class="form-control" name="user_id" placeholder="User ID*" />
          </div>
          <div class="form-group mt-5">
            <input type="text" class="form-control" name="user_password" placeholder="Password*" />
            <button class="forget_buttons">Forgot Password</button>
          </div>
          <div class="form-group">
            <div class="buttonclass1 mt60">
              <button type="button">Sign In <i class="las la-arrow-right"></i>
              </button>
            </div>
          </div>
        </form>
        <p class="pt-5 pb-0 mb-0 fs-14">* If you already have a Golden Harvest A/c, you can sign in here.</p>
        <p class="fs-14"> * User ID is your registered mobile number</p>
      </div>
    </div>
  </div>
</div>



<!-- Auto Debit modal popup open-->
<div class="modal fade modal_popup_cls" id="autodebit_modal" aria-hidden="true" aria-labelledby="autodebit_modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title title_heading black_color heading_font" id="autodebit_modal">Auto Debit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group mt-4">
            <input type="text" class="form-control" name="account_number" placeholder="Account Number*" />
          </div>
          <div class="form-group mt-5">
            <input type="text" class="form-control" name="mobile_number" placeholder="Mobile Number*" />
          </div>
          <div class="form-group">
            <div class="buttonclass1 mt60">
              <button type="button">Proceed <i class="las la-arrow-right"></i>
              </button>
            </div>
          </div>
        </form>
        </div>
    </div>
  </div>
</div>