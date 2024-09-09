@include('layouts.header')

<div class="max-w-md mx-auto mt-10">
    <form action="{{ route('todos.update', $todo['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Edit Todo:</label>
            <input type="text" name="title" id="title" value="{{ $todo['title'] }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Update Todo
        </button>
        <button type="button" onclick="window.location.href='{{ route('todos.index') }}'"
            class="bg-gray-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Cancel
        </button>

    </form>
</div>

@include('layouts.footer')