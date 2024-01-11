@extends('Payment.base')
@section('Payment.FKBursaryPayment')

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Include your custom JavaScript file -->

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
                <a href="#" class="btn btn-info" style="float: right; background-color: #41968B; color:white;" data-bs-toggle="modal" data-bs-target="#addPayment">+ Add Payment</a>
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
                        <td class="text-xs">
                            @foreach($users as $userr)
                                @if ($payments->userID == $userr->userID)
                                    {{ $userr->name }}
                                @endif
                            @endforeach
                        </td>
                        <td class="text-xs">
                            @foreach($application as $app)
                                @if ($payments->appID == $app->appID)
                                    {{ $app->appBusinessType }}
                                @endif
                            @endforeach
                        </td>
                        <td class="text-xs">{{$payments->payKioskNum}}</td>
                        <td class="text-xs">{{$payments->payFeeTotal}}</td>
                        <td class="text-xs">{{$payments->payKioskNum}}</td>
                        <td class="text-xs">{{$payments->payFeeType}}</td>
                        <td class="table-action">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#view-{{ $payments->payID }}"><i class="align-middle fas fa-fw fa-eye"></i></i></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#generate-{{ $payments->payID }}"><i class="align-middle fas fa-fw fa-file-medical"></i></i></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#remind-{{ $payments->payID }}"><i class="align-middle fas fa-fw fa-stopwatch"></i></i></a>
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
                                            @foreach($application as $applications)
                                            @if ($payments->appID === $applications->appID)
                                                {{ $applications->appName }} -- {{ $payments->payKioskNum }}
                                            @endif
                                            @endforeach
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
                <div class="modal fade" id="generate-{{ $payments->payID }}"  tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Generate Receipt Form</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body m-3">
                                <form method="POST" action="/updatePayment/{{ $payments->payID }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="userID" value="{{ $payments->user->userID }}">
                                    <input type="hidden" name="appID" value="{{ $payments->appID }}">
                                    <div class="form-group">
                                         <label for="name">Payment For</label>
                                         <select class="form-control " id="payFor" name="payFor" value="{{ $payments->payFor }}" required>
                                            <option hidden selected value="{{$payments->payFor}}" >
                                                @foreach($application as $applications)
                                                @if ($payments->appID === $applications->appID)
                                                    {{ $applications->appName }} -- {{ $payments->payKioskNum }}
                                                @endif
                                                @endforeach
                                            </option>
                                            @foreach($application as $applications)
                                                    <option  value="{{$applications->appKioskNum}}" >{{$applications->appName}} -- {{$applications->appKioskNum}}</option>
                                            @endforeach
                                        </select>   
                                        </div>
                                     <div class="form-group">
                                         <label for="email">Fee Type</label>
                                         <select class="form-control" id="payFeeType" name="payFeeType"  value="{{ $payments->payFeeType }}" required>
                                             <option disabled  value="Select Business Type">Fee Type</option>
                                             <option value="Rental">Rental</option>
                                             <option value="Compound">Compound</option>
                                             <option value="Others">Others</option>
                                         </select>                    
                                     </div>
                                     <div class="form-group">
                                         <label for="contactNumber">Payment Total(MYR)</label>
                                         <input type="text" class="form-control" id="payFeeTotal" name="payFeeTotal"  value="{{ $payments->payFeeTotal }}" required>
                                     </div>
                                     <div class="form-group">
                                         <label for="appKioskNum">Kiosk Number</label>
                                         <select class="form-control" id="payKioskNum" name="payKioskNum"  value="{{ $payments->payKioskNum }}" required>
                                            <option hidden selected value="{{$payments->payKioskNum}}" >{{$applications->appKioskNum}}</option>
                                             @foreach($application as $applications)
                                             <option  value="{{$applications->appKioskNum}}" >{{$applications->appKioskNum}}</option>
                                             @endforeach
                                         </select>
                                     </div>
                                     <div class="form-group">
                                         <label for="appBusinessPeriod">Name</label>
                                         <label for="appBusinessPeriod">{{ $payments->user->name }}</label>
                                     </div>
                                     <div class="form-group">
                                         <label for="appBusinessPeriod">Email Address</label>
                                         <input type="text" class="form-control" id="payEmail" name="payEmail"  value="{{ $payments->payEmail }}" required>
                                     </div>
                                     <div class="form-group">
                                         <label for="appBusinessPeriod">Remarks</label>
                                         <input type="text" class="form-control" id="payRemarks" name="payRemarks"  value="{{ $payments->payRemarks }}" required>
                                     </div>
                                     <div class="form-group">
                                         <label for="appBusinessPeriod">Proof of Payment</label>
                                         <input type="file" class="form-control" id="payProof" name="payProof"  value="{{ $payments->payProof }}" required>
                                     </div>
                                     <input type="hidden" id="payDate" name="payDate" value="<?php echo date('Y-m-d'); ?>" required>
                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary" style="background-color: #354B48; color:white;" data-bs-dismiss="modal">Back</button>
                                         <button type="submit" class="btn btn-info" style="background-color: #41968B; color:white;" name="addPayment">Submit</button>
                                     </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Kemaskini View -->
                <div class="modal fade" id="remind-{{ $payments->payID }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Remind This Participant</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body m-3 ">
                                <form method="POST" action="/generateReceipt/{{ $payments->payID }}" enctype="multipart/form-data">
                                    @csrf
                                    <h5 class="text-center pb-4">Reminder: This Message will be delivered to the participant. Participant will be notified</h5>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary" style="background-color: #354B48; color:white;" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-info" style="background-color: #41968B; color:white;" name="addPayment">Submit</button>
                                    </div>
                                </form>
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
                <form method="POST" action="/addFKBursaryPayment" enctype="multipart/form-data">
                    @csrf
                    
                     <div class="form-group">
                        <label for="name">Payment For</label>
                        <select class="form-control" id="payFor1" name="payFor" required>
                            @foreach($application as $applications)
                                <option value="{{ $applications->appKioskNum }}">{{ $applications->appName }} -- {{ $applications->appKioskNum }}</option>
                            @endforeach
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
                     <input type="hidden" name="userID" id="userID">
                    <input type="hidden" name="appID" id="appID" >
                     <div class="form-group">
                         <label for="contactNumber">Payment Total(MYR)</label>
                         <input type="text" class="form-control" id="payFeeTotal" name="payFeeTotal" required>
                     </div>
                     <div class="form-group">
                         <label for="appKioskNum">Kiosk Number</label>
                         <select class="form-control" id="payKioskNum" name="payKioskNum" required>
                            @foreach($application as $applications)
                            <option  value="{{$applications->appKioskNum}}" >{{$applications->appKioskNum}}</option>
                            @endforeach
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="appBusinessPeriod">Name</label>
                         <label name="appName" id="appName" value=""></label>
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
                         <button type="button" class="btn btn-secondary" style="background-color: #354B48; color:white;" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-info" style="background-color: #41968B; color:white;" name="addPayment">Submit</button>
                     </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script>
		document.addEventListener("DOMContentLoaded", function() {
            var currentDate = new Date().toISOString().split('T')[0];
            
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
            
            document.getElementById('payDate').value = currentDate;
			// Datatables basic

            $('#payFor1').change(function() {
                var selectedOption = $(this).val();

                var appID = '0';
                var userID = '0';
                var appName = '0';

                var foundMatch = false;

                @foreach($application as $applications)
                    console.log('App Kiosk Num:', "{{ $applications->appKioskNum }}");
                    if ("{{ $applications->appKioskNum }}" === selectedOption) {
                        appID = "{{ $applications->appID }}";
                        userID = "{{ $applications->userID }}";
                        appName = "{{ $applications->appName }}";


                        foundMatch = true;
                        // No break needed in Blade template
                    }
                @endforeach

                if (!foundMatch) {
                    console.log('No match found.');
                    // Handle case where no match is found
                }

                console.log('Final AppID:', appID, 'Final UserID:', userID, 'Final AppName:', appName);

                // Update the hidden inputs
                $('#userID').val(userID);
                $('#appID').val(appID);
                $('#appName').val(appName);

                // For testing, add a simple log
                console.log('Script executed successfully');
            });

			
		
           
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