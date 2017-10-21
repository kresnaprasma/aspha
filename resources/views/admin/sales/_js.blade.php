<script type="text/javascript">
    var mokasTable = $('#tableMokas').DataTable({
        "dom": "rtip",
            "pageLength": 10,
            "retrieve": true,
    });

    $("#searchDtbox").keyup(function() {
        mokasTable.search($(this).val()).draw();
    });
    $('#tableMokas tbody').on('dblclick', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        } else {
            mokasTable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');

            var mokas_list = $(this).find('#idtableMokas').val();
            $.ajax({
                url: 'http://localhost:8000/api/v1/mokas/'+ mokas_list,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    $('#mokas_noSales').val(response.data.mokas_no);
                    $('#discountSales').val(response.data.discount);
                    $('#selling_priceSales').val(response.data.selling_price);
                    $('#type_idSales').val(response.data.type_id);
                    $('#stnkSales').val(response.data.stnk);
                    $('#bpkbSales').val(response.data.bpkb);
                    $('#machine_numberSales').val(response.data.machine_number);
                    $('#chassis_numberSales').val(response.data.chassis_number);
                    $('#manufacture_yearSales').val(response.data.manufacture_year);
                    $('#stnk_due_dateSales').val(response.data.stnk_due_date);
                    $('#platSales').val(response.data.plat);
                },
                error: function(response) {
                    alert(response);
                }
            });

            $('#viewMokasModal').modal('hide');
        }
    });

    $('#tenorSales').attr('disabled', 'disabled');
    $('#leasingSales').attr('disabled', 'disabled');
    $('#paymentSales').attr('disabled', 'disabled');
    $('#down_paymentSales').attr('disabled', 'disabled');

    $('select[id="cash_methodSales"]').on('change', function(){
        var payment = $(this).val();
            if (payment == "Credit") {
                $('#tenorSales').removeAttr('disabled');
                $('#leasingSales').removeAttr('disabled');
                $('#paymentSales').removeAttr('disabled');
                $('#down_paymentSales').removeAttr('disabled');
            }else{
                $('#tenorSales').attr('disabled', 'disabled');
                $('#leasingSales').attr('disabled', 'disabled');
                $('#paymentSales').attr('disabled', 'disabled');
            }
    });

    $("#customer_list").select2({
        tags: 'true',
        placeholder: 'Search Customer',
        allowClear: true
    });

    function AddCustomer() {
        $('#createCustomerModal').modal('show');
    }

    function AddMokas() {
        $('#viewMokasModal').modal('show');
    }

    function getCustomerList(customer_list) {
        $.ajax({
            url: 'http://localhost:8000/api/v1/customer/'+ customer_list,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $('#customernoSales').val(response.data.customer_no);
                $('#nameSales').val(response.data.customer_name);
                $('#identity_numberSales').val(response.data.customer_identity_number);
                $('#phoneSales').val(response.data.customer_phone);
                $('#addressSales').val(response.data.customer_address);
            },
            error: function(response){
                alert(response);
            }
        });     
    }

    function formatNumber(input)
    {
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
        } else {
            alert('You may only enter decimals!');
            input.value = input.value.substring(0,input.value.length-1);
        }
    }
</script>