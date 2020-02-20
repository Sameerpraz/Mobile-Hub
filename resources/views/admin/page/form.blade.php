<div class="form-group">
	<label class="col-sm-2 control-label" for="parent_id">Parent</label>
	<div class="col-sm-3">
		<select class="form-control" name="parent_id" id="parent_id">
			<option value="0">None</option>
			@foreach ($parents as $parent)
			<option value="{{ $parent->id }}" {{ $parent->id == old('parent_id', isset($page) ? $page->parent_id : null ) ? 'selected="selected"' : null }}>{{ $parent->title }}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="title">Title</label>
	<div class="col-sm-4">
		<input class="col-md-4 form-control" placeholder="Title" name="title" value="{{ old('title', isset($page) ? $page->title : null) }}" type="text" id="title">
	</div>

	<label class="col-sm-2 control-label" for="slug">Alias</label>
	<div class="col-sm-4">
		<input class="col-md-4 form-control" placeholder="Alias" name="slug" value="{{ old('slug', isset($page) ? $page->slug : null) }}" type="text" id="slug">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="position">Position</label>
	<div class="col-sm-3">
		<select class="form-control" name="position" id="position">
			<option value="0" {{ old('position', isset($page) ? $page->position : '') == 0 ? 'selected="selected"' : null }}>None</option>
			<option value="1" {{ old('position', isset($page) ? $page->position : '') == 1 ? 'selected="selected"' :  null}}>Top</option>
			<option value="2" {{ old('position', isset($page) ? $page->position : '' ) == 2 ? 'selected="selected"' : null }}>Footer</option>
			<option value="3" {{ old('position', isset($page) ? $page->position : '' ) == 3 ? 'selected="selected"' : null }}>Both</option>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="details">Details</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="8" placeholder="Details" name="details" id="details">{{ old('details', isset($page) ? $page->details : null) }}</textarea>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="image">Image</label>
	<div class="col-sm-10">
		@if(isset($page) && $page->image)
			<img src="{{asset('/uploads/page/'.$page->image)}}" height="100">
			<a href="{{route('pages.photodelete',$page->id)}}" class="btn btn-danger">Delete this image</a>
		@endif
		<input type="file" name="image" id="image">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="meta_title">Meta title</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="4" placeholder="Meta title" name="meta_title" id="meta_title">{{ old('meta_title', isset($page) ? $page->meta_title : null) }}</textarea>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="meta_description">Meta description</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="4" placeholder="Meta description" name="meta_description" id="meta_description">{{ old('meta_description', isset($page) ? $page->meta_description : null) }}</textarea>
	</div>

</div>
<div class="form-group">
	<label class="col-sm-2 control-label" for="meta_keyword">Meta keyword</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="4" placeholder="Meta keyword" name="meta_keyword" id="meta_keyword">{{ old('meta_keyword', isset($page) ? $page->meta_keyword : null) }}</textarea>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-3 col-sm-offset-2">
		<div class="custom-control custom-checkbox mr-sm-2">
			<input type="checkbox" class="custom-control-input" id="status" name="status"  value="1" {{ old('status', isset($page) ? $page->status : 1) == 1 ? 'checked=checked' : null  }}>
			<label class="custom-control-label" for="status">Active</label>
		</div>
	</div>
</div>