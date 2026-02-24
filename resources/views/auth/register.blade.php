<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - EasyColoc</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-black font-sans antialiased">
    <div class="min-h-screen flex">
        
        <div class="hidden lg:flex w-1/2 bg-[#0a0a0a] items-center justify-center p-12">
            <div class="max-w-md">
                <h2 class="text-5xl font-bold text-white mb-6">Rejoignez</h2>
                <h1 class="text-4xl font-black  text-white tracking-tighter">
                    EASY<span class="text-[#064e3b]">COLOC</span>
                </h1>
                <br>
                <p class="text-gray-400 text-lg">Gérez vos dépenses, suivez vos dettes et maintenez une entente parfaite avec vos colocataires.</p>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
            <div class="max-w-md w-full">
                <div class="mb-10">
                    <h2 class="text-3xl font-black uppercase tracking-tight">Inscription</h2>
                    <p class="text-gray-500">Créez votre profil en moins de 2 minutes.</p>
                </div>

                <form action="{{ route('register') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Nom complet</label>
                        <input type="text" name="name" required class="w-full border-b-2 border-gray-100 py-3 focus:border-[#064e3b] outline-none transition text-lg">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Email</label>
                        <input type="email" name="email" required class="w-full border-b-2 border-gray-100 py-3 focus:border-[#064e3b] outline-none transition text-lg">
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Mot de passe</label>
                            <input type="password" name="password" required class="w-full border-b-2 border-gray-100 py-3 focus:border-[#064e3b] outline-none transition text-lg">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Confirmation</label>
                            <input type="password" name="password_confirmation" required class="w-full border-b-2 border-gray-100 py-3 focus:border-[#064e3b] outline-none transition text-lg">
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="submit" class="w-full bg-black text-white font-bold py-4 rounded-xl hover:bg-[#064e3b] transition duration-300 shadow-xl">
                            Créer mon compte
                        </button>
                    </div>
                </form>

                <div class="mt-8 text-center">
                    <span class="text-gray-500 italic">Déjà membre ?</span>
                    <a href="{{ route('login') }}" class="ml-2 font-bold text-[#064e3b] hover:underline selection:bg-green-100">Retour à la connexion</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>