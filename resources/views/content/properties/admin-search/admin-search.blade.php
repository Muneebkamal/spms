@extends('layouts.app')

@section('title', 'Admin Search')

@section('script')
    @include('content.properties.admin-search.js.admin-search-js')
@endsection

@section('content')
<div class="card p-4">
<h3 class="mb-1">Landlord Information</h3>
<h5 class="text-muted">(0 views used today)</h5>
    <form action="">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-between">
                <div class="rent">
                    <input type="checkbox" id="rent" name="rent" class="form-check-input">
                    <label>Rent</label>
                </div>
                <div class="sales">    
                    <input type="checkbox" id="sales" name="sales" class="form-check-input">
                    <label>Sales</label>
                </div>
                <div class="independent">    
                    <input type="checkbox" id="independent" name="independent" class="form-check-input">
                    <label>Independent</label>
                </div>
                <div class="sub-divided">    
                    <input type="checkbox" id="sub-divided" name="sub-divided" class="form-check-input">
                    <label>Sub divided</label>
                </div>    
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-8">
                <input type="text" class="form-control" id="building-keyword" name="building-keyword" placeholder="{{__('Enter Building Name or Keyword')}}">    
            </div>
            <div class="col-md-4">
                <select id="all-keywords" class="form-select">
                    <option value="all">All</option>
                    <option value="">jfhsj</option>
                    <option value="">fnsjfhkl</option>
                    <option value="">jhsdkjf</option>
                </select>
            </div>
            <div class="col-md-12 mt-2">
                <label for="contact">{{__('Contact')}}</label>
                <input type="text" class="form-control" id="contact" name="contact" placeholder="{{__('Enter Contact Number')}}">
            </div>
            <div class="col-md-12 mt-2">
                <label>{{__('Facilities')}}</label>
                <select id="facilities" class="form-select">
                    <option value="Carpark 車場">Carpark 車場</option>
                    <option value="Convenient 近地鐵">Convenient 近地鐵</option>
                    <option value="H.celling高樓底">H.celling 高樓底</option>
                    <option value="Lobby 冷氣大堂">Lobby 冷氣大堂</option>
                    <option value="Sunlight 揚窗">Sunlight 揚窗</option>
                    <option value="Toilet 內厠">Toilet 內厠</option>
                    <option value="Heater 熱水爐">Heater 熱水爐</option>
                    <option value="Sink 鋅盤">Sink 鋅盤</option>
                    <option value="Electrical 大電">Electrical 大電</option>
                    <option value="Wide door 闊門">Wide door 闊門</option>
                    <option value="Ekey 密碼鎖">Ekey 密碼鎖</option>
                    <option value="Bricked 磗牆">Bricked 磗牆</option>
                    <option value="Free wifi 送上網">Free wifi 送上網</option>
                    <option value="Room 有房">Room 有房</option>
                    <option value="Roof bal天台露台">Roof bal天台露台</option>
                    <option value="Shop 店舖">Shop 店舖</option>
                </select>
            </div>
            <div class="col-md-12 mt-2">
                <label>{{__('Types')}}</label>
                <select id="types" class="form-select">
                    <option value="Rent 放租">Rent 放租</option>
                    <option value="Sales 放售">Sales 放售</option>
                    <option value="Subdivided 分間">Subdivided 分間</option>
                    <option value="Independent 獨立單位">Independent 獨立單位</option>
                    <option value="Development 發展商">Development 發展商</option>
                    <option value="Office 寫字樓">Office 寫字樓</option>
                    <option value="Warehouse 倉庫">Warehouse 倉庫</option>
                    <option value="Overnight 過夜">Overnight 過夜</option>
                    <option value="Upstairs shop 樓上舖">Upstairs shop 樓上舖</option>
                    <option value="Party room 派對房">Party room 派對房</option>
                    <option value="Band 夾">Band 夾</option>
                    <option value="Class 有聲教班">Class 有聲教班</option>
                    <option value="Class 一般教班">Class 一般教班</option>
                    <option value="Bakery 烘焙">Bakery 烘焙</option>
                    <option value="Photos 攝影">Photos 攝影</option>
                </select>

            </div>
            <div class="col-md-12 mt-2">
                <label>{{__('Decoration')}}</label>
                <select id="decoration"
                    class="form-select">
                    <option value="budget">Budget</option>
                    <option value="basic">Basic</option>
                    <option value="luxury">Luxury</option>
                    <option value="classic">Classic</option>
                    <option value="chill">Chill</option>
                    <option value="grand">Grand</option>
                    <option value="modern">Modern</option>
                    <option value="premium">Premium</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-4">
                <h4>{{__('Options')}}</h4>
            </div>
            <div class="col-md-6">
                <input type="checkbox" id="new-site" name="new-site" class="form-check-input">
                <label for="">{{__('New Site')}}</label>
            </div>
            <div class="col-md-6">
                <input type="checkbox" id="bargain" name="bargain" class="form-check-input">
                <label for="">{{__('Bargain')}}</label>
            </div>
            <div class="col-md-6 mt-1">
                <input type="checkbox" id="discounted" name="discounted" class="form-check-input">
                <label for="">{{__('Discounted')}}</label>
            </div>
            <div class="col-md-6 mt-1">
                <input type="checkbox" id="recommend" name="recommend" class="form-check-input">
                <label for="">{{__('Recommend')}}</label>
            </div>
            <div class="col-md-6 mt-1">
                <input type="checkbox" id="ready-to-list" name="ready-to-list" class="form-check-input">
                <label for="">{{__('Ready to listing')}}</label>
            </div>
            <div class="col-md-6 mt-1">
                <input type="checkbox" id="new-released" name="new-released" class="form-check-input">
                <label for="">{{__('New Released')}}</label>
            </div>
        </div>
        <div class="row mt-3 d-flex">
            <div class="col-md-6">
                <div id="buttons">
                    <button class="btn btn-success">{{__('Search')}}</button>
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
                <button class="btn btn-success">{{__('Search')}}</button>
                <button class="btn btn-danger">{{__('Clear')}}</button>
            </div>
        </div>
    </form> 
    
    
</div>
@endsection