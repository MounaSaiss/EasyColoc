<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - EasyColoc</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0a0a0a] text-white font-sans antialiased">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="max-w-md w-full">
            
            <div class="text-center mb-8">
                <h1 class="text-4xl font-black tracking-tighter">
                    EASY<span class="text-[#064e3b]">COLOC</span>
                </h1>
                <p class="text-gray-400 text-sm mt-2">La gestion simplifiée de votre colocation.</p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-2xl">
                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-[#064e3b] uppercase tracking-wider mb-2">Adresse Email</label>
                        <input type="email" name="email" required 
                            class="w-full border-2 border-gray-100 rounded-xl px-4 py-3 text-black focus:border-[#064e3b] outline-none transition">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-[#064e3b] uppercase tracking-wider mb-2">Mot de passe</label>
                        <input type="password" name="password" required 
                            class="w-full border-2 border-gray-100 rounded-xl px-4 py-3 text-black focus:border-[#064e3b] outline-none transition">
                    </div>

                    <button type="submit" class="w-full bg-[#064e3b] hover:bg-[#065f46] text-white font-bold py-4 rounded-xl shadow-lg transition duration-300">
                        Se connecter
                    </button>
                </form>

                <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                    <p class="text-gray-500 text-sm mb-4">Vous n'avez pas encore de compte chez nous ?</p>
                    <a href="{{ route('register') }}" class="group inline-flex items-center text-black font-bold hover:text-[#064e3b] transition">
                        <span>Créer mon accès colocataire</span>
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>