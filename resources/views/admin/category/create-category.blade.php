@extends('admin.layouts.master')

@section('title', 'Create Category')
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
													<h3 class="fw-bolder">Create Category</h3>
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
											<form action="{{route('admin.store.category')}}" method="POST" enctype="multipart/form-data">
												@csrf
												<div class="form-group">
													<label for="cat_name" class="mb-2">Category Name</label>
													<input type="text" class="form-control" name="cat_name" id="cat_name" placeholder="Enter your category name">
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
													<label for="featured_image" class="mb-2">Thumbnail</label>
													<input type="file" class="form-control" name="featured_image" id="featured_image" placeholder="Please upload thumbnail">
												</div>
												<button type="submit" class="btn btn-primary">Submit</button>
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