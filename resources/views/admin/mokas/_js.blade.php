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
    var myDropzone = new Dropzone ('div#upload-mokas',{
        paramName           : "image", // The name that will be used to transfer the file
        maxFilesize         : 2, // MB
        dictDefaultMessage  : "Drop File here or Click to upload Image",
        thumbnailWidth      : "200",
        thumbnailHeight     : "200",
        accept              : function(file, done) { done() },
        success             : uploadSuccess,
        complete            : uploadCompleted
    });

    function uploadSuccess(data, file) {
        var messageContainer    =   $('.dz-success-mark'),
            message             =   $('<p></p>', {
                'text' : 'Image Uploaded Successfully! Image Path is: '
            }),
            imagePath           =   $('<a></a>', {
                'href'  :   JSON.parse(file).original_path,

                'target':   '_blank'
            })

        imagePath.appendTo(message);
        message.appendTo(messageContainer);
        messageContainer.addClass('show');
    }

    function uploadCompleted(data) {
        if(data.status != "success")
        {
            var error_message   =   $('.dz-error-mark'),
                message         =   $('<p></p>', {
                    'text' : 'Image Upload Failed'
                });

            message.appendTo(error_message);
            error_message.addClass('show');
            return;
        }
    }


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

    $('#check_all').click(function(event) {
      if(this.checked) {
          $(':checkbox').each(function() {
              this.checked = true;
          });
      }
      else {
        $(':checkbox').each(function() {
              this.checked = false;
          });
      }
    });
</script>