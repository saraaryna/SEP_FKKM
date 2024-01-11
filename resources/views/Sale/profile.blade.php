@extends('Sale.basePADmin')
@section('contents')
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Manage User
        </h1>
        {{-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard-default.html">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage User Profile</li>
            </ol>
        </nav> --}}
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0">User Profile</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('fkBursary.profile.update') }}" method="post">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label for="userRole" class="form-label">User Role:</label>
                            <input type="text" class="form-control" id="userRole" name="userRole" value="{{ $user->userRole }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="userName" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="userName" name="userName" value="{{ $user->userName }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="userIC" class="form-label">IC Number:</label>
                            <input type="text" class="form-control" id="userIC" name="userIC" value="{{ $user->userIC }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="userAddress" class="form-label">Address:</label>
                            <input type="text" class="form-control" id="userAddress" name="userAddress" value="{{ $user->userAddress }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="userPhoneNum" class="form-label">Phone Number:</label>
                            <input type="text" class="form-control" id="userPhoneNum" name="userPhoneNum" value="{{ $user->userPhoneNum }}" required>
                        </div>
                        <button type="submit" class="btn" style="background-color: #41968B; color:white;">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
