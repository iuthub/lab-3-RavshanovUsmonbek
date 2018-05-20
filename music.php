<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="webpage/viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<?php 
		function size_rounder($size)
		{
			$stsize;
			if($size>0 && $size<1024)
			{
				$stsize=strval($size);
				return $stsize."b";
			}
			elseif ($size>=1024 && $size<1048576) {

				$stsize=strval(round($size/1024,2));
				return $stsize."kb";
			}
			elseif ($size>=1048576 ) {
				$stsize=strval(round($size/1048576,2));
				return $stsize."mb";
			}
		}
		?>
		
			<?php if(isset($_REQUEST['playlist'])){ ?>
				<a href="music.php" style="border: 1px solid black; padding:5px ; border-radius: 2px; background-color: lightblue;color:red; "> BACK </a>
				<?php } ?>


		<div id="header">
			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>
		
		
		<div id="listarea">
			<ul id="musiclist">
				<?php
				$size;
				if(!isset($_REQUEST["playlist"]))
			 	{
			 		$songs=glob("webpage/songs/*.mp3");
					$files=glob("webpage/songs/*.txt");
				}
				else {
					$playlist="webpage/songs/".urldecode($_REQUEST["playlist"]);
					$songs=file($playlist);
					$files=NULL;
					for ($i=0; $i < count($songs); $i++) { 
						$songs[$i]="webpage/songs/".$songs[$i];
					}
				}
				for ($i=0; $i < count($songs); $i++) {
				?>
				<li class="mp3item">
					<a href= "<?= $songs[$i] ?>"><?=basename($songs[$i])?></a><?php if($files){echo "("; echo size_rounder(filesize($songs[$i])); echo ")";} ?>
				</li>
				<?php } 
				if(isset($files)){
				foreach ($files as $file) {
				?>
				<li class="playlistitem">
					<a href="<?= $file ?>"><?= basename($file)?></a>
				</li>
				<?php } 
			} ?>
			</ul>
		</div>
	</body>
</html>
