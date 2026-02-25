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
            background-color: #f8fafc;
            font-size: 14px;
        }
    </style>
</head>

<body class="antialiased text-slate-900">

    <div class="min-h-screen flex">
        <aside class="w-64 bg-[#0a0a0a] text-white flex flex-col p-5 sticky top-0 h-screen transition-all">
            <div class="text-xl font-black tracking-tighter mb-8 px-2">
                EASY<span class="text-[#059669]">COLOC</span>
            </div>

            <nav class="flex-1 space-y-1">
                <a href="#" class="flex items-center gap-3 bg-[#064e3b] text-white px-4 py-2.5 rounded-xl font-bold text-sm transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    Dashboard
                </a>
                <a href="#" class="flex items-center gap-3 text-zinc-500 hover:text-white px-4 py-2.5 rounded-xl text-sm font-semibold transition group">
                    <svg class="w-5 h-5 group-hover:text-[#059669]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    Colocations
                </a>
                <a href="{{route('user.dashboard')}}" class="flex items-center gap-3 text-zinc-500 hover:text-white px-4 py-2.5 rounded-xl text-sm font-semibold transition group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    Principale Dashboard
                </a>

                @if(Auth::user()->isGlobalAdmin)
                <div class="pt-4 mt-4 border-t border-zinc-800">
                    <p class="px-4 text-[9px] font-black text-zinc-600 uppercase tracking-widest mb-2">Admin</p>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 text-zinc-500 hover:text-white px-4 py-2 rounded-xl text-xs font-semibold hover:bg-[#064e3b]/10 transition">
                        <svg class="w-4 h-4 text-[#059669]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Admin Panel
                    </a>
                </div>
                @endif
            </nav>

            <div class="mt-auto bg-zinc-900 border border-zinc-800 p-4 rounded-2xl">
                <div class="flex justify-between items-end mb-2">
                    <p class="text-[9px] font-black text-zinc-500 uppercase tracking-widest">Réputation</p>
                    <span class="text-sm font-black text-[#059669]">+{{ Auth::user()->reputation ?? 0 }}</span>
                </div>
                <div class="h-1 w-full bg-zinc-800 rounded-full overflow-hidden">
                    <div class="h-full bg-[#059669]" style="width: 75%"></div>
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

        <main class="flex-1 p-6 lg:p-10 overflow-y-auto">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl font-black tracking-tight uppercase">Dashboard</h1>
                    <p class="text-zinc-400 text-xs">Bonjour, {{ Auth::user()->name }}</p>
                </div>
                <div class="flex items-center gap-4">
                    <button class="bg-[#0a0a0a] text-white px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-[#064e3b] transition shadow-md">
                        + Dépense
                    </button>
                    <div class="flex items-center gap-2 bg-white px-3 py-1.5 rounded-xl shadow-sm border border-zinc-100">
                        <div class="w-7 h-7 bg-[#0a0a0a] rounded-lg flex items-center justify-center text-white font-black text-[10px] uppercase">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span class="text-xs font-bold">{{ Auth::user()->name }}</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                <div class="bg-white p-6 rounded-3xl border border-zinc-100 flex items-center justify-between">
                    <div>
                        <p class="text-zinc-400 font-bold uppercase text-[9px] tracking-widest mb-1">Score Réputation</p>
                        <h2 class="text-3xl font-black text-[#0a0a0a]">{{ Auth::user()->reputation ?? 0 }}</h2>
                    </div>
                    <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center text-[#059669]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-zinc-100 flex items-center justify-between">
                    <div>
                        <p class="text-zinc-400 font-bold uppercase text-[9px] tracking-widest mb-1">Dépenses (Fév)</p>
                        <h2 class="text-3xl font-black text-[#0a0a0a]">0,00 €</h2>
                    </div>
                    <div class="w-10 h-10 bg-zinc-50 rounded-xl flex items-center justify-center text-zinc-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl border border-zinc-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-zinc-50 flex justify-between items-center">
                    <h3 class="text-sm font-black uppercase tracking-tight">Dépenses récentes</h3>
                    <a href="#" class="text-[#059669] font-bold text-[11px] hover:underline">Voir tout</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-zinc-50/50">
                            <tr class="text-[9px] font-black text-zinc-400 uppercase tracking-widest border-b border-zinc-100">
                                <th class="px-6 py-3">Titre</th>
                                <th class="px-6 py-3">Payeur</th>
                                <th class="px-6 py-3">Montant</th>
                                <th class="px-6 py-3 text-right">Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-50 text-xs">
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-zinc-400 italic">Aucune donnée disponible.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <aside class="w-72 bg-white border-l border-zinc-100 p-6 hidden xl:block">
            <h3 class="text-xs font-black uppercase tracking-widest text-zinc-400 mb-6">Membres</h3>
            <div class="bg-[#0a0a0a] rounded-2xl p-5 text-white">
                <span class="text-[9px] font-black uppercase text-[#059669]">Status</span>
                <p class="text-xs font-bold mt-1 mb-4 leading-relaxed text-zinc-300">Aucune colocation active.</p>
                <button class="w-full bg-[#064e3b] py-2 rounded-lg text-[10px] font-black uppercase tracking-widest hover:bg-[#059669] transition">
                    Créer
                </button>
            </div>
        </aside>
    </div>

</body>

</html>