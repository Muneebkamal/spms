@extends('layouts.app')

@section('content')
<!-- Hour chart  -->
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">User / View /</span> Account
</h4>
<div class="row">
    <!-- User Sidebar -->
    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
        <!-- User Card -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="user-avatar-section">
                    <div class=" d-flex align-items-center flex-column">
                        <img class="img-fluid rounded mb-3 pt-1 mt-4" src="../../assets/img/avatars/15.png" height="100"
                            width="100" alt="User avatar" />
                        <div class="user-info text-center">
                            <h4 class="mb-2">Violet Mendoza</h4>
                            <span class="badge bg-label-secondary mt-1">Author</span>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-around flex-wrap mt-3 pt-3 pb-4 border-bottom">
                    <div class="d-flex align-items-start me-4 mt-3 gap-2">
                        <span class="badge bg-label-primary p-2 rounded"><i class='ti ti-checkbox ti-sm'></i></span>
                        <div>
                            <p class="mb-0 fw-medium">1.23k</p>
                            <small>Tasks Done</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mt-3 gap-2">
                        <span class="badge bg-label-primary p-2 rounded"><i class='ti ti-briefcase ti-sm'></i></span>
                        <div>
                            <p class="mb-0 fw-medium">568</p>
                            <small>Projects Done</small>
                        </div>
                    </div>
                </div>
                <p class="mt-4 small text-uppercase text-muted">Details</p>
                <div class="info-container">
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <span class="fw-medium me-1">Username:</span>
                            <span>violet.dev</span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-medium me-1">Email:</span>
                            <span>vafgot@vultukir.org</span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-medium me-1">Status:</span>
                            <span class="badge bg-label-success">Active</span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-medium me-1">Role:</span>
                            <span>Author</span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-medium me-1">Tax id:</span>
                            <span>Tax-8965</span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-medium me-1">Contact:</span>
                            <span>(123) 456-7890</span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-medium me-1">Languages:</span>
                            <span>French</span>
                        </li>
                        <li class="pt-1">
                            <span class="fw-medium me-1">Country:</span>
                            <span>England</span>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:;" class="btn btn-primary me-3" data-bs-target="#editUser"
                            data-bs-toggle="modal">Edit</a>
                        <a href="javascript:;" class="btn btn-label-danger suspend-user">Suspended</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /User Card -->
        <!-- Plan Card -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <span class="badge bg-label-primary">Standard</span>
                    <div class="d-flex justify-content-center">
                        <sup class="h6 pricing-currency mt-3 mb-0 me-1 text-primary fw-normal">$</sup>
                        <h1 class="mb-0 text-primary">99</h1>
                        <sub class="h6 pricing-duration mt-auto mb-2 text-muted fw-normal">/month</sub>
                    </div>
                </div>
                <ul class="ps-3 g-2 my-3">
                    <li class="mb-2">10 Users</li>
                    <li class="mb-2">Up to 10 GB storage</li>
                    <li>Basic Support</li>
                </ul>
                <div class="d-flex justify-content-between align-items-center mb-1 fw-medium text-heading">
                    <span>Days</span>
                    <span>65% Completed</span>
                </div>
                <div class="progress mb-1" style="height: 8px;">
                    <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span>4 days remaining</span>
                <div class="d-grid w-100 mt-4">
                    <button class="btn btn-primary" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">Upgrade
                        Plan</button>
                </div>
            </div>
        </div>
        <!-- /Plan Card -->
    </div>
    <!--/ User Sidebar -->


    <!-- User Content -->
    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
        <!-- User Pills -->
        <ul class="nav nav-pills flex-column flex-md-row mb-4">
            <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
                        class="ti ti-user-check ti-xs me-1"></i>Account</a></li>
            <li class="nav-item"><a class="nav-link" href="app-user-view-security.html"><i
                        class="ti ti-lock ti-xs me-1"></i>Security</a></li>
            <li class="nav-item"><a class="nav-link" href="app-user-view-billing.html"><i
                        class="ti ti-currency-dollar ti-xs me-1"></i>Billing & Plans</a></li>
            <li class="nav-item"><a class="nav-link" href="app-user-view-notifications.html"><i
                        class="ti ti-bell ti-xs me-1"></i>Notifications</a></li>
            <li class="nav-item"><a class="nav-link" href="app-user-view-connections.html"><i
                        class="ti ti-link ti-xs me-1"></i>Connections</a></li>
        </ul>
        <!--/ User Pills -->

        <div class="card mb-4">
            <h5 class="card-header">Change Password</h5>
            <div class="card-body">
                <form id="formChangePassword" method="GET" onsubmit="return false">
                    <div id="passwordNotMatch" class="alert alert-warning" style="display: none" role="alert">
                        <h6 class="alert-heading mb-1">Ensure that these requirements are met</h6>
                        <span>Minimum 8 characters long, uppercase & symbol</span>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                            <label class="form-label" for="newPassword">New Password</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="password" id="newPassword" name="newPassword"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye ti-xs"></i></span>
                            </div>
                        </div>

                        <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                            <label class="form-label" for="confirmPassword">Confirm New Password</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="password" name="confirmPassword" id="confirmPassword"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye ti-xs"></i></span>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary me-2">Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--/ User Content -->

</div>
@endsection

@section('script')
<script>

$('#formChangePassword').submit(function (e) {
    e.preventDefault();
    var newPassword = $('#newPassword').val();
    var confirmPassword = $('#confirmPassword').val();

    if (confirmPassword !== newPassword) {
        $('#passwordNotMatch').show();
        return;
    }

    $.ajax({
        url: '{{ route("changePassword") }}',
        method: 'POST',
        data: { newPassword: newPassword },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            // Handle success
            console.log(response)
            if(response.success) {
                $('#newPassword').val('')
                $('#confirmPassword').val('')
                toastr['success']('Password has been Changed Successfully.', 'Password Changed!');
            }
        },
        error: function () {
            // Handle error
        }
    });
});

</script>
@endsection
