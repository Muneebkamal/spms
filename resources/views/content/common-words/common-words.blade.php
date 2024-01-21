@extends('layouts.app')

@section('title', 'Common Words')

@section('script')
   @include('content.common-words.js.common-words-js')
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-4">
            <div class="card p-4">
                <h3>{{__('Add Words')}}</h3>
                <form action="">
                    <label for="">{{__('Write your Word')}}</label>
                    <input class="form-control" type="text" placeholder="Write...">
                    <button class="btn btn-primary mt-3">{{__('Add Word')}}</button>
                </form>    
            </div>
        </div>
        <div class="col-md-8">
            <div class="card p-4">
                <div class="card-datatable table-responsive pt-0">
                    <h3>SAVED WORDS</h3>
                    <table class="table user-list-table" id="common-word-table">
                        <thead>
                        <tr>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Created At')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>63060</td>
                                <td>BWP</td>
                                <td>
                                    <i class="ti ti-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="ti ti-eye"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>767824</td>
                                <td>IUD</td>
                                <td>
                                    <i class="ti ti-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="ti ti-eye"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>63845</td>
                                <td>BWN</td>
                                <td>
                                    <i class="ti ti-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="ti ti-eye"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>13456</td>
                                <td>LHR</td>
                                <td>
                                    <i class="ti ti-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="ti ti-eye"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
              </div>
        </div>
    </div>
</div>
                <!-- / Content -->
@endsection