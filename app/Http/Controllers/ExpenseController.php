<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

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
        return redirect()->back()->with('success', 'Dépense ajoutée avec succès');
    }
}
