<?php

?>
<!DOCTYPE html>
<html lang="ja">
    <head><title>order</title></head>
    <body>
        <form method="POST" action=<?php $_SERVER['PHP_SELF']?>>
            <input type="text" name="consignor">
            <input type="text" name="address">
            <input type="text" name="size">
            <input type="text" name="weight">

            <input type="submit" name="submit" value="Order">
        </form>
        <!-- mac -> cmd+クリック
             windows -> ctrl+クリック -->
    </body>
</html>