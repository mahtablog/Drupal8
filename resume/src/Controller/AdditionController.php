<?php

/**
 * @file
 * Contains \drupal\resume\Controller\AdditionController
 */

namespace Drupal\resume\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;

/**
 * Controller routines for page example routes.
 */
class AdditionController extends ControllerBase {

  public function add($first, $second, $third) {

		$node = Node::load($first);
    $message = $node->body->value;
		//print $message;exit;
	  //print($node->get('body')->getString());
		// Get a node storage object.
    //$node_storage = \Drupal::entityTypeManager()->getStorage('node');
    // Load a single node.
    //print_r($node_storage->load($first));


    $total = array('first' => $message);
    $render_array['addition_arguments'] = array(
      // The theme function to apply to the #items
      //'#theme' => 'item_list',
      // The list itself.
      //'#items' => $total ,
      //'#title' => $this->t('Addition of 3 values'),
			'#theme' => 'my_template',
      '#test_var' => $this->t('Create PDF'),
			'#doubles' => $total,
    );
    return $render_array;
  }
}
?>





