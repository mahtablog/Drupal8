<?php
namespace Drupal\site_authenticate\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\ConfigFormBase;

// Form we are extending
use Drupal\system\Form\SiteInformationForm;

/**
 * Configure site information settings for this site.
 */
class SiteApiKeySiteInformationForm extends SiteInformationForm
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        // Retrieve the system.site configuration
        $site_config = $this->config('system.site');

        // Get the original form from the class we are extending
        $form = parent::buildForm($form, $form_state);

        // Add a textfield to the site information section of the form for our
        // siteapikey
        $form['site_information']['site_api_key'] = [
          '#type' => 'textfield',
          '#title' => t('Site API Key'),
          '#default_value' => empty($site_config->get('siteapikey')) ? 'No API Key yet' : $site_config->get('siteapikey'),
          '#description' => $this->t('The API Key of the site.'),
        ];
        if(!empty($site_config->get('siteapikey'))){
          $form['actions']['submit']['#value'] = $this->t('Update Configuration');
        }
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        // save system.site.siteapikey configuration.
        $this->config('system.site')
            ->set('siteapikey', $form_state->getValue('site_api_key'))
            ->save();
        // Passing the remaining values of the original form that we have extended,
        // so that they are also saved
        parent::submitForm($form, $form_state);
        $this->messenger()->addMessage($this->t('Site API Key has been saved with value: ').$form_state->getValue('site_api_key'), 'status');
    }
}
?>