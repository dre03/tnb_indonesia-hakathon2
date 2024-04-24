@include('landingPages.layouts.header')
<!-- ======= Popup Form ======= -->
<div class="blur-bg-overlay"></div>
<div class="form-popup" id="form-popup">
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

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                data-aos="fade-up" data-aos-delay="200">
                <h1>Welcome To Our Transformational Business Network Indonesia</h1>
                <h2>Better Social Foundations solve
                    social problems through social entrepreneurship</h2>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    <a href="https://www.youtube.com/watch?v=Kgrumz_76RI" class="glightbox btn-watch-video"><i
                            class="bi bi-play-circle"></i><span>Watch Video</span></a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="{{ asset('assetsFe/img/hero-images.png') }}" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>
</section>
<!-- End Hero -->

<main id="main">
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>About Us</h2>
            </div>

            <div class="content">
                <div class="text-center">
                    <p>
                        Social Foundation which houses a community consisting of Investors, NGOs, Educators,
                        Philanthropy which brings transformation to a better life solving social problems through social
                        entrepreneurship.
                    </p>
                    <a href="https://www.youtube.com/watch?v=Kgrumz_76RI" class="glightbox btn-watch-video"><i
                            class="bi bi-play-circle"></i><span>Watch Video</span></a>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Services</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-3 col-md- d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4>Investment</h4>
                        <p>Are you an entrepreneur seeking funding or an investor interested in joining our network? We
                            function as a strategic bridge connecting entrepreneurs and investors in Indonesia, offering
                            distinctive investment services tailored to meet the market's needs.</p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                    data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4>Advisory</h4>
                        <p>Utilizing its core network and expertise, we have established an advisory entity that
                            provides a wide range of key services. These services include research, capacity building,
                            on-demand consultation, and educational content creation, all aimed at creating a positive
                            impact for our extensive beneficiaries.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Speakers</h2>
                <p>Top speakers who have been involved in the event</p>
            </div>
            <div class="row">
                @foreach ($speakers as $item)
                    <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="member d-flex align-items-start">
                            <div class="pic">
                                @if ($item->profile)
                                    <img src="{{ asset('assetsFe/img/team/team-1.jpg') }}" class="img-fluid"
                                        alt="">
                            </div>
                        @else
                            <img src="https://randomuser.me/api/portraits/men/{{ rand(1, 99) }}.jpg" class="img-fluid"
                                alt="">
                        </div>
                @endif
                <div class="member-info">
                    <h4>{{ $item->name }}</h4>
                    <span>{{ $item->name }}</span>
                    <p>{{ $item->location }}</p>
                    <div class="social">
                        <a href=""><i class="ri-twitter-fill"></i></a>
                        <a href=""><i class="ri-facebook-fill"></i></a>
                        <a href=""><i class="ri-instagram-fill"></i></a>
                        <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
        </div>
    </section>
    <!-- End Team Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">
            <div">
                <div class="text-center">
                    <h3 class="mb-4">Collaboration for a sustainable future</h3>
                    <p> Lately, there has been a noticeable rise in collaborations between companies from diverse
                        industries aimed at tackling environmental and social challenges. These partnerships blend
                        unique perspectives and expertise to foster innovative solutions, spur progress, and generate
                        positive impact. Through collective efforts, businesses can harness their resources and
                        influence to build a more sustainable and fair world for future generations.</p>
                </div>
        </div>
        </div>
    </section>
    <!-- End Cta Section -->

    <!-- ======= event Section ======= -->
    <section id="event" class="event">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Event</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row justify-content-center">
                @foreach ($events as $item)
                    <div class="col-lg-4 mt-5" data-aos="fade-up" data-aos-delay="100">
                        <div class="box featured">
                            <h3>{{ $item->name }}</h3>
                            @if ($item->price)
                                <h4><sup>Rp.</sup>{{ $item->price }}<span>1 Person</span></h4>
                            @else
                                <h4><sup></sup>{{ $item->eventCategory->name }}</h4>
                            @endif
                             @if ($item->thumbnail)
                                    <img src="{{ asset('/storage/thumbnails/' . $item->thumbnail) }}" style="max-width: 100%; width: 100%" alt="Error Image">
                              @else
                            <img src="https://www.tbnindonesia.org/images/transformational-sales-conference-2023-.jpg" alt="" class="img-fluid">
                            @endif
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a href="{{ route('eventLp', $item->id) }}" class="buy-btn">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="box featured">
                        <h3>Transformational Sales Conference</h3>
                        <h4><sup>Rp.</sup>1.500.000<span>1 Person</span></h4>
                        <img src="https://www.tbnindonesia.org/images/transformational-sales-conference-2023-.jpg"
                            alt="" class="img-fluid">
                        <p class="mt-4">
                            It's crucial to adapt to the changing sales landscape in the digital age, and Seth Godin's
                            quote emphasizes the importance of customer-centricity.
                        </p>
                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="#" class="buy-btn">Register</a>
                            </div>
                            <div>
                                <a href="event" class="buy-btn">Detail</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- End event Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
        <div class="container">
            <div class="row" data-aos="zoom-in">
                <div class="section-title mt-4">
                    <h2>Our Partners</h2>
                </div>
                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="https://conference.tbnindonesia.org/assets/images/partners/tdr-one-team.png"
                        class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="https://conference.tbnindonesia.org/assets/images/partners/yss.png" class="img-fluid"
                        alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="https://conference.tbnindonesia.org/assets/images/partners/ActonInstitute.jpg"
                        class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="https://conference.tbnindonesia.org/assets/images/partners/WHydrocolloids.png"
                        class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="https://conference.tbnindonesia.org/assets/images/partners/actxplorer.png"
                        class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="https://conference.tbnindonesia.org/assets/images/partners/belmont.png"
                        class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End Cliens Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Contact</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">
                <div class="col-lg-5 d-flex align-items-stretch">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>Lippo Thamrin Lt.5 #0503,
                                Jl. M.H.Thamrin No.20, Menteng
                                Jakarta Pusat 10350, Indonesia</p>
                        </div>

                        <div class="email">
                            <a href="mailto:info@tbnindonesia.org">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@tbnindonesia.org</p>
                            </a>
                        </div>

                        <div class="phone">
                            <a href="tel:+6282310001908">
                                <i class="bi bi-whatsapp"></i>
                                <h4>Whatsapp:</h4>
                                <p>+62823 1000 1908</p>
                            </a>
                        </div>

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.563493711583!2d106.81801409678953!3d-6.189118399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f42685cea0ff%3A0xd54857f6751969d!2sLippo%20Thamrin!5e0!3m2!1sen!2sus!4v1713797427761!5m2!1sen!2sus"
                            frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                    <div class="php-email-form">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Your Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Your Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Message</label>
                            <textarea class="form-control" name="message" rows="10" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->
</main>
<!-- End #main -->
@include('landingPages.layouts.footer')
