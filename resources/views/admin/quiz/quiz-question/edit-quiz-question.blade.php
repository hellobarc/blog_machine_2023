@extends('admin.layouts.master')

@section('title', 'Edit Quiz Question')
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
													<h3 class="fw-bolder">Edit Quiz Question</h3>
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
											<form action="{{route('admin.update.quiz-question', $data->id)}}" method="POST" enctype="multipart/form-data">
												@csrf
												<div class="form-group">
													<label for="quiz_id" class="mb-2">Quiz Name</label>
													<select name="quiz_id" id="quiz_id" class="form-control" required>
														<option value="">Please select one</option>
														@foreach ($quizzes as $quiz)
															<option value="{{$quiz->id}}" {{$quiz->id == $data->quiz_id?'selected':''}}>{{$quiz->title}}</option>
														@endforeach
													</select>
												</div>
												<div class="form-group">
													<label for="question" class="mb-2">Question</label>
													<input type="text" class="form-control" name="question" id="question" value="{{$data->question}}" required>
												</div>
												<div class="form-group">
													<label for="question_type" class="mb-2">Quiz Name</label>
													<select name="question_type" id="question_type" class="form-control" required>
														<option value="">Please select one</option>
														<option value="multiple_choice">Multiple Choice</option>
														<option value="true_false_not_given">True False</option>
														<option value="fill_blank">Fill in the blanks</option>
														<option value="drop_down">Drop Down</option>
														<option value="radio">Radio</option>
													</select>
												</div>
												<div class="form-group">
													<label for="status" class="mb-2">Quiz Name</label>
													<select name="status" id="status" class="form-control" required>
														<option value="">Please select one</option>
														<option value="active">Active</option>
														<option value="inactive">InActive</option>
													</select>
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