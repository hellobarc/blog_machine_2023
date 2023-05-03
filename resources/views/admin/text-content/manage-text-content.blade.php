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
													<h3 class="fw-bolder">Text Content</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								@include('admin.templetes.flash-message')
								<table class="table table-bordered table-striped">
									<thead>
										<th>Sl No</th>
										<th>Article</th>
										<th>Article Content Name</th>
										<th>Content</th>
										<th>Font</th>
										<th>Font Size</th>
										<th>Action</th>
									</thead>
									<tbody>
										@foreach ($allData as $textContent)
											<tr>
												<td>{{$loop->index+1}}</td>
												<td>{{$textContent->article->title}}</td>
												<td>{{$textContent->articleContent->content_subtitle}}</td>
												<td>{!!substr($textContent->content, 0,150)!!}</td>
												<td>
													@if ($textContent->font ==  NULL)
														<p class="text-success">Do not have font style</p>
													@else
														{{$textContent->font}}
													@endif
												</td>
												<td>
													@if ($textContent->font_size ==  NULL)
														<p class="text-success">Do not have font size</p>
													@else
														{{$textContent->font_size}}
													@endif
												</td>
												<td>
													<a href="{{route('admin.show.text-content', ['id'=>$textContent->id, 'content_type'=>$textContent->content_type])}}" class="btn btn-success btn-sm">Edit</a>
													<a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal_{{$textContent->id}}">Delete</a>
												</td>
											</tr>
											<!-- Delete Modal -->
											<div class="modal fade" id="deleteModal_{{$textContent->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
														<h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure !! you are <span class="text-danger">delete item permanently</span> !!</h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<a href="{{route('admin.destory.text-content', $textContent->id)}}" class="btn btn-danger mt-2">Permanent Delete</a>
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
								{{-- <div class="d-flex justify-content-end">
									{!! $allData->links() !!}
								</div> --}}
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