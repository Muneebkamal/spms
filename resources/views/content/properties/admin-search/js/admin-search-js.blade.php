<script>
    $(document).ready(function(){
        $('#price-size').hide();
        $('#buttons').show();
        $('#price-btn').click(function(){
            $('#price-size').show();
            $('#buttons').hide();
        });
    });
</script>

<script>
    $(document).ready(function() {
    $("#myForm").on("submit", function(e) {
        $('#fetchProperty').html(''); 
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'GET',
            url: '/admin-ajax-search/',
            data: formData,
            success: function(result) {
                $('#fetchProperty').html(result)  
                }
        });
    });
});

</script>