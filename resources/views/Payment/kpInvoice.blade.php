@extends('Payment.base')
@section('Payment.kpInvoice')

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
                <h3 class="modal-title">Kiosk Participant Invoice</h3>
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
                        @if($payment->count() > 0)
                        @foreach($payment as $payments)
                        <tr>


                        <td class="text-xs">{{ $loop->index + 1 }}</td>
                        <td class="text-xs">{{$user->name}}</td>
                        <td class="text-xs">{{$application->appBusinessType}}</td>
                        <td class="text-xs">{{$payments->payKioskNum}}</td>
                        <td class="text-xs">{{$payments->payFeeTotal}}</td>
                        <td class="text-xs">{{$payments->payKioskNum}}</td>
                        <td class="text-xs">{{$payments->payFeeType}}</td>
                        <td class="table-action">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#view-{{ $payments->payID }}"><i class="align-middle fas fa-fw fa-eye"></i></i></a>
                            <a href="{{ route('printFKBursaryPayment', ['payID' => $payments->payID]) }}"><i class="align-middle fas fa-fw fa-print"></i></i></a>
                            <!--<a href="/payment/{{$payments->id}}/delete"><i class="align-middle fas fa-fw fa-trash"></i></a>-->
                        </td>
                    </tr>

                <!-- Modal Kemaskini View -->
                <div class="modal fade" id="view-{{ $payments->payID }}"  tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">View Payment Form</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body m-3 mt-0">
                                <form method="POST" action="/updatePayment/{{ $payments->payID }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="userID" value="{{ $payments->user->userID }}">
                                    <input type="hidden" name="appID" value="{{ $payments->appID }}">
                                    <div class="form-group">
                                         <label class="fw-bold col-md-12 " for="name">Payment For</label>
                                         <label class="fw-bolder p-2" for="name">
                                            @if ($payments->appID === $application->appID)
                                                {{ $application->appName }} -- {{ $payments->payKioskNum }}
                                            @endif
                                        </label>
                                    </div>
                                     <div class="form-group">
                                         <label class="fw-bold col-md-12 " for="email">Fee Type :</label>
                                         <label class="fw-bolder p-2" for="email">{{ $payments->payFeeType }}</label>

                                     </div>
                                     <div class="form-group">
                                         <label class="fw-bold col-md-12" for="contactNumber">Payment Total(MYR) :</label>
                                         <label class="fw-bolder p-2" for="contactNumber">{{ $payments->payFeeTotal }}</label>
                                     </div>
                                     <div class="form-group">
                                         <label class="fw-bold col-md-12" for="appKioskNum">Kiosk Number :</label>
                                         <label class="fw-bolder p-2" for="appKioskNum">{{ $payments->payKioskNum }}</label>
                                     </div>
                                     <div class="form-group">
                                         <label class="fw-bold col-md-12" for="appBusinessPeriod">Name :</label>
                                         <label class="fw-bolder p-2" for="appBusinessPeriod">{{ $payments->user->name }}</label>
                                     </div>
                                     <div class="form-group">
                                         <label class="fw-bold col-md-12" for="appBusinessPeriod">Email Address :</label>
                                         <label class="fw-bolder p-2" for="appBusinessPeriod">{{ $payments->payEmail }}</label>
                                     </div>
                                     <div class="form-group">
                                         <label class="fw-bold col-md-12" for="appBusinessPeriod">Remarks :</label>
                                         <label class="fw-bolder p-2" for="appBusinessPeriod">{{ $payments->payRemarks }}</label>
                                     </div>
                                     <div class="form-group">
                                         <label class="fw-bold col-md-12" for="appBusinessPeriod">Proof of Payment :</label>
                                         <label class="fw-bolder p-2" for="appBusinessPeriod">{{ $payments->payProof }}</label>
                                     </div>
                                     <input type="hidden" id="payDate" name="payDate" value="<?php echo date('Y-m-d'); ?>" required>
                                     <div class="modal-footer justify-content-center">
                                         <button type="button" class="btn btn-secondary" style=" background-color: #41968B; color:white;" data-bs-dismiss="modal">Back</button>
                                     </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Kemaskini Generate -->
                <div class="modal fade" id="generate-{{ $payments->payID }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Generate Receipt Form</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body m-3">
                                <form method="POST" action="/dashboard-admin/{{ $payments->payID}}" enctype="multipart/form-data">
                                    @csrf 
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{$payments->payID}}">
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
                </div>
                <!-- Modal Kemaskini View -->
                <div class="modal fade" id="remind-{{ $payments->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Generate Receipt Form</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body m-3">
                                
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                @endif
            </tbody>
        </table>
    </div>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addPayment" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <form method="POST" action="/addPayment" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="">
                     <div class="form-group">
                         <label for="name">Payment For</label>
                         <select class="form-control" id="payFor" name="payFor" required>
                            <option disabled selected value="Kiosk Number">Kiosk Number</option>
                            <option value="Kiosk Number 1">Kiosk Number 1</option>
                            <option value="Kiosk Number 2">Kiosk Number 2</option>
                            <option value="Kiosk Number 3">Kiosk Number 3</option>
                        </select>   
                        </div>
                     <div class="form-group">
                         <label for="email">Fee Type</label>
                         <select class="form-control" id="payFeeType" name="payFeeType" required>
                             <option disabled selected value="Select Business Type">Fee Type</option>
                             <option value="Rental">Rental</option>
                             <option value="Compound">Compound</option>
                             <option value="Others">Others</option>
                         </select>                    
                     </div>
                     <div class="form-group">
                         <label for="contactNumber">Payment Total(MYR)</label>
                         <input type="text" class="form-control" id="payFeeTotal" name="payFeeTotal" required>
                     </div>
                     <div class="form-group">
                         <label for="appKioskNum">Kiosk Number</label>
                         <select class="form-control" id="payKioskNum" name="payKioskNum" required>
                             <option disabled selected value="Kiosk Number">Select Kiosk Number</option>
                             <option value="1">1</option>
                             <option value="2">2</option>
                             <option value="3">3</option>
                             <option value="4">4</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="appBusinessPeriod">Name</label>
                         <label for="appBusinessPeriod"></label>
                     </div>
                     <div class="form-group">
                         <label for="appBusinessPeriod">Email Address</label>
                         <input type="text" class="form-control" id="payEmail" name="payEmail" required>
                     </div>
                     <div class="form-group">
                         <label for="appBusinessPeriod">Remarks</label>
                         <input type="text" class="form-control" id="payRemarks" name="payRemarks" required>
                     </div>
                     <div class="form-group">
                         <label for="appBusinessPeriod">Proof of Payment</label>
                         <input type="file" class="form-control" id="payProof" name="payProof" required>
                     </div>
                     <input type="hidden" id="payDate" name="payDate" value="<?php echo date('Y-m-d'); ?>" required>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-info" name="addPayment">Submit</button>
                     </div>
                </form>
            </div>
        </div>
    </div>

    <script>
		document.addEventListener("DOMContentLoaded", function() {
            var currentDate = new Date().toISOString().split('T')[0];
            
            
            document.getElementById('payDate').value = currentDate;
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