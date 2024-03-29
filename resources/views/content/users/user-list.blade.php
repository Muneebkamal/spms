@extends('layouts.app')

@section('title', 'User List')

@section('styles')
@endsection
@section('script')
    @include('content.users.Js.user-list-js')
@endsection

@section('content')
    <div class="card">
        <div class="d-flex justify-content-between">
            <h3 class="mx-3 mb-0 mt-3">{{__('agent-list.agents_list')}}</h3>
            <a href="{{ route('createAgentView') }}" type="button" class="btn btn-primary waves-effect waves-light mx-3 mb-0 mt-3"><i class="ti ti-plus"></i>{{__('agent-list.add_agent')}}</a>
        </div>
        <hr>
        <div class="card-datatable table-responsive pt-0">
        <table class="table user-list-table">
            <thead>
            <tr>
                <th>{{__('agent-list.username')}}</th>
                <th>{{__('agent-list.contact_permission')}}</th>
                <th>{{__('agent-list.photo_permission')}}</th>
                <th>{{__('agent-list.created_at')}}</th>
                <th>{{__('agent-list.action')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="odd" data-user="{{ $user->id }}">
                    <td class="sorting_1">
                        <div class="d-flex justify-content-start align-items-center user-name">
                            <div class="avatar-wrapper">
                                <div class="avatar me-3">
                                    @if($user->image)
                                        <img src="{{ asset('storage/user_images/' . $user->image) }}" alt="Avatar" class="rounded-circle">
                                    @else
                                        <img src="{{ asset('assets/img/avatars/user.jpg') }}" class="rounded-circle">
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="{{ route('viewAgent', ['id' => $user->id]) }}" class="text-body text-truncate">
                                    <span class="fw-medium">{{ $user->name }}</span>
                                </a>
                                <small class="text-muted">{{ $user->email }}</small>
                            </div>
                        </div>
                    </td>
                    <td>
                        <input class="form-check-input contactPermission" {{ $user->contact_permission ? 'checked' : '' }} data-user-id="{{ $user->id }}"  type="checkbox">
                    </td>
                    <td>
                        <input class="form-check-input photoPermission" {{ $user->photo_permission ? 'checked' : '' }} data-user-id="{{ $user->id }}" type="checkbox">
                    </td>
                    <td>
                        {{ $user->created_at }}
                    </td>
                    <td>
                        <i data-id="{{$user->id}}" class="ti ti-trash delete"></i>
                        <i onclick="window.location.href = `{{ route('viewAgent', ['id' => $user->id]) }}`" class="ti ti-eye"></i>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        </div>
    </div>

@endsection
