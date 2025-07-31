<?php

/***[JCBGUI.power.licensing_template.136.$$$$]***/
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

namespace JCB\Joomla\Jcbtest;


use JCB\Joomla\Interfaces\TableInterface;
use JCB\Joomla\Abstraction\BaseTable;


/**
 * Jcbtest Tables
 * 
 * @since 3.2.0
 */
class Table extends BaseTable implements TableInterface
{

/***[JCBGUI.power.main_class_code.136.$$$$]***/
	/**
	 * All areas/views/tables with their field details
	 *
	 * @var     array
	 * @since 3.2.0
	 **/
	protected array $tables = [
		'test' => [
			'group' => [
				'name' => 'group',
				'label' => 'COM_JCBTEST_TEST_GROUP_LABEL',
				'type' => 'text',
				'title' => true,
				'list' => 'tests',
				'store' => NULL,
				'tab_name' => 'Details',
				'db' => [
					'type' => 'VARCHAR(10)',
					'default' => '',
					'GUID' => '0d4a5caa-2199-4fb1-b07f-bd8071d71dbe',
					'null_switch' => 'NULL',
					'unique_key' => false,
					'key' => true,
				],
				'link' => NULL,
			],
			'access' => [
				'name' => 'access',
				'label' => 'Access',
				'type' => 'accesslevel',
				'title' => false,
				'store' => NULL,
				'tab_name' => NULL,
				'db' => [
					'type' => 'INT(10) unsigned',
					'default' => '0',
					'key' => true,
					'null_switch' => 'NULL',
				],
			],
		],
	];/***[/JCBGUI$$$$]***/

}

