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

<main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('home') }}#event">Home</a></li>
                <li>Event Details</li>
            </ol>
            <h2>Event Details</h2>
        </div>
    </section>

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
                        <button data-bs-toggle="modal" data-bs-target="#daftarEvent">Registrasi</button>
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

    {{-- Modal Deaftar Event --}}
    <div class="modal fade" id="daftarEvent" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registrasi Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <!-- Multi Columns Form -->
                        <form class="row g-3" action="" method="POST">
                            @csrf
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="phone_number" class="form-label">No Telephon</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    value="{{ old('phone_number') }}" required>
                                @error('phone_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="form-select" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki" {{ old('gender') == 'Laki-Laki' ? 'selected' : '' }}>
                                        Laki-Laki</option>
                                    <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" id="btn-Daftar">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Event Details Section -->
</main><!-- End #main -->
@include('landingPages.layouts.footer')
