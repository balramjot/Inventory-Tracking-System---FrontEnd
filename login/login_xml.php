<?php
header('Content-type: text/xml');                               // defining xml formatr in header
echo '<user>';
    echo '<user_id>';echo $logininfo["id"];echo '</user_id>';
    echo '<firstName>';echo $logininfo["first_name"];echo '</firstName>';
    echo '<lastName>';echo $logininfo["last_name"];echo '</lastName>';
    echo '<email>';echo $logininfo["email"];echo '</email>';
echo '</user>';
?>