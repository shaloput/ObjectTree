<?php

session_start();
include_once("connect.php");
                
function getObjects() {
    $sql = mysql_query("SELECT id, name, parent_id FROM objects");
    $res = array();
    while ($row = mysql_fetch_array($sql)) {
        $res[$row["parent_id"]][] = $row;
    }
    return $res;
}


//В переменную $objects_arr записываем все объекты
$objects_arr = getObjects();

function OutTree($parent_id, $lvl) {
    global $objects_arr; //Делаем переменную $objects_arr видимой в функции
    
    $exp = "expand";
    $aj_func = "javascript:show_descr(this);";
    //$edit = "<a class='edit'>
    if (isset($_SESSION['uid'])) {
        $show = "";
        $exp = "collapse";
        $aj_func = "javascript:edit_object(this);";

    } elseif ($parent_id == 0) {
        $show = "";
    } else {
        $show = " class=\"collapsed\"";
    }

    if (isset($objects_arr[$parent_id])) { //Если объект с таким parent_id существует
        
        echo("<ul ".$show.">\n");

        foreach ($objects_arr[$parent_id] as $value) { //Обходим
            
            $id = $value["id"];

            echo("<li>\n");
            echo("<a href='#!' onclick=".$aj_func." id=".$id.">"." ".$value["name"]."</a>"."  \n");
            
        if (isset($objects_arr[$id])) {
            echo ("<a class='pin ".$exp."' href='#!' OnClick='hide_sibls(this)'></a> \n");
        }

            OutTree($id, $lvl); 
            $lvl--;
        }

        
        echo("</ul>\n");
    }
}
 
outTree(0, 0);
 
?>