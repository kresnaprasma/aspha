@extends('layout.admin')

@section('content')

	<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

@section('content')
	<section class="content">
		{!! Form::model($loan = new \App\Loan, ['route' => 'admin.loan.store', 'class'=>'form-horizontal', 'id'=>'formCreateLoan']) !!}
		@include('admin.loan._form',['edit'=>false])
		{!! Form::close() !!}
	</section>
@stop

@section('scripts')
	@include('admin.loan._js')

    	<script type="text/javascript" src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>

		<script type="text/javascript">
		    $(document).ready(function() {
		        $('select[name="merk"]').on('change', function() {
		            var merkID = $(this).val();
		            if(merkID) {
		                $.ajax({
		                    url: '/admin/loan/ajax/'+merkID,
		                    type: "GET",
		                    dataType: "json",
		                    success:function(data) {
            
		                        $('select[name="type"]').empty();
		                        $.each(data, function(key, value) {
		                            $('select[name="type"]').append('<option value="'+ key +'">'+ value +'</option>');
		                        });
		                    }
		                });
		            }else{
		                $('select[name="type"]').empty();
		            }
		        });
		    });
    	</script>
    	
    	{{-- <script type="text/javascript">
			var previewNode = document.querySelector("#template");
			previewNode.id = "";
			var previewTemplate = previewNode.parentNode.innerHTML;
			previewNode.parentNode.removeChild(previewNode);

			var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
			url: "dropzone.php",
			params: "file[]",  // Set the url
			thumbnailWidth: 80,
			thumbnailHeight: 80,
			parallelUploads: 20,
			previewTemplate: previewTemplate,
			autoQueue: false, // Make sure the files aren't queued until manually added
			previewsContainer: "#previews", // Define the container to display the previews
			clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
			});

		myDropzone.on("addedfile", function(file) {
			file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
		});

		// Update the total progress bar
		myDropzone.on("totaluploadprogress", function(progress) {
			document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
		});

		myDropzone.on("sending", function(file) {
			// Show the total progress bar when upload starts
			document.querySelector("#total-progress").style.opacity = "1";
			// And disable the start button
			file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
		});

		// Hide the total progress bar when nothing's uploading anymore
		myDropzone.on("queuecomplete", function(progress) {
			document.querySelector("#total-progress").style.opacity = "0";
		});

		// Setup the buttons for all transfers
		// The "add files" button doesn't need to be setup because the config
		// `clickable` has already been specified.
		document.querySelector("#actions .start").onclick = function() {
			myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
		};
	
		document.querySelector("#actions .cancel").onclick = function() {
			myDropzone.removeAllFiles(true);
		};

		// Now fake the file upload, since GitHub does not handle file uploads
		// and returns a 404

		var minSteps = 6,
		maxSteps = 60,
		timeBetweenSteps = 100,
		bytesPerStep = 100000;

		myDropzone.uploadFiles = function(files) {
		var self = this;

		for (var i = 0; i < files.length; i++) {

			var file = files[i];
			totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

			for (var step = 0; step < totalSteps; step++) {
				var duration = timeBetweenSteps * (step + 1);
				setTimeout(function(file, totalSteps, step) {
				return function() 
				{
					file.upload = {
                		progress: 100 * (step + 1) / totalSteps,
                		total: file.size,
                		bytesSent: (step + 1) * file.size / totalSteps
                };

                self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
                if (file.upload.progress == 100) {
                	file.status = Dropzone.SUCCESS;
						self.emit("success", file, 'success', null);
						self.emit("complete", file);
						self.processQueue();
    					}
    				};
    			}(file, totalSteps, step), duration);
    		}
    	}
    }
    </script> --}}
@stop