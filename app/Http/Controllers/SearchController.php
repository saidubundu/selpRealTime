<?php

namespace App\Http\Controllers;


use App\Models\Question;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Searchable\Search;


class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $searchTerm = $request->input('query');

        $searchResults = (new Search())
            ->registerModel(Question::class, 'title')
            ->perform($searchTerm);
        return response()->json($searchResults);

    }

}


