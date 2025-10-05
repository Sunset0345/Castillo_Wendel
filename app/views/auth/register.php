<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center" style="background: linear-gradient(135deg, #2b0a3d 0%, #702963 40%, #ff7a18 100%); color:#fff;">
    <div class="w-full max-w-md p-8 rounded-lg shadow-xl" style="background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(0,0,0,0.06)); backdrop-filter: blur(6px); border:1px solid rgba(255,255,255,0.03);">
        <h2 class="text-2xl font-bold mb-4">Create Account</h2>
        <?php if (!empty($error)): ?>
            <div class="bg-red-600 text-white p-2 rounded mb-4"><?=htmlspecialchars($error)?></div>
        <?php endif; ?>

        <form method="post" action="<?= site_url('auth/register') ?>">
            <label class="block mb-2 text-sm font-medium">First name</label>
            <input type="text" name="fname" class="w-full mb-3 px-3 py-2 rounded bg-gray-700 text-white" />

            <label class="block mb-2 text-sm font-medium">Last name</label>
            <input type="text" name="lname" class="w-full mb-3 px-3 py-2 rounded bg-gray-700 text-white" />

            <label class="block mb-2 text-sm font-medium">Email</label>
            <input type="email" name="email" required class="w-full mb-3 px-3 py-2 rounded bg-gray-700 text-white" />

            <label class="block mb-2 text-sm font-medium">Password</label>
            <input type="password" name="password" required class="w-full mb-3 px-3 py-2 rounded bg-gray-700 text-white" />

            <button type="submit" class="w-full bg-gradient-to-r from-yellow-400 via-orange-500 to-pink-500 px-4 py-2 rounded text-white">Register</button>
        </form>

        <div class="mt-4 text-center text-sm">
            <a href="<?= site_url('auth/login') ?>" class="text-yellow-100 hover:underline">Already have an account? Sign in</a>
        </div>
    </div>
</body>
</html>