@extends('Complaint.base')
@section('Complaint.kpComplaint')
<meta name="csrf-token" content="{{ csrf_token() }}">

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
                                @if ($complaint->compStatus === "In Investigation")
                                <span class="badge rounded-pill bg-primary">{{ $complaint->compStatus}}</span>
                                @elseif($complaint->compStatus === "In Progress")
                                <span class="badge rounded-pill bg-warning">{{ $complaint->compStatus}}</span>
                                @elseif($complaint->compStatus === "In Review")
                                <span class="badge rounded-pill bg-warning">{{ $complaint->compStatus}}</span>
                                @elseif($complaint->compStatus === "Solved")
                                <span class="badge rounded-pill bg-success ">{{ $complaint->compStatus}}</span>
                            </td>
                            @endif
                            <td class="table-action">
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#view-{{ $complaint->complaintID }}"><i
                                        class="align-middle fas fa-fw fa-eye"></i></i></a>
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#update-{{ $complaint->complaintID }}"><i
                                        class="align-middle fas fa-fw fa-pen"></i></i></a>
                                <a href="#" onclick="confirmDelete('/kpComplaint/{{$complaint->complaintID}}/delete')">
                                    <i class="align-middle fas fa-fw fa-trash"></i>
                                </a>

                            </td>
                        </tr>
                        <!--Modal Update View-->
                        <div class="modal fade" id="view-{{ $complaint->complaintID }}" data-bs-backdrop="static"
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
                                                    <label>Name :</label>
                                                    <label class="fw-bolder">{{$complaint->compName}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label>Complaint Date :</label>
                                                    <label class="fw-bolder">{{$complaint->compDate}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label>Date Occured :</label>
                                                    <label class="fw-bolder">{{$complaint->compDateOccured}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label>Kiosk Number :</label>
                                                    <label class="fw-bolder">{{$complaint->compKioskNum}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone Number :</label>
                                                    <label class="fw-bolder">{{$complaint->compPhoneNum}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label>Complaint Type :</label>
                                                    <label class="fw-bolder">{{$complaint->compType}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label>Description :</label>
                                                    <label class="fw-bolder">{{$complaint->compDescription}}</label>
                                                </div>

                                            </div>
                                            <br>
                                            <button type="button" class="btn btn-outline-primary"
                                                data-bs-dismiss="modal">CLOSE</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal Update-->
                        <div class="modal fade" id="update-{{ $complaint->complaintID }}" data-bs-backdrop="static"
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
                                        <form method="POST" action="/kpComplaintEdit">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="complaintID" value="{{$complaint->complaintID}}">
                                            <div class="row">

                                                <div class="form-group">
                                                    <label>Complaint Name</label>
                                                    <input type="text" class="form-control" id="compName"
                                                        name="compName" value="{{$complaint->compName}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Complaint Date</label>
                                                    <input type="text" class="form-control" id="compDate"
                                                        name="compDate" value="{{$complaint->compDate}}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Date Occured</label>
                                                    <input type="date" class="form-control" id="compDateOccured"
                                                        name="compDateOccured" value="{{$complaint->compDateOccured}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Kiosk Number</label>
                                                    <input type="number" class="form-control" id="compKioskNum"
                                                        name="compKioskNum" value="{{$complaint->compKioskNum}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input type="number" class="form-control" id="compPhoneNum"
                                                        name="compPhoneNum" value="{{$complaint->compPhoneNum}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <input type="text" class="form-control" id="compDescription"
                                                        name="compDescription" value="{{$complaint->compDescription}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Complaint Type</label>
                                                    <select class="form-control" id="compType" name="compType">
                                                        @if ($complaint->compType == "Maintainance")
                                                        <option value="Maintainance" selected>Maintainance</option>
                                                        <option value="Technical Issue">Technical Issue</option>
                                                        <option value="Accessibility Issues">Accessibility Issues
                                                        </option>
                                                        <option value="Financial Concerns">Financial Concerns
                                                        </option>
                                                        <option value="Others">Others</option>
                                                        @elseif ($complaint->compType == "Technical Issue")
                                                        <option value="Maintainance">Maintainance</option>
                                                        <option value="Technical Issue" selected>Technical Issue
                                                        </option>
                                                        <option value="Accessibility Issues">Accessibility Issues
                                                        </option>
                                                        <option value="Financial Concerns">Financial Concerns
                                                        </option>
                                                        <option value="Others">Others</option>
                                                        @elseif ($complaint->compType == "Accessibility Issues")
                                                        <option value="Maintainance">Maintainance</option>
                                                        <option value="Technical Issue">Technical Issue</option>
                                                        <option value="Accessibility Issues" selected>Accessibility
                                                            Issues</option>
                                                        <option value="Financial Concerns">Financial Concerns
                                                        </option>
                                                        <option value="Others">Others</option>
                                                        @elseif ($complaint->compType == "Financial Concerns")
                                                        <option value="Maintainance">Maintainance</option>
                                                        <option value="Technical Issue">Technical Issue</option>
                                                        <option value="Accessibility Issues">Accessibility Issues
                                                        </option>
                                                        <option value="Financial Concerns" selected>Financial
                                                            Concerns
                                                        </option>
                                                        <option value="Others">Others</option>
                                                        @elseif ($complaint->compType == "Others")
                                                        <option value="Maintainance">Maintainance</option>
                                                        <option value="Technical Issue">Technical Issue</option>
                                                        <option value="Accessibility Issues">Accessibility Issues
                                                        </option>
                                                        <option value="Financial Concerns" selected>Financial
                                                            Concerns
                                                        </option>
                                                        <option value="Others" selected>Others</option>
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
                        <input type="text" class="form-control" id="compName" name="compName" value="{{$user->userName}}" required>
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
    </script>

    <script>
        function confirmDelete(url) {
            var confirmation = confirm("Are you sure you want to delete this application?");
            if (confirmation) {
                window.location.href = url; // If confirmed, proceed with the deletion
            } else {
                // If not confirmed, do nothing or provide feedback to the user
                // For example: alert("Deletion canceled");
            }
        }
    </script>



    @stop