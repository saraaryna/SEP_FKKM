@extends('Complaint.base')
@section('Complaint.complaint')

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Kiosk Complaint
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboardAdmin.php">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage User Profile</a></li>
            </ol>
        </nav>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="#" class="btn btn-info" style="float: right;" data-bs-toggle="modal" data-bs-target="#addApp">+
                    New Application</a>
            </div>
            <div class="card-body">
                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Kiosk Number</th>
                            <th>Complaint Type</th>
                            <th>Complaint Date</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($complaint as $complaint)
                            <td class="text-xs">{{ $loop->index + 1 }}</td>
                            <td class="text-xs">{{$complaint->compKioskNum}}</td>
                            <td class="text-xs">{{$complaint->compType}}</td>
                            <td class="text-xs">{{$complaint->compDate}}</td>
                            <td class="text-xs">{{$complaint->compDescription}}</td>
                            <td style="text-xs">
                                @if ($complaint->compStatus === "Approved")
                                <span class="badge rounded-pill bg-success">{{ $complaint->compStatus}}</span>
                                @elseif($complaint->compStatus === "Rejected")
                                <span class="badge rounded-pill bg-danger">{{ $complaint->compStatus}}</span>
                                @else
                                <span class="badge rounded-pill bg-warning ">{{ $complaint->compStatus}}</span>
                            </td>
                            @endif
                            <td class="table-action">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#update-{{ $complaint->id }}"><i
                                        class="align-middle fas fa-fw fa-pen"></i></i></a>
                                <a href="/complaint/{{$complaint->id}}/delete"><i
                                        class="align-middle fas fa-fw fa-trash"></i></a>
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
                <h5 class="modal-title">New Application</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <form method="POST" action="/complaint" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Date Occured</label>
                        <input type="date" class="form-control" id="compDateOccured" name="compDateOccured" required>
                    </div>
                    <div class="form-group">
                        <label for="ic">Kiosk Number</label>
                        <input type="text" class="form-control" id="compKioskNum" name="compKioskNum" required>
                    </div>
                    <div class="form-group">
                        <label for="num">Phone Number</label>
                        <input type="text" class="form-control" id="compPhoneNum" name="compKioskNum" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Complaint Type</label>
                        <select class="form-control" id="compType" name="compType" required>
                            <option value="Maintainance">Maintainance</option>
                            <option value="Technical Issue">Technical Issue</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Upload Evidence</label>
                        <input type="file" name="compEvidence" class="form-control" id="inputFile">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info" name="addUser">Submit</button>
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


    @stop