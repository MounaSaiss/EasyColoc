<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - EasyColoc</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-white text-black antialiased">
    <div class="min-h-screen flex">

        <div class="hidden lg:flex w-5/12 bg-[#0a0a0a] flex-col justify-between p-16 relative overflow-hidden">
            <div class="absolute -top-20 -left-20 w-64 h-64 bg-[#064e3b]/20 rounded-full blur-3xl"></div>

            <div class="relative z-10">
                <div class="text-2xl font-black tracking-tighter text-white mb-20">
                    EASY<span class="text-[#059669]">COLOC</span>
                </div>
                <h2 class="text-6xl font-extrabold text-white leading-none tracking-tighter">
                    L'argent ne sera plus un <span class="text-[#059669]">problème.</span>
                </h2>
                <p class="text-gray-400 mt-8 text-lg max-w-sm leading-relaxed">
                    Rejoignez des milliers de colocataires qui gèrent leurs comptes sans une seule dispute.
                </p>
            </div>
            <a href="{{ route('home') }}" class="group inline-flex items-center text-[#064e3b] font-bold hover:text-[#065f46] transition">
                <span>Retour à l'accueil</span>
            </a>
        </div>

        <div class="w-full lg:w-7/12 flex items-center justify-center p-8 bg-[#fcfcfc]">
            <div class="max-w-md w-full">
                <div class="mb-12">
                    <h2 class="text-4xl font-extrabold tracking-tight mb-2">CRÉER UN COMPTE</h2>
                    <div class="h-1 w-12 bg-[#064e3b] mb-4"></div>
                    <p class="text-gray-500 font-medium">Entrez vos détails pour commencer l'expérience.</p>
                </div>



                <form action="{{ route('register') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="group">
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-1 group-focus-within:text-[#064e3b] transition-colors">Nom complet</label>
                        <div class="flex items-center border-b-2 border-gray-100 group-focus-within:border-[#064e3b] transition-all">
                            <input type="text" name="name" value="{{ old('name') }}" required placeholder="Ex: Jean Dupont"
                                class="w-full py-3 bg-transparent outline-none text-lg placeholder:text-gray-200">
                        </div>
                    </div>

                    <div class="group">
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-1 group-focus-within:text-[#064e3b] transition-colors">Adresse Email</label>
                        <div class="flex items-center border-b-2 border-gray-100 group-focus-within:border-[#064e3b] transition-all">
                            <input type="email" name="email" value="{{ old('email') }}" required placeholder="jean@exemple.com"
                                class="w-full py-3 bg-transparent outline-none text-lg placeholder:text-gray-200">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-8">
                        <div class="group">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-1 group-focus-within:text-[#064e3b] transition-colors">Mot de passe</label>
                            <div class="flex items-center border-b-2 border-gray-100 group-focus-within:border-[#064e3b] transition-all">
                                <input type="password" name="password" value="{{ old('password') }}" required placeholder="••••••••"
                                    class="w-full py-3 bg-transparent outline-none text-lg placeholder:text-gray-200">
                            </div>
                        </div>
                        <div class="group">
                            <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-1 group-focus-within:text-[#064e3b] transition-colors">Confirmation</label>
                            <div class="flex items-center border-b-2 border-gray-100 group-focus-within:border-[#064e3b] transition-all">
                                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" required placeholder="••••••••"
                                    class="w-full py-3 bg-transparent outline-none text-lg placeholder:text-gray-200">
                            </div>
                        </div>
                    </div>

                    <div class="pt-10">
                        <button type="submit" class="group relative w-full bg-black text-white font-bold py-5 rounded-2xl overflow-hidden transition-all hover:bg-[#064e3b] active:scale-[0.98]">
                            <span class="relative z-10 flex items-center justify-center">
                                COMMENCER L'AVENTURE
                                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>
                <br>
                @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="mt-12 text-center">
                    <p class="text-sm text-gray-400 font-medium">
                        Déjà membre de l'équipe ?
                        <a href="{{ route('login') }}" class="text-black font-extrabold hover:text-[#064e3b] underline underline-offset-8 decoration-gray-200 hover:decoration-[#064e3b] transition-all ml-1">
                            Se connecter
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>