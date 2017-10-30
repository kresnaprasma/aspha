<script type="text/javascript">

    var pricesaleshistoryTable = $('#tablePriceSalesHistory').DataTable({
        "dom": "rtip",
            "pageLength": 10,
            "retrieve": true,
    });

    $("#searchDtbox").keyup(function() {
        pricesaleshistoryTable.search($(this).val()).draw();
    });
    $('#tablePriceSalesHistory tbody').on('dblclick', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        } else {
            pricesaleshistoryTable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');

            // var saleshistory_list = $(this).find('#idtablePriceSalesHistory').val();
            // $.ajax({
            //     url: 'http://localhost:8000/api/v1/mokas/'+ mokas_list,
            //     type: 'GET',
            //     dataType: 'json',
            //     success: function (response) {
            //         $('#mokas_noSales').val(response.data.mokas_no);
            //         $('#discountSales').val(response.data.discount);
            //         $('#selling_priceSales').val(response.data.selling_price);
            //         $('#type_idSales').val(response.data.type_id);
            //         $('#stnkSales').val(response.data.stnk);
            //         $('#bpkbSales').val(response.data.bpkb);
            //         $('#machine_numberSales').val(response.data.machine_number);
            //         $('#chassis_numberSales').val(response.data.chassis_number);
            //         $('#manufacture_yearSales').val(response.data.manufacture_year);
            //         $('#stnk_due_dateSales').val(response.data.stnk_due_date);
            //         $('#platSales').val(response.data.plat);
            //     },
            //     error: function(response) {
            //         alert(response);
            //     }
            // });

            // $('#viewPriceSalesHistoryModal').modal('hide');
        }
    });

    function AddPriceSalesHistory() {
        $('#viewPriceSalesHistoryModal').modal('show');
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
        }
        else
        {
            alert('You may only enter decimals!');
            input.value = input.value.substring(0,input.value.length-1);
        }
    }
</script>