@extends('layouts.app')

@section('title', 'All Views')

@include('content.modals.view-modal')

@section('script')
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
                        <tr>
                            <td>Someone</td>
                            <td>jdh</td>
                            <td>0</td>
                            <td>6</td>
                            <td>2024-02-05 07:23:00</td>
                            <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#view-modal">View Detail</button></td>
                        </tr> 
                        <tr>
                            <td>Someone</td>
                            <td>jdh</td>
                            <td>0</td>
                            <td>6</td>
                            <td>2024-02-05 07:23:00</td>
                            <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#view-modal">View Detail</button></td>
                        </tr> 
                        <tr>
                            <td>Someone</td>
                            <td>jdh</td>
                            <td>0</td>
                            <td>6</td>
                            <td>2024-02-05 07:23:00</td>
                            <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#view-modal">View Detail</button></td>
                        </tr> 
                    </tbody>
                </table>
                </div>
          </div>
    </div>
</div>
@endsection