@extends('layouts.app')

@section('title', 'Online Form')

@section('content')
<div class="row gy-4 mb-4">
    <div class="col-lg-6">
        <div class="card bg-label-danger h-100">
            <div class="card-body d-flex justify-content-between">
                <div
                    class="mb-0 w-100 app-academy-sm-60 d-flex flex-column justify-content-between text-center text-sm-start">
                    <div class="card-title">
                        <h4 class="text-danger mb-2">Best Rated Courses</h4>
                        <p class="text-body app-academy-sm-60 app-academy-xl-100">
                            Enroll now in the most popular and best rated courses.
                        </p>
                    </div>
                    <div class="mb-0"><button class="btn btn-danger">Fill Form</button></div>
                </div>
                <div
                    class="w-100 app-academy-sm-40 d-flex justify-content-center justify-content-sm-end h-px-150 mb-3 mb-sm-0">
                    <img class="img-fluid scaleX-n1-rtl"
                        src="{{asset('assets/img/illustrations/girl-app-academy.png')}}" alt="girl illustration" />
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card bg-label-info h-100">
            <div class="card-body d-flex justify-content-between">
                <div
                    class="mb-0 w-100 app-academy-sm-60 d-flex flex-column justify-content-between text-center text-sm-start">
                    <div class="card-title">
                        <h4 class="text-info mb-2">Earn a Certificate</h4>
                        <p class="text-body w-sm-80 app-academy-xl-100">
                            Get the right professional certificate program for you.
                        </p>
                    </div>
                    <div class="mb-0"><button class="btn btn-info">Fill Form</button></div>
                </div>
                <div
                    class="w-100 app-academy-sm-40 d-flex justify-content-center justify-content-sm-end h-px-150 mb-3 mb-sm-0">
                    <img class="img-fluid scaleX-n1-rtl" style="background-color:#00bad145"
                        src="{{asset('assets/img/default-imgs/building-1.png')}}" alt="boy illustration" />
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card bg-label-primary h-100">
            <div class="card-body d-flex justify-content-between">
                <div
                    class="mb-0 w-100 app-academy-sm-60 d-flex flex-column justify-content-between text-center text-sm-start">
                    <div class="card-title">
                        <h4 class="text-primary mb-2">Earn a Certificate</h4>
                        <p class="text-body w-sm-80 app-academy-xl-100">
                            Get the right professional certificate program for you.
                        </p>
                    </div>
                    <div class="mb-0"><button class="btn btn-primary">Fill Form</button></div>
                </div>
                <div
                    class="w-100 app-academy-sm-40 d-flex justify-content-center justify-content-sm-end h-px-150 mb-3 mb-sm-0">
                    <img class="img-fluid scaleX-n1-rtl" src="{{asset('assets/img/illustrations/boy-app-academy.png')}}"
                        alt="boy illustration" />
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card bg-label-warning h-100">
            <div class="card-body d-flex justify-content-between">
                <div
                    class="mb-0 w-100 app-academy-sm-60 d-flex flex-column justify-content-between text-center text-sm-start">
                    <div class="card-title">
                        <h4 class="text-warning mb-2">Best Rated Courses</h4>
                        <p class="text-body app-academy-sm-60 app-academy-xl-100">
                            Enroll now in the most popular and best rated courses.
                        </p>
                    </div>
                    <div class="mb-0"><button class="btn btn-warning">Fill Form</button></div>
                </div>
                <div
                    class="w-100 app-academy-sm-40 d-flex justify-content-center justify-content-sm-end h-px-150 mb-3 mb-sm-0">
                    <img style="background-color:#e68f3c45" class="img-fluid scaleX-n1-rtl"
                        src="{{asset('assets/img/default-imgs/building-2.png')}}" alt="girl illustration" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
