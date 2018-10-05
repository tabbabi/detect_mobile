<?php

namespace Drupal\detect_mobile\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\detect_mobile\MobileDetectManager;


/**
 * Class DefaultForm.
 */
class DefaultForm extends ConfigFormBase {

  /**
   * The form id of this form.
   *
   * @var string
   */
  private $formId = 'default_form';

  /**
   * The Rate Limiter Configuration name.
   *
   * @var string
   */
  private $configName = 'detect_mobile.default_form.settings';

  /**
   * Constructs a SiteInformationForm object.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The configuration factory.
   */
  public function __construct(ConfigFactoryInterface $config_factory) {
    parent::__construct($config_factory);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return $this->formId;
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [$this->configName];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config($this->configName);
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
    $this->config($this->configName)
      ->set('desktop_domain', $values['desktop_domain'])
      ->set('mobile_domain', $values['mobile_domain'])
      ->save();
  }
}
