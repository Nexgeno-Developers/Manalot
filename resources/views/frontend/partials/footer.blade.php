
<!-----=================================== Footer section ============================-------------------------->
@if(!auth()->user())
<!-- --------------------===================== Modal =============-=------------------------------------>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="notification_modal">

                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex gap-2 align-items-center">
                                <h3 class="mb-0">Notification</h3>
                                <p class="mb-0 count_label">3</p>
                            </div>
                            <p class="mb-0">Mark all as read</p>
                        </div>

                        <div class='mt-5 d-flex flex-column gap-2'>
                            <div class="item d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    {{-- <img src="/images/candinet1.png" alt="" /> --}}
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
                                    {{-- <img src="/images/candinet1.png" alt="" /> --}}
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
                                    {{-- <img src="/images/candinet1.png" alt="" /> --}}
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
            </div>
        </div>
        
<!-- --------------------===================== Modal =============-=------------------------------------>
@endif
<!-----=================================== Footer section ============================-------------------------->
