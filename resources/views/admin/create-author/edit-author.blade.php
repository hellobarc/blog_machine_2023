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
													<h3 class="fw-bolder">Edit Author</h3>
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
											<form action="{{route('upload.author', $author->id)}}" method="POST" enctype="multipart/form-data">
												@csrf
												<div class="form-group">
													<label for="author_name" class="mb-2">Author Name</label>
													<input type="text" class="form-control" name="author_name" id="author_name" placeholder="Enter author name" value="{{$author->author_name}}">
												</div>
												
												<div class="form-group">
													<label for="author_image" class="mb-2">Previous Image</label><br>
													<img src="{{asset('uploads/author/'. $author->image)}}" alt="" width="50">
												</div>
												<div class="form-group">
													<label for="author_image" class="mb-2">Author Image (Size should be: 120 <i class="fa-solid fa-xmark"></i> 120)</label>
													<input type="file" class="form-control" name="author_image" id="author_image">
												</div>
												<div class="form-group">
													<label for="author_speech" class="mb-2">Author Speech</label>
													<input type="text" class="form-control" name="author_speech" id="author_speech" placeholder="Write author speech" value="{{$author->author_speech}}">
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