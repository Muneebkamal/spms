@extends('layouts.app')

@section('title', 'Create Agents')

@section('script')
@include('content.users.js.createAgentJs')
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Create Agent</h5>
            <div class="card-body">
                <form id="createAgent">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Username</label>
                            <input required type="text" class="form-control" id="name" name="name"
                                placeholder="John Doe" />
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Email</label>
                            <input required type="text" class="form-control" id="email" name="email"
                                placeholder="John Doe" />
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input required type="password" class="form-control" id="password" name="password"
                                placeholder="Password" />
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="confirm_password" class="form-label">Confrom Password</label>
                            <input required type="password" class="form-control" id="confirm_password" name="confirm_password"
                                placeholder="Confrom Password" />
                        </div>
                        <div class="form-check form-switch my-2 col-md-12 mx-3">
                            <input class="form-check-input" type="checkbox" id="contact_permission" name="contact_permission">
                            <label class="form-check-label" for="contact_permission">Contact Permission</label>
                        </div>
                        <div class="form-check form-switch col-md-12 mx-3">
                            <input class="form-check-input" type="checkbox" id="photo_permission" name="photo_permission">
                            <label class="form-check-label" for="photo_permission">Photo Permission</label>
                        </div>
                        <div class="col-md-12 mt-3 d-flex">
                            <button type="submit" id="createAgentButton" class="btn btn-primary waves-effect waves-light">Save</button>
                            <span class="my-0 ms-2 alert alert-danger" style="display: none" id="seePassword">
                                <i class="ti ti-alert-octagon me-2"></i>Passwords are not same
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
