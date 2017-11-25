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

            var saleshistory_list = $(this).find('#idtablePriceSalesHistory').val();

            $.ajax({
                url: 'http://localhost:8000/api/v1/pricesaleshistory/'+ saleshistory_list,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    $('#discountMokas').val(response.data.pricesaleshistory_discount);
                    $('#selling_priceMokas').val(response.data.pricesaleshistory_sellingprice);
                },
                error: function(response) {
                    alert(response);
                }
            });

            $('#viewPriceSalesHistoryModal').modal('hide');
        }
    });

    var checkload = true;
    var mokas_no = $('[name=mokas_no]').val();

    Dropzone.autoDiscover = false;

    var myDropzone =  {
        url: "http://localhost:8000/api/v1/uploadmokas",
        paramName: 'image',
        parallelUploads: 10,
        maxFilesize: 8,
        previewTemplate: '<div style="display:none"></div>',
        clickable: '#FormUploadmokas',

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
    };


    function AddPriceSalesHistory() {
        $('#viewPriceSalesHistoryModal').modal('show');
    }

    function getChecklist(checklist) {
        $.ajax({
            url: 'http://localhost:8000/api/v1/mokaschecklist/'+ checklist,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response.data.mokaschecklist_no);
                $('#mokascheckform').val(response.data.mokaschecklist_no);
                $('#mokasform').val(response.data.mokaschecklist_mokas_no);
            },
            error: function(response){
                alert(response);
            }
        })     
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