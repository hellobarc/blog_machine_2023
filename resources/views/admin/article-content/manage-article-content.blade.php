@extends('admin.layouts.master')

@section('title', 'Manage Article Content')
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
													<h3 class="fw-bolder">All Article Content</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								@include('admin.templetes.flash-message')
								<div class="d-flex justify-content-end mb-3">
									<a href="{{route('admin.create.article-content')}}" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i></i> Add New</a>
								</div>
								<table class="table table-bordered table-striped">
									<thead>
										<th>SL No</th>
										<th>Article Name</th>
										<th>Article content Sub-Title</th>
										<th>Content Type</th>
										<th>Content layout</th>
										<th>layout Width</th>
										<th>Action</th>
									</thead>
									<tbody>
										@foreach ($allData as $rows)
											<tr>
												<td>{{$loop->index+1}}</td>
												<td>{{$rows->article->title}}</td>
												<td>{{$rows->content_subtitle}}</td>
												<td>{{$rows->content_type}}</td>
												<td>{{$rows->layout}}</td>
												<td>{{$rows->layout_width}}</td>
												<td>
													<a href="{{route('admin.show.article-content', $rows->id)}}" class="btn btn-success btn-sm">Edit</a>
													<a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal_{{$rows->id}}">Delete</a>
													@if($rows->content_type == 'text')
														@if(Helper::find_content($rows->id, $rows->content_type) !== NULL)
															<a href="{{route('admin.text-content', ['article_content_id'=>$rows->id, 'content_type'=> $rows->content_type])}}" class="btn btn-info btn-sm">View text content</a>
														@else
															<a href="{{route('admin.create.text-content', ['article_content_id'=>$rows->id, 'content_type'=> $rows->content_type])}}" class="btn btn-primary btn-sm">+ Add text</a>
														@endif
													@elseif($rows->content_type == 'quote')
														@if(Helper::find_content($rows->id, $rows->content_type) !== NULL)
															<a href="{{route('admin.text-content', ['article_content_id'=>$rows->id, 'content_type'=> $rows->content_type])}}" class="btn btn-info btn-sm">View Quote</a>
														@else
															<a href="{{route('admin.create.text-content', ['article_content_id'=>$rows->id, 'content_type'=> $rows->content_type])}}" class="btn btn-primary btn-sm">+ Add Quote</a>
														@endif
													@elseif($rows->content_type == 'image')
														@if(Helper::find_content($rows->id, $rows->content_type) !== NULL)
															<a href="{{route('admin.image-content', ['article_content_id'=>$rows->id, 'content_type'=> $rows->content_type])}}" class="btn btn-secondary btn-sm">View image content</a>
														@else
															<a href="{{route('admin.create.image-content', $rows->id)}}" class="btn btn-primary btn-sm">+ Add Image</a>
														@endif
													@elseif($rows->content_type == 'subheadline')
														@if(Helper::find_content($rows->id, $rows->content_type) !== NULL)
															<a href="{{route('admin.text-content', ['article_content_id'=>$rows->id, 'content_type'=> $rows->content_type])}}" class="btn btn-info btn-sm">View subheadline content</a>
														@else
															<a href="{{route('admin.create.text-content', ['article_content_id'=>$rows->id, 'content_type'=> $rows->content_type])}}" class="btn btn-primary btn-sm">+ Add Sub Heading</a>
														@endif
													@elseif($rows->content_type == 'list-content')
														@if(Helper::find_content($rows->id, $rows->content_type) !== NULL)
															<a href="{{route('admin.text-content', ['article_content_id'=>$rows->id, 'content_type'=> $rows->content_type])}}" class="btn btn-info btn-sm">View list content</a>
														@else
															<a href="{{route('admin.create.text-content', ['article_content_id'=>$rows->id, 'content_type'=> $rows->content_type])}}" class="btn btn-primary btn-sm">+ Add List Content</a>
														@endif
													@elseif($rows->content_type == 'left-text-video')
														@if(Helper::find_content($rows->id, $rows->content_type) !== NULL)
															<a href="{{route('admin.left-text-video', ['article_content_id'=>$rows->id, 'content_type'=> $rows->content_type])}}" class="btn btn-dark btn-sm">View left text video</a>
														@else
															<a href="{{route('admin.create.left-text-video', $rows->content_type)}}" class="btn btn-primary btn-sm">+ Add left text video</a>
														@endif
													@elseif($rows->content_type == 'right-text-video')
														@if(Helper::find_content($rows->id, $rows->content_type) !== NULL)
															<a href="{{route('admin.right-text-video', ['article_content_id'=>$rows->id, 'content_type'=> $rows->content_type])}}" class="btn btn-success btn-sm">View right text video</a>
														@else
															<a href="{{route('admin.create.right-text-video', $rows->content_type)}}" class="btn btn-primary btn-sm">+ Add right text video</a>
														@endif
													@elseif($rows->content_type == 'video-content')
														@if(Helper::find_content($rows->id, $rows->content_type) !== NULL)
															<a href="{{route('admin.video-content', ['article_content_id'=>$rows->id, 'content_type'=> $rows->content_type])}}" class="btn btn-success btn-sm">View video content</a>
														@else
															<a href="{{route('admin.create.video-content', ['article_content_id'=>$rows->id, 'content_type'=> $rows->content_type])}}" class="btn btn-primary btn-sm">+ Add video content</a>
														@endif
													@elseif($rows->content_type == 'audio-content')
														@if(Helper::find_content($rows->id, $rows->content_type) !== NULL)
															<a href="{{route('admin.audio-content', ['article_content_id'=>$rows->id, 'content_type'=> $rows->content_type])}}" class="btn btn-success btn-sm">View audio content</a>
														@else
															<a href="{{route('admin.create.audio-content', ['article_content_id'=>$rows->id, 'content_type'=> $rows->content_type])}}" class="btn btn-primary btn-sm">+ Add audio content</a>
														@endif
													@endif
												</td>
											</tr>
											<!-- Delete Modal -->
											<div class="modal fade" id="deleteModal_{{$rows->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
														<h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure !! you are <span class="text-danger">delete item permanently</span> !!</h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<a href="{{route('admin.destory.article-content', ['id'=>$rows->id,'content_type'=>$rows->content_type])}}" class="btn btn-danger mt-2">Permanent Delete</a>
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
								{{-- Pagination --}}
								<div class="d-flex justify-content-end">
									{!! $allData->links() !!}
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