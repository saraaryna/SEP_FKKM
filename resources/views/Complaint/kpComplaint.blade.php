@extends('Complaint.base')
@section('Complaint.kpComplaint')

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
                    data-bs-target="#addComplaint">+
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
                                <a href="#" data-bs-toggle="modal" data-bs-target="#update-{{ $complaint->userID }}"><i
                                        class="align-middle fas fa-fw fa-eye"></i></i></a>
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#update-{{ $complaint->userID }}"><i
                                        class="align-middle fas fa-fw fa-pen"></i></i></a>
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#destroy-{{ $complaint->userID }}"><i
                                        class="align-middle fas fa-fw fa-trash"></i></i></a>

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
<!--Modal Kemaskini-->
<div class="modal fade" id="update-{{ $complaint->userID }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropL abel">Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <form method="POST" action="/kpComplaintEdit">
                    @csrf
                    <input type="hidden" name="userID" value="{{$complaint->userID}}">
                    <div class="row">
                        <div class="form-group">
                            <label>Complaint Date</label>
                            <input class="form-control" name="compDate" type="text" id="inputcompDate"
                                value="{{$complaint->compDate}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="compName" type="text" id="inputcompName"
                                value="{{$complaint->compName}}">
                        </div>
                        <div class="form-group">
                            <label>Date Occured</label>
                            <input class="form-control" name="compDateOccured" type="date" id="inputcompDateOccured"
                                value="{{$complaint->compDateOccured}}">
                        </div>
                        <div class="form-group">
                            <label>Kiosk Number</label>
                            <input class="form-control" name="compKioskNum" type="number" id="inputcompKioskNum"
                                value="{{$complaint->compKioskNum}}">
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input class="form-control" name="compPhoneNum" type="number" id="inputcompPhoneNum"
                                value="{{$complaint->compPhoneNum}}">
                        </div>
                        <div class="form-group">
                            <label>Complaint Type</label>
                            <select class="form-control" id="compType" name="compType" value="{{$complaint->compType}}"
                                id="inputcompType" required>
                                <option value="Maintainance">Maintainance</option>
                                <option value="Technical Issue">Technical Issue</option>
                                <option value="Accessibility Issues">Accessibility Issues</option>
                                <option value="Financial Concerns">Financial Concerns</option>
                                <option value="Others">Others</option>
                            </select>

                            <div class="form-group">
                                <label>Description</label>
                                <input class="form-control" name="compDescription" type="text" id="inputcompDescription"
                                    value="{{$complaint->compDescription}}">
                            </div>
                            <input type="hidden" name="compEvidence" id="inputcompEvidence" value="{{$complaint->compEvidence}}">
                            <input type="hidden" name="compStatus" id="inputcompStatus"  value="{{$complaint->compStatus}}">
                            <input type="hidden" name="compPIC" id="inputcompPIC"  value="{{$complaint->compPIC}}">

                        </div>



                    </div>
                    <br>
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">CLOSE</button>
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                </form>
            </div>
        </div>
    </div>
              
</div>

<!--Modal Delete-->
<div class="modal fade" id="destroy-{{ $complaint->userID }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropL abel">Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <form method="DELETE" action="/kpComplaintDestroy">
                    @csrf
                    
                    <input type="hidden" name="userID" value="{{$complaint->userID}}">
                    <div class="row">
                        <div class="form-group">
                            <label>Complaint Date</label>
                            <input class="form-control" name="compDate" type="text" id="inputcompDate"
                                value="{{$complaint->compDate}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Date Occured</label>
                            <input class="form-control" name="compDateOccured" type="date" id="inputcompDateOccured"
                                value="{{$complaint->compDateOccured}}">
                        </div>
                        <div class="form-group">
                            <label>Kiosk Number</label>
                            <input class="form-control" name="compKioskNum" type="number" id="inputcompKioskNum"
                                value="{{$complaint->compKioskNum}}">
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input class="form-control" name="compPhoneNum" type="number" id="inputcompPhoneNum"
                                value="{{$complaint->compPhoneNum}}">
                        </div>
                        <div class="form-group">
                            <label>Complaint Type</label>
                            <select class="form-control" id="compType" name="compType" value="{{$complaint->compType}}"
                                id="inputcompType" required>
                                <option>Select One</option disabled>
                                <option value="Maintainance">Maintainance</option>
                                <option value="Technical Issue">Technical Issue</option>
                                <option value="Accessibility Issues">Accessibility Issues</option>
                                <option value="Financial Concerns">Financial Concerns</option>
                                <option value="Others">Others</option>
                            </select>

                            <div class="form-group">
                                <label>Description</label>
                                <input class="form-control" name="compDescription" type="text" id="inputcompDescription"
                                    value="{{$complaint->compDescription}}">
                            </div>

                        </div>



                    </div>
                    <br>
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">CLOSE</button>
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                </form>
            </div>
        </div>
    </div>
              
</div>
<!-- Modal -->
<div class="modal fade" id="addComplaint" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Complaint</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <form method="POST" action="/kpComplaint" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="compName" name="compName" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Date Occured</label>
                        <input type="date" class="form-control" id="compDateOccured" name="compDateOccured" required>
                    </div>
                    <input type="hidden" name="userID" value="1">
                    <div class="form-group">
                        <label for="num">Kiosk Number</label>
                        <input type="number" class="form-control" id="compKioskNum" name="compKioskNum" required>
                    </div>
                    <div class="form-group">
                        <label for="num">Phone Number</label>
                        <input type="text" class="form-control" id="compPhoneNum" name="compPhoneNum" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Complaint Type</label>
                        <select class="form-control" id="compType" name="compType" required>
                            <option>Select One</option disabled>
                            <option value="Maintainance">Maintainance</option>
                            <option value="Technical Issue">Technical Issue</option>
                            <option value="Accessibility Issues">Accessibility Issues</option>
                            <option value="Financial Concerns">Financial Concerns</option>
                            <option value="Others">Others</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="num">Description</label>
                        <input type="longtext" class="form-control" id="compDescription" name="compDescription"
                            required>
                    </div>
                    <input type="hidden" name="compEvidence" value="evidence">
                    <input type="hidden" name="compStatus" value="In Investigation">
                    <input type="hidden" name="compPIC" value="None">
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

               umeppendChild(form);
                form.submit();
            }
        }


    </script>


    @stop