@extends('admin.layouts.master')

@section('title', 'Create Left Text Video')
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
													<h3 class="fw-bolder">Create Left Text Video</h3>
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
											<form action="{{route('admin.store.left-text-video')}}" method="POST" enctype="multipart/form-data">
												@csrf
												<div class="form-group">
													<label for="article_id" class="mb-2">Article</label>
													<select name="article_id" id="article_id" class="form-control">
														<option value="">Please select one</option>
														@foreach ($articles as $article)
															<option value="{{$article->id}}">{{$article->title}}</option>
														@endforeach
													</select>
												</div>
												<div class="form-group">
													<label for="article_content_id" class="mb-2">Article Content</label>
													<select name="article_content_id" id="article_content_id" class="form-control">
														<option value="">Please select one</option>
														@foreach ($articleContents as $articleContents)
															<option value="{{$articleContents->id}}">{{$articleContents->content_subtitle}}</option>
														@endforeach
													</select>
												</div>
												<div class="form-group">
													<label for="content_title" class="mb-2">Content Title</label>
													<input type="text" class="form-control" name="content_title" id="content_title" placeholder="Write content title">
												</div>
												<div class="form-group">
													<label for="content_text" class="mb-2">Content Text</label>
													<input type="text" class="form-control" name="content_text" id="content_text" placeholder="Write content text">
												</div>
												<div class="form-group">
													<label for="video_url" class="mb-2">Upload Video</label>
													<input type="text" class="form-control" name="video_url" id="video_url" placeholder="Enter video url">
												</div>
												<button type="submit" class="btn btn-primary">Submit</button>
											</form>
										</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-xl-11 col-lg-11 col-md-11 col-sm-12 col-xs-12 mx-auto">
										<h3 class="fw-bold text-primary">All Left Text Video</h3>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 mx-auto">
										<table class="table table-bordered table-striped">
											<thead>
												<th>Sl No</th>
												<th>Article</th>
												<th>Article Content</th>
												<th>Content Title</th>
												<th>Content Text</th>
												<th>Video</th>
												<th>Action</th>
											</thead>
											<tbody>
												@foreach ($leftTextvideos as $leftTextvideo)
													<tr>
														<td>{{$loop->index+1}}</td>
														<td>{{$leftTextvideo->article->title}}</td>
														<td>{{$leftTextvideo->articleContent->content_subtitle}}</td>
														<td>{{$leftTextvideo->content_title}}</td>
														<td>{{$leftTextvideo->content_text}}</td>
														<td>
															
															<iframe width="150" height="50" src="{{$leftTextvideo->video_url}}"></iframe>
														</td>
														<td>
															<a href="{{route('admin.show.left-text-video', $leftTextvideo->id)}}" class="btn btn-success btn-sm">Edit</a>
															<a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal_{{$leftTextvideo->id}}">Delete</a>
														</td>
													</tr>
													<!-- Delete Modal -->
													<div class="modal fade" id="deleteModal_{{$leftTextvideo->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																<h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure !! you are <span class="text-danger">delete item permanently</span> !!</h1>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																</div>
																<div class="modal-body">
																	<a href="{{route('admin.destory.left-text-video', $leftTextvideo->id)}}" class="btn btn-danger mt-2">Permanent Delete</a>
																</div>
																<div class="modal-footer text-end">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																</div>
															</div>
														</div>
													</div>
												@endforeach
											</tbody>
										</table>
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
<script src="{{asset('js/admin/add-option.js')}}"></script>