@extends('layouts.app')

@section('title', 'Access Records')

@section('content')

<div class="row d-flex justify-content-between mb-3">
    <div class="col-md-4">
        <h4>Previously shared</h4>
    </div>
    <div class="col-md-8">
        <div class="input-send">
            <div class="d-flex">
                    <input type="text" class="form-control w-50" placeholder="">
                    <button type="button" class="btn btn-success ms-2">Send</button>
                    <button type="button" class="btn btn-danger mx-1">Delete</button>
                    <input type="search" class="form-control ms-2 w-50" placeholder="Search">
            </div>
        </div>
        {{-- <div class="search-input">
            
        </div> --}}
    </div>
</div>


    
<div class="row">
    <!-- Invoice -->
    <div class="col-xl-12 col-md-12 col-12 mb-md-0 mb-4">
      <div class="card invoice-preview-card">
        <div class="card-body">
          <div class="row d-flex align-items-center">
            <div class="col-md-1">
                <input type="checkbox" class="form-check-input">
            </div>
            <div class="col-md-2">
                <div class="share-name"><b>Someone</b></div>
                <small>April 25, 2021</small>  
            </div>
            <div class="col-md-1">
                <i class="ti ti-pencil mx-1"></i>
                <i class="ti ti-trash mx-1"></i>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('assets/img/default-imgs/photo3.jpg') }}" alt="Image" class="w-25 img-fluid">
                <img src="{{ asset('assets/img/default-imgs/photo3.jpg') }}" alt="Image" class="w-25 img-fluid">
                <img src="{{ asset('assets/img/default-imgs/photo3.jpg') }}" alt="Image" class="w-25 img-fluid">
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-primary">Share</button>
                <button type="button" class="btn btn-primary">Download</button>
                <button type="button" class="btn btn-primary">URL</button>
            </div>
          </div>
        </div>
        <hr class="my-0" />
        <div class="card-body">
            <div class="row d-flex align-items-center">
                <div class="col-md-1">
                    <input type="checkbox" class="form-check-input">
                </div>
                <div class="col-md-2">
                    <div class="share-name"><b>Someone</b></div>
                    <small>April 25, 2021</small>  
                </div>
                <div class="col-md-1">
                    <i class="ti ti-pencil mx-1"></i>
                    <i class="ti ti-trash mx-1"></i>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('assets/img/default-imgs/photo2.jpg') }}" alt="Image" class="w-25 img-fluid">
                    <img src="{{ asset('assets/img/default-imgs/photo2.jpg') }}" alt="Image" class="w-25 img-fluid">
                    <img src="{{ asset('assets/img/default-imgs/photo2.jpg') }}" alt="Image" class="w-25 img-fluid">
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary">Share</button>
                    <button type="button" class="btn btn-primary">Download</button>
                    <button type="button" class="btn btn-primary">URL</button>
                </div>
              </div>
        </div>

        <hr class="my-0" />
        <div class="card-body">
            <div class="row d-flex align-items-center">
                <div class="col-md-1">
                    <input type="checkbox" class="form-check-input">
                </div>
                <div class="col-md-2">
                    <div class="share-name"><b>Someone</b></div>
                    <small>April 25, 2021</small>  
                </div>
                <div class="col-md-1">
                    <i class="ti ti-pencil mx-1"></i>
                    <i class="ti ti-trash mx-1"></i>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('assets/img/default-imgs/photo3.jpg') }}" alt="Image" class="w-25 img-fluid">
                    <img src="{{ asset('assets/img/default-imgs/photo3.jpg') }}" alt="Image" class="w-25 img-fluid">
                    <img src="{{ asset('assets/img/default-imgs/photo3.jpg') }}" alt="Image" class="w-25 img-fluid">
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary">Share</button>
                    <button type="button" class="btn btn-primary">Download</button>
                    <button type="button" class="btn btn-primary">URL</button>
                </div>
              </div>
        </div>

      </div>
    </div>
    <!-- /Invoice -->

  </div>

@endsection