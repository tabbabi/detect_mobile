<?php

namespace Drupal\detect_mobile\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class DefaultForm.
 */
class DefaultForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'default_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['detect_mobile.default_form.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('detect_mobile.default_form.settings');
    $form['desktop_domain'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Desktop Domain'),
      '#description' => $this->t("enter the domain for the desktop without 'http' for example 'example.com'"),
      '#default_value' => $config->get('desktop_domain'),
      '#maxlength' => 32,
      '#size' => 32,
      '#weight' => '0',
    ];
    $form['mobile_domain'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Mobile Domain'),
      '#description' => $this->t("enter the domain for the mobile without 'http' for example 'm.example.com'"),
      '#default_value' => $config->get('mobile_domain'),
      '#maxlength' => 32,
      '#size' => 32,
      '#weight' => '0',
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    $values = $form_state->getValues();
    $this->config('detect_mobile.default_form.settings')
      ->set('desktop_domain', $values['desktop_domain'])
      ->set('mobile_domain', $values['mobile_domain'])
      ->save();
  }
}
