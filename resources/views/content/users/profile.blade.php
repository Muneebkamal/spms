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

                       <div id="upload">
                            @if($user->image != null)
                                <img id="user_img" class="img-fluid rounded mb-3 pt-1 mt-4"src="{{ asset('storage/user_images/' . $user->image) }}" height="100"
                                    width="100"alt="User avatar" />
                            @else
                                <img id="user_img" class="img-fluid rounded mb-3 pt-1 mt-4" src="{{ asset('assets/img/avatars/user.jpg') }}" height="100"
                                    width="100" alt="User avatar" />
                            @endif
                            <button class="btn btn-sm btn-primary" id="uploadImg">Upload</button>
                            <input type="file" name="imagFile" class="d-none" id="imagFile">
                        </div>
                        <div class="user-info text-center">
                            <h4 class="mb-2">{{ $user->name }}</h4>
                            <span class="badge bg-label-secondary mt-1">{{ $user->role }}</span>
                        </div>
                    </div>
                </div>
                <p class="mt-4 small text-uppercase text-muted">Details</p>
                <div class="info-container">
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <span class="fw-medium me-1">Username:</span>
                            <span>{{ $user->name }}</span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-medium me-1">Email:</span>
                            <span>{{ $user->email }}</span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-medium me-1">Role:</span>
                            <span>{{ $user->role }}</span>
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
<style>
#upload > button{
    position: absolute;
    left: 50%;
    transform: translate(-50%, 4rem);
    display: none
}
#upload:hover > button{
    position: absolute;
    left: 50%;
    transform: translate(-50%, 4rem);
    display: inline-flex !important
}
</style>
@endsection

@section('script')
@include('content.users.js.profileJs')
@endsection
