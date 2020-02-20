<div class="form-group">
	<label class="col-sm-2 control-label" for="title">Title</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Title" name="title" value="{{ old('title', isset($category) ? $category->title : null) }}" type="text" id="title">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="parent_id">Parent</label>
	<div class="col-sm-3">
		<select class="form-control" name="parent_id" id="parent_id">
			<option value="0">None</option>
			@foreach ($parents as $parent)
			<option value="{{ $parent->id }}" {{ $parent->id == old('parent_id', isset($category) ? $category->parent_id : null ) ? 'selected="selected"' : null }}>{{ $parent->title }}</option>
			@endforeach
		</select>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="details">Details</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="8" placeholder="Details" name="details" id="details">{{ old('details', isset($category) ? $category->details : null) }}</textarea>
	</div>
</div>
{{-- <div class="form-group">
	<label class="col-sm-2 control-label" for="image">Image</label>
	<div class="col-sm-10">
		<input type="file" name="image" id="image">
		Image size: 900X400px
	</div>
</div> --}}
{{--<div class="form-group">--}}
{{--	<label class="col-sm-2 control-label" for="meta_title">Meta title</label>--}}
{{--	<div class="col-sm-10">--}}
{{--		<textarea class="col-md-8 form-control" rows="4" placeholder="Meta title" name="meta_title" id="meta_title">{{ old('meta_title', isset($category) ? $category->meta_title : null) }}</textarea>--}}
{{--	</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--	<label class="col-sm-2 control-label" for="meta_description">Meta description</label>--}}
{{--	<div class="col-sm-10">--}}
{{--		<textarea class="col-md-8 form-control" rows="4" placeholder="Meta description" name="meta_description" id="meta_description">{{ old('meta_description', isset($category) ? $category->meta_description : null) }}</textarea>--}}
{{--	</div>--}}

{{--</div>--}}
{{--<div class="form-group">--}}
{{--	<label class="col-sm-2 control-label" for="meta_keyword">Meta keyword</label>--}}
{{--	<div class="col-sm-10">--}}
{{--		<textarea class="col-md-8 form-control" rows="4" placeholder="Meta keyword" name="meta_keyword" id="meta_keyword">{{ old('meta_keyword', isset($category) ? $category->meta_keyword : null) }}</textarea>--}}
{{--	</div>--}}
{{--</div>--}}