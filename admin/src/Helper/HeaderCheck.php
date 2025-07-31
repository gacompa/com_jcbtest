<?php
/*----------------------------------------------------------------------------------|  www.vdm.io  |----/
				Alizarina 
/-------------------------------------------------------------------------------------------------------/

	@version		1.0.0
	@build			31st July, 2025
	@created		30th July, 2025
	@package		jcbtest
	@subpackage		HeaderCheck.php
	@author			gacompa <http://alizarina.eu>	
	@copyright		Copyright (C) 2015. All Rights Reserved
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
  ____  _____  _____  __  __  __      __       ___  _____  __  __  ____  _____  _  _  ____  _  _  ____ 
 (_  _)(  _  )(  _  )(  \/  )(  )    /__\     / __)(  _  )(  \/  )(  _ \(  _  )( \( )( ___)( \( )(_  _)
.-_)(   )(_)(  )(_)(  )    (  )(__  /(__)\   ( (__  )(_)(  )    (  )___/ )(_)(  )  (  )__)  )  (   )(  
\____) (_____)(_____)(_/\/\_)(____)(__)(__)   \___)(_____)(_/\/\_)(__)  (_____)(_)\_)(____)(_)\_) (__) 

/------------------------------------------------------------------------------------------------------*/
namespace JCB\Component\Jcbtest\Administrator\Helper;

use Joomla\CMS\Factory;
use Joomla\CMS\Document\Document;
use Joomla\CMS\Application\CMSApplication;

// No direct access to this file
\defined('_JEXEC') or die;

/**
 * Helper class for checking loaded scripts and styles in the document header.
 *
 * @since   3.2.0
 */
class HeaderCheck
{
	/**
	 * @var CMSApplication Application object
	 *
	 * @since   3.2.0
	 */
	protected CMSApplication $app;

	/**
	 * @var Document object
	 *
	 * @since   3.2.0
	 */
	protected Document $document;

	/**
	 * Construct the app and document
	 *
	 * @since   3.2.0
	 */
	public function __construct()
	{
		// Initializes the application object.
		$this->app ??= Factory::getApplication();

		// Initializes the document object.
		$this->document = $this->app->getDocument();
	}

	/**
	 * Check if a JavaScript file is loaded in the document head.
	 *
	 * @param string $scriptName Name of the script to check.
	 *
	 * @return bool True if the script is loaded, false otherwise.
	 * @since   3.2.0
	 */
	public function js_loaded(string $scriptName): bool
	{
		return $this->isLoaded($scriptName, 'scripts');
	}

	/**
	 * Check if a CSS file is loaded in the document head.
	 *
	 * @param string $scriptName Name of the stylesheet to check.
	 *
	 * @return bool True if the stylesheet is loaded, false otherwise.
	 * @since   3.2.0
	 */
	public function css_loaded(string $scriptName): bool
	{
		return $this->isLoaded($scriptName, 'styleSheets');
	}

	/**
	 * Abstract method to check if a given script or stylesheet is loaded.
	 *
	 * @param string $scriptName Name of the script or stylesheet.
	 * @param string $type Type of asset to check ('scripts' or 'styleSheets').
	 *
	 * @return bool True if the asset is loaded, false otherwise.
	 * @since   3.2.0
	 */
	private function isLoaded(string $scriptName, string $type): bool
	{
		// UIkit specific check
		if ($this->isUIkit($scriptName))
		{
			return true;
		}

		$head_data = $this->document->getHeadData();
		foreach (array_keys($head_data[$type]) as $script)
		{
			if (stristr($script, $scriptName))
			{
				return true;
			}
		}

		return false;
	}

	/**
	 * Check for UIkit framework specific conditions.
	 *
	 * @param string $scriptName Name of the script or stylesheet.
	 *
	 * @return bool True if UIkit specific conditions are met, false otherwise.
	 * @since   3.2.0
	 */
	private function isUIkit(string $scriptName): bool
	{
		if (strpos($scriptName, 'uikit') !== false)
		{
			$get_template_name = $this->app->getTemplate('template')->template;
			if (strpos($get_template_name, 'yoo') !== false)
			{
				return true;
			}
		}
		return false;
	}
}
