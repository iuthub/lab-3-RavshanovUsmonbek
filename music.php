<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="webpage/viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>
		
		
		<div id="listarea">
			<ul id="musiclist">
				<?php
				if(!isset($_REQUEST["playlist"]))
			 	{
			 		$songs=glob("webpage/songs/*.mp3");
					$files=glob("webpage/songs/*.txt");
				}
				else {
					$playlist="webpage/songs/".urldecode($_REQUEST["playlist"]);
					$songs=file($playlist);
					for ($i=0; $i < count($songs); $i++) { 
						$songs[$i]="webpage/songs/".$songs[$i];
					}
					$files=NULL;
				}
				foreach ( $songs as $song) {
				?>
				<li class="mp3item">
					<a href= "<?= $song ?>"><?=basename($song)?></a>
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