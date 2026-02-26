<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        
        /* On applique le style global au conteneur du layout */
        .profile-container { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #050505; 
            min-height: 100vh;
        }

        .glass-card { 
            background: rgba(15, 15, 15, 0.7); 
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05); 
            transition: border 0.3s ease;
        }

        .glass-card:hover {
            border-color: rgba(5, 150, 105, 0.2);
        }

        /* Personnalisation des titres à l'intérieur des partials */
        .glass-card h2 { color: #ffffff !important; font-weight: 800 !important; letter-spacing: -0.025em !important; text-transform: uppercase !important; font-size: 0.875rem !important; }
        .glass-card p { color: #71717a !important; font-size: 0.75rem !important; }
        
        /* Style des inputs via sélecteurs globaux pour ne pas toucher aux partials */
        .glass-card input { 
            background-color: #000000 !important; 
            border-color: #27272a !important; 
            color: #ffffff !important;
            border-radius: 0.75rem !important;
            font-size: 0.813rem !important;
        }
        
        .glass-card input:focus { border-color: #059669 !important; box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.2) !important; }
        
        .glass-card label { color: #a1a1aa !important; font-weight: 600 !important; font-size: 0.75rem !important; text-transform: uppercase !important; letter-spacing: 0.05em !important; }
    </style>

    <div class="profile-container py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="px-4 sm:px-0 mb-8">
                <h2 class="text-2xl font-black text-white tracking-tight uppercase">
                    Configuration <span class="text-[#059669]">Profil</span>
                </h2>
                <p class="text-zinc-500 text-xs mt-1 font-medium">Gérez vos informations personnelles et la sécurité de votre compte.</p>
            </div>

            <div class="p-6 sm:p-10 glass-card sm:rounded-[2rem] shadow-2xl">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-6 sm:p-10 glass-card sm:rounded-[2rem] shadow-2xl border-l-2 border-l-[#059669]/20">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-6 sm:p-10 glass-card sm:rounded-[2rem] shadow-2xl border-b-2 border-b-red-500/10">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>