<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('View', 'View');

/**
 * A view class that is used for JSON responses.
 *
 * By setting the '_serialize' key in your controller, you can specify a view variable
 * that should be serialized to JSON and used as the response for the request.
 * This allows you to omit views and layouts if you just need to emit a single view
 * variable as the JSON response.
 *
 * In your controller, you could do the following:
 *
 * `$this->set(array('posts' => $posts, '_serialize' => 'posts'));`
 *
 * When the view is rendered, the `$posts` view variable will be serialized
 * into JSON.
 *
 * You can also define `'_serialize'` as an array. This will create a top level object containing
 * all the named view variables:
 *
 * {{{
 * $this->set(compact('posts', 'users', 'stuff'));
 * $this->set('_serialize', array('posts', 'users'));
 * }}}
 *
 * The above would generate a JSON object that looks like:
 *
 * `{"posts": [...], "users": [...]}`
 *
 * If you don't use the `_serialize` key, you will need a view. You can use extended
 * views to provide layout-like functionality.
 *
 * You can also enable JSONP support by setting parameter `_jsonp` to true or a string to specify
 * custom query string paramater name which will contain the callback function name.
 *
 * @package       Cake.View
 * @since         CakePHP(tm) v 2.1.0
 */
class RequestActionView extends View {

/**
 * Constructor
 *
 * @param Controller $controller
 */
	public function __construct(Controller $controller = null) {
		static $helpers = null;

		parent::__construct($controller);

		if (!isset($helpers)) {
			$helpers = $this->Helpers;
		}
		$this->Helpers = $helpers;
	}

}
