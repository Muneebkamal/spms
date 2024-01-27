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
        $(".saveCustomer_processing").removeClass('d-none')
        $(".saveCustomers_sve_btn").addClass('d-none')
        $('#fetchProperty').html(''); 
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'GET',
            url: '/admin-ajax-search/',
            data: formData,
            success: function(result) {
                $(".saveCustomers_sve_btn").css('display', 'block')
             $(".saveCustomer_processing").css('display', 'none')
             $(".saveCustomer_processing").addClass('d-none')
             $(".saveCustomers_sve_btn").removeClass('d-none')
                $('#fetchProperty').html(result)  
                }
        });
    });
});

</script>