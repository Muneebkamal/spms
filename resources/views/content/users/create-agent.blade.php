@extends('layouts.app')

@section('title', 'Create Agents')

@section('script')
@include('content.users.js.createAgentJs')
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">{{__('create-agent.create_agent')}}</h5>
            <div class="card-body">
                <form id="createAgent">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="form-label">{{__('create-agent.username')}}</label>
                            <input required type="text" class="form-control" id="name" name="name"
                                placeholder="{{__('create-agent.username')}}" />
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">{{__('create-agent.email')}}</label>
                            <input required type="email" class="form-control" id="email" name="email"
                                placeholder="{{__('create-agent.email')}}" />
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">{{__('create-agent.password')}}</label>
                            <input required type="password" class="form-control" id="password" name="password"
                                placeholder="{{__('create-agent.password')}}" />
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="confirm_password" class="form-label">{{__('create-agent.confrom_password')}}</label>
                            <input required type="password" class="form-control" id="confirm_password" name="confirm_password"
                                placeholder="{{__('create-agent.confrom_password')}}" />
                        </div>
                        <div class="form-check form-switch my-2 col-md-12 mx-3">
                            <input class="form-check-input" type="checkbox" id="contact_permission" name="contact_permission">
                            <label class="form-check-label" for="contact_permission">{{__('create-agent.contact_permission')}}</label>
                        </div>
                        <div class="form-check form-switch col-md-12 mx-3">
                            <input class="form-check-input" type="checkbox" id="photo_permission" name="photo_permission">
                            <label class="form-check-label" for="photo_permission">{{__('create-agent.photo_permission')}}</label>
                        </div>
                        <div class="col-md-12 mt-3 d-flex">
                            <button type="submit" id="createAgentButton" class="btn btn-primary waves-effect waves-light">{{__('create-agent.save')}}</button>
                            <span class="my-0 ms-2 alert alert-danger" style="display: none" id="seePassword">
                                <i class="ti ti-alert-octagon me-2"></i>{{__('create-agent.passwords_are_not_same')}}
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
