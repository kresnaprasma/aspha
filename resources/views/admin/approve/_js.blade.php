<script type="text/javascript">
    $(".customer_select2").select2({
        tags: 'true',
        placeholder: 'Search CRM',
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

    function formatNumber(input){
        var num = input.value.replace(/\,/g,'');
        if(!isNaN(num))
        {
            if(num.indexOf('.') > -1)
            {
                num = num.split('.');
                num[0] = num[0].toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'');
                if(num[1].length > 2)
                {
                    num[1] = num[1].substring(0,num[1].length-1);
                }
                input.value = num[0]+'.'+num[1];
            }
            else
            {
                input.value = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'');
            }
        }
        else
        {
            alert('You may only enter decimals!');
            input.value = input.value.substring(0,input.value.length-1);
        }
    }
</script>