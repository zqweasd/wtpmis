<table class="table table-striped table-bordered  mb-none">
	<tbody class="log-viewer">
		@foreach($data as $vendor_helper)
		<tr class="btable gradeA">
			<td class="btname" style="width:200px;"> {{$vendor_helper->vendor_helper_surname}} </td>
			<td class="" style="width:120px"> {{$vendor_helper->vendor_helper_firstname}} </td>
			<td class="" style="width:120px"> {{$vendor_helper->vendor_helper_middlename}} </td>
			<td class="" style="width:120px"><button id="delete-btn" style="width:100px" class="btn btn-primary" type="button" data-helper_id="{{$vendor_helper->vendor_helper_id}}" data-helper_surname="{{$vendor_helper->vendor_helper_surname}}" data-helper_firstname="{{$vendor_helper->vendor_helper_firstname}}" data-helper_middlename="{{$vendor_helper->vendor_helper_middlename}}">Remove</button></td>
		</tr>
		@endforeach
	</tbody>

</table>