@section('title', "Dashboard: New Product")
@extends('layouts.dashboard')
@section('content')
    <div class="p-4">
        <div class="mb-3">
            <h1 class="text-xl font-bold">Creating a new Product</h1>
        </div>
        <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="my-3">
                <div class="w-1/4 my-1">
                    <label for="name" class="mb-1 block font-semibold">Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Product Name"
                        value="{{ old('name') }}"
                        class="border border-gray-200 block p-1 block w-full @error('name') border-red-600 @enderror"
                    >
                    @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <div class="w-1/4 my-1">
                    <label for="description" class="mb-1 block font-semibold">Description</label>
                    <textarea
                        type="text"
                        id="description"
                        name="description"
                        placeholder="Product Description"
                        class="border border-gray-200 block p-1 block w-full @error('description') border-red-600 @enderror"
                    >{{ old('description') }}</textarea>
                    @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <div class="w-1/4 my-1">
                    <label for="ingredients" class="mb-1 block font-semibold">Ingredients</label>
                    <textarea
                        type="text"
                        id="ingredients"
                        name="ingredients"
                        placeholder="Product Ingredients"
                        class="border border-gray-200 block p-1 block w-full @error('ingredients') border-red-600 @enderror"
                    >{{ old('ingredients') }}</textarea>
                    <p class="text-sm text-gray-400 py-1">Comma seperated list of ingredients used to creating this recipe.</p>
                    @error('ingredients') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <div class="w-1/4 my-1">
                    <label for="allergens" class="mb-1 block font-semibold">Allergens</label>
                    <textarea
                        type="text"
                        id="allergens"
                        name="allergens"
                        placeholder="Product Allergens"
                        class="border border-gray-200 block p-1 block w-full @error('allergens') border-red-600 @enderror"
                    >{{ old('allergens') }}</textarea>
                    <p class="text-sm text-gray-400 py-1">Comma seperated list of allergens that may be contained in this product.</p>
                    @error('allergens') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <div class="flex my-1 -mx-1">
                    <div class="w-1/4 my-1 mx-1">
                        <label for="price" class="mb-1 block font-semibold">Price</label>
                        <input
                            type="number"
                            id="price"
                            name="price"
                            placeholder="Product Price"
                            value="{{ old('price') }}"
                            class="border border-gray-200 block p-1 block w-full @error('price') border-red-600 @enderror"
                        >
                        @error('price') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>
                    <div class="w-1/4 my-1 mx-1">
                        <label for="weight" class="mb-1 block font-semibold">Weight</label>
                        <input
                            type="number"
                            id="weight"
                            name="weight"
                            placeholder="Product Weight"
                            value="{{ old('weight') }}"
                            class="border border-gray-200 block p-1 block w-full @error('weight') border-red-600 @enderror"
                        >
                        @error('weight') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="flex my-1 -mx-1">
                    <div class="w-1/4 my-1 mx-1">
                        <label for="cost_of_materials" class="mb-1 block font-semibold">Cost of Materials (COM)</label>
                        <input
                            type="number"
                            id="cost_of_materials"
                            name="cost_of_materials"
                            placeholder="Cost of Materials"
                            value="{{ old('cost_of_materials') }}"
                            class="border border-gray-200 block p-1 block w-full @error('cost_of_materials') border-red-600 @enderror"
                        >
                        @error('cost_of_materials') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>
                    <div class="w-1/4 my-1 mx-1">
                        <label for="cost_of_ingredients" class="mb-1 block font-semibold">Cost of Ingredients (COI)</label>
                        <input
                            type="number"
                            id="cost_of_ingredients"
                            name="cost_of_ingredients"
                            placeholder="Cost of Ingredients"
                            value="{{ old('cost_of_ingredients') }}"
                            class="border border-gray-200 block p-1 block w-full @error('cost_of_ingredients') border-red-600 @enderror"
                        >
                        @error('cost_of_ingredients') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="w-1/4 my-1">
                    <label for="image" class="mb-1 font-semibold block">Upload Image</label>
                    <input
                        type="file"
                        id="image"
                        name="image"
                        class="border border-gray-200 inline-block mr-1 px-1 py-1 @error('image') border-red-600 @enderror"
                    >
                    @error('image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="border border-gray-300 px-5 py-2">Create new Product</button>

            </div>
        </form>
    </div>
@endsection
