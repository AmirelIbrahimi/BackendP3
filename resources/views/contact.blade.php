<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacteer ons</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        };
    </script>
</head>
<body class="dark bg-gray-900 text-gray-100 font-sans min-h-screen flex items-center justify-center px-4">

<div class="bg-gray-800 border border-amber-600 rounded-xl shadow-2xl p-10 w-full max-w-2xl">
    <h1 class="text-4xl font-extrabold text-center text-amber-400 mb-6">Contacteer ons</h1>
    <p class="text-center text-gray-300 mb-8">
        Heb je vragen? Vul het formulier in of stuur een e-mail naar
        <a href="mailto:info@example.com" class="text-amber-400 hover:underline">info@example.com</a>.
    </p>

    <form method="POST" action="/contact" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block text-lg font-medium text-amber-300 mb-2">Naam</label>
            <input type="text" name="name" id="name" required
                   class="w-full px-5 py-3 border border-gray-700 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500"
                   placeholder="Jouw naam">
        </div>

        <div>
            <label for="email" class="block text-lg font-medium text-amber-300 mb-2">E-mailadres</label>
            <input type="email" name="email" id="email" required
                   class="w-full px-5 py-3 border border-gray-700 bg-gray-900 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500"
                   placeholder="jij@example.com">
        </div>

        <div>
            <label for="message" class="block text-lg font-medium text-amber-300 mb-2">Bericht</label>
            <textarea name="message" id="message" required rows="6"
                      class="w-full px-5 py-3 border border-gray-700 bg-gray-900 text-white rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-amber-500"
                      placeholder="Schrijf hier je bericht..."></textarea>
        </div>

        <div class="text-center">
            <button type="submit"
                    class="bg-amber-600 hover:bg-amber-700 text-white text-lg font-semibold py-3 px-8 rounded-full shadow-md hover:shadow-lg transition duration-300">
                Verzenden
            </button>
        </div>
    </form>
</div>

</body>
</html>
