@extends('layouts.app')

@section('title', 'Create Agents')

@section('content')


<div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <h5 class="card-header">Create Agent</h5>
        <div class="card-body">
          <form action="">
            <div class="row">
                <div class="col-md-6">
                    <label for="defaultFormControlInput1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="defaultFormControlInput1" placeholder="John Doe" />
                </div>
                <div class="col-md-6">    
                    <label for="defaultFormControlInput2" class="form-label">Password</label>
                    <input type="password" class="form-control" id="defaultFormControlInput2" placeholder="Password"  />
                </div> 
                <div class="col-md-6 mt-2">   
                    <label for="defaultFormControlInput3" class="form-label">Confrom Password</label>
                    <input type="password" class="form-control" id="defaultFormControlInput3" placeholder="Confrom Password"  />
                </div>
                <div class="form-check form-switch my-2 col-md-12 mx-3">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Contact Permission</label>
                </div>
                <div class="form-check form-switch col-md-12 mx-3">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Photo Permission</label>
                </div>
                <div class="col-md-12 mt-3">
                    <button type="button" class="btn btn-primary waves-effect waves-light">Save</button>   
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>  
@endsection