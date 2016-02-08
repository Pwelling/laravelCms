@extends('layouts.app')

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="container">
	@if(isset($group))
		{!! Form::model($group, array('route' => array('groupUpdate', $group->id))) !!}
	@else
		{!! Form::open(['route' => 'groupInsert']) !!}
	@endif
    	<table width="350" border="0" cellpadding="0" cellspacing="0" class="">
    		<tr>
    			<th>Naam</th>
    			<td>{!! Form::text('name') !!}</td>
    		</tr>
    	</table>
    	<br clear="all" />
    	<p>{!!  Form::submit('opslaan', array('class' => 'opslaan')) !!}</p>
	{!! Form::close() !!}
</div>	
@endsection

@section('footerscripts')
<script type="text/javascript">
	$(function(){
		setTimeout(function(){
			$('.alert').hide();
		},5000);
	});
</script>
@endsection
