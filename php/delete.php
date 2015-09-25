<?php 
	session_start();
	include_once("connect.php");

	$id = $_POST['id'];
	$name = $_POST['name'];
	$descr = $_POST['descr'];
	$p_id = $_POST['p_id'];

	function getObjects() {
    $query = mysql_query("SELECT * FROM `objects`");
    $result = array();
    while ($row = mysql_fetch_array($query)) {
        $result[$row["parent_id"]][] = $row;
    }
    return $result;
	}
 
//В переменную $category_arr записываем все категории
$objects_arr = getObjects();
$sql = "DELETE FROM objects
	WHERE id in (".$id;
/**
 * Вывод дерева
 * $parent_id - id-родителя
 * $level - уровень вложености
 */
function outTree($parent_id) {
    global $objects_arr; //Делаем переменную $objects_arr видимой в функции
    global $sql;

    if (isset($objects_arr[$parent_id])) { //Если объект с таким parent_id существует
        foreach ($objects_arr[$parent_id] as $value) { //Обходим
            
           
           $sql .= ", ".$value["id"];
            
            //Рекурсивно вызываем эту же функцию, но с новым $parent_id
            outTree($value["id"]);
            
        }
    }
}
 
outTree($id);
 
	$sql .= ");";
    
    $res = mysql_query($sql) or die(mysql_error());
	

?>