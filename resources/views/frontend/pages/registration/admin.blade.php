@extends('frontend.layouts.app')


@section('page.content')
<!----------========================== admin ============----------->

<section class="pb-5 mt80" style="background-color: #f6f6f6">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mt-4 pb-5">
                <aside class="left_sidebar">
                    <div class="profile">
                        <img class="img-fluid" src="/assets/images/bg-avatar.jpg" alt="" />
                        <img src="/assets/images/avatar.jpg" alt="" class="avatar" />
                        <p class="username mb-0">Manalot</p>
                        <p class="role text-xs mb-5">Admin</p>
                        <a href="/edit-profile.php"><button class="purple_btn">Edit Profile</button></a>
                    </div>
                    <div class="candidates mt-4">
                        <p class="text-lg">Candidates</p>
                        <ul class="list-unstyled d-flex flex-column gap-3">
                            <li>
                                <img src="/assets/images/candinet1.png" alt="" />
                                <span>Samantha David</span>
                            </li>
                            <li>
                                <img src="/assets/images/candinet2.png" alt="" />
                                <span>John Deo</span>
                            </li>
                            <li>
                                <img src="/assets/images/candinet3.png" alt="" />
                                <span>Harry Maguire</span>
                            </li>
                            <li>
                                <img src="/assets/images/candinet4.png" alt="" />
                                <span>Harry Maguire</span>
                            </li>
                        </ul>
                    </div>
                    <div class="py-5 my-5"></div>
                </aside>
            </div>
            <div class="col-md-6 mt-4">
                <main>
                    <form class="post_form">
                        <div>
                            <img src="/assets/images/s-logo.png" alt="" />
                        </div>
                        <div class="w-100">
                            <div class="input">
                                <input type="text" placeholder="Share something...." />
                                <img src="/assets/images/emoji.png" alt="" class="emoji" />
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <div class="media">
                                    <button>
                                        <img src="/assets/images/image.png" alt="" />
                                        <span>Image</span>
                                    </button>
                                    <button>
                                        <img src="/assets/images/video.png" alt="" />
                                        <span>Video</span>
                                    </button>
                                    <button>
                                        <img src="/assets/images/poll.png" alt="" />
                                        <span>Poll</span>
                                    </button>
                                </div>
                                <div>
                                    <button class="google_btn bluegradian_bg">Add Post</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="post mt-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <img src="/assets/images/s-logo.png" alt="" />
                                <div>
                                    <p class="mb-0">Manalot</p>
                                    <p class="text-xs" style="color: #b4b4b4">
                                        12 Minutes ago
                                    </p>
                                </div>
                            </div>
                            <div class="action">
                                <div class="dropdown_wrapper">
                                    <button>Edit</button>
                                    <button>Delete</button>
                                </div>
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </div>
                        </div>
                        <div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua.
                            </p>
                            <img src="/assets/images/post.jpg" class="w-100" alt="" />
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="/assets/images/heart.png" alt="" />
                                        <span>15k</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="/assets/images/comment.png" alt="" />
                                        <span>120</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-1">
                                    <span>Event</span>
                                    <img src="/assets/images/event.png" alt="" />
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3 mt-4">
                                <img src="/assets/images/s-logo.png" alt="" />
                                <input type="text" class="comment_input" placeholder="Write your comment" />
                            </div>
                        </div>
                    </div>
                    <div class="post mt-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <img src="/assets/images/s-logo.png" alt="" />
                                <div>
                                    <p class="mb-0">Manalot</p>
                                    <p class="text-xs" style="color: #b4b4b4">
                                        12 Minutes ago
                                    </p>
                                </div>
                            </div>
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                        <div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua.
                            </p>
                            <img src="/assets/images/post.jpg" class="w-100" alt="" />
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="/assets/images/heart.png" alt="" />
                                        <span>15k</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="/assets/images/comment.png" alt="" />
                                        <span>120</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-1">
                                    <span>Event</span>
                                    <img src="/assets/images/event.png" alt="" />
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3 mt-4">
                                <img src="/assets/images/s-logo.png" alt="" />
                                <input type="text" class="comment_input" placeholder="Write your comment" />
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div class="col-md-3 mt-4 pb-5">
                <aside class="right_sidebar">
                    <div class="activity">
                        <p class="text-lg">News/Activities</p>
                        <ul class="list-unstyled d-flex flex-column gap-3">
                            <li class="d-flex align-items-center gap-2">
                                <img src="/assets/images/newss1.png" alt="" />
                                <p class="d-flex flex-column gap-1 mb-0">
                                    <span class="text-sm">John Deo Likes your Post</span>
                                    <span class="text-xs">2 Minutes ago</span>
                                </p>
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <img src="/assets/images/news2.png" alt="" />
                                <p class="d-flex flex-column gap-1 mb-0">
                                    <span class="text-sm">John Deo Likes your Post</span>
                                    <span class="text-xs">2 Minutes ago</span>
                                </p>
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <img src="/assets/images/news3.png" alt="" />
                                <p class="d-flex flex-column gap-1 mb-0">
                                    <span class="text-sm">John Deo Likes your Post</span>
                                    <span class="text-xs">2 Minutes ago</span>
                                </p>
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <img src="/assets/images/news4.png" alt="" />
                                <p class="d-flex flex-column gap-1 mb-0">
                                    <span class="text-sm">John Deo Likes your Post</span>
                                    <span class="text-xs">2 Minutes ago</span>
                                </p>
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <img src="/assets/images/news5.png" alt="" />
                                <p class="d-flex flex-column gap-1 mb-0">
                                    <span class="text-sm">John Deo Likes your Post</span>
                                    <span class="text-xs">2 Minutes ago</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="adds mt-4">
                        <img src="/assets/images/offer.png" class="w-100" alt="" />
                    </div>
                    <div class="mt-4">
                        <ul class="list-unstyled d-flex align-items-center justify-content-center flex-wrap gap-2">
                            <li>
                                <a href="#" class="text-decoration-none inherit">
                                    About Us
                                </a>
                            </li>
                            <li>|</li>
                            <li>
                                <a href="#" class="text-decoration-none inherit">FAQs</a>
                            </li>
                            <li>|</li>
                            <li>
                                <a href="#" class="text-decoration-none inherit">
                                    Help Center
                                </a>
                            </li>
                            <li>|</li>
                            <li>
                                <a href="#" class="text-decoration-none inherit">
                                    Contact Us
                                </a>
                            </li>
                            <li>|</li>
                            <li>
                                <a href="#" class="text-decoration-none inherit">Privacy & Terms</a>
                            </li>
                            <li>|</li>
                        </ul>
                    </div>
                    <div class="py-5 my-5"></div>
                    <p class="mt-5 text-center">Manalot Corporation © 2021</p>
                </aside>
            </div>
        </div>
    </div>
</section>

<!----------========================== admin ============----------->
@endsection