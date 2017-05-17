<?php
$abec=array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","ñ","o","p","q","r","s","t","u","v","w","y","x",","," ",".");
$sigs=array("¥","±","α","≥","Ↄ","₽","Ʒ","Ǭ","Ǿ","Ȳ","ᶑ","ὤ","€","ᴱ","ᴻ","ᴂ","¥","₽","£","↑","℗","₮","₯","₱","₲","₴","¬","↘","-");
	function hashis($c)
				{
					$comp=true;
					do
					{
						$h=$c;
						$c=mino($c);
						if(strlen($c)<11)
						{
							$comp=false;
						}
						else
							$h=$c >> 2;
					}while($comp);
					return $c;
				}
	function cifsim($cad)
		{
			$ncad=strlen($cad);
			$comp='';
			for($a=-1;$a>=-$ncad;$a--)
			{
				$ult=substr($cad,$a,1);
				$comp=$comp.$ult;
			}
			return $comp."";
		}
	function modulo($a,$b)
	{
		if($b==0)
			$c="no puedes ingresar 0 en el segundo campo";
		else
			if ($a>0)
				$c=$a%$b;	
			else
				if($b>0)
				{
					$d=$a/$b;
					$d=ceil($d);
					$d--;
					$c=$a-($b*$d);
				}
				else
				{
					$d=$a/$b;
					$d=ceil($d);
					$c=$a-$b*$d;
				}
		return $c;
	}
	function playfair($cade,$frac)
	{
		$cont=strlen($cade);
		$div=$cont/$frac;
		$div=intval($div);
		$ope=$cont%$frac;
		$sub='';
		$str='';
		$num=0;
		$div=($ope>0)?$div+1:$div;
		for($c=0;$c<$frac;$c++)
		{
			for($a=0;$a<$div;$a++)
			{
				$num=($a*$frac)+$c;
				$con=-1*(($cont-$num)-1);
				if($con!=0)
					$sub=substr($cade,$num,$con);
				else
					$sub=substr($cade,$num);
				$str=$str.$sub;
			}
		}
		return $str;
	}
	function strToBin($input)
  	{
	    if (!is_string($input))
	      return false;
	    $value = unpack('H*', $input);
	    return bindec(base_convert($value[1], 16, 2));
 	}
	function revord($cad)
	{
		$ncad=strlen($cad);
		$comp='';
		for($a=-1;$a>=-$ncad;$a--)
		{
			$ult=substr($cad,$a,1);
			$comp=$comp.$ult;
		}
		return $comp;
	}
	function tobin($num)
	{
		if($num==1||$num==0)
		{
			$sumres=$num;
		}
		else
		{
			$dividendo=$num;
			$sumres="";
			$i=true;
			do
			{ 
				if($dividendo!=3&&$dividendo!=2)
				{
					$cos=intval($dividendo/2);
					$res=$dividendo%2;
					$sumres=$sumres.$res;
					$dividendo=$cos;
				}
				else
				{
					$i=false;
					$res=$dividendo%2;
					$sumres=$sumres.$res;
					$res=intval($dividendo/2);
					$sumres=$sumres.$res;
				}
			}while($i);
			$sumres=revord($sumres);
		}
		return $sumres;
	}
	function cambiar($cad)
	{
		$cad=strToBin($cad);
		$ncad=strlen($cad);
		$conreg=-$ncad+1;
		$comp='';
		for($a=0;$a<$ncad-1;$a++)
		{
			$sel=tobin(substr($cad,$a,$conreg));
			$comp=$comp.$sel;
			$conreg++;
		}
		$sela=tobin(substr($cad,$a));
		$comp=$comp.$sela;
		return $comp;
	}
	function revert($cad,$loni,$lonf)
	{
		$comp='';
		for($a=$loni;$a<$lonf;$a++)
		{
			$ult=substr($cad,$a,1);
			$comp=$comp.$ult;
		}
		return $comp."";
	}
	function minoxi($cad)
	{
		$cale=strlen($cad);
		$cale=(($cale%2)==1)?$cale-1:$cale;
		$a=revert($cad,0,$cale/2);
		$b=revert($cad,($cale/2),$cale);
		if(strlen($a)==strlen($b))
			$c=fxor($a,$b);
		else
			echo "distinta longitud";
		return $c;
	}
	function fxor($a,$b)
	{
		$cad1=$a;
		$cad2=$b;
		$ncad=strlen($cad1);
		$conreg=-$ncad+1;
		$comp='';
		$sel='';
		for($a=0;$a<$ncad-1;$a++)
		{
			$sel1=substr($cad1,$a,$conreg);
			$sel2=substr($cad2,$a,$conreg);
			$sel=opexor($sel1,$sel2);
			$comp=$comp.$sel;
			$conreg++;
		}
		$sela1=substr($cad1,$a);
		$sela2=substr($cad2,$a);
		$sela=opexor($sela1,$sela2);
		$comp=$comp.$sela;
		return $comp;
	}
	function opexor($a,$b)
	{
		if($a==$b)
			$c=0;
		if($a!=$b)
			$c=1;
		return $c;
	}
	function mino($cad)
	{
		$cale=strlen($cad);
		$cale=(($cale%2)==1)?$cale-1:$cale;
		$a=revert($cad,0,$cale/2);
		$b=revert($cad,($cale/2),$cale);
		if(strlen($a)==strlen($b))
			$c=fxor($a,$b);
		else
			echo "distinta longitud";
		return $c;
	}

?>