<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller
{

    public function index()
    {
        $this->load->model("public/public_contents");

        //Site Head Data
        $data["page_title"] = "Search";
        $data["meta_description"] = "edukeeping.com profoundly gives you a strong hand in finding the precise help you need for education.
                    Here you can find e-books, articles, slides, projects, ideas, and essential elements on particular
                    subjects.
                    We immensely try to facilitate your journey on education landscape.";
        $data["meta_keys"] = "edukeeping, education keeping, e-book, ebook, e-books, ebooks, book, books, education materials, keeping education";

        //Site Header data
        $headerinfo["degrees"] = $this->public_contents->getDegrees();
        $headerinfo["departments"] = $this->public_contents->getDepartments();

        //Site Contents Data
        $contents["header"] = "Search";

        $department_id = $this->security->xss_clean($this->input->post('department_id'));
        $keyword = $this->security->xss_clean($this->input->post('keyword'));

        $search_exploded = explode(" ", preg_replace('/[0-9]+/', '', $keyword));

        $x = 0;
        $construct = "";

        foreach($search_exploded as $search_each) {
            $x++;
            if( $x == 1 ) {
                $construct .="name LIKE '%$search_each%'";
            }
            else {
                $construct .="AND file_name LIKE '%$search_each%'";
            }
        }

        $construct = "SELECT * FROM books WHERE $construct";

        $contents["books"] = $this->public_contents->getBooksByKeywords($construct);

        $this->load->view('public/site_head', $data);
        $this->load->view('public/site_header', array("headerinfo" => $headerinfo));
        $this->load->view('public/view_search', array("contents" => $contents));
        $this->load->view('public/site_footer');
        $this->load->view('public/site_script');
    }

}