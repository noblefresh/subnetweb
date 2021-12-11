<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <script src="{{ asset('fontawesome-free-5.15.4-web/js/all.js') }}"></script>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
    </head>
    <body class="antialised">
        <?php $subtotal = 0 ?>
        {{-- NavBar --}}
        <div class="fixed z-50 bg-white topNav w-full top-0 p-3 md:bg-opacity-0">
            <div class="max-w-6xl relative flex mx-auto flex-col md:flex-row">
                <a href="" class="md:hidden absolute top-1 right-14">
                    <div class="relative">
                        <img src="{{ asset('/images/icon.png') }}" class="bottom-1 cursor-pointer relative">
                        <div class="absolute px-1  bg-red-500 -top-1 -right-1 rounded-full border-2 border-white text-white" id="cart2" style="font-size: 10px"></div>
                    </div>
                </a>
                <div class="absolute h-10 flex justify-center bars items-center w-10 text-white right-1 -top-2 rounded-lg shadow-lg md:hidden cursor-pointer border-2 border-white bg-red-500">
                    <i class="fa fa-bars"></i>
                </div>
                <div class="flex-grow font-bold text-lg">Chopshop</div>
                <div class="menu hidden md:flex flex-col md:flex-row mt-5 md:mt-0 gap-16">
                    <div class="flex flex-col md:flex-row gap-12 capitalize">
                        <div class="">
                            <a href="{{ route('welcome') }}" class="text-red-400 font-bold border-b border-red-400">home</a>
                        </div>
                        <div class="">
                            <span class="">about</span>
                        </div>
                        <div class="">
                            <span class="">explore</span>
                        </div>
                        <div class="">
                            <span class="">blog</span>
                        </div>
                    </div>
                    <div class="flex gap-12">
                        <a href="{{ route('login') }}">Login</a>
                        <a href="" class="hidden md:block">
                            <div class="relative">
                                <img src="{{ asset('/images/icon.png') }}" class="bottom-1 cursor-pointer relative">
                                <div class="absolute px-1  bg-red-500 -top-1 -right-1 rounded-full border-2 border-white text-white" id="cart" style="font-size: 10px"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
       {{-- NavBar End --}}
       
        <div class="pb-6">
            <div class="max-w-6xl gap-8 py-3 mt-16 mb-7  h-screen pt-24 grid mx-auto grid-cols-1 md:grid-cols-5 ">
                @if (count($cart) > 0)
                <div class="md:col-span-3 pb-8">
                    <div class="capitalize text-2xl font-bold">shopping cart</div>
                    <div class="divide-y-2 divide-gray-900">
                        <div class="py-4 grid font-bold grid-cols-4 capitalize gap-3">
                            <div class="col-span-2">product</div>
                            <div class="">quality</div>
                            <div class="">price</div>
                        </div>
                        @foreach ($cart as $item)
                        <div class="py-4 ">
                            <div class="grid grid-cols-4 gap-3">
                                <div class="col-span-2 flex items-center gap-3">
                                    <img src="{{asset('/productImages/'.$item->product->image) }}" class="rounded-full w-16 h-16" alt="">
                                    <div class="flex-grow">
                                        {{ $item->product->name }}
                                    </div>
                                </div>
                                <div class="space-x-2 mt-3 font-bold">
                                    {{-- <button class="font-extrabold pt-0 border-2 border-black px-1 pb-1 cursor-pointer">+</button> --}}
                                    <span>{{ $item->qty }}</span>
                                    {{-- <button class="font-extrabold pt-0 border-2 border-black px-1 pb-1 cursor-pointer">-</button> --}}
                                </div>
                                <div class="font-bold mt-3">
                                    &#8358; {{ number_format($item->product->price,2) }}
                                </div>
                            </div>
                        </div>
                        <?php $subtotal +=  $item->product->price ?>
                        @endforeach
                        <div class="py-4"></div>
                    </div>
                    <div class="text-right font-bold capitalize">
                        <div class="">
                            subtotal : <span class="font-medium">&#8358; {{ number_format($subtotal,2) }} </span>
                        </div>
                        <div class="">
                            shipping : <span class="font-medium">&#8358; 100.00 </span>
                        </div>
                        <div class="">
                            total : <span class="font-medium">&#8358; {{ number_format($subtotal + 100,2) }}  </span>
                            <input type="hidden" name="" value="{{ $subtotal + 100 }}" id="amount">
                        </div>
                    </div>
                </div>
                @else
                <div class="md:col-span-3">
                    <div class="bg-gray-100 p-4 rounded-lg divide-y text-center ">
                        <div class="p-8 text-2xl font-bold text-center">
                            No Item in Cart<br>
                            
                        </div>
                        <a href="{{ route('welcome') }}" class="bg-btn-color w-full rounded-md py-2 px-2  text-white">
                            Continue Shopping
                        </a>
                    </div>
                </div>
                @endif
                
                <div class="md:col-span-2 pb-10">
                    <div class="">
                        <div class="bg-gray-100 p-4 rounded-lg divide-y h-full">
                            <div class="p-8 text-2xl font-bold">
                                Delivery Info
                            </div>
                            <div class="py-4 space-y-4">
                                <div class="">
                                    Supported card
                                </div>
                                <img src="{{ asset('/images/Group 510.png') }}" class="bottom-1 cursor-pointer relative">
                            </div>
                            <div class=" py-4 space-y-3">
                                <div class="space-y-3">
                                    <div class="">Enter Fullname</div>
                                    <input type="text" id="name" name="Fullname" class="w-full rounded-md border-gray-300" required>
                                </div>
                                <div class="space-y-3">
                                    <div class="">Enter Email</div>
                                    <input type="email" id="email" class="w-full rounded-md border-gray-300" required>
                                </div>
                                <div class="space-y-3">
                                    <div class="">Enter Phone Number</div>
                                    <input type="text" id="phone" id="validatedCustomFile" class="w-full rounded-md border-gray-300" required>
                                </div>
                                <div class="space-y-3">
                                    <div class="">Enter Address</div>
                                    <textarea id="address" id="" cols="30" rows="3" class="resize-none w-full rounded-md border-gray-300" required></textarea>
                                </div>
                                @if (count($cart) > 0)
                                <button class="button checkOut uppercase bg-btn-color w-full rounded-md py-2  text-white">
                                    Check out
                                </button>
                                <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
