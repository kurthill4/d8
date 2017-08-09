<?php
/**
 * @file
 * Contains \Drupal\attach_agendas\Form\AttachAgendasForm
 */
 namespace Drupal\attach_agendas\Form;
 
 use \Drupal\Core;
 use \Drupal\Core\Entity;
 use \Drupal\Core\Form\FormBase;
 use \Drupal\Core\Form\FormStateInterface;
 use \Drupal\node\Entity\Node;
 use \Drupal\file\Entity\File;

# use Symfony\Component\HttpFoundation\Request;
	
  
/**
 * Create the form
 */
 class AttachAgendasForm extends FormBase {
	 
	 /**
	  * {@inheritdoc}
	  */
	  public function getFormID() {
		  return 'attach_agendas_form';
	  }
	 /**
	  * {@inheritdoc}
	  */
	  public function buildForm(array $form,FormStateInterface $form_state) {
		  $form['attach_agendas_path'] = array(
		  '#type' => 'textfield',
		  '#title' => $this->t("Complete Path to Agendas & Minutes Folders.<br />
			Include trailing slashes; e.g. '/home/webmaster/web-projects/dev/web/sites/default/files/<br />
			NOTE: This module will take a very long time to run and may slow down the server."),
		);
		  $form['submit'] = array(
		  '#type' => 'submit',
		  '#value' => t('Attach'),
		  );
		  return $form;
	  }
	 /**
	  * {@inheritdoc}
	  */
	  public function submitForm(array &$form,FormStateInterface $form_state) {
		$filePath = $form_state->getValue('attach_agendas_path');
		//\Drupal::moduleHandler()->invoke('attach_agendas','attach_agendas_attachem',array($filePath,$form_state));
		$test = $this->attach_agendas_attachem($filePath,$form_state);
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
	protected function attach_agendas_attachem($pathIn,$form_state) {
		//$path = '/home/webmaster/web-projects/dev/web/sites/default/files/';

		// First, get the file path and set up the prefix for the corresponding Drupal path

		$path = $pathIn;
		$newpath = 'public://';
		
		// Now, pull the correct nodes

		$query = \Drupal::entityQuery('node')
			->condition('type', 'committee_meeting');
		$nids = $query->execute();

		// The mainline logic to attach the files

		foreach ($nids as $nid) {							// Do this as long as there are nodes:
			$node = node_load($nid, NULL, TRUE);					// Get one node
			$fileCode = $node->field_file_code->getString();			// Extract the committee and date
			$fileCodeNum = $node->field_file_code_num->getString();
			if($fileCodeNum !== null)						// Is this meeting supposed to have files?
			{
				$fileCodeAgendas = $fileCode . '-a' . $fileCodeNum;		// Build the paths to the files
				$fileCodeMinutes = $fileCode . '-m' . $fileCodeNum;		// 	you're going to attach
	
				$pathToAgendas = $path . 'agendas/' . $fileCodeAgendas;
				$pathToMinutes = $path . 'minutes/' . $fileCodeMinutes;

			// Create Agenda file object from a locally copied file.
			// Then, put the file into Drupal and attach to the node

				if(file_exists($pathToAgendas))
				{
					$uriAgendas = file_unmanaged_copy($pathToAgendas, $newpath . 'committees/agendas/' .
						$fileCodeAgendas,FILE_EXISTS_REPLACE);
					if(isset($uriAgendas))
					{
						$agendas = File::Create(['uri' => $uriAgendas,]);
						$agendas->save();
						$node->field_agenda->setValue(['target_id' => $agendas->id(),]);
					}
				}
			// Now, do the same for Minutes

				if(file_exists($pathToMinutes))
				{
					$uriMinutes = file_unmanaged_copy($pathToMinutes, $newpath . 'committees/minutes/' . 							$fileCodeMinutes,FILE_EXISTS_REPLACE);
					if(isset($uriMinutes))
					{
						$minutes = File::Create(['uri' => $uriMinutes,]);
						$minutes->save();
						$node->field_minutes->setValue(['target_id' => $minutes->id(),]);
					}
				}

			// Finally, save the node with its new content and reset the cache for the next iteration

				if(isset($uriAgendas) || isset($uriMinutes))
					$node->save();
				\Drupal::entityManager()->getStorage('node')->resetCache(array($nid));
			}
		}
		return 'The module is done running.';	
	}
}
