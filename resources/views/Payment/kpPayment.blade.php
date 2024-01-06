@extends('Payment.base')
@section('Payment.kpPayment')

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Kiosk Payment
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboardAdmin.php">Kiosk Payment</a></li>
                <li class="breadcrumb-item active" aria-current="page">Payment List</a></li>
            </ol>
        </nav>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="#" class="btn btn-info" style="float: right; background-color: #66DBE2; color:black;" data-bs-toggle="modal" data-bs-target="#addApp">+ Add Payment</a>
            </div>
            <div class="card-body">
                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Name</th>
                            <th>Business type</th>
                            <th>Kiosk Number</th>
                            <th>Total Payment</th>
                            <th>Payment</th>
                            <th>Payment Type</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @foreach($payment as $payment)
                        @foreach($user as $user)
                        @foreach($application as $application)
                        <td class="text-xs">{{ $loop->index + 1 }}</td>
                        <td class="text-xs">{{$user->name}}</td>
                        <td class="text-xs">{{$application->appBusinessType}}</td>
                        <td class="text-xs">{{$payment->payKioskNum}}</td>
                        <td class="text-xs">{{$payment->payFeeTotal}}</td>
                        <td class="text-xs">{{$payment->payKioskNum}}</td>

                        <td class="text-xs">{{$payment->appBusinessPeriod}}</td>
                        <td style="text-xs">
                            @if ($payment->appStatus === "Approved")
                            <span class="badge rounded-pill bg-success">{{ $payment->appStatus}}</span>
                            @elseif($payment->appStatus === "Rejected")
                            <span class="badge rounded-pill bg-danger">{{ $payment->appStatus}}</span>
                            @else
                            <span class="badge rounded-pill bg-warning ">{{ $payment->appStatus}}</span></td>
                            @endif
                        <td class="table-action">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#update-{{ $payment->id }}"><i class="align-middle fas fa-fw fa-pen"></i></i></a>
                            <a href="/payment/{{$payment->id}}/delete"><i class="align-middle fas fa-fw fa-trash"></i></a>
                        </td>
                    </tr>
                                    
                <!-- Modal Kemaskini -->
                <div class="modal fade" id="update-{{ $payment->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Generate Receipt Form</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body m-3">
                                <form method="POST" action="/dashboard-admin/{{ $payment->payID}}" enctype="multipart/form-data">
                                    @csrf 
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{$payment->payID}}">
                                    <div class="form-group">
                                        <label for="name">Payment For</label>
                                        <input type="text" class="form-control" id="appName" name="appName" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Fee Type</label>
                                        <select class="form-control" id="appBusinessType" name="appBusinessType" required>
                                            <option disabled selected value="Select Business Type">Business Type</option>
                                            <option value="Food">Food</option>
                                            <option value="Beverages">Beverages</option>
                                            <option value="Others">Others</option>
                                        </select>                    
                                    </div>
                                    <div class="form-group">
                                        <label for="contactNumber">Payment Total(MYR)</label>
                                        <input type="text" class="form-control" id="appPhoneNum" name="appPhoneNum" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="appKioskNum">Kiosk Number</label>
                                        <select class="form-control" id="appKioskNum" name="appKioskNum" required>
                                            <option disabled selected value="Kiosk Number">Select Kiosk Number</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="appBusinessPeriod">Name</label>
                                        <input type="datetime-local" class="form-control" id="appBusinessPeriod" name="appBusinessPeriod" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="appBusinessPeriod">Email Address</label>
                                        <input type="datetime-local" class="form-control" id="appBusinessPeriod" name="appBusinessPeriod" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="appBusinessPeriod">Remarks</label>
                                        <input type="datetime-local" class="form-control" id="appBusinessPeriod" name="appBusinessPeriod" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="appBusinessPeriod">Proof of Payment</label>
                                        <input type="datetime-local" class="form-control" id="appBusinessPeriod" name="appBusinessPeriod" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-info" name="addApp">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endforeach
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
                <h5 class="modal-title">New payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <form method="POST" action="/dashboard-admin" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="">
                     <div class="form-group">
                         <label for="name">Payment For</label>
                         <input type="text" class="form-control" id="payFor" name="payFor" required>
                     </div>
                     <div class="form-group">
                         <label for="email">Fee Type</label>
                         <select class="form-control" id="appBusinessType" name="appBusinessType" required>
                             <option disabled selected value="Select Business Type">Fee Type</option>
                             <option value="Food">Food</option>
                             <option value="Beverages">Beverages</option>
                             <option value="Others">Others</option>
                         </select>                    
                     </div>
                     <div class="form-group">
                         <label for="contactNumber">Payment Total(MYR)</label>
                         <input type="text" class="form-control" id="appPhoneNum" name="appPhoneNum" required>
                     </div>
                     <div class="form-group">
                         <label for="appKioskNum">Kiosk Number</label>
                         <select class="form-control" id="appKioskNum" name="appKioskNum" required>
                             <option disabled selected value="Kiosk Number">Select Kiosk Number</option>
                             <option value="1">1</option>
                             <option value="2">2</option>
                             <option value="3">3</option>
                             <option value="4">4</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="appBusinessPeriod">Name</label>
                         <input type="text" class="form-control" id="appName" name="appName" required>
                     </div>
                     <div class="form-group">
                         <label for="appBusinessPeriod">Email Address</label>
                         <input type="text" class="form-control" id="appName" name="appName" required>
                     </div>
                     <div class="form-group">
                         <label for="appBusinessPeriod">Remarks</label>
                         <input type="text" class="form-control" id="appName" name="appName" required>
                     </div>
                     <div class="form-group">
                         <label for="appBusinessPeriod">Proof of Payment</label>
                         <input type="text" class="form-control" id="appName" name="appName" required>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-info" name="addApp">Submit</button>
                     </div>
                </form>
            </div>
        </div>
    </div>

    <script>
		document.addEventListener("DOMContentLoaded", function() {
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