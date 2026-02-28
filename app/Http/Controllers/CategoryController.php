<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class categoryController extends Controller
{
    public function store(CategoryRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Category::create([
            'name' => $data['name'],
            'colocation_id' => $data['colocation_id'],
        ]);
        return redirect()->back();
    }  
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back();
    }
}