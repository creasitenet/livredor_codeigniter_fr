<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
			
	private $CI;
	private $template = 'layout';
	private $datas = array();
		
	/*
	* Constructeur
	*/
	public function __construct()
	{
		$this->CI =& get_instance();
			
		$this->datas['css'] = array();
	    $this->datas['js'] = array();
		
		$config_css = $this->CI->config->item('css');
        if ($config_css) $this->set_css($config_css);
				
		$config_js = $this->CI->config->item('js');
        if ($config_js) $this->set_js($config_js);
		
		//Le titre par défaut est composé du nom du contrôleur puis du nom de la méthode
		$this->set('title', ucfirst($this->CI->router->fetch_class()) . ' - ' . ucfirst($this->CI->router->fetch_method()));
		//Le titre de la page par défaut est composé du nom de la méthode et du nom du contrôleur.
		$this->set('pagetitle', '');
		//Initialise la variable $charset avec la clé de configuration initialisée dans le fichier config.php
		$this->set('charset', $this->CI->config->item('charset'));
	}
		
	/*
	|===============================================================================
	| Methodes pour charger les vues
	|	. view
	|	. views
	|===============================================================================
	*/

	function view($view = '' , $view_data = array(), $return = FALSE)
	{               
		$this->set('content', $this->CI->load->view($view, $view_data, TRUE));			
		return $this->CI->load->view($this->template, $this->datas, $return);
	}
	
	public function views($view = '' , $view_data = array(), $return = FALSE) 
	{
		$this->datas['content'] .= $this->CI->load->view($view, $view_data, TRUE);
		return $this;
	}
		
	/*
	|===============================================================================
	| Methodes pour modifier les variables envoyées au layout
	|	. set
	|	. set_template
	|===============================================================================
	*/
	// Ajouter une variable
	function set($name, $value)
	{
		if(is_string($value) AND !empty($value)) {
			$this->datas[$name] = $value;
			return true;
		}
		return false;
	}
	
	function set_template($value) 
	{
		if(is_string($value) AND !empty($value) AND file_exists('./application/views/' . $value . '.php'))	{
			$this->template = $value;
			return true;
		}
		return false;
	}
	
	/*
	|===============================================================================
	| Methodes pour ajouter des feuilles de CSS et de Javascript
	|	. set_css
	|	. set_js
	|===============================================================================
	*/
	    
	public function set_css($name) 
	{
		if (is_array($name)) {
	    	foreach ($name as $item) {
	        	if (!in_array($item, $this->datas['css'])) {
					if(is_string($item) AND !empty($item) AND file_exists('./assets/css/' . $item . '.css')) {
						$this->datas['css'][] .= css_url($item);
					}
	            }
	        }
	     } else {
	     	if (!in_array($name, $this->datas['css'])) {
				if(is_string($name) AND !empty($name) AND file_exists('./assets/css/' . $name . '.css')) {
					$this->datas['css'][] .= css_url($name);
				}
	        }
	     }
	}
	    
	public function set_js($name) 
	{
		if (is_array($name)) {
		    foreach ($name as $item) {
		    	if (!in_array($item, $this->datas['js'])) {
					if(is_string($item) AND !empty($item) AND file_exists('./assets/js/' . $item . '.js')) 	{
						$this->datas['js'][] .= js_url($item);
					}
	            }
	        }
	     } else {
	     	if (!in_array($name, $this->datas['js'])) {
				if(is_string($name) AND !empty($name) AND file_exists('./assets/js/' . $name . '.js')) 	{
					$this->datas['js'][] .= js_url($name);
				}
	        }
	     }
	}
	
}
/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */