<script>
    function getViewData(id){
        var user_id = id;
        $.ajax({
            url:"{{ url('get-view-data') }}",
            type:"get",
            dataType:"json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                user_id:user_id
            },
            success:function(data){
                console.log(data);
                if(data.length>0){
                    var html ='';
                    var user_name ='';
                    $('#view_details').DataTable().destroy();
                    let tt = $('#view_details').DataTable({
                        data: data,
                        "order": [],
                        columns: [
                            {
                                render: function (data, type, full, meta) {
                                    // console.log(full);
                                    var code = full.code !=null?full.code:'';
                                    return `  <a href="${full.url}">${full.url}</a>
                                        <p>${code}</p>`;
                                }
                            },
                            {
                                render: function (data, type, full, meta) {
                                    // console.log(full);
                                    return full.created_at;
                                }
                            },
                        ],

                    })
                    $('#user_name').empty()
                    $('#user_name').text(data[0].user_name)
                }
            }
        })
    }
</script>