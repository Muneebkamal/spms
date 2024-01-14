<script>
    $(document).ready(function() {
        $('.user-list-table').dataTable();
        $('.contactPermission').on('click', function() {
            let check = ($(this).is(':checked') ? 1 : 0 )
            let userId = $(this).data('user-id')
            formData = { 'check': check , 'id': userId }
            $.ajax({
                'url': '{{ route("contact-permission") }}',
                'data': formData,
                success: function(data) {
                    if (data == "`success") {
                        toastr.success('Contact Permission has been Changed Successfully.', 'Permission Changed!');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Ajax request error:', status, error);
                }
            })
        });

        $('.photoPermission').on('click', function() {
            let check = ($(this).is(':checked') ? 1 : 0 )
            let userId = $(this).data('user-id')
            formData = { 'check': check , 'id': userId }
            $.ajax({
                'url': '{{ route("photo-permission") }}',
                'data': formData,
                success: function(data) {
                    if (data == "`success") {
                        toastr.success('Photo Permission has been Changed Successfully.', 'Permission Changed!');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Ajax request error:', status, error);
                }
            })
        });
    })
</script>
