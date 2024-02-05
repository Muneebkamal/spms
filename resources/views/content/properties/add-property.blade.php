@extends('layouts.app')

@section('title', 'Add Property')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/%40form-validation/umd/styles/index.min.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
<style>
.dz-message:before {display: none}
</style>
@endsection

@section('content')
<div class="col-12 mb-4">
    <small class="text-light fw-medium">{{__('add-property.New Property')}}</small>
    <div class="bs-stepper wizard-numbered mt-2">
        <div class="bs-stepper-header">
            <div class="step" data-target="#building-info">
                <button type="button" id="getFirstPage" class="step-trigger">
                    <span class="bs-stepper-circle">1</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">{{__('add-property.Building Info')}}</span>
                </button>
            </div>
            <div class="line">
                <i class="ti ti-chevron-right"></i>
            </div>
            <div class="step" data-target="#landlord-details">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">{{__('add-property.Landlord Details')}}</span>
                    </span>

                </button>
            </div>
            <div class="line">
                <i class="ti ti-chevron-right"></i>
            </div>
            <div class="step" data-target="#ftod">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle">3</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">{{__('add-property.FTOD')}}</span>
                    </span>
                </button>
            </div>
            <div class="line">
                <i class="ti ti-chevron-right"></i>
            </div>
            <div class="step" data-target="#size-price">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle">4</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">{{__('add-property.Size/Price')}}</span>
                    </span>
                </button>
            </div>

        </div>
        <div class="bs-stepper-content px-0">
            <form id="createProperty">
                <!-- Building Info -->
                <div id="building-info" class="content px-3">
                    <div class="content-header mb-3">
                        <h6 class="mb-0">{{__('add-property.Building Info')}}</h6>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" id="code" name="code" class="form-control"
                                placeholder="{{ __('add-property.Code') }}" />
                            <span class="text-danger" style="display: none"
                                id="code_msg">{{ __('add-property.Code Already Exists') }}</span>
                        </div>
                        <div class="col-md-6">
                            <select id="district" name="district" class="form-control">
                                <option value="">{{ __('add-property.District') }}</option>
                                @foreach($options as $type)
                                    @if($type->opt_type == 'district')
                                       <option value="{{$type->code}}">{{$type->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div> 
                        <div class="col-md-12">
                            <select id="building_name" name="building_name" class="select2" data-placeholder="{{ __('add-property.Building Name') }}" class="form-select">
                                <option value=""></option>
                                @if(!empty($properties))  
                                    @foreach($properties as $property)  
                                    <option value="{{$property->building}}">{{$property->building}}</option>
                                    @endforeach
                                @endif
                            </select>
                        <span class="text-danger" style="display: none" id="building_name_msg"></span>
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="address" name="address" class="form-control"
                                placeholder="{{ __('add-property.Addsress') }}" />
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="year" name="year" class="form-control"
                                placeholder="{{ __('add-property.Year') }}" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="block" name="block" class="form-control"
                                placeholder="{{ __('add-property.Block') }}" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="floor" name="floor" class="form-control"
                                placeholder="{{ __('add-property.Floor') }}" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="flat" name="flat" class="form-control"
                                placeholder="{{ __('add-property.Flat') }}" />
                        </div>
                        <div class="col-md-6">
                            <input type="number" id="no_rooms" name="no_rooms" class="form-control"
                                placeholder="{{ __('add-property.No. of Rooms') }}" value="0" min="0" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="cargo_lift" name="cargo_lift" class="form-control"
                                placeholder="{{ __('add-property.Cargo Lift') }}" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="customer_lift" name="customer_lift" class="form-control"
                                placeholder="{{ __('add-property.Customer Lift') }}" />
                        </div>
                        <div class="col-md-6">
                            <label class="mx-1">24 Hours</label>
                            <select id="tf_hr" name="tf_hr" class="form-control">
                                <option value="yes">{{ __('add-property.Yes') }}</option>
                                <option value="no">{{ __('add-property.No') }}</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-password-toggle">
                            <div class="input-group input-group-merge">
                                <input type="password" id="entry_password" name="entry_password" class="form-control"
                                    placeholder="{{ __('add-property.Entry Password') }}" />
                                <span class="input-group-text cursor-pointer" id="password2"><i
                                        class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group">
                                <textarea type="text" id="comment" name="comment" class="form-control"
                                    placeholder="{{ __('add-property.Agent Comment') }}"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                         <label class="mb-2">Building Images</label>
                            <div class="border p-2">
                                <div class="dz-message needsclick my-5">
                                    Drop Images here or click to upload
                                    <span class="note needsclick">(Click to upload property iamges)</span>
                                </div>
                                <div id="uploadedImages"></div>
                                <div class="fallback">
                                    <input name="file" accept="image/*" type="file" />
                                </div>
                            </div>
                        </div>


                        <div class="col-12 d-flex justify-content-between">
                            <button class="btn btn-label-secondary btn-prev" type="button" disabled> <i
                                    class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span
                                    class="align-middle d-sm-inline-block d-none">{{ __('add-property.Previous') }}</span>
                            </button>
                            <button class="btn btn-primary btn-next" type="button"> <span
                                    class="align-middle d-sm-inline-block d-none me-sm-1">{{ __('add-property.Next') }}</span>
                                <i class="ti ti-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                <!-- Landlord Details -->
                <div id="landlord-details" class="content px-3">
                    <div class="content-header mb-3">
                        <h6 class="mb-0">{{__('add-property.Landlord Details')}}</h6>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" id="contact_1" name="contact_1" class="form-control"
                                placeholder="{{ __('add-property.Contact 1') }}" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="number_1" name="number_1" class="form-control"
                                placeholder="{{ __('add-property.Number 1') }}" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="contact_2" name="contact_2" class="form-control"
                                placeholder="{{ __('add-property.Contact 2') }}" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="number_2" name="number_2" class="form-control"
                                placeholder="{{ __('add-property.Number 2') }}" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="contact_3" name="contact_3" class="form-control"
                                placeholder="{{ __('add-property.Contact 3') }}" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="number_3" name="number_3" class="form-control"
                                placeholder="{{ __('add-property.Number 3') }}" />
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="landlord_name" name="landlord_name" class="form-control"
                                placeholder="{{ __('add-property.Landlord Name') }}" />
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="bank" name="bank" class="form-control"
                                placeholder="{{ __('add-property.Bank') }}" />
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="bank_acc" name="bank_acc" class="form-control"
                                placeholder="{{ __('add-property.Bank Account') }}" />
                        </div>
                        <div class="col-md-12">
                            <textarea type="text" id="remark" name="remark" class="form-control"
                                placeholder="{{ __('add-property.Remark') }}"></textarea>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                            <button class="btn btn-label-secondary btn-prev" type="button"> <i
                                    class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span
                                    class="align-middle d-sm-inline-block d-none">{{ __('add-property.Previous') }}</span>
                            </button>
                            <button class="btn btn-primary btn-next" type="button"> <span
                                    class="align-middle d-sm-inline-block d-none me-sm-1">{{ __('add-property.Next') }}</span>
                                <i class="ti ti-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                <!-- FTOD -->
                <div id="ftod" class="content">
                    <div class="content-header mb-3 px-3">
                        <h6 class="mb-0">{{__('add-property.FTOD')}}</h6>
                    </div>
                    <div class="row g-3 px-3">
                        <div class="col-md-12">
                            <label class="mx-1">{{__('add-property.Facilities')}}</label>
                            <select id="facilities" class="select2" data-placeholder="{{__('add-property.Select Facilities')}}" multiple>
                                @foreach($options as $facility)
                                    @if($facility->opt_type == 'facility')
                                      <option value="{{$facility->name}}">{{$facility->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="mx-1">{{__('add-property.Types')}}</label>
                            <select id="types" class="select2" data-placeholder="Select Types" multiple="" class="form-select">
                                @foreach($options as $type)
                                    @if($type->opt_type == 'type')
                                       <option value="{{$type->name}}">{{$type->name}}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-12">
                            <label class="mx-1">{{__('add-property.Decoration')}}</label>
                            <select id="decoration" class="select2" data-placeholder="{{ __('add-property.Select Decoration') }}"
                                multiple="multiple" class="form-select">
                                @foreach($options as $decoration)
                                    @if($decoration->opt_type == 'decoration')
                                       <option value="{{$decoration->name}}">{{$decoration->name}}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <hr class="mt-3 mb-0">

                    <div class="row px-3">
                        <div class="col-md-3 py-2">
                            <h6 class="mb-1">{{__('add-property.Options')}}</h6>
                            <input type="checkbox" name="others[NewSite]" value="New Site" id="NewSite"
                                data-id="NewSite" class="form-check-input optionsTabCheck" checked>
                            <span>{{__('add-property.New Site')}}</span><br>
                            <input type="checkbox" name="others[Bargain]" value="Bargain" data-id="Bargain"
                                class="form-check-input optionsTabCheck">
                            <span>{{__('add-property.Bargain')}}</span><br>
                            <input type="checkbox" name="others[Discounted]" value="Discounted" data-id="Discounted"
                                class="form-check-input optionsTabCheck">
                            <span>{{__('add-property.Discounted')}}</span><br>
                            <input type="checkbox" name="others[Recommend]" value="Recommend" data-id="Recommend"
                                class="form-check-input optionsTabCheck">
                            <span>{{__('add-property.Recommend')}}</span><br>
                            <input type="checkbox" name="others[ReadyToListing]" value="Ready To Listing"
                                data-id="ReadyToListing" class="form-check-input optionsTabCheck">
                            <span>{{__('add-property.Ready to listing')}}</span><br>
                            <input type="checkbox" name="others[NewReleased]" value="New Released" data-id="NewReleased"
                                class="form-check-input optionsTabCheck">
                            <span>{{__('add-property.New Released')}}</span><br>
                        </div>
                        <div class="col-md-9 py-2 border-start">
                            <div class="d-flex mb-2">
                                <button data-tab="NewSite" type="submit"
                                    class="optionsTab btn btn-sm btn-primary me-2">{{__('add-property.New Site')}}</button>
                                <button data-tab="Bargain" type="button"
                                    class="d-none optionsTab btn btn-sm btn-primary me-2">{{__('add-property.Bargain')}}</button>
                                <button data-tab="Discounted" type="button"
                                    class="d-none optionsTab btn btn-sm btn-primary me-2">{{__('add-property.Discounted')}}</button>
                                <button data-tab="Recommend" type="button"
                                    class="d-none optionsTab btn btn-sm btn-primary me-2">{{__('add-property.Recommend')}}</button>
                                <button data-tab="ReadyToListing" type="button"
                                    class="d-none optionsTab btn btn-sm btn-primary me-2">{{__('add-property.Ready to listing')}}</button>
                                <button data-tab="NewReleased" type="button"
                                    class="d-none optionsTab btn btn-sm btn-primary me-2">{{__('add-property.New Released')}}</button>
                            </div>
                            <div id="optionContent">
                                <div id="NewSiteContent">
                                    <h6 class="my-2">{{__('add-property.New Site')}}</h6>
                                    <label class="form-label">{{ __('add-property.Date') }}</label>
                                    <input type="text" id="others_date[NewSite]" name="others_date[NewSite]"
                                        class="form-control  datetime-input">
                                    <label class="form-label">{{ __('add-property.Detail') }}</label>
                                    <textarea name="others_details[NewSite]" id="others_details[NewSite]"
                                        class="form-control" cols="5"></textarea>
                                </div>
                                <div id="BargainContent" style="display: none">
                                    <h6 class="my-2">{{__('add-property.Bargain')}}</h6>
                                    <label class="form-label">{{ __('Date') }}</label>

                                    <input type="datetime-local" name="others_date[Bargain]" id="others_date[Bargain]"
                                        class="form-control datetime-input">
                                    <label class="form-label">{{ __('add-property.Detail') }}</label>
                                    <textarea name="others_details[Bargain]" class="form-control" cols="5"></textarea>
                                </div>
                                <div id="DiscountedContent" style="display: none">
                                    <h6 class="my-2">{{__('add-property.Discounted')}}</h6>

                                    <label class="form-label">{{ __('add-property.Date') }}</label>

                                    <input type="datetime-local" name="others_date[Discounted]"
                                        id="others_date[Discounted]" class="form-control datetime-input">
                                    <label class="form-label">{{ __('add-property.Detail') }}</label>
                                    <textarea name="others_details[Discounted]" class="form-control"
                                        cols="5"></textarea>
                                </div>
                                <div id="RecommendContent" style="display: none">
                                    <h6 class="my-2">{{__('add-property.Recommend')}}</h6>

                                    <label class="form-label">{{ __('add-property.Date') }}</label>

                                    <input type="datetime-local" name="others_date[Recommend]"
                                        id="others_date[Recommend]" class="form-control datetime-input">
                                    <label class="form-label">{{ __('add-property.Detail') }}</label>
                                    <textarea name="others_details[Recommend]" class="form-control" cols="5"></textarea>
                                </div>
                                <div id="ReadyToListingContent" style="display: none">
                                    <h6 class="my-2">{{__('add-property.Ready to listing')}}</h6>

                                    <label class="form-label">{{ __('add-property.Date') }}</label>

                                    <input type="datetime-local" name="others_date[ReadyToListing]"
                                        id="others_date[ReadyToListing]" class="form-control datetime-input">
                                    <label class="form-label">{{ __('add-property.Detail') }}</label>
                                    <textarea name="others_details[ReadyToListing]" class="form-control"
                                        cols="5"></textarea>
                                </div>
                                <div id="NewReleasedContent" style="display: none">
                                    <h6 class="my-2">{{__('add-property.New Released')}}</h6>

                                    <label class="form-label">{{ __('add-property.Date') }}</label>

                                    <input type="datetime-local" name="others_date[NewReleased]"
                                        id="others_date[NewReleased]" class="form-control datetime-input">
                                    <label class="form-label">{{ __('add-property.Detail') }}</label>
                                    <textarea name="others_details[NewReleased]" class="form-control"
                                        cols="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-0 mb-3">
                    <div class="row px-3">
                        <div class="col-12 d-flex justify-content-between">
                            <button class="btn btn-label-secondary btn-prev" type="button">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span
                                    class="align-middle d-sm-inline-block d-none">{{ __('add-property.Previous') }}</span>
                            </button>
                            <button class="btn btn-primary btn-next" type="button">
                                <span
                                    class="align-middle d-sm-inline-block d-none me-sm-1">{{ __('add-property.Next') }}</span>
                                <i class="ti ti-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Size/Price -->
                <div id="size-price" class="content">
                    <div class="content-header mb-3 px-3">
                        <h6 class="mb-0">{{__('add-property.Size/Price')}}</h6>
                    </div>
                    <div class="row g-3 px-3">
                        <div class="col-md-6">
                            <label class="form-label" for="twitter">{{ __('add-property.Gross sf:') }}</label>
                            <input type="number" required value='0.00' id="gross-sf" name="gross-sf"
                                class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="facebook">{{ __('add-property.Net sf:') }}</label>
                            <input type="number" required value='0.00' id="net-sf" name="net-sf" class="form-control" />
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="google">{{ __('add-property.Selling Price (M):') }}</label>
                            <input type="number" required value='0.00' id="selling-price" name="selling-price"
                                class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="twitter">{{ __('add-property.G@') }}</label>
                            <input type="number" required value='0.00' id="selling-gross" disabled name="selling-gross"
                                class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="facebook">{{ __('add-property.N@') }}</label>
                            <input type="number" required value='0.00' id="selling-net" disabled name="selling-net"
                                class="form-control" />
                        </div>
                    </div>
                    <hr>
                    <div class="row px-3">
                        <div class="col-md-12">
                            <label class="form-label" for="google">{{ __('add-property.Rental Price:')}}</label>
                            <input type="number" required value="0.00" id="rental-price" name="rental-price"
                                class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="twitter">{{ __('add-property.G@') }}</label>
                            <input type="number" required value="0.00" id="rental-gross" disabled name="rental-gross"
                                class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="facebook">{{ __('add-property.N@') }}</label>
                            <input type="number" required value="0.00" id="rental-net" disabled name="rental-net"
                                class="form-control" />
                        </div>
                    </div>
                    <hr>
                    <div class="row px-3">
                        <div class="col-md-6">
                            <label class="form-label" for="facebook">{{ __('add-property.Mgmf:') }}</label>
                            <input type="number" id="mgmf" name="mgmf" value="0.00" required class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="facebook">{{ __('add-property.Rate:') }}</label>
                            <input type="number" id="rate" name="rate" value="0.00" required class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="facebook">{{ __('add-property.Land:') }}</label>
                            <input type="number" id="land" name="land" value="0.00" required class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="facebook">{{ __('add-property.Oths:') }}</label>
                            <input type="number" id="oths" name="oths" value="0.00" required class="form-control" />
                        </div>
                        <div class="col-12 d-flex justify-content-between mt-3">
                            <button class="btn btn-label-secondary btn-prev" type="button"> <i
                                    class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span
                                    class="align-middle d-sm-inline-block d-none">{{ __('add-property.Previous') }}</span>
                            </button>
                            <button type="submit" id="AddProperty"
                                class="btn btn-success btn-submit">{{ __('add-property.Submit') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('script')

<script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>

@include('content/properties/js/add-property-js')

<script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{ asset('assets/vendor/libs/%40form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{ asset('assets/vendor/libs/%40form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{ asset('assets/vendor/libs/%40form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
<script src="{{ asset('assets/js/form-wizard-numbered.js')}}"></script>

<script>


</script>
@endsection
