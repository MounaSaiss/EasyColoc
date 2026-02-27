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
                <a href="{{ route('colocation.list') }}" class="flex items-center gap-3 bg-[#064e3b] text-white px-3 py-2 rounded-lg font-bold text-xs transition">
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

            {{-- Message succès --}}
            @if(session('success'))
            <div class="bg-green-600 text-white px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif

            {{-- Message erreur --}}
            @if(session('error'))
            <div class="bg-red-600 text-white px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
            @endif

            <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-[10px] font-black text-[#059669] uppercase tracking-widest mb-1">
                        Mes espaces
                    </h2>
                    <h1 class="text-xl font-extrabold tracking-tight uppercase">
                        Mes colocations
                    </h1>
                </div>

                <button type="button"
                    onclick="toggleModal()"
                    class="bg-[#064e3b] hover:bg-[#059669] text-white px-4 py-2.5 rounded-lg font-bold text-xs transition-all flex items-center gap-2 w-fit">

                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                    </svg>

                    Nouvelle colocation
                </button>
            </header>


            {{-- Liste des colocations --}}
            @if(isset($colocations) && $colocations->count() > 0)

            <div class="grid md:grid-cols-3 gap-6">

                @foreach($colocations as $colocation)

                @php
                $membership = $colocation->users
                ->where('id', auth()->id())
                ->first();
                @endphp

                <div class="bg-[#111111] border border-zinc-800 rounded-2xl p-5 hover:border-[#059669] transition-all">

                    <div class="flex items-center justify-between mb-4">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-xl bg-[#064e3b] flex items-center justify-center font-bold text-sm">
                                {{ strtoupper(substr($colocation->name, 0, 1)) }}
                            </div>

                            <div>
                                <h3 class="text-sm font-bold uppercase">
                                    {{ $colocation->name }}
                                </h3>

                                <p class="text-[10px] text-zinc-500 uppercase tracking-widest">
                                    {{ $colocation->users->count() }} membres
                                </p>

                                {{-- ROLE AUTH USER (via memberships pivot) --}}
                                @if($membership)
                                <div class="mt-2">
                                    @if($membership->pivot->role === 'owner')
                                    <span class="text-[9px] bg-yellow-500/20 text-yellow-400 px-2 py-1 rounded-full font-bold uppercase flex items-center gap-1 w-fit">
                                        <!-- Crown -->
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M5 16h10l1-8-4 3-2-5-2 5-4-3 1 8z" />
                                        </svg>
                                        Owner
                                    </span>
                                    @else
                                    <span class="text-[9px] bg-blue-500/20 text-blue-400 px-2 py-1 rounded-full font-bold uppercase flex items-center gap-1 w-fit">
                                        <!-- User -->
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 10a4 4 0 100-8 4 4 0 000 8zm-6 8a6 6 0 1112 0H4z" />
                                        </svg>
                                        Member
                                    </span>
                                    @endif
                                </div>
                                @endif

                            </div>
                        </div>

                        {{-- Badge status --}}
                        @if($colocation->type === 'cancelled')
                        <span class="text-[9px] bg-red-500/20 text-red-400 px-2 py-1 rounded-full font-bold uppercase">
                            Cancelled
                        </span>
                        @else
                        <span class="text-[9px] bg-green-500/20 text-green-400 px-2 py-1 rounded-full font-bold uppercase">
                            Active
                        </span>
                        @endif

                    </div>

                    <div class="flex justify-between items-center mt-6 text-xs text-zinc-400">

                        <span>
                            Dépenses : {{ $colocation->expenses->count() }}
                        </span>

                        @if($colocation->type !== 'cancelled')
                        <a href="{{ route('colocation.colocationShow', $colocation->id) }}"
                            class="w-8 h-8 flex items-center justify-center bg-[#064e3b] rounded-full hover:bg-[#059669] transition">
                            →
                        </a>
                        @else
                        <span
                            class="w-8 h-8 flex items-center justify-center bg-zinc-700 text-zinc-500 rounded-full cursor-not-allowed opacity-50">
                            →
                        </span>
                        @endif

                    </div>

                </div>

                @endforeach

            </div>

            @else

            <div class="mt-20 flex flex-col items-center justify-center text-center">

                <div class="w-16 h-16 bg-zinc-900/50 rounded-2xl flex items-center justify-center mb-6 border border-zinc-800">
                    <!-- Ton SVG ici -->
                </div>

                <h3 class="text-sm font-bold uppercase tracking-tight text-white">
                    Aucune colocation
                </h3>

                <p class="text-zinc-500 text-xs mt-2 max-w-[280px] leading-relaxed">
                    Vous n'avez pas encore créé ou rejoint de colocation.
                </p>

            </div>

            @endif

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