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

        success: function(file, response){
            $('#uploadcollateral').append('<li><a href="/uploaddanatunai/show/'+response.data.original_filename+'" target="_blank">'+get_mime(response.data.mime)+response.data.filename+'<a><span class="pull-right"><a onclick="deleteUpload(this, '+response.data.id+')"><i class="fa fa-times fa-red" aria-hidden="true"></i></a></span></li>');
        }
    });


    myDropzone.on('sending', function(file, xhr, formData){
        formData.append('_token', $('[name=_token]').val());
        formData.append('customercollateral_no', $('[name=customercollateral_no]').val());
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

    function createCashNo() {
        $.ajax({
            url: '/api/v1/cash/no',
            type: 'GET',
            success: function(response) {
                console.log(response.cash_no);                
                $('input[name=cash_no]').val(response.cash_no);                
            }
        })   
    }

    function createCollateralNo() {
        $.ajax({
            url: '/api/v1/customercollateral/no',
            type: 'GET',
            success: function(response){
                console.log(response.customercollateral_no);
                $('input[name=customercollateral_no]').val(response.customercollateral_no);
                $('input[name=customer_no]').val(response.customer_no);
            }
        })
    }

    function deleteUpload(value, id) {
        $.ajax({
            type: 'DELETE',
            url: 'http://localhost:8000/api/v1/uploaddanatunai/'+id,
            success: function(data){
                $(value).closest('li').remove();
            },
            error: function(message){
                return false;
            }
        });
    }

    function get_mime(file) {
        switch(file) {
        case 'image/jpeg':
            return '<i class="fa fa-file-image-o fa-blue" aria-hidden="true"></i>';
            break;
        case ' image/png':
            return '<i class="fa fa-file-image-o fa-blue" aria-hidden="true"></i>';
            break;
        case 'application/octet-stream':
            return '<i class="fa fa-file-excel-o fa-green" aria-hidden="true"></i>';
            break;
        case 'application/CDFV2-corrupt':
            return '<i class="fa fa-file-excel-o fa-green" aria-hidden="true"></i>';
            break;
        case 'application/pdf':
            return '<i class="fa fa-file-pdf-o fa-red" aria-hidden="true"></i>'

        case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
            return '<i class="fa fa-file-word-o fa-blue" aria-hidden="true"></i>';
            break;
        case 'application/vnd.ms-excel':
            return '<i class="fa fa-file-word-o fa-blue" aria-hidden="true"></i>';
            break;
        default:
            return '<i class="fa fa-file-o" aria-hidden="true"></i>';
        }
    }

    function getFile(value) {
        var markup = $('<li><a href="/uploaddanatunai/show/'+value.slugwithoutExt+'" target="_blank">'+get_mime(value.mime)+value.filename+'<a><span class="pull-right"><a onclick="deleteUpload(this, '+value.id+')"><i class="fa fa-times fa-red" aria-hidden="true"></i></a></span></li>');
        $('#UploadColalteral ul').append(markup);
    }


</script>

