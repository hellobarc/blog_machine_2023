@extends('admin.layouts.master')

@section('title', 'Manage Quiz Question')
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
													<h3 class="fw-bolder">All Quiz Question</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								@include('admin.templetes.flash-message')
								<div class="d-flex justify-content-end mb-3">
									<a href="{{route('admin.create.quiz-question')}}" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i></i> Add New</a>
								</div>
								<table class="table table-bordered table-striped">
									<thead>
										<th>SL No</th>
										<th>Quiz Name</th>
										<th>Question</th>
										<th>Question Type</th>
										<th>Status</th>
										<th>Action</th>
									</thead>
									<tbody>
										@foreach ($allData as $rows)
											<tr>
												<td>{{$loop->index+1}}</td>
												<td>{{$rows->quiz->title}}</td>
												<td>{{$rows->question}}</td>
												<td>{{$rows->question_type}}</td>
												<td>{{$rows->status}}</td>
												<td>
													<a href="{{route('admin.show.quiz-question', $rows->id)}}" class="btn btn-success btn-sm">Edit</a>
													<a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal_{{$rows->id}}">Delete</a>
													@if(Helper::find_quiz_question($rows->quiz->id, $rows->id, $rows->question_type) !==NULL)
														<a href="{{route('admin.manage.quiz-add-question', ['quiz_id'=>$rows->quiz->id, 'question_id'=>$rows->id, 'question_type'=>$rows->question_type])}}" class="btn btn-secondary btn-sm">View Question</a>
													@else
													<a href="{{route('admin.create.quiz-add-question', ['quiz_id'=>$rows->quiz->id,'question_id'=>$rows->id, 'question_type'=>$rows->question_type])}}" class="btn btn-primary btn-sm">+ Add Question</a>
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
															<a href="{{route('admin.destory.quiz-question', ['id'=>$rows->id,'question_type'=>$rows->question_type])}}" class="btn btn-danger mt-2">Permanent Delete</a>
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