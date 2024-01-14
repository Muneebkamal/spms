<script>
    $(document).ready(function () {
        $('.user-list-table').dataTable();
        $('.contactPermission').on('click', function () {
            let check = ($(this).is(':checked') ? 1 : 0)
            let userId = $(this).data('user-id')
            formData = {
                'check': check,
                'id': userId
            }
            $.ajax({
                'url': '{{ route("contact-permission") }}',
                'data': formData,
                success: function (data) {
                    if (data.success) {
                        toastr.success('Contact Permission has been Changed Successfully.', 'Permission Changed!');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Ajax request error:', status, error);
                }
            })
        });

        $('.photoPermission').on('click', function () {
            let check = ($(this).is(':checked') ? 1 : 0)
            let userId = $(this).data('user-id')
            formData = {
                'check': check,
                'id': userId
            }
            $.ajax({
                'url': '{{ route("photo-permission") }}',
                'data': formData,
                success: function (data) {
                    if (data.success) {
                        toastr.success('Photo Permission has been Changed Successfully.', 'Permission Changed!');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Ajax request error:', status, error);
                }
            })
        });

        $('.delete').on('click', function () {
            id = $(this).data('id')
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
                        url: '{{ route("deleteAgent", ["id" => ":id"]) }}'.replace(':id', id),
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (data) {
                            if (data.success) {
                                Swal.fire('Deleted!', 'The agent has been deleted.', 'success');
                                $('tr[data-user="' + id + '"]').remove();
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
