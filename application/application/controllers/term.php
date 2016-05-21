<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Term extends CI_Controller
{

    public function index()
    {
        $this->load->model("public/public_contents");

        //Site Head Data
        $data["page_title"] = "Terms and Conditions";
        $data["meta_description"] = "edukeeping.com profoundly gives you a strong hand in finding the precise help you need for education.
                    Here you can find e-books, articles, slides, projects, ideas, and essential elements on particular
                    subjects.
                    We immensely try to facilitate your journey on education landscape.";
        $data["meta_keys"] = "edukeeping, education keeping, e-book, ebook, e-books, ebooks, book, books, education materials, keeping education";

        //Site Header data
        $headerinfo["degrees"] = $this->public_contents->getDegrees();
        $headerinfo["departments"] = $this->public_contents->getDepartments();



        $this->load->view('public/site_head', $data);
        $this->load->view('public/site_header', array("headerinfo" => $headerinfo));
        $this->load->view('public/view_terms');
        $this->load->view('public/site_footer');
        $this->load->view('public/site_script');
    }

}