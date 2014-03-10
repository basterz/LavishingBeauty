<?php

class setCultureFilter extends sfFilter {
  public function execute ($filterChain)
  {
    if ($this->isFirstCall()) {
      $this->getContext()->getUser()->setCulture('en');
    }
    $filterChain->execute($filterChain);
  }
}