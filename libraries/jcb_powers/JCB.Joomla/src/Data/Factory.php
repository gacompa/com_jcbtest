<?php

/***[JCBGUI.power.licensing_template.761.$$$$]***/
/**
 * @package    Joomla.Component.Builder
 *
 * @created    4th September, 2022
 * @author     Llewellyn van der Merwe <https://dev.vdm.io>
 * @git        Joomla Component Builder <https://git.vdm.dev/joomla/Component-Builder>
 * @copyright  Copyright (C) 2015 Vast Development Method. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
/***[/JCBGUI$$$$]***/

namespace JCB\Joomla\Data;



/***[JCBGUI.power.head.761.$$$$]***/
use Joomla\DI\Container;/***[/JCBGUI$$$$]***/

use JCB\Joomla\Service\Table;
use JCB\Joomla\Service\Database;
use JCB\Joomla\Service\Model;
use JCB\Joomla\Service\Data;
use JCB\Joomla\Interfaces\FactoryInterface;
use JCB\Joomla\Abstraction\Factory as ExtendingFactory;


/**
 * Data Factory
 * 
 * @since 3.2.2
 */
abstract class Factory extends ExtendingFactory implements FactoryInterface
{

/***[JCBGUI.power.main_class_code.761.$$$$]***/
	/**
	 * Package Container
	 *
	 * @var   Container|null
	 * @since 5.0.3
	 **/
	protected static ?Container $container = null;

	/**
	 * Create a container object
	 *
	 * @return  Container
	 * @since 3.2.2
	 */
	protected static function createContainer(): Container
	{
		return (new Container())
			->registerServiceProvider(new Table())
			->registerServiceProvider(new Database())
			->registerServiceProvider(new Model())
			->registerServiceProvider(new Data());
	}/***[/JCBGUI$$$$]***/

}

