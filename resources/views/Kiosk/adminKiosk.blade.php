@extends('Kiosk.base')
@section('Kiosk.adminKiosk')

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Kiosk Complaint
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboardAdmin.php">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Kiosk Complaint</a></li>
            </ol>
        </nav>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="#" class="btn btn-info" style="float: right;" data-bs-toggle="modal"
                    data-bs-target="#addKiosk">+
                    New Kiosk</a>
            </div>
            <div class="card-body">
                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Kiosk Number</th>
                            <th>Kiosk Location</th>
                            <th>Kiosk Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($kiosk as $kiosk)
                            <td class="text-xs">{{ $loop->index + 1 }}</td>
                            <td class="text-xs">{{$kiosk->kioskNumber}}</td>
                            <td class="text-xs">{{$kiosk->kioskLocation}}</td>
                            <td style="text-xs">
                                @if ($kiosk->kioskStatus === "Available")
                                <span class="badge rounded-pill bg-success">{{ $kiosk->kioskStatus}}</span>
                                @elseif($kiosk->kioskStatus === "Not Available")
                                <span class="badge rounded-pill bg-danger">{{ $kiosk->kioskStatus}}</span>
                            </td>
                            @endif
                            <td class="table-action">
                                <a href="#" data-bs-toggle="modal" data-bs-target=""><i
                                        class="align-middle fas fa-fw fa-eye"></i></i></a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#update-{{ $kiosk->kioskID }}"><i
                                        class="align-middle fas fa-fw fa-pen"></i></i></a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#destroy-{{ $kiosk->kioskID }}"><i
                                        class="align-middle fas fa-fw fa-trash"></i></i></a>

                            </td>
                        </tr>
                        <!-- Modal Update-->
                        <div class="modal fade" id="update-{{ $kiosk->kioskID }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropL abel">Edit Kiosk</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body m-3">
                                        <form method="POST" action="/kioskEdit">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="kioskID" value="{{$kiosk->kioskID}}">
                                            <div class="row">

                                                <div class="form-group">
                                                    <label>Kiosk Number</label>
                                                    <input type="number" class="form-control" id="kioskNumber"
                                                        name="kioskNumber" value="{{$kiosk->kioskNumber}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Kiosk Location</label>
                                                    <input type="text" class="form-control" id="kioskLocation"
                                                        name="kioskLocation" value="{{$kiosk->kioskLocation}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Complaint Type</label>
                                                    <select class="form-control" id="kioskStatus" name="kioskStatus">
                                                        @if ($kiosk->kioskStatus == "Available")
                                                        <option value="Available" selected>Available</option>
                                                        <option value="Not Available">Not Available</option>
                                                        @elseif ($kiosk->kioskStatus == "Not Available")
                                                        <option value="Available">Maintainance</option>
                                                        <option value="Not Available" selected>Technical Issue
                                                        </option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <button type="button" class="btn btn-outline-primary"
                                                data-bs-dismiss="modal">CLOSE</button>
                                            <button type="submit" class="btn btn-primary">UPDATE</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                                      
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal-->
<div class="modal fade" id="addKiosk" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Kiosk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <form method="POST" action="/adminKiosk" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="number">Kiosk Number</label>
                        <input type="text" class="form-control" id="kioskNumber" name="kioskNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Kiosk Location</label>
                        <input type="text" class="form-control" id="kioskLocation" name="kioskLocation" required>
                    </div>
                    <div class="form-group">
                        <label for="num">Status</label>
                        <select class="form-control" id="kioskStatus" name="kioskStatus" required>
                            <option value="Available">Available</option>
                            <option value="Not Available">Not Available</option>
                        </select>
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
                form.action = "/kpComplaintDestroy";

                var input = document.createElement("input");
                input.type = "hidden";
                input.name = "userID";
                input.value = userID;

                form.appendChild(input);

                umeppendChild(form);
                form.submit();
            }
        }


    </script>


    @stop