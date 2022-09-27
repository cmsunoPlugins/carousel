<?php
session_start(); 
if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])!='xmlhttprequest') {sleep(2);exit;} // ajax request
if(!isset($_POST['unox']) || $_POST['unox']!=$_SESSION['unox']) {sleep(2);exit;} // appel depuis uno.php
?>
<?php
include('../../config.php');
include('lang/lang.php');
// ********************* actions *************************************************************************
if (isset($_POST['action']))
	{
	switch ($_POST['action'])
		{
		// ********************************************************************************************
		case 'plugin': ?>
		<div class="blocForm">
			<h2>Carousel</h2>
			<p><?php echo T_("Add one or more images carousels.");?></p>
			<p><?php echo T_("Just insert the code")." <code>[[carousel-3]]</code> ".T_("in the text of your page or directly into the template. This code will be replaced by the corresponding carousel.");?></p>
			<p><?php echo T_("To operate, JQuery must be inserted. See settings (or in the template).");?></p>
			<h3><?php echo T_("ID number :");?></h3>
			<table class="hForm">
				<tr>
					<td><label><?php echo T_("Carousel Number");?></label></td>
					<td>
						<select name="carouselNum" id="carouselNum" onChange="f_load_carousel(0);">
							<option value="0"><?php echo T_("New");?></option>
						</select>
						<div class="bouton" style="margin-left:30px;" id="bSCarousel" onClick="f_supp_carousel();" title="<?php echo T_("Delete carousel");?>"><?php echo T_("Delete");?></div>
					</td>
					<td><em><?php echo T_("Ability to create severals carousels. They are identified by a number.");?></em></td>
				</tr>
			</table>
			<h3><?php echo T_("Parameters :");?></h3>
			<table class="hForm">
				<tr>
					<td><label><?php echo T_("Carousel type");?></label></td>
					<td>
						<select name="carouselTyp" id="carouselTyp" onChange="f_carousel_type();">
							<option value="nivo">Nivo Slider</option>
							<option value="fred">CarouFredSel</option>
							<option value="ken">KenBurning</option>
							<option value="feat">FeatureCarousel</option>
							<option value="zbox">Zoombox</option>
						</select>
					</td>
					<td id="tdCarTyp">
						<span style="font-size:90%;color:#666;" id="emCarNivo">
							<?php echo T_("The 'frame by frame' Slider of reference. Many successful transitions.");?>
						</span>
						<span style="display:none;font-size:90%;color:#666;" id="emCarFred">
							<?php echo T_("A multi-image carousel with many possibilities. Perfect for a logos parade.");?>
						</span>
						<span style="display:none;font-size:90%;color:#666;" id="emCarKen">
							<?php echo T_("A simple slide show using the famous Ken Burns effect.");?>
						</span>
						<span style="display:none;font-size:90%;color:#666;" id="emCarFeat">
							<?php echo T_("A simple and elegant carousel with great 3D rotating effect.");?>
						</span>
						<span style="display:none;font-size:90%;color:#666;" id="emCarZbox">
							<?php echo T_("Display images in a lightbox that floats over your web page.");?>
						</span>
					</td>
				</tr>
				<tr id="trCarW">
					<td><label><?php echo T_("Width");?></label></td>
					<td><input type="text" class="input" name="carouselW" id="carouselW" style="width:50px;" /></td>
					<td><em><?php echo T_("Width of the carousel (px).");?></em></td>
				</tr><tr id="trCarH">
					<td><label><?php echo T_("Height");?></label></td>
					<td><input type="text" class="input" name="carouselH" id="carouselH" style="width:50px;" /></td>
					<td><em><?php echo T_("Carousel Height (px).");?></em></td>
				</tr><tr id="trCarPause">
					<td><label><?php echo T_("Pause");?></label></td>
					<td><input type="text" class="input" name="carouselPause" id="carouselPause" style="width:50px;" /></td>
					<td><em><?php echo T_("Duration of the break on each image (ms).");?></em></td>
				</tr><tr id="trCarSpeed">
					<td><label><?php echo T_("Speed");?></label></td>
					<td><input type="text" class="input" name="carouselSpeed" id="carouselSpeed" style="width:50px;" /></td>
					<td><em><?php echo T_("Duration of the transition between two images (ms).");?></em></td>
				</tr><tr id="trCarNbr">
					<td><label><?php echo T_("Step");?></label></td>
					<td><input type="text" class="input" name="carouselNbr" id="carouselNbr" style="width:50px;" /></td>
					<td><em><?php echo T_("Number of images in each transition.");?></em></td>
				</tr><tr id="trCarOpt">
					<td><label><?php echo T_("Options");?></label></td>
					<td><input type="text" class="input" name="carouselOpt" id="carouselOpt" style="width:240px;" /></td>
					<td><em><?php echo T_("Other Javascript options for this slider (see doc).");?></em></td>
				</tr><tr id="trCarRandStart">
					<td><label><?php echo T_("Random First");?></label></td>
					<td><input type="checkbox" class="input"  name="carouselRandStart" id="carouselRandStart" /></td>
					<td><em><?php echo T_("The first image that appears is random.");?></em></td>
				</tr><tr id="trCarTransition">
					<td><label><?php echo T_("Transition");?></label></td>
					<td>
						<select name="carouselTransition" id="carouselTransition" />
							<option value="sliceDown">sliceDown</option>
							<option value="sliceDownLeft">sliceDownLeft</option>
							<option value="sliceUp">sliceUp</option>
							<option value="sliceUpLeft">sliceUpLeft</option>
							<option value="sliceUpDown">sliceUpDown</option>
							<option value="sliceUpDownLeft">sliceUpDownLeft</option>
							<option value="fold">fold</option>
							<option value="fade">fade</option>
							<option value="random">random</option>
							<option value="slideInRight">slideInRight</option>
							<option value="slideInLeft">slideInLeft</option>
							<option value="boxRandom">boxRandom</option>
							<option value="boxRain">boxRain</option>
							<option value="boxRainReverse">boxRainReverse</option>
							<option value="boxRainGrow">boxRainGrow</option>
							<option value="boxRainGrowReverse">boxRainGrowReverse</option>
						</select>
					</td>
					<td><em><?php echo T_("Type of transition between images.");?></em></td>
				</tr>
			</table>
			<h3><?php echo T_("Add a picture :");?></h3>
			<table class="hForm">
				<tr>
					<td><label><?php echo T_("Image");?></label></td>
					<td>
						<input type="text" class="input" name="carouselImg" id="carouselImg" value="" />
						<div class="bouton finder" style="margin-left:30px;" id="bFCarousel" onClick="f_finder_select('carouselImg')" title="<?php echo T_("File manager");?>"><img src="<?php echo $_POST['udep']; ?>includes/img/finder.png" /></div>
					</td>
					<td><div class="bouton fr" onClick="f_carousel_add(document.getElementById('carouselImg').value,'')" title="<?php echo T_("Add this image");?>"><?php echo T_("Add");?></div></td>
				</tr>
			</table>
			<h3><?php echo T_("Selection :");?></h3>
			<form id="frmCarousel">
				<table id="carouselResult"></table>
			</form>
			<div class="bouton fr" onClick="f_save_carousel();" title="<?php echo T_("Save settings");?>"><?php echo T_("Save");?></div>
			<div class="clear"></div>
		</div>
		<?php break;
		// ********************************************************************************************
		case 'save':
		$q = file_get_contents('../../data/busy.json'); $a = json_decode($q,true); $Ubusy = $a['nom'];
		$a = array();
		if(file_exists('../../data/'.$Ubusy.'/carousel.json'))
			{
			$q = file_get_contents('../../data/'.$Ubusy.'/carousel.json');
			$a = json_decode($q,true);
			}
		$n = $_POST['car'];
		if($n==0) // nouveau carousel
			{
			foreach($a as $k=>$v)
				{
				if($k>$n) $n = $k; // max
				}
			++$n; // valeur max +1
			for($v=1;$v<$n;++$v)
				{
				if(!isset($a[$v])) {$n = $v; break;} // valeur plus petite libre
				}
			}
		$a[$n]['typ'] = $_POST['typ'];
		$a[$n]['wid'] = preg_replace("/[^0-9]/","",$_POST['wid']);
		$a[$n]['hei'] = preg_replace("/[^0-9]/","",$_POST['hei']);
		$a[$n]['pau'] = preg_replace("/[^0-9]/","",$_POST['pau']);
		$a[$n]['spe'] = preg_replace("/[^0-9]/","",$_POST['spe']);
		$a[$n]['nbr'] = preg_replace("/[^0-9]/","",$_POST['nbr']);
		if(!empty($_POST['opt'])) $a[$n]['opt'] = $_POST['opt'];
		$a[$n]['tra'] = $_POST['tra'];
		if ($_POST['rst']=="true") $a[$n]['rst']=1; else $a[$n]['rst']=0;
		if($_POST['nb'])
			{
			unset($a[$n]['img']);
			for ($v=0;$v<$_POST['nb'];++$v)
				{
				$a[$n]['img'][$v]['s'] = $_POST['img'.$v];
				$a[$n]['img'][$v]['t'] = str_replace('"',"'",$_POST['text'.$v]);
				}
			}
		else unset($a[$n]);
		$out = json_encode($a);
		if (file_put_contents('../../data/'.$Ubusy.'/carousel.json', $out)) echo T_('Backup performed : carousel-').$n;
		else echo '!'.T_('Impossible backup');
		break;
		// ********************************************************************************************
		case 'supp':
		$q = file_get_contents('../../data/busy.json'); $a = json_decode($q,true); $Ubusy = $a['nom'];
		$q = file_get_contents('../../data/'.$Ubusy.'/carousel.json');
		$a = json_decode($q,true);
		if(isset($_POST['s']) && isset($a[$_POST['s']]))
			{
			unset($a[$_POST['s']]);
			$out = json_encode($a);
			if (file_put_contents('../../data/'.$Ubusy.'/carousel.json', $out)) echo T_('Deletion made');
			else echo '!'.T_('Impossible deletion');
			}
		else echo '!'.T_('Error');
		break;
		// ********************************************************************************************
		}
	clearstatcache();
	exit;
	}
	
// slidesjs : Adapté écran tactile (déplacement images)
// caroufredsel : défilé de marque
?>
