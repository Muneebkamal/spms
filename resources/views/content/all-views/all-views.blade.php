@extends('layouts.app')

@section('title', 'All Views')

@include('content.modals.view-modal')

@section('script')
@include('content.all-views.js.all-viewsjs')
<script>
    $('#view-table').dataTable();
</script>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <h3>Today's Views Info</h3>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card p-4">
            <div class="card-datatable table-responsive pt-0">
                <table class="table user-list-table" id="view-table">
                    <thead>
                    <tr>
                        <th>Agent Name</th>
                        <th>Last Visited Code</th>
                        <th>Add Button Pressed</th>
                        <th>View Count</th>
                        <th>Last Visited Time</th>
                        <th>{{__('Action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $log)
                        <tr>
                    
                            <td>{{ $log->user_data->user_name }}</td>
                            <td>{{ $log->code }}</td>
                            <td>--</td>
                            <td>{{ $log->count }}</td>
                            <td>{{  $log->user_data->created_at }}</td>
                            <td><button onclick="getViewData({{ $log->user_id}})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#view-modal" data-view="{{ $log->user_id}}">View Detail</button></td>
                        </tr> 
                        @endforeach
                        
                    </tbody>
                </table>
                </div>
          </div>
    </div>
</div>
@endsection