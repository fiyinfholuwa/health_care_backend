@extends('frontend.app')

<!-- Hero Section -->
@section('content')
    <section class="hero text-center" style="position: relative; background-image: url({{asset('frontend/images/8.png')}}); background-size: cover; background-position: center; padding: 100px 0; color: navy;">
        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.2); z-index: 1;"></div>
        <div style="position: relative; z-index: 2;">
            <!-- Your content goes here -->
        </div>
        <div class="container">
            <h1>Compassionate Home Care for Your Loved Ones</h1>
            <p class="lead mb-4" style="font-weight: bold;">in West Orange & Westfield</p>
            <a href="{{route('booking')}}" class="btn btn-primary btn-lg">Book a Free Consultation</a>
        </div>
    </section>


    <!-- Introduction Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="mb-4">Welcome to AUTRIS Healthcare</h2>
                    <p class="lead">We provide compassionate and personalized home care services to help your loved ones maintain their independence and quality of life.</p>
                    <p>Our team of skilled professionals is dedicated to delivering exceptional care tailored to each individual's needs, ensuring comfort and peace of mind for families.</p>
                    <a href="{{route('about')}}" class="btn btn-outline-primary mt-3">Learn More About Us</a>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('frontend/images/2.png')}}" alt="Caring nurse with patient" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Overview -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center section-title">Our Services</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="service-box text-center">
                        <i class="fas fa-user-nurse"></i>
                        <h3>Personal Care Assistant (PCA)</h3>
                        <p>Assistance with daily living activities and personal care needs.</p>
                        <a href="{{route('pca')}}" class="btn btn-sm btn-primary mt-3">Learn More</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-box text-center">
                        <i class="fas fa-stethoscope"></i>
                        <h3>Skilled Nursing</h3>
                        <p>Professional nursing care for complex medical needs.</p>
                        <a href="{{route('nurse')}}" class="btn btn-sm btn-primary mt-3">Learn More</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-box text-center">
                        <i class="fas fa-home"></i>
                        <h3>Live-In Care</h3>
                        <p>24/7 care and support in the comfort of your home.</p>
                        <a href="{{route('live.care')}}" class="btn btn-sm btn-primary mt-3">Learn More</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-box text-center">
                        <i class="fas fa-walking"></i>
                        <h3>Rehabilitation Therapy</h3>
                        <p>Specialized therapy to improve mobility and independence.</p>
                        <a href="{{route('therapy')}}" class="btn btn-sm btn-primary mt-3">Learn More</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-box text-center">
                        <i class="fas fa-user-nurse"></i>
                        <h3>Nursing</h3>
                        <p>General nursing care for individuals with health conditions requiring professional monitoring.
                        </p>
                        <a href="{{route('nursing')}}" class="btn btn-sm btn-primary mt-3">Learn More</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-box text-center">
                        <i class="fas fa-child"></i>
                        <h3>Pediatrics
                        </h3>
                        <p>Specialized medical care tailored for infants, children, and adolescents.</p>
                        <a href="{{route('pediatrics')}}" class="btn btn-sm btn-primary mt-3">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Client Testimonials -->
    @if(count($testimonials) > 0)
        <section class="py-5">
            <div class="container">
                <h2 class="text-center section-title">What Our Clients Say</h2>
                <div class="row">
                    @foreach($testimonials as $test)
                        <div class="col-md-6">
                            <div class="testimonial">
                                <p>{{$test->body}}</p>
                                <footer class="blockquote-footer mt-3">{{$test->full_name}}</footer>
                            </div>
                        </div>

                    @endforeach
                </div>
                <div class="text-center mt-5">
                    <a href="{{route('testimonials')}}" class="btn btn-primary">Read More Testimonials</a>
                </div>
            </div>
        </section>

    @endif

    <!-- Book a Consultation -->
    <section class="py-5 cta-section">
        <div class="container text-center">
            <h2 class="mb-4">Ready to Get Started?</h2>
            <p class="lead mb-4">Book a free consultation with our care experts today and discover how we can help your loved ones.</p>
            <a href="{{route('booking')}}" class="btn btn-light btn-lg" aria-label="Book your consultation">
                Book Your Consultation
            </a>
        </div>
    </section>

    @if(count($blogs) > 0 )
        <section class="py-5 bg-light blog-preview-section">
            <div class="container">
                <h4 class="text-center section-title mb-5">Latest from Autris Insights</h4>
                <div class="row">
                    @foreach($blogs as $blog)
                        <div class="col-md-4">
                            <div class="card blog-card mb-4">
                                <div class="card-img-wrapper">
                                    <img src="{{asset($blog->image)}}" class="card-img-top" alt="Blog Post Image">
                                    <div class="card-img-overlay d-flex align-items-start justify-content-end">
                                        <span class="badge badge-category bg-primary">{{optional($blog->category_info)->name}}</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$blog->title}}</h5>
                                    <p class="card-text">{!! (\Illuminate\Support\Str::limit($blog->body, 40, '...')) !!}</p>
                                    <a href="{{route('insights.detail', $blog->slug)}}" class="btn btn-link text-primary p-0 read-more">Read More <i class="fas fa-arrow-right ml-2"></i></a>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
                <div class="text-center mt-5">
                    <a href="{{route('insights')}}" class="btn btn-primary btn-lg">Visit Autris Insights</a>
                </div>
            </div>
        </section>

    @endif
    <!-- Blog Preview Section -->

    <!-- Join Us Section (before the footer) -->
    <section class="join-us">
        <div class="container">
            <h2>Join Us in Transforming Healthcare</h2>
            <a href="" class="btn btn-apply">APPLY NOW</a>
        </div>
    </section>

    <!-- Divider before footer -->

@endsection
<!-- Footer -->
