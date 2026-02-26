<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - EasyColoc</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #0a0a0a;
            font-size: 14px;
        }
    </style>
</head>

<body class="text-white antialiased">

    <div class="min-h-screen flex">
        <aside class="w-60 border-r border-zinc-900 hidden md:flex flex-col p-5 gap-6 bg-[#0a0a0a]">
            <div class="text-lg font-black tracking-tighter px-2">
                EASY<span class="text-[#059669]">COLOC</span>
            </div>

            <nav class="space-y-1">
                <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3 text-zinc-500 hover:text-white px-3 py-2 rounded-lg text-xs font-semibold transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('colocation') }}" class="flex items-center gap-3 bg-[#064e3b] text-white px-3 py-2 rounded-lg font-bold text-xs transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    Colocations
                </a>
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 text-zinc-500 hover:text-white px-3 py-2 rounded-lg text-xs font-semibold transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Profil
                </a>

                @if(Auth::user()->role === 'admin')
                <div class="pt-4 mt-4 border-t border-zinc-900">
                    <p class="px-3 text-[9px] font-black text-zinc-600 uppercase tracking-widest mb-2">Admin</p>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 text-zinc-500 hover:text-white px-3 py-2 rounded-lg text-xs transition group">
                        <svg class="w-4 h-4 text-[#059669]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Global Admin
                    </a>
                </div>
                @endif
            </nav>

            <div class="mt-auto bg-zinc-900 border border-zinc-800 p-3 rounded-xl">
                <p class="text-[9px] font-black text-zinc-500 uppercase tracking-widest mb-1">Réputation</p>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-bold text-[#059669]">+{{ Auth::user()->reputation ?? 0 }} pts</span>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-3 w-full px-3 py-2 text-xs font-bold text-zinc-500 hover:text-red-500 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Déconnexion
                </button>
            </form>
        </aside>

        <main class="flex-1 p-6">
            <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-[10px] font-black text-[#059669] uppercase tracking-widest mb-1">Mes espaces</h2>
                    <h1 class="text-xl font-extrabold tracking-tight uppercase">Mes colocations</h1>
                </div>

                <button type="button" onclick="toggleModal()" class="bg-[#064e3b] hover:bg-[#059669] text-white px-4 py-2.5 rounded-lg font-bold text-xs transition-all flex items-center gap-2 w-fit">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Nouvelle colocation
                </button>
            </header>

            <div class="mt-20 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 bg-zinc-900/50 rounded-2xl flex items-center justify-center mb-6 border border-zinc-800">
                    <svg class="w-8 h-8 text-zinc-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>

                <h3 class="text-sm font-bold uppercase tracking-tight text-white">Aucune colocation active</h3>
                <p class="text-zinc-500 text-xs mt-2 max-w-[280px] leading-relaxed">
                    Vous n'avez pas encore créé ou rejoint de colocation. Cliquez sur le bouton en haut pour commencer.
                </p>

                <div class="mt-8 flex gap-4">
                    <div class="h-[1px] w-8 bg-zinc-800 self-center"></div>
                    <span class="text-[9px] font-black text-zinc-700 uppercase tracking-[0.3em]">EasyColoc System</span>
                    <div class="h-[1px] w-8 bg-zinc-800 self-center"></div>
                </div>
            </div>
        </main>
    </div>

    <form action="{{ route('colocation.store') }}" method="POST" class="space-y-5">
        @csrf
        <!-- MODAL -->
        <div id="colocModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">

            <!-- Background -->
            <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" onclick="toggleModal()"></div>

            <!-- Modal Box -->
            <div class="relative bg-[#0a0a0a] border border-zinc-800 w-full max-w-lg rounded-2xl shadow-2xl p-8">

                <div class="mb-6">
                    <h2 class="text-[10px] font-black text-[#059669] uppercase tracking-widest mb-1">
                        Configuration
                    </h2>
                    <h3 class="text-xl font-extrabold tracking-tight uppercase text-white">
                        Créer une colocation
                    </h3>
                </div>

                <form action="{{ route('colocation.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-2 px-1">
                            Nom de la colocation
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="ex: Résidence Les Lilas"
                            class="w-full bg-black border border-zinc-800 focus:border-[#059669] rounded-xl px-4 py-3 text-sm text-white outline-none transition-all placeholder:text-zinc-700">

                        @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-4 pt-4">
                        <button type="submit"
                            class="flex-1 bg-[#064e3b] hover:bg-[#059669] text-white py-3 rounded-xl font-bold text-xs uppercase tracking-widest transition-all">
                            Créer la colocation
                        </button>

                        <button type="button" onclick="toggleModal()"
                            class="px-6 py-3 text-zinc-500 hover:text-white font-bold text-xs uppercase tracking-widest transition-all">
                            Annuler
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </form>

    <script>
        function toggleModal() {
            const modal = document.getElementById('colocModal');
            modal.classList.toggle('hidden');
        }
    </script>

</body>

</html>