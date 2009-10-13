<?php $pageTitle = "Test Forum"; include("../theme/header.php");

	$directory = getcwd() . "/boards";
	$directory_handle = @opendir($directory) or die("Error opening $directory");
	echo "<h3>Test Forum</h3><br>";
	while ($group = readdir($directory_handle)) {
		if($group == "." || $group == "..") { continue; }
		echo "<table class=\"group\">";
		echo "<thead><tr><td class=\"groupTitle\" colspan=\"2\">$group</td></tr></thead><tbody><tr><td class=\"groupBoardName\">Board name</td><td class=\"groupTopicCount\">Topics</td></tr>";
		$boarddir = getcwd() . "/boards/$group";
		$boarddir_handle = @opendir($boarddir) or die("Error opening $directory");
		while ($board = readdir($boarddir_handle)) {
			if($board == "." || $board == "..") { continue; }
			$topicCount = count(glob("$boarddir/$board/*"))-1;
			echo "<tr><td width=\"100px\"><a href=\"viewboard.php?group=$group&board=$board\">$board</a></td><td>$topicCount</td></tr>";
		}
		echo "</tbody></table>";
	}
	closedir($directory_handle);

include("../theme/footer.php"); ?>
