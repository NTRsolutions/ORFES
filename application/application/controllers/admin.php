<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        ini_set('memory_limit', '200M');
        ini_set('upload_max_filesize', '128M');
        ini_set('post_max_size', '256M');
        ini_set('max_input_time', 3600);
        ini_set('max_execution_time', 3600);
    }

    public function index()
    {
        $this->login_form();
    }

    public function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /* Login View*/
    public function login_form()
    {
        $logged_in = $this->session->userdata('admin_logged_in');

        if ($logged_in == true) {
            $this->home();
        } else {
            $this->load->view("admin/admin_head");
            $this->load->view("admin/admin_login", array("title" => "Login with valid username and password"));
        }
    }

    /* Logging in */
    public function logging_in()
    {
        $this->load->model("admin/admin_login", "l");
        $this->load->library("form_validation");

        $this->form_validation->set_rules("username", "username", "required");
        $this->form_validation->set_rules("password", "password", "required");

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("admin/admin_head");
            $this->load->view("admin/admin_login", array("title" => "Fill up the form fields properly"));
        } else {
            $username = $this->input->post("username");
            $password = $this->input->post("password");

            if ($this->l->login_process($username, $password)) {
                $newdata = array(
                    'admin_username' => $username,
                    'admin_logged_in' => TRUE
                );

                $this->session->set_userdata($newdata);

                redirect(base_url() . "admin/home", "refresh");
            } else {
                $this->load->view("admin/admin_header");
                $this->load->view("admin/admin_login", array("title" => "Invalid Username or Password"));
            }
        }
    }

    public function logging_out()
    {
        $array_items = array('admin_username' => '', 'admin_logged_in' => '');
        $this->session->unset_userdata($array_items);

        $this->home();
    }

    /* Index page View*/
    public function home()
    {
        $logged_in = $this->session->userdata('admin_logged_in');

        if ($logged_in == true) {
            $this->load->view("admin/admin_head");
            $this->load->view("admin/admin_nav");
            $this->load->view("admin/admin_index");
            $this->load->view("admin/admin_script");
        } else {
            $this->login_form();
        }
    }

    public function degrees()
    {
        $logged_in = $this->session->userdata('admin_logged_in');

        if ($logged_in == true) {
            $this->load->model("admin/admin_degrees");

            $data["title"] = "degrees";
            $data["message"] = "Add degrees (Example: Engineering, BBA, MBA etc..)";

            $data["degrees"] = $this->admin_degrees->getAlldegrees();

            $this->load->view("admin/admin_head");
            $this->load->view("admin/admin_nav");
            $this->load->view("admin/admin_degrees", array("data" => $data));
            $this->load->view("admin/admin_script");
        } else {
            $this->login_form();
        }
    }

    public function add_degree()
    {
        $this->load->model("admin/admin_degrees");

        $name = $this->input->post("name");
        $info = $this->input->post("information");

        $flag = $this->admin_degrees->add($name, $info);

        if ($flag) {
            echo "Successfully Added " . $name;
        } else {
            echo "Unsuccessful";
        }
    }

    public function get_degree()
    {
        $this->load->model("admin/admin_degrees");

        $id = $this->input->post("id");

        $result = $this->admin_degrees->updateGetValue($id);

        echo json_encode($result);
    }

    public function update_degree()
    {
        $this->load->model("admin/admin_degrees");

        $id = $this->input->post("id");
        $name = $this->input->post("name");
        $info = $this->input->post("information");

        $flag = $this->admin_degrees->updateSetValue($id, $name, $info);

        if ($flag) {
            echo "Successfully Updated " . $name;
        } else {
            echo "Unsuccessful";
        }
    }

    public function delete_degree()
    {
        $this->load->model("admin/admin_degrees");

        $id = $this->input->post("id");

        $flag = $this->admin_degrees->delete($id);

        if ($flag) {
            echo "Successfully Deleted";
        } else {
            echo "Unsuccessful";
        }
    }

    public function departments()
    {
        $logged_in = $this->session->userdata('admin_logged_in');

        if ($logged_in == true) {
            $this->load->model("admin/admin_departments");
            $this->load->model("admin/admin_degrees");

            $data["title"] = "Departments";
            $data["message"] = "Add Departments";

            $data["departments"] = $this->admin_departments->getAllDepartments();
            $data["degrees"] = $this->admin_degrees->getAlldegrees();

            $this->load->view("admin/admin_head");
            $this->load->view("admin/admin_nav");
            $this->load->view("admin/admin_departments", array("data" => $data));
            $this->load->view("admin/admin_script");
        } else {
            $this->login_form();
        }
    }

    public function add_department()
    {
        $this->load->model("admin/admin_departments");

        $degree_id = $this->input->post("degree_id");
        $name = $this->input->post("name");
        $info = $this->input->post("information");

        $flag = $this->admin_departments->add($degree_id, $name, $info);

        if ($flag) {
            echo "Successfully Added " . $name;
        } else {
            echo "Unsuccessful";
        }
    }

    public function get_department()
    {
        $this->load->model("admin/admin_departments");

        $id = $this->input->post("id");

        $result = $this->admin_departments->updateGetValue($id);

        echo json_encode($result);
    }

    public function update_department()
    {
        $this->load->model("admin/admin_departments");

        $id = $this->input->post("id");
        $degree_id = $this->input->post("degree_id");
        $name = $this->input->post("name");
        $info = $this->input->post("information");

        $flag = $this->admin_departments->updateSetValue($id, $degree_id, $name, $info);

        if ($flag) {
            echo "Successfully Updated " . $name;
        } else {
            echo "Unsuccessful";
        }
    }

    public function delete_department()
    {
        $this->load->model("admin/admin_departments");

        $id = $this->input->post("id");

        $flag = $this->admin_departments->delete($id);

        if ($flag) {
            echo "Successfully Deleted";
        } else {
            echo "Unsuccessful";
        }
    }

    public function categories()
    {
        $logged_in = $this->session->userdata('admin_logged_in');

        if ($logged_in == true) {
            $this->load->model("admin/admin_categories");

            $data["title"] = "Categories";
            $data["message"] = "Add Categories";

            $data["categories"] = $this->admin_categories->getAllCategories();

            $this->load->view("admin/admin_head");
            $this->load->view("admin/admin_nav");
            $this->load->view("admin/admin_categories", array("data" => $data));
            $this->load->view("admin/admin_script");
        } else {
            $this->login_form();
        }
    }

    public function add_category()
    {
        $this->load->model("admin/admin_categories");

        $name = $this->input->post("name");

        $flag = $this->admin_categories->add($name);

        if ($flag) {
            echo "Successfully Added " . $name;
        } else {
            echo "Unsuccessful";
        }
    }

    public function get_category()
    {
        $this->load->model("admin/admin_categories");

        $id = $this->input->post("id");

        $result = $this->admin_categories->updateGetValue($id);

        echo json_encode($result);
    }

    public function update_category()
    {
        $this->load->model("admin/admin_categories");

        $id = $this->input->post("id");
        $name = $this->input->post("name");

        $flag = $this->admin_categories->updateSetValue($id, $name);

        if ($flag) {
            echo "Successfully Updated " . $name;
        } else {
            echo "Unsuccessful";
        }
    }

    public function delete_category()
    {
        $this->load->model("admin/admin_categories");

        $id = $this->input->post("id");

        $flag = $this->admin_categories->delete($id);

        if ($flag) {
            echo "Successfully Deleted";
        } else {
            echo "Unsuccessful";
        }
    }

    public function books()
    {
        $logged_in = $this->session->userdata('admin_logged_in');

        if ($logged_in == true) {

            $this->load->model("admin/admin_departments");
            $this->load->model("admin/admin_categories");
            $this->load->model("admin/admin_books");

            $data["title"] = "Books";
            $data["message"] = "Upload Books";

            $select["departments"] = $this->admin_departments->getAllDepartments();
            $select["categories"] = $this->admin_categories->getAllCategories();

            $data["books"] = $this->admin_books->getAllBooks();

            $this->load->view("admin/admin_head");
            $this->load->view("admin/admin_nav");
            $this->load->view("admin/admin_books", array("data" => $data, "select" => $select));
            $this->load->view("admin/admin_script");
        } else {
            $this->login_form();
        }
    }

    public function add_book()
    {
        $this->load->model("admin/admin_books");

        $flag = false;

        $name = $this->input->post("name");
        $author = $this->input->post("author");
        $edition = $this->input->post("edition");
        $department_id = $this->input->post("department_id");
        $category_id = $this->input->post("category_id");
        $topic = $this->input->post("topic");
        $serial = $this->input->post("stage");

        //$gatherAll = $name . "-" . $author . "-" . $edition . "-" . $department_id . "-" . $category_id . "-" . $topic . "-" . $serial;
        $file_name_book = preg_replace('/\s+/', '_', $_FILES["ebook"]['name']);

        $this->load->library('upload');

        /* this is for form field 1 which is an pdf....*/
        $config['file_name'] = $_FILES["ebook"]['name'];
        $config['upload_path'] = './books/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '2097152';


        $this->upload->initialize($config);
        if (!$this->upload->do_upload("ebook")) {

            $flag = true;

            $error = array('error' => $this->upload->display_errors());
        }

        if ($flag === false) {
            // this is for form field 2 which is an image (thumbnail)
            $new_name = $this->generateRandomString(5);
            $config['file_name'] = $new_name;
            $config['upload_path'] = './books/cover/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '1000';

            $this->upload->initialize($config);
            if (!$this->upload->do_upload("thumbnail")) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $file = $this->upload->data();
                echo $file_name_thumb = trim($file['file_name']);

                $this->admin_books->add($name, $author, $edition, $department_id, $category_id, $topic, $serial, $file_name_book, $file_name_thumb);

                $this->load->model("admin/simpleimage");
                $this->simpleimage->load("./books/cover/" . $new_name . $file['file_ext']);
                $this->simpleimage->resize(480, 640);
                $this->simpleimage->save("./books/cover/" . $new_name . $file['file_ext']);

            }
        }

    }

    public function delete_book()
    {
        $this->load->model("admin/admin_books");

        $id = $this->input->post("id");

        $flag = $this->admin_books->delete($id);

        if ($flag) {
            echo "Successfully Deleted";
        } else {
            echo "Unsuccessful";
        }
    }

    public function slides()
    {
        $logged_in = $this->session->userdata('admin_logged_in');

        if ($logged_in == true) {

            $this->load->model("admin/admin_departments");
            $this->load->model("admin/admin_categories");
            $this->load->model("admin/admin_slides");

            $data["title"] = "Slides";
            $data["message"] = "Upload Slides";

            $select["departments"] = $this->admin_departments->getAllDepartments();
            $select["categories"] = $this->admin_categories->getAllCategories();

            $data["slides"] = $this->admin_slides->getAllslides();

            $this->load->view("admin/admin_head");
            $this->load->view("admin/admin_nav");
            $this->load->view("admin/admin_slides", array("data" => $data, "select" => $select));
            $this->load->view("admin/admin_script");
        } else {
            $this->login_form();
        }
    }

    public function add_slide()
    {
        $this->load->model("admin/admin_slides");

        $flag = false;
        $error = "";

        $name = $this->input->post("name");
        $department_id = $this->input->post("department_id");
        $category_id = $this->input->post("category_id");
        $topic = $this->input->post("topic");
        $serial = $this->input->post("stage");

        $gatherAll = $name . "-" . $department_id . "-" . $category_id . "-" . $topic . "-" . $serial;

        $file_name = preg_replace('/\s+/', '_', $_FILES["slide"]['name']);

        $new_slide_id = $this->admin_slides->add($name, $department_id, $category_id, $topic, $serial, $file_name);

        if (sizeof($new_slide_id) > 0) {
            $new_slide_id['id'];
        } else {
            $flag = true;
        }

        $this->load->library('upload');
        if ($flag === false) {
            $new_name = $_FILES["slide"]['name'];
            $config['file_name'] = $new_name;
            $config['upload_path'] = './slides/';
            $config['allowed_types'] = '*';
            $config['max_size'] = '2097152';

            $this->upload->initialize($config);
            if (!$this->upload->do_upload("slide")) {

                $flag = true;

                $error = array('error' => $this->upload->display_errors());
            }
        }
    }

    public function delete_slide()
    {
        $this->load->model("admin/admin_slides");

        $id = $this->input->post("id");

        $flag = $this->admin_slides->delete($id);

        if ($flag) {
            echo "Successfully Deleted";
        } else {
            echo "Unsuccessful";
        }
    }


}