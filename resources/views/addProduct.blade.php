<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-3 sm:px-6 lg:px-8">
            <form action="{{ url('/save_product') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="bg-white px-5 py-12 gap-x-8 rounded-lg grid grid-cols-2">
                    <div class="space-y-3">
                        <div class="space-y-3">
                            <div class="">Product Name</div>
                            <input type="text" name="name" class="w-full rounded-md border-gray-300" required>
                        </div>
                        <div class="space-y-3">
                            <div class="">Price</div>
                            <input type="number" name="price" class="w-full rounded-md border-gray-300" required>
                        </div>
                        <div class="space-y-3">
                            <div class="">Product Image</div>
                            <input type="file" name="image" id="validatedCustomFile" class="w-full rounded-md border-gray-300" required>
                        </div>
                        <div class="space-y-3">
                            <div class="">Description</div>
                            <textarea name="description" id="" cols="30" rows="10" class="resize-none w-full rounded-md border-gray-300" required></textarea>
                        </div>
                    </div>
                    <div class="">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="py-32 rounded-md bg-gray-300">
                                <img src="" alt="" id="img_preview">
                            </div>
                            <div class="py-32 rounded-md bg-gray-300"></div>
                            <div class="py-32 rounded-md bg-gray-300"></div>
                            <div class="py-32 rounded-md bg-gray-300"></div>
                        </div>
                    </div>
                    <div class="space-x-6">
                        <button class="bg-black rounded-md mt-5 py-3 px-8 text-sm text-white cursor-pointer">Save Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function (){
            $('#validatedCustomFile').on('change', function (e) {
                let image = e.target.files[0];
                let reader = new FileReader();
                reader.onload = function (e) {
                $('#img_preview').slideUp();
                $('#img_preview').attr('src', e.target.result);
                $('#img_preview').slideDown('slow');
                }
                reader.readAsDataURL(image);
            });
        });
    </script>
</x-app-layout>
