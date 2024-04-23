<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Comments;


class CommentsController extends BaseController
{
    protected $commentModel ;
    public function __construct(){
        $this->commentModel = new Comments();
    }
    public function comment($id){
        if(isset($_SESSION['user'])){
            if(isset($_POST['send'])){
                $errors = [];
                $user_id = $_SESSION['user']['id'];
                $course_id = $id;
                $content = $_POST['content'];
                if(empty($content)){
                    $errors[]="Content is not blank !";
                }
                if(count($errors)>0){
                    redirect('errors', $errors,'user/course-detail/'.$id);
                }
                $result = $this->commentModel->insertComment(null,$content,$user_id,$course_id);
                if ($result) {
                    redirect('success', 'Send successfully !', 'user/course-detail/'.$id);
                }
            }
        }
    }
    public function listComment(){
        $comment = $this->commentModel->getComment();
        $dir = "Comments.list";
        return $this->render($dir,compact('comment')); 
    }

}

