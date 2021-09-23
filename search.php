<?php
include 'initmain.php';

if (isset($_POST["query"])){
    $search_query = preg_replace('#[^a-z 0-9]#i','',$_POST["query"]);
    $search_array = explode(" ",$search_query);
    $replace_array = array_map('wrap_tag',$search_array);
    $condition = '';
    foreach ($search_array as $search){
        if (trim($search) != ''){
            $condition .= "Name LIKE '%".$search."%' OR";
        }
    }
    $condition = substr($condition,0,-4);
    $query = " SELECT * FROM items WHERE ".$condition;
    $statement = $connect->prepare($query);
    $statement->execute();
    $output = '<div class="list-group">';
    if ($statement->rowCount() > 0){
        foreach ($statement->fetchAll() as $row){
            $temp_text = $row["Name"];
            $temp_text = str_ireplace($search_array,$replace_array,$temp_text);
            $output.='<a href="#" class="list-group-item">'.$temp_text.'
                        <div class="pull-left">'.Get_user_avater($row["itemID"],$connect).'&nbsp;
                        </div>
                      </a>';

        }

    }else{

        $output .= '<a href="#" class="list-group-item"> No Result Found</a>';

    }
    $output .='</div>';
    echo $output;

}

?>