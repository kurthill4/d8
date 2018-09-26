<?php
/**
 * @file
 * Contains \Drupal\attach_agendas\Form\MeetingUpdateForm
 */
 namespace Drupal\meeting_update\Form;
 
 use \Drupal\Core;
 use \Drupal\Core\Entity;
 use \Drupal\Core\Form\FormBase;
 use \Drupal\Core\Form\FormStateInterface;
 use \Drupal\node\Entity\Node;
 use \Drupal\node\NodeInterface;

# use Symfony\Component\HttpFoundation\Request;
	
  
/**
 * Create the form
 */
 class MeetingUpdateForm extends FormBase {
	 
	 /**
	  * {@inheritdoc}
	  */
	  public function getFormID() {
		  return 'meeting_update_form';
	  }
	 /**
	  * {@inheritdoc}
	  */
	  public function buildForm(array $form,FormStateInterface $form_state) {
		  $form['submit'] = array(
		  '#type' => 'submit',
		  '#value' => t('Update'),
		  );
		  return $form;
	  }
	 /**
	  * {@inheritdoc}
	  */
	  public function submitForm(array &$form,FormStateInterface $form_state) {
		$test = $this->meeting_update_doUpdate($form_state);
		drupal_set_message($test);

	  }

 	 /**
	  * {@inheritdoc}
	  */
	  public function validateForm(array &$form,FormStateInterface $form_state) {
		//drupal_set_message($mess);
		
	}

 	 /**
	  * attach_agendas_attachem
	  *
	  * Attaches agendas and minutes to existing Committee Meeting nodes.
	  *
	  *
	  *
	  */
	protected function meeting_update_doUpdate($form_state) {

		$numErrors = 0;
		$numNodes = 0;
		$totalNodes = 0;
		//$newTZ = new \DateTimeZone("America/Los_Angeles");
		
		// Now, pull the correct nodes

		$query = \Drupal::entityQuery('node')
			->condition('type', 'committee_meeting');
		$nids = $query->execute();

		// The mainline logic to set the dates

		foreach ($nids as $nid) {							// Do this as long as there are nodes:
			$success = FALSE;
			$node = node_load($nid, NULL, TRUE);					// Get one node
/*
			$date1 = $node->field_meeting_date_time->getString();			// Extract the date
			$date2 = new \DateTime($date1);						// Create a new Date object
			$date2End = new \DateTime($date1);						// Create a new Date object
			//$date2->setTimeZone($newTZ);
			//$date2End->setTimeZone($newTZ);
			$date2End->modify('+1 hours');
			$date2Out = $date2->format('Y-m-d\TH:i:s');				// Format the date for Drupal storage
			$date2EndOut = $date2End->format('Y-m-d\TH:i:s');			// Format the date for Drupal storage
*/
			try {
				/*$node->field_event_date->value = $date2Out;
				$node->field_event_date->end_value = $date2EndOut;
				$node->field_event_type->target_id = 320;*/
//				$c = $entity->get('field_committee')->entity->getID();
				$c = $node->field_committee->target_id;
				$node->field_associated_committee[] = ['target_id' => $c];	
			$success = TRUE;

			}
			catch(Exception $e) {
				$numErrors++;
				drupal_set_message('Error number ' . $numErrors);
			}
			// Finally, save the node with its new content and reset the cache for the next iteration
			if($success == TRUE) {	
				$node->save();
				\Drupal::entityManager()->getStorage('node')->resetCache(array($nid));
				$numNodes++;
			}
			$totalNodes++;
		}
		return $numNodes . ' Nodes Processed Succesfully of ' . $totalNodes . ' Nodes Total';
	}
}
