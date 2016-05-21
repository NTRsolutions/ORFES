<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Degree extends CI_Controller
{
    public function index()
    {
        $degree = $this->uri->segment(2);
        $department = $this->uri->segment(3);

        $degree = str_replace("-", " ", trim($degree));
        $department = str_replace("-", " ", trim($department));

        $this->load->model("public/public_contents");

        if (!$this->public_contents->isDepartmentAvailable($department)) {
            show_404();
        } else {

            //Site Head Data
            $data["page_title"] = $department;
            $data["meta_description"] = "edukeeping.com profoundly gives you a strong hand in finding the precise help you need for education.
                    Here you can find e-books, articles, slides, projects, ideas, and essential elements on particular
                    subjects.
                    We immensely try to facilitate your journey on education landscape.";
            $data["meta_keys"] = "edukeeping, education keeping, e-book, ebook, e-books, ebooks, book, books, education materials, keeping education";

            //Site Header data
            $headerinfo["degrees"] = $this->public_contents->getDegrees();
            $headerinfo["departments"] = $this->public_contents->getDepartments();

            //Site Contents Data
            $contents["degree_name"] = $degree;
            $contents["department_name"] = $department;

            $contents["department_faqs"] = $this->public_contents->getDepartmentFAQs(
                $this->public_contents->getDepartmentIdByName($department));

            $contents["serial_list_of_books"] = $this->public_contents->getSerialListOfBooks(
                $this->public_contents->getDepartmentIdByName($department));

            $contents["books"] = $this->public_contents->getBooksByDepartmentId(
                $this->public_contents->getDepartmentIdByName($department));

            $contents["serial_list_of_slides"] = $this->public_contents->getSerialListOfSlides(
                $this->public_contents->getDepartmentIdByName($department));

            $contents["slides"] = $this->public_contents->getSlidesByDepartmentId(
                $this->public_contents->getDepartmentIdByName($department));

            $contents["degree_departments"] = $this->public_contents->getDepartmentsByDegreeId(
                $this->public_contents->getDegreeIdByName($degree),
                $this->public_contents->getDepartmentIdByName($department)
            );

            $contents["degrees"] = $this->public_contents->getDegreesExceptThis(
                $this->public_contents->getDegreeIdByName($degree));

            $this->load->view('public/site_head', $data);
            $this->load->view('public/site_header', array("headerinfo" => $headerinfo));
            $this->load->view('public/view_degree', array("contents" => $contents));
            $this->load->view('public/site_footer');
            $this->load->view('public/site_script');
        }

    }
}