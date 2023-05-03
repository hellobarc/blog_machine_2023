@extends('admin.layouts.master')

@section('title', 'Add fill blank')
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
														Fill Blank
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
										<div>
											<form action="{{route('admin.store.quiz-fill-blank')}}" method="POST" enctype="multipart/form-data">
												@csrf
												<input type="hidden" name="quiz_id" class="form-control" value="{{$quiz_id}}">
												<input type="hidden" name="question_type" class="form-control" value="{{$question_type}}">
												<div class="form-group">
													<label for="name" class="mb-2">Question Instruction (Optional)</label>
													<textarea name="instruction" id="" cols="30" rows="5" class="form-control" placeholder="Write question instruction"></textarea>
													</div>
													<div class="form-group">
														<label for="name" class="mb-2">Question Text</label>
														<textarea name="text" id="ck" cols="30" rows="5" class="form-control" placeholder="Question like this: text ##blank## text"></textarea>
													</div>
													<div class="form-group">
														<label for="name" class="mb-2">Question Answer</label>
														<input type="text" name="blank_answer" class="form-control" placeholder="answer1,answer2">
													</div>
													<div class="form-group">
														<label for="name" class="mb-2">Question Marks</label>
														<input type="text" name="marks" class="form-control" placeholder="Write your question marks">
													</div>
													<div class="form-group">
														<label for="name" class="mb-2">Add Box</label>
														<select name="is_show" id="" class="form-control">
															<option value="">Please Select One</option>
															<option value="yes">Yes</option>
															<option value="no">No</option>
														</select>
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