
@if(!auth()->user())

  <div style="background-color: white" class="header">
      <div class="container">

          <header class="d-flex align-items-center py-1 justify-content-between">
              <a href="/">
                  <img src="/assets/images/logo.png" alt="" />
              </a>
              <form class="search_input d-flex align-items-center">
                  <input type="text" placeholder="What Are You Looking For?" />
                  <button>
                      <i class="fa-solid fa-magnifying-glass"></i>
                  </button>
              </form>
              <div class="d-flex align-items-center gap-4">
                  <a href="#" data-toggle="modal" data-target="#exampleModal"
                      class="d-flex flex-column gap-1 align-items-center text-decoration-none inherit text-dark text-xs">
                      <div>
                          <img src="/assets/images/notification.png" alt="" />
                      </div>
                      <span>Notification</span>
                  </a>
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
                  <a href="#"
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

@else 

  <div class="login_logo">
    <a href="login.php"><img src="/assets/images/namalot_logo.png" /></a>
  </div>

@endif


