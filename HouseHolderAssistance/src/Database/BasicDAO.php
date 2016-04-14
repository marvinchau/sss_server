<?php

namespace Database;

use Database\DBHandler\SDMDBH;
use Database\DBHandler\SDMDBParameters;
use Database\DBHandler\SDMDBHandler;
use Database\DBHandler\DBConfigFactory;
abstract class BasicDAO
{
	protected $handler;

	public function __construct($selectedHandler =
			DBConfigFactory::PRIMARY)
	{
		$this->handler = SDMDBH::getInstance($selectedHandler);
	}

	public static function addDateParam(SDMDBParameters $param, $date)
	{
		if($date == null || $date == "")
		{
			$param->add($date);
		}
		else
		{
			$param->add($date->format(DATE_FORMAT));
		}
	}
}