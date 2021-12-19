<div class="container">
        <h2 class="title text-center mb-2">Explore Popular Categories</h2><!-- End .title -->
            <div class="cat-blocks-container">
            <div class="row">
            @foreach ($categories->take(6) as $category)
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="category/{{$category->slug}}" class="cat-block">
                        <figure>
                            <span>
                                <img src="{{ asset('uploads/categories/'.$category->image) }}" style="height:100px" alt="Category image">
                            </span>
                        </figure>

                        <h3 class="cat-block-title">{{ $category->name }}</h3><!-- End .cat-block-title -->
                    </a>
                </div><!-- End .col-sm-4 col-lg-2 -->
                 @endforeach
            </div><!-- End .row -->
        </div><!-- End .cat-blocks-container -->
        
    </div><!-- End .container -->