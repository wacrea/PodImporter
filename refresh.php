<?php

	// Refresh sys of PodImporter by William AGAY

	function refresh(){

		require_once('functions_main.php');
	
		$podcasts = get_feeds();

		$data = array();
		
		$iPodcast = 1;

		foreach($podcasts AS $podcast){
					
			$doc = new DOMDocument();
			$doc->preserveWhiteSpace = false;
			$xml = file_get_contents($podcast['feed']);

			$doc->loadXML($xml);

			// Initialize XPath    
			$xpath = new DOMXpath( $doc);
			// Register the itunes namespace
			$xpath->registerNamespace( 'itunes', 'http://www.itunes.com/dtds/podcast-1.0.dtd');
			$items = $doc->getElementsByTagName('item');

			$iShows = 1;

			foreach( $items as $item ) {
			    
			    $title = $xpath->query( 'title', $item)->item(0)->nodeValue;
			    $pubdate = $xpath->query( 'pubDate', $item)->item(0)->nodeValue;
			    $summary = $xpath->query( 'itunes:summary', $item)->item(0)->nodeValue;
			    $keywords = $xpath->query( 'itunes:keywords', $item)->item(0)->nodeValue;
			    $duration = $xpath->query( 'itunes:duration', $item)->item(0)->nodeValue;

			    $url_file = '';
			    $url_image = '';

			    if($enclosure = $xpath->query( 'enclosure', $item)->item(0)){

			    		$url_file = $enclosure->attributes->getNamedItem('url')->value;
			    }

			    if($image = $xpath->query( 'itunes:image', $item)->item(0)){

			    	$url_image = $image->attributes->getNamedItem('href')->value;
			    }

			    if($podcast['slug'] == 'podmydev'){

			    	$mediacontent = $xpath->query( 'media:content', $item)->item(0);
			    	$url_file = $mediacontent->attributes->getNamedItem('url')->value;

			    	$keywords = '';
			    }
			    elseif ($podcast['slug'] == 'geek-sans-moderation') {
			    	
			    	$keywords = '';
			    	$duration = '';

			    	$enclosure = $xpath->query( 'enclosure', $item)->item(0);
			    	$url_file = $enclosure->attributes->getNamedItem('url')->value;
			    }
			    elseif ($podcast['slug'] == 'mo5') {

			    	$summary = $xpath->query( 'itunes:subtitle', $item)->item(0)->nodeValue;
			    }
			    elseif ($podcast['slug'] == 'yatta') {

			    	$summary = $xpath->query( 'itunes:subtitle', $item)->item(0)->nodeValue;
			    }

			    $data_emission = array(
			    				'title' => $title,
			    				'pubdate' => $pubdate,
			    				'summary' => $summary,
			    				'duration' => $duration,
			    				'url_file' => $url_file,
			    				'url_image' => $url_image,
			    				'slug' => $podcast['slug'],
			    				'keywords' => $keywords
			    				);

			    //echo '>> yes! <br/>';
				
				//var_dump($data_emission);
				$iShows++;

			    $data[] = $data_emission;
			}

			//echo 'Count shows ('.$iShows.')';

			//echo $i;

			$iPodcast++;
		}

		//echo 'Count Podcast ('.$iPodcast.')';

		return $data;
	}