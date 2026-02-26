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
                    <h2 class="text-[10px] font-black text-[#059669] uppercase tracking-widest mb-1">Vue d'ensemble</h2>
                    <h1 class="text-xl font-extrabold tracking-tight uppercase">{{ $colocation->user?->name ?? 'Nom inconnu' }}</h1>
                </div>

                <div class="flex items-center gap-3">
                    <button class="bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white px-3 py-2 rounded-lg text-[10px] font-black uppercase transition-all flex items-center gap-2 border border-red-500/20">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Annuler la colocation
                    </button>
                    <a href="{{ route('colocation.show', $colocation) }}" class="bg-zinc-900 hover:bg-zinc-800 text-white px-4 py-2 rounded-lg text-[10px] font-black uppercase transition-all flex items-center gap-2 border border-zinc-800">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Retour
                    </a>
                </div>
            </header>

            @if(session('success'))
            <div class="bg-[#064e3b]/20 border border-[#059669]/30 text-[#059669] px-4 py-3 rounded-xl text-xs font-bold mb-8 flex items-center gap-3 animate-fade-in">
                <span class="w-2 h-2 bg-[#059669] rounded-full animate-pulse"></span>
                {{ session('success') }}
            </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-zinc-900/20 border border-zinc-900 rounded-[2rem] p-6 shadow-sm">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-sm font-black uppercase tracking-tight text-white">Dépenses récentes</h3>
                            <button class="bg-[#064e3b] hover:bg-[#059669] text-white px-4 py-2 rounded-lg font-bold text-[10px] uppercase transition-all flex items-center gap-2">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Nouvelle dépense
                            </button>
                        </div>

                        <div class="overflow-x-auto text-[11px]">
                            <table class="w-full text-left">
                                <thead>
                                    <tr class="text-zinc-600 font-black uppercase tracking-widest border-b border-zinc-800">
                                        <th class="pb-4">Titre / Catégorie</th>
                                        <th class="pb-4 text-center">Payeur</th>
                                        <th class="pb-4 text-center">Montant</th>
                                        <th class="pb-4 text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-zinc-800/50">
                                    <tr>
                                        <td colspan="4" class="py-16 text-center text-zinc-600 italic">
                                            Aucune dépense pour le moment.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-white/5 border border-zinc-900 rounded-[2rem] p-6 text-center">
                        <h3 class="text-xs font-black uppercase tracking-widest text-zinc-500 mb-6 text-left">Qui doit à qui ?</h3>
                        <p class="text-[11px] text-zinc-600 italic py-4">Aucun remboursement en attente.</p>
                    </div>

                    <div class="bg-zinc-900 border border-zinc-800 rounded-[2rem] overflow-hidden">
                        <div class="p-6 pb-2">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-[11px] font-black uppercase tracking-widest text-white">Membres de la coloc</h3>
                                <span class="px-2 py-0.5 bg-[#059669]/10 text-[#059669] text-[8px] font-black rounded uppercase">Actifs</span>
                            </div>

                            <div class="space-y-3">
                                <div class="flex items-center justify-between bg-black/40 p-3 rounded-xl border border-white/5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-zinc-800 flex items-center justify-center text-[10px] font-black text-[#059669] border border-zinc-700">
                                            {{ substr(Auth::user()->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="text-[11px] font-black text-white uppercase">{{ Auth::user()->name }}</p>
                                            <p class="text-[9px] text-zinc-500 font-bold flex items-center gap-1 uppercase">
                                                <span class="text-orange-500 text-[10px]">👑</span> Owner
                                            </p>
                                        </div>
                                    </div>
                                    <span class="text-[10px] font-black text-[#059669]">0 DH</span>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 bg-black/20 mt-4">
                            <button class="w-full bg-zinc-800 hover:bg-zinc-700 text-white py-2.5 rounded-xl font-bold text-[10px] uppercase tracking-widest transition flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                                Inviter un membre
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</body>

</html>