@extends('layouts.app')

@section('title', 'Admin Search')

@section('script')
    @include('content.properties.admin-search.js.admin-search-js')
@endsection

@section('content')
<div class="card p-4">
<h3 class="mb-1">Landlord Information</h3>
<h5 class="text-muted">(0 views used today)</h5>
    <form id="myForm" method="GET">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-between">
                <div class="rent">
                    <input type="checkbox" id="rent" name="type[]" value="Rent 放租" class="form-check-input">
                    <label>Rent 放租</label>
                </div>
                <div class="sales">    
                    <input type="checkbox" id="sales" name="type[]" value="Sales 放售" class="form-check-input">
                    <label>Sales 放售</label>
                </div>
                <div class="independent">    
                    <input type="checkbox" id="independent" name="type[]" value="Independent 獨立單位" class="form-check-input">
                    <label>Independent 獨立單位</label>
                </div>
                <div class="sub-divided">    
                    <input type="checkbox" id="sub-divided" name="type[]" value="Subdivided 分間" class="form-check-input">
                    <label>Subdivided 分間</label>
                </div>    
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-8">
                <input type="text" class="form-control" id="building-keyword" name="building_name" placeholder="{{__('Enter Building Name or Keyword')}}">    
            </div>
            <div class="col-md-4">
                <select id="all-keywords" name="district[]" class="form-select select2" multiple>
                    @foreach($options as $type)
                        @if($type->opt_type == 'district')
                           <option value="{{$type->code}}" {{ !empty($_GET['district']) && $_GET['district'] == $type->code ? 'selected':''}}>{{$type->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            {{-- <div class="col-md-12 mt-2">
                <label for="contact">{{__('Contact')}}</label>
                <input type="text" class="form-control" id="contact" name="contact" placeholder="{{__('Enter Contact Number')}}">
            </div> --}}
            <div class="col-md-12 mt-2">
                <label>{{__('Facilities')}}</label>
                <select id="facilities" name="facility[]" class="form-select select2" multiple>
                <option value=""></option>
                @foreach($options as $facility)
                    @if($facility->opt_type == 'facility')
                      <option value="{{$facility->name}}" {{ !empty($_GET['facility']) && $_GET['facility'] == $facility->name ? 'selected':''}}>{{$facility->name}}</option>
                    @endif
                @endforeach
                </select>
            </div>
            <div class="col-md-12 mt-2">
                <label>{{__('Types')}}</label>
                <select id="types" name="type[]" class="form-select select2" multiple>
                    <option value=""></option>
                @foreach($options as $type)
                    @if($type->opt_type == 'type')
                       <option value="{{$type->name}}" {{ !empty($_GET['type']) && $_GET['type'] == $type->name ? 'selected':''}}>{{$type->name}}</option>
                    @endif
                @endforeach
                </select>

            </div>
            <div class="col-md-12 mt-2">
                <label>{{__('Decoration')}}</label>
                <select id="decoration" name="decoration[]"
                    class="form-select select2" multiple>
                    <option value=""></option>
                @foreach($options as $decoration)
                    @if($decoration->opt_type == 'decoration')
                       <option value="{{$decoration->name}}" {{ !empty($_GET['decoration']) && $_GET['decoration'] == $decoration->name ? 'selected':''}}>{{$decoration->name}}</option>
                    @endif
                @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-4">
                <h4>{{__('Options')}}</h4>
            </div>
            <div class="col-md-6">
                <input type="checkbox" id="new-site" name="other[]" value="New site新場" class="form-check-input">
                <label for="">{{__('New site新場')}}</label>
            </div>
            <div class="col-md-6">
                <input type="checkbox" id="bargain" name="other[]" value="Bargain 筍盤" class="form-check-input">
                <label for="">{{__('Bargain 筍盤')}}</label>
            </div>
            <div class="col-md-6 mt-1">
                <input type="checkbox" id="discounted" name="other[]" value="Discounted 減價中" class="form-check-input">
                <label for="">{{__('Discounted 減價中')}}</label>
            </div>
            <div class="col-md-6 mt-1">
                <input type="checkbox" id="recommend" name="other[]" value="Recommend 推薦" class="form-check-input">
                <label for="">{{__('Recommend 推薦')}}</label>
            </div>
            <div class="col-md-6 mt-1">
                <input type="checkbox" id="ready-to-list" name="other[]" value="Ready to listing 就吉" class="form-check-input">
                <label for="">{{__('Ready to listing 就吉')}}</label>
            </div>
            <div class="col-md-6 mt-1">
                <input type="checkbox" id="new-released" name="other[]" value="New Released 剛吉" class="form-check-input">
                <label for="">{{__('New Released 剛吉')}}</label>
            </div>
        </div>
        <div class="row mt-3 d-flex">
            <div class="col-md-6">
                <div id="buttons">
                    <button class="btn btn-success saveCustomer_processing d-none" disabled>Processing ...</button>
                    <button class="btn btn-success saveCustomers_sve_btn">{{__('Search')}}</button>
                    <button class="btn btn-danger">{{__('Clear')}}</button>
                </div>    
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button class="btn btn-primary" type="button" id="price-btn">{{__('Price & Size')}}</button>
            </div>
        </div>

        <div class="row py-4" id="price-size">
            <div class="col-md-12"> 
                <label for="gross">{{__('Gross')}}</label>
            </div>
            <div class="col-md-6">
                <input type="number" id="gross" name="gross" class="form-control" placeholder="{{__('From')}}">
            </div>
            <div class="col-md-6">
                <input type="number" id="gross-1" name="gross-1" class="form-control" placeholder="{{__('To')}}">
            </div>
            <div class="col-md-12">
                <label for="net">{{__('Net')}}</label>
            </div>
            <div class="col-md-6">
                <input type="number" id="net" name="net" class="form-control" placeholder="{{__('From')}}">
            </div>
            <div class="col-md-6">
                <input type="number" id="net-1" name="net-1" class="form-control" placeholder="{{__('To')}}">
            </div>
            <div class="col-md-12">
                <label for="selling">{{__('Selling')}}</label>
            </div>
            <div class="col-md-6">
                <input type="number" id="selling" name="selling" class="form-control" placeholder="{{__('From')}}">
            </div>
            <div class="col-md-6">
                <input type="number" id="selling-1" name="selling-1" class="form-control" placeholder="{{__('To')}}">
            </div>
            <div class="col-md-12">
                <label for="rental">{{__('Rental')}}</label>
            </div>
            <div class="col-md-6">
                <input type="number" id="rental" name="rental" class="form-control" placeholder="{{__('From')}}">
            </div>
            <div class="col-md-6">
                <input type="number" id="rental-1" name="rental-1" class="form-control" placeholder="{{__('To')}}">
            </div>
    
            <div class="col-md-12 mt-3">
                <button class="btn btn-success" type="submit">{{__('Search')}}</button>
                <button class="btn btn-danger">{{__('Clear')}}</button>
            </div>
        </div>
    </form> 
    <div id="fetchProperty" style="height: 500px;overflow:scroll;overflow-x:hidden">
        
    </div>
</div>
@endsection