<?php

namespace Models\File;

class FileManager
{
	
	public function createFile($filename, $mode = 0711)
	{
		if($this->isFile($filename))
		{
			throw new FileException(FileErrorFactory::ERR_FILE_WRITE_FAIL, "create file fail :" . $file . ". file is exist");
		}
		
		$fs = fopen($filename, "w+");
		if(!$fs)
		{
			throw new FileException(FileErrorFactory::ERR_FILE_WRITE_FAIL, "File open failed");
		}
		fclose($fs);
		chmod($filename, $mode);
	}
	
	public function fileWrite($filename, $text, $append = true)
	{
		if(!$this->isFile($filename))
		{
			throw new FileException(FileErrorFactory::ERR_FILE_WRITE_FAIL, "open file fail :" . $file . ". file is exist");
		}
	
		$mode = "a";
		if(!$append)
		{
			$mode = "w";	
		}
		$fs = fopen($filename, $mode);
		fwrite($fs, $text);
// 		if($append)
// 		{
			fwrite($fs, "\n");
// 		}
		if(!$fs)
		{
			throw new FileException(FileErrorFactory::ERR_FILE_WRITE_FAIL, "File open failed");
		}
		fclose($fs);		
	}
	
	public function fileRead($filename)
	{
		if(!$this->isFile($filename))
		{
			throw new FileException(FileErrorFactory::ERR_FILE_READ_FAIL, "open file fail :" . $file . ". file is exist");
		}
		
		$fs = fopen($filename, "r");
		$content = "";
		if($fs)
		{
			while(!@feof($fs))
			{
				$content .= fread($fs, 1024);
			}
		}
		fclose($fs);
		return $content;
	}

	public function isFile($filename)
	{
		return is_file($filename);
	}
	
	public function copyFile($source, $dest)
	{
		if(!$this->isFile($source))
		{
			throw new FileException(FileErrorFactory::ERR_FILE_COPY_FAIL, "file copy fail : source is not a file");
		}
		
// 		if(!$this->isFile($dest))
// 		{
// 			throw new FileException(FileErrorFactory::ERR_FILE_COPY_FAIL, "file copy fail : destination is not a file");			
// 		}
		
		if(copy($source, $dest))
		{
			return true;
		}else
		{
			throw new FileException(FileErrorFactory::ERR_FILE_COPY_FAIL, "copy file fail");
		}
	}
	
	public function getFileModifyDt($filename)
	{
		if(!$this->isFile($filename))
		{
			throw new FileException(FileErrorFactory::ERR_FILE_READ_FAIL, "check file modify date fail, Invalid file");
		}
		echo date("h:i:s") . " : ". filemtime($filename)."<BR>";
		return filemtime($filename);
	}
	
	public function createDir($path, $mode, $recurisive)
	{
		if(!$this->isDir($path)){	
			return mkdir($path, $mode, $recurisive);
		}else
		{
			return true;
		}
	}
	
	public function isDir($path)
	{
		return is_dir($path);
	}
}