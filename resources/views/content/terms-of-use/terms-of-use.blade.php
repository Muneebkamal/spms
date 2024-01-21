@extends('layouts.app')

@section('title', 'Term Of Use')

@section('content')
<div class="card">
<h3 class="d-flex justify-content-start my-3 px-3 border-bottom">Terms & Conditions</h3>
<div class="card-body pt-0">
<div class="font-weight-bold">
    <div class="d-flex">
        <i class="ti ti-shield-lock mx-2"></i>
        <p>{{__('term-of-use.term of use line 1')}}</p>
    </div>
    <div class="d-flex">
        <i class="ti ti-address-book-off mx-2"></i>
        <p>{{__('term-of-use.term of use line 2')}}</p>
    </div>
    <div class="d-flex">
        <i class="ti ti-file-certificate mx-2"></i>
        <p>{{__('term-of-use.term of use line 3')}}</p>
    </div>
        <ol type="i" class="mx-4">
            <li>{{__('term-of-use.term of use line 4')}}</li>
            <li>{{__('term-of-use.term of use line 5')}}</li>
            <li>{{__('term-of-use.term of use line 6')}}</li>
        </ol>
    <div class="d-flex">
        <i class="ti ti-mouse-off mx-2"></i>
        <p>{{__('term-of-use.term of use line 7')}}</p>
    </div>    
    <div class="d-flex">
        <i class="ti ti-speakerphone mx-2"></i>
        <p>{{__('term-of-use.term of use line 8')}}</p>
    </div>
    <div class="d-flex">
        <i class="ti ti-ear mx-2"></i>
        <p>{{__('term-of-use.term of use line 9')}}</p>
    </div>
    <div class="d-flex">
        <i class="ti ti-gavel mx-2"></i>
        <p>{{__('term-of-use.term of use line 10')}}</p>
    </div>
</div>
</div>
</div>
@endsection