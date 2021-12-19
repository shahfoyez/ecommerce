<div class="header-bottom sticky-header">
    <div class="container">
        <div class="header-left">
            <div class="dropdown category-dropdown show is-on" data-visible="true">
                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                    Browse Categories
                </a>

                <div class="dropdown-menu show">
                    <nav class="side-nav">
                        <ul class="menu-vertical sf-arrows">
                            @foreach ($categories as $category)
                            @if ($category->subCategory->all())
                            <li class="megamenu-container">
                                <a class="sf-with-ul" href="/category/{{ $category->slug }}">{{ $category->name }}</a>
                                <div class="megamenu megamenu-sm">
                                    <div class="row no-gutters">
                                        <div class="col-md-6">
                                            <div class="menu-col">
                                                {{-- <div class="row">
                                                    <div class="col-md-8"> --}}
                                                        <div class="menu-title">{{ $category->name }}</div><!-- End .menu-title -->
                                                        <ul >
                                                            @foreach ($category->subCategory->all() as $subCategory)
                                                            <li>
                                                                <a href="/subCategory/{{ $subCategory->slug }}">{{ $subCategory->name }}
                                                                </a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div><!-- End .col-md-6 -->

                                                {{-- </div><!-- End .row -->
                                            </div><!-- End .menu-col --> --}}
                                        </div><!-- End .col-md-8 -->

                                        <div class="col-md-6">
                                            <div class="banner banner-overlay">
                                                <a href="" class="banner banner-menu">
                                                    <img src="{{ asset('general/assets/images/demos/demo-13/menu/banner-1.jpg') }}" alt="Banner">
                                                </a>
                                            </div><!-- End .banner banner-overlay -->
                                        </div><!-- End .col-md-4 -->

                                    </div><!-- End .row -->
                                </div><!-- End .megamenu -->
                            </li>
                            @else
                            <li><a href="/category/{{ $category->slug }}">{{ $category->name }}</a></li>
                            @endif
                            @endforeach

                        </ul><!-- End .menu-vertical -->
                    </nav><!-- End .side-nav -->
                </div><!-- End .dropdown-menu -->
            </div><!-- End .category-dropdown -->
        </div><!-- End .col-lg-3 -->
        <div class="header-center">
            <nav class="main-nav">
                <ul class="menu sf-arrows">
                    <li class="megamenu-container active">
                        <a href="index" class="sf-with-ul">Home</a>
                    </li>
                    <li>
                        <a href="category" class="sf-with-ul">Shop</a>

                    </li>
                    <li>
                        <a href="product" class="sf-with-ul">Product</a>
                    </li>
                    <li>
                        <a href="#" class="sf-with-ul">Pages</a>
                    </li>
                    <li>
                        <a href="blog" class="sf-with-ul">Blog</a>
                    </li>
                    <li>
                        <a href="elements-list" class="sf-with-ul">Elements</a>

                        <ul>
                            <li><a href="elements-products">Products</a></li>
                            <li><a href="elements-typography">Typography</a></li>
                            <li><a href="elements-titles">Titles</a></li>
                            <li><a href="elements-banners">Banners</a></li>
                            <li><a href="elements-product-category">Product Category</a></li>
                            <li><a href="elements-video-banners">Video Banners</a></li>
                            <li><a href="elements-buttons">Buttons</a></li>
                            <li><a href="elements-accordions">Accordions</a></li>
                            <li><a href="elements-tabs">Tabs</a></li>
                            <li><a href="elements-testimonials">Testimonials</a></li>
                            <li><a href="elements-blog-posts">Blog Posts</a></li>
                            <li><a href="elements-portfolio">Portfolio</a></li>
                            <li><a href="elements-cta">Call to Action</a></li>
                            <li><a href="elements-icon-boxes">Icon Boxes</a></li>
                        </ul>
                    </li>
                </ul><!-- End .menu -->
            </nav><!-- End .main-nav -->
        </div><!-- End .col-lg-9 -->
        <div class="header-right">
            <i class="la la-lightbulb-o"></i><p>Clearance Up to 30% Off</span></p>
        </div>
    </div><!-- End .container -->
</div><!-- End .header-bottom -->
