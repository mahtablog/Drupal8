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

    $total = array('first' => $first);
		print 'hello';
		print_r($total);
		$node = Node::load($first);
		print 'hello2';
		print_r($node);
		print '===========================';
		
		// Get a node storage object.
$node_storage = \Drupal::entityManager()->getStorage('node');

// Load a single node.
print_r($node_storage->load($first));

exit;

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





