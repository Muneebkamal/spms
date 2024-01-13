@extends('layouts.app')

@section('script')
    @include('content.users.Js.user-list-js')
@endsection

@section('content')
<div class="card">
    <div class="card-datatable table-responsive pt-0">
      <table class="table user-list-table">
        <thead>
          <tr>
            <th>Username</th>
            <th>Created at</th>
            <th>Contact Permission</th>
            <th>Photo Permission</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <td>Hamza</td>
                <td>time</td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><i class="ti ti-trash"></i><i class="ti ti-eye"></i></td>
            </tr>
            <tr>
                <td>Hammad</td>
                <td>time</td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><i class="ti ti-trash"></i><i class="ti ti-eye"></i></td>
            </tr>
            <tr>
                <td>Muneeb</td>
                <td>time</td>
                <td><input type="checkbox"></td>
                <td><input type="checkbox"></td>
                <td><i class="ti ti-trash"></i><i class="ti ti-eye"></i></td>
            </tr>

        </tbody>
      </table>
    </div>
  </div>

@endsection
