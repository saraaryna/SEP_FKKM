<!DOCTYPE html>
<html lang="en">

<head>
    <link href="css/style.css" rel="stylesheet">
	<link href="css/modern.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="/img/fklogo.png">

    <title>FK Kiosk Management</title>

    <script src="js/settings.js"></script>
    <script src="js/app.js"></script>

    <!-- END SETTINGS -->
</head>

<body class="theme-blue">
    <div class="header-user">
        <div class="m-sm-4">
            <div class="text-center">
                <img src="/img/fklogo.png" class="img-fluid rounded-circle"
                    width="250" height="250" />
            </div>
        </div>
    </div>

    <div class="splash active">
        <div class="splash-icon" style="background: #30C9B7;"></div>
    </div>

    <main class="main h-100 w-100">
        <div class="container h-100">
            <div class="row h-100">
                {{-- <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100"> --}}
                    <div class="d-table-cell align-middle">
                        <div class="form-container">
                            <div class="card">
                                <div class="card-body">
                        <form method="post" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email"type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="userRole" class="col-md-4 col-form-label text-md-end">{{ __('User Role') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="userRole"  id="userRole" required>
                                        <option value="Category">Category</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Kiosk Participant">Kiosk Participant</option>
                                        <option value="PUPUK Admin">PUPUK Admin</option>
                                        <option value="Fk Bursary">FK Bursary</option>
                                        <option value="FK Technical Team">FK Technical Team</option>
                                    </select>

                                    @error('userRole')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
 --}}
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn" style="background-color: #30C9B7;">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
