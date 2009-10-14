<?php $pageTitle = "Test Forum: " . $_GET['board']; include("../theme/header.php");

    $groupname = $_GET['group'];
    $boardname = $_GET['board'];
    $directory = getcwd() . "/boards/$groupname/$boardname";
    $directory_handle = @opendir($directory) or die("Error opening $directory");
    echo "<h3><a href=\"/forum/index.php\">Test Forum</a> > $boardname</h3><br><table class=\"board\"><tbody><tr><td>Topic Title</td><td>Replies</td></tr>";
    while ($topic = readdir($directory_handle)) {
        if($topic == "." || $topic == ".." || $topic == "settings") { continue; }
        $postCount = count(glob("$directory/$topic/reply*"))+1;
        echo "<tr><td><a href=\"viewtopic.php?group=$groupname&board=$boardname&topic=$topic\">$topic</a></td><td>$postCount</td></tr>";
    }
    echo "</tbody></table>";
    closedir($directory_handle);

include("../theme/footer.php"); ?>
