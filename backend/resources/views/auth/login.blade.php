<x-layout>

    <div class="main_content_iner d-flex align-items-center justify-content-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="white_box shadow-lg p-4 rounded">
                        <div class="modal-content cs_modal border-0">
                            <div class="modal-header justify-content-center theme_bg_1 py-3 rounded-top">
                                <h5 class="modal-title text_white">Dashboard Login</h5>
                            </div>
                            <div class="modal-body p-4">
                                <form method="post" action="{{ route('user.login') }}">
                                    <!-- use @csrf for  -->
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input type="email" class="form-control" name="email" placeholder="Enter your email" required />
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required />
                                    </div>
                                    <button type="submit" class="btn btn-info w-100">Log in</button>
                                    <!-- <p class="mt-3 text-center">
                                        Need an account? <a data-bs-toggle="modal" data-bs-target="#sign_up" data-bs-dismiss="modal" href="{{ route('user.register') }}">Sign Up</a>
                                    </p> -->
                                    <div class="text-center mt-2">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#forgot_password" data-bs-dismiss="modal" class="text-muted">Forgot Password?</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-layout>