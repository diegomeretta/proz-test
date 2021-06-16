<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Glossary;
use App\Models\Language;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProzController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function language()
    {
        return view('admin.proz.language',)->with('languages', Language::all());
    }

    public function languageCreate()
    {
        return view('admin.proz.language_create',)->with('languages', Language::all());
    }

    public function languageStore(Request $request)
    {
            $language = new Language();
            $language->name = $request->input('name');
            $language->save();

        return view('admin.proz.language',)->with('languages', Language::all());
    }

    public function glossary()
    {
        return view('admin.proz.glossary',)->with('glossary', Glossary::all());
    }

    public function glossaryCreate()
    {
        return view('admin.proz.glossary_create',)->with('glossary', Glossary::all());
    }

    public function glossaryStore(Request $request)
    {
            $glossary = new Glossary();
            $glossary->text = $request->input('text');
            $glossary->save();

        return view('admin.proz.glossary',)->with('glossary', Glossary::all());
    }

    public function glossaryTranslations($id)
    {
        $languagesTerm = Term::select('language_id')->where('glossary_id', $id)->groupBy('language_id')->get();
        $languages = Language::whereIn('id', $languagesTerm)->get();
        return view('admin.proz.translations',)->with('glossary', Glossary::find($id))->with('languages', $languages);
    }

    public function translationCreate($id)
    {
        return view('admin.proz.translation_create',)->with('glossary', Glossary::find($id))->with('languages', Language::all()->pluck('name', 'id'));
    }

    public function translationStore($id, Request $request)
    {
            $term1 = new Term();
            $term1->glossary_id = $id;
            $term1->language_id = $request->language_id;
            $term1->text = $request->text1;
            $term1->save();

            $term2 = new Term();
            $term2->glossary_id = $id;
            $term2->language_id = $request->language_id;
            $term2->text = $request->text2;
            $term2->save();

            $term3 = new Term();
            $term3->glossary_id = $id;
            $term3->language_id = $request->language_id;
            $term3->text = $request->text3;
            $term3->save();

            if ($request->text4 != null){
                $term4 = new Term();
                $term4->glossary_id = $id;
                $term4->language_id = $request->language_id;
                $term4->text = $request->text4;
                $term4->save();
            }

            if ($request->text5 != null){
                $term5 = new Term();
                $term5->glossary_id = $id;
                $term5->language_id = $request->language_id;
                $term5->text = $request->text5;
                $term5->save();
            }

        return view('admin.proz.glossary',)->with('glossary', Glossary::all());
    }

    public function translationEdit($glossary_id, $language_id)
    {
        $terms = Term::where('glossary_id', $glossary_id)->where('language_id', $language_id)->get();
        Log::info($terms->count());
        return view('admin.proz.translation_edit',)
            ->with('terms', $terms)
            ->with('glossary', Glossary::find($glossary_id))
            ->with('language', Language::find($language_id));
    }

    public function translationUpdate($glossary_id, $language_id, Request $request)
    {
            $terms = Term::where('glossary_id', $glossary_id)->where('language_id', $language_id)->get();
            foreach ($terms as $term){
                $term->delete();
            }

            $term1 = new Term();
            $term1->glossary_id = $glossary_id;
            $term1->language_id = $language_id;
            $term1->text = $request->text1;
            $term1->save();

            $term2 = new Term();
            $term2->glossary_id = $glossary_id;
            $term2->language_id = $language_id;
            $term2->text = $request->text2;
            $term2->save();

            $term3 = new Term();
            $term3->glossary_id = $glossary_id;
            $term3->language_id = $language_id;
            $term3->text = $request->text3;
            $term3->save();

            if ($request->text4 != null){
                $term4 = new Term();
                $term4->glossary_id = $glossary_id;
                $term4->language_id = $language_id;
                $term4->text = $request->text4;
                $term4->save();
            }

            if ($request->text5 != null){
                $term5 = new Term();
                $term5->glossary_id = $glossary_id;
                $term5->language_id = $language_id;
                $term5->text = $request->text5;
                $term5->save();
            }

        return view('admin.proz.glossary',)->with('glossary', Glossary::all());
    }
}
