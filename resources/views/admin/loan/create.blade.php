@extends('layout.admin')

@section('content')

	<script type="text/javascript" src="{{ asset('assets/js/dropzone.js') }}"></script>
	<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>  <!-- js for the add files area /-->

    
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Cash Loan<small>» Request New Loan</small></h3>
				   <div class="box-tools pull-right">
				   		<a href="/admin/loan/">
                            {{-- <i aria-hidden="true"></i>
                            <b>Back</b> --}}
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
				      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				   </div>
				</div>
				<div class="box-body">
					{!! Form::open(['route' => 'admin.loan.store']) !!}
					<input type="hidden" name="_token" value={{ csrf_token() }}/>
					{{-- @if(count($errors))
			    		<div class="alert alert-danger">
			    			<strong>Whoops!</strong> There were some problems with your input.
			    			<br/>
			    			<ul>
			    				@foreach($errors->all() as $error)
			    				<li>{{ $error }}</li>
			    				@endforeach
			    			</ul>
			    		</div>
			    	@endif --}}

						@include('admin.loan._form')
						<div class="row">
						</div>
				</div>
			</div>
		</div>
	</div>

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
    	
    	<script type="text/javascript">
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
    </script>

   {{--  <script type="text/javascript">
    	$.validator.setDefaults( {
    		submitHandler: function () {
    			alert("submitted!");
    		}
    	} );

    	$(document).ready(function() {
    		$("#signupForm").validate({
    			rules: {
    				merk: "required",
    				type: "required",
    				vehicle_color: "required",
    				vehicle_cc: "required",
    				vehicle_date: "required",
    				bpkb: {
    					required: true,
    					minlength: 10,
    					maxlength: 10
    				},
    				stnk_due_date: "required",
    				tenor: "required",
    				price_request: "required"

    			},
    			messages: {
    				merk: "Harap masukkan merk motor anda",
    				type: "Harap masukkan type motor anda",
    				vehicle_color: "Harap masukkan warna motor anda",
    				vehicle_cc: "Berapa CC motor anda?",
    				vehicle_date: "Harap masukkan tanggal keluaran motor anda",
    				bpkb: {
    					required: "Harap masukkan nomor bpkb kendaraan anda",
    					minlength: "Kurang memasukkan digit angka bpkb",
    					maxlength: "Kelebihan digit angka bpkb",
    				},
    				stnk_due_date: "Masukkan tanggal berakhirnya pajak",
    				tenor: "Masukkan tenor tempo pengembalian",
    				price_request: "Masukkan banyaknya peminjaman yang anda inginkan"
    			},
    			errorElement: "em",
    			errorPlacement: function(error, element) {
    				error.addClass('help-block');

    				if (element.prop("type") === "checkbox" ) {
    					error.insertAfter(element.parent("label"));
    				}else{
    					error.insertAfter('element');
    				}
    			},
    			highlight: function (element, errorClass, validClass) {
    				$(element).parents(".col-sm-5").addClass('has-error').removeClass('has-success');
    			},
    			unhighlight: function (element, errorClass, validClass) {
    				$(element).parents(".col-sm-5").addClass('has-success').removeClass('has-error');
    			}
    		});
    	});
    </script> --}}
@stop