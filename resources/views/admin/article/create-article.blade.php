@extends('admin.layouts.master')

@section('title', 'Create Article')
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
													<h3 class="fw-bolder">Create Article</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								@include('admin.templetes.flash-message')
								<form action="{{route('admin.store.article')}}" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="row">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div>
													<div class="form-group">
														<label for="title" class="mb-2">Article Title</label>
														<input type="text" class="form-control" name="title" id="title" placeholder="Enter your article title">
													</div>
													<div class="form-group">
														<label for="category_id" class="mb-2">Category Name</label>
														<select name="category_id" id="category_id" class="form-control">
															<option value="">Please a category</option>
															@foreach ($categories as $category)
																<option value="{{$category->id}}">{{$category->cat_name}}</option>
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
														<input type="text" class="form-control" name="meta_keyword" id="meta_keyword" placeholder="Enter Meta keyword">
													</div>
													<div class="form-group">
														<label for="meta_description" class="mb-2">Meta Description</label>
														<input type="text" class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta description">
													</div>
													<div class="form-group">
														<label for="page_title" class="mb-2">Page Title</label>
														<input type="text" class="form-control" name="page_title" id="page_title" placeholder="Enter meta page title">
													</div>
													<div class="form-group">
														<label for="thumbnail" class="mb-2">Thumbnail</label>
														<input type="file" class="form-control" name="thumbnail" id="thumbnail" placeholder="Please upload thumbnail">
													</div>
													<div class="form-group">
														<label for="author_id" class="mb-2">Auther</label>
														<select name="author_id" id="author_id" class="form-control">
															<option value="">Please a auther</option>
															@foreach ($authors as $author)
																<option value="{{$author->id}}">{{$author->author_name}}</option>
															@endforeach
														</select>
													</div>
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="co_authors" class="mb-2">Co Auther (Optional)</label>
												<select name="co_authors[]" id="co_authors" class="form-control" multiple="multiple">
													@foreach ($authors as $author)
														<option value="{{$author->id}}">{{$author->author_name}}</option>
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
												<label for="is_featured" class="mb-2">Is the post is a premium post?</label>
												<select name="is_premium" id="is_premium" class="form-control">
													<option value="">Please select one</option>
													<option value="1">Yes</option>
													<option value="0">No</option>
												</select>
											</div>
											<div class="form-group">
												<label for="custom_date" class="mb-2">Published Date</label>
												<input type="date" class="form-control" name="custom_date" id="custom_date" placeholder="Enter meta page title">
											</div>
											<div class="form-group">
												<label for="tags" class="mb-2">Tags</label>
												<input type="text" class="form-control" name="tags" id="tags" placeholder="Enter post tags">
											</div>
											<div class="form-group">
												<label for="read_minutes" class="mb-2">Read Minutes</label>
												<input type="text" class="form-control" name="read_minutes" id="read_minutes" placeholder="Enter post read minutes">
											</div>
											<div class="form-group">
												<label for="references" class="mb-2">Reference (Optional)</label>
												<input type="text" class="form-control" name="references" id="references" placeholder="Enter post read minutes">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<button type="submit" class="btn btn-primary">Submit</button>
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