<?php

class SettingsForm extends sfForm
{
  public function configure() {
    $options = Doctrine_Core::getTable('AppVar')->findAll();
    $i = 0;
    foreach ($options as $option) {
      $form = new AppVarForm($option);
      $this->embedForm(++$i, $form);
    }
    $this->setOption('count', $i);
    $this->getWidgetSchema()->setNameFormat('settings[%s]');
  }
  
  public function save()
  {
    $count = $this->getOption('count');
    for ($i = 1; $i <= $count; $i++) {
      $var = $this->values[$i]['var_value'];
      $object = $this->getEmbeddedForm($i)->getObject();
      $object->setVarValue($var);
      $object->save();
    }
  }
}