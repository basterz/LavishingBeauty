<?php

class backendConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
    sfValidatorBase::setDefaultMessage('required', 'The field is required');
    //sfConfig::set('sf_upload_dir', '/home/colourme/www/www/uploads');
  }
}
