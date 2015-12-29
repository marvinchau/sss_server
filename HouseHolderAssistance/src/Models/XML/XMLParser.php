<?php

namespace Models\XML;

interface XMLParser
{
	public function parse(\SimpleXMLElement$xmlDoc);
}