<?php
/*----------------------------------------------------------------------------------|  www.vdm.io  |----/
				Alizarina 
/-------------------------------------------------------------------------------------------------------/

	@version		1.0.0
	@build			31st July, 2025
	@created		30th July, 2025
	@package		jcbtest
	@subpackage		Router.php
	@author			gacompa <http://alizarina.eu>	
	@copyright		Copyright (C) 2015. All Rights Reserved
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
  ____  _____  _____  __  __  __      __       ___  _____  __  __  ____  _____  _  _  ____  _  _  ____ 
 (_  _)(  _  )(  _  )(  \/  )(  )    /__\     / __)(  _  )(  \/  )(  _ \(  _  )( \( )( ___)( \( )(_  _)
.-_)(   )(_)(  )(_)(  )    (  )(__  /(__)\   ( (__  )(_)(  )    (  )___/ )(_)(  )  (  )__)  )  (   )(  
\____) (_____)(_____)(_/\/\_)(____)(__)(__)   \___)(_____)(_/\/\_)(__)  (_____)(_)\_)(____)(_)\_) (__) 

/------------------------------------------------------------------------------------------------------*/
namespace JCB\Component\Jcbtest\Site\Service;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Application\SiteApplication;
use Joomla\CMS\Categories\CategoryFactoryInterface;
use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Component\Router\RouterView;
use Joomla\CMS\Component\Router\RouterViewConfiguration;
use Joomla\CMS\Component\Router\Rules\MenuRules;
use Joomla\CMS\Component\Router\Rules\NomenuRules;
use Joomla\CMS\Component\Router\Rules\StandardRules;
use Joomla\CMS\Menu\AbstractMenu;
use Joomla\Database\DatabaseInterface;
use Joomla\Database\ParameterType;
use Joomla\Registry\Registry;
use JCB\Component\Jcbtest\Administrator\Helper\JcbtestHelper;

// No direct access to this file
\defined('_JEXEC') or die;

/**
 * Router class for the jcbtest Component
 *
 * @since  3.10
 */
class Router extends RouterView
{
	/**
	 * Flag to remove IDs
	 *
	 * @var    boolean
	 * @since  4.0.0
	 */
	protected $noIDs = false;

	/**
	 * The category factory
	 *
	 * @var    CategoryFactoryInterface
	 * @since  4.0.0
	 */
	private $categoryFactory;

	/**
	 * The category cache
	 *
	 * @var    array
	 * @since  4.0.0
	 */
	private $categoryCache = [];

	/**
	 * The db
	 *
	 * @var    DatabaseInterface
	 * @since  4.0.0
	 */
	private $db;

	/**
	 * The component params
	 *
	 * @var    Registry
	 * @since  4.0.0
	 */
	private $params;

	/**
	 * Jcbtest Component router constructor
	 *
	 * @param   SiteApplication           $app               The application object
	 * @param   AbstractMenu              $menu              The menu object to work with
	 * @param   CategoryFactoryInterface  $categoryFactory   The category object
	 * @param   DatabaseInterface         $db                The database object
	 *
	 * @since   4.0.0
	 */
	public function __construct(
		SiteApplication $app,
		AbstractMenu $menu,
		CategoryFactoryInterface $categoryFactory,
		DatabaseInterface $db)
	{
		$this->categoryFactory = $categoryFactory;
		$this->db              = $db;
		$this->params          = ComponentHelper::getParams('com_jcbtest');
		$this->noIDs           = (bool) $this->params->get('sef_ids', false);

		// Add the (test:view) router configuration
		$test = new RouterViewConfiguration('test');
		$this->registerView($test);

		parent::__construct($app, $menu);

		$this->attachRule(new MenuRules($this));
		$this->attachRule(new StandardRules($this));
		$this->attachRule(new NomenuRules($this));
	}
}
