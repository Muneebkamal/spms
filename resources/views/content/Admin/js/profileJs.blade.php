<script>

$('#formChangePassword').submit(function (e) {
    e.preventDefault();
    var newPassword = $('#newPassword').val();
    var confirmPassword = $('#confirmPassword').val();

    if (confirmPassword !== newPassword) {
        $('#passwordNotMatch').show();
        return;
    }

    $.ajax({
        url: '{{ route("changePassword") }}',
        method: 'POST',
        data: { newPassword: newPassword },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            // Handle success
            console.log(response)
            if(response.success) {
                $('#newPassword').val('')
                $('#confirmPassword').val('')
                toastr['success']('Password has been Changed Successfully.', 'Password Changed!');
            }
        },
        error: function () {
            // Handle error
        }
    });
});

$('#uploadImg').on('click', function() {
    $('#imagFile').click();
});
$('#imagFile').on('change', function() {
    var file = this.files[0];
    if (file) {
        var formData = new FormData();
        formData.append('image', file);

        $.ajax({
            url: '{{ route("upload-user-image") }}',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            success: function(data) {
                console.log('Upload successful:', data);
                $('#user_img').attr('src', data.path)
            },
            error: function(error) {
                console.error('Upload failed:', error);
            }
        });
    }
});
</script>
