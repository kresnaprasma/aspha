<script type="text/javascript">

    var checkload = true;
    var customercollateral_no = $('[name=customercollateral_no]').val();

    Dropzone.autoDiscover = false;

    var myDropzone = new Dropzone('div#uploadcollateral', {
        url: "http://localhost:8000/api/v1/uploaddanatunai",
        paramName: 'image',
        parallelUploads: 10,
        maxFilesize: 8,
        previewTemplate: '<div style="display:none"></div>',
        clickable: '.upload-collateral',

        init: function(){
            var myDropzones = this;
        },
        accept: function(file, done){
            console.log('Successfully Uploaded!');
            done();
        },

        success: function(file, response, value){
            $('#uploadcollateral').append('<li><a href="/uploaddanatunai/show/'+response.data.nameslug+'" target="_blank">'+get_mime(response.data.mime)+response.data.filename+'<a><span class="pull-right"><a onclick="deleteUpload(this, '+response.data.id+')"><i class="fa fa-times fa-red" aria-hidden="true"></i></a></span></li>');
        }
    });

    

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