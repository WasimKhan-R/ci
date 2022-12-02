<?php
    namespace App\Controllers;
    use App\Models\UserModel;
    class index extends BaseController
    {
        // images moves to folder 
        public function myFile(){
            if ($this->request->getMethod() == "post" ) {
                $file = $this->request->getFile("file");

                // echo "<pre>";
                // print_r($file);
                $name = $file->getName();
                // echo $name;
                if($file->move("images",$name)){
                    echo "<h1>image has move</h1>";
                }else {
                    echo "<h1>failed to moved</h1>";
                }
            }
            return view("site/moveimg");
        }

        // pagination 
        public function pagisave(){
            $userModel = new UserModel();
            //$data = $userModel->findAll();

            return view("site/my-pagi", [
                "users" =>$userModel->paginate(3),
                "pager" =>$userModel->pager

            ]);

        }


        // save detail on database
        public function dbsave(){
            if ($this->request->getMethod() == "post") {
                $data = $this->request->getVar();
                // print_r($data);
                $userModel = new userModel();

                $form_data = [
                    "name" => $data['text_name'],
                    "age" => $data['text_age'],
                    "phone" => $data['text_number']
                ];

                $session = session();

                if($userModel->insert($form_data)){
                    $session->setFlashdata("success","your detail was insertedd");
                }
                else {
                    $session->setFlashdata("error","failed to insert");
                }
                return redirect()->to(site_url('form-save'));
            }

            return view("site/myform");
        }

        // DATABASE DETAIL SHOW USING MODEL
        public function viewMobel(){
            $userModel = new UserModel();

            $data = $userModel->findAll();
            echo "<pre>";
            print_r($data);
        }


        // insert detail in database
        public function insertquery(){
        $query= "Insert into ci_detail (name , age , phone) values('mehrab khan', 20 , 9833447842)";
        if ($this->db->query($query)) {
            echo "your data was insert";
        }else{
            echo "failed to insert off";
        }

    }

    // udpation
    public function updataraw(){
        $query = "UPDATE `ci_detail` SET  age = 27, phone = 8286911008 WHERE id = 2";
        if($this->db->query($query)){
            echo "your updation is done";
        }
        else {
            echo "failed to updated";
        }
    }


        public function __construct()
        {
            $this->db = \Config\Database::connect();
        }
        public function view()
        {
            $detail = array(
                "name" => "wasim khan ",
                "age" => "20",
                "email" => "wasimkhan77383@gmail.com"
            );
            // echo view("site/header.php");
            return view("site/view.php" , $detail);
        }
    }