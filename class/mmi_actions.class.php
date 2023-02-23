<?php
/**
 * Copyright (C) 2021-2022 Mathieu Moulin <mathieu@iprospective.fr>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

require_once 'mmi_generic.class.php';

class MMI_Actions_1_0 extends MMI_Generic_1_0
{
	/**
	 * @var string Error code (or message)
	 */
	public $error = '';

	/**
	 * @var array Errors
	 */
	public $errors = array();

	/**
	 * @var array Hook results. Propagated to $hookmanager->resArray for later reuse
	 */
	public $results = array();

	/**
	 * @var string String displayed by executeHook() immediately after return
	 */
	public $resprints;

	protected function in_context(&$parameters, $context)
	{
		$contexts = isset($parameters['context']) ?explode(':', $parameters['context']) :[];

		if (is_string($context))
			return $parameters['currentcontext'] === $context || in_array($context, $contexts);
		elseif (is_array($context))
			return in_array($parameters['currentcontext'], $context) || !empty(array_intersect($contexts, $context));
	}
}
