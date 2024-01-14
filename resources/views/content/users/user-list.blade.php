@extends('layouts.app')

@section('title', 'User List')

@section('script')
    @include('content.users.Js.user-list-js')
@endsection

@section('content')
    <div class="card">
        <div class="d-flex justify-content-between">
            <h3 class="mx-3 mb-0 mt-3">{{__('Agents List')}}</h3>
            <button type="button" class="btn btn-primary waves-effect waves-light mx-3 mb-0 mt-3">Add Agent</button>
        </div>
        <hr>
        <div class="card-datatable table-responsive pt-0">
        <table class="table user-list-table">
            <thead>
            <tr>
                <th>{{__('Username')}}</th>
                <th>{{__('Contact Permission')}}</th>
                <th>{{__('Photo Permission')}}</th>
                <th>{{__('Created at')}}</th>
                <th>{{__('Action')}}</th>
            </tr>
            </thead>
            <tbody>
                <tr class="odd">
                    <td class="sorting_1">
                        <div class="d-flex justify-content-start align-items-center user-name">
                            <div class="avatar-wrapper">
                                <div class="avatar me-3">
                                    <img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle">
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="app-user-view-account.html" class="text-body text-truncate">
                                    <span class="fw-medium">Zsazsa McCleverty</span>
                                </a>
                                <small class="text-muted">zmcclevertye@soundcloud.com</small>
                            </div>
                        </div>
                    </td>
                    <td>
                        <input class="form-check-input" type="checkbox">
                    </td>
                    <td>
                        <input class="form-check-input" type="checkbox">
                    </td>
                    <td>
                        <span class="text-truncate d-flex align-items-center">
                            <span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2">
                                <i class="ti ti-chart-pie-2 ti-sm"></i>
                            </span>Maintainer
                        </span>
                    </td>
                    <td>
                        <i class="ti ti-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="ti ti-eye"></i>
                    </td>
                </tr>
                <tr>
                    <td class="sorting_1">
                        <div class="d-flex justify-content-start align-items-center user-name">
                            <div class="avatar-wrapper">
                                <div class="avatar me-3">
                                    <img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle">
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="app-user-view-account.html" class="text-body text-truncate">
                                    <span class="fw-medium">Zsazsa McCleverty</span>
                                </a>
                                <small class="text-muted">zmcclevertye@soundcloud.com</small>
                            </div>
                        </div>
                    </td>
                    <td><input class="form-check-input" type="checkbox"></td>
                    <td><input class="form-check-input" type="checkbox"></td>
                    <td>
                        <span class="text-truncate d-flex align-items-center">
                            <span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2">
                                <i class="ti ti-chart-pie-2 ti-sm"></i>
                            </span>Time
                        </span>
                    </td>
                    <td><i class="ti ti-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="ti ti-eye"></i></td>
                </tr>
                <tr>
                    <td class="sorting_1">
                        <div class="d-flex justify-content-start align-items-center user-name">
                            <div class="avatar-wrapper">
                                <div class="avatar me-3">
                                    <img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle">
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="app-user-view-account.html" class="text-body text-truncate">
                                    <span class="fw-medium">Zsazsa McCleverty</span>
                                </a>
                                <small class="text-muted">zmcclevertye@soundcloud.com</small>
                            </div>
                        </div>
                    </td>
                    <td><input class="form-check-input" type="checkbox"></td>
                    <td><input class="form-check-input" type="checkbox"></td>
                    <td>
                        <span class="text-truncate d-flex align-items-center">
                            <span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2">
                                <i class="ti ti-chart-pie-2 ti-sm"></i>
                            </span>Time
                        </span>
                    </td>
                    <td><i class="ti ti-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="ti ti-eye"></i></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>

@endsection
