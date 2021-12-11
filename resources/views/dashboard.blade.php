<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-3 sm:px-6 lg:px-8">
            <div class="grid grid-cols-5 gap-4">
                <div class="py-3 px-5 space-y-3 bg-white rounded-lg">
                    <div class="text-xl">Total Order</div>
                    <div class="text-3xl font-bold">100</div>
                </div>
                <div class="py-3 px-5 space-y-3 bg-white rounded-lg">
                    <div class="text-xl">Total Stock</div>
                    <div class="text-3xl font-bold">105</div>
                </div>
            </div>
            <div class="p-3 bg-white rounded-lg">
                <div class="py-3 text-2xl capitalize">
                    order overview
                </div>
                <div class="py-3 divide-y">
                    <div class="grid grid-cols-8 capitalize py-2">
                        <div class="">order</div>
                        <div class="col-span-2 w-1/12">email</div>
                        <div class="">phone</div>
                        <div class=" text-center">total</div>
                        <div class=" text-center">quantity</div>
                        <div class=" text-center">status</div>
                        <div class=" text-center">view details</div>
                    </div>

                    
                    <div class="grid grid-cols-8 py-4">
                        <div class="">#2453563</div>
                        <div class="col-span-2 w-1/12">ebuebroderick2@gmail.com</div>
                        <div class="">08130075359</div>
                        <div class="text-center">&#8358; 4576</div>
                        <div class="text-center">1</div>
                        <div class="text-center">
                            <span class="px-3 py-1 text-red-500 bg-red-100 text-xs">
                                Panding
                            </span>
                        </div>
                        <div class="text-center">view</div>
                    </div>
                    
                    <div class="grid grid-cols-8 py-4">
                        <div class="">#2453563</div>
                        <div class="col-span-2 w-1/12">ebuebroderick2@gmail.com</div>
                        <div class="">08130075359</div>
                        <div class="text-center">&#8358; 4576</div>
                        <div class="text-center">1</div>
                        <div class="text-center">
                            <span class="px-3 py-1 text-green-500 bg-green-100 text-xs">
                                Shipped
                            </span>
                        </div>
                        <div class="text-center">view</div>
                    </div>
                    
                    <div class="grid grid-cols-8 py-4">
                        <div class="">#2453563</div>
                        <div class="col-span-2 w-1/12">ebuebroderick2@gmail.com</div>
                        <div class="">08130075359</div>
                        <div class="text-center">&#8358; 4576</div>
                        <div class="text-center">1</div>
                        <div class="text-center">
                            <span class="px-3 py-1 text-white bg-green-600 text-xs">
                                Delivered
                            </span>
                        </div>
                        <div class="text-center">view</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
