<script>


        var e = `<div class="dz-preview dz-file-preview">
                <div class="dz-details">
                    <div class="dz-thumbnail">
                        <img data-dz-thumbnail>
                        <span class="dz-nopreview">No preview</span>
                        <div class="dz-success-mark"></div>
                        <div class="dz-error-mark"></div>
                        <div class="dz-error-message"><span data-dz-errormessage></span></div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
                        </div>
                    </div>
                    <div class="dz-filename" data-dz-name></div>
                    <div class="dz-size" data-dz-size></div>
                </div>
            </div>`;

        // Initialize Dropzone
        var myDropzone = new Dropzone("#createProperty", {
            url: "/upload-image",
            previewTemplate: e,
            parallelUploads: 1,
            maxFilesize: 5,
            addRemoveLinks: true,
            previewsContainer: "#uploadedImages",
            // You probably don't want the whole body
            // to be clickable to select files
            clickable: true,
             acceptedFiles: 'image/*'
        });
        myDropzone.on('success', function (file, response) {
            console.log('File uploaded successfully:', response);
        });

        myDropzone.on('error', function (file, errorMessage) {
            console.error('Error uploading file:', errorMessage);
        });



    flatpickr(".datetime-input", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        onChange: function (selectedDates, dateStr, instance) {}
    });

    $("#createProperty").submit(function (e) {
        e.preventDefault();

        if ($('#code').val() == '') {
            $('.step[data-target="#building-info"] > button').click();
            $('#code_msg')
                .show()
                .html('Code is required')
                .addClass('text-danger')
                .removeClass('text-success');
            return;
        } else if ($('#building_name').val() == '') {
            $('.step[data-target="#building-info"] > button').click();
            $('#building_name_msg')
                .show()
                .html('Building Name is required')
            return;
        }



        var formData = new FormData(this);
        // Making FACILITY ARRAY
        var arrayFacilities = [];
        $('#facilities > option:selected').each(function () {
            arrayFacilities.push($(this).val());
        });
        // Making DECORE ARRAY
        var arraydecoration = [];
        $('#decoration > option:selected').each(function () {
            arraydecoration.push($(this).val());
        });
        // Making TYPES ARRAY
        var arrayTypes = [];
        $('#types > option:selected').each(function () {
            arrayTypes.push($(this).val());
        });

        // APPENDING ARRAYS IN FORM DATA
        formData.append('facilities', arrayFacilities);
        formData.append('decoration', arraydecoration);
        formData.append('types', arrayTypes);


        const othersNames = ['NewSite', 'Bargain', 'Discounted', 'Recommend', 'ReadyToListing',
            'NewReleased'
        ];
        var arrayOthers = [];
        var arrayDates = [];
        var arrayDetails = [];

        othersNames.forEach((name) => {
            const checkbox = $('input[name="others[' + name + ']"]').is(':checked');

            if (checkbox) {
                others = $('input[name="others[' + name + ']"]').val()
                arrayOthers.push(others)
                date = $('input[name="others_date[' + name + ']"]').val()
                if (date) {
                    arrayDates.push(date)
                } else {
                    arrayDates.push('N\A')
                }
                detail = $('textarea[name="others_details[' + name + ']"]').val()
                if (detail) {
                    arrayDetails.push(detail)
                } else {
                    arrayDetails.push('N\A')
                }
            }
        });


        // APPENDNG ARRAYS IN FORM DATA
        formData.append('others_dates', arrayDates);
        formData.append('others', arrayOthers);
        formData.append('others_details', arrayDetails);

        sellingGross = $('#selling-gross').val()
        sellingNet = $('#selling-net').val()
        rentalGross = $('#rental-gross').val()
        rentalNet = $('#rental-net').val()

        formData.append('selling-gross', sellingGross);
        formData.append('selling-net', sellingNet);
        formData.append('rental-gross', rentalGross);
        formData.append('rental-net', rentalNet);

        myDropzone.files.forEach(function(file, index) {
            formData.append('images[' + index + ']', file);
        });

        // Add the total number of images
        formData.append('totalImages', myDropzone.files.length);

        // AJAX CALL
        $.ajax({
            url: '{{ route("createProperty") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success) {
                    toastr['success']('New Property ' + response.name + ' Created.',
                        'Property Created!');
                }
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
    $(document).ready(function () {
        $('#code').on('input', function () {
            var code = $(this).val();
            if (code !== '') {
                $.ajax({
                    url: '/check-code/' + code,
                    type: 'GET',
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (response.success) {
                            $('#code_msg')
                                .show()
                                .removeClass('text-danger')
                                .addClass('text-success')
                                .html(response.msg)
                        } else {
                            $('#code_msg')
                                .show()
                                .html(response.msg)
                                .addClass('text-danger')
                                .removeClass('text-success');
                        }
                    },
                    error: function (error) {
                        // Handle the error response
                        console.error(error);
                    }
                });
            } else {
                $('#code_msg').hide()
            }
        });
    });

</script>

<script>
    $(document).ready(function () {
        let dataSet = {
            allowClear: true,
            closeOnSelect: false,
            selectOnClose: false,
        }

        $('#decoration').select2(dataSet);
        $('#facilities').select2(dataSet);
        $('#types').select2(dataSet);
    });

    $('.optionsTabCheck').on('change', function () {
        id = $(this).data('id')
        if ($(this).is(':checked')) {
            $('.activeOptionTab').removeClass('activeOptionTab')
            $('.optionsTab[data-tab=' + id + ']').removeClass('d-none').addClass('activeOptionTab')
            $('#optionContent > div').hide()
            $('#' + id + 'Content').show()
        } else {
            $('.optionsTab[data-tab=' + id + ']').addClass('d-none').removeClass('activeOptionTab')
            $('#' + id + 'Content').hide()
        }
    })
    $('.optionsTab').on('click', function () {
        id = $(this).data('tab')
        $('.activeOptionTab').removeClass('activeOptionTab')
        $(this).addClass('activeOptionTab')
        $('#optionContent > div').hide()
        $('#' + id + 'Content').show()
    })
    $('#gross-sf').on('input', function () {
        calculateGrossAndNet()
    })
    $('#net-sf').on('input', function () {
        calculateGrossAndNet()
    })
    $('#rental-price').on('input', function () {
        calculateGrossAndNet()
    })
    $('#selling-price').on('input', function () {
        calculateGrossAndNet()
    })

    function calculateGrossAndNet() {
        let gross_sf = parseFloat($('#gross-sf').val());
        let net_sf = parseFloat($('#net-sf').val());


        let selling_gross = $('#selling-gross');
        let rental_gross = $('#rental-gross');
        let selling_net = $('#selling-net');
        let rental_net = $('#rental-net');

        let rental_price = parseFloat($('#rental-price').val());
        let selling_price = parseFloat($('#selling-price').val());

        if (rental_price) {

            if (net_sf) {
                rental_net.val((rental_price / net_sf).toFixed(2));
            } else {
                rental_net.val(0);
            }
            if (gross_sf) {
                rental_gross.val((rental_price / gross_sf).toFixed(2));
            } else {
                rental_gross.val(0);
            }
        }
        if (selling_price) {
            if (gross_sf) {
                selling_gross.val((selling_price / gross_sf).toFixed(2));
            } else {
                selling_gross.val(0);
            }

            if (net_sf) {
                selling_net.val((selling_price / net_sf).toFixed(2));
            } else {
                selling_net.val(0);
            }
        }

    }

</script>

<style>
    .activeOptionTab {
        background-color: #28c76f !important
    }
</style>
