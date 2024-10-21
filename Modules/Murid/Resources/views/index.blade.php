@extends('layouts.backend.app')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-body">
        <!-- Start: Welcome Section -->
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="card card-congratulations shadow-lg border-0"
                     style="background: radial-gradient(circle, rgba(115,103,240,1) 0%, rgba(206,159,252,1) 100%);
                            border-radius: 15px;
                            overflow: hidden;
                            position: relative;">
                    <!-- Floating Particles -->
                    <div class="floating-particles">
                        <span class="particle particle-1"></span>
                        <span class="particle particle-2"></span>
                        <span class="particle particle-3"></span>
                    </div>

                    <div class="card-body text-center position-relative">
                        <img src="{{asset('Assets/backend/images/pages/decore-left.png')}}"
                             class="congratulations-img-left position-absolute"
                             alt="card-img-left"
                             style="top: 10px; left: 10px; width: 80px;" />
                        <img src="{{asset('Assets/backend/images/pages/decore-right.png')}}"
                             class="congratulations-img-right position-absolute"
                             alt="card-img-right"
                             style="top: 10px; right: 10px; width: 80px;" />

                        <!-- Avatar and Award Icon -->
                        <div class="avatar avatar-xl bg-white shadow-lg mx-auto mb-2"
                             style="border-radius: 50px; padding: 15px; animation: pulse 2s infinite;">
                            <div class="avatar-content bg-gradient-primary rounded-circle"
                                 style="padding: 15px; display: flex; align-items: center; justify-content: center;">
                                <i data-feather="award" class="font-large-1 text-white"></i>
                            </div>
                        </div>

                        <!-- Welcome Message -->
                        <div class="text-center mt-2">
                            <h1 class="mb-1 text-white"
                                style="font-weight: 900; font-size: 2.7rem; letter-spacing: 1.2px;">Welcome Back, {{Auth::user()->name}}!</h1>
                            <p class="card-text text-light m-auto w-75"
                               style="font-size: 1.2rem;">
                                Make the most of your day! Start exploring your tasks and activities.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: Welcome Section -->

        <!-- Start: Additional Section (for any additional widgets) -->
        <div class="row mt-4">
            <!-- Card 1: Activity -->
            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <div class="card shadow-lg border-0 glass-effect"
                     style="border-radius: 12px; backdrop-filter: blur(10px); background: rgba(255,255,255,0.1); transition: transform 0.3s ease;">
                    <div class="card-body text-center">
                        <i data-feather="activity"
                           class="font-large-2 text-primary mb-2 animate__animated animate__bounceIn"></i>
                        <h4 class="mt-2" style="font-weight: 600;">Your Activity</h4>
                        <p class="text-muted">Monitor your daily tasks and performance here.</p>
                    </div>
                </div>
            </div>

            <!-- Card 2: Events -->
            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <div class="card shadow-lg border-0 glass-effect"
                     style="border-radius: 12px; backdrop-filter: blur(10px); background: rgba(255,255,255,0.1); transition: transform 0.3s ease;">
                    <div class="card-body text-center">
                        <i data-feather="calendar"
                           class="font-large-2 text-success mb-2 animate__animated animate__fadeInUp"></i>
                        <h4 class="mt-2" style="font-weight: 600;">Upcoming Events</h4>
                        <p class="text-muted">Stay updated with the latest events.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: Additional Section -->
    </div>
</div>

<!-- Custom Styling -->
<style>
    .floating-particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        overflow: hidden;
    }
    .floating-particles .particle {
        position: absolute;
        width: 20px;
        height: 20px;
        background-color: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        animation: float 10s infinite ease-in-out;
    }
    .particle-1 { top: 20%; left: 15%; animation-delay: 0s; }
    .particle-2 { top: 40%; left: 70%; animation-delay: 4s; }
    .particle-3 { top: 70%; left: 30%; animation-delay: 2s; }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    .card:hover {
        transform: scale(1.05);
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    .glass-effect {
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    }

    .glass-effect:hover {
        background: rgba(255, 255, 255, 0.3);
    }
</style>

<!-- Include Feather Icons -->
<script>
    feather.replace();
</script>
@endsection
