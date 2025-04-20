<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        };
    </script>
</head>
<body class="dark bg-gray-900 text-gray-100 font-sans min-h-screen">

<div class="max-w-3xl mx-auto py-10 px-6">
    <h1 class="text-4xl font-bold text-center text-amber-400 mb-8">Welcome to My Restaurant</h1>

    @auth
        <div class="mb-6 text-center">
            <p class="text-lg text-green-400 font-semibold">You are logged in!</p>
            <form action="/logout" method="POST" class="mt-2">
                @csrf
                <button class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded">
                    Log out
                </button>
            </form>
        </div>

        <!-- Create New Dish -->
        <div class="bg-gray-800 border border-amber-600 rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold text-amber-300 mb-4">Create a New Dish</h2>
            <form action="/create-post" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="title" placeholder="Dish name"
                       class="w-full px-4 py-2 border border-gray-700 bg-gray-900 text-white rounded focus:outline-none focus:ring-2 focus:ring-amber-400" />
                <textarea name="content" placeholder="Dish description"
                          class="w-full px-4 py-2 border border-gray-700 bg-gray-900 text-white rounded resize-none focus:outline-none focus:ring-2 focus:ring-amber-400"></textarea>
                <button class="bg-amber-600 hover:bg-amber-700 text-white py-2 px-6 rounded">
                    Save Dish
                </button>
            </form>
        </div>

        <!-- All Dishes -->
        <div class="bg-gray-800 border border-amber-600 rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold text-amber-300 mb-4">All Dishes</h2>
            @foreach($posts as $post)
                <div class="bg-gray-700 p-4 rounded-lg mb-6 shadow-sm">
                    <h3 class="text-xl font-bold text-amber-200 mb-2">{{$post['title']}}</h3>
                    <p class="text-gray-300 mb-3">{{$post['content']}}</p>
                    <div class="flex items-center space-x-4">
                        <a href="/edit-post/{{$post->id}}" class="text-blue-400 hover:underline">Edit</a>
                        <form action="/delete-post/{{$post->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-400 hover:underline">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

    @else
        <!-- Registration -->
        <div class="bg-gray-800 border border-amber-600 rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-2xl font-semibold text-amber-300 mb-4">Register</h2>
            <form action="/register" method="POST" class="space-y-4">
                @csrf
                <input name="name" type="text" placeholder="Name"
                       class="w-full px-4 py-2 border border-gray-700 bg-gray-900 text-white rounded focus:outline-none focus:ring-2 focus:ring-amber-400" />
                <input name="email" type="text" placeholder="Email"
                       class="w-full px-4 py-2 border border-gray-700 bg-gray-900 text-white rounded focus:outline-none focus:ring-2 focus:ring-amber-400" />
                <input name="password" type="password" placeholder="Password"
                       class="w-full px-4 py-2 border border-gray-700 bg-gray-900 text-white rounded focus:outline-none focus:ring-2 focus:ring-amber-400" />
                <button class="bg-green-600 hover:bg-green-700 text-white py-2 px-6 rounded">
                    Register
                </button>
            </form>
        </div>

        <!-- Login -->
        <div class="bg-gray-800 border border-amber-600 rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold text-amber-300 mb-4">Login</h2>
            <form action="/login" method="POST" class="space-y-4">
                @csrf
                <input name="loginname" type="text" placeholder="Name"
                       class="w-full px-4 py-2 border border-gray-700 bg-gray-900 text-white rounded focus:outline-none focus:ring-2 focus:ring-amber-400" />
                <input name="loginpassword" type="password" placeholder="Password"
                       class="w-full px-4 py-2 border border-gray-700 bg-gray-900 text-white rounded focus:outline-none focus:ring-2 focus:ring-amber-400" />
                <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded">
                    Log in
                </button>
            </form>
        </div>
    @endauth
</div>

</body>
</html>
