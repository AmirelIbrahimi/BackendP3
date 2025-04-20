 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Dish</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        };
    </script>
</head>
<body class="dark bg-gray-900 text-gray-100 font-sans min-h-screen flex items-center justify-center px-4">

<div class="bg-gray-800 border border-amber-600 rounded-xl shadow-2xl p-10 w-full max-w-2xl">
    <h1 class="text-4xl font-extrabold text-center text-amber-400 mb-8">Edit Your Dish</h1>

    <form action="/edit-post/{{$post->id}}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-lg font-medium text-amber-300 mb-2" for="title">Dish Name</label>
            <input
                type="text"
                name="title"
                id="title"
                value="{{$post->title}}"
                class="w-full px-5 py-3 border border-gray-700 bg-gray-900 text-white rounded-lg shadow-inner focus:outline-none focus:ring-2 focus:ring-amber-500"
                placeholder="e.g. Midnight Lasagna"
            />
        </div>

        <div>
            <label class="block text-lg font-medium text-amber-300 mb-2" for="content">Description</label>
            <textarea
                name="content"
                id="content"
                rows="6"
                class="w-full px-5 py-3 border border-gray-700 bg-gray-900 text-white rounded-lg shadow-inner resize-none focus:outline-none focus:ring-2 focus:ring-amber-500"
                placeholder="Dish description goes here..."
            >{{$post->content}}</textarea>
        </div>

        <div class="text-center">
            <button
                type="submit"
                class="bg-amber-600 hover:bg-amber-700 transition duration-300 text-white text-lg font-semibold py-3 px-8 rounded-full shadow-md hover:shadow-lg"
            >
                Save Changes
            </button>
        </div>
    </form>
</div>

</body>
</html>
