<div class="form-group">
	<label class="col-sm-2 control-label" for="image">Image</label>
	<div class="col-sm-10">
		<input type="file" name="image" id="image">
		{{-- Image size: 900X400px --}}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="image_caption">Image Caption</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="8" placeholder="Image Caption" name="image_caption" id="image_caption">{{ old('image_caption', isset($gallery) ? $gallery->image_caption : null) }}</textarea>
	</div>
</div>