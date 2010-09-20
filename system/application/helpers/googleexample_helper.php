<?php

	//gets the data from a URL
	function get_datax($url)
	{
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
                
	}

	//gets the match content
	function get_matchx($regex,$content)
	{
		$result = preg_match($regex,$content,$matches);
	     // print_r($matches);
               if ($result ==1)
		return $matches[1];
               else return "<i>examples not found<i>";
	    
	}


function check_database($word){
        $this->db->select('ge.lemma'); 
        $this->db->from('google_examples ge');
        $this->db->where('ge.lemma',$word);
        $checkwordinGE = $this->db->get();

    if ($checkwordinUW->num_rows() > 0)
	return "example is already found, no need to make a call to google";
   else 
        return " example is NOT found currently, need to get from google";

}


function get_examples_from_google($heading=''){
   
	//url
	$url = 'http://www.google.com/dictionary?aq=f&langpair=en|en&q='.$heading.'&hl=en';
	//get the page content
	$google_content = get_datax($url);
	$google_usages = (get_matchx('/<h3[^>]*>Usage examples<\/h3>(.*)<\/ul>/isU',$google_content));
        return $google_usages. '</ul>';
}

?>
