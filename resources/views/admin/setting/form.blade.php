<div class="form-group">
	<label class="col-sm-2 control-label" for="title">Title</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Title" name="title" value="{{ old('title', isset($setting) ? $setting->title : null) }}" type="text" id="title" {{ isset($setting) ? 'readonly="readonly"' : null }}>
	</div>
</div>


<div class="form-group">
	<label class="col-sm-2 control-label" for="value">Value</label>
	<div class="col-sm-8">
		<textarea rows="5" class="form-control" placeholder="Value" name="value" id="value">{{ old('value', isset($setting) ? $setting->value : null) }}</textarea>
	</div>
</div>