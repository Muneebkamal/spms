@extends('layouts.app')

@section('title', 'Property Details')

@section('script')
<script>
    $('.open-img').on('click', function () {
        var imageSRC = $(this).attr('src');
        $(".random-img").attr("src", imageSRC);
        $('#modals-transparent').on('show.bs.modal', function () {})
    })

</script>
@endsection

@section('content')
<h4>
    Property Details
</h4>
<div class="row">
    <!-- User Sidebar -->
    <div class="col-xl-3 col-lg-4 col-md-4 order-1 order-md-0">
        <!-- User Card -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="user-avatar-section">
                    <div class=" d-flex align-items-center flex-column">
                        @if($photo->isNotEmpty())
                            <img class="img-fluid rounded mb-3 pt-1 mt-4" src="{{asset('storage/properties/').'/'.$property->building_id.'/'. $photo->first()->image }}" height="100"
                                width="100" alt="User avatar" />
                        @else
                            <img class="img-fluid rounded mb-3 pt-1 mt-4"  src="{{asset('assets/img/default-imgs/propertyImageNotSet.jpg')}}" height="100"
                                width="100" alt="User avatar" />
                        @endif
                        <div class="user-info text-center">
                            <h4 class="mb-2">{{ $property->building }}</h4>
                            <span class="badge bg-label-secondary mt-1">Author</span>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-around flex-wrap mt-3 pt-3 pb-4 border-bottom">
                    <div class="d-flex align-items-start me-4 mt-3 gap-2">
                        <span class="badge bg-label-primary p-2 rounded"><i class='ti ti-checkbox ti-sm'></i></span>
                        <div>
                            <p class="mb-0 fw-medium">1.23k</p>
                            <small>Tasks Done</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mt-3 gap-2">
                        <span class="badge bg-label-primary p-2 rounded"><i class='ti ti-briefcase ti-sm'></i></span>
                        <div>
                            <p class="mb-0 fw-medium">568</p>
                            <small>Projects Done</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /User Card -->
    </div>
    <!--/ User Sidebar -->

    <!-- User Content -->
    <div class="col-xl-9 col-lg-8 col-md-8 order-0 order-md-1">
        <div class="nav-align-top mb-4">
            <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-justified-building" aria-controls="navs-pills-justified-building"
                        aria-selected="true"><i class="tf-icons ti ti-building-skyscraper ti-xs me-1"></i> Building
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home"
                        aria-selected="false"><i class="tf-icons ti ti-building-warehouse ti-xs me-1"></i> Landlord
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile"
                        aria-selected="false"><i class="tf-icons ti ti-home-dollar ti-xs me-1"></i> Size & Price
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-justified-messages" aria-controls="navs-pills-justified-messages"
                        aria-selected="false"><i class="tf-icons ti ti-message-dots ti-xs me-1"></i> FTOD </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-justified-images" aria-controls="navs-pills-justified-images"
                        aria-selected="false"><i class="tf-icons ti ti-photo-pin ti-xs me-1"></i> Images </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-justified-maps" aria-controls="navs-pills-justified-maps"
                        aria-selected="false"><i class="tf-icons ti ti-map-pin ti-xs me-1"></i> Map </button>
                </li>
            </ul>

            <div class="tab-content p-0">

                {{-- BUILDING --}}

                <div class="tab-pane fade show active p-4" id="navs-pills-justified-building" role="tabpanel">
                    <form action="">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="building-name">Building Name</label>
                                <input value="{{ $property->building }}" type="text" id="bulding-name" name="building-name" class="form-control"
                                    placeholder="Building Name" />
                            </div>
                            <div class="col-sm-6">
                                <label for="district">District</label>
                                    <select id="district" name="district" class="form-control">
                                        <option>Select District</option>
                                        @foreach ($options as $option)
                                            @if($option->opt_type == 'district')
                                                <option value="{{ $option->name }}" {{ $option->name == $property->district ? 'selected' : '' }}>{{ $option->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="address">Address</label>
                                <input type="text" value="{{ $property->street }}" id="address" name="address" class="form-control"
                                    placeholder="Adsress" />
                            </div>
                            <div class="col-sm-6">
                                <label for="year">Year</label>
                                <input type="text" value="{{ $property->year }}" id="year" name="year" class="form-control" placeholder="Year" />
                            </div>
                            <div class="col-sm-6">
                                <label for="block">Block</label>
                                <input type="text" value="{{ $property->block }}" id="block" name="block" class="form-control" placeholder="Block" />
                            </div>
                            <div class="col-sm-6">
                                <label for="floor">Floor</label>
                                <input type="text" value="{{ $property->floor }}" id="floor" name="floor" class="form-control" placeholder="Floor" />
                            </div>
                            <div class="col-sm-6">
                                <label for="flat">Flat</label>
                                <input type="text" value="{{ $property->flat }}" id="flat" name="flat" class="form-control" placeholder="Flat" />
                            </div>
                            <div class="col-sm-6">
                                <label for="rooms">Rooms</label>
                                <input type="number" value="{{ $property->no_room }}" id="rooms" name="rooms" class="form-control"
                                    placeholder="No. of Rooms" />
                            </div>
                            <div class="col-sm-6">
                                <label for="cargo-lift">Cargo Lift</label>
                                <input type="text" value="{{ $property->cargo_lift }}" id="cargo-lift" name="cargo-lift" class="form-control"
                                    placeholder="Cargo Lift" />
                            </div>
                            <div class="col-sm-6">
                                <label for="customer-lift">Customer Lift</label>
                                <input type="text" value="{{ $property->customer_lift }}" id="customer-lift" name="customer-lift" class="form-control"
                                    placeholder="Customer Lift" />
                            </div>
                            <div class="col-sm-6">
                                <label class="mx-1">24 Hours</label>
                                <select id="hours" name="hours" class="form-control">
                                    <option {{ $property->tf_hr == 'yes' ? 'selected' : '' }}  value="yes">Yes</option>
                                    <option {{ $property->tf_hr == 'no' ? 'selected' : '' }} value="no">No</option>
                                </select>
                            </div>
                            <div class="col-sm-6 form-password-toggle">
                                <label for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" value="{{ $property->enter_password }}" id="password" name="password" class="form-control"
                                        placeholder="Entry Password" />
                                    <span class="input-group-text cursor-pointer" id="password2"><i
                                            class="ti ti-eye-off"></i></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary"> <span
                                        class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span></button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- LANDLORD  --}}

                <div class="tab-pane fade p-4" id="navs-pills-justified-home" role="tabpanel">
                    <form action="">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="contact-1">Contact 1</label>
                                <input type="text" value="{{ $property->contact1 }}" id="contact-1" name="contact-1" class="form-control"
                                    placeholder="Contact 1" />
                            </div>
                            <div class="col-sm-6">
                                <label for="number-1">Number 1</label>
                                <input type="text" value="{{ $property->number1 }}" id="number-1" name="number-1" class="form-control"
                                    placeholder="Number 1" />
                            </div>
                            <div class="col-sm-6">
                                <label for="contact-2">Contact 2</label>
                                <input type="text" value="{{ $property->contact2 }}" id="contact-2" name="contact-2" class="form-control"
                                    placeholder="Contact 2" />
                            </div>
                            <div class="col-sm-6">
                                <label for="number-2">Number 2</label>
                                <input type="text" value="{{ $property->number2 }}" id="number-2" name="number-2" class="form-control"
                                    placeholder="Number 2" />
                            </div>
                            <div class="col-sm-6">
                                <label for="contact-3">Contact 3</label>
                                <input type="text" value="{{ $property->contact3 }}" id="contact-3" name="contact-3" class="form-control"
                                    placeholder="Contact 3" />
                            </div>
                            <div class="col-sm-6">
                                <label for="number-3">Number 3</label>
                                <input type="text" value="{{ $property->number3 }}" id="number-3" name="number-3" class="form-control"
                                    placeholder="Number 3" />
                            </div>
                            <div class="col-sm-6">
                                <label for="individual">Individual</label>
                                <input type="text" value="{{ $property->indivisual }}" id="individual" name="individual" class="form-control"
                                    placeholder="Individual" />
                            </div>
                            <div class="col-sm-6">
                                <label for="separate">Separate</label>
                                <input type="text" value="{{ $property->seprate }}"  id="separate" name="separate" class="form-control"
                                    placeholder="Separate" />
                            </div>
                            <div class="col-sm-6">
                                <label for="landlord-name">Landlord-name</label>
                                <input type="text" value="{{ $property->landlord_name }}" id="landlord-name" name="landlord-name" class="form-control"
                                    placeholder="Landlord Name" />
                            </div>
                            <div class="col-sm-6">
                                <label for="bank">Bank</label>
                                <input type="text" value="{{ $property->bank }}" id="bank" name="bank" class="form-control" placeholder="Bank" />
                            </div>
                            <div class="col-sm-12">
                                <label for="bank-account">Bank Account</label>
                                <input type="text" value="{{ $property->bank_acc }}" id="bank-account" name="bank-account" class="form-control"
                                    placeholder="Bank Account" />
                            </div>
                            <div class="col-sm-12">
                                <label for="remark">Remark</label>
                                <textarea type="text" id="remark" name="remark" class="form-control"
                                    placeholder="Remark">{{ $property->remarks }}</textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary"> <span
                                        class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span></button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Size and Price --}}

                <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">

                    <form action="">
                        <div class="row g-3 px-4 pt-4">
                            <div class="col-sm-6">
                                <label class="form-label" for="twitter">Gross sf:</label>
                                <input type="number" value="{{ $property->gross_sf }}" id="gross-sf" name="gross-sf" class="form-control" />
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="facebook">Net sf:</label>
                                <input type="number" value="{{ $property->net_sf }}" id="net-sf" name="net-sf" class="form-control" />
                            </div>
                        </div>
                        <hr>
                        <div class="row g-3 px-4">
                            <div class="col-sm-12 mt-0">
                                <label class="form-label" for="google">Selling Price (M):</label>
                                <input type="number" value="{{ $property->selling_price }}" id="selling-price" name="selling-price" class="form-control" />
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="twitter">G@</label>
                                <input type="number" value="{{ $property->selling_g }}" id="selling-gross" name="selling-gross" class="form-control" />
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="facebook">N@</label>
                                <input type="number" value="{{ $property->selling_n }}" id="selling-net" name="selling-net" class="form-control" />
                            </div>
                        </div>
                        <hr>
                        <div class="row g-3 px-4">
                            <div class="col-sm-12 mt-0">
                                <label class="form-label" for="google">Rental Price:</label>
                                <input type="number" value="{{ $property->rental_price }}" id="rental-price" name="rental-price" class="form-control" />
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="twitter">G@</label>
                                <input type="number" value="{{ $property->rental_g }}" id="rental-gross" name="rental-gross" class="form-control" />
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="facebook">N@</label>
                                <input type="number" value="{{ $property->rental_n }}" id="rental-net" name="rental-net" class="form-control" />
                            </div>
                        </div>
                        <hr>
                        <div class="row g-3 px-4 pb-4">
                            <div class="col-sm-6 mt-0">
                                <label class="form-label" for="facebook">Mgmf:</label>
                                <input type="number" value="{{ $property->mgmf }}" id="mgmf" name="mgmf" class="form-control" />
                            </div>
                            <div class="col-sm-6 mt-0 ">
                                <label class="form-label" for="facebook">Rate:</label>
                                <input type="number" value="{{ $property->rate }}" id="rate" name="rate" class="form-control" />
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="facebook">Land:</label>
                                <input type="number" value="{{ $property->land }}" id="land" name="land" class="form-control" />
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="facebook">Oths:</label>
                                <input type="number" value="{{ $property->oths }}" id="oths" name="oths" class="form-control" />
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>

                </div>

                {{-- FTOD --}}

                <div class="tab-pane fade p-4" id="navs-pills-justified-messages" role="tabpanel">
                    <form action="">
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label class="mx-1">{{__('Facilities')}}</label>
                                <select id="facilities" name="facilities[]" class="form-control select2" multiple>
                                    <option>Select Facilities</option>
                                    @foreach ($options as $option)
                                        @if($option->opt_type == 'facility')
                                            @php
                                                $selectedFacilities = explode(',', $property->facilities);
                                            @endphp
                                            <option value="{{ $option->name }}" {{ in_array($option->name, $selectedFacilities) ? 'selected' : '' }}>
                                                {{ $option->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-sm-12">
                                <label class="mx-1">{{__('Types')}}</label>
                                <select id="types" name="types[]" class="form-control select2" multiple>
                                    <option>Select type</option>
                                    @foreach ($options as $option)
                                        @if($option->opt_type == 'type')
                                            @php
                                                $selectedType = explode(',', $property->types);
                                            @endphp
                                            <option value="{{ $option->name }}" {{ in_array($option->name, $selectedType) ? 'selected' : '' }}>
                                                {{ $option->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label class="mx-1">{{__('Decoration')}}</label>
                                <select id="decorations" name="decorations[]" class="select2 form-control " multiple>
                                    <option>Select type</option>

                                    @foreach ($options as $option)
                                        @if($option->opt_type == 'decoration')
                                            @php
                                                $selectedType = explode(',', $property->decorations);
                                            @endphp

                                            <option value="{{ $option->name }}" {{ !Str::contains($property->decorations, $option->name) ? 'selected' : '' }}>
                                                {{ $option->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <a href="#" class="text-decoration-none">Other & Expire Date</a>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                                <button class="btn btn-primary"> <span
                                        class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span></button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- images --}}

                <!-- Modal template -->
                <div class="modal modal-transparent fade" id="modals-transparent" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content p-4">
                            <div class="modal-body">
                                <a href="javascript:void(0);" class="btn-close text-white" data-bs-dismiss="modal"
                                    aria-label="Close"></a>
                                <img src="" class="random-img img-fluid img-thumbnail" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade p-4" id="navs-pills-justified-images" role="tabpanel">
                    <!-- Gallery -->
                    <div class="row">
                        @if($photo->isNotEmpty())
                        <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                            @foreach($photo as $photo)
                                @if($loop->iteration % 2 !== 0)
                                    <img src="{{asset('storage/properties/').'/'.$property->building_id.'/'. $photo->image }}"
                                        class="w-100 shadow-1-strong rounded mb-4 open-img" alt="Boat on Calm Water"
                                        data-bs-toggle="modal" data-bs-target="#modals-transparent" />
                                @endif
                            @endforeach
                        </div>
                        <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                            @foreach($photo as $photo)
                                @if($loop->iteration % 2 == 0)
                                    <img src="{{asset('storage/properties/').'/'.$property->building_id.'/'. $photo->image }}"
                                        class="w-100 shadow-1-strong rounded mb-4 open-img" alt="Boat on Calm Water"
                                        data-bs-toggle="modal" data-bs-target="#modals-transparent" />
                                @endif
                            @endforeach
                        </div>
                        @else
                        <h4>Hi,</h4>
                        @endif

                    </div>
                    <!-- Gallery -->
                </div>
                <div class="tab-pane fade p-4" id="navs-pills-justified-maps" role="tabpanel">
                    <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d236161.51672296817!2d114.1277!3d22.352734!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1705594341695!5m2!1sen!2s"></iframe>
                </div>
            </div>
        </div>
    </div>
    @endsection
