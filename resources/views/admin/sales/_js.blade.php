<script type="text/javascript">

    var checkload = true;
    var sales_no = $('[name=sales_no]').val();

    Dropzone.autoDiscover = false;

    var myDropzone = new Dropzone('div#uploadcollateral', {
        url: "http://localhost:8000/api/v1/uploadsales",
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
            $('#uploadcollateral').append('<li><a href="/uploadsales/show/'+response.data.nameslug+'" target="_blank">'+get_mime(response.data.mime)+response.data.filename+'<a><span class="pull-right"><a onclick="deleteUpload(this, '+response.data.id+')"><i class="fa fa-times fa-red" aria-hidden="true"></i></a></span></li>');
        }
    });


    myDropzone.on('sending', function(file, xhr, formData){
        formData.append('_token', $('[name=_token]').val());
        formData.append('sales_no', $('[name=sales_no]').val());
        // $('.dial').knob();
        $('.dial').show();
        $('.upload-collateral').hide();
    });

    myDropzone.on('totaluploadprogress', function(progress){
        $('.dial').val(progress);
    });

    myDropzone.on('queuecomplete', function(progress){
        $('.dial').closest('div').remove();
        $('.dial').hide();
        $('.upload-collateral').show();
    });

    myDropzone.on('success', function(file, response){
        getFile(response);
        $('.upload-collateral').show();
        $('.dial').hide();
    });

    myDropzone.on('error', function(file, response){
        if (response.error == true) {
            $('.alert-upload').show();
            $('#message-upload').append(response.message);
            return false;
        }
    });


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


    $('#discountSales').attr('disabled', 'disabled');
    $('#selling_priceSales').attr('disabled', 'disabled');
    $('#nameSales').attr('disabled', 'disabled');
    $('#identity_numberSales').attr('disabled', 'disabled');
    $('#addressSales').attr('disabled', 'disabled');   

    $('#bpkbSales').attr('disabled', 'disabled');
    $('#stnkSales').attr('disabled', 'disabled');
    $('#machine_numberSales').attr('disabled', 'disabled');
    $('#chassis_numberSales').attr('disabled', 'disabled');
    $('#type_idSales').attr('disabled', 'disabled');
    $('#manufacture_yearSales').attr('disabled', 'disabled');
    $('#stnk_due_dateSales').attr('disabled', 'disabled');
    $('#platSales').attr('disabled', 'disabled');

    $('#tenorSales').attr('disabled', 'disabled');
    $('#leasingSales').attr('disabled', 'disabled');
    $('#paymentSales').attr('disabled', 'disabled');
    $('#down_paymentSales').attr('disabled', 'disabled');

    $('select[id="payment_methodSales"]').on('change', function(){
        var payment = $(this).val();
            if (payment == "credit") {
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

    $("#customer_no").select2({
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