@extends('layouts.app')

@section('content')
<div class="splash active">
    <div class="splash-icon"></div>
</div>

<main class="main h-100 w-100">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">{{ __('Register') }}</h1>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="userName" class="form-label">{{ __('Name') }}</label>
                                        <input id="userName" type="text" class="form-control @error('userName') is-invalid @enderror" name="userName" value="{{ old('userName') }}" required autocomplete="userName" autofocus>
                                        @error('userName')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="userEmail" class="form-label">{{ __('Email Address') }}</label>
                                        <input id="userEmail" type="email" class="form-control @error('userEmail') is-invalid @enderror" name="userEmail" value="{{ old('userEmail') }}" required autocomplete="userEmail">
                                        @error('userEmail')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="userPassword" class="form-label">{{ __('Password') }}</label>
                                        <input id="userPassword" type="password" class="form-control @error('userPassword') is-invalid @enderror" name="userPassword" required autocomplete="new-password">
                                        @error('userPassword')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="userIC" class="form-label">{{ __('IC Number') }}</label>
                                        <input id="userIC" type="text" class="form-control" name="userIC" value="{{ old('userIC') }}" autocomplete="userIC">
                                    </div>

                                    <div class="mb-3">
                                        <label for="userAddress" class="form-label">{{ __('Address') }}</label>
                                        <input id="userAddress" type="text" class="form-control" name="userAddress" value="{{ old('userAddress') }}" autocomplete="userAddress">
                                    </div>

                                    <div class="mb-3">
                                        <label for="userPhoneNum" class="form-label">{{ __('Phone Number') }}</label>
                                        <input id="userPhoneNum" type="text" class="form-control" name="userPhoneNum" value="{{ old('userPhoneNum') }}" autocomplete="userPhoneNum">
                                    </div>

                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">{{ __('Register') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<script src="js/app.js"></script>

@endsection
