 <div class="container">

                    <div class="row">
                        <div class="col-lg-12">

                              <nav id="dropdown" class="template-main-menu">
								<ul>
                                    <li>
                                        <a href="{{route('home_page')}}">HOME</a>
                                        {{-- <a href="https://ielts.live/">HOME</a> --}}
                                    </li>
									 <li>
										<a href="#">IELTS Practice</a>
										<ul class="dropdown-menu-col-1">
											<li>
												<a href="">All</a>
											</li>
											<li>
												<a href="">Academic</a>
											</li>
											<li>
												<a href="">General</a>
											</li>
										</ul>
									</li>
									 <li>
										<a href="#">CATEGORIES</a>
										<ul class="dropdown-menu-col-1">

											@foreach ($contents as $content)
												<li>
													<a href="{{route('category_page',['id'=>$content->id,'slug' => Str::slug($content->cat_name,'-')])}}">{{$content->cat_name}}</a>
												</li>
											@endforeach
										</ul>
									</li>
									{{-- <li>
										<a href="#">Products</a>
										<ul class="dropdown-menu-col-1">
											<li>
												<a href="single-blog.html">Product 1</a>
											</li>
											<li>
												<a href="single-blog2.html">Product 2</a>
											</li>
											<li>
												<a href="single-blog3.html">Product 3</a>
											</li>
										</ul>
									</li> --}}

									<li>
										<a href="https://ielts.live/writing-service">Writing Correction Service</a>
									</li>
									<li>
										<a href="https://ielts.live/speaking-test">Practice Speaking</a>
									</li>
									 <li>
										@if(Auth::guard('customLogin')->user())
											<a href="#">{{Auth::guard('customLogin')->user()->name}} ></a>
											<ul class="dropdown-menu-col-1">
												<li class="text-center">
													<form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
														@csrf
														<button class="mt-2" type="submit" style="border:none; background:transparent; cursor: pointer;">Logout</button>
													</form>
												</li>
											</ul>
										@else
											
												{{-- <a href="#" id="navogin"><span class="brn btn-primary p-3">LOGIN</span></a> --}}
											<button id="navLogin" class="btn btn-primary fs-2 mt-5">LOGIN</button>
											
										@endif
									</li>
								</ul>
							</nav>
                        </div>
                    </div>
                </div>
