<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Profiler extends CI_Profiler {
	
	function run()
	{
		$output = "<div id='codeigniter_profiler'>";

		$output .= '<div class="codeigniter_profiler_left">';
		$output .= $this->_compile_uri_string();
		$output .= $this->_compile_get();
		$output .= $this->_compile_memory_usage();
		$output .= '</div>';
		$output .= '<div  class="codeigniter_profiler_right">';
		$output .= $this->_compile_controller_info();
		$output .= $this->_compile_post();
		$output .= $this->_compile_benchmarks();
		$output .= '</div>';
		$output .= "<div class='spacer'></div>";
		$output .= '<div class="codeigniter_profiler_bas">';
		$output .= $this->_compile_queries();
		$output .= $this->_compile_session();
		$output .= '</div>';

		$output .= '</div>';

		return $output;
	}
	
	function _compile_session()
	{
		$output  = "\n\n";
		$output .= '<fieldset style="border:1px solid #5a0099;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee">';
		$output .= "\n";
		$output .= '<legend style="color:#5a0099;">&nbsp;&nbsp;SESSION DATA&nbsp;&nbsp;</legend>';
		$output .= "\n";
		
		if (is_object($this->CI->session))
		{
			// Le contenu de la session
			$output .= "\n\n<table cellpadding='4' cellspacing='1' border='0' width='100%'>\n";
			$sess=get_object_vars($this->CI->session);
			foreach ($sess['userdata'] as $key => $val)
			{
				// on échappe les clés
				if ( ! is_numeric($key))
				{
					$key = "'".$key."'";
				}
				
				$output .= "<tr><td width='50%' style='color:#000;background-color:#ddd;'>&#36;_SESSION[".$key."]&nbsp;&nbsp; </td><td width='50%' style='color:#009900;font-weight:normal;background-color:#ddd;'>";
				
				// on affiche la valeur de la variable
				if (is_array($val))
				{
					$output .= "<pre>" . htmlspecialchars(stripslashes(print_r($val, true))) . "</pre>";
				}
				else
				{
					$output .= htmlspecialchars(stripslashes($val));
				}
				$output .= "</td></tr>\n";
			}
			
			$output .= "</table>\n";
		}
		else
		{
			// La session est indéfinie
			$output .= "<div style='color:#5a0099;font-weight:normal;padding:4px 0 4px 0'>No SESSION data exists</div>";				
		}
		
		$output .= "</fieldset>";

		return $output;
	}
	
}

?>