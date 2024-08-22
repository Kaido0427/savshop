<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\categorie;
use App\Models\transaction;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function transactionAll()
    {
        $transactions = transaction::all();
        return view('Admin.transaction', compact('transactions'));
    }


    public function editArticle()
    { 
        $articles = article::all();
        $categories = categorie::all();

        return view('Admin.edit_article', compact('articles', 'categories'));
    }



    public function updateArticle(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $article->update([
            'nom_article' => $request->input('nom_article'),
            'prix' => $request->input('prix'),
            'categorie_id' => $request->input('categorie_id'),
        ]);

        // Retourner les données mises à jour en réponse JSON
        return response()->json(['success' => true, 'message' => 'Article mis à jour avec succès']);
    }
}
