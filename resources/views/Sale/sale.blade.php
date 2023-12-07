@extends('Sale.base')
@section('contents')

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Kiosk Sales
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboardAdmin.php">Kiosk Sales</a></li>
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
                    <h2><b>RM260.00</b></h2> 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-light mb-3" style="max-width: 15rem;">
                <!-- total sales per year -->
                <div class="card-header">Sales per year</div>
                <div class="card-body">
                    <h2><b>RM3000.00</b></h2> 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-light mb-3" style="max-width: 15rem;">
                <!-- total sales  -->
                <div class="card-header">Total sales</div>
                <div class="card-body">
                    <h2><b>RM12,500.00</b></h2> 
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
                        <tr>
                           
                            <td class="text-xs"></td>
                            <td class="text-xs"></td>
                            <td class="text-xs"></td>
                            <td style="text-xs">
                                
                                <span class="badge rounded-pill bg-success"></span>
                                
                                <span class="badge rounded-pill bg-danger"></span>
                                
                                <span class="badge rounded-pill bg-warning "></span>
                            </td>
                           
                            <td class="table-action">
                                <a href="#" data-bs-toggle="modal" data-bs-target="">
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
                <form method="POST" action="/complaint" enctype="multipart/form-data">
                    @csrf
                    <!--Kiosk Number-->
                    <div class="form-group">
                        <label for="ic">Kiosk Number</label>
                        <input type="text" class="form-control" id="salesKioskNum" name="salesKioskNum"  disabled>
                    </div>
                    <!--Date-->
                    <div class="form-group">
                        <label for="name">Date</label>
                        <input type="date" class="form-control" id="salesDate" name="salesDate" required>
                    </div>
                    <!--Total sales-->
                    <div class="form-group">
                        <label for="num">Total Sales (RM)</label>
                        <input type="text" class="form-control" id="totalSales" name="totalSales" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info" name="addUser">Add</button>
                    </div>
                </form>
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
        });

        function deleteUser(userID) {
            if (confirm("Are you sure you want to delete this user?")) {
                var form = document.createElement("form");
                form.method = "post";
                form.action = "admin-deleteUser.php";

                var input = document.createElement("input");
                input.type = "hidden";
                input.name = "userID";
                input.value = userID;

                form.appendChild(input);

                document.body.appendChild(form);
                form.submit();
            }
        }


    </script>


@endsection