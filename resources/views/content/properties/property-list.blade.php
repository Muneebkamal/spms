@extends('layouts.app')

@section('title', 'Property List')

@section('script')
    @include('content.properties.js.property-list-js')
@endsection

@section('content')
<div class="property-list">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-end my-3 px-4">
            <span class="">
                <i class="ti ti-list mx-2 fs-2"></i>
            </span>
            <span class="">    
                <i class="ti ti-border-all fs-2"></i>
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-2">
                <img class="card-img card-img-left" src="{{asset('assets/img/elements/9.jpg')}}" alt="Card image" />
                </div>
                <div class="col-md-10">
                <div class="card-body px-4 py-2">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">{{__('Building')}}</h3>
                        <div>
                            <a href="#" class="text-muted"><i class="ti ti-eye"></i></a>
                            <a href="#" class="text-muted"><i class="ti ti-copy"></i></a>
                            <a href="#" class="text-muted"><i class="ti ti-trash"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><h6 class="mb-0">Code: 63060</h6></div>
                        <div class="col-md-6"><h6 class="mb-0">District: BWP</h6></div>
                        <div class="col-md-6 pt-1"><h6 class="mb-0">Street: </h6></div>
                        <div class="col-md-6 pt-1"><h6 class="mb-0">Bulding: </h6></div>
                    </div>
                    <hr/>
                    <div class="card-footer d-flex justify-content-between p-0">
                        <small>Hamza Aziz</small>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md">
            <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-2">
                <img class="card-img card-img-left" src="{{asset('assets/img/elements/8.jpg')}}" alt="Card image" />
                </div>
                <div class="col-md-10">
                <div class="card-body px-4 py-2">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">{{__('Building')}}</h3>
                        <div>
                            <a href="#" class="text-muted"><i class="ti ti-eye"></i></a>
                            <a href="#" class="text-muted"><i class="ti ti-copy"></i></a>
                            <a href="#" class="text-muted"><i class="ti ti-trash"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><h6 class="mb-0">Code: 63060</h6></div>
                        <div class="col-md-6"><h6 class="mb-0">District: BWP</h6></div>
                        <div class="col-md-6 pt-1"><h6 class="mb-0">Street: </h6></div>
                        <div class="col-md-6 pt-1"><h6 class="mb-0">Bulding: </h6></div>
                    </div>
                    <hr/>
                    <div class="card-footer d-flex justify-content-between p-0">
                        <small>Hamza Aziz</small>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md">
            <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-2">
                <img class="card-img card-img-left" src="{{asset('assets/img/elements/10.jpg')}}" alt="Card image" />
                </div>
                <div class="col-md-10">
                <div class="card-body px-4 py-2">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">{{__('Building')}}</h3>
                        <div>
                            <a href="#" class="text-muted"><i class="ti ti-eye"></i></a>
                            <a href="#" class="text-muted"><i class="ti ti-copy"></i></a>
                            <a href="#" class="text-muted"><i class="ti ti-trash"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><h6 class="mb-0">Code: 63060</h6></div>
                        <div class="col-md-6"><h6 class="mb-0">District: BWP</h6></div>
                        <div class="col-md-6 pt-1"><h6 class="mb-0">Street: </h6></div>
                        <div class="col-md-6 pt-1"><h6 class="mb-0">Bulding: </h6></div>
                    </div>
                    <hr/>
                    <div class="card-footer d-flex justify-content-between p-0">
                        <small>Hamza Aziz</small>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<!--/ Horizontal -->

<!--Table-->
<div class="card">
    <div class="card-datatable table-responsive pt-0">
    <table class="table user-list-table">
        <thead>
        <tr>
            <th>{{__('Code')}}</th>
            <th>{{__('District')}}</th>
            <th>{{__('Street')}}</th>
            <th>{{__('Bulding')}}</th>
            <th>{{__('Action')}}</th>
        </tr>
        </thead>
        <tbody>
            <tr class="odd">
                <td>63060</td>
                <td>BWP</td>
                <td>jdkajdfoi kls</td>
                <td>nop 93</td>
                <td>
                    <i class="ti ti-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="ti ti-eye"></i>
                </td>
            </tr>
            <tr class="odd">
                <td>767824</td>
                <td>IUD</td>
                <td>mnaoiero</td>
                <td>nwergo</td>
                <td>
                    <i class="ti ti-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="ti ti-eye"></i>
                </td>
            </tr>
            <tr class="odd">
                <td>63845</td>
                <td>BWN</td>
                <td>xcbiwe qewr</td>
                <td>no. block ie</td>
                <td>
                    <i class="ti ti-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="ti ti-eye"></i>
                </td>
            </tr>
            <tr class="odd">
                <td>13456</td>
                <td>LHR</td>
                <td>iuehf oq; qei</td>
                <td>kweor kqe</td>
                <td>
                    <i class="ti ti-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="ti ti-eye"></i>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
</div>

@endsection