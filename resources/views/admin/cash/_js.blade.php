<script type="text/javascript">

    // Dropzone.autoDiscover = false;

    // var myDropzone = new Dropzone('div#UploadCollateral', {
    //     url: "http:localhost:8000/admin/cash/upload",
    //     paramName: 'upload_collateral',
    //     addRemoveLinks: true,
    //     dictRemoveFile: 'Remove',
    //     autoProcessQueue: false,
    //     parallelUploads: 10,
    //     maxFilesize: 8,
    //     dictFileTooBig: 'Image is bigger than 8MB',
    //     clickable: '.upload-collateral',

    // })

    $(".customer_select2").select2({
        tags: 'true',
        placeholder: 'Search Customer',
        allowClear: true
    });

    function AddCustomer() {
        $('#createCustomerModal').modal('show');
    }

    function getCustomerList(customer_list) {
        $.ajax({
            url: 'http://localhost:8000/api/v1/customer/'+ customer_list,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response.data.customer_no);
                $('#customernoCash').val(response.data.customer_no);
                /*$('#branchidCash').val(response.data.customer_branch_id);*/
                $('#customernoLoan').val(response.data.customer_no);
                $('#nameLoan').val(response.data.customer_name);
                $('#identity_numberLoan').val(response.data.customer_identity_number);
                $('#phoneLoan').val(response.data.customer_phone);
                $('#addressLoan').val(response.data.customer_address);
                $('#customernoColl').val(response.data.customer_no);
            },
            error: function(response){
                alert(response);
            }
        })     
    }

    $('#addcustomerloan').click(function() {
        $.ajax({
            type: 'post',
            url: '{{ route('api.customer.store') }}',
            data: $('#createCustomerForm').serialize(),
            success: function (response){
                console.log(response.data.customer_no);
                $('#customernoCash').val(response.data.customer_no);
                /*$('#branchidCash').val(response.data.customer_branch_id);*/
                $('#customernoLoan').val(response.data.customer_no);
                $('#nameLoan').val(response.data.customer_name);
                $('#identity_numberLoan').val(response.data.customer_identity_number);
                $('#phoneLoan').val(response.data.customer_phone);
                $('#addressLoan').val(response.data.customer_address);
                $('#customernoColl').val(response.data.customer_no);
                $('#createCustomerModal').modal('hide');
            },
            error: function(response){
                alert(response);
            }
        })
    })


</script>

