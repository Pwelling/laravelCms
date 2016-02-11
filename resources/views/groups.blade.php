@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Groepen</h1>
	<a href="/newGroup">Toevoegen</a>
	@if (count($groups) > 0)
		<table border="0" cellpadding="0" cellspacing="0" class="overzicht">
			<thead>
				<tr>
					<th class="nameCol">Naam</th>
					<th class="bewerkCol">Bewerken</th>
					<th class="bewerkCol">Verwijder</th>
				</tr>
			</thead>
			<tbody>
				{{-- */ $i=0; /* --}}
				@foreach ($groups as $group)
					<tr class="@if($i++%2 == 0)even @else oneven @endif">
						<td class="nameCol"><a href="/group/{{ $group->name }}">{{ $group->name }}</a></td>
						<td class="bewerkCol"><a href="/group/{{ $group->name }}" class="bewerkLink">bewerk</a></td>
						<td class="bewerkCol">
							<form action="{{ url('groups/remove/'.$group->id) }}" method="POST">
								{!! csrf_field() !!}
								{!! method_field('DELETE') !!}
								<button>Verwijderen</button>
        					</form>
        				</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
</div>	
@endsection

@section('footerscripts')
<script type="text/javascript">
	function removeGroup(gName){
		alert(gName);
	}
	
</script>
@endsection