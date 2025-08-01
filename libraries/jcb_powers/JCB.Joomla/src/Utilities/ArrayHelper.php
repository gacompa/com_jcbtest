<?php

/***[JCBGUI.power.licensing_template.13.$$$$]***/
/**
 * @package    Joomla.Component.Builder
 *
 * @created    3rd September, 2020
 * @author     Llewellyn van der Merwe <https://dev.vdm.io>
 * @git        Joomla Component Builder <https://git.vdm.dev/joomla/Component-Builder>
 * @copyright  Copyright (C) 2015 Vast Development Method. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
/***[/JCBGUI$$$$]***/

namespace JCB\Joomla\Utilities;


/**
 * Some array tricks helper
 * 
 * @since  3.0.9
 */
abstract class ArrayHelper
{

/***[JCBGUI.power.main_class_code.13.$$$$]***/
	/**
	 * Check if have an array with a length
	 *
	 * @input	array   The array to check
	 *
	 * @returns int|false  number of items in array on success
	 * 
	 * @since  3.2.0
	 */
	public static function check($array, $removeEmptyString = false)
	{
		if (is_array($array) && ($nr = count((array) $array)) > 0)
		{
			// also make sure the empty strings are removed
			if ($removeEmptyString)
			{
				$array = array_filter($array);

				if ($array === [])
				{
					return false;
				}

				return count($array);
			}

			return $nr;
		}

		return false;
	}

	/**
	 * Merge an array of array's
	 *
	 * @input	array   The arrays you would like to merge
	 *
	 * @returns array|null  merged array on success
	 * 
	 * @since  3.0.9
	 */
	public static function merge($arrays): ?array
	{
		if(self::check($arrays))
		{
			$merged = [];
			foreach ($arrays as $array)
			{
				if (self::check($array))
				{
					$merged = array_merge($merged, $array);
				}
			}
			return $merged;
		}
		return null;
	}

	/**
	 * Check if arrays intersect
	 *
	 * @input	array   The first array
	 * @input	array   The second array
	 *
	 * @returns bool  true if intersect else false
	 * 
	 * @since  3.1.1
	 */
	public static function intersect($a_array, $b_array): bool
	{
		// flip the second array
		$b_array = array_flip($b_array);

		// loop the first array
		foreach ($a_array as $v)
		{
			if (isset($b_array[$v]))
			{
				return true;
			}
		}
		return false;
	}

	/**
	 * Deep clone an array, including nested arrays and objects.
	 *
	 * This method creates a completely independent copy of the given array.
	 * It recursively clones nested arrays and uses PHP's `clone` keyword
	 * to clone any objects found within the structure.
	 *
	 * Note: Resources and closures are not supported and will not be copied.
	 *
	 * @param  array  $array  The array to be deeply cloned.
	 *
	 * @return array A fully cloned, independent copy of the input array.
	 * @since 5.1.1
	 */
	public static function clone(array $array): array
	{
		$copy = [];

		foreach ($array as $key => $value)
		{
			if (is_array($value))
			{
				$copy[$key] = self::clone($value);
			}
			elseif (is_object($value))
			{
				$copy[$key] = clone $value;
			}
			else
			{
				$copy[$key] = $value;
			}
		}

		return $copy;
	}/***[/JCBGUI$$$$]***/

}

