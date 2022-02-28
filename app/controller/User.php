<?php
/**
 * This controller handel user login and registere
 * 
 */
use App\core\BaseController;

class User extends BaseController{

    public $model = NULL;

    public function __construct(){

        $this->model = $this->model("UserModel");

    }

    public function index(){

        $this->view("/user/userlogin.view",["title"=>"User Login"]);

    }
    public function login(){

        if (isset($_POST['username']) && isset($_POST['password'])) {

            $username = $_POST['username'];
            $password = sha1($_POST['password']);
            /** check the user on the database*/
            $return = $this->model->login($username,$password);
            if ($return) {
                redirect("home");
            }
            else{
                flash("loginError","Incorrect username or password,please try again!");
                flash("errorclass","is-invalid");
                redirect("user/index");
            }
            
        }
    }
    /**
     * Method for registration
     */
    public function register(){

        $this->view("user/register.view",["title"=>"User Register"]);

    }
    public function registerProcess(){

        if (isset($_POST['signup'])) {
            
            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];
            $userName = $_POST['username'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $password1 = sha1($_POST['password1']);
            $password2 = $_POST['password2'];

            //check the user data
            if (!empty($firstName) || !empty($lastName)) {
                # pass the data to user register model
                $data = ["username"=>$userName,"firstname"=>$firstName,"lastname"=>$lastName,
                "gender"=>$gender, "email"=>$email,"password"=>$password1];
                $return = $this->model->userRegister($data);
                if ($return) {
                    flash("success","Congra! you have been successfully registered");
                    redirect("user/index");
                }
            }
            else{
                flash("registrtionError","Please fill all required filed correctly");
                redirect("user/register");
            }

        }
    }
}
