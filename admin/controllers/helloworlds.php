<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HelloWorlds Controller
 *
 * @since  0.0.1
 */
class HelloWorldControllerHelloWorlds extends JControllerAdmin
{
	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  object  The model.
	 *
	 * @since   1.6
	 */
	public function getModel($name = 'HelloWorld', $prefix = 'HelloWorldModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}

	public function extrahello() {

		// Get the input
		$input = JFactory::getApplication()->input;
		$cid = $this->input->get('cid', array(), 'array');

		// Sanitize the input
		$cid = ArrayHelper::toInteger($cid);

		// Get the model
		$model = $this->getModel();

		$result_list = $model->extrahello($cid);
		
		$etext = "";
		for ($i=0; $i < count($result_list); $i++) { 
			$etext =  $etext . "Extra ". $result_list[$i] . "<br>";
		}
	
		$this->setMessage($etext, $type = 'message');
		$this->setRedirect(JRoute::_('index.php?option=com_helloworld&view=HelloWorlds', false));

	}
}