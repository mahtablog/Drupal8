<?php
 
/**
* @file
* Contains \Drupal\site_authenticate\Controller\PageJsonController.php
*
*/
 
namespace Drupal\site_authenticate\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\node\NodeInterface;

class PageJsonController{
	public function get_page_json(NodeInterface $node){
		$siteapikey = \Drupal::request()->get('siteapikey');
		$site_config_key = \Drupal::config('system.site')->get('siteapikey');
		if($node->getType() == 'page' & ($siteapikey == $site_config_key)){
			$title = $node->getTitle();
			$body = $node->get('body')->value;
			$json_array = array(
				'data' => array(
					'title'=>$title,
					'body'=> $body)
			);
			$json_array['status'] = 'ok';	
		}
		else{
			$json_array['error'] = 'access denied';	
		}
		return new JsonResponse($json_array);
	}
}