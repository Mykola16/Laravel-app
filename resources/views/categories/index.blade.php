@extends('layouts.app')

@section('title', $cat->name)

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/styles/categories.css">
    <link rel="stylesheet" type="text/css" href="/styles/categories_responsive.css">
@endsection

@section('content')

    <!-- Home -->

    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url('/images/{{$cat->img}}')"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="home_title">{{$cat->name}}<span>.</span></div>
                                <div class="home_text"><p>{{ $cat->description }}</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col">

                    <!-- Product Sorting -->
                    <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
                        <div class="results">Showing <span>{{$cat->products->count()}}</span> results</div>
                        <div class="sorting_container ml-md-auto">
                            <div class="sorting">
                                <ul class="item_sorting">
                                    <li>
                                        <span class="sorting_text">Sort by</span>
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                        <ul>
                                            <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default</span></li>
                                            <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                                            <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "stars" }'><span>Name</span></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div class="product_grid">

                        @foreach($cat->products as $product)
                            <!-- Product -->
                            @php
                                $image = '';
                                if(count($product->images) > 0)
                                {
                                    $image = $product->images[0]['img'];
                                }
                                else{
                                    $image = 'no_image.png';
                                }

                            @endphp

                            <div class="product">
                                <div class="product_image"><a href="{{ route('showProduct',['category',$product->id]) }}"><img src="/images/{{ $image }}" alt="{{ $product->name }}"></a></div>
                                <div class="product_extra product_new"><a href="{{route('showCategory',$product->category['alias'])}}">{{$product->category['name']}}</a></div>
                                <div class="product_content">
                                    <div class="product_title"><a href="{{ route('showProduct',['category',$product->id]) }}">{{ $product->name }}</a></div>
                                    @if($product->new_price != null)
                                        <div></div>
                                        <div style="text-decoration: line-through; color: red">{{ $product->price }} €</div>
                                        <div class="product_price">{{ $product->new_price }} €</div>
                                    @else
                                        <div class="product_price">{{ $product->price }} €</div>
                                    @endif

                                </div>
                            </div>
                        @endforeach



                    </div>
            </div>
        </div>
    </div>



@endsection

@section('custom_js')
            <script src="js/categories.js"></script>
@endsection


