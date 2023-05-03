@extends('admin.layouts.master')

@section('title', 'Create Article Content')
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
													<h3 class="fw-bolder">Create Article Content</h3>
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
											<form action="{{route('admin.store.article-content')}}" method="POST" enctype="multipart/form-data">
												@csrf
												<div class="form-group">
													<label for="article_id" class="mb-2">Article <span class="text-danger">*</span></label>
													<select name="article_id" id="article_id" class="form-control">
														<option value="">Please select one</option>
														@foreach ($articles as $article)
															<option value="{{$article->id}}">{{$article->title}}</option>
														@endforeach
													</select>
												</div>
												<div class="form-group">
													<label for="content_subtitle" class="mb-2">Content Type-title <span class="text-danger">*</span></label>
													<input type="text" class="form-control" name="content_subtitle" id="content_subtitle" placeholder="Enter content sub title">
												</div>
												<div class="form-group">
													<label for="content_type" class="mb-2">Content Type <span class="text-danger">*</span></label>
													<select name="content_type" id="content_type" class="form-control">
														<option value="">Please select one</option>
														<option value="text">Text</option>
														<option value="quote">Quote</option>
														<option value="image">Image</option>
														<option value="subheadline">Sub-Heading</option>
														<option value="list-content">List Content</option>
														<option value="left-text-video">Left text video</option>
														<option value="right-text-video">Right text video</option>
														<option value="video-content">Video content</option>
														<option value="audio-content">Audio content</option>
													</select>
												</div>
												<div class="form-group">
													<label for="layout" class="mb-2">Content layout <span class="text-danger">*</span></label>
													<select name="layout" id="layout" class="form-control">
														<option value="">Please select one</option>
														<option value="full_width">Full Width</option>
														<option value="left">Left side</option>
														<option value="right">Right side</option>
														<option value="center">Middle</option>
													</select>
												</div>
												<div class="form-group">
													<label for="layout_width" class="mb-2">Layout Width (Optional)</label>
													<input type="text" class="form-control" name="layout_width" id="layout_width" placeholder="Enter layout width">
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