<?php $pageTitle = "Test Forum: " . $_GET['board']; include("../theme/header.php");

    //$groupname = $_GET['group'];
    //$boardname = $_GET['board'];
    //$directory = getcwd() . "/boards/$groupname/$boardname";
    $id = $_GET['id'];
    include("database/b$id");
    $directory_handle = @opendir($boarddir) or die("Error opening $boarddir");
    echo "<h3><a href=\"/forum/index.php\">Test Forum</a> > $boardname</h3><br><table class=\"board\"><tbody><tr><td>Topic Title</td><td>Replies</td></tr>";
    while ($topic = readdir($directory_handle)) {
        if($topic == "." || $topic == ".." || $topic == "settings") { continue; }
        $postCount = count(glob("$boarddir/$topic/reply*"))+1;
        include("$boarddir/$topic/settings/id");
        echo "<tr><td><a href=\"viewtopic.php?id=$id\">$topic</a></td><td>$postCount</td></tr>";
    }
    echo "</tbody></table>";
    closedir($directory_handle);

include("../theme/footer.php"); ?>
