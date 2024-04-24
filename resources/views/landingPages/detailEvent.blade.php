@include('landingPages.layouts.header')
<!-- ======= Popup Form ======= -->
<div class="blur-bg-overlay"></div>
<div class="form-popup">
    <span class="close-btn material-symbols-outlined">close</span>
    <div class="form-box login">
        <div class="form-details">
            <h2>Welcome Back</h2>
            <p>
                Please log in using your personal information to stay connected with us
            </p>
        </div>
        <div class="form-content">
            <h2>LOGIN</h2>
            <form action="#">
                <div class="input-field">
                    <input type="text" required>
                    <label>Email</label>
                </div>

                <div class="input-field">
                    <input type="password" required>
                    <label>Password</label>
                </div>
                <a href="#" class="forgot-pass">Forgot password?</a>
                <button type="submit">Log In</button>
            </form>
            <div class="bottom-link">
                Don't have an account?
                <a href="#" id="signup-link">Signup</a>
            </div>
        </div>
    </div>

    <div class="form-box signup">
        <div class="form-details">
            <h2>Create Account</h2>
            <p>
                Please sign up using your personal information.
            </p>
        </div>
        <div class="form-content">
            <h2>SIGN UP</h2>
            <form action="#">
                <div class="input-field">
                    <input type="text" required>
                    <label>Your name</label>
                </div>

                <div class="input-field">
                    <input type="text" required>
                    <label>Enter your email</label>
                </div>

                <div class="input-field">
                    <input type="text" required>
                    <label>Username</label>
                </div>

                <div class="input-field">
                    <input type="password" required>
                    <label>Create password</label>
                </div>

                <div class="input-field">
                    <input type="password" required>
                    <label>Confirmation password</label>
                </div>
                <button type="submit">Sign Up</button>
            </form>
            <div class="bottom-link">
                Already have an account?
                <a href="" id="login-link">Login</a>
            </div>
        </div>
    </div>
</div>
<!-- End Popup Form -->

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{route('home')}}#event">Home</a></li>
                <li>Event Details</li>
            </ol>
            <h2>Event Details</h2>
        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Portfolio Event Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider">
                        <div class="swiper-wrapper align-items-center justify-content-center">
                            <div class="img-details">
                                @if ($event->thumbnail)
                                    <img src="{{ asset('/storage/thumbnails/' . $event->thumbnail) }}"
                                        style="max-width: 100%; width: 100%" alt="Error Image">
                                @else
                                    <img src="https://www.tbnindonesia.org/images/transformational-sales-conference-2023-.jpg"
                                        style="max-width: 100%; width: 100%" alt="Error Image">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>{{ $event->name }}</h3>
                        <ul>
                            <li><strong>Category</strong>: {{ $event->eventCategory->name }}</li>
                            <li><strong>Speaker</strong>: {{ $event->speaker->name }}</li>
                            <li><strong>Moderator</strong>: {{ $event->moderator->name }}</li>
                            <li><strong>Date</strong>: {{ $event->date }}</li>
                            <li><strong>Location</strong>: {{ $event->location }}</li>
                        </ul>
                        <button id="buyTicketBtn">Registrasi</button>
                    </div>
                    <div class="portfolio-description">
                        <h2>Description</h2>
                        <p>
                            {{ $event->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Event Details Section -->
</main><!-- End #main -->
@include('landingPages.layouts.footer')
