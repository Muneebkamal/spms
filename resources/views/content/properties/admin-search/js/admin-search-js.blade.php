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
    const NA = '<span class="text-muted">N\A</span>'
    const notFoundImg = "{{asset('assets/img/default-imgs/propertyImageNotSet.jpg')}}"
    let offset = 0;
    const limit = 10;
    var html = '';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {

        // $('#').on('scroll', function() {
        //     // Call your function when scrolling occurs
            
        // });

        var scrollableDiv = $('#fetchProperty');

    // Attach scroll event to the element
    scrollableDiv.scroll(function() {
      // Calculate the scroll position
      var scrollPosition = scrollableDiv.scrollTop() + scrollableDiv.height();
      var totalHeight = scrollableDiv[0].scrollHeight;

      // Check if the scroll position is at the bottom
      if (scrollPosition === totalHeight) {
        // Call your function when the scroll reaches the end
        loadMoreRecords();
      }
    });

        $("#myForm").on("submit", function(e) {
            var html = '';
            offset = 0;
            
            $(".saveCustomer_processing").removeClass('d-none')
            $(".saveCustomers_sve_btn").addClass('d-none')
            $('#fetchProperty').html('');
            e.preventDefault();
            var formData = $(this).serialize();
        console.log(formData);

            $.ajax({
                type: 'POST',
                url: '{{ url('admin-ajax-search') }}',
                data: formData,

                success: function(result) {
                    console.log(result);
                    if (result.success === true) {

                        offset = offset + result.properties.per_page;
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

    function appendSearch(data) {
        console.log(data);
    $.each(data, function(index, data) {
                            html += `<div onclick='window.location.href = ${Url+ '/' + data.code}' class='card mb-3 d-none d-md-block'>
                                    <div class='row g-0'>
                                        <div class='col-md-2' style='
                                        background-image: url("${data.singlephoto ? assetUrl + '/' + data.singlephoto.image : notFoundImg}");
                                            background-size: cover;
                                        '>
                                        </div>
                                        <div class='col-md-10'>
                                            <div class='card-body pe-4 me-1 p-0'>
                                                <div class='row'>
                                                    <div class='d-md-flex d-block  ms-3 col-12 justify-content-between border-bottom'>
                                                        <div class='flex-column py-3 d-flex'>
                                                            <h5 class='mb-0'>${data.building ? data.building : NA }</h5>
                                                            <h6 class='mb-0'>Code: ${data.code ? data.code : NA }</h6>
                                                        </div>

                                                        <div class='border-start p-3'>
                                                            <div class='row'>
                                                                <div class='col-md-6 d-flex'>
                                                                    <span class='text-muted me-2'>District:</span>
                                                                    <p class='mb-0 me-2'>${data.district ? data.district: NA }</p>
                                                                </div>
                                                                <div class='col-md-6 d-flex'>
                                                                    <span class='text-muted me-2'>Flat:</span>
                                                                    <p class='mb-0 me-2'>${data.flat ? data.flat : NA }</p>
                                                                </div>
                                                                <div class='col-md-6 d-flex'>
                                                                    <span class='text-muted me-2'>Block:</span>
                                                                    <p class='mb-0 me-2'>${data.block ? data.block : NA }</p>
                                                                </div>
                                                                <div class='col-md-6 d-flex'>
                                                                    <span class='text-muted me-2'>Floor:</span>
                                                                    <p class='mb-0 me-2'>${data.floor ? data.floor : NA }</p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class='col-md-7'>
                                                        <div class='row me-2'>
                                                            <div class='d-flex ms-3 col-12 py-1 border-bottom'>
                                                                <span class='text-muted me-2'>Facilities:</span>
                                                                <p class='mb-0'>${data.facilities ? data.facilities : NA }</p>
                                                            </div>
                                                            <div class='d-flex ms-3 col-12 py-1 border-bottom'>
                                                                <span class='text-muted me-2'>Decoration:</span>
                                                                <p class='mb-0'>${data.decorations ? data.decorations : NA }</p>
                                                            </div>
                                                            <div class='d-flex ms-3 col-12 py-1'>
                                                                <span class='text-muted me-2'>Types:</span>
                                                                <p class='mb-0'>${data.types ? data.types : NA }</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='col-md-5 border-start'>
                                                        <div class='row pt-2'>
                                                            <div class='col-6 d-flex'>
                                                                <span class='text-muted me-2'>Gross SF:</span>
                                                                <p class='mb-0'>${data.gross_sf ? data.gross_sf: NA }</p>
                                                            </div>
                                                            <div class='col-6 d-flex'>
                                                                <span class='text-muted me-2'>Net SF:</span>
                                                                <p class='mb-0'>${data.net_sf ? data.net_sf : NA }</p>
                                                            </div>
                                                            <div class='col-6'>
                                                                <div class='row'>
                                                                    <div class='col-12 d-flex'>
                                                                        <span class='text-muted me-2'>Selling Price:</span>
                                                                        <p class='mb-0'>${data.selling_price ? data.selling_price: NA }</p>
                                                                    </div>
                                                                    <div class='col-12 d-flex'>
                                                                        <span class='text-muted me-2'>Selling G@:</span>
                                                                        <p class='mb-0'>${data.selling_g ? data.selling_g : NA }</p>
                                                                    </div>
                                                                    <div class='col-12 d-flex'>
                                                                        <span class='text-muted me-2'>Selling N@:</span>
                                                                        <p class='mb-0'>${data.selling_n ? data.selling_n: NA }</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class='col-6'>
                                                                <div class='row'>
                                                                    <div class='col-12 d-flex'>
                                                                        <span class='text-muted me-2'>Rental Price:</span>
                                                                        <p class='mb-0'>${data.rental_price ? data.rental_price: NA }</p>
                                                                    </div>
                                                                    <div class='col-12 d-flex'>
                                                                        <span class='text-muted me-2'>Rental G@:</span>
                                                                        <p class='mb-0'>${data.rental_g ? data.rental_g : NA }</p>
                                                                    </div>
                                                                    <div class='col-12 d-flex'>
                                                                        <span class='text-muted me-2'>Rental N@:</span>
                                                                        <p class='mb-0'>${data.rental_n ? data.rental_n : NA }</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div onclick='window.location.href = ${Url+ '/' + data.code}' class="card d-block d-md-none mb-4">
                                    <div class="card-body p-3 pb-0">
                                        <div class="row pb-3">

                                            <div class="col-8 d-flex flex-column pb-3 mb-2 border-bottom">
                                                <h3 class='mb-0'>${data.building ? data.building : NA }</h3>
                                                <h6 class='mb-0'>Code: ${data.code ? data.code : NA }</h6>
                                            </div>
                                            <div class='col-4 border-bottom d-flex justify-content-end mb-2 pb-1'>
                                                <img width="80" height='80' src="${data.singlephoto ? assetUrl + '/' + data.singlephoto.image : notFoundImg}">
                                            </div>
                                            <div class='col-12 d-flex'>
                                                <span class='text-muted me-2'>District:</span>
                                                <p class='mb-0 me-2'>${data.district ? data.district: NA }</p>
                                            </div>
                                            <div class='col-12 d-flex'>
                                                <span class='text-muted me-2'>Flat:</span>
                                                <p class='mb-0 me-2'>${data.flat ? data.flat : NA }</p>
                                            </div>
                                            <div class='col-12 d-flex'>
                                                <span class='text-muted me-2'>Block:</span>
                                                <p class='mb-0 me-2'>${data.block ? data.block : NA }</p>
                                            </div>
                                            <div class='col-12 d-flex'>
                                                <span class='text-muted me-2'>Floor:</span>
                                                <p class='mb-0 me-2'>${data.floor ? data.floor : NA }</p>
                                            </div>
                                            <div class='col-12 d-flex col-12 py-1 border-top border-bottom'>
                                                <span class='text-muted me-2'>Facilities:</span>
                                                <p class='mb-0'>${data.facilities ? data.facilities : NA }</p>
                                            </div>
                                            <div class='col-12 d-flex col-12 py-1 border-bottom'>
                                                <span class='text-muted me-2'>Decoration:</span>
                                                <p class='mb-0'>${data.decorations ? data.decorations : NA }</p>
                                            </div>
                                            <div class='col-12 d-flex col-12 py-1'>
                                                <span class='text-muted me-2'>Types:</span>
                                                <p class='mb-0'>${data.types ? data.types : NA }</p>
                                            </div>


                                            <div class='col-12 d-flex border-top'>
                                                <span class='text-muted me-2'>Gross SF:</span>
                                                <p class='mb-0'>${data.gross_sf ? data.gross_sf: NA }</p>
                                            </div>
                                            <div class='col-12 d-flex'>
                                                <span class='text-muted me-2'>Net SF:</span>
                                                <p class='mb-0'>${data.net_sf ? data.net_sf : NA }</p>
                                            </div>

                                            <div class='col-12 d-flex'>
                                                <span class='text-muted me-2'>Selling Price:</span>
                                                <p class='mb-0'>${data.selling_price ? data.selling_price: NA }</p>
                                            </div>
                                            <div class='col-12 d-flex'>
                                                <span class='text-muted me-2'>Selling G@:</span>
                                                <p class='mb-0'>${data.selling_g ? data.selling_g : NA }</p>
                                            </div>
                                            <div class='col-12 d-flex'>
                                                <span class='text-muted me-2'>Selling N@:</span>
                                                <p class='mb-0'>${data.selling_n ? data.selling_n: NA }</p>
                                            </div>

                                            <div class='col-12 d-flex'>
                                                <span class='text-muted me-2'>Rental Price:</span>
                                                <p class='mb-0'>${data.rental_price ? data.rental_price: NA }</p>
                                            </div>
                                            <div class='col-12 d-flex'>
                                                <span class='text-muted me-2'>Rental G@:</span>
                                                <p class='mb-0'>${data.rental_g ? data.rental_g : NA }</p>
                                            </div>
                                            <div class='col-12 d-flex'>
                                                <span class='text-muted me-2'>Rental N@:</span>
                                                <p class='mb-0'>${data.rental_n ? data.rental_n : NA }</p>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                `;
                        });
                        $('#fetchProperty').html(html);
        
    }
</script>

<script>
    // Adjust the limit based on your requirements

    function loadMoreRecords() {
        checkedValues=[];
        $('.types1').each(function() {
            if($(this).prop('checked')){
                checkedValues.push( $(this).val() );
            }
        });
        mergearray=$.merge(checkedValues,$('#types').val())
        checkedValuesother=[];
        $('#other').each(function() {
            if($(this).prop('checked')){
                checkedValuesother.push( $(this).val() );
            }
        });

        $.ajax({
            url: "{{ url('loadMore') }}",
            type: 'GET',
            data: {
                'type': mergearray,
                'district': $('#all-keywords').val(),
                'facilities': $('#facility').val(),
                'decoration': $('#decoration').val(),
                'other': checkedValuesother,
                'offset': offset,
                'building_name': $('#building-keyword').val(),
            },
            success: function(data) {
                if (data.length > 0) {
                    appendSearch(data)
                    offset += limit;
                } else {
                    // No more records, remove the scroll event listener
                    $(window).off('scroll', onScroll);
                }
            },
            error: function(xhr, status, error) {
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
