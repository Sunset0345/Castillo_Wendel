<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin - Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="min-h-screen" style="background: linear-gradient(135deg,#2b0a3d 0%, #702963 40%, #ff7a18 100%); color: #fff;">
    <!-- Top navbar -->
    <header class="w-full bg-gradient-to-r from-yellow-400 via-orange-500 to-pink-500 shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="text-2xl font-extrabold text-white">Admin Panel</div>
                <div class="text-sm text-white/90">Manage students & roles</div>
            </div>
            <div class="text-sm text-white/90">Signed in as <strong><?= htmlspecialchars($this->session->userdata('user_id') ? $this->UsersModel->find($this->session->userdata('user_id'))['email'] ?? 'admin' : 'admin') ?></strong></div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto p-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="md:col-span-3">
                <div class="p-6 rounded-2xl bg-white/5 backdrop-blur-sm border border-white/6 shadow-xl">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-semibold">Students</h2>
                        <?php $page_q = isset($_GET['page']) ? '?page='.(int)$_GET['page'] : ''; ?>
                        <?php if (isset($_GET['q']) && $_GET['q'] !== '') { $page_q = '?q=' . urlencode($_GET['q']) . (isset($_GET['page']) ? '&page='.(int)$_GET['page'] : ''); } ?>
                        <div class="flex items-center gap-3">
                            <a href="<?= site_url('') . $page_q ?>" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-yellow-400 via-orange-500 to-pink-500 rounded text-sm text-white shadow"> <i class="fa-solid fa-arrow-left"></i> Back</a>
                        </div>
                    </div>

                    <div class="overflow-x-auto rounded-lg">
                        <table class="w-full text-left table-auto">
                            <thead>
                                <tr class="text-sm text-white/80 border-b border-white/6">
                                    <th class="p-3">ID</th>
                                    <th class="p-3">Email</th>
                                    <th class="p-3">Name</th>
                                    <th class="p-3">Role</th>
                                    <th class="p-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $u): ?>
                                    <tr class="hover:bg-white/5 transition-colors">
                                        <td class="p-3 align-top"><?= $u['id'] ?></td>
                                        <td class="p-3 align-top"><span class="px-3 py-1 rounded-full bg-gradient-to-r from-yellow-300 to-orange-300 text-[#3b0b11] text-sm font-semibold"><?= htmlspecialchars($u['email']) ?></span></td>
                                        <td class="p-3 align-top"><?= htmlspecialchars(($u['fname'] ?? '') . ' ' . ($u['lname'] ?? '')) ?></td>
                                        <td class="p-3 align-top"><span class="text-sm text-white/90"><?= htmlspecialchars($u['role'] ?? 'user') ?></span></td>
                                        <td class="p-3 align-top">
                                            <form method="post" action="<?= site_url('admin/set_role/'.$u['id']) ?><?= isset($_GET['page']) ? '?page='.(int)$_GET['page'] : '' ?>" class="flex items-center gap-2">
                                                <select name="role" class="bg-transparent border border-white/6 text-white px-2 py-1 rounded">
                                                    <option value="user" <?= (isset($u['role']) && $u['role'] === 'user') ? 'selected' : '' ?>>User</option>
                                                    <option value="admin" <?= (isset($u['role']) && $u['role'] === 'admin') ? 'selected' : '' ?>>Admin</option>
                                                </select>
                                                <button type="submit" class="ml-2 inline-flex items-center gap-2 bg-gradient-to-r from-yellow-400 via-orange-500 to-pink-500 px-3 py-1 rounded text-sm text-white shadow">Save</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        <?= $pagination_html ?? '' ?>
                    </div>
                </div>
            </div>

            <aside class="p-6 rounded-2xl bg-white/4 border border-white/6 shadow-md">
                <h3 class="text-lg font-semibold mb-3">Admin Tools</h3>
                <p class="text-sm text-white/80 mb-4">Quick actions and stats will appear here.</p>
                <div class="flex flex-col gap-2">
                    <a href="<?= site_url('users/create') ?>" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-yellow-400 via-orange-500 to-pink-500 rounded text-sm text-white shadow"><i class="fa-solid fa-user-plus"></i> Create Student</a>
                </div>
            </aside>
        </div>
    </main>

</body>
</html>