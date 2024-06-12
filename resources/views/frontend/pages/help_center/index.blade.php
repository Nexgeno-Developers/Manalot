@extends('frontend.layouts.app')

@section('page.content')
<!----------========================== help center ============----------->

<section class="pb-5 pt80" style="background-color: #f6f6f6; min-height: 100vh">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mt-5 p_color">
                <h1 class="h_m_h">How Can we help?</h1>
                <p class="fs-3 pt-4 pb-5">
                    Use the search boc below to get help with something else.
                </p>

                <p>What do you need help with</p>
                <form>
                    <input class="h_input" type="text" placeholder="Write your Question ?" />
                </form>
            </div>
            <div class="col-md-5 mt-5">
                <img src="/assets/images/help.png" class="about_img w-100 rounded-md" alt="" />
            </div>
        </div>
    </div>
</section>


<!----------========================== help center ============----------->
@endsection