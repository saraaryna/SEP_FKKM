@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.userEmail') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="userEmail" class="col-md-4 col-form-label text-md-end">{{ __('userEmail Address') }}</label>

                            <div class="col-md-6">
                                <input id="userEmail" type="userEmail" class="form-control @error('userEmail') is-invalid @enderror" name="userEmail" value="{{ old('userEmail') }}" required autocomplete="userEmail" autofocus>

                                @error('userEmail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
