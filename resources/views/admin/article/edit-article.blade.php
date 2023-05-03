@extends('admin.layouts.master')

@section('title', 'Edit Article')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
		<div class="container-full">
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="card-header">
								<div class="box bg-primary-light mb-0">
									<div class="box-body d-flex px-0">
										<div class="flex-grow-1 px-30 flex-grow-1 bg-img dask-bg bg-none-md" style="background-position: right bottom; background-size: auto 100%; background-image: url({{asset('ed_admin/images/svg-icon/color-svg/custom-1.svg')}})">
											<div class="row">
												<div class="col-12 col-xl-7">
													<h3 class="fw-bolder">Edit Article</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								@include('admin.templetes.flash-message')
								<form action="{{route('admin.update.article', $data->id)}}" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="row">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div>
												<div class="form-group">
													<label for="title" class="mb-2">Article Title</label>
													<input type="text" class="form-control" name="title" id="title" value="{{$data->title}}">
												</div>
												<div class="form-group">
													<label for="category_id" class="mb-2">Category Name</label>
													<select name="category_id" id="category_id" class="form-control">
														<option value="">Please a category</option>
														@foreach ($categories as $category)
															<option value="{{$category->id}}" {{ $category->id == $data->category_id? 'selected' : '' }}>{{$category->cat_name}}</option>
														@endforeach
													</select>
												</div>
												<div class="form-group">
													<label for="secondary_categories" class="mb-2">Sub Category Name (Optional)</label>
													<select name="secondary_categories[]" id="secondary_categories" class="form-control" multiple="multiple">
														@foreach ($categories as $category)
															<option value="{{$category->id}}">{{$category->cat_name}}</option>
														@endforeach
													</select>
												</div>
												<div class="form-group">
													<label for="meta_keyword" class="mb-2">Meta Keyword</label>
													<input type="text" class="form-control" name="meta_keyword" id="meta_keyword" value="{{$data->meta_keyword}}">
												</div>
												<div class="form-group">
													<label for="meta_description" class="mb-2">Meta Description</label>
													<input type="text" class="form-control" name="meta_description" id="meta_description" value="{{$data->meta_description}}">
												</div>
												<div class="form-group">
													<label for="page_title" class="mb-2">Page Title</label>
													<input type="text" class="form-control" name="page_title" id="page_title" value="{{$data->page_title}}">
												</div>
												<div class="form-group">
													<label for="thumbnail" class="mb-2">Old Thumbnail</label><br>
													<img src="{{asset('uploads/article/thumbnail/'.$data->thumbnail)}}" alt="" width="50">
												</div>
												<div class="form-group">
													<label for="thumbnail" class="mb-2">Thumbnail</label>
													<input type="file" class="form-control" name="thumbnail" id="thumbnail" placeholder="Please upload thumbnail">
												</div>
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="author_id" class="mb-2">Auther</label>
												<select name="author_id" id="author_id" class="form-control">
													<option value="">Please a auther</option>
													@foreach ($authors as $author)
														<option value="{{$author->id}}" {{ $author->id == $data->author_id? 'selected' : '' }}>{{$author->author_name}}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group">
												<label for="co_authors" class="mb-2">Co Auther (Optional)</label>
												<select name="co_authors[]" id="co_authors" class="form-control" multiple="multiple">
													@foreach ($authors as $author)
														<option value="{{$author->id}}">{{$author->author_name}}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group">
												<label for="tags" class="mb-2">Select a topice which is related to this article</label>
												<select name="tags" id="tags" class="form-control">
													<option value="">Please select one</option>
													@foreach ($tags as $tag)
														<option value="{{$tag->id}}">{{$tag->name}}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group">
												<label for="is_featured" class="mb-2">Is the post is a featured post?</label>
												<select name="is_featured" id="is_featured" class="form-control">
													<option value="">Please select one</option>
													<option value="1">Yes</option>
													<option value="0">No</option>
												</select>
											</div>
											<div class="form-group">
												<label for="is_trending" class="mb-2">Is the post is a trending post?</label>
												<select name="is_trending" id="is_trending" class="form-control">
													<option value="">Please select one</option>
													<option value="1">Yes</option>
													<option value="0">No</option>
												</select>
											</div>
											<div class="form-group">
												<label for="custom_date" class="mb-2">Published Date</label>
												<input type="date" class="form-control" name="custom_date" id="custom_date" value="{{$data->custom_date}}">
											</div>
											<div class="form-group">
												<label for="tags" class="mb-2">Tags</label>
												<input type="text" class="form-control" name="tags" id="tags" value="{{$data->tags}}">
											</div>
											<div class="form-group">
												<label for="read_minutes" class="mb-2">Read Minutes</label>
												<input type="text" class="form-control" name="read_minutes" id="read_minutes" value="{{$data->read_minutes}}">
											</div>
											<div class="form-group">
												<label for="references" class="mb-2">Reference (Optional)</label>
												<input type="text" class="form-control" name="references" id="references" value="{{$data->references}}">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<button type="submit" class="btn btn-primary">Update</button>
										</div>
									</div>
								</form>
							</div>
						</div>							
					</div>
				</div>
			</section>
			<!-- /.content -->
		</div>
  	</div>
  <!-- /.content-wrapper -->
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
  <script>
	$(document).ready(function() {
    	$('#co_authors').select2();
	});
	$(document).ready(function() {
    	$('#secondary_categories').select2();
	});
</script>