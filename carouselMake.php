<?php
if (!isset($_SESSION['cmsuno'])) exit();
?>
<?php
if(file_exists('data/'.$Ubusy.'/carousel.json'))
	{
	$q1 = file_get_contents('data/'.$Ubusy.'/carousel.json');
	$a1 = json_decode($q1,true);
	$nivo=0; $fred=0; $ken=0; $feat=0; $zbox=0;
	foreach($a1 as $n=>$a2)
		{
		// ******** NIVO **********************
		if($a2['typ']=='nivo' && strpos($Ucontent.$Uhtml,'[[carousel-'.$n.']]')!==false)
			{
			$o1 = "\r\n".'<div class="carouselWrap">'."\r\n\t".'<div id="carousel'.$n.'" class="nivoSlider" style="height:'.$a2['hei'].'px;width:'.$a2['wid'].'px;overflow:hidden;">'."\r\n";
			for($w=0;$w<count($a2['img']);++$w)
				{
				$o1 .= "\t\t".'<img src="'.$a2['img'][$w]['s'].'" data-thumb="'.$a2['img'][$w]['s'].'" alt="'.$a2['img'][$w]['t'].'" title="'.$a2['img'][$w]['t'].'" />'."\r\n";
				}
			$o1 .= "\t".'</div>'."\r\n".'</div>'."\r\n";
			$Ucontent = str_replace('[[carousel-'.$n.']]',$o1,$Ucontent); // editor
			$Uhtml = str_replace('[[carousel-'.$n.']]',$o1,$Uhtml); // template
			if(!$nivo)
				{
				$Uhead .= '<link rel="stylesheet" href="uno/plugins/carousel/nivoSlider/nivo-slider.css" type="text/css" />'."\r\n";
				$Ufoot .= '<script type="text/javascript" src="uno/plugins/carousel/nivoSlider/jquery.nivo.slider.pack.js"></script>'."\r\n";
				$nivo = 1;
				}
			$Ufoot .= '<script type="text/javascript">jQuery(window).load(function(){$("#carousel'.$n.'").nivoSlider({';
			$Ufoot .= 'pauseTime:'.(($a2['pau'])?$a2['pau']:3500);
			$Ufoot .= ',animSpeed:'.(($a2['spe'])?$a2['spe']:700);
			$Ufoot .= ',effect:"'.(($a2['tra'])?$a2['tra']:'fade').'"';
			$Ufoot .= ',randomStart:"'.(($a2['rst'])?'true':'false').'"';
			$Ufoot .= ',controlNav:false';
			$Ufoot .= ',prevText:"<"';
			$Ufoot .= ',nextText:">"';
			if(!empty($a2['opt'])) $Ufoot .= ','.$a2['opt'];
			$Ufoot .= '});});</script>'."\r\n";
			}
		// ******** CAROUFRED *****************
		else if($a2['typ']=='fred' && strpos($Ucontent.$Uhtml,'[[carousel-'.$n.']]')!==false)
			{
			$o1 = "\r\n".'<div class="carouselWrap">'."\r\n\t".'<div id="carousel'.$n.'" style="height:'.$a2['hei'].'px;width:'.$a2['wid'].'px;overflow:hidden;">'."\r\n";
			for($w=0;$w<count($a2['img']);++$w)
				{
				$o1 .= "\t\t".'<img src="'.$a2['img'][$w]['s'].'" style="height:'.$a2['hei'].'px;margin:0 7px;" alt="'.$a2['img'][$w]['t'].'" title="'.$a2['img'][$w]['t'].'" />'."\r\n";
				}
			$o1 .= "\t".'</div>'."\r\n".'</div>'."\r\n";
			$Ucontent = str_replace('[[carousel-'.$n.']]',$o1,$Ucontent); // editor
			$Uhtml = str_replace('[[carousel-'.$n.']]',$o1,$Uhtml); // template
			if(!$fred)
				{
				$Ufoot .= '<script type="text/javascript" src="uno/plugins/carousel/carouFredSel/jquery.carouFredSel-6.2.1-packed.js"></script>'."\r\n";
				$fred = 1;
				}
			$Ufoot .= '<script type="text/javascript">jQuery(window).load(function(){$("#carousel'.$n.'").carouFredSel({';
			$Ufoot .= 'auto:'.(($a2['pau'])?$a2['pau']:3500);
			$Ufoot .= ',width:'.(($a2['wid'])?$a2['wid']:'"100%"');
			$Ufoot .= ',height:'.(($a2['hei'])?$a2['hei']:'"auto"');
			$Ufoot .= ',scroll:{';
				$Ufoot .= 'duration:'.(($a2['spe'])?$a2['spe']:700);
				$Ufoot .= ',items:'.(!empty($a2['nbr'])?$a2['nbr']:0).',fx:"scroll",pauseOnHover:true';
			$Ufoot .= '}';
			$Ufoot .= ',items:{';
				$Ufoot .= 'start:'.(($a2['rst'])?'"random"':0);
				$Ufoot .= ',visible:"variable"';
				$Ufoot .= ',width:"variable"';
			$Ufoot .= '}';
			if(!empty($a2['opt'])) $Ufoot .= ','.$a2['opt'];
			$Ufoot .= '});});</script>'."\r\n";
			}
		// ******** KEN BURNING *****************
		else if($a2['typ']=='ken' && strpos($Ucontent.$Uhtml,'[[carousel-'.$n.']]')!==false)
			{
			$o1 = "\r\n".'<div class="carouselWrap">'."\r\n\t".'<div id="carousel'.$n.'" style="height:'.$a2['hei'].'px;width:'.$a2['wid'].'px;overflow:hidden;">'."\r\n";
			for($w=0;$w<count($a2['img']);++$w)
				{
				$o1 .= "\t\t".'<img src="'.$a2['img'][$w]['s'].'" alt="'.$a2['img'][$w]['t'].'" title="'.$a2['img'][$w]['t'].'" />'."\r\n";
				}
			$o1 .= "\t".'</div>'."\r\n".'</div>'."\r\n";
			$Ucontent = str_replace('[[carousel-'.$n.']]',$o1,$Ucontent); // editor
			$Uhtml = str_replace('[[carousel-'.$n.']]',$o1,$Uhtml); // template
			if(!$ken)
				{
				$Uhead .= '<link rel="stylesheet" href="uno/plugins/carousel/kenburning/kenburning.css" type="text/css" />'."\r\n";
				$Ufoot .= '<script type="text/javascript" src="uno/plugins/carousel/kenburning/kenburning.js"></script>'."\r\n";
				$ken= 1;
				}
			$Ufoot .= '<script type="text/javascript">$("#carousel'.$n.'").kenBurning({';
			$Ufoot .= 'zoom:1.25, ';
			$Ufoot .= 'time:'.(($a2['pau'])?$a2['pau']:6000);
			if(!empty($a2['opt'])) $Ufoot .= ','.$a2['opt'];
			$Ufoot .= '});</script>'."\r\n";
			}
		// ******** FEATURE CAROUSEL *****************
		else if($a2['typ']=='feat' && strpos($Ucontent.$Uhtml,'[[carousel-'.$n.']]')!==false)
			{
			$o1 = "\r\n".'<div class="carouselWrap" >'."\r\n\t";
			$o1 .= '<div id="carousel'.$n.'" style="position:relative;height:'.(($a2['hei'])?$a2['hei'].'px':'auto').';margin:-10px 0 30px 0;">'."\r\n";
			for($w=0;$w<count($a2['img']);++$w)
				{
				$o1 .= "\t\t".'<div class="carousel-feature">'."\r\n";
				$o1 .= "\t\t\t".'<a href="#"><img class="carousel-image" src="'.$a2['img'][$w]['s'].'" alt="'.$a2['img'][$w]['t'].'" title="'.$a2['img'][$w]['t'].'" style="max-height:'.(($a2['hei'])?$a2['hei'].'px':'auto').';" /></a>'."\r\n";
				$o1 .= "\t\t\t".'<div class="carousel-caption"><p>'.$a2['img'][$w]['t'].'</p></div>'."\r\n";
				$o1 .= "\t\t".'</div>'."\r\n";
				}
			$o1 .= "\t".'</div>'."\r\n".'</div>'."\r\n";
			$Ucontent = str_replace('[[carousel-'.$n.']]',$o1,$Ucontent); // editor
			$Uhtml = str_replace('[[carousel-'.$n.']]',$o1,$Uhtml); // template
			if(!$feat)
				{
				$Uhead .= '<link rel="stylesheet" href="uno/plugins/carousel/featureCarousel/feature-carousel.css" type="text/css" />'."\r\n";
				$Ufoot .= '<script type="text/javascript" src="uno/plugins/carousel/featureCarousel/jquery.featureCarousel.min.js"></script>'."\r\n";
				$feat= 1;
				}
			$Ufoot .= '<script type="text/javascript">jQuery(window).load(function(){$("#carousel'.$n.'").featureCarousel({';
			$Ufoot .= 'carouselSpeed:'.(($a2['spe'])?$a2['spe']:1000).', ';
			$Ufoot .= 'autoPlay:'.(($a2['pau'])?$a2['pau']:4000).', ';
			$Ufoot .= 'pauseOnHover:true, ';
			$Ufoot .= 'trackerIndividual:false, ';
			$Ufoot .= 'trackerSummation:false';
			if(!empty($a2['opt'])) $Ufoot .= ', '.$a2['opt'];
			$Ufoot .= '});});</script>'."\r\n";
			}
		// ******** ZOOMBOX *****************
		else if($a2['typ']=='zbox' && strpos($Ucontent.$Uhtml,'[[carousel-'.$n.']]')!==false)
			{
			$o1 = "\r\n".'<div class="carouselWrap" >'."\r\n\t";
			$o1 .= '<div id="carousel'.$n.'" style="position:relative;">'."\r\n";
			for($w=0;$w<count($a2['img']);++$w)
				{
				$o1 .= "\t\t".'<a class="zoombox zgallery'.$n.'" href="'.$a2['img'][$w]['s'].'" title="'.$a2['img'][$w]['t'].'"><img src="'.$a2['img'][$w]['s'].'" style="height:'.(($a2['hei'])?$a2['hei']:'80').'px;width:auto;" class="bordered" alt="'.$a2['img'][$w]['t'].'" /></a>'."\r\n";
				}
			$o1 .= "\t".'</div>'."\r\n".'</div>'."\r\n";
			$Ucontent = str_replace('[[carousel-'.$n.']]',$o1,$Ucontent); // editor
			$Uhtml = str_replace('[[carousel-'.$n.']]',$o1,$Uhtml); // template
			if(!$zbox)
				{
				$Uhead .= '<link rel="stylesheet" href="uno/plugins/carousel/zoombox/zoombox.min.css" type="text/css" />'."\r\n";
				$Ufoot .= '<script type="text/javascript" src="uno/plugins/carousel/zoombox/zoombox.min.js"></script>'."\r\n";
				$zbox= 1;
				}
			$Ufoot .= '<script type="text/javascript">jQuery(function($){$("a.zoombox").zoombox(';
			if(!empty($a2['opt'])) $Ufoot .= '{'.$a2['opt'].'}';
			$Ufoot .= ');});</script>'."\r\n";
			}
		// ****************************************
		}
	}
?>
