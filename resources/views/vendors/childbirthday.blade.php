<table class="table table-striped table-bordered  mb-none">
	<tbody class="log-viewer">
		@foreach($datachild as $vendor_child)
		<tr class="btable gradeA">
			<td class="btname" style="width:200px;"> {{$vendor_child->vendor_child_name}} </td>
			<td class="" style="width:120px"> {{$vendor_child->vendor_child_birthday}} </td>
			<td class="" style="width:120px"><button id="delete-btn" style="width:100px" class="btn btn-primary" type="button" data-family_id="{{$vendor_child->vendor_child_id}}" data-family_name="{{$vendor_child->vendor_child_name}}" data-rdmcode="{{$vendor_child->vendor_child_birthday}}">Remove</button></td>
		</tr>
		@endforeach
	</tbody>

</table>