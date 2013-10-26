<?php

function get_feeds(){

		$feeds = array();

		$feeds[0]['slug'] = 'agence-tous-geeks';
		$feeds[0]['feed'] = 'http://feeds.feedburner.com/atg_mp3?format=xml';

		$feeds[1]['slug'] = 'podmydev';
		$feeds[1]['feed'] = 'http://feeds.feedburner.com/PodMyDev?format=xml';

		// Attention, que 10 podcasts...
		$feeds[2]['slug'] = 'geek-sans-moderation';
		$feeds[2]['feed'] = 'http://feeds.feedburner.com/Geeksansmoderation';

		$feeds[3]['slug'] = 'audio-dramax';
		$feeds[3]['feed'] = 'http://www.audiodramax.com/feed';

		// Pas de flux.
		////$feeds[4]['slug'] = 'freepodcast';
		////$feeds[4]['feed'] = '';

		$feeds[5]['slug'] = 'wwsh';
		$feeds[5]['feed'] = 'http://feeds.feedburner.com/linaudible?format=xml';

		$feeds[7]['slug'] = 'la-grotte-du-barbu';
		$feeds[7]['feed'] = 'http://www.lagrottedubarbu.com/lgdb_new.xml';

		$feeds[9]['slug'] = 'mo5';
		$feeds[9]['feed'] = 'http://mo5.com/mag/podcasts/itunes.xml';

		$feeds[10]['slug'] = 'podbox';
		$feeds[10]['feed'] = 'http://feeds.feedburner.com/PodBox';

		$feeds[11]['slug'] = 'podcast-science';
		$feeds[11]['feed'] = 'http://feeds.feedburner.com/PodcastScience';

		$feeds[12]['slug'] = 'podsac';
		$feeds[12]['feed'] = 'http://feeds.djpod.com/podsac';

		$feeds[13]['slug'] = 'proxi-jeux';
		$feeds[13]['feed'] = 'http://podcast.proxi-jeux.fr/feed/';

		$feeds[14]['slug'] = 'senikast';
		$feeds[14]['feed'] = 'http://www.senikstudio.com/senikast/rss.xml';

		$feeds[15]['slug'] = 'tablette-cafe';
		$feeds[15]['feed'] = 'http://feeds.feedburner.com/tablettecafe';

		$feeds[16]['slug'] = 'voyagecast';
		$feeds[16]['feed'] = 'http://www.voyagecast.ch/feed/podcast/';

		$feeds[17]['slug'] = 'quadratour';
		$feeds[17]['feed'] = 'http://feeds.feedburner.com/LeQuadratour';

		$feeds[18]['slug'] = 'yatta';
		$feeds[18]['feed'] = 'http://yattacast.fr/podcasts/flux_yatta_itunes.xml';
		
		$feeds[19]['slug'] = 'histoire-de-france-plc';
		$feeds[19]['feed'] = 'http://podcast.captainweb.net/hdf/podcasthdf.xml';
		
		$feeds[20]['slug'] = 'apero-du-captain';
		$feeds[20]['feed'] = 'http://feeds.feedburner.com/LaperoDuCaptain';
		
		
		return $feeds;
	}