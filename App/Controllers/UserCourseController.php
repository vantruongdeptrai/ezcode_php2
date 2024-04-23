<?php
namespace App\Controllers;
use App\Models\UserCourse;
class UserCourseController extends BaseController
{
    protected $userCourseModel;
    
    public function __construct(){
        $this->userCourseModel = new UserCourse();
    }
    public function joinCourse(){
        if(isset($_POST['join']) && isset($_SESSION['user'])){
            $course_id = $_POST['id_course'];
            $user_id = $_SESSION['user']['id'];
            $status = 'Active';
            $result = $this->userCourseModel->insertUserCourse(null,$user_id,$course_id,$status);
            if($result){
                $my_account_url = route('user/my-account');
                echo "
                <script>
                    window.alert('Join success !')
                    window.location.href='$my_account_url';
                </script>
                ";
            }
        }
    }
    public function myAccount(){
        if(isset($_SESSION['user'])){
            $id = $_SESSION['user']['id'];
            $dir = "my-account";
            $myCourse = $this->userCourseModel->myCourse($id);
            return $this->renderView($dir, compact('myCourse'));
        }
    }
}
