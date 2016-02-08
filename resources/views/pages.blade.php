@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Paginas</h1>
	<a href="/newGroup">Toevoegen</a>
	@if (count($groups) > 0)
		<table border="0" cellpadding="0" cellspacing="0" class="overzicht">
			<tbody>
				@foreach ($groups as $group)
					<tr class="groupRow" onclick="showHidePageGroup('group{{$group->id}}');">
						<td class="nameCol" width="400">{{ $group->name }} ({{ count($group->pages)}})</td>
					</tr>
					@if( count($group->pages) > 0)
						<tr id="group{{$group->id}}" class="pageRow" style="display:none;">
							<td>
								<table  border="0" cellpadding="0" cellspacing="0" class="paginas">
									<tr>
										<th width="300">Naam</th>
										<th width="100">Bewerk</th>
										<th width="100">Verwijder</th>
									</tr>
									{{-- */ $i=0; /* --}}
									@foreach ($group->pages as $page)
									<tr class="@if($i++%2 == 0)even @else oneven @endif">
										<td>{{ $page->title }}</td>
										<td>bewerk</td>
										<td>verwijder</td>
									</tr>
									@endforeach
								</table>
							</td>
						</tr>
					@endif
				@endforeach
			</tbody>
		</table>
	@endif
</div>	
@endsection

@section('footerscripts')
<script type="text/javascript">
	function showHidePageGroup(pageR){
		$('.pageRow').hide();
		$('#'+pageR).show();
	}
	
</script>
@endsection