<div class="container-fluid g-0">
    <div class="row">
        <div class="col-lg-12 p-0">
            <div
                class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <div class="serach_field-area d-flex align-items-center">
                    
                </div>
                <div
                    class="header_right d-flex justify-content-between align-items-center">

                    <!-- profile_info -->
                    <div class="profile_info">
                        <img src="{{ url('assets/img/client_img.png') }}" alt="#" />
                        <div class="profile_info_iner">
                            <div class="profile_author_name">
                                <p>User Login Name </p>
                                <h5>{{ Auth::user()->name }}</h5>
                            </div>
                            <div class="profile_info_details">
                                <a href="#">My Profile </a>
                                <a href="#">Settings</a>
                                <a href="{{ route('logout') }}">Log Out </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>