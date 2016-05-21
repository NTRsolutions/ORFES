<?PHP

defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('text', 'url', 'form', 'security'));
        $this->load->model(array('hash_model', 'validation_model', 'category_model', 'information_model', 'upload_model', 'date_model', 'item_model'));
        $data = array();
        if ($this->session->userdata('isLogIn') == FALSE) {
            redirect(base_url() . 'index.php/pages/index', 'refresh');
        }
    }

    function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /*
     * @function name - add_item
     * @parameter - post data
     * @parameter contains add menu form data
     * @return - boolean data
     * @author - Md. Shohrab Hossain
     * @created on - 28/06/2015
     */

    public function add_item()
    {
        $data['title'] = "Add Item";
        $data['menu_settings'] = "sh_menu";
        #
        if ($this->validation_model->item() == TRUE) {
            #upload product photo
            $upload = $this->upload_model->do_upload(
                $upload_path = 'assets/images/items/' . $this->session->userdata('restaurant_id') . "/",
                $file_name = 'image', $image_size = '100', $this->generateRandomString(5));
            if ($upload) {
                $item = array(
                    'restaurant_id' => $this->session->userdata('restaurant_id'),
                    'category' => $this->security->xss_clean($this->input->post('category')),
                    'item_type' => $this->security->xss_clean($this->input->post('item_type')),
                    'item_name' => $this->security->xss_clean($this->input->post('item_name')),
                    'about' => $this->security->xss_clean($this->input->post('about')),
                    'regular_price' => $this->security->xss_clean($this->input->post('regular_currency') . ' ' . $this->input->post('regular_price')),
                    'special_price' => $this->security->xss_clean($this->input->post('special_currency') . ' ' . $this->input->post('special_price')),
                    'image' => $upload,
                    'status' => 1,
                    'date' => $this->date_model->gm_date()
                );
                #insert data into database
                $this->item_model->create($item);
                #ends of insert

                $this->load->model("simpleimage");
                $this->simpleimage->load($upload); //load(image_path)
                $this->simpleimage->resize(100, 100); //resize(width, height)
                $this->simpleimage->save($upload); //save(image_path)

                $this->session->set_userdata(array('message' => 'Item add successfully'));
            } else {
                $this->session->set_userdata(array('exception' => 'Invalid Photo'));
            }
            #ends of product photo
        }
        #start of category showing
        $data['category'] = $this->category_model->read($this->session->userdata('restaurant_id'));
        #ends of category showing
        $data['content'] = $this->load->view('frontend/pages/add_item', $data, TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }

    /*
     * @function name - menu_card
     * @parameter - no parameter 
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 29/06/2015
     */

    public function menu_card()
    {
        $data['title'] = "Menu Card";
        $data['menu_settings'] = "sh_menu";
        $data['category'] = $this->category_model->read($this->session->userdata('restaurant_id'));
        $data['content'] = $this->load->view('frontend/pages/menu_card', $data, TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }

    /*
     * @function name - update
     * @parameter - $restaurant_id 
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 29/06/2015
     */

    public function update($item_id)
    {
        $item_id = $this->hash_model->decode($item_id);
        $data['title'] = "Edit Menu Items";
        $data['menu_settings'] = "sh_menu";
        #
        if ($this->validation_model->item() == TRUE) {
            #upload product photo

            $item = array(
                'item_id' => $item_id,
                'category' => $this->security->xss_clean($this->input->post('category')),
                'item_type' => $this->security->xss_clean($this->input->post('item_type')),
                'item_name' => $this->security->xss_clean($this->input->post('item_name')),
                'about' => $this->security->xss_clean($this->input->post('about')),
                'regular_price' => $this->security->xss_clean($this->input->post('regular_currency') . ' ' . $this->input->post('regular_price')),
                'special_price' => $this->security->xss_clean($this->input->post('special_currency') . ' ' . $this->input->post('special_price')),
                'status' => 1,
                'date' => $this->date_model->gm_date()
            );
            #insert data into database
            $this->item_model->update($item);
            #ends of insert
            $this->session->set_userdata(array('message' => 'Update successfully'));
        }

        $data['category'] = $this->category_model->read($this->session->userdata('restaurant_id'));
        $data['item'] = $this->item_model->read_by_id($item_id);
        $data['content'] = $this->load->view('frontend/pages/update_item', $data, TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }

    /*
     * @function name - delete
     * @parameter - $item_id
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 29/06/2015
     */

    public function delete($item_id)
    {
        $item_id = $this->hash_model->decode($item_id);
        if ($this->item_model->delete($item_id)) {
            $this->session->set_userdata(array('exception' => 'Delete successfully'));
        }
        redirect(base_url() . 'index.php/pages/index', 'refresh');
    }

    /*
     * @function name - block
     * @parameter - $item_id
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 02/07/2015
     */

    public function block($item_id)
    {
        $item_id = $this->hash_model->decode($item_id);
        if ($this->item_model->block($item_id)) {
            $this->session->set_userdata(array('exception' => 'Block successfully'));
        }
        redirect(base_url() . 'index.php/pages/index', 'refresh');
    }

    /*
     * @function name - unblock
     * @parameter - $item_id
     * @return - array data
     * @author - Md. Shohrab Hossain
     * @created on - 02/07/2015
     */

    public
    function unblock($item_id)
    {
        $item_id = $this->hash_model->decode($item_id);
        if ($this->item_model->unblock($item_id)) {
            $this->session->set_userdata(array('message' => 'Unblock successfully'));
        }
        redirect(base_url() . 'index.php/pages/index', 'refresh');
    }

    public
    function change_item_image()
    {
        $data['title'] = "Menu Card Images";
        $data['menu_settings'] = "sh_menu";
        $data['category'] = $this->category_model->read($this->session->userdata('restaurant_id'));
        $data['content'] = $this->load->view('frontend/pages/change_item_image', $data, TRUE);
        $this->load->view('frontend/main_wrapper', $data);
    }

    public
    function update_item_image($item_id)
    {
        $data['title'] = "Menu Card Images";
        $data['menu_settings'] = "sh_menu";
        $upload = $this->upload_model->do_upload(
            $upload_path = 'assets/images/items/' . $this->session->userdata('restaurant_id') . "/",
            $file_name = 'image', $image_size = '100', $this->generateRandomString(5));
        if ($upload) {

            $item = array(
                'item_id' => $item_id,
                'image' => $upload
            );
            #insert data into database
            $this->item_model->update_image($item);
            #ends of insert
            $this->session->set_userdata(array('message' => 'Update successfully'));

            #unlink old photo
            @unlink($this->input->post('old_photo'));
            #ends of unlink

            $this->load->model("simpleimage");
            $this->simpleimage->load($upload); //load(image_path)
            $this->simpleimage->resize(100, 100); //resize(width, height)
            $this->simpleimage->save($upload); //save(image_path)

        } else {
            $this->session->set_userdata(array('exception' => 'Invalid Photo'));
        }
        #ends of Item Image

        redirect(base_url() . 'index.php/item/change_item_image', 'refresh');
    }

}

?>