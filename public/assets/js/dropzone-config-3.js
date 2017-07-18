var photo_counter = 0;
Dropzone.options.realDropzone = {
	uploadMultiple: false,
	parallelUploads: 100,
	maxFilesize: 8,
	autoProcessQueue: false,
	previewsContainer: '#dropzonePreview',
	previewTemplate: document.querySelector('#preview-template').innerHTML,
	addRemoveLinks: true,
	dictRemoveFile: 'Remove',
	dictFileTooBig: 'Image is bigger than 8MB',

	//The setting up of the dropzone
	init:function() {

		var myDropzone = this;

		$('#submitfiles').on('click', function(e) {
			e.preventDefault();
			e.stopPropagation();

			if (myDropzone.getQueuedFiles().lenght > 0) {
				myDropzone.processQueue();
			}else{
				alert('No files to Upload!');
			}
		});
	}
}