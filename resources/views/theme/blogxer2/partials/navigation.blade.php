 <div class="container">

                    <div class="row">
                        <div class="col-lg-12">



                              <nav id="dropdown" class="template-main-menu">
								<ul>
                                    <li>
                                        <a href="{{route('home_page')}}">HOME</a>
                                    </li>
									<li>
										<a href="about.html">ABOUT</a>
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
									<li>
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
									</li>

									<li>
										<a href="contact.html">CONTACT</a>
									</li>
									 <li>
										<a href="contact.html" ><span class="brn btn-primary p-3">LOGIN</span></a>
									</li>
								</ul>
							</nav>
                        </div>
                    </div>
                </div>
