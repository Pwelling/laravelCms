@extends('layouts.app')

@section('content')
<div class="container">
	<meta name="csrf_token" content="{{ csrf_token() }}" />
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
						<td class="bewerkCol"><a onclick="removeGroup('{{ $group->name }}',{{ $group->id }});" class="verwijderLink">X</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
</div>	
@endsection

@section('footerscripts')
<script type="text/javascript">
	function removeGroup(gName,gId){
		$.ajax({
			url: '/checkGroupRemoval',
			data: { gId: gId,_token: $('meta[name="csrf_token"]').attr('content')},
			datatype: 'json',
			method: 'post'
		}).done(function(data){
			if(data.result == true){
				if(confirm('Weet je zeker dat je deze groep wilt verwijderen?')){
					
				}
			} else {
				alert('Deze groep kan niet verwijderd worden.Verplaats eerst de nog gekoppelde pagina\'s of verwijder deze.');
			}
		});
	}
</script>
@endsection