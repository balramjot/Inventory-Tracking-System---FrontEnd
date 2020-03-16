<?php
header('Content-type: text/xml');                               // defining xml formatr in header
echo '<myInventory>';
foreach($myinventorys as $myinventory)
{
    echo '<info>';
        echo '<partNumber>';echo $myinventory->getTransactionID();echo '</partNumber>';
        echo '<partName>';echo $myinventory->getUserID();echo '</partName>';
        echo '<quantityOut>';echo $myinventory->getQuantity();echo '</quantityOut>';
        echo '<withdrawDate>';echo $myinventory->getDateTime();echo '</withdrawDate>';
    echo '</info>';
}

echo '</myInventory>';
?>