@can('isPeasant')
<script type="text/javascript">
	@if(count(Auth::user()->bankDetails) > 0)
    window.location ="{{ url('peasant') }}";

    @else
    window.location ="{{ url('bankDetails1') }}";

    @endif
</script>
@endcan

@can('isBuyer')
<script type="text/javascript">
	@if(count(Auth::user()->bankDetails) > 0)
    window.location ="{{ url('buyer') }}";

    @else
    window.location ="{{ url('bankDetails2') }}";

    @endif
   
</script>
@endcan

@can('isClerk')
<script type="text/javascript">
		@if(count(Auth::user()->paswdStatus) == 2)
    window.location ="{{ url('changepaswd') }}";

    @else
    window.location ="{{ url('clerk') }}";

    @endif
    
</script>
@endcan

@can('isOfficer')
<script type="text/javascript">
		@if(count(Auth::user()->paswdStatus) == 2)
    window.location ="{{ url('changepaswd') }}";

    @else
    window.location ="{{ url('officer') }}";

    @endif
    
</script>
@endcan

@can('isSysAdmin')
<script type="text/javascript">
		@if(count(Auth::user()->paswdStatus) == 2)
    window.location ="{{ url('changepaswd') }}";

    @else
    window.location ="{{ url('admin') }}";

    @endif
</script>
@endcan
