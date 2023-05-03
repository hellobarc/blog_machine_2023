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
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        @include('admin.templetes.flash-message')
                                        <div class="d-flex justify-content-end mb-3">
                                            <a href="{{route('admin.create.quiz-add-question', ['quiz_id'=>$quiz_id, 'question_type'=>$question_type])}}" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i></i> Add New</a>
                                        </div>
                                        <table class="table table-bordered table-striped mt-4">
                                            <thead>
                                                <th>SL No</th>
                                                <th>Quiz Name</th>
                                                <th>Question</th>
                                                <th>
                                                    @if ($question_type == 'fill_blank')
                                                        Answer
                                                    @else
                                                        Option
                                                    @endif
                                                </th>
                                                <th>Marks</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($questions as $rows)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$rows->quiz->title}}</td>
                                                        <td>{{$rows->text}}</td>
                                                        <td>
                                                            @if ($question_type == 'fill_blank')
                                                                {{$rows->blank_answer}}
                                                            @else
                                                                {{$rows->option_text}}
                                                            @endif
                                                        </td>
                                                        <td>{{$rows->marks}}</td>
                                                        <td>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal_{{$rows->id}}" class="btn btn-danger btn-sm">Delete</a>
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
                                                                    <a href="{{route('admin.destory.quiz-add-question', ['id'=>$rows->id, 'question_type'=>$question_type])}}" class="btn btn-danger mt-2">Permanent Delete</a>
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
					</div>
				</div>
			</section>
			<!-- /.content -->
		</div>
  	</div>
  <!-- /.content-wrapper -->
@endsection
<script type="text/javascript" src="{{asset('js/admin/quiz/add-multiple-option.js')}}"></script>