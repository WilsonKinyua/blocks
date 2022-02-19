<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Get started with Blocks - Manage all your properties in one place.</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('auth/css/bootstrap.min.css') }}" />

    <!-- styles -->
    <link type="text/css" rel="stylesheet" href="{{ asset('auth/css/style.css') }}" />

</head>

<body>
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="booking-cta">
                            <h1>Manage your property</h1>
                            <p> ✔️ Track Payments </p>
                            <p> ✔️ Send SMS Reminders </p>
                            <p> ✔️ Send Invoices and Receipts </p>
                            <p style='font-size:medium; font-weight:bold'> ✔️ Manage all your properties in one place!
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-1">
                        <div class="booking-form">
                            <div class="row">
                                <div class="col-md-12">
                                    @if (session('message'))
                                        <div class="alert alert-info" role="alert">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{-- login form --}}
                            <form method="POST" action="{{ route('login') }}" id="login">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input
                                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                type="email" name="email" required autocomplete="email"
                                                value="{{ old('email', null) }}">
                                            @if ($errors->has('email'))
                                                <div class="invalid-feedback text-danger">
                                                    <small>{{ $errors->first('email') }} </small>
                                                </div>
                                            @endif
                                            <span class="form-label">Email:</span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input
                                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                required type="password" name="password">
                                            @if ($errors->has('password'))
                                                <div class="invalid-feedback text-danger">
                                                    <small>{{ $errors->first('password') }}</small>
                                                </div>
                                            @endif
                                            <span class="form-label">Password:</span>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-inline">

                                            <span>🔐 <a class="btn reset" href="#">Reset Password</a></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-inline">
                                            <span>💼 <a class="btn  togle-forms"> Create Account</a></a></span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-btn">
                                    <button class="submit-btn" type="submit">Login</button>
                                </div>
                                <br>
                            </form>
                            {{-- create account form --}}
                            <form method="POST" action="{{ route('register') }}" id='signup' class="hide">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <span class="form-label">Name</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <span class="form-label">Email</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="tel" name="phone" required>
                                            <span class="form-label">Phone</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="location" required>
                                            <span class="form-label">Location</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="number" name="no_of_properties">
                                            <span class="form-label">No. of Properties</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="form-label">Have a Paybill</span>
                                            <select class="form-control" name="paybill">
                                                <option value='0'>No</option>
                                                <option value='1'>Yes, 1</option>
                                                <option value='More than 1'>Yes, More than 1</option>
                                            </select>
                                            <span class="select-arrow"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <span class="form-label">Password</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                            <span class="form-label">Confirm Password</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-inline">
                                            <input class="" type="checkbox" required>
                                            <span class=""><a class="btn tnc" href="#">Accept Terms
                                                    & Conditions</a></span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-btn">
                                    <button class="submit-btn" type="submit">Get Started</button>
                                </div>
                                <br>
                                <a href="#" class='togle-forms'>🔐 Login Instead</a>
                            </form>
                            {{-- change password form --}}
                            <form id='password' class='hide'>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control e2" type="email" name="email"
                                                value='Re-type your email'>
                                            <span class="form-label">Email:</span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control p1" type="password" name="password">
                                            <span class="form-label">Password:</span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control p2" type="password">
                                            <span class="form-label">Confirm Password:</span>
                                        </div>
                                    </div>


                                </div>
                                <br>
                                <div class="form-btn">
                                    <button class="submit-btn" type='submit'>Save Password</button>
                                </div>
                                <br>

                                <span class="password">🔐 <a class="btn" href="#">Back to
                                        Login</a></span>
                            </form>
                            {{-- reset password form --}}
                            <form method="POST" action="{{ route('password.email') }}" id='reset' class='hide'>
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input
                                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                type="email" name="email" required>
                                            @if ($errors->has('email'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                            <span class="form-label">Email:</span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-btn">
                                    <button class="submit-btn" type="submit">Reset Password</button>
                                </div>
                                <br>
                                <a href="#" class='reset'> Back to Login</a>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('auth/js/jquery.min.js') }}"></script>
    <script src="{{ asset('auth/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('auth/js/script.js') }}"></script>


</body>

</html>
