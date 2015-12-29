<?php

namespace Models\XML;

class XMLReader
{
	
	private $parser;
	
	public function __construct(XMLParser $parser)
	{
		$this->parser = $parser;
	}
	
	public function parse($filename)
	{
		$content = utf8_encode(file_get_contents($filename));
		$xml = simplexml_load_string($content);
// 		$xml = simplexml_load_file($filename);
		
		if(!$xml)
		{
			throw new XMLException(XMLErrorFactory::ERR_XML_NOT_FOUND, "filename : ".$filename . "file not found");
		}
		
		try{
			return $this->parser->parse($xml);
		}catch(XMLException $e)
		{
			throw $e;
		}
	}
	
	public static function getAttributeByName($element, $attr)
	{
		if(isset($element[$attr]))
		{
			return $element[$attr];
		}else
		{
			throw new XMLException(XMLErrorFactory::ERR_XML_ATTR_NOT_FOUND, "attribute :".$attr);
		}
	}
	
	public static function getChildByName($element, $childname)
	{
		if(isset($element->$childname))
		{
			return $element->$childname;
		}else
		{
			throw new XMLException(XMLErrorFactory::ERR_XML_CHILD_NOT_FOUND, "child :".$childname);
		}		
	}
}