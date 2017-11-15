<script type="text/javascript">
  var checkload = true;
	var upload_url = "/api/v1/profile/";
  var id_employee = 0;
	/*dropzone*/
	var myDropzone = new Dropzone(document.body, { 
		// Make the whole body a dropzone
    	url: "{{ route('profile.store') }}",
    	paramName: "profile",
    	createImageThumbnails: false,
    	previewTemplate : '<div style="display:none"></div>',
    	parallelUploads: 20,
    	clickable: ".fileinput-button",
    	// Define the element that should be used as click trigger to select files.
  	});

	myDropzone.on("sending", function(file, xhr, formData){
		console.log('upload started', file);
		// $('.progress').show();
		formData.append("nip", '1001');
		// alert($('input[name=nip').val());
	});

  	myDropzone.on("totaluploadprogress", function(progress){
    	console.log("progress", progress);
    	$('.progress-bar').width(progress + '%');
    	$('#progress-val').text(progress + '%');
  	});

  	myDropzone.on("queuecomplete", function(progress){
    	$('.progress').hide();
  	});

  	myDropzone.on("success", function(file, response){
  		console.log('url', response.url);
  		console.log('filename', response.filename);
    	$('#profile_img').attr('src', upload_url+response.url + '?' + new Date().getTime());
      $('#profile_id').val(response.url);
    	$( ".btn-upload-profile" ).hide();
  		$( ".btn-delete-profile" ).show();

  	});
  	myDropzone.on("error", function(file, response){
  		console.log(response);
  	});

  	/*End Dropzone*/

	function save() {
    checkload = false;
		$('.form-control').prop('disabled',false);
		$('#formEmployee').submit();
	}

	function deletePicture() {
		var id = $("#profile_id").val();
    
		$.ajax({
    		url: upload_url+id,
    		type: 'DELETE',
    		success: function(response){
    			console.log(response);
    			$( ".btn-upload-profile" ).show();
  				$( ".btn-delete-profile" ).hide();
  				$('#profile_img').attr('src', '');
  				$('#profile_text').val('');
    		}
	    });
	}

	function createNo(){
		$.ajax({
      url: '{{ route('api.human-resource.employee.createnip') }}',
      type: 'POST',
      success: function(response){
        console.log(response);
        $("input[name=nip]").val(response.employee_nip);
        $("#id_employee").val(response.employee_id);
        id_employee = response.employee_id;
      },
      error: function(response){
        console.log(response);
      }
		})
	}

  function getPicture(){
    var id = $("input[name=id]").val();
    
    $.ajax({
      url: '/api/v1/human-resource/employee/'+id,
      type: 'GET',
      success: function(response){
        $('#profile_img').attr('src', upload_url+response.data.employee_pictures[0].id + '?' + new Date().getTime());
        $( ".btn-upload-profile" ).hide();
        $( ".btn-delete-profile" ).show();
        $('#profile_id').val(response.data.employee_pictures[0].id);
      },
      error: function(response){
        console.log(response);
      }
    })
  }
</script>