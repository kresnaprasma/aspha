@extends('layout.admin')

@section('content')

	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset("/assets/dist/dropzone.css") }}">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script type="text/javascript" src="{{ asset("/assets/dist/dropzone.js") }}"></script>

	<script>
		Dropzone.autoDiscover = false;
	</script>

	<style>
    	html, body {
      		height: 100%;
		}

		#actions {
			margin: 2em 0;
			}


		/* Mimic table appearance */
		div.table {
			display: table;
		}
		div.table .file-row {
			display: table-row;
		}
		div.table .file-row > div {
			display: table-cell;
			vertical-align: top;
			border-top: 1px solid #ddd;
			padding: 8px;
		}
		div.table .file-row:nth-child(odd) {
			background: #f9f9f9;
		}

	/* The total progress gets shown by event listeners */
		#total-progress {
			opacity: 0;
			transition: opacity 0.3s linear;
		}

    /* Hide the progress bar when finished */
		#previews .file-row.dz-success .progress {
			opacity: 0;
			transition: opacity 0.3s linear;
		}

	/* Hide the delete button initially */
		#previews .file-row .delete {
			display: none;
		}

    /* Hide the start and cancel buttons and show the delete button */

		#previews .file-row.dz-success .start,
		#previews .file-row.dz-success .cancel {
			display: none;
		}
		#previews .file-row.dz-success .delete {
			display: block;
		}
	</style>

	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Customer Upload</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				@include('admin.loan.customerupload._form')
			</div>
		</div>
	</div>

@stop

@section('scripts')

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
		return function() {
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
@stop