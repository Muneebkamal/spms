@extends('layouts.app')

@section('title', 'Share List')

@section('script')
  <!-- Vendors JS -->
  <script src="../../assets/vendor/libs/dropzone/dropzone.js"></script>
  <!-- Page JS -->
  {{-- <script src="../../assets/js/forms-file-upload.js"></script> --}}
  <script>
// assets/js/forms-file-upload.js

        $(document).ready(function () {
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
            var myDropzone = new Dropzone("#uploader", {
                url: "/upload-image", // Replace with your actual upload URL
                previewTemplate: e,
                parallelUploads: 1,
                maxFilesize: 5,
                addRemoveLinks: true,
            });

            myDropzone.on('success', function (file, response) {
                console.log('File uploaded successfully:', response);
            });

            myDropzone.on('error', function (file, errorMessage) {
                console.error('Error uploading file:', errorMessage);
            });

            // Handle the click event of the new button
            $('#logFileDataButton').click(function () {
    // Get file data from Dropzone
var formData = new FormData();

// Get file data from Dropzone
myDropzone.files.forEach(function(file, index) {
    formData.append('images[' + index + ']', file);
});

// Add the total number of images
formData.append('totalImages', myDropzone.files.length);

// Now you can use formData in your AJAX request
$.ajax({
    url: "{{ route('upload-image') }}",
    data: formData,
        method: 'POST',
        processData: false,  // Important: prevent jQuery from automatically processing the data
        contentType: false,  // Important: prevent jQuery from automatically setting the Content-Type
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log(data);
        },
        error: function (e) {
            console.error(e);
        }
    });
});


        });

  </script>
@endsection

@section('styles')
  <link rel="stylesheet" href="../../assets/vendor/libs/dropzone/dropzone.css" />
@endsection

@section('content')
<div class="col-12">
    <div class="card">
        <h5 class="card-header">Multiple</h5>
        <div class="card-body">
            <form id="uploader"  class="dropzone needsclick"  id="dropzone-multi">
                <div class="dz-message needsclick">
                    Drop files here or click to upload
                    <span class="note needsclick">(This is just a demo dropzone. Selected files are <span
                            class="fw-medium">not</span> actually uploaded.)</span>
                </div>
                <div class="fallback">
                    <input name="file" type="file" />
                </div>
            </form>
            <button id="logFileDataButton" type="button">Log File Data</button>

        </div>
    </div>
</div>
@endsection
