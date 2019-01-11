<?php




if(filesize("NEW_WORDS.txt")>0)
{
	$filecontents = file_get_contents('NEW_WORDS.txt');

	$words = preg_split('/[\s]+/', $filecontents, -1, PREG_SPLIT_NO_EMPTY);

	$str=file_get_contents("badwords.bin");
	
	$jsonarr=json_decode(base64_decode($str),true);
	
	for($i=0;$i<count($words);$i++)
	{
		array_push($jsonarr["words"],$words[$i]);
	}
	
	$jsonarr["words"]=array_unique($jsonarr["words"]);
	
	$fp=fopen("badwords.bin","w");
	
	fwrite($fp,base64_encode(json_encode($jsonarr)));
	
	fclose($fp);
	
	$fp=fopen("NEW_WORDS.txt","w");
	
	fwrite($fp,"");
	
	fclose($fp);
	
	$fp=fopen("default.json","w");
	
	fwrite($fp,file_get_contents("badwords.bin"));
	
	fclose($fp);
	
	
	
}

else
{
	exit(1);
}


