<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - EasyColoc Elite</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #050505;
            color: #d4d4d8;
        }

        .glass-card {
            background: rgba(15, 15, 15, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>

<body class="text-[13px] antialiased">
    <div class="min-h-screen flex">
        <aside class="w-60 border-r border-zinc-900 flex flex-col p-6 gap-6 bg-[#070707]">
            <div class="px-2">
                <div class="text-lg font-black tracking-tighter text-white uppercase">
                    Easy<span class="text-[#059669]">Coloc</span>
                </div>
                <span class="text-[9px] tracking-[0.2em] text-zinc-500 uppercase font-bold">Admin Panel</span>
            </div>

            <nav class="flex-1 space-y-1">
                <a href="#" class="flex items-center gap-3 bg-[#064e3b] text-white px-4 py-2.5 rounded-xl font-bold text-sm transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                    Dashboard
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

        <main class="flex-1 p-8 overflow-y-auto">
            <header class="flex justify-between items-center mb-10">
                <div>
                    <h1 class="text-2xl font-black text-white tracking-tight uppercase">Statistiques <span class="text-[#059669]">Globales</span></h1>
                    <p class="text-zinc-500 text-xs mt-1 font-medium">Surveillance en temps réel des activités.</p>
                </div>
                <div class="flex items-center gap-4 bg-zinc-900/40 p-2 rounded-2xl border border-zinc-800">
                    <div class="w-9 h-9 bg-[#059669] rounded-lg flex items-center justify-center text-white font-black text-sm">A</div>
                    <div class="pr-3 leading-tight">
                        <p class="text-[9px] font-bold text-zinc-500 uppercase">Session</p>
                        <p class="text-[12px] font-bold text-white">Admin</p>
                    </div>
                </div>
            </header>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
                <div class="glass-card p-5 rounded-2xl group">
                    <p class="text-zinc-500 text-[10px] font-black uppercase tracking-widest mb-1">Utilisateurs</p>
                    <div class="flex justify-between items-end">
                        <h3 class="text-3xl font-black text-white leading-none">{{ $totalUsers }}</h3>
                        <div class="w-8 h-8 bg-zinc-900 rounded-lg flex items-center justify-center text-[#059669]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="glass-card p-5 rounded-2xl group">
                    <p class="text-zinc-500 text-[10px] font-black uppercase tracking-widest mb-1">Colocations</p>
                    <div class="flex justify-between items-end">
                        <h3 class="text-3xl font-black text-white leading-none">{{ $totalColocations }}</h3>
                        <div class="w-8 h-8 bg-zinc-900 rounded-lg flex items-center justify-center text-zinc-500 group-hover:text-[#059669]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="glass-card p-5 rounded-2xl group">
                    <p class="text-zinc-500 text-[10px] font-black uppercase tracking-widest mb-1">Bannis</p>
                    <div class="flex justify-between items-end">
                        <h3 class="text-3xl font-black text-white leading-none">{{ $userBanned }}</h3>
                        <div class="w-8 h-8 bg-zinc-900 rounded-lg flex items-center justify-center text-red-900/50 group-hover:text-red-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728A9 9 0 115.636 5.636m12.728 12.728L5.636 5.636"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="glass-card p-5 rounded-2xl border-l-2 border-orange-500/30">
                    <p class="text-zinc-500 text-[10px] font-black uppercase tracking-widest mb-1">Impayées</p>
                    <div class="flex justify-between items-end">
                        <h3 class="text-2xl font-black text-white leading-none">{{ $totalImpayes }} <span class="text-xs text-orange-500">DH</span></h3>
                        <div class="w-8 h-8 bg-zinc-900 rounded-lg flex items-center justify-center text-orange-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3 1.343 3 3-1.343 3-3 3m0-13a9 9 0 110 18 9 9 0 010-18z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-[#0c0c0c] rounded-2xl border border-zinc-900 overflow-hidden">
                <div class="px-8 py-6 border-b border-zinc-900 flex justify-between items-center">
                    <h3 class="text-sm font-bold text-white uppercase tracking-wider">Membres Inscrits</h3>
                    <div class="flex gap-2">
                        <input type="text" placeholder="Rechercher..." class="bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-2 text-[12px] text-white focus:outline-none focus:border-[#059669]/50 w-56">
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-[10px] font-black text-zinc-500 uppercase tracking-widest bg-zinc-900/30">
                                <th class="px-8 py-4">Nom</th>
                                <th class="px-8 py-4">Contact</th>
                                <th class="px-8 py-4 text-center">Date</th>
                                <th class="px-8 py-4 text-center">Status</th>
                                <th class="px-8 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-900/50">
                            @foreach($users as $user)
                            <tr class="hover:bg-zinc-900/10 transition-all">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 bg-zinc-800 rounded-lg flex items-center justify-center font-bold text-white text-xs border border-zinc-700">
                                            {{ strtoupper(substr($user->name,0,1)) }}
                                        </div>
                                        <span class="font-semibold text-zinc-200">{{ $user->name }}</span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-zinc-400 text-[12px]">{{ $user->email }}</td>

                                <td class="px-6 py-4 text-center text-zinc-400 text-[12px]">
                                    {{ $user->created_at?->format('d/m/Y') ?? 'N/A' }}
                                </td>

                                <td class="px-6 py-4 text-center">
                                    @if($user->isBanned)
                                    <span class="px-3 py-1 bg-red-100 text-red-600 rounded-lg text-[10px] font-bold uppercase tracking-tighter border border-red-200">
                                        Banni
                                    </span>
                                    @elseif($user->role === 'admin')
                                    <span class="px-3 py-1 bg-[#059669] text-white rounded-lg text-[10px] font-bold uppercase tracking-tighter shadow-md shadow-[#059669]/20">
                                        Protégé
                                    </span>
                                    @else
                                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-[10px] font-bold uppercase tracking-tighter border border-green-200">
                                        Actif
                                    </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-right">
                                    @if($user->role !== 'admin')
                                    <form action="{{ route($user->isBanned ? 'admin.users.unban' : 'admin.users.ban', $user) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="px-4 py-1.5 rounded-md text-[10px] font-bold uppercase border transition-all
                            {{ $user->isBanned ? 'bg-green-100 text-green-700 border-green-200 hover:bg-green-600 hover:text-white' 
                                            : 'bg-red-100 text-red-600 border-red-200 hover:bg-red-600 hover:text-white' }}">
                                            {{ $user->isBanned ? 'Débannir' : 'Bannir' }}
                                        </button>
                                    </form>
                                    @else
                                    <span class="text-zinc-500 italic text-[10px] font-bold">Système</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</body>

</html>