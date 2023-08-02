<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index() {

        $articles = Article::orderBY('id','desc')->get();
        

        //return response()->json($articles);
        return view('articles', ['articles'=>$articles]);
    }

    public function show($id) {
        $article = Article::find($id);
        //return response()->json($articles);
        return view('single', compact('article'));
        
    }
    public function create(){
        return view('create');
    }
    public function store(Request $request){
        
       /* $article = new Article();
        $article->title = $request->title; // title,slug,content siués a coté de $request sont des names du formulaire
        $article->slug = $request->slug;
        $article->content = $request->content;

        $article->save();
        return redirect()->route('articles');
        */
        // deuxième mmethode
        $valide = $request->validate([
            'title'=>'required|max:200|unique:articles',
            'slug'=>'required',
            'content'=>'required'
        ]);
        if($request->hasFile('pic')){
            $nameFile = date('Ymdhis').'.'.$request->pic->extension();
            $pic = $request->pic->storeAS('articles',$nameFile, 'public');
        }
        else{
            $pic=null;
        }
        $article =Article::create([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'content'=>$request->content,
            'pic'=>$pic
        ]);

        return redirect()->route('articles');
    }

    public function edit($id){
        $article = Article::find($id);
        //return response()->json($articles);
        return view('edit', compact('article'));
    }
    public function update(Request $request,$id){
$article = Article::find($id);
$article->title = $request->title;
$article->slug = $request->slug;
$article->content = $request->content;
$article->save();
return redirect()->route('single',['id'=>$id]);
    }
public function destroy($id){
    $article = Article::find($id);
    $article->delete();
    return redirect()->route('articles');
}

}
