<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\ArticleRequest;
use App\Repository\ArticleRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class ArticleController extends Controller
{
    private $articleRepository;
//    private $articleController;
    public function __construct(ArticleRepositoryInterface $articleRepository )
    {
        $this->middleware('auth');
        $this->articleRepository = $articleRepository;
//        $this->articleController =$articleController;
    }

    public function index(){
        $articlelist =$this->articleRepository->getArticle();

        return view('admin.list')->with('articlelists',$articlelist);
    }
    public function getall(){
        $allarticle =$this->articleRepository->getallArticle();
        return view('admin.list')->with('allarticle',$allarticle);
    }

    public function AddArticle(Request $request){


        $title = Input::get('title');
        $status = Input::get('status');
        $image = $request->file('image');


      if (!empty($image)) {
          $imageName = $image->getClientOriginalName();
          $destination = 'uploads';
          $image->move($destination, $imageName);
          $this->articleRepository->setallArticle($title, $status, $imageName);

      }else {
           $this->articleRepository->setArticle($title,$status);
      }
        return redirect()->action('Admin\ArticleController@index');
      }

    public function EditArticle($id){
        $editArticle = $this->articleRepository->editArticle($id);
        return view('admin.update')->with('article',$editArticle);

    }
    public function UpdateArticle(Request $request)
    {
        $id =Input::get('id');
        $title = Input::get('title');
        $status = Input::get('status');
        $image = $request->file('image');
        if (!empty($image)) {
            $imageName = $image->getClientOriginalName();
            $destination = 'uploads';
            $image->move($destination, $imageName);
            $this->articleRepository->updateallArticle($id,$title, $status, $imageName);
        }
        else {
            $this->articleRepository->updateArticle($id,$title,$status);
        }
        return redirect()->action('Admin\ArticleController@index');
    }

    public function DeleteArticle($id){

        $this->articleRepository->deleteArticle($id);
        return redirect()->action('Admin\ArticleController@index');


    }
}
