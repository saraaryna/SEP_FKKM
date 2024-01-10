<!--ERNIE MASTURA BINTI BAKRI (CB21161)-->

@extends('Sale.base')
@section('contents')

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Kiosk Sales
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="gotosale">Kiosk Sales</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sales List</a></li>
            </ol>
        </nav>
    </div>

    
    <div class="row">
        <div class="col-md-4">
            <div class="card text-bg-light mb-3" style="max-width: 15rem;">
                <!-- total sales per month -->
                <div class="card-header">Sales per month</div>
                <div class="card-body">
                    <h2><b></b></h2> 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-light mb-3" style="max-width: 15rem;">
                <!-- total sales per year -->
                <div class="card-header">Sales per year</div>
                <div class="card-body">
                    <h2><b></b></h2> 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-light mb-3" style="max-width: 15rem;">
                <!-- total sales  -->
                <div class="card-header">Total sales</div>
                <div class="card-body">
                    <h2><b></b></h2> 
                </div>
            </div>
        </div>
      
</div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="#" class="btn btn-info" style="float: right;" data-bs-toggle="modal" data-bs-target="#addApp">+
                    New Sales</a>
            </div>
            <div class="card-body">
                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Kiosk Number</th>
                            <th>Date</th>
                            <th>Sales (RM)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sales as $index => $sale)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $sale->kioskID }}</td>
                                <td>{{ $sale->salesDate }}</td>
                                <td>{{ $sale->salesTotal }}</td>
                                <td class="table-action">
                                    
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editApp" data-saleid="{{ $sale->id }}">
                                        <!-- Icon for "Edit" action -->
                                        <i class="align-middle fas fa-fw fa-pen"></i>
                                    </a>

                                    <a href="#">
                                        <!-- Icon for "View" action -->
                                        <i class="align-middle fas fa-fw fa-eye"></i> 
                                    </a>
                                    <a href="#">
                                        <!-- Icon for "Delete" action -->
                                        <i class="align-middle fas fa-fw fa-trash"></i> 
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addApp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Sales</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
            <form method="POST" action="{{ route('kpsale.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Date field -->
                <div class="form-group">
                    <label for="salesDate">Date</label>
                    <input type="date" class="form-control" id="salesDate" name="salesDate" required>
                </div>
                <!-- Total Sales field -->
                <div class="form-group">
                    <label for="totalSales">Total Sales (RM)</label>
                    <input type="text" class="form-control" id="totalSales" name="totalSales" required>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info" name="addSale">Add</button>
                </div>
            </form>

            </div>
        </div>
    </div>


    <!-- Modal for Edit -->
<div class="modal fade" id="editApp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Sales</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <!-- Form for editing sales details -->
                <form method="POST" action="{{ route('updateSale', ['id' => $sale->id]) }}" enctype="multipart/form-data">
                    
                    @csrf
                    @method('PUT') 

                    <!-- Fields for editing sales details -->
                    <div class="form-group">
                        <label for="editSalesDate">Date</label>
                        <input type="date" class="form-control" id="editSalesDate" name="editSalesDate" required>
                    </div>
                    <div class="form-group">
                        <label for="editTotalSales">Total Sales (RM)</label>
                        <input type="text" class="form-control" id="editTotalSales" name="editTotalSales" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info" name="updateSale">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Datatables basic
            $('#datatables-basic').DataTable({
                responsive: true
            });
            // Datatables with Buttons
            var datatablesButtons = $('#datatables-buttons').DataTable({
                lengthChange: !1,
                buttons: ["copy", "print"],
                responsive: true
            });
            datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")

            // Handle edit modal
            $('#datatables-buttons').on('click', 'a[data-bs-target="#editApp"]', function () {
                var saleID = $(this).data('saleid');

                var saleDetails = fetchSaleDetails(saleID);

                // Populate the edit modal fields with the fetched details
                $('#editSalesDate').val(saleDetails.salesDate);
                $('#editTotalSales').val(saleDetails.salesTotal);
            });
        });

        function deleteSale(saleID) {
            if (confirm("Are you sure you want to delete this?")) {
                var form = document.createElement("form");
                form.method = "post";
                form.action = "deleteSale.php";

                var input = document.createElement("input");
                input.type = "hidden";
                input.name = "saleID";
                input.value = saleID;

                form.appendChild(input);

                document.body.appendChild(form);
                form.submit();
            }
        }

        function fetchSaleDetails(saleID) {
            
            return {
                salesDate: '2022-01-01', 
                salesTotal: '100.00',  
            };
        }


    </script>


@endsection