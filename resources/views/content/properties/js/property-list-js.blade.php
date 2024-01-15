<script>
    $('.property-table').hide();
    $(document).ready(function(){
        $('#list').click(function(){
            $('.property-table').hide();
            $('.property-list').show();
            $('#list').addClass("bg-primary text-white");
            $('#table').removeClass("bg-primary text-white");
        });
        $('#table').click(function(){
            $('.property-list').hide();
            $('.property-table').show();
            $('#table').addClass("bg-primary text-white");
            $('#list').removeClass("bg-primary text-white");
        })
    })
    $('.user-list-table').dataTable();
</script>