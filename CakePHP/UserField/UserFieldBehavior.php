<?php
/**
 * UserFieldBehavior file
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('ModelBehavior', 'Model');
App::uses('AuthComponent', 'Controller/Component');

/**
 * User field behavior
 *
 * It set data about user_id
 *
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @package NetCommons\Pages\Controller
 */
class UserFieldBehavior extends ModelBehavior {

/**
 * Defaults
 *
 * @var array
 */
	protected $_defaults = array(
		'created' => 'created_user',
		'modified' => 'modified_user'
	);

/**
 * Initiate
 *
 * @param Model $Model Model the behavior is being attached to.
 * @param array $config Array of configuration information.
 * @return mixed
 */
	public function setup(Model $Model, $config = array()) {
		$settings = array_merge($this->_defaults, $config);
		$this->settings[$Model->alias] = $settings;
	}

/**
 * beforeSave
 *
 * Sets data about user_id
 *
 * @param Model $Model Model save was called on.
 * @param array $options Options passed from Model::save().
 * @return boolean true.
 * @see Model::save()
 */
	public function beforeSave(Model $Model, $options = array()) {
		extract($this->settings[$Model->alias]);
		$userId = AuthComponent::user('id');;
		$whiteList = array();

		if ($Model->exists() && $Model->hasField($created)) {
			$Model->data[$Model->alias][$created] = $userId;
			$whiteList[] = $created;
		}

		if ($Model->hasField($modified)) {
			$Model->data[$Model->alias][$modified] = $userId;
			$whiteList[] = $modified;
		}

		if (!empty($Model->whitelist)) {
			$Model->whitelist += $whiteList;
		}

		return true;
	}

}
