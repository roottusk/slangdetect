<?php
header('Content-Type:application/json');
require("var.php");
error_reporting(0);																	//Turned off for output relevance


////////////////Level 1 Functions///////////////////

function ContainsBadWord($textparam)   							//Returns Boolean in the JSON output
{

	global $defaults;
	$count_bw=0;
	$text = trimproper($textparam);
	$result=false;
	$resultword=array();
	$totalbadwords=count($defaults["words"]);
		
		for($i=0;$i<$totalbadwords;$i++)
		{
			
			$badwordlength=strlen($defaults["words"][$i]);
			$textlength=strlen($text);
			
				for($j=0;$j<($textlength)-1;$j++)
				{
					
					if(strcasecmp(substr($text,$j,$badwordlength),$defaults["words"][$i])==0)
					{
						$result=true;
						$count_bw++;
						
						$resultword[$defaults['words'][$i]]["count"]++;
					}
					else
					{
					//Nothing to do here	
					}
				}
			
		}
		
	$output=array("text"=>$textparam,"result"=>$result,"count"=>$count_bw,"words"=>$resultword);
	
	print json_encode($output,JSON_PRETTY_PRINT);
}



function IsBadWord($text)									//Returns Boolean for the specific word
{

	global $defaults;
	
	$text=trimproper($text);
	$result=false;
	$resultword=array();
	$totalbadwords=count($defaults["words"]);
		
		for($i=0;$i<$totalbadwords;$i++)
		{
			
			$badwordlength=strlen($defaults["words"][$i]);
			$textlength=strlen($text);
			
				for($j=0;$j<($textlength)-1;$j++)
				{
					
					if(strcasecmp(substr($text,$j,$badwordlength),$defaults["words"][$i])==0)
					{
						$result=true;
						break;
					}
					
				}
			
		}
		
	$output=array("word"=>$text,"result"=>$result);
	
print json_encode($output,JSON_PRETTY_PRINT);	
	
}




function StripBadWords($text,$char,$json)							//Replaces BadWord with Default or Provided character $char is optional
{
//TODO																//Pass $json as 1 if json output required
	global $defaults;
	
	if(!isset($char))
		$char='*';
	
	$totalbadwords=count($defaults["words"]);
	
	for($i=0;$i<$totalbadwords;$i++)
		{
			
			$badwordlength=strlen($defaults["words"][$i]);
			$textlength=strlen($text);
			
				for($j=0;$j<($textlength)-1;$j++)
				{
					
					if(strcasecmp(substr($text,$j,$badwordlength),$defaults["words"][$i])==0)
					{
						for($k=$j;$k<($j+$badwordlength);$k++)
						{
							$text[$k]=$char;
						}
						$result=true;
						
					}
					
				}
			
		}
	
$output=array("striptext"=>$text,"result"=>$result);
if($json==1)	
	print json_encode($output,JSON_PRETTY_PRINT);	
else
	return $text;

}


function StripOneWord($text,$word,$char)					//Replaces Specific Badword with Default or Provided character.
{
//TODO
if(!isset($char))
		$char='*';
	
	$result=false;

	if(isset($word))
	{
		//$word=trimproper($word);
	

		$badwordlength=strlen($word);
		$textlength=strlen($text);
		
		for($j=0;$j<($textlength)-1;$j++)
		{
			
			if(strcasecmp(substr($text,$j,$badwordlength),$word)==0)
			{
				for($k=$j;$k<($j+$badwordlength);$k++)
				{
					$text[$k]=$char;
				}
				$result=true;
				
			}
			
		}	
		
	$output=array("striptext"=>$text,"result"=>$result);
	
	print json_encode($output,JSON_PRETTY_PRINT);	

	
	}
	else
	{
		
	$output=array("striptext"=>$text,"result"=>$result);
	
	print json_encode($output,JSON_PRETTY_PRINT);	
	}
}










////////////////Level 0 Functions///////////////////


function replace($string,$char)
{
//TODO
}

function trimproper($text)
{
	$text=str_replace(' ', '', $text);
	$text = str_replace('\n', '', $text);
	return $text;
}
 
