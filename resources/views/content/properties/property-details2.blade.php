@extends('layouts.app')

@section('title', 'Property List')

@include('content.modals.edit-building')
@include('content.modals.edit-landlord')
@include('content.modals.edit-ftod')
@include('content.modals.edit-price')

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<script>
    new Sortable(document.getElementById('drag-container'), {
        animation: 150,
        handle: '.draggable-row',
        onEnd: function (evt) {
            var contacts = [];
            var numbers = [];
            for (let i = 0; i < 3; i++) {
                let num = $('.number')[i];
                $(num).text('Number ' + (i + 1) + ':');

                let con = $('.contact')[i];
                $(con).text('Contact ' + (i + 1) + ':');

                contacts.push({
                    contact: $(con).data('val')
                });
                numbers.push({
                    number: $(num).data('val')
                });
            }
            rearangeLandlordContacts(contacts,numbers)
        },
    });
    function rearangeLandlordContacts(conArr,numArr) {
        console.log(conArr,numArr)
        $.ajax({
            url: '{{ route("reArrangeContacts") }}',
            data: {'contacts': conArr, 'numbers': numArr , 'id': {{$property->building_id}}},
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                console.log(data)
            },
            error: function(e) {}
        })
    }
</script>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header border-bottom pb-2 d-flex justify-content-between">
                <h3 class="mb-0">{{$property->building}}</h3>
                <h3 class="mb-0">{{$property->code}}</h3>
            </div>
            <div class="card-body pt-4">
                <div class="row">
                    <div class="col-md-6">
                        <div id="map"></div>
                    </div>
                    <div class="col-md-6">
                        <div id="pano"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-9">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom pb-3 d-flex justify-content-between">
                        <h3 class="mb-0">Building Details</h3>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-building">Edit</button>
                    </div>
                    <div class="card-body pt-3">
                        <div class="row">
                            <div class="col-4 my-2">
                                <h6 class="mb-0">
                                    <span class="text-muted">
                                        <i class="ti mb-2 ti-map-pin-filled"></i>
                                        District:
                                    </span>&nbsp;
                                    {{$property->district}}
                                    <input hidden id="building_address" value="{{$property->street}}">
                                </h6>
                            </div>
                            <div class="col-4 my-2">
                                <h6 class="mb-0">
                                    <span class="text-muted">
                                        <i class="ti mb-2 ti-calendar"></i>
                                        Year:
                                    </span>&nbsp;
                                    {{$property->year}}
                                </h6>
                            </div>
                            <div class="col-4 my-2">
                                <h6 class="mb-0">
                                    <span class="text-muted">
                                        <i class="ti mb-2 ti-door"></i>
                                        Flat:
                                    </span>&nbsp;
                                    {{$property->flat}}
                                </h6>
                            </div>
                            <div class="col-4 my-2">
                                <h6 class="mb-0">
                                    <span class="text-muted">
                                        <i class="ti mb-2 ti-building"></i>
                                        Floor:
                                    </span>&nbsp;
                                    {{$property->floor}}
                                </h6>
                            </div>
                            <div class="col-4 my-2">
                                <h6 class="mb-0">
                                    <span class="text-muted">
                                        <i class="ti mb-2 ti-building-arch"></i>
                                        No of Rooms:
                                    </span>&nbsp;
                                    {{$property->no_room}}
                                </h6>
                            </div>
                            <div class="col-4 my-2">
                                <h6 class="mb-0">
                                    <span class="text-muted">
                                        <i class="ti mb-2 ti-brand-blogger"></i>
                                        Cargo Lift:
                                    </span>&nbsp;
                                    {{$property->cargo_lift}}
                                </h6>
                            </div>
                            <div class="col-4 my-2">
                                <h6 class="mb-0">
                                    <span class="text-muted">
                                        <i class="ti mb-2 ti-user"></i>
                                        Customer Lift:
                                    </span>&nbsp;
                                    {{$property->customer_lift}}
                                </h6>
                            </div>
                            <div class="col-4 my-2">
                                <h6 class="mb-0">
                                    <span class="text-muted">
                                        <i class="ti mb-2 ti-clock"></i>
                                        24 Hours:
                                    </span>&nbsp;
                                    {{$property->tf_hr}}
                                </h6>
                            </div>
                            <div class="col-4 my-2">
                                <h6 class="mb-0">
                                    <span class="text-muted">
                                        <i class="ti mb-2 ti-lock-open"></i>
                                        Enter Password:
                                    </span>&nbsp;
                                    {{$property->enter_password}}
                                </h6>
                            </div>
                            <div class="col-4 my-2">
                                <h6 class="mb-0">
                                    <span class="text-muted">
                                        <i class="ti mb-2 ti-building-estate"></i>
                                        Block:
                                    </span>&nbsp;
                                    {{$property->block}}
                                </h6>
                            </div>
                            <div class="col-4 my-2">
                                <h6 class="mb-0">
                                    <span class="text-muted">
                                        <i class="ti mb-2 ti-map-pins"></i>
                                        Address:
                                    </span>&nbsp;

                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header border-bottom pb-3 d-flex justify-content-between">
                        <h3 class="mb-0">Landlord Details</h3>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-landlord">Edit</button>
                    </div>
                    <div class="card-body py-0">
                        <div class="row">
                            <div class="col-8 py-2" id="drag-container">
                                <div class="row draggable-row" draggable="true" data-id="1">
                                    <div class="col-3 my-2">
                                        <h6 class="mb-0">
                                            <span class="text-muted">
                                                <i class="ti mb-2 ti-phone"></i>
                                                <span class="contact" data-val="{{$property->contact1}}">Contact 1:</span>
                                            </span>
                                        </h6>
                                    </div>
                                    <div class="col-3 my-2">
                                        <h6 class="mb-0">
                                            {{$property->contact1}}
                                        </h6>
                                    </div>
                                    <div class="col-3 my-2">
                                        <h6 class="mb-0">
                                            <span class="text-muted">
                                                <i class="ti mb-2 ti-phone"></i>
                                                <span class="number" data-val="{{$property->number1}}">Number 1:</span>
                                            </span>
                                        </h6>
                                    </div>
                                    <div class="col-3 my-2">
                                        <h6 class="mb-0">
                                            {{$property->number1}}
                                        </h6>
                                    </div>
                                </div>
                                <div class="row draggable-row" draggable="true" data-id="2">
                                    <div class="col-3 my-2">
                                        <h6 class="mb-0">
                                            <span class="text-muted">
                                                <i class="ti mb-2 ti-phone"></i>
                                                <span class="contact" data-val="{{$property->contact2}}">Contact 2:</span>
                                            </span>
                                        </h6>
                                    </div>
                                    <div class="col-3 my-2">
                                        <h6 class="mb-0">
                                            {{$property->contact2}}
                                        </h6>
                                    </div>
                                    <div class="col-3 my-2">
                                        <h6 class="mb-0">
                                            <span class="text-muted">
                                                <i class="ti mb-2 ti-phone"></i>
                                                <span class="number" data-val="{{$property->number2}}">Number 2:</span>
                                            </span>
                                        </h6>
                                    </div>
                                    <div class="col-3 my-2">
                                        <h6 class="mb-0">
                                            {{$property->number2}}
                                        </h6>
                                    </div>
                                </div>
                                <div class="row draggable-row" draggable="true" data-id="3">
                                    <div class="col-3 my-2">
                                        <h6 class="mb-0">
                                            <span class="text-muted">
                                                <i class="ti mb-2 ti-phone"></i>
                                                <span class="contact" data-val="{{$property->contact3}}">Contact 3:</span>
                                            </span>
                                        </h6>
                                    </div>
                                    <div class="col-3 my-2">
                                        <h6 class="mb-0">
                                            {{$property->contact3}}
                                        </h6>
                                    </div>
                                    <div class="col-3 my-2">
                                        <h6 class="mb-0">
                                            <span class="text-muted">
                                                <i class="ti mb-2 ti-phone"></i>
                                                <span class="number" data-val="{{$property->number3}}">Number 3:</span>
                                            </span>
                                        </h6>
                                    </div>
                                    <div class="col-3 my-2">
                                        <h6 class="mb-0">
                                            {{$property->number3}}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 py-2 border-start">
                                <div class="col-12 my-2">
                                    <h6 class="mb-0">
                                        <span class="text-muted">
                                            <i class="ti mb-2 ti-currency-dollar"></i>
                                            Bank:
                                        </span>&nbsp;
                                        {{$property->bank}}
                                    </h6>
                                </div>
                                <div class="col-12 my-2">
                                    <h6 class="mb-0">
                                        <span class="text-muted">
                                            <i class="ti mb-2 ti-file-analytics"></i>
                                            Bank Account:
                                        </span>&nbsp;
                                        {{$property->bank_acc}}
                                    </h6>
                                </div>
                                <div class="col-12 my-2">
                                    <h6 class="mb-0">
                                        <span class="text-muted">
                                            <i class="ti mb-2 ti-user"></i>
                                            Indivisual:
                                        </span>&nbsp;
                                        {{$property->individual}}
                                    </h6>
                                </div>
                                <div class="col-12 my-2">
                                    <h6 class="mb-0">
                                        <span class="text-muted">
                                            <i class="ti mb-2 ti-slashes"></i>
                                            Seprate:
                                        </span>&nbsp;
                                        {{$property->separate}}
                                    </h6>
                                </div>
                                <div class="col-12 my-2">
                                    <h6 class="mb-0">
                                        <span class="text-muted">
                                            <i class="ti mb-2 ti-message"></i>
                                            Remark:
                                        </span>&nbsp;

                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header border-bottom pb-3 d-flex justify-content-between">
                        <h3 class="mb-0">FTOD</h3>
                        <button class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#edit-ftod">Edit</button>
                    </div>
                    <div class="card-body p-0">
                        <div class="row px-3">
                            <div class="col-4 border-end">
                                <h3 class="my-2">Facilities</h3>
                                <ul class="ps-3 check-list">
                                    @foreach($options as $type)
                                        @if($type->opt_type == 'facility')
                                        <li>
                                            <i class="ti ti-check me-2"></i>
                                            <span>{{$type->name}}</span>
                                        </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-4 border-end">
                                <h3 class="my-2">Decoration</h3>
                                <ul class="ps-3 check-list">
                                @foreach($options as $type)
                                    @if($type->opt_type == 'decoration')
                                    <li>
                                        <i class="ti ti-check me-2"></i>
                                        <span>{{$type->name}}</span>
                                    </li>
                                    @endif
                                @endforeach
                                </ul>
                            </div>
                            <div class="col-4">
                                <h3 class="my-2">Types</h3>
                                <ul class="ps-3 check-list">
                                @foreach($options as $type)
                                    @if($type->opt_type == 'type')
                                    <li>
                                        <i class="ti ti-check me-2"></i>
                                        <span>{{$type->name}}</span>
                                    </li>
                                    @endif
                                @endforeach
                                </ul>
                            </div>
                            <div class="col-12 border-top"></div>
                            <div class="col-12 pb-4">
                                <h3 class="my-3">Others</h3>
                                <div class="table-responsive text-nowrap border border-bottom-none">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>name</td>
                                                <td>name</td>
                                                <td>name</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="sticky">
            <div class="card">
                <div class="card-header border-bottom pb-3 d-flex justify-content-between">
                    <h3 class="mb-0">Created By</h3>
                </div>
                <div class="card-body pt-3 pb-2 border-bottom">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <img src="{{asset('assets/img/avatars/1.png')}}" width="150" class="rounded-circle" alt="">
                        </div>
                        <div class="col-12 d-flex justify-content-center mt-2">
                            <div class="badge bg-label-success">Admin</div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-3 pb-2">
                    <div class="row">
                        <div class="col-12">
                            <h6><span class="text-muted">Name:</span> Admin</h6>
                        </div>
                        <div class="col-12">
                            <h6><span class="text-muted">Email:</span> das@das.com</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header border-bottom pb-3 d-flex justify-content-between">
                    <h3 class="mb-0">Actions</h3>
                </div>
                <div class="card-body pt-3">
                    <button class="btn mb-2 w-100 btn-success">Add to Share List</button>
                    <button class="btn mb-2 w-100 btn-info">Export Excel</button>
                    <button class="btn w-100 btn-danger">Delete Property</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card mt-4">
            <div class="card-header border-bottom pb-2  d-flex justify-content-between">
                <h3 class="mb-0">Price & Size:</h3>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-price">Edit</button>
            </div>
            <div class="card-body py-0">
                <div class="row">
                    <div class="col-8 py-2">
                        <div class="row">
                            <div class="col-6 my-1">
                                <h6 class="mb-0">
                                    <span class="text-muted me-1">
                                        <i class="ti mb-2 ti-phone"></i>
                                        Gross SF:
                                    </span>
                                    {{$property->gross_sf}}
                                </h6>
                            </div>
                            <div class="col-6 my-1">
                                <h6 class="mb-0">
                                    <span class="text-muted me-1">
                                        <i class="ti mb-2 ti-phone"></i>
                                        Net SF:
                                    </span>
                                    {{$property->net_sf}}
                                </h6>
                            </div>
                            <div class="row">
                                <div class="col-6 px-0 pt-2 border">
                                    <h4 class="mb-2 px-2 pb-2 border-bottom">Selling</h4>
                                    <p class="mb-2 px-2">
                                        <span class="text-muted me-1">
                                            <i class="ti mb-2 ti-phone"></i>
                                            Selling Price:
                                        </span>
                                        {{$property->selling_price}}
                                    </p>
                                    <p class="mb-2 px-2">
                                        <span class="text-muted me-1">
                                            <i class="ti mb-2 ti-phone"></i>
                                            Selling G@:
                                        </span>
                                        {{$property->selling_g}}
                                    </p>
                                    <p class="mb-2 px-2">
                                        <span class="text-muted me-1">
                                            <i class="ti mb-2 ti-phone"></i>
                                            Selling N@:
                                        </span>
                                        {{$property->selling_n}}
                                    </p>
                                </div>
                                <div class="col-6 px-0 pt-2 border">
                                    <h4 class="mb-2 px-2 pb-2 border-bottom">Rental:</h4>
                                    <p class="mb-2 px-2">
                                        <span class="text-muted me-1">
                                            <i class="ti mb-2 ti-phone"></i>
                                            Rental Price:
                                        </span>
                                        {{$property->rental_price}}
                                    </p>
                                    <p class="mb-2 px-2">
                                        <span class="text-muted me-1">
                                            <i class="ti mb-2 ti-phone"></i>
                                            Rental G@:
                                        </span>
                                        {{$property->rental_g}}
                                    </p>
                                    <p class="mb-2 px-2">
                                        <span class="text-muted me-1">
                                            <i class="ti mb-2 ti-phone"></i>
                                            Rental N@:
                                        </span>
                                        {{$property->rental_n}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 py-2 border-start">
                        <div class="col-12 my-2">
                            <h6 class="mb-0">
                                <span class="text-muted">
                                    <i class="ti mb-2 ti-currency-dollar"></i>
                                    Bank:
                                </span>&nbsp;
                                {{$property->bank}}
                            </h6>
                        </div>
                        <div class="col-12 my-2">
                            <h6 class="mb-0">
                                <span class="text-muted">
                                    <i class="ti mb-2 ti-file-analytics"></i>
                                    Bank Account:
                                </span>&nbsp;
                                {{$property->bank_acc}}
                            </h6>
                        </div>
                        <div class="col-12 my-2">
                            <h6 class="mb-0">
                                <span class="text-muted">
                                    <i class="ti mb-2 ti-user"></i>
                                    Indivisual:
                                </span>&nbsp;
                                {{$property->individual}}
                            </h6>
                        </div>
                        <div class="col-12 my-2">
                            <h6 class="mb-0">
                                <span class="text-muted">
                                    <i class="ti mb-2 ti-slashes"></i>
                                    Seprate:
                                </span>&nbsp;
                                {{$property->separate}}
                            </h6>
                        </div>
                        <div class="col-12 my-2">
                            <h6 class="mb-0">
                                <span class="text-muted">
                                    <i class="ti mb-2 ti-message"></i>
                                    Remark:
                                </span>&nbsp;
                                {{$property->remarks}}
                            </h6>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>
    <div class="col-12 mb-2">
        <div class="nav-align-left mt-4">
            <ul class="nav sticky nav-pills me-3" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-left-admin" aria-controls="navs-pills-left-admin"
                        aria-selected="true">Admin Comments</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-left-agent" aria-controls="navs-pills-left-agent"
                        aria-selected="false">Agent Comments</button>
                </li>
            </ul>
            <div class="tab-content px-0">
                <div class="tab-pane fade show active" id="navs-pills-left-admin" role="tabpanel">
                    <div class="px-4 d-flex justify-content-between pb-2 border-bottom">
                        <h3>Admin Comments</h3>
                        <button class="btn btn-primary h-50">Add New Comment</button>
                    </div>
                    <div class="my-2 mx-3 row">
                        <div class="col-12 border mb-2 p-0">
                            <div class="d-flex justify-content-between p-2 border-bottom">
                                <div class="d-flex">
                                    <img id="user_img_nav" src="{{ asset('assets/img/avatars/user.jpg') }}" alt
                                        class="rounded-circle" width="40" height='40'>
                                    <div class="d-flex flex-column ps-2">
                                        <h5 class="mb-0">John Smith</h5>
                                        <p class="mb-0">
                                            <span class="text-muted">Admin</span>
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <span class="text-muted">12/12/2000 </span>
                                </div>
                            </div>
                            <div class="p-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus dolore tempore totam nihil sit ipsum nesciunt, suscipit molestiae corporis cupiditate vero autem consectetur quaerat pariatur recusandae fugit, est exercitationem officia.</div>
                        </div>
                        <div class="col-12 border mb-2 p-0">
                            <div class="d-flex justify-content-between p-2 border-bottom">
                                <div class="d-flex">
                                    <img id="user_img_nav" src="{{ asset('assets/img/avatars/user.jpg') }}" alt
                                        class="rounded-circle" width="40" height='40'>
                                    <div class="d-flex flex-column ps-2">
                                        <h5 class="mb-0">John Smith</h5>
                                        <p class="mb-0">
                                            <span class="text-muted">Admin</span>
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <span class="text-muted">12/12/2000 </span>
                                </div>
                            </div>
                            <div class="p-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus dolore tempore totam nihil sit ipsum nesciunt, suscipit molestiae corporis cupiditate vero autem consectetur quaerat pariatur recusandae fugit, est exercitationem officia.</div>
                        </div>
                        <div class="col-12 border mb-2 p-0">
                            <div class="d-flex justify-content-between p-2 border-bottom">
                                <div class="d-flex">
                                    <img id="user_img_nav" src="{{ asset('assets/img/avatars/user.jpg') }}" alt
                                        class="rounded-circle" width="40" height='40'>
                                    <div class="d-flex flex-column ps-2">
                                        <h5 class="mb-0">John Smith</h5>
                                        <p class="mb-0">
                                            <span class="text-muted">Admin</span>
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <span class="text-muted">12/12/2000 </span>
                                </div>
                            </div>
                            <div class="p-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus dolore tempore totam nihil sit ipsum nesciunt, suscipit molestiae corporis cupiditate vero autem consectetur quaerat pariatur recusandae fugit, est exercitationem officia.</div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-pills-left-agent" role="tabpanel">
                    <div class="px-4 d-flex justify-content-between pb-2 border-bottom">
                        <h3>Agent Comments</h3>
                        <button class="btn btn-primary h-50">Add New Comment</button>
                    </div>
                    <div class="my-2 mx-3 row">
                        <div class="col-12 border mb-2 p-0">
                            <div class="d-flex justify-content-between p-2 border-bottom">
                                <div class="d-flex">
                                    <img id="user_img_nav" src="{{ asset('assets/img/avatars/user.jpg') }}" alt
                                        class="rounded-circle" width="40" height='40'>
                                    <div class="d-flex flex-column ps-2">
                                        <h5 class="mb-0">John Smith</h5>
                                        <p class="mb-0">
                                            <span class="text-muted">Admin</span>
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <span class="text-muted">12/12/2000 </span>
                                </div>
                            </div>
                            <div class="p-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus dolore tempore totam nihil sit ipsum nesciunt, suscipit molestiae corporis cupiditate vero autem consectetur quaerat pariatur recusandae fugit, est exercitationem officia.</div>
                        </div>
                        <div class="col-12 border mb-2 p-0">
                            <div class="d-flex justify-content-between p-2 border-bottom">
                                <div class="d-flex">
                                    <img id="user_img_nav" src="{{ asset('assets/img/avatars/user.jpg') }}" alt
                                        class="rounded-circle" width="40" height='40'>
                                    <div class="d-flex flex-column ps-2">
                                        <h5 class="mb-0">John Smith</h5>
                                        <p class="mb-0">
                                            <span class="text-muted">Admin</span>
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <span class="text-muted">12/12/2000 </span>
                                </div>
                            </div>
                            <div class="p-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus dolore tempore totam nihil sit ipsum nesciunt, suscipit molestiae corporis cupiditate vero autem consectetur quaerat pariatur recusandae fugit, est exercitationem officia.</div>
                        </div>
                        <div class="col-12 border mb-2 p-0">
                            <div class="d-flex justify-content-between p-2 border-bottom">
                                <div class="d-flex">
                                    <img id="user_img_nav" src="{{ asset('assets/img/avatars/user.jpg') }}" alt
                                        class="rounded-circle" width="40" height='40'>
                                    <div class="d-flex flex-column ps-2">
                                        <h5 class="mb-0">John Smith</h5>
                                        <p class="mb-0">
                                            <span class="text-muted">Admin</span>
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <span class="text-muted">12/12/2000 </span>
                                </div>
                            </div>
                            <div class="p-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus dolore tempore totam nihil sit ipsum nesciunt, suscipit molestiae corporis cupiditate vero autem consectetur quaerat pariatur recusandae fugit, est exercitationem officia.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h2>Property Images</h2>
    @foreach($photo as $pic)
            <div class="col-md-4 my-2">
                <div class="position-relative image-div shadow">
                <input type="checkbox" name="" class="custom-image-check form-check-input m-0" id="">
                <img src="{{asset('storage/properties/').'/'.$pic->image }}"
                    class="shadow-1-strong w-100 rounded open-img" alt="Boat on Calm Water"
                    data-bs-toggle="modal" data-bs-target="#modals-transparent" />
                <div class="inputs-div">
                    <input type="text" name="" placeholder="Room Number" class="custom-image-input m-0" id="">
                    <input type="text" name="" placeholder="Price" class="custom-image-input" id="">
                    <input type="text" name="" placeholder="Size" class="custom-image-input"id="">
                </div>
            </div></div>
    @endforeach


</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACk1RzpwGH2o8goef4pgIP8C1-_BNDCD0&callback=initialize&v=weekly" defer></script>
<script>

    let lat = '';
    let lng = '';
    let loc = '';

    var map;
    var panorama;

    function initialize() {
        let address = $('#building_address').val();

    //   const map = new google.maps.Map(document.getElementById("map"), {
    //     mapTypeId: google.maps.MapTypeId.TERRAIN,
    //     zoom: 18,
    //     streetViewControl: false,
    //   });


        var geocoder = new google.maps.Geocoder();

        geocoder.geocode({
            'address': address
        },
        function(results, status) {
            if(status == google.maps.GeocoderStatus.OK) {
                lat = results[0].geometry.location.lat();
                lng = results[0].geometry.location.lng();
                loc = results[0].geometry.location;

                var mylatlng = new google.maps.LatLng(lat, lng);

                var sv = new google.maps.StreetViewService();

                panorama = new google.maps.StreetViewPanorama(document.getElementById('pano'));

                // set up the map.
                map = new google.maps.Map(document.getElementById('map'), {
                center: mylatlng,
                zoom: 16,
                });

                // Set the initial Street View camera to the center of the map
                sv.getPanorama({location: mylatlng, radius: 50, source: google.maps.StreetViewSource.OUTDOOR}, processSVData);

                // Look for a nearby Street View panorama when the map is clicked.
                // getPanoramaByLocation will return the nearest pano when the
                // given radius is 50 meters or less.
                map.addListener('click', function(event) {
                sv.getPanorama({location: event.latLng, radius: 50}, processSVData);
                });

        //      new google.maps.Marker({
        //         position: results[0].geometry.location,
        //         map: map
        //      });
        //      map.setCenter(results[0].geometry.location);

        //      const panorama = new google.maps.StreetViewPanorama(
        //     document.getElementById("pano"),
        //     {
        //       position: loc,
        //       zoom:1,
        //       pov: {
        //         heading: 270,
        //         pitch: 0,
        //       },
        //       radius : 50,
        //       source: google.maps.StreetViewSource.OUTDOOR
        //     },
        //   );

        //   map.setStreetView(panorama);

            }
        });

        console.log("Latitude: "+lat);
        console.log("Longitude: "+lng);

    }

    window.initialize = initialize;

    function processSVData(data, status) {
        if (status === google.maps.StreetViewStatus.OK) {
        var marker = new google.maps.Marker({
            position: data.location.latLng,
            map: map,
            title: data.location.description
        });

        panorama.setPano(data.location.pano);
        panorama.setPov({
            heading: 270,
            pitch: 0
        });
        panorama.setVisible(true);

        marker.addListener('click', function() {
            var markerPanoID = data.location.pano;
            // Set the Pano to use the passed panoID.
            panorama.setPano(markerPanoID);
            panorama.setPov({
            heading: 270,
            pitch: 0
            });
            panorama.setVisible(true);
        });
        } else {
        console.error('Street View data not found for this location.');
        }
    }

</script>

@endsection

@section('styles')
<style>
    .custom-image-input:focus-visible{
        border:none;
        outline: none;
    }
    .custom-image-input{
        width: 33.33%;
        background: rgba(255, 255, 255, 0.8);
        border: none;
        text-align: center;
        margin-left: 5px
    }
    .image-div > img{
        height: 22rem
    }
    .inputs-div{
        display: flex;
        position: absolute;
        bottom:0px
    }
    .custom-image-check{
        position: absolute;
        top: 10px;
        right: 10px
    }
    #map,
    #pano {
        width: 100%;
        height: 15rem;
        background-color: gray
    }

    ul {
        list-style-type: none;
    }

    .check-list>li {
        margin: 5px 0
    }

    div.sticky {
        position: sticky;
        top: 100px;
    }

</style>
@endsection
