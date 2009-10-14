<?php $pageTitle = "Test Forum: " . $_GET['topic']; include("../theme/header.php");

    //$groupname = $_GET['group'];
    //$boardname = $_GET['board'];
    //$topicname = $_GET['topic'];
    $id = $_GET['id'];
    include("database/t$id");
    //$directory = getcwd() . "/boards/$groupname/$boardname/$topicname";
    $postCount = count(glob("$topicdir/reply*"))+1;
    $directory_handle = @opendir($topicdir) or die("Error opening $topicdir");
    $a = 0;
    echo "<table class=\"post\" style=\"width:750px; max-width:750px;\"><thead><tr><td><h3><a href=\"/forum/index.php\">Test Forum</a> > <a href=\"/forum/viewboard.php?id=$boardid\">$boardname</a> > $topicname</h3></td><td align=\"right\"><h3><a href=\"postreply.php?group=$groupname&board=$boardname&topic=$topicname\">Post reply</a></h3></td></tr></thead><tbody>";
    while ($a != $postCount) {
        if($a == 0) {
            //$post = file("$directory/topic");
            include("$topicdir/topic");
        } else {
            //$post = file("$directory/reply$a");
            include("$topicdir/reply$a");
        }
        echo "<tr><td class=\"postAuthor\">".$author."</td><td class=\"postDate\" align=\"right\" nowrap>".date('h:i:s M d Y',$date)."</td></tr><tr><td class=\"postMessage\" colspan=\"2\">".$message."</td></tr>";
        $a++;
    }
    echo "</tbody></table>";
    closedir($directory_handle);

include("../theme/footer.php"); ?>
