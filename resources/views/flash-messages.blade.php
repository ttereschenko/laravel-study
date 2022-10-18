@if(session()->has('success'))
    <div class="alert alert-success">{{ session()->get('success') }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">Error!</div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger">{{ session()->get('error') }}</div>
@endif


@if(session()->has('confirmation-alert'))
    <div id="confirmation-alert" class="alert alert-danger">Please, confirm your email</div>
@endif

