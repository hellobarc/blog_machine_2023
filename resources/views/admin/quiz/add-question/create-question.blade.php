@extends('admin.layouts.master')

@section('title', 'Add Question')
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
                                                        Create 
                                                        @if ($question_type == 'multiple_choice')
                                                            Multiple Choice
                                                        @elseif($question_type == 'drop_down')
                                                            Drop Down
                                                        @elseif($question_type == 'radio')
                                                            Radio
                                                        @elseif($question_type == 'true_false_not_given')
                                                            True False
                                                        @endif
                                                        Question
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
                                        <div class="d-flex justify-content-end mb-3">
                                            <a href="#" class="btn btn-success btn-sm" onclick="myFunction()"><i class="fa-solid fa-plus"></i></i> Add Option</a>
                                        </div>
										<div>
											<form action="{{route('admin.store.quiz-add-question')}}" method="POST" enctype="multipart/form-data">
												@csrf
												<input type="hidden" name="quiz_id" class="form-control" value="{{$quiz_id}}">
												<input type="hidden" name="question_type" class="form-control" value="{{$question_type}}">
												<div class="form-group">
													<label for="text" class="mb-2">Question</label>
													<input type="text" class="form-control" name="text" id="text" placeholder="Enter question" required>
												</div>
												<div class="form-group">
													<label for="marks" class="mb-2">Marks</label>
													<input type="text" class="form-control" name="marks" id="marks" placeholder="Enter question" required>
												</div>
                                                <div id="add-option">
                                                    <label for="name" class="mb-2 fw-bold">Question Option</label>
                                                    <div class="d-flex justify-content-start">
                                                        <div class="form-group">
                                                            <input type="text" name="blank_answer[]" class="form-control" placeholder="option">
                                                        </div>
                                                        <div class="form-check mt-2">
                                                            <input class="form-check-input" type="checkbox" name="is_correct[]" value="0" id="flexCheckDefault">
                                                            <label class="form-check-label" for="flexCheckDefault">is correct</label>
                                                        </div>
                                                    </div>
                                                </div>
												<button type="submit" class="btn btn-primary">Submit</button>
											</form>
										</div>
									</div>
								</div>
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
<script type="text/javascript" src="{{asset('js/admin/quiz/add-multiple-option.js')}}"></script>