<?php
// 7.8演習問題3
$defaults = array("plus" => "加算",
                    "minus" => "減算",
                    "multi" => "乗算",
                    "divided" => "除算");

function show_form(){
    $select = generate_option($GLOBALS['defaults']);
    print
    "<form method='POST' action=" .$_SERVER['PHP_SELF']. ">
        <input type='text' name='num1'>
        <input type='text' name='num2'>
        <br/>
        計算方法: <select name='calculation'>"
        . $select .
        "</select>
        <br/>
        <input type='submit' name='submit' value='算出'>
    </form>";
}

function generate_option($options){
    $html = "";
    foreach($options as $key => $option){
        $html .= "<option value=" .$key. ">" .
                 $option
                 . "</option>";
    }
    return $html;
}

function plus(){
    return $_POST['num1'] + $_POST['num2'];
}

function minus(){
    return $_POST['num1'] - $_POST['num2'];
}

function multi(){
    return $_POST['num1'] * $_POST['num2'];
}

function divided(){
    return $_POST['num1'] / $_POST['num2'];
}

function validate(){
    $input['num1'] = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    if(is_null($input['num1']) || ($input['num1'] === false)){
        echo "num1 is validated";
        return false;
    }
    $input['num2'] = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    if(is_null($input['num2']) || ($input['num2'] === false)){
        echo "num2 is validated";
        return false;
    }
    if(!array_key_exists(htmlentities($_POST['calculation']), $GLOBALS['defaults'])){
        echo "array_key_exists is validated";
        return false;
    }
    return true;
}

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
    <meta charset="utf-8"/>
    <title>calculation</title>
    </head>
    <body>
        <?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // echo "ncisuvkzle";
            if(validate()){
                $post = htmlentities($_POST['calculation']);
                print $post();
            }
        }else{
            show_form();
        }
        ?>
        <!-- mac -> cmd+クリック
             windows -> ctrl+クリック -->
    </body>
</html>