<div class="form-group">
	<label class="col-sm-2 control-label" for="name">Name</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Name" name="name" value="{{ old('name', isset($review) ? $review->name : null) }}" type="text" id="name">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="email">Email</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Email" name="email" value="{{ old('email', isset($review) ? $review->email : null) }}" type="text" id="email">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="title">Title</label>
	<div class="col-sm-6">
		<input class="col-md-4 form-control" placeholder="Title" name="title" value="{{ old('title', isset($review) ? $review->title : null) }}" type="text" id="title">
	</div>
</div>



<div class="form-group">
	<label class="col-sm-2 control-label" for="details">Details</label>
	<div class="col-sm-10">
		<textarea class="col-md-8 form-control" rows="8" placeholder="Details" name="details" id="details">{{ old('details', isset($review) ? $review->details : null) }}</textarea>
	</div>
</div>
 <div class="form-group">
	<label class="col-sm-2 control-label" for="image">Image</label>
	<div class="col-sm-10">
		<input type="file" name="image" id="image">
	</div>
</div>