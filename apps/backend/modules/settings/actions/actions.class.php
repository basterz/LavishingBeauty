<?php

/**
 * settings actions.
 *
 * @package    FancyFooter
 * @subpackage settings
 * @author     Vertinity
 */
class settingsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new SettingsForm();
    if ($request->isMethod(sfWebRequest::POST)) {
      $this->form->bind($request->getParameter('settings'));
      if ($this->form->isValid()) {
        $this->form->save();
        $this->getUser()->setFlash('success', 1);
        $this->redirect('@settings');
      }
    }
  }
}
