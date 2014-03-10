<form action="" method="post" id="login-form"<?php echo count($form->getErrorSchema()->getErrors()) || $sf_user->getFlash('sign_in_error') > 0 ? ' class="with-errors"' : '' ?>>
  <?php if ($sf_user->getFlash('sign_in_error')): ?>
    <?php include_partial('common/message', array('type' => 'error', 'message' => 'Wrong email or password!')) ?>
  <?php endif ?>
  <?php if ($sf_user->getFlash('sign_out_success')): ?>
    <?php include_partial('common/message', array('type' => 'success', 'message' => 'Bye bye! We hope to see you here again soon!')) ?>
  <?php endif ?>
  <div class="form-item">
    <?php echo $form['email']->renderLabel('Email') ?><br />
    <?php echo $form['email']->render(array('value' => 'Your email...', 'data-val' => 'Your email...', 'class' => $form['email']->renderError() ? 'with-error' : '')) ?>
  </div>
  <div class="form-item">
    <?php echo $form['password']->renderLabel('Password') ?><br />
    <?php echo $form['password']->render(array('class' => $form['password']->renderError() ? 'with-error' : '')) ?>
  </div>
  <div class="fleft">
    <?php echo $form['remember_me']->render(array('class' => 'checkbox')) ?>
    <?php echo $form['remember_me']->renderLabel('Remember?') ?>
  </div>
  <input type="submit" value="Log in" class="button fright" />
  <div class="clear"></div>
  <?php echo $form->renderHiddenFields() ?>
</form>