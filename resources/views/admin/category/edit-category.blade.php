@extends('admin.layouts.master')

@section('title', 'Edit Category')
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
													<h3 class="fw-bolder">Edit Category</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								@include('admin.templetes.flash-message')
								<div class="row">
									<div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 mx-auto">
										<div>
											<form action="{{route('admin.update.category', $data->id)}}" method="POST" enctype="multipart/form-data">
												@csrf
												<div class="form-group">
													<label for="cat_name" class="mb-2">Category Name</label>
													<input type="text" class="form-control" name="cat_name" id="cat_name" value="{{$data->cat_name}}">
												</div>
												<div class="form-group">
													<label for="parent_id" class="mb-2">Parent ID</label>
													<select name="parent_id" id="parent_id" class="form-control">
														<option value="">Please select one</option>
														<option value="0">No category</option>
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
													<label for="featured_image" class="mb-2">Old Thumbnail</label><br>
													<img src="{{asset('uploads/category/thumbnail/'.$data->featured_image)}}" alt="" width="50">
												</div>
												<div class="form-group">
													<label for="featured_image" class="mb-2">Upload New Thumbnail</label>
													<input type="file" class="form-control" name="featured_image" id="featured_image">
												</div>
												<button type="submit" class="btn btn-primary">Update</button>
											</form>
										</div>
									</div>
								</div>
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