@if (!isset($label))
<div class="form-group">
	<label class="col-sm-2 control-label" for="page">Page</label>
	<div class="col-sm-3">
		<select class="form-control" name="page" id="page">
			<option value="">Select Page</option>			
			@foreach ($pages as $page)				
			<option value="{{ $page }}">{{ $page }}</option>			
			@endforeach
		</select>
	</div>
</div>
@endif

<div class="form-group">
	<label class="col-sm-2 control-label" for="labelid">Label Id</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="label Id" name="labelid" value="{{ old('labelid', isset($label) ? $label->labelid : null) }}" type="text" id="labelid" {{ isset($label) ? 'readonly="readonly"' : null }}>
	</div>
</div>


<div class="form-group">
	<label class="col-sm-2 control-label" for="value">Value</label>
	<div class="col-sm-8">
		<textarea rows="5" class="form-control" placeholder="Value" name="value" id="value">{{ old('value', isset($label) ? $label->value : null) }}</textarea>
	</div>
</div>