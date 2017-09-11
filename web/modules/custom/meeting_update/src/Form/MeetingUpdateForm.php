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
		$newTZ = new \DateTimeZone("UTC");
		
		// Now, pull the correct nodes

		$query = \Drupal::entityQuery('node')
			->condition('type', 'committee_meeting');
		$nids = $query->execute();

		// The mainline logic to attach the files

		foreach ($nids as $nid) {							// Do this as long as there are nodes:
			$success = FALSE;
			$node = node_load($nid, NULL, TRUE);					// Get one node
			$date1 = $node->field_meeting_date->getString();			// Extract the date
			$date2 = new \DateTime($date1);						// Create a new Date object
			$date2->setTimeZone($newTZ);
			$date2Out = $date2->format('Y-m-d\TH:i:s');				// Format the date for Drupal storage
			try {
				$node->set('field_meeting_date_time',[['value' => $date2Out]]);
				$success = TRUE;

			}
			catch(Exception $e) {
				$numErrors++;
				drupal_set_message('Error number ' . $numErrors);
			}
			if($success == TRUE) {	// Finally, save the node with its new content and reset the cache for the next iteration
				$node->save();
				\Drupal::entityManager()->getStorage('node')->resetCache(array($nid));
				$numNodes++;
			}
			$totalNodes++;
		}
		return $numNodes . ' Nodes Processed Succesfully of ' . $totalNodes . ' Nodes Total';
	}
}
