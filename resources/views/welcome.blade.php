<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColoc - Gérez vos dépenses en toute sérénité</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#0a0a0a] text-white font-sans antialiased">

    @if(isset($message))
    <div>{{$message}}</div>
    @endif
    <nav class="flex items-center justify-between px-8 py-6 border-b border-zinc-900 bg-[#0a0a0a]/80 backdrop-blur-md sticky top-0 z-50">
        <div class="text-2xl font-black tracking-tighter">
            EASY<span class="text-[#059669]">COLOC</span>
        </div>
        <div class="space-x-8 hidden md:flex text-sm font-medium uppercase tracking-widest text-gray-400">
            <a href="#features" class="hover:text-white transition">Fonctionnalités</a>
            <a href="#reputation" class="hover:text-white transition">Réputation</a>
        </div>
        <div class="flex items-center gap-2">
            @if (Route::has('login'))
            @auth
            {{-- Groupe Connecté : Tableau de Bord + Déconnexion --}}
            <div class="flex items-center gap-4">
                <a href="{{ route('user.dashboard') }}"
                    class="bg-white text-black px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-[#059669] hover:text-white transition-all duration-300 shadow-sm border border-zinc-100 whitespace-nowrap">
                    Tableau de bord
                </a>

                <form method="POST" action="{{ route('logout') }}" class="flex items-center">
                    @csrf
                    <button type="submit"
                        class="group flex items-center gap-2 px-2 py-2 text-[10px] font-black uppercase tracking-widest text-zinc-500 hover:text-red-500 transition-all duration-300">
                        <svg class="w-4 h-4 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span class="hidden sm:inline">Déconnexion</span>
                    </button>
                </form>
            </div>
            @else
            {{-- Groupe Invité : Connexion + Inscription --}}
            <div class="flex items-center gap-6">
                <a href="{{ route('login') }}" class="text-xs font-bold text-gray-400 hover:text-white transition uppercase tracking-widest">
                    Connexion
                </a>
                <a href="{{ route('register') }}"
                    class="bg-[#064e3b] text-white px-5 py-2.5 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-[#059669] transition shadow-lg shadow-green-900/20">
                    Nous rejoindre
                </a>
            </div>
            @endauth
            @endif
        </div>
    </nav>

    <header class="relative pt-20 pb-32 px-8 overflow-hidden">
        <div class="max-w-6xl mx-auto text-center relative z-10">
            <span class="inline-block py-1 px-4 rounded-full bg-[#064e3b]/30 text-[#059669] text-xs font-bold uppercase tracking-widest mb-6 border border-[#059669]/20">
                L'application n°1 pour les colocataires
            </span>
            <h1 class="text-6xl md:text-8xl font-black mb-8 tracking-tighter leading-none">
                FINIS LES COMPTES <br> <span class="text-[#059669]">D'APOTHICAIRE.</span>
            </h1>
            <p class="text-gray-400 text-xl max-w-2xl mx-auto mb-12">
                EasyColoc automatise vos calculs, suit vos dépenses communes et gère les remboursements en un clic.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('register') }}" class="px-10 py-4 bg-white text-black font-black rounded-xl text-lg hover:bg-[#059669] hover:text-white transition transform hover:scale-105">
                    Démarrer ma colocation
                </a>
                <a href="#features" class="px-10 py-4 border border-zinc-800 text-white font-bold rounded-xl text-lg hover:bg-zinc-900 transition">
                    Voir comment ça marche
                </a>
            </div>
        </div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-[#064e3b]/10 rounded-full blur-[120px] -z-0"></div>
    </header>

    <section id="features" class="py-24 px-8 bg-white text-black rounded-t-[50px]">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-3 gap-12">
                <div class="space-y-4">
                    <div class="w-12 h-12 bg-black text-white flex items-center justify-center rounded-xl font-bold text-xl italic">01</div>
                    <h3 class="text-2xl font-black uppercase italic">Dépenses partagées</h3>
                    <p class="text-gray-600">Ajoutez vos tickets de caisse, factures et loyers. L'application répartit automatiquement les parts de chacun.</p>
                </div>
                <div class="space-y-4">
                    <div class="w-12 h-12 bg-[#064e3b] text-white flex items-center justify-center rounded-xl font-bold text-xl italic">02</div>
                    <h3 class="text-2xl font-black uppercase italic">Qui doit quoi ?</h3>
                    <p class="text-gray-600">Une vue simplifiée vous indique exactement combien vous devez rembourser ou combien on vous doit.</p>
                </div>
                <div class="space-y-4">
                    <div class="w-12 h-12 bg-black text-white flex items-center justify-center rounded-xl font-bold text-xl italic">03</div>
                    <h3 class="text-2xl font-black uppercase italic">Paiement Express</h3>
                    <p class="text-gray-600">Une fois remboursé, marquez la dette comme "payée". L'historique se met à jour instantanément.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="reputation" class="py-24 px-8 bg-zinc-950">
        <div class="max-w-5xl mx-auto border border-zinc-800 rounded-[30px] p-12 flex flex-col md:flex-row items-center gap-12">
            <div class="flex-1">
                <h2 class="text-4xl font-black mb-6 uppercase tracking-tight leading-tight">
                    Un système de <span class="text-[#059669]">réputation</span> intégré.
                </h2>
                <p class="text-gray-400 text-lg mb-6">
                    Valorisez les bons payeurs. Quitter une colocation sans dettes augmente votre score. Les mauvais comportements financiers sont affichés pour protéger la communauté.
                </p>
                <div class="flex items-center gap-4">
                    <div class="bg-green-500/20 text-green-400 px-4 py-2 rounded-lg font-bold">+1 Réputation</div>
                    <span class="text-zinc-600 italic text-sm">Responsabilité et confiance.</span>
                </div>
            </div>
            <div class="w-full md:w-1/3 aspect-square bg-gradient-to-br from-[#064e3b] to-black rounded-2xl flex items-center justify-center shadow-2xl">
                <span class="text-8xl">💎</span>
            </div>
        </div>
    </section>

    <footer class="py-12 px-8 border-t border-zinc-900 text-center text-gray-500 text-sm">
        <p>&copy; 2024 EasyColoc. Conçu pour les colocations modernes.</p>
    </footer>

</body>

</html>