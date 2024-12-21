<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::with('category')->latest()->get();
        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('recipes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        Recipe::create([
            'title' => $request->title,
            'text' => $request->text,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('recipes.index');
    }

    public function userRecipes()
    {
        $recipes = Auth::user()->recipes()->with('category')->get();
        return view('recipes.user', compact('recipes'));
    }
}
