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
            <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-[10px] font-black text-[#059669] uppercase tracking-widest mb-1">Vue d'ensemble</h2>
                    <h1 class="text-xl font-extrabold tracking-tight uppercase">{{ $colocation->user?->name ?? 'Nom inconnu' }}</h1>
                </div>

                <div class="flex items-center gap-3">
                    <button
                        class="bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white px-3 py-2 rounded-lg text-[10px] font-black uppercase transition-all flex items-center gap-2 border border-red-500/20"
                        onclick="cancelColocation({{ $colocation->id }})">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Annuler la colocation
                    </button>
                    <a href="{{ route('colocation.list') }}" class="bg-zinc-900 hover:bg-zinc-800 text-white px-4 py-2 rounded-lg text-[10px] font-black uppercase transition-all flex items-center gap-2 border border-zinc-800">
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
                            <button onclick="toggleExpenseModal()" class="bg-[#064e3b] hover:bg-[#059669] text-white px-4 py-2 rounded-lg font-bold text-[10px] uppercase transition-all flex items-center gap-2">
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
                                    @forelse($expenses as $expense)
                                    <tr>
                                        <td class="py-4">
                                            <div class="font-bold text-white">
                                                {{ $expense->title }}
                                            </div>
                                        </td>

                                        <td class="py-4 text-center">
                                            <div class="text-[11px] font-bold text-white">
                                                {{ $expense->payer->name ?? 'Utilisateur inconnu' }}
                                            </div>
                                        </td>

                                        <td class="py-4 text-center">
                                            <div class="text-[11px] font-bold text-white">
                                                {{ number_format($expense->montant, 2) }} DH
                                            </div>
                                        </td>

                                        <td class="py-4 text-right">
                                            <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE') 
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg font-bold text-[9px] uppercase transition-all">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="py-6 text-center text-zinc-600 italic">
                                            Aucune dépense enregistrée.
                                        </td>
                                    </tr>
                                    @endforelse
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
                                @forelse($colocation->users as $user)
                                <div class="flex items-center justify-between bg-black/40 p-3 rounded-xl border border-white/5">

                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-zinc-800 flex items-center justify-center text-[10px] font-black text-[#059669] border border-zinc-700">
                                            {{ strtoupper(substr($user->name, 0, 2)) }}
                                        </div>

                                        <div>
                                            <p class="text-[11px] font-black text-white uppercase">
                                                {{ $user->name }}
                                            </p>

                                            <p class="text-[9px] text-zinc-500 font-bold flex items-center gap-1 uppercase">
                                                @if($user->pivot->role === 'owner')
                                                <span class="text-orange-500 text-[10px]">👑</span> Propriétaire
                                                @else
                                                <span>👤</span> Membre
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    @if(auth()->id() === $colocation->users->firstWhere('pivot.role', 'owner')?->id
                                    && $user->pivot->role !== 'owner')
                                    <form action="{{ route('colocation.removeUser', [$colocation->id, $user->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            onclick="return confirm('Retirer ce membre de la colocation ?')"
                                            class="bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white px-3 py-1 rounded-lg font-bold text-[9px] uppercase transition-all border border-red-500/20">
                                            Retirer
                                        </button>
                                    </form>
                                    @endif
                                </div>
                                @empty
                                <div class="bg-black/40 p-4 rounded-xl border border-white/5 text-center text-zinc-500 italic text-[11px]">
                                    Aucun membre dans cette colocation.
                                </div>
                                @endforelse
                            </div>
                        </div>

                        <div class="p-4 bg-black/20 mt-4">
                            <button onclick="toggleInviteModal()" class="w-full bg-zinc-800 hover:bg-zinc-700 text-white py-2.5 rounded-xl font-bold text-[10px] uppercase tracking-widest transition flex items-center justify-center gap-2">
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
    <div id="inviteModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" onclick="toggleInviteModal()"></div>

        <div class="relative bg-[#0a0a0a] border border-zinc-800 w-full max-w-md rounded-[2rem] shadow-2xl overflow-hidden transform transition-all">
            <div class="p-8">
                <div class="mb-6">
                    <h2 class="text-xl font-black text-white uppercase italic tracking-tighter">
                        Inviter un <span class="text-[#059669]">membre</span>
                    </h2>
                    <p class="text-[9px] font-bold text-zinc-500 uppercase tracking-widest mt-1">Agrandissez votre colocation</p>
                </div>

                <form id="inviteForm-{{ $colocation->id }}" class="space-y-5" action="{{route('colocation.invite',$colocation)}}" method="post">
                    @csrf

                    <div>
                        <label class="block text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-2 px-1">
                            Email du membre
                        </label>

                        <input type="email"
                            name="email"
                            placeholder="exemple@email.com"
                            required
                            class="w-full bg-black border border-zinc-800 focus:border-[#059669] rounded-xl px-4 py-3 text-sm text-white outline-none">

                        <p class="mt-2 text-[9px] text-zinc-600 italic px-1">
                            Un email sera envoyé avec un lien d'invitation.
                        </p>
                    </div>

                    <div class="flex items-center gap-3 pt-2">
                        <button type="submit"
                            class="flex-1 bg-[#064e3b] hover:bg-[#059669] text-white py-3 rounded-xl font-bold text-xs uppercase tracking-widest transition-all">
                            Envoyer l'invitation
                        </button>

                        <button type="button"
                            onclick="toggleInviteModal()"
                            class="px-4 py-3 text-zinc-500 hover:text-white font-bold text-[10px] uppercase tracking-widest transition-all">
                            Annuler
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- formulaire pour ajouter un dépense  -->

    <div id="expenseModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/85 backdrop-blur-md" onclick="toggleExpenseModal()"></div>

        <div class="relative bg-[#0a0a0a] border border-zinc-800 w-full max-w-xl rounded-[2.5rem] shadow-2xl overflow-hidden">
            <div class="p-8 md:p-10">
                <div class="mb-8">
                    <h2 class="text-2xl font-black text-white uppercase italic tracking-tighter">
                        Nouvelle <span class="text-[#059669]">dépense</span>
                    </h2>
                    <p class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest mt-1">Enregistrez un nouvel achat commun</p>
                </div>

                <form action="{{ route('expenses.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="colocation_id" value="{{ $colocation->id }}">
                    <div>
                        <label class="block text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-2 px-1">Titre de la dépense</label>
                        <input type="text" name="title" placeholder="ex: Courses Intermarché" required
                            class="w-full bg-black border border-zinc-800 focus:border-[#059669] rounded-xl px-4 py-3 text-sm text-white outline-none transition-all placeholder:text-zinc-800">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-2 px-1">Montant (DH)</label>
                            <input type="number" step="0.01" name="montant" placeholder="0.00" required
                                class="w-full bg-black border border-zinc-800 focus:border-[#059669] rounded-xl px-4 py-3 text-sm text-white outline-none transition-all placeholder:text-zinc-800">
                        </div>
                        <div>
                            <label class="block text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-2 px-1">Date</label>
                            <input type="date" name="dateAchat" value="{{ date('Y-m-d') }}"
                                class="w-full bg-black border border-zinc-800 focus:border-[#059669] rounded-xl px-4 py-3 text-[12px] text-white outline-none transition-all [color-scheme:dark]">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-2 px-1">Payé par</label>
                            <select name="user_idPayer" class="w-full bg-black border border-zinc-800 focus:border-[#059669] rounded-xl px-4 py-3 text-sm text-white outline-none transition-all appearance-none cursor-pointer">
                                <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }} (Moi)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black text-zinc-500 uppercase tracking-widest mb-2 px-1">Catégorie</label>
                            <select name="category_id" class="w-full bg-black border border-zinc-800 focus:border-[#059669] rounded-xl px-4 py-3 text-sm text-white outline-none transition-all appearance-none cursor-pointer">
                                <option value="1">Général</option>
                                <option value="2">Loyer</option>
                                <option value="3">Courses</option>
                                <option value="4">Factures</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 pt-6">
                        <button type="submit" class="flex-1 bg-[#064e3b] hover:bg-[#059669] text-white py-4 rounded-2xl font-bold text-xs uppercase tracking-[0.2em] transition-all shadow-lg shadow-[#059669]/10">
                            Enregistrer la dépense
                        </button>
                        <button type="button" onclick="toggleExpenseModal()" class="px-6 py-4 text-zinc-500 hover:text-white font-bold text-[10px] uppercase tracking-widest transition-all">
                            Annuler
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleExpenseModal() {
            const modal = document.getElementById('expenseModal');
            modal.classList.toggle('hidden');
        }
    </script>

    <script>
        function toggleInviteModal() {
            document.getElementById('inviteModal').classList.toggle('hidden');
        }

        // function sendInvitation(colocationId) {
        //     const form = document.getElementById('inviteForm-' + colocationId);
        //     const email = form.email.value;

        //     if (!email) {
        //         alert('Veuillez entrer un email');
        //         return;
        //     }

        //     // Construire dynamiquement l'URL de l'invitation
        //     const url = `/colocations/${colocationId}/invite`;

        //     fetch(url, {
        //             method: 'POST',
        //             headers: {
        //                 'X-CSRF-TOKEN': '{{ csrf_token() }}',
        //                 'Content-Type': 'application/json',
        //                 'Accept': 'application/json'
        //             },
        //             body: JSON.stringify({
        //                 email: email
        //             })
        //         })
        //         .then(async res => {
        //             if (!res.ok) {
        //                 // Lire la réponse brute pour voir l'erreur complète
        //                 const text = await res.text();
        //                 throw new Error(text);
        //             }
        //             return res.json();
        //         })
        //         .then(data => {
        //             alert(data.message);
        //             form.reset();
        //             toggleInviteModal();
        //         })
        //         .catch(err => {
        //             console.error('Erreur invitation:', err);
        //             alert('Erreur : ' + err.message);
        //         });
        // }

        // function cancelColocation(colocationId) {
        //     if (!confirm("Voulez-vous vraiment annuler cette colocation ?")) return;

        //     fetch(`/colocations/${colocationId}/cancel`, {
        //             method: 'PATCH',
        //             headers: {
        //                 'X-CSRF-TOKEN': '{{ csrf_token() }}',
        //                 'Accept': 'application/json',
        //             },
        //         })
        //         .then(async res => {
        //             if (!res.ok) {
        //                 const text = await res.text();
        //                 throw new Error(text);
        //             }
        //             return res.json();
        //         })
        //         .then(data => {
        //             alert(data.message);
        //             window.location.reload();
        //         })
        //         .catch(err => {
        //             console.error('Erreur:', err);
        //             alert('Erreur lors de l\'annulation.');
        //         });
        // }
        // use in form of add déponse 
        function toggleExpenseModal() {
            const modal = document.getElementById('expenseModal');
            modal.classList.toggle('hidden');
        }
    </script>
</body>

</html>