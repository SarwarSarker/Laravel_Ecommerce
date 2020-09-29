<!--===============================================================================================-->
<script type="text/javascript" src="{{ asset('public/asset/vendor/jquery/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/asset/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/asset/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ asset('public/asset/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ asset('public/asset/vendor/bootstrap/js/popper.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/asset/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

<!--===============================================================================================-->
<script type="text/javascript" src="{{ asset('public/asset/vendor/select2/select2.min.js')}}"></script>

<script type="text/javascript">
$(".selection-1").select2({
    minimumResultsForSearch: 20,
    dropdownParent: $('#dropDownSelect1')
});
</script>

<!--===============================================================================================-->
<script type="text/javascript" src="{{ asset('public/asset/vendor/slick/slick.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/asset/js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ asset('public/asset/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ asset('public/asset/vendor/lightbox2/js/lightbox.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{ asset('public/asset/vendor/sweetalert/sweetalert.min.js')}}"></script>
<!-- <script type="text/javascript">
$('.block2-btn-addcart').each(function() {
    var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
    $(this).on('click', function() {
        swal(nameProduct, "is added to cart !", "success");
    });
});
</script> -->
<script src="{{ asset('public/asset/js/toastr.min.js')}}"></script>
<script type="text/javascript">
$("#payment").change(function() {
    $payment_method = $("#payment").val();
    if ($payment_method == 'cash') {
        $("#payment_cash").removeClass('hidden');
        $("#payment_bkash").addClass('hidden');
        $("#payment_rocket").addClass('hidden');
        $("#transaction_id").addClass('hidden')
    } else if ($payment_method == 'bkash') {
        $("#payment_bkash").removeClass('hidden');
        $("#payment_cash").addClass('hidden');
        $("#payment_rocket").addClass('hidden');
        $("#transaction_id").removeClass('hidden')
    } else if ($payment_method == 'rocket') {
        $("#payment_rocket").removeClass('hidden');
        $("#payment_cash").addClass('hidden');
        $("#payment_bkash").addClass('hidden');
        $("#transaction_id").removeClass('hidden')
    }
});
</script>
<script>
@if(Session::has('message'))
var type = "{{ Session::get('alert-type', 'info') }}";
switch (type) {
    case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;

    case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;

    case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;

    case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
}
@endif
</script>
<script>
$('#division_id').change(function() {
    var division = $('#division_id').val();
    //Send Ajax request to the server
    var url = "{{ url('/') }}";
    $.get( url + "/get-district/" + division, function(data) {
        $('#district_area').html("");
        var option = " ";
        data = JSON.parse(data);
        data.forEach(element => {
            option += "<option value=" + element.id + ">" + element.name + "</option>";
        });

        $('#district_area').html(option);
    });
});
</script>


<!-- Alertify JavaScript -->
<script src="{{ asset('public/asset/js/alertify.min.js')}}"></script>

<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function addToCart(id) {
    
    var url = "{{ url('/') }}";
    $.post(url + "/api/cart/cart", {
            id: id
        })
        .done(function(data) {
            data = JSON.parse(data);
            if (data.status == 'success') {
                ///toast
                alertify.set('notifier', 'position', 'top-center');
                alertify.success('Item added to the Cart successfully!!!');

                $("#total").html(data.totalItems);
            }
        });
}
</script>


<script src="{{ asset('public/asset/js/main.js')}}"></script>