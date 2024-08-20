
@if(auth()->user())


  <div class="header">
      <div class="container">

          <header class="d-flex align-items-center py-1 justify-content-between">
              <a href="/">
                  <img style="width:200px;" src="/assets/images/logo.png" alt="" />
              </a>
              <form class="search_input d-flex align-items-center mb-0">
                  <input type="text" placeholder="What Are You Looking For?" />
                  <button>
                      <img src="/assets/images/search_button_new.png" alt="" />
                  </button>
              </form>
              <div class="d-flex align-items-center gap-4 menu_rightsidebaar">
                  <a href="#" data-toggle="modal" data-target="#exampleModal"
                      class="d-flex flex-column gap-1 align-items-center text-decoration-none inherit text-dark text-xs notification_button">
                      <div>
                          <img src="/assets/images/notification.png" alt="" />
                      </div>
                      <span>Notification</span>
                  </a>

                  <div class="notification_box" style="display:none">
                    <div class="notification_modal">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex gap-2 align-items-center">
                                <h3 class="mb-0 notifty_hed">Notification</h3>
                                <p class="mb-0 count_label">3</p>
                            </div>
                            <p class="mb-0 mark_read">Mark all as read</p>
                        </div>

                        <div class='mt-4 d-flex flex-column gap-2'>
                            <div class="item d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="/assets/images/candinet1.png" alt="" />
                                    <div>
                                        <p class="mb-0"> <span class="username"> Manalot </span> <span
                                                class="text-xs">Reacted on your Comment</span></p>
                                        <p class="mb-0 text-xs">5m Ago</p>
                                    </div>
                                </div>
                                <p class="dot"></p>
                            </div>
                            <div class="item d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="/assets/images/candinet1.png" alt="" />
                                    <div>
                                        <p class="mb-0"> <span class="username"> Manalot </span> <span
                                                class="text-xs">Reacted on your Comment</span></p>
                                        <p class="mb-0 text-xs">5m Ago</p>
                                    </div>
                                </div>
                                <p class="dot"></p>
                            </div>
                            <div class="item d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="/assets/images/candinet1.png" alt="" />
                                    <div>
                                        <p class="mb-0"> <span class="username"> Manalot </span> <span
                                                class="text-xs">Reacted on your Comment</span></p>
                                        <p class="mb-0 text-xs">5m Ago</p>
                                    </div>
                                </div>
                                <p class="dot"></p>
                            </div>
                            <div class="item d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="/assets/images/candinet1.png" alt="" />
                                    <div>
                                        <p class="mb-0"> <span class="username"> Manalot </span> <span
                                                class="text-xs">Reacted on your Comment</span></p>
                                        <p class="mb-0 text-xs">5m Ago</p>
                                    </div>
                                </div>
                                <p class="dot"></p>
                            </div>
                        </div>
                    </div>
                  </div>

                  
                  <a href="{{ url(route('about-us')) }}"
                      class="d-flex flex-column gap-1 align-items-center text-decoration-none text-dark text-xs">
                      <div>
                          <img src="/assets/images/idea.png" alt="" />
                      </div>
                      <span>About Us</span>
                  </a>
                  <a href="{{ url(route('help-center')) }}"
                      class="d-flex flex-column gap-1 align-items-center text-decoration-none text-dark text-xs">
                      <div>
                          <img src="/assets/images/question.png" alt="" />
                      </div>
                      <span>Help Center</span>
                  </a>
                  <a href="{{ route('customer.logout') }}"
                      class="d-flex flex-column gap-1 align-items-center text-decoration-none text-dark text-xs">                      
                        <div>
                            <img src="/assets/images/logout.png" alt="" />
                        </div>
                        <span>Logout</span>
                  </a>
              </div>
          </header>

      </div>
  </div>

@endif


