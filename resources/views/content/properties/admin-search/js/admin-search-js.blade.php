<script>
    $(document).ready(function() {
        $('#price-size').hide();
        $('#buttons').show();
        $('#price-btn').click(function() {
            $('#price-size').show();
            $('#buttons').hide();
        });
    });
</script>

<script>
    var assetUrl = "{{ asset('/storage/properties/') }}";
    var Url = "{{ url('property/')}}";
    let offset = 0;
    const limit = 10; 
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {

        $('#fetchProperty').on('scroll', function () {
            // Call your function when scrolling occurs
            loadMoreRecords();
        });

        $("#myForm").on("submit", function(e) {
            var html = '';
            $(".saveCustomer_processing").removeClass('d-none')
            $(".saveCustomers_sve_btn").addClass('d-none')
            $('#fetchProperty').html('');
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '{{ url('admin-ajax-search') }}',
                data: formData,

                success: function(result) {
                    console.log(result);
                    if (result.success === true) {
                        offset = offset+result.properties.per_page;
                        console.log(offset);
                        appendSearch(result.properties.data)
                        $(".saveCustomers_sve_btn").css('display', 'block')
                        $(".saveCustomer_processing").css('display', 'none')
                        $(".saveCustomer_processing").addClass('d-none')
                        $(".saveCustomers_sve_btn").removeClass('d-none')
                        
                    }
                    $(window).on('scroll', onScroll);
                }

            });
        });
    });
    function appendSearch(data){
        console.log(data)
        var html='';
        $.each(data, function(index, data) {
                            html += `
                         <a href="${Url+ '/' + data.code}" class='row mb-5'>
                            <div class='col-12'>
                                <div class='card mb-3'>
                                    <div class='row g-0'>
                                        <div class='col-md-2' style='
                                        background-image: url("${assetUrl + '/' + (data.singlephoto ? data.singlephoto.image : '')}");
                                            background-size: cover;
                                        '>
                                        </div>
                                        <div class='col-md-10'>
                                            <div class='card-body pe-4 me-1 p-0'>
                                                <div class='row'>
                                                    <div class='d-flex ms-3 col-12 justify-content-between border-bottom'>
                                                        <div class='flex-column py-3 d-flex'>
                                                            <h5 class='mb-0'>${data.building ? data.building :''}</h5>
                                                            <h6 class='mb-0'>Code: ${data.code ? data.code :''}</h6>
                                                        </div>
                        
                                                        <div class='border-start p-3'>
                                                            <div class='row'>
                                                                <div class='col-6 d-flex'>
                                                                    <span class='text-muted me-2'>District:</span>
                                                                    <p class='mb-0 me-2'>${data.district ? data.district:''}</p>
                                                                </div>
                                                                <div class='col-6 d-flex'>
                                                                    <span class='text-muted me-2'>Flat:</span>
                                                                    <p class='mb-0 me-2'>${data.flat ? data.flat :''}</p>
                                                                </div>
                                                                <div class='col-6 d-flex'>
                                                                    <span class='text-muted me-2'>Block:</span>
                                                                    <p class='mb-0 me-2'>${data.block ? data.block :''}</p>
                                                                </div>
                                                                <div class='col-6 d-flex'>
                                                                    <span class='text-muted me-2'>Floor:</span>
                                                                    <p class='mb-0 me-2'>${data.floor ? data.floor :''}</p>
                                                                </div>
                                                            </div>
                        
                                                        </div>
                                                    </div>
                                                    <div class='col-7'>
                                                        <div class='row me-2'>
                                                            <div class='d-flex ms-3 col-12 py-1 border-bottom'>
                                                                <span class='text-muted me-2'>Facilities:</span>
                                                                <p class='mb-0'>${data.facilities ? data.facilities :''}</p>
                                                            </div>
                                                            <div class='d-flex ms-3 col-12 py-1 border-bottom'>
                                                                <span class='text-muted me-2'>Decoration:</span>
                                                                <p class='mb-0'>${data.decorations ? data.decorations :''}</p>
                                                            </div>
                                                            <div class='d-flex ms-3 col-12 py-1'>
                                                                <span class='text-muted me-2'>Types:</span>
                                                                <p class='mb-0'>${data.types ? data.types :''}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='col-5 border-start'>
                                                        <div class='row pt-2'>
                                                            <div class='col-6 d-flex'>
                                                                <span class='text-muted me-2'>Gross SF:</span>
                                                                <p class='mb-0'>${data.gross_sf ? data.gross_sf:''}</p>
                                                            </div>
                                                            <div class='col-6 d-flex'>
                                                                <span class='text-muted me-2'>Net SF:</span>
                                                                <p class='mb-0'>${data.net_sf ? data.net_sf :''}</p>
                                                            </div>
                                                            <div class='col-6'>
                                                                <div class='row'>
                                                                    <div class='col-12 d-flex'>
                                                                        <span class='text-muted me-2'>Selling Price:</span>
                                                                        <p class='mb-0'>${data.selling_price ? data.selling_price:''}</p>
                                                                    </div>
                                                                    <div class='col-12 d-flex'>
                                                                        <span class='text-muted me-2'>Selling G@:</span>
                                                                        <p class='mb-0'>${data.selling_g ? data.selling_g :''}</p>
                                                                    </div>
                                                                    <div class='col-12 d-flex'>
                                                                        <span class='text-muted me-2'>Selling N@:</span>
                                                                        <p class='mb-0'>${data.selling_n ? data.selling_n:''}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class='col-6'>
                                                                <div class='row'>
                                                                    <div class='col-12 d-flex'>
                                                                        <span class='text-muted me-2'>Rental Price:</span>
                                                                        <p class='mb-0'>${data.rental_price ? data.rental_price:''}</p>
                                                                    </div>
                                                                    <div class='col-12 d-flex'>
                                                                        <span class='text-muted me-2'>Rental G@:</span>
                                                                        <p class='mb-0'>${data.rental_g ? data.rental_g :''}</p>
                                                                    </div>
                                                                    <div class='col-12 d-flex'>
                                                                        <span class='text-muted me-2'>Rental N@:</span>
                                                                        <p class='mb-0'>${data.rental_n ? data.rental_n :''}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                        
                                                        </div>
                                                    </div>
                                                    <div class='col-12 px-3 mx-3 py-2 border-top'>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>`;
                        });
                        $('#fetchProperty').html(html);
    }
</script>

<script>
// Adjust the limit based on your requirements

    function loadMoreRecords() {
        var formData = new FormData($('#myForm')[0]);
        formData.append('offset',offset)
        $.ajax({
            url: "{{url('loadMore')}}",
            type: 'GET',
            data: {offset:offset},
            success: function (data) {
                if (data.length > 0) {
                    appendSearch(data)
                    offset += limit;
                } else {
                    // No more records, remove the scroll event listener
                    $(window).off('scroll', onScroll);
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    function onScroll() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
            loadMoreRecords();
        }
    }

</script>
