<script>
    $(document).ready(function() {
        $('#confirm_password').on('input', function() {
            validatePasswords();
        });

        $('#password').on('input', function() {
            validatePasswords();
        });

        function validatePasswords() {
            if ($('#confirm_password').val() === $('#password').val()) {
                $('#createAgentButton').prop('disabled', false);
                $('#seePassword').slideUp(200)
            } else {
                $('#createAgentButton').prop('disabled', true);
                $('#seePassword').slideDown(200)
            }
        }

        $('#createAgent').submit(function (e) {
            e.preventDefault();

            formData = new FormData(this);

            $.ajax({
                url: "{{ route('createAgent') }}",
                data: formData,
                processData: false,  // Important: Prevent jQuery from automatically processing the data
                contentType: false,  // Important: Prevent jQuery from automatically setting the content type
                type: 'POST',  // Assuming you're using POST method
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if(data.success) {
                        toastr['success']('User has been created successfully.', 'User Created!');
                        setTimeout(function(){
                            window.location.href = "{{ route('agentList') }}"
                        }, 300)
                    }else{
                        toastr['error']('User with this email already exists.', 'Email Exists!');
                    }
                },
                error: function(e) {
                    console.error(e);
                }
            });
        });
    });
</script>
