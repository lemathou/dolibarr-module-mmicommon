<?php

class mmi_common
{
	/**
	 * Convert a phone number to international format
	 * @param string $value
	 * @param string $prefix
	 * @return string
	 */
	public static function tel_international($value, $prefix='') {
		if (empty($prefix))
			$prefix = getDolGlobalString('MAIN_MAIL_SMS_INTL_PREFIX_DEFAULT');
		$value = str_replace([' ', '.', '-'], ['', '', ''], $value);
		if (substr($value, 0, 2)=='00')
			$value = '+'.substr($value, 2);
		if (substr($value, 0, 1)=='0')
			$value = $prefix.substr($value, 1);
		return $value;
	}
}