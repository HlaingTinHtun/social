<?php

namespace App\Http\Controllers;

use App\Repository\ArticleRepositoryInterface;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;





class UserController extends Controller
{
    private $articleRepository;
    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
//        $this->middleware('auth');
        $this->articleRepository = $articleRepository;
    }

    public function index(){
        $articlelist =$this->articleRepository->getallArticle();
        //dd($articlelist);
        //return view('home', compact('articlelist'));
        return view('home')->with('articlelist',$articlelist);
    }




}
