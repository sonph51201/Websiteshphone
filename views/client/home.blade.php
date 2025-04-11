@extends('client.layouts.main')

@section('content')
    <!-- Header-->
    @include('client.layouts.partials.header')

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                @foreach($products as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge -->
                            @if($product['p_is_sale'])
                                <div class="badge bg-dark text-white position-absolute"
                                     style="top: 0.5rem; right: 0.5rem">Sale</div>
                            @endif

                            <!-- Product image -->
                            <img class="card-img-top" src="{{ $product['p_img_thumbnail'] }}" alt="{{ $product['p_name'] }}" />

                            <!-- Product details -->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name -->
                                    <h5 class="fw-bolder">{{ $product['p_name'] }}</h5>

                                    <!-- Product price -->
                                    @if($product['p_is_sale'])
                                        <span class="text-muted text-decoration-line-through">
                                            ${{ number_format($product['p_price'], 2) }}
                                        </span>
                                        ${{ number_format($product['p_price_sale'], 2) }}
                                    @else
                                        ${{ number_format($product['p_price'], 2) }}
                                    @endif
                                </div>
                            </div>

                            <!-- Product actions -->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="#">
                                        {{ $product['p_is_sale'] ? 'Add to cart' : 'View options' }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
