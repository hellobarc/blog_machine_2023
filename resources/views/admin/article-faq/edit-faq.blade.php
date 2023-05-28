@extends('admin.layouts.master')

@section('title', 'Edit Article FAQ')
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
													<h3 class="fw-bolder">Edit Article FAQ</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								@include('admin.templetes.flash-message')
								<form action="{{route('admin.update.faq', ['id'=>$articleFaq->id])}}" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="row">
										<div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12 mx-auto">
											<input type="hidden" name="article_id" value="{{$articleFaq->article_id}}">
											<div class="form-group">
												<label for="question" class="mb-2">FAQ Question<span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="question" id="question" value="{{$articleFaq->faq_question}}" required>
											</div>
											<div class="form-group">
												<label for="answer" class="mb-2">FAQ Answer<span class="text-danger">*</span></label>
												<textarea type="text" class="form-control" name="answer" cols="30" rows="5" id="content" required>{{$articleFaq->faq_answer}}</textarea>
											</div>
											<button type="submit" class="btn btn-primary">Update</button>	
										</div>
									</div>
								</form>
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
