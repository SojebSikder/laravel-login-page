<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <style>
            body {
                font-size: 14px;
            }

            input[type="checkbox"] {
                border: 1px solid #44D090;
            }

            input[type="checkbox"]:checked {
                background-color: #44D090;
            }
        </style>
       
    </head>
    <body style="background: #F6F7FC">
        <div>
            <div>
                <div>
                    <header>  
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <main>
                        <div class="d-flex justify-content-center align-items-center vh-100">
                            <div class="card" style="width: 22rem;">
                                <img src="./assets/images/bg.jpg" class="card-img-top" style="height: 150px">
                                <div class="card-body">
                                    <div class="mx-3 mt-3">
                                        <h5 class="card-title d-inline">Sign In</h5>

                                        <div class="float-end">
                                            <i class="fa-brands fa-facebook-f"></i>
                                            <i class="fa-brands fa-twitter" style="margin-left:20px"></i> 
                                        </div>
                                    </div>

                                    {{-- message --}}
                                    @if (session('success'))
                                        <div class="alert alert-danger">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <form action={{ route('auth.login') }} method="post">
                                        @csrf
                                        <div>
                                            <div class="m-3">
                                                <input type="username" class="form-control" id="username" name="username" placeholder="Username">
                                            </div>
        
                                            <div class="m-3">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                            
                                            <div class="mt-3 d-grid gap-2">
                                                <button class="btn btn-success" style="background: #44D090; border-color: #44D090;">Sign in</button>
                                            </div>
                                        </div>
    
                                        <div class="mx-3 mt-3 d-flex justify-content-between">
                                            <div class="d-flex">
                                                <input type="checkbox" class="form-check-input" style="margin-right: 10px" id="remember" name="remember">
                                                <label class="form-check-label" style="color: #44D090" for="remember" checked="true">Remember me</label>
                                            </div>
                                            <div>
                                                <a href="" class="form-check-label text-decoration-none" style="color: black" for="remember">Forgot Password</a>
                                            </div>
                                        </div>

                                    </form> 

                                    <div class="mx-3 mt-3">
                                        <p class="text-center">Not a member? <a href="" class="text-decoration-none" style="color: #44D090">Sign up</a></p>

                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
