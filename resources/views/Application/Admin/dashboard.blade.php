@extends('Application.Admin.base')
@section('Application.Admin.dashboard')


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div class="container-fluid">

    <div class="header">
        <h1 class="header-title">
            Dashboard
        </h1>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-3 col-xl">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">User</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-info-dark">
                                    <i class="align-middle" data-feather="users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="display-5 mt-1 mb-3">
                        {{ $totalUsers }}
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Application</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-info-dark">
                                    <i class="align-middle" data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="display-5 mt-1 mb-3">
                        {{ $totalApp }}
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Kiosk</h5>
                        </div>
                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-info-dark">
                                    <i class="align-middle" data-feather="file"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="display-5 mt-1 mb-3">
                        {{-- {{ $totalKiosk }} --}}
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xl">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Complaint</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-info-dark">
                                    <i class="align-middle" data-feather="file-text"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h1 class="display-5 mt-1 mb-3">
                    {{-- {{ $totalComplaint }} --}}
                </h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-12 col-xxl-4 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <div class="card-actions float-end"></div>
                    <h5 class="card-title mb-0">Total User</h5>
                </div>
                <div class="card-body px-4">
                    <canvas id="userChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Assuming you have passed the userRoles and userCounts from the controller
        var userRoles = {!! json_encode($userRoles) !!};
        var userCounts = {!! json_encode($userCounts) !!};
    
        var ctx = document.getElementById('userChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: userRoles,
                datasets: [{
                    label: 'Total Users by Role',
                    data: userCounts,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    





@stop