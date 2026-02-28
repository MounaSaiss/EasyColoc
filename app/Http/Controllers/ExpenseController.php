<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Payment;

class ExpenseController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'montant' => 'required|numeric',
            'dateAchat' => 'required|date',
            'user_idPayer' => 'required|integer|exists:users,id',
            'colocation_id' => 'required|integer|exists:colocations,id',
            'category_id' => 'required|integer',
        ]);
        $expense = Expense::create($validatedData);
        $montant = $expense->montant / $expense->colocation->users()->wherePivot('leftAt', null)->count();
        foreach($expense->colocation->users()->wherePivot('leftAt', null)->get() as $user){
            $expense->payments()->create([
                'user_id' => $user->id,
                'montant' => $montant,
                'payed_at' => $user->id == $expense->payer->id ? now() : null,
            ]);
        }

        return redirect()->back()->with('success', 'Dépense ajoutée avec succès');
    }
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->back()->with('success', 'Dépense supprimée avec succès');
    }

    public function payment(Payment $payment)
    {
        $payment->update([
            'payed_at' => now(),
        ]);
        return redirect()->back()->with('success', 'Paiement marqué comme effectué avec succès');
    }
}
