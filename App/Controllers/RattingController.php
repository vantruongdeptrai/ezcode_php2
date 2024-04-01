<?php
namespace App\Controllers;
use App\Models\Categories;
use App\Models\Ratting;
class RattingController extends BaseController
{
    protected $ratingModel ;
    public function __construct(){
        $this->ratingModel = new Ratting();
    }
    public function ratting($id){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['id'];
            $course_id = $id;
            $rating = $_POST['rating'];
            echo $this->ratingModel->insertRatting(null,$rating,$user_id,$course_id);
        }
    }
    
}
