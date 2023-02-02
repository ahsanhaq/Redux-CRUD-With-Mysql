<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('EchoResponse')) :
		
		function EchoResponse($status_code, $response)
			{
				
				$ci =& get_instance();
				$ci->output->set_status_header($status_code);
				$ci->output->set_content_type('application/json')
							 ->set_output(json_encode($response));  
			} // EchoResponse
endif;

		function rip_tags($string){ 
			
			// ----- remove HTML TAGs ----- 
			$string = preg_replace ('/<[^>]*>/', ' ', $string); 
			
			// ----- remove control characters ----- 
			$string = str_replace("\r", '', $string);    // --- replace with empty space
			$string = str_replace("\n", ' ', $string);   // --- replace with space
			$string = str_replace("\t", ' ', $string);   // --- replace with space
			
			// ----- remove multiple spaces ----- 
			$string = trim(preg_replace('/ {2,}/', ' ', $string));
			return $string; 
		}
?>