@extends('layouts.app')

@section('title', 'Property List')

@section('script')
<script></script>
@endsection

@section('content')
<div class="row mb-5">
    <div class="col-12">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-2" style="
                    background-image: url(../../assets/img/elements/9.jpg);
                    background-size: cover;
                ">
                </div>
                <div class="col-md-10">
                    <div class="card-body pe-4 me-1 p-0">
                        <div class="row">
                            <div class="d-flex ms-3 col-12 justify-content-between border-bottom">
                                <div class="flex-column py-3 d-flex">
                                    <h5 class="mb-0">美德工業大廈</h5>
                                    <h6 class="mb-0">Code: 23dda</h6>
                                </div>

                                <div class="border-start p-3">
                                    <div class="row">
                                        <div class="col-6 d-flex">
                                            <span class="text-muted me-2">District:</span>
                                            <p class="mb-0 me-2">kt 423</p>
                                        </div>
                                        <div class="col-6 d-flex">
                                            <span class="text-muted me-2">Flat:</span>
                                            <p class="mb-0 me-2">3</p>
                                        </div>
                                        <div class="col-6 d-flex">
                                            <span class="text-muted me-2">Block:</span>
                                            <p class="mb-0 me-2">A</p>
                                        </div>
                                        <div class="col-6 d-flex">
                                            <span class="text-muted me-2">Floor:</span>
                                            <p class="mb-0 me-2">5</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-7">
                                <div class="row me-2">
                                    <div class="d-flex ms-3 col-12 py-1 border-bottom">
                                        <span class="text-muted me-2">Facilities:</span>
                                        <p class="mb-0">Carpark 車場, H.celling高樓底, Sunlight 揚窗, Toilet 內厠, Heater 熱水爐</p>
                                    </div>
                                    <div class="d-flex ms-3 col-12 py-1 border-bottom">
                                        <span class="text-muted me-2">Decoration:</span>
                                        <p class="mb-0">Rent 放租, Subdivided 分間</p>
                                    </div>
                                    <div class="d-flex ms-3 col-12 py-1">
                                        <span class="text-muted me-2">Types:</span>
                                        <p class="mb-0">dasd,dasds</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 border-start">
                                <div class="row pt-2">
                                    <div class="col-6 d-flex">
                                        <span class="text-muted me-2">Gross SF:</span>
                                        <p class="mb-0">1231</p>
                                    </div>
                                    <div class="col-6 d-flex">
                                        <span class="text-muted me-2">Net SF:</span>
                                        <p class="mb-0">1231</p>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12 d-flex">
                                                <span class="text-muted me-2">Selling Price:</span>
                                                <p class="mb-0">1231</p>
                                            </div>
                                            <div class="col-12 d-flex">
                                                <span class="text-muted me-2">Selling G@:</span>
                                                <p class="mb-0">1231</p>
                                            </div>
                                            <div class="col-12 d-flex">
                                                <span class="text-muted me-2">Selling N@:</span>
                                                <p class="mb-0">1231</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12 d-flex">
                                                <span class="text-muted me-2">Rental Price:</span>
                                                <p class="mb-0">1231</p>
                                            </div>
                                            <div class="col-12 d-flex">
                                                <span class="text-muted me-2">Rental G@:</span>
                                                <p class="mb-0">1231</p>
                                            </div>
                                            <div class="col-12 d-flex">
                                                <span class="text-muted me-2">Rental N@:</span>
                                                <p class="mb-0">1231</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 px-3 mx-3 py-2 border-top">
                                oths
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    #map,
    #map2 {
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
