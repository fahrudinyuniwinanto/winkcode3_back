@extends('layout.frontend')
@section('content')
<div class="container">
    <div id="calendar" class="vertical-box-column p-15 calendar"></div>
</div>
<script>
    $(document).ready(function() {
			Calendar.init();
		});
</script>
@endsection