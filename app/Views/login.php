<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md w-96">
        
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-700">Zaloguj się</h1>

        <?php if (!empty($error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form action="/login" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email" value="admin@cms.test" class="w-full border rounded py-2 px-3 text-gray-700 focus:outline-none focus:border-blue-500">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Hasło</label>
                <input type="password" name="password" value="tajne" class="w-full border rounded py-2 px-3 text-gray-700 focus:outline-none focus:border-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Wejdź
            </button>
        </form>
        
        <p class="text-center text-xs text-gray-400 mt-4">Demo: admin@cms.test / tajne</p>
    </div>
</div>