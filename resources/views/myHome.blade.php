@extends('layouts.app')

@section('title',' Home')

@section('content')
    <h1>My Home Page</h1>


    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="product_grid">

                        @foreach($products as $product)
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
    </div>







@endsection


