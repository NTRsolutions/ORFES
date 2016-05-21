<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Controller
{

    public function index()
    {
        $check_uri = $this->uri->segment(3);
        if ($check_uri != "all") {
            $this->all();
        }
    }

    public function all()
    {
        $this->load->model("public/public_contents");

        //Site Head Data
        $data["page_title"] = "Books";
        $data["meta_description"] = "edukeeping.com profoundly gives you a strong hand in finding the precise help you need for education.
                    Here you can find e-books, articles, slides, projects, ideas, and essential elements on particular
                    subjects.
                    We immensely try to facilitate your journey on education landscape.";
        $data["meta_keys"] = "edukeeping, education keeping, e-book, ebook, e-books, ebooks, book, books, education materials, keeping education";

        //Site Header data
        $headerinfo["degrees"] = $this->public_contents->getDegrees();
        $headerinfo["departments"] = $this->public_contents->getDepartments();

        //Site Contents Data
        $contents["degrees"] = $this->public_contents->getDegrees();
        $contents["departments"] = $this->public_contents->getDepartments();
        $contents["header"] = "Books";
        $contents["books"] = $this->public_contents->getAllBooks();

        $this->load->view('public/site_head', $data);
        $this->load->view('public/site_header', array("headerinfo" => $headerinfo));
        $this->load->view('public/view_books', array("contents" => $contents));
        $this->load->view('public/site_footer');
        $this->load->view('public/site_script');
    }

    public function search()
    {
        $this->all();
    }
}