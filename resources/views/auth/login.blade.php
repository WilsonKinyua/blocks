<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Get started with Blocks - Manage all your properties in one place.</title>

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
                                </div>
                            </div>
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
                            <form id='signup' class="hide">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="name">
                                            <span class="form-label">Name</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control e1" type="email" name="email">
                                            <span class="form-label">Email</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="tel" name="phone">
                                            <span class="form-label">Phone</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="location">
                                            <span class="form-label">Location</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" type="number" name="properties">
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
                                    <button class="submit-btn">Get Started</button>
                                </div>
                                <br>
                                <a href="#" class='togle-forms'>🔐 Login Instead</a>
                            </form>


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

                            <form id='reset' class='hide'>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" type="email" name="email">
                                            <span class="form-label">Email:</span>
                                        </div>
                                    </div>


                                </div>
                                <br>
                                <div class="form-btn">
                                    <button class="submit-btn">Reset Password</button>
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
