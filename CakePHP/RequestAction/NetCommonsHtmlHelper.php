<?php
/**
 * Html Helper class file.
 *
 * Simplifies the construction of HTML elements.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Helper
 * @since         CakePHP(tm) v 0.9.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('HtmlHelper', 'View/Helper');


/**
 * Html Helper class for easy use of HTML widgets.
 *
 * HtmlHelper encloses all methods needed while working with HTML pages.
 *
 * @package       Cake.View.Helper
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html
 */
class NetCommonsHtmlHelper extends HtmlHelper {

/**
 * Constructor
 *
 * ### Settings
 *
 * - `configFile` A file containing an array of tags you wish to redefine.
 *
 * ### Customizing tag sets
 *
 * Using the `configFile` option you can redefine the tag HtmlHelper will use.
 * The file named should be compatible with HtmlHelper::loadConfig().
 *
 * @param View $View The View this helper is being attached to.
 * @param array $settings Configuration settings for the helper.
 */
	public function __construct(View $View, $settings = array()) {
		parent::__construct($View, $settings);

		static $Blocks = null;
		if (!isset($Blocks)) {
			$Blocks = $this->_View->Blocks;
		}
		$this->_View->Blocks = $Blocks;
	}

/**
 * Returns one or many `<script>` tags depending on the number of scripts given.
 *
 * If the filename is prefixed with "/", the path will be relative to the base path of your
 * application. Otherwise, the path will be relative to your JavaScript path, usually webroot/js.
 *
 *
 * ### Usage
 *
 * Include one script file:
 *
 * `echo $this->Html->script('styles.js');`
 *
 * Include multiple script files:
 *
 * `echo $this->Html->script(array('one.js', 'two.js'));`
 *
 * Add the script file to the `$scripts_for_layout` layout var:
 *
 * `$this->Html->script('styles.js', array('inline' => false));`
 *
 * Add the script file to a custom block:
 *
 * `$this->Html->script('styles.js', null, array('block' => 'bodyScript'));`
 *
 * ### Options
 *
 * - `inline` Whether script should be output inline or into `$scripts_for_layout`. When set to false,
 *   the script tag will be appended to the 'script' view block as well as `$scripts_for_layout`.
 * - `block` The name of the block you want the script appended to. Leave undefined to output inline.
 *   Using this option will override the inline option.
 * - `once` Whether or not the script should be checked for uniqueness. If true scripts will only be
 *   included once, use false to allow the same script to be included more than once per request.
 * - `plugin` False value will prevent parsing path as a plugin
 * - `fullBase` If true the url will get a full address for the script file.
 *
 * @param string|array $url String or array of javascript files to include
 * @param array|boolean $options Array of options, and html attributes see above. If boolean sets $options['inline'] = value
 * @return mixed String of `<script />` tags or null if $inline is false or if $once is true and the file has been
 *   included before.
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html#HtmlHelper::script
 */
	public function script($url, $options = array()) {
		static $includedScripts = array();

		$this->_includedScripts = $includedScripts;
		$out = parent::script($url, $options);
		$includedScripts = $this->_includedScripts;

		return $out;
	}

}
