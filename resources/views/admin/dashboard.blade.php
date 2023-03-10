@extends('admin.layouts.master')
@section('title', 'Admin Dashboard')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
		<div class="container-full">
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xl-12 col-12">
						<div class="box bg-primary-light">
							<div class="box-body d-flex px-0">
								<div class="flex-grow-1 p-30 flex-grow-1 bg-img dask-bg bg-none-md" style="background-position: right bottom; background-size: auto 100%; background-image: url({{asset('ed_admin/images/svg-icon/color-svg/custom-1.svg')}})">
									<div class="row">
										<div class="col-12 col-xl-7">
											<h2>Welcome back, <strong>{{auth()->user()->name}}!</strong></h2>
											<p class="text-dark my-10 fs-16">
												Your students complated <strong class="text-warning">80%</strong> of the tasks.
											</p>
											<p class="text-dark my-10 fs-16">
												Progress is <strong class="text-warning">very good!</strong>
											</p>
										</div>
										<div class="col-12 col-xl-5"></div>
									</div>
								</div>
							</div>
						</div>

						<div class="box bg-transparent no-shadow mb-0">
							<div class="box-header no-border">
								<h4 class="box-title">Media Files</h4>
								<div class="box-controls pull-right d-md-flex d-none">
								<a href="#">View All</a>
								</div>
							</div>
						</div>
						<div class="box">
							<div class="box-body py-0">
								<div class="table-responsive">
									<table class="table no-border mb-0">
										<tbody>
											<tr>
												<td>
													<div class="bg-danger h-50 w-50 l-h-50 rounded text-center">
													<p class="mb-0 fs-20 fw-600">A1</p>
													</div>
												</td>
												<td class="fw-600">Biology Course</td>
												<td class="text-fade">StarterReplacement.pdf</td>
												<td class="fw-500"><span class="badge badge-sm badge-dot badge-warning me-10"></span>Only view</td>
												<td class="text-fade">78 members</td>
												<td class="fw-600">47 MB</td>
											</tr>
											<tr>
												<td>
													<div class="bg-info h-50 w-50 l-h-50 rounded text-center">
													<p class="mb-0 fs-20 fw-600">B1</p>
													</div>
												</td>
												<td class="fw-600">Contemporary Art</td>
												<td class="text-fade">Loremipsum.doc</td>
												<td class="fw-500 text-warning"><span class="badge badge-sm badge-dot badge-warning me-10"></span>Edit available</td>
												<td class="text-fade">78 members</td>
												<td class="fw-600">78 MB</td>
											</tr>
											<tr>
												<td>
													<div class="bg-primary h-50 w-50 l-h-50 rounded text-center">
													<p class="mb-0 fs-20 fw-600">C1</p>
													</div>
												</td>
												<td class="fw-600">Programming Language</td>
												<td class="text-fade">phpcore.mp3</td>
												<td class="fw-500"><span class="badge badge-sm badge-dot badge-primary me-10"></span>Only view</td>
												<td class="text-fade">48 members</td>
												<td class="fw-600">12 MB</td>
											</tr>
											<tr>
												<td>
													<div class="bg-success h-50 w-50 l-h-50 rounded text-center">
													<p class="mb-0 fs-20 fw-600">A2</p>
													</div>
												</td>
												<td class="fw-600">Geometry Course</td>
												<td class="text-fade">dummyabz.pdf</td>
												<td class="fw-500"><span class="badge badge-sm badge-dot badge-primary me-10"></span>Only view</td>
												<td class="text-fade">24 members</td>
												<td class="fw-600">18 MB</td>
											</tr>
										</tbody>
									</table>
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
