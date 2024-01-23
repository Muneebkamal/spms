@extends('layouts.app')

@section('title', 'Common Words')

@section('script')
   @include('content.common-words.js.common-words-js')
@endsection

@section('content')

<div>
    @if(Session::has('msg'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible">
                {{ Session::get('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        </div>
    </div> 
    @endif

    @if(Session::has('updatemsg'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info alert-dismissible">
                {{ Session::get('updatemsg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        </div>
    </div> 
    @endif
    
    <!-- Add New Credit Card Modal -->
    <div class="modal fade" id="addNewCCModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-simple modal-add-new-cc">
          <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="text-center mb-4">
                <h3 class="mb-2">Update Recrod</h3>
              </div>
              <form id="update-form" class="row g-3" action="update-common-words" method="post">
                @csrf
                <div class="col-12 col-md-12">
                  <label class="form-label" for="name">Name</label>
                  <input type="text" id="name" class="form-control" name="name" />
                </div>
                <input type="hidden" id="update-id" class="form-control" name="id" />
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                  <button type="reset" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--/ Add New Credit Card Modal -->

    <div class="row">
        <div class="col-md-4">
            <div class="card p-4">
                <h3>{{__('Add Words')}}</h3>
                <form action="{{ url('create-common-words') }}" method="post">
                    @csrf
                    <label for="">{{ __('Write your Word')}}</label>
                    <input class="form-control" type="text" name="name" placeholder="Write...">
                    <button class="btn btn-primary mt-3" type="submit">{{('Add Word')}}</button>
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
                            @foreach($commonwords as $commonword)
                            <tr>
                                <td>{{ $commonword->name }}</td>
                                <td>{{ $commonword->created_at }}</td>
                                <td>
                                    <button class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#addNewCCModal" onclick="edit({{$commonword->id}},'{{$commonword->name}}')"><i class="ti ti-pencil mx-1"></i></button> <button class="btn btn-danger m-1"><i class="ti ti-trash mx-1"></i></button>
                                </td>
                            </tr> 
                            @endforeach
                            
                        </tbody>
                    </table>
                    </div>
              </div>
        </div>
    </div>
</div>
                <!-- / Content -->
@endsection
