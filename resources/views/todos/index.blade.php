@include('layouts.header')

<div class="max-w-md mx-auto mt-10">
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">New Todo:</label>
            <input type="text" name="title" id="title"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Enter your todo">
        </div>
        <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Add Todo
        </button>
    </form>
</div>

@if (session('success'))
<div style="width: 100%;display: flex;justify-content: center;">
    <div style="max-width: 500px" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
</div>
@endif

@if (session('error'))
<div style="width: 100%;display: flex;justify-content: center;">
    <div style="max-width: 500px" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
</div>
@endif

<div class="max-w-md mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4">My Todo List</h2>
    @if (count($todos) > 0)
        <ul class="border border-gray-300 rounded">
            @foreach ($todos as $todo)
                <li class="flex items-center justify-between py-3 px-4 border-b border-gray-200">
                    <span class="text-gray-800">{{ $todo['title'] }}</span>
                    <div>
                        <a href="{{ route('todos.edit', $todo['id']) }}"
                            class="inline-block px-4 py-2 text-white bg-blue-500 hover:text-blue-700 mr-2 px-4 rounded">Edit</a>
                        <form action="{{ route('todos.destroy', $todo['id']) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-block px-4 py-2 text-white bg-red-500 hover:text-red-700 px-4 rounded"
                                onclick="return confirm('Are you sure you want to delete this todo?')">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-500">No todos yet. Add one above!</p>
    @endif
</div>

@include('layouts.footer')