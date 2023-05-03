@extends('admin.layouts.master')

@section('title', 'Manage Article')
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
													<h3 class="fw-bolder">All Article</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								@include('admin.templetes.flash-message')
								<div class="d-flex justify-content-end mb-3">
									<a href="{{route('admin.create.article')}}" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i></i> Add New</a>
									<a href="{{route('admin.create.article-content')}}" class="btn btn-primary btn-sm mx-2"><i class="fa-solid fa-plus"></i></i> Add Article content</a>
								</div>
								<table class="table table-bordered table-striped">
									<thead>
										<th>SL No</th>
										<th>Title</th>
										<th>Category Name</th>
										<th>Published Date</th>
										<th>Auther</th>
										<th>Co-Auther</th>
										<th>Feature Post</th>
										<th>Premium Post</th>
										<th>Tag</th>
										<th>Reading Time</th>
										<th>Thumbnail</th>
										<th>Reference</th>
										<th>Action</th>
									</thead>
									<tbody>
										@foreach ($allData as $rows)
											@php
												$decode_co_author = json_decode($rows->co_authors);
											@endphp
										
											<tr>
												<td>{{$loop->index+1}}</td>
												<td>{{$rows->title}}</td>
												<td>{{$rows->category->cat_name}}</td>
												<td>{{$rows->custom_date}}</td>
												<td>{{$rows->author->author_name}}</td>
												<td>
													@if(!empty($decode_co_author))
														@foreach ($decode_co_author as $key=>$co_author)
															{{$key+1}}.{{Helper::find_co_author($co_author)}}	
														@endforeach
													@else
														<p>Have not co-author</p>
													@endif
												</td>
												<td>@if($rows->is_featured == 1) Yes @elseif($rows->is_featured == 0) No @endif</td>
												<td>@if($rows->is_premium == 1) Yes @elseif($rows->is_premium == 0) No @endif</td>
												<td>{{$rows->tagsDB->name}}</td>
												<td>{{$rows->read_minutes}}</td>
												<td>
													<img src="{{asset('uploads/article/thumbnail/'.$rows->thumbnail)}}" alt="" width="50">
												</td>
												<td>
													@if ($rows->references == NULL)
														<p>Do not give reference link</p>
													@else
														<a href="{{$rows->references}}">{{$rows->references}}</a>
													@endif
												</td>
												<td>
													<a href="{{route('admin.show.article', $rows->id)}}" class="btn btn-success btn-sm">Edit</a>
													<a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal_{{$rows->id}}">Delete</a>
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
															<a href="{{route('admin.destory.article', $rows->id)}}" class="btn btn-danger mt-2">Permanent Delete</a>
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