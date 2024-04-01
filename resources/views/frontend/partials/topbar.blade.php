<div class="nav_bar ">
    <div>
        <a href="{{ url(route('index')) }}">
            <img src="{{ asset('/assets/frontend/images/logo.png') }}" alt="logo" style="width: 160px;" />
        </a>
    </div>
    <div>
        <div class="top_nav_links d-flex align-items-center justify-content-end  mb-2 gap_seven">
            <ul class="d-flex align-items-center gap-4 list-unstyled mb-0">
                <li>
                    <a href="{{ url(route('index')) }}">Home</a>
                </li>
                <li>
                    <a href="{{ url(route('blog')) }}">Blog</a>
                </li>
                <li>
                    <a href="{{ url(route('contact')) }}">Contact Us</a>
                </li>
            </ul>
            <div class="phone_email d-flex align-items-center gap-4">
                <div>
                    <a href="tel:{{ get_settings('mobile') }}">
                        <img src="{{ asset('/assets/frontend/images/call.png') }}" alt="call icon" />
                        <span>+{{ get_settings('mobile') }}</span>
                    </a>
                </div>
                <div>
                    <a href="mailto:{{ get_settings('email') }}">
                        <img src="{{ asset('/assets/frontend/images/email.png') }}" alt="email icon" />
                        <span>{{ get_settings('email') }}</span>
                    </a>
                </div>
            </div>
        </div>