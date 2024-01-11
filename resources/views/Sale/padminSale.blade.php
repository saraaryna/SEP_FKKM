<!--ERNIE MASTURA BINTI BAKRI (CB21161)-->

<!-- padminSale.blade.php -->

@extends('Sale.basePADmin')
@section('contents')

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            PUPUK Admin
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="padmin">Dashboard</a></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="salesChart" height="120"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kiosk Participant Name</th>
                            <th>Date</th>
                            <th>Kiosk No</th>
                            <th>Sales (RM)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sales as $index => $sale)
                            <tr>
                                <td>{{ $index + 1 }}</td>

                                <td>{{ $sale->salesDate }}</td>
                                <td>{{ $sale->kioskID }}</td>
                                <td>{{ $sale->salesTotal }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the chart data from PHP
        var chartData = @json($chartData);

        // Prepare labels and data for Chart.js
        var labels = Object.keys(chartData);
        var data = Object.values(chartData);

        // Create a chart using Chart.js
        var ctx = document.getElementById('salesChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Sales',
                    data: data,
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
    });
</script>

@endsection
