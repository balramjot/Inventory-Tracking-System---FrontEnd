<?php
header('Content-type: text/xml');                               // defining xml formatr in header
echo '<Inventory>';
foreach($allparts as $allpart)
{
    echo '<info>';
        echo '<partID>';echo $allpart->getID();echo '</partID>';
        echo '<partNo>';echo $allpart->getPartNo();echo '</partNo>';
        echo '<categoryName>';echo $allpart->getCategoryID();echo '</categoryName>';
        echo '<partName>';echo $allpart->getPartName();echo '</partName>';
        echo '<quantity>';echo $allpart->getQuantity();echo '</quantity>';
        echo '<image>';echo $allpart->getImageName();echo '</image>';
        echo '<addedON>';echo $allpart->getDateTime();echo '</addedON>';
        echo '<description>';echo $allpart->getDescription();echo '</description>';
    echo '</info>';
}

echo '</Inventory>';

?>