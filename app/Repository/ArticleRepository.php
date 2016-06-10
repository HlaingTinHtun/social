<?php
namespace App\Repository;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: thirisandaroo
 * Date: 5/24/16
 * Time: 1:22 PM
 */

class ArticleRepository implements ArticleRepositoryInterface{

    public function getArticle(){
          $articles =DB::table('articles')->orderBy('id','DESC')->paginate(10);
            return $articles;
    }
    public function getallArticle(){
         $allarticle = DB::table('articles')->orderBy('id','DESC')->get();
        return $allarticle;
    }
    public function setallArticle($title,$status,$imageName){
         DB::table('articles')
             ->insert(['title' =>$title ,'status' => $status, 'image'=>$imageName]);
    }
    public function setArticle($title,$status){
        DB::table('articles')
            ->insert(['title' =>$title ,'status' => $status]);
    }

    public function editArticle($id){
        $editArticle =DB::table('articles')->find($id);
        return $editArticle;

    }
    public function updateallArticle($id,$title,$status,$imageName){
        DB::table('articles')
            ->where('id',$id)
            ->update(['title' => $title, 'status' => $status,'image' => $imageName]);

    }
    public function updateArticle($id,$title,$status){
        DB::table('articles')
            ->where('id',$id)
            ->update(['title' => $title, 'status' => $status]);

    }


    public function deleteArticle($id){
        DB::table('articles')->where('id', '=', $id)->delete();

}


}