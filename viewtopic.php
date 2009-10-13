<?php $pageTitle = "Test Forum: " . $_GET['topic']; include("../theme/header.php");

	$groupname = $_GET['group'];
	$boardname = $_GET['board'];
	$topicname = $_GET['topic'];
	$directory = getcwd() . "/boards/$groupname/$boardname/$topicname";
	$postCount = count(glob("$directory/$topic/reply*"))+1;
	$directory_handle = @opendir($directory) or die("Error opening $directory");
	echo "<h3><a href=\"/forum/index.php\">Test Forum</a> > <a href=\"/forum/viewboard.php?group=$groupname&board=$boardname\">$boardname</a> > $topicname</h3>";
	$a = 0;
	echo "<table class=\"post\" style=\"width:750px; max-width:750px;\"><tbody>";
	while ($a != $postCount) {
		if($a == 0) {
			$post = file("$directory/topic");
		} else {
			$post = file("$directory/reply$a");
		}
		echo "<tr><td class=\"postAuthor\">".$post['1']."</td><td class=\"postDate\" align=\"right\" nowrap>".date('h:i:s M d Y',$post['2'])."</td></tr><tr><td class=\"postMessage\" colspan=\"2\">".$post['0']."</td></tr>";
		$a++;
	}
	echo "</tbody></table>";
	closedir($directory_handle);

include("../theme/footer.php"); ?>
