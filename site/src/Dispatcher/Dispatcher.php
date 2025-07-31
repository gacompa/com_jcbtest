<?php
/*----------------------------------------------------------------------------------|  www.vdm.io  |----/
				Alizarina 
/-------------------------------------------------------------------------------------------------------/

	@version		1.0.0
	@build			31st July, 2025
	@created		30th July, 2025
	@package		jcbtest
	@subpackage		Dispatcher.php
	@author			gacompa <http://alizarina.eu>	
	@copyright		Copyright (C) 2015. All Rights Reserved
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
  ____  _____  _____  __  __  __      __       ___  _____  __  __  ____  _____  _  _  ____  _  _  ____ 
 (_  _)(  _  )(  _  )(  \/  )(  )    /__\     / __)(  _  )(  \/  )(  _ \(  _  )( \( )( ___)( \( )(_  _)
.-_)(   )(_)(  )(_)(  )    (  )(__  /(__)\   ( (__  )(_)(  )    (  )___/ )(_)(  )  (  )__)  )  (   )(  
\____) (_____)(_____)(_/\/\_)(____)(__)(__)   \___)(_____)(_/\/\_)(__)  (_____)(_)\_)(____)(_)\_) (__) 

/------------------------------------------------------------------------------------------------------*/
namespace JCB\Component\Jcbtest\Site\Dispatcher;

use Joomla\CMS\Dispatcher\ComponentDispatcher;

// No direct access to this file
\defined('_JEXEC') or die;

/**
 * ComponentDispatcher class for com_jcbtest
 *
 * @since  4.0.0
 */
class Dispatcher extends ComponentDispatcher
{
	/**
	 * Dispatch a controller task. Redirecting the user if appropriate.
	 *
	 * @return  void
	 *
	 * @since   4.0.0
	 */
	public function dispatch()
	{
		parent::dispatch();
	}
}
