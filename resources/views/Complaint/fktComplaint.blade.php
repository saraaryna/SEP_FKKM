@extends('Complaint.fktbase')
@section('Complaint.fktComplaint')

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Kiosk Complaint
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboardAdmin.php">FK Technical</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Kiosk Complaint</a></li>
            </ol>
        </nav>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Complaint Name</th>
                            <th>Kiosk Number</th>
                            <th>Complaint Date</th>
                            <th>Complaint Type</th>
                            <th>PIC</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($complaint as $complaint)
                            <td class="text-xs">{{ $loop->index + 1 }}</td>
                            <td class="text-xs">{{$complaint->compName}}</td>
                            <td class="text-xs">{{$complaint->compKioskNum}}</td>
                            <td class="text-xs">{{$complaint->compDate}}</td>
                            <td class="text-xs">{{$complaint->compType}}</td>
                            <td class="text-xs">{{$complaint->compPIC}}</td>
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
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#updatePIC-{{ $complaint->complaintID }}"><i
                                        class="align-middle fas fa-fw fa-bell"></i></i></a>
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#updateStatus-{{ $complaint->complaintID }}"><i
                                        class="align-middle fas fa-fw fa-pen"></i></i></a>
                                <a href="/complaint/{{$complaint->id}}/delete"><i
                                        class="align-middle fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr>

                        <!--Modal Update PIC-->
                        <div class="modal fade" id="updatePIC-{{ $complaint->complaintID }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropL abel">Assign Person</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body m-3">
                                        <form method="POST" action="/fktComplaintEdit">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="complaintID" value="{{$complaint->complaintID}}">
                                            <input type="hidden" name="compStatus" value="{{$complaint->compStatus}}">
                                            <div class="row">
                                                <div class="form-group">
                                                    <label>Person In Charge</label>
                                                    <input type="text" class="form-control" id="compPIC" name="compPIC"
                                                        value="{{$complaint->compPIC}}">
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
                        <!--Modal Update Status-->
                        <div class="modal fade" id="updateStatus-{{ $complaint->userID }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropL abel">Update Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body m-3">
                                        <form method="POST" action="/fktComplaintEditStatus">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="complaintID" value="{{$complaint->complaintID}}">
                                            <input type="hidden" name="compPIC" value="{{$complaint->compPIC}}">
                                            <div class="row">
                                                <div class="form-group">

                                                    <label>Complaint Status</label>
                                                    <select class="form-control" id="compStatus" name="compStatus">
                                                        @if ($complaint->compStatus == "In Review")
                                                        <option value="In Review" selected>In Review</option>
                                                        <option value="In Investigation">In Investigation</option>
                                                        <option value="In Progress">In Progress</option>
                                                        <option value="Solved">Solved</option>
                                                        @elseif ($complaint->compStatus == "In Progress")
                                                        <option value="In Investigation">In Investigation</option>
                                                        <option value="In Review">In Review</option>
                                                        <option value="In Progress" selected>In Progress</option>
                                                        <option value="Solved">Solved</option>
                                                        @elseif ($complaint->compStatus == "In Investigation")
                                                        <option value="In Investigation" selected>In Investigation
                                                        </option>
                                                        <option value="In Review">In Review</option>
                                                        <option value="In Progress">In Progress</option>
                                                        <option value="Solved">Solved</option>
                                                        @elseif ($complaint->compStatus == "Solved")
                                                        <option value="Solved">Solved</option>

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
<!-- Modal -->
<div class="modal fade" id="addComplaint" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Complaint</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <form method="POST" action="/complaint" enctype="multipart/form-data">
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
                            <option value="Maintainance">Maintainance</option>
                            <option value="Technical Issue">Technical Issue</option>
                        </select>
                    </div>
                    <input type="hidden" name="compDescription" value="testing">
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

                document.body.appendChild(form);
                form.submit();
            }
        }


    </script>


    @stop