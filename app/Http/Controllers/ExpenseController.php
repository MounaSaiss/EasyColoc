<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Payment;
use App\Http\Requests\ExpenxeRequest;
class ExpenseController extends Controller
{
    public function store(ExpenxeRequest $request)
    {
        $validatedData = $request->validated();
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
