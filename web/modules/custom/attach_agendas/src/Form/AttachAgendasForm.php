<?php
/**
 * @file
 * Contains \Drupal\attach_agendas\Form\AttachAgendasForm
 */
 namespace Drupal\attach_agendas\Form;
 
 use Drupal\Core\Form\FormBase;
 use Drupal\Core\Form\FormStateInterface;
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
		  '#title' => $this->t("Complete Path to Agendas & Minutes Folders. Include trailing slashes; e.g. '/home/webmaster/web-projects/dev/web/sites/default/files/"),
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

		\Drupal::moduleHandler()->invoke('attach_agendas','attachem',array($filePath,$form_state));
	  }

 	 /**
	  * {@inheritdoc}
	  */
	  /*public function validateForm(array &$form,FormStateInterface $form_state) {
		 $value = $form_state->getValue('attach_agendas_path');
			 $form_state->setErrorByName('path',t('Form was submitted!' . ' ' . $value,array('%test'=>$value)));
		
		}*/
}
