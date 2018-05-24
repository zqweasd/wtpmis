<?php namespace App\Libraries;


use App\Models\Item;
use App\Models\ItemPhoto;


class ZimmBid
{
	static public function itemCategories()
	{
		$categories = [
			'Antiquities',
			'Architectural & Garden',
			'Asian Antiques',
			'Books & Manuscripts',
			'Decorative Arts',
			'Ethnographic',
			'Furniture',
			'Home & Hearth'
		];
		
		return $categories;
	}
	
	static public function itemPhotos($item_id)
	{
		$item = Item::find($item_id);
	
		$html 	=	'';

		for ($i = 1; $i <= 15 ;$i++) {
		
			$item_photo = ItemPhoto::where('item_id','=',$item->id)->where('photo_no','=',$i)->first();
			
			if ($item_photo) {
				
				if ($item_photo->width > $item_photo->height) {
					$type = 'img-horizontal';
				} else if ($item_photo->width < $item_photo->height) {
					$type = 'img-vertical';
				} else {
					$type = 'img-center';
				}
				
			
				$html .= '
					<div class="col-md-3">
					<div class="item-photo-container" id="item-photo-'.$i.'" style="position:relative; width:100%; height:220px; color:white; border:1px solid #e9eaed;">
						<img class="'.$type.'" src="/uploads/'.$item->user_id.'/items/'.$item_photo->name.'">
					</div>
					
					<div style="border:1px solid #e9eaed; padding:2px 5px;">
						
						<div data-form="'.$i.'" class="upload-photo" id="upload-photo-button-'.$i.'">
							<span class="fa fa-cloud-upload"></span> <span class="upload-label">Upload a photo</span>
						</div>
						
					
					</div>

					
					<form id="upload-photo-form-'.$i.'" action="/item/photo/upload" method="POST">
						<input value="'.$item_photo->item_id.'" type="hidden" name="item_id">
						<input value="'.$i.'" type="hidden" name="photo_no">
						<input class="upload-photo-control" id="upload-photo-'.$i.'" style="display:none;" type="file" name="photo">
					</form>
					</div>';
				
			} else {
			
			
				$html .= '
					<div class="col-md-3">
					<div class="item-photo-container" id="item-photo-'.$i.'" style="position:relative; width:100%; height:220px; color:white; border:1px solid #e9eaed;">
						<img class="img-center" src="/img/empty-photo.png">
					</div>
					
					<div style="border:1px solid #e9eaed; padding:2px 5px;">
						
						<div data-form="'.$i.'" class="upload-photo" id="upload-photo-button-'.$i.'">
							<span class="fa fa-cloud-upload"></span> <span class="upload-label">Upload a photo</span>
						</div>
						
					
					</div>

					
					<form id="upload-photo-form-'.$i.'" action="/item/photo/upload" method="POST">
						<input value="'.$item->id.'" type="hidden" name="item_id">
						<input value="'.$i.'" type="hidden" name="photo_no">
						<input class="upload-photo-control" id="upload-photo-'.$i.'" style="display:none;" type="file" name="photo">
					</form>
					</div>';
			}

		}
		
		return $html;
	}
}