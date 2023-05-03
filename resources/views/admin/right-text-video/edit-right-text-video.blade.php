@extends('admin.layouts.master')

@section('title', 'Edit Right Text Video')
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
													<h3 class="fw-bolder">Edit Right Text Video</h3>
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
											<form action="{{route('admin.update.right-text-video', $data->id)}}" method="POST" enctype="multipart/form-data">
												@csrf
												<div class="form-group">
													<label for="article_id" class="mb-2">Article</label>
													<select name="article_id" id="article_id" class="form-control">
														<option value="">Please select one</option>
														@foreach ($articles as $article)
															<option value="{{$article->id}}" {{$data->article_id == $article->id?'selected':''}}>{{$article->title}}</option>
														@endforeach
													</select>
												</div>
												<div class="form-group">
													<label for="article_content_id" class="mb-2">Article Content</label>
													<select name="article_content_id" id="article_content_id" class="form-control">
														<option value="">Please select one</option>
														@foreach ($articleContents as $articleContents)
															<option value="{{$articleContents->id}}" {{$data->article_content_id == $articleContents->id?'selected':''}}>{{$articleContents->content_subtitle}}</option>
														@endforeach
													</select>
												</div>
												<div class="form-group">
													<label for="content_title" class="mb-2">Content Title</label>
													<input type="text" class="form-control" name="content_title" id="content_title" value="{{$data->content_title}}">
												</div>
												<div class="form-group">
													<label for="content_text" class="mb-2">Content Text</label>
													<input type="text" class="form-control" name="content_text" id="content_text" value="{{$data->content_text}}">
												</div>
												<div class="form-group">
													<label for="video_url" class="mb-2">Old Video</label><br>
													<iframe width="150" height="100" src="{{$data->video_url}}"></iframe>
												</div>
												<div class="form-group">
													<label for="video_url" class="mb-2">Upload Video</label>
													<input type="text" class="form-control" name="video_url" id="video_url" value="{{$data->video_url}}">
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

<script
  src="https://code.jquery.com/jquery-3.6.4.slim.min.js"
  integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw="
  crossorigin="anonymous"></script>
  <script src="{{asset('js/admin/add-option.js')}}"></script>