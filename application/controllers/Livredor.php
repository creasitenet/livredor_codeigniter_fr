<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livredor extends CI_Controller {

	const NB_PAR_PAGE = 10;
	
	public function __construct() {
		//	Obligatoire
		parent::__construct();
		//$this->template->set('title', "Livre d'or");
		$this->load->model('livredor_model', 'livredors');
		
		// Debug
		if($this->config->item('debug') === TRUE) {
			$this->output->enable_profiler(TRUE);
			error_reporting('E_ALL');
		} else {
			$this->output->enable_profiler(FALSE);
			error_reporting(E_ERROR);
		}
		
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
		$data['comments'] = $this->livredors->get('status=1',self::NB_PAR_PAGE, $nb-1);
		$this->template->view('livredor/index',$data);
	}
			
	// Commenter 
	public function comment() {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		$this->form_validation->set_rules('pseudo',  '"Pseudo"',  'trim|required|min_length[3]|max_length[25]|alpha_dash');
		$this->form_validation->set_rules('text', '"Commentaire"', 'trim|required|min_length[3]|max_length[3000]');
		if($this->form_validation->run()) {
			//	Sauvegarde du commentaire dans la base de données
			$echappe = array(
				'pseudo' => $this->input->post('pseudo'),
				'text' => $this->input->post('text'),
            );
            $noechappe=array('user_id'=>1,'status'=>1,'created'=>'NOW()');
			$this->livredors->insert($echappe,$noechappe);
			//	Affichage de la confirmation
			$this->session->set_flashdata('success_growl', 'Votre commentaire a été publié');
			$this->get_list(1);
		} else {
			$this->session->set_flashdata('error_growl', 'Erreur, veuillez corriger');
			$this->get_list(1);
		}
	}
	
}
