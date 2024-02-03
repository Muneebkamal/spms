@extends('layouts.app')

@section('title', 'Property List')

@section('script')
@include('content.properties.js.property-list-js')
<script>
    $(document).ready(function () {
        $('.delete').on('click', function () {
            code = $(this).data('code')
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route("delete-property", ["code" => ":code"]) }}'.replace(
                            ':code', code),
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (data) {
                            if (data.success) {
                                Swal.fire('Deleted!', 'The agent has been deleted.',
                                    'success');
                                $('tr[data-code="' + code + '"]').remove();
                                $('.row[data-code="' + code + '"]').remove();
                            }
                        },
                        error: function (e) {
                            console.error(e);
                        }
                    });
                }
            });
        })
    })

</script>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <h4 class="m-3 property-list">Properties</h4>
        <!-- <h4 class="m-3 property-table" style="display: none">Property Table</h4> -->
    </div>
    <!-- <div class="col-md-6 d-flex justify-content-end my-3 px-4">
        <span class="bg-primary text-white" id="list" title="List">
            <i class="ti ti-list m-1 fs-2"></i>
        </span>
        <span id="table" title="Table">
            <i class="ti ti-border-all m-1 fs-2"></i>
        </span>
    </div> -->
</div>
{{-- <div class="property-list">
    @forelse($properties as $property)
    <div class="row" data-code="{{ $property->code }}">
        <div class="col-md">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-2">
                        @if ($property->photos->isNotEmpty())
                            <img class="card-img card-img-left" src="{{asset('storage/properties/').'/'. $property->singlephoto->image }}" height="155"
                            alt="Card image" />
                        @else
                            <img class="card-img card-img-left" src="{{asset('assets/img/default-imgs/propertyImageNotSet.jpg')}}" height="155"
                            alt="Card image" />
                        @endif

                    </div>
                    <div class="col-md-10">
                        <div class="card-body px-4 py-2">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">{{ $property->building }}</h3>
                                <div>
                                    <a href="{{ route('property-details', ['code' => $property->code]) }}"
                                        class="text-muted"><i class="ti ti-eye"></i></a>
                                    <a href="#" class="text-muted"><i class="ti ti-copy"></i></a>
                                    <span class="text-muted delete" data-code="{{ $property->code }}"><i class="ti ti-trash"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0">
                                        Code:
                                        <a
                                            href="{{ route('property-details', ['code' => $property->code]) }}">{{ $property->code }}</a>
                                    </h6>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="mb-0">District: {{ $property->district }}</h6>
                                </div>
                                <div class="col-md-6 pt-1">
                                    <h6 class="mb-0">Street:
                                        {{ $property->street ? $property->street : 'Street Not Selected' }}</h6>
                                </div>
                                <div class="col-md-6 pt-1">
                                    <h6 class="mb-0">Created By: {{ $property->agent_name }}</h6>
                                </div>
                            </div>
                        </div>
                        <hr class="my-2 mx-0" />
                        <div class="card-footer d-flex justify-content-between px-4 py-0">
                            <small>{{ $property->landlord_name ? $property->landlord_name : 'Landlord Not Defined' }}</small>
                            <p class="card-text"><small class="text-muted">Created At:
                                    {{ $property->building_created_at }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    <h2>No Property maded</h2>
    @endforelse

</div> --}}

<!--/ Horizontal -->

<!--Table-->
<div class="card property-table">
    <div class="card-datatable table-responsive pt-0">
        <table class="table user-list-table stripe">
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
                @foreach($properties as $property)
                <tr class="odd" data-code="{{ $property->code }}">
                    <td>
                        <a href="{{ route('property-details', ['code' => $property->code]) }}">
                            {{ $property->code }}
                        </a>
                    </td>
                    <td>{{ $property->district ? $property->district : '--' }}</td>
                    <td>{{ $property->street ? $property->street : '--' }}</td>
                    <td>{{ $property->building ? $property->building : '--' }}</td>
                    <td>
                        <i class="ti ti-trash delete" data-code="{{ $property->code }}"></i>
                        <a href="{{asset('assets/img/elements/9.jpg')}}" style="color: var(--bs-table-color)">
                            <i class="ti ti-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
