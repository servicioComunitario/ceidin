@if (session()->has('msg_success'))
	<div class="alert alert-success alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong><i class="fa fa-check-circle" aria-hidden="true"></i> </strong> 
		{{ session()->get('msg_success') }}
	</div>
@endif

@if (session()->has('msg_danger'))
	<div class="alert alert-danger alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i> </strong> 
		{{ session()->get('msg_danger') }}
	</div>
@endif

@if (session()->has('msg_warning'))
	<div class="alert alert-warning alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> </strong> 
		{{ session()->get('msg_warning') }}
	</div>
@endif

@if (session()->has('msg_info'))
	<div class="alert alert-info alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong><i class="fa fa-info-circle" aria-hidden="true"></i> </strong> 
		{{ session()->get('msg_info') }}
	</div>
@endif

@if (session()->has('msg_default'))
	<div class="alert alert-default alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong><i class="fa fa-circle" aria-hidden="true"></i> </strong> 
		{{ session()->get('msg_default') }}
	</div>
@endif