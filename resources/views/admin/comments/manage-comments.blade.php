@extends('admin.layouts.master')

@section('title', 'Manage Comments')
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
													<h3 class="fw-bolder">All Comments</h3>
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
										<th>SL No</th>
										<th>Article Name</th>
										<th>User Name</th>
										<th>Comment</th>
										<th>Reply of Comment</th>
										<th>Type</th>
										<th>Status</th>
										<th>Action</th>
									</thead>
									<tbody>
										@foreach ($allData as $rows)
											<tr>
												<td>{{$loop->index+1}}</td>
												<td>{{$rows->article->title}}</td>
												<td>{{$rows->user->name}}</td>
												<td>{{$rows->comment}}</td>
												<td>Reply of-{{$rows->reply_comment_id+1}} comment</td>
												<td>{{$rows->type}}</td>
												<td>
													@if($rows->status == 'pending')
														<p class="badge badge-warning">{{$rows->status}}</p>
													@elseif($rows->status == 'approved')
														<p class="badge badge-success">{{$rows->status}}</p>
													@elseif($rows->status == 'rejected')
														<p class="badge badge-danger">{{$rows->status}}</p>
													@endif
												</td>
												<td>
													<a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#changeStatus_{{$rows->id}}">Change Status</a>
												</td>
											</tr>
											<!-- Delete Modal -->
											<div class="modal fade" id="changeStatus_{{$rows->id}}" tabindex="-1" aria-labelledby="changeStatusLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
														<h1 class="modal-title fs-5" id="changeStatusLabel">Change the comment status</span> !!</h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<form action="{{route('admin.comment.change-status')}}" method="POST">
																@csrf
																<input type="hidden" name="comment_id" value="{{$rows->id}}">
																<div class="mb-3 form-check">
																	<select name="status" id="status" class="form-control">
																		<option value="">Please select one</option>
																		<option value="pending">Pending</option>
																		<option value="approved">Approved</option>
																		<option value="rejected">Rejected</option>
																	</select>
																</div>
																  <button type="submit" class="btn btn-primary btn-sm mx-4">Submit</button>
															</form>
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