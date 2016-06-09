<?php
namespace App\Repository;



/**
 * Created by PhpStorm.
 * User: thirisandaroo
 * Date: 5/24/16
 * Time: 2:07 PM
 */

interface ArticleRepositoryInterface {



    public function getArticle();
    public function getallArticle();
    public function setallArticle($title,$status,$imageName);
    public function setArticle($title,$status);
    public function editArticle($id);
    public function updateallArticle($id,$title,$status,$imageName);
    public function updateArticle($id,$title,$status);
    public function deleteArticle($id);


}