<?php

require dirname(__DIR__, 2) . '/environment.php';
require dirname(__DIR__, 2) . '/src/helpers/Category.php';

$categories = new Category();

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $id = $_POST['del_id'];
    
    if($categories->delete($id)){
        header("Location: all.php ");
    }
    else{
        echo "
        <script>
            alert('Supply all the fields to proceed editing');
            location.href = 'all.php';
        </script>";
    }
}
