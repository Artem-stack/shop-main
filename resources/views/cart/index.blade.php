@extends('layouts.main')

@section('title', 'Cart')
@section('custom_css')
    <link rel="stylesheet" type="text/css" href="styles/cart.css">
    <link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
@endsection

@section('custom_js')
    <script src="js/cart.js"></script>
@endsection

@section('content')
    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url(images/cart.jpg)"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li><a href="{{route('home')}}">Home</a></li>
                                        <li>Shopping Cart</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Info -->

    <div class="cart_info">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Column Titles -->
                    <div class="cart_info_columns clearfix">
                        <div class="cart_info_col cart_info_col_product">Product</div>
                        <div class="cart_info_col cart_info_col_price">Price</div>
                        <div class="cart_info_col cart_info_col_total">Total</div>
                        <div class="cart_info_col cart_info_col_total">Actions</div>
                    </div>
                </div>
            </div>
            <div class="row cart_items_row">
                <div class="col">
                  
                    @foreach($cartCollection as $product)

                    @php
                                $image = '';
                                if(($product->images) > 0){
                                    $image = $product->images[0]['img'];
                                } else {
                                    $image = 'no_image.png';
                                }
                            @endphp
                    <!-- Cart Item -->
                    <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                        <!-- Name -->
                        <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_item_image">
                                <div><img src="/images/{{$image}}" alt="{{$product->title}}"></div>
                            </div>
                            <div class="cart_item_name_container">
                                <div class="cart_item_name"><a href="">{{ $product->name}}</a></div>
                            </div>
                        </div>
                        <!-- Price -->
                        <div class="cart_item_price">{{ $product->price}}</div>
                       
                       
                        <!-- Total -->
                        <div class="cart_item_total">{{ $product->quantity}}</div>
                   

                      <div class="cart_item_total">
                          <form action="{{ route("delete", $product->id) }}" method="POST">
                     {{ csrf_field() }}
                        {{ method_field('DELETE') }} 
                      
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>

                      </div>
                    </div>

                     

                       @endforeach
                </div>
            </div>
            <div class="row row_cart_buttons">
                <div class="col">
                    <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                        <div class="button continue_shopping_button"><a href="/">Continue shopping</a></div>
                        <div class="cart_buttons_right ml-lg-auto">

                     <form action="">  
                       
                            <div class="button clear_cart_button"><a href="">Clear cart</a></div>
                               
                            </form>

                            <div class=""><a href="#"></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row_extra">
                <div class="col-lg-4">
                 

                  

              <!-- Additional block -->
                    <div class="">
                        <div class="section_title"></div>
                        
                        <div class="form_container">
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 offset-lg-2">
                    <div class="cart_total">
                        <div class="section_title">Cart total</div>
                        <div class="section_subtitle">Final info</div>
                        <div class="cart_total_container">
                            <ul>
                              
                               
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Total</div>
                                    <div class="cart_total_value ml-auto">${{$sum}}</div>
                                </li>
                            </ul>
                        </div>
                        <div class="button checkout_button"><a href="/cart/cartplace">Proceed to checkout</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
