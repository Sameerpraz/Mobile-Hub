<div class="form-group">
	<label class="col-sm-2 control-label" for="title">Title</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Title" name="title" value="{{ old('title', isset($item) ? $item->title : null) }}" type="text" id="title">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="category_id">Category</label>
	<div class="col-sm-3">
		<select class="form-control" name="category_id" id="category_id">
			<option value="0">None</option>
			@foreach ($categories as $category)
				<option value="{{ $category->id }}" {{ $category->id == old('category_id', isset($item) ? $item->category_id : null ) ? 'selected="selected"' : null }}>{{ $category->title }}</option>
				@foreach ($category->child as $child)
					<option value="{{ $child->id }}" {{ $child->id == old('category_id', isset($item) ? $item->category_id : null ) ? 'selected="selected"' : null }}>--{{ $child->title }}</option>				
				@endforeach
			@endforeach
		</select>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="price">Price</label>
	<div class="col-sm-6">
		<div class="input-group">
	        <span class="input-group-addon">Rs.</span>
	        <input class="col-md-4 form-control" placeholder="Price" name="price" value="{{ old('price', isset($item) ? $item->price : null) }}" type="number" step="any" id="price">
	    </div>
	</div>
</div>



<div class="form-group">
	<label class="col-sm-2 control-label" for="details">Details</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="8" placeholder="Details" name="details" id="details">{{ old('details', isset($item) ? $item->details : null) }}</textarea>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="image">Image</label>
	<div class="col-sm-10">
		<input type="file" name="image" id="image">
		{{-- Image size: 900X400px --}}
	</div>
</div>