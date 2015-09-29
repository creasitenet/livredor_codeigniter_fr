<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livredor extends CI_Controller {

	const NB_PAR_PAGE = 5;
	
	public function __construct() {
		parent::__construct();
		$this->load->model('livredor_model', 'livredors');
		
		//$this->output->enable_profiler(TRUE);
	}
	
	// Index // page d'accueil
	public function index($get_nb = 1)	{
		$this->get_list($get_nb);
	}
	
	// Get liste
	public function get_list($get_nb = 1)	{		
		$data = array();
		$nb_total = $this->livredors->count();
		if($get_nb > 1) {
			if($get_nb <= $nb_total) {
				$nb = intval($get_nb);
			} else {
				$nb = 1;
			}
		} else {
			$nb = 1;
		}
		$this->pagination->initialize(array('base_url' => base_url() . 'livredor/get_list/',
						    				'total_rows' => $nb_total,
						    				'per_page' => self::NB_PAR_PAGE)); 
		$data['pagination'] = $this->pagination->create_links();
		$data['nb'] = $nb_total;
		// via Active Record
		//$data['comments'] = $this->db->get('livredors', self::NB_PAR_PAGE, $nb-1)->result();
		// via MY_Model
		$data['comments'] = $this->livredors->get('',self::NB_PAR_PAGE, $nb-1);
		$this->template->view('livredor/index',$data);
	}
			
	// Commenter 
	public function comment() {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		$this->form_validation->set_rules('pseudo',  '"Pseudo"',  'trim|required|min_length[3]|max_length[25]|alpha_dash');
		$this->form_validation->set_rules('text', '"Commentaire"', 'trim|required|min_length[3]|max_length[3000]');
		if($this->form_validation->run()) {
			$echappe = array(
				'pseudo' => $this->input->post('pseudo'),
				'text' => $this->input->post('text'),
            );
            $noechappe=array('created'=>'NOW()');
			$this->livredors->insert($echappe,$noechappe);
			$this->session->set_flashdata('success_growl', 'Votre commentaire a été publié');
     		redirect('/', 'refresh');
		} else {
			$this->session->set_flashdata('error_growl', 'Erreur, veuillez corriger');
			$this->get_list(1);
		}
	}
	
}
