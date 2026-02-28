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
                <a href="#" class="flex items-center gap-3 bg-[#064e3b] text-white px-3 py-2 rounded-lg font-bold text-xs transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('colocation.list') }}" class="flex items-center gap-3 text-zinc-500 hover:text-white px-3 py-2 rounded-lg text-xs font-semibold transition">
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
            <header class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-[10px] font-black text-[#059669] uppercase tracking-widest mb-1">Vue d'ensemble</h2>
                    <h1 class="text-xl font-extrabold tracking-tight uppercase">Tableau de bord</h1>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-zinc-900 rounded-lg border border-zinc-800 flex items-center justify-center text-xs font-bold text-[#059669]">
                        {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                    </div>
                </div>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                <div class="bg-white rounded-2xl p-5 text-black relative overflow-hidden group">
                    <p class="text-[9px] font-bold text-zinc-400 uppercase tracking-widest mb-1">Score réputation</p>
                    <h3 class="text-3xl font-black">{{ Auth::user()->reputation ?? 0 }}</h3>
                    <div class="absolute -right-2 -bottom-2 text-zinc-100 opacity-20 text-6xl font-black">★</div>
                </div>

                <div class="bg-white rounded-2xl p-5 text-black relative overflow-hidden group">
                    <p class="text-[9px] font-bold text-zinc-400 uppercase tracking-widest mb-1">Dépenses Global (Feb)</p>
                    <h3 class="text-3xl font-black">0,00 €</h3>
                    <div class="absolute -right-2 -bottom-2 text-zinc-100 opacity-20 text-6xl font-black">€</div>
                </div>

                <div class="bg-[#064e3b] rounded-2xl p-5 text-white flex flex-col justify-between shadow-lg border border-green-700">
                    <div>
                        <p class="text-[9px] font-bold text-green-300 uppercase tracking-widest mb-2"> 🟢 Ma Colocation Active </p>

                        @if($activeColo = Auth::user()->colocations->firstWhere('type', 'active'))
                        <div class="flex items-center gap-2">
                            <h3 class="text-lg font-extrabold leading-tight tracking-wide">
                                {{ $activeColo->name }}
                            </h3>
                            <span class="inline-block px-2 py-0.5 bg-green-600/30 text-green-200 text-[10px] font-bold rounded-full uppercase">
                                Active
                            </span>
                        </div>
                        @else
                        <h3 class="text-sm font-bold leading-tight text-zinc-300">Aucune colocation active</h3>
                        @endif
                    </div>
                </div>
            </div>

            <div class="bg-zinc-900/20 border border-zinc-900 rounded-2xl p-5">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-sm font-bold uppercase tracking-tight">Dépenses récentes</h3>
                    <a href="#" class="text-[#059669] text-[10px] font-black hover:underline uppercase">Voir tout</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-[9px] font-black text-zinc-600 uppercase tracking-widest border-b border-zinc-800">
                                <th>Titre</th>
                                <th>Catégorie</th>
                                <th>Payeur</th>
                                <th>Montant</th>
                                <th>Colocation</th>
                            </tr>
                        </thead>
                        @isset($expenses)
                        <tbody>
                            @forelse($expenses as $expense)
                            <tr>
                                <td>{{ $expense->title }}</td>
                                <td>{{ $expense->category->name ?? 'Général' }}</td>
                                <td>{{ $expense->payer->name }}</td>
                                <td>{{ number_format($expense->montant, 2) }} €</td>
                                <td>{{ $expense->colocation->name ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">Aucune dépense enregistrée.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @endisset
            </div>
        </main>
    </div>

</body>

</html>