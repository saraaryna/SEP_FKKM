@extends('baseKP')
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
                <div class="card">

                    <div class="card-header">
                        <a href="{{ route('kpInvoice') }}" class="btn btn-info" style="float: right; background-color: #30C9B7; color:white;" >Invoice</a>
                    </div>
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h4 class="modal-title  ">Kiosk Participant Ledger</h4>
                                    </div>
                                    @if($application)
                                    <div class="modal-body m-3 text-center ">
                                        <div class="d-flex justify-content-around">
                                            <label for="name">Kiosk Number :</label>
                                            <label class="fw-bold" for="name">{{ $application->appKioskNum}}</label>
                                            <label for="name">Name :</label>
                                            <label class="fw-bold" for="name">{{ $user->userName}}</label>
                                            <label for="name">Business Type :</label>
                                            <label  class="fw-bold" for="name">{{ $application->appBusinessType}}</label>
                                        </div>
                                        <div class="p-3 d-flex justify-content-around">
                                            <label for="name">Business Period :</label>
                                            <label class="fw-bold" for="name">{{ $application->appBusinessPeriod}}</label>
                                            <label for="name">Status :</label>
                                            <label class="fw-bold" for="name"> {{ $application->appStatus}}</label>
                                        </div>
                                            <div class="form-group p-2">
                                                <label for="name">Total Invoice :</label>
                                                <label class="fw-bold" for="name"> RM {{ $totalInvoice}}</label>
                                            </div>
                                            <div class="form-group p-2">
                                                <label for="name">Total Participant Payment:</label>
                                                <label class="fw-bold" for="name"> RM {{ $totalPayment}} </label>
                                            </div>
                                            <div class="form-group p-2">
                                                <label for="name">Total Credit Note/Debit Note :</label>
                                                <label class="fw-bold" for="name"> RM {{ $totalCredit < 0 ? '0.00' :  $totalCredit}}</label>
                                            </div>
                                            <div class="form-group p-2">
                                                <label for="name">Balance Fees :</label>
                                                <label class="fw-bold" for="name"> RM {{ $balances < 0 ? '0.00' : $balances}}</label>
                                            </div>
                                            <a href="#" class="btn btn-info" style="background-color: #30C9B7; color:white;" data-bs-toggle="modal" data-bs-target="#addPayment">+Pay Fees</a>
                                        
                                            <div class="modal-footer">
                                            </div>
                                    </div>
                                </div>
                                @else
        <div class="alert alert-warning m-4 p-2" role="alert">
            No application data found.
        </div>
    @endif
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
                                 <label for="appBusinessPeriod">{{ $user->userName }}</label>
                             </div>
                             <div class="form-group">
                                 <label for="appBusinessPeriod">email Address</label>
                                 <input type="text" class="form-control" id="payemail" name="payEmail" required>
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