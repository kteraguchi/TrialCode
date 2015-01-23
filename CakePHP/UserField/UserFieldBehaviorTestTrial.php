<?php
/**
 * UserFieldBehavior Test Case
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('UserFieldBehavior', 'NetCommons.Model/Behavior');

/**
 * TestUserField model class for test
 *
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 */
class TestUserField extends CakeTestModel {
}

/**
 * Summary for UserFieldBehavior Test Case
 *
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 */
class UserFieldBehaviorTestTrial extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.net_commons.test_user_field'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserField = ClassRegistry::init('UserField');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		parent::tearDown();
		CakeSession::delete('Auth.User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	protected function _authSession($userIdField = 'id', $userId = 1) {
		CakeSession::write('Auth.User', array($userIdField => $userId));
	}

/**
 * testSave method
 *
 * @return void
 */
	public function testSave() {
/* 		$model = ClassRegistry::init('UserField');
		$this->UserField->Behaviors->attach('NetCommons.UserField');

		$sessionMock = $this->getMock('CakeSession', array('read'));
		$sessionMock->expects($this->once())
			->method('read')
			->with($this->equalTo('Auth.User.id'))
			->will($this->returnValue('999'));

		$this->UserField->create();
		$userField = $this->UserField->save();

		var_Dump($userField); */
		/* $data['UserField'][] = array_merge(
			$this->request->data,
			array(
				'room_id' => 1,
				'language_id' => 2,
				'key' => hash('sha256', 'テスト' . date('Y/m/d H:i:s')),
				'name' => 'テスト' . date('Y/m/d H:i:s'),
			)
		); */

	}

}
