
	  	 <div class="container">
	            <div class="p-0 bg-white">
					<div class="responsive_slick_1row p-0">
	               		@foreach(\App\Category::where('published',1)->get() as $category)
	                        <div class="product-card-2 card card-product m-1 shop-cards shop-tech p-1">
	                        	<a href="{{ $category->link() }}">
									<div class="card-body-1" style="min-height: 3em">
										<div class="">
											<h2 class="product-title p-0 text-truncate-2 text-center" >
												{{ $category->name }}
											</h2>
										</div>
									</div>
                            	</a>
                        	</div>
	               		 @endforeach
	        		</div>
	    		</div>
		</div>
