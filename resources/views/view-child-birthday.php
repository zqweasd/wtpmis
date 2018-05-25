

	<table class="table table-striped table-bordered  mb-none">
	<tbody class="log-viewer">
		@foreach($data as $family)
		<tr class="btable gradeA">
			<td class="btname"> {{$family->family_name}} </td>
			<td class="" style="width:120px"> {{$family->family_age}} </td>
			<td class="" style="width:200px"> {{$family->family_status}} </td>
			<td class="" style="width:200px"> {{$family->family_relation}} </td>
			<td class="btname" style="width:300px"> {{$family->family_school}} </td>
			<td class="btname" style="width:300px"> {{$family->family_occupation}} </td>
			<td class="" style="width:120px"><button id="delete-btn" style="width:100px" class="btn btn-primary" type="button" data-family_id="{{$family->id}}" data-family_name="{{$family->family_name}}" data-rdmcode="{{$family->applicant_code_no}}">Remove</button></td>
		</tr>
		@endforeach
	</tbody>
</table>