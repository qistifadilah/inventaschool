<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>InventaSchool</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('landing-page/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing-page/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('landing-page/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/assets/compiled/css/app.css') }}">

    <!-- Template Stylesheet -->
    <link href="{{ asset('landing-page/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0" id="home">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0">
                        <i class="bi bi-dropbox"></i>
                        InventaSchool
                    </h1>
                    {{-- <img src="{{ asset('img/logo2.png')}}" alt="Logo"> --}}
                </a>
                <button class="navbar-toggler rounded-pill" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="#home" class="nav-item nav-link active">Home</a>
                        <a href="#features" class="nav-item nav-link">Features</a>
                        <a href="#testimonial" class="nav-item nav-link">Testimonial</a>
                        <a href="#contact" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="{{ route('auth.login') }}"
                        class="btn btn-light rounded-pill py-2 px-4 ms-3 d-none d-lg-block text-white">Login</a>
                </div>
            </nav>

            <div class="container-xxl bg-primary hero-header">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated slideInDown">Aplikasi Inventaris Sarana dan Prasarana
                                Sekolah</h1>
                            <p class="text-white pb-3 animated slideInDown">
                                Selamat datang di InventaSchool, platform terbaik untuk manajemen inventaris sarana dan
                                prasarana sekolah Anda.</p>
                            <div class="position-relative w-100 mt-3">
                                <a href="{{ route('auth.register') }}" class="btn btn-light-secondary rounded-2">
                                    Daftar Sekarang</a>
                            </div>
                        </div>
                        <div class="col-lg-6 text-center text-lg-start">
                            <img class="img-fluid rounded animated zoomIn"
                                src="{{ asset('landing-page/img/hero.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Feature Start -->

        <div class="container-xxl py-5" id="features">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item bg-light rounded text-center p-5">
                            <i class="fa fa-4x fa-edit text-primary mb-4"></i>
                            <h5 class="mb-3">Peminjaman</h5>
                            <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                stet diam sed stet.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="feature-item bg-light rounded text-center p-5">
                            <i class="fa fa-4x fa-sync text-primary mb-4"></i>
                            <h5 class="mb-3">Pengembalian</h5>
                            <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                stet diam sed stet.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="feature-item bg-light rounded text-center p-5">
                            <i class="fa fa-4x fa-draw-polygon text-primary mb-4"></i>
                            <h5 class="mb-3">Inventaris</h5>
                            <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                stet diam sed stet.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End -->

        <!-- Facts Start -->
        <div class="container-xxl bg-primary my-6 py-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                        <i class="fa fa-cogs fa-3x text-white mb-3"></i>
                        <h1 class="mb-2" data-toggle="counter-up">7264</h1>
                        <p class="text-white mb-0">Active Install</p>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                        <i class="fa fa-users fa-3x text-white mb-3"></i>
                        <h1 class="mb-2" data-toggle="counter-up">6521</h1>
                        <p class="text-white mb-0">Satisfied Clients</p>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                        <i class="fa fa-certificate fa-3x text-white mb-3"></i>
                        <h1 class="mb-2" data-toggle="counter-up">729</h1>
                        <p class="text-white mb-0">Award Wins</p>
                    </div>
                    <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                        <i class="fa fa-quote-left fa-3x text-white mb-3"></i>
                        <h1 class="mb-2" data-toggle="counter-up">5917</h1>
                        <p class="text-white mb-0">Clients Reviews</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Facts End -->

        <!-- Testimonial Start -->
        <div class="container-xxl py-6" id="testimonial">
            <div class="container">
                <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">What Our Clients Say</h1>
                    <p class="mb-5">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita
                        erat ipsum et lorem et sit, sed stet no labore lorem sit clita duo justo</p>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor
                            diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem
                            sit clita duo justo.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle"
                                src="{{ asset('landing-page/img/testimonial-1.jpg') }}"
                                style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Client Name</h5>
                                <span>Profession</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor
                            diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem
                            sit clita duo justo.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle"
                                src="{{ asset('landing-page/img/testimonial-2.jpg') }}"
                                style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Client Name</h5>
                                <span>Profession</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor
                            diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem
                            sit clita duo justo.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle"
                                src="{{ asset('landing-page/img/testimonial-3.jpg') }}"
                                style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Client Name</h5>
                                <span>Profession</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->


        <!-- Contact Start -->
        <div class="container-xxl py-6" id="contact">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="mb-3">Get In Touch</h1>
                        <p class="mb-4">The contact form is currently inactive. Get a functional and working contact
                            form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and
                            you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0 btn-square rounded-circle bg-primary text-white">
                                <i class="fa fa-phone-alt"></i>
                            </div>
                            <div class="ms-3">
                                <p class="mb-2">Call Us</p>
                                <h5 class="mb-0">+012 345 6789</h5>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0 btn-square rounded-circle bg-primary text-white">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="ms-3">
                                <p class="mb-2">Mail Us</p>
                                <h5 class="mb-0">info@example.com</h5>
                            </div>
                        </div>
                        <div class="d-flex mb-0">
                            <div class="flex-shrink-0 btn-square rounded-circle bg-primary text-white">
                                <i class="fa fa-map-marker-alt"></i>
                            </div>
                            <div class="ms-3">
                                <p class="mb-2">Our Office</p>
                                <h5 class="mb-0">123 Street, New York, USA</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject"
                                            placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Send
                                        Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-body footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3">
                        <p class="section-title text-white h5 mb-4">Address<span></span></p>
                        <p><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <p class="section-title text-white h5 mb-4">Quick Link<span></span></p>
                        <a class="btn btn-link" href="">About</a>
                        <a class="btn btn-link" href="">Contact</a>
                        <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms & Conditions</a>
                        <a class="btn btn-link" href="">Support</a>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <p class="section-title text-white h5 mb-4">Community<span></span></p>
                        <a class="btn btn-link" href="">Career</a>
                        <a class="btn btn-link" href="">Leadership</a>
                        <a class="btn btn-link" href="">Strategy</a>
                        <a class="btn btn-link" href="">History</a>
                        <a class="btn btn-link" href="">Components</a>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <p class="section-title text-white h5 mb-4">Newsletter<span></span></p>
                        <p>Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit
                            non vulpu</p>
                        <div class="position-relative w-100 mt-3">
                            <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text"
                                placeholder="Your Email" style="height: 48px;">
                            <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i
                                    class="fa fa-paper-plane text-primary fs-4"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pb-3 px-3">
            <i class="bi bi-arrow-up"></i>
        </a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('landing-page/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('landing-page/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('landing-page/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('landing-page/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('landing-page/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('landing-page/js/main.js') }}"></script>
</body>

</html>
