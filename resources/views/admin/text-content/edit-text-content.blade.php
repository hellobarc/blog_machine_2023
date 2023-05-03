@extends('admin.layouts.master')

@section('title', 'Edit Text Content')
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
													<h3 class="fw-bolder">
														@if ($content_type == 'text')
															Edit Text Content
														@elseif($content_type == 'quote')
															Edit Quote Content
														@elseif($content_type == 'subheadline')
															Edit Sub Heading Content
														@elseif($content_type == 'list-content')
															Edit List Content
														@endif
													</h3>
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
											<form action="{{route('admin.update.text-content', $data->id)}}" method="POST" enctype="multipart/form-data">
												@csrf
												<input type="hidden" name="content_type" value="{{$content_type}}">
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
													<label for="content" class="mb-2">
														@if ($content_type == 'text')
															Add Content
														@elseif($content_type == 'quote')
															Add Quote
														@elseif($content_type == 'subheadline')
															Add Subheading
														@elseif($content_type == 'list-content')
															Add list content
														@endif
													</label>
													@if ($content_type == 'text' || $content_type == 'quote')
														<textarea type="text" class="form-control" name="content" id="content">{{$data->content}}</textarea>
													@elseif($content_type == 'subheadline')
														<input type="text" class="form-control" name="subheadline" placeholder="Please enter your subheadline">
													@elseif($content_type == 'list-content')
														@php
															$decode_data = json_decode($data->content)	;
														@endphp
														
														@foreach ($decode_data as $key=>$list)
															<div class="row" id="demo_{{$key}}">
																<div class="col-md-10">
																	<div class="form-group">
																		<input type="text" name="list_content[]" class="form-control" value="{{$list}}">
																	</div>
																</div>
																<div class="col-md-2">
																	<div class="mx-2 mt-2">
																		<i class="fa-solid fa-trash text-danger" style="cursor: pointer" onclick="remove_item({{$key}})"></i>
																	</div>
																</div>
															</div>
														@endforeach
														<div class="d-flex justify-content-start mb-2">
															<a href="#" class="btn btn-success btn-sm" onclick="myFunction()"><i class="fa-solid fa-plus"></i></i> Add List</a>
														</div>
														<div id="add-option">
															<div class="d-flex justify-content-start">
																{{-- <div class="form-group">
																	<input type="text" name="list_content[]" class="form-control" placeholder="Write list content" width="100">
																</div> --}}
															</div>
														</div>
													@endif
												</div>
												<div class="form-group">
													<label for="font" class="mb-2">Font Style (Optional)</label>
													<input type="text" class="form-control" name="font" id="font" value="{{$data->font}}">
												</div>
												<div class="form-group">
													<label for="font_size" class="mb-2">Font Size (Optional)</label>
													<input type="text" class="form-control" name="font_size" id="font_size" value="{{$data->font_size}}">
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