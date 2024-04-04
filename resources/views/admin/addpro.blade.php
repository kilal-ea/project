@extends('admin.products')

@section('product')
    <div class="p-6">
        <form action="{{ route('singup') }}" method="post" class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf 
        
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
        
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">nbpiaceincarton:</label>
                <input type="number" name="nbpc" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
    <label for="categories" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
    <select name='category' class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @foreach ($cat as $category)
            <option value='{{ $category->id }}'>{{ $category->name }}</option>
        @endforeach
    </select>
</div>

            
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
        </form>
    </div>
@endsection
