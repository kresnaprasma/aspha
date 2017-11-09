<div class="row">
    <div class="col-md-12">
	    <!-- Custom Tabs -->
	    <div class="nav-tabs-custom">
	        <ul class="nav nav-tabs">
		        <li class="active"><a href="#tab_type" data-toggle="tab">Type</a></li>
		        <li><a href="#tab_spec" data-toggle="tab">Spesification</a></li>
		        <li><a href="#tab_4" data-toggle="tab">Checklist</a></li>
		        <li><a href="#tab_3" data-toggle="tab">Upload Mokas</a></li>
		        <li class="dropdown">
		        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
		            	Action <span class="caret"></span>
		            </a>
		            <ul class="dropdown-menu">
			            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Search</a></li>
			            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Export</a></li>
			            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Import</a></li>
			            <li role="presentation" class="divider"></li>
			            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Print</a></li>
			        </ul>
		        </li>
	        </ul>
	        <div class="tab-content">
	        	<div class="tab-pane active" id="tab_type">
	        		@include('admin.mokas._tab1')
	        	</div>
	          	<!-- /.tab-pane -->
		        <div class="tab-pane" id="tab_spec">
				    @include('admin.mokas._tab2')
		        </div>
		        <!-- /.tab-pane -->
		        <div class="tab-pane" id="tab_4">
		            @include('admin.mokas._tab4')
		        </div>
	        	<!-- /.tab-pane -->
		        <div class="tab-pane" id="tab_3">
		            @include('admin.mokas._tab3')
		        </div>
	        <!-- /.tab-pane -->
	        </div>
	        <!-- /.tab-content -->
	    </div>
	      <!-- nav-tabs-custom -->
	</div>
    <!-- /.col -->
</div>