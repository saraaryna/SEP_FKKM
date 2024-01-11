@extends('baseAdmin')
@section('Application.Admin.user')


<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Manage User
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboardAdmin.php">Manage User</a></li>
                <li class="breadcrumb-item active" aria-current="page">User List</a></li>
            </ol>
        </nav>
        
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="#" class="btn btn-info" style="float: right; background-color: #66DBE2; color:black;" data-bs-toggle="modal" data-bs-target="#addUser">+ New User</a>
            </div>
            <div class="card-body">
                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Name</th>
                            <th>No IC</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @foreach($user as $user)
                        <td class="text-xs">{{ $loop->index + 1 }}</td>
                        <td class="text-xs">{{$user->userName}}</td>
                        <td class="text-xs">{{$user->userIC}}</td>
                        <td class="text-xs">{{$user->userEmail}}</td>
                        <td class="text-xs">{{$user->userPhoneNum}}</td>
                        <td class="text-xs">{{$user->userAddress}}</td>
                        <td class="text-xs">{{$user->userRole}}</td>
                        <td class="table-action">
                            <a href="{{ route('admin.deleteUser', ['user' => $user->userID]) }}" onclick="return confirm('Are you sure you want to delete this user?')">
                                <i class="align-middle fas fa-fw fa-trash"></i>
                            </a>
                      </td>
                    </tr>       
                    @endforeach                           
            </tbody>
        </table>
    </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <form method="POST" action="{{ route('admin.addUser') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="userName">Name</label>
                        <input type="text" class="form-control" id="userName" name="userName" required>
                    </div>
                    <div class="form-group">
                        <label for="userIC">IC Number</label>
                        <input type="text" class="form-control" id="userIC" name="userIC" required>
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Email</label>
                        <input type="email" class="form-control" id="userEmail" name="userEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="userAddress">Address</label>
                        <input type="text" class="form-control" id="userAddress" name="userAddress" required>
                    </div>
                    <div class="form-group">
                        <label for="userPhoneNum">Phone Number</label>
                        <input type="text" class="form-control" id="userPhoneNum" name="userPhoneNum" required>
                    </div>
                    <div class="form-group">
                        <label for="userRole">User Role</label>
                        <select class="form-control" id="userRole" name="userRole" required>
                            <option disabled selected value="Select User Role">Select User Role</option>
                            <option value="Kiosk Participant">Kiosk Participant</option>
                            <option value="FK Technical Team">FK Technical Team</option>
                            <option value="FK Bursary">FK Bursary</option>
                            <option value="PUPUK Admin">PUPUK Admin</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info" name="addUser">Add User</button>
                    </div>
                </form>
            </div>
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

	</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var deleteLinks = document.querySelectorAll('.delete-link');

        deleteLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                var confirmation = confirm('Are you sure you want to delete this user?');
                
                if (!confirmation) {
                    event.preventDefault(); // Cancel the default behavior if not confirmed
                }
            });
        });
    });
</script>

@stop