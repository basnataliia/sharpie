<?php
//$post_data = array(
//    'firtsname' => "Natalie",
//    'lastname' => "Basmanova");

//$post_data = array
//(
//    array('firtsname' => "Mina", 'lastname' => "Azer"),
//    array('firtsname' => "Terry", 'lastname' => "Bru"),
//    array('firtsname' => "Mini", 'lastname' => "Fugi"),
//    array('firtsname' => "Tori", 'lastname' => "Klark"),
//    array('firtsname' => "Merry", 'lastname' => "Cherry")
//
//);
//$post_data = array('firstname' => "Mina", 'lastname' => "Azer");
//if (!empty($_POST)){
//    $post_data = array(
//        'firstname' => $_POST['firstname'],
//        'lastname' => $_POST['lastname'],
//        'subscribe' => $_POST['subscribe']
//
//        );
//}

if (!empty($_POST)) {
    $fruits = "";
    if(isset($_POST['fruits'])){
        $fruits = $_POST['fruits'];
    }
    else{
        $fruits = '';
    }

    $gender = "";
    if(isset($_POST['gender'])){
        $gender = $_POST['gender'];
    }
    else{
        $gender = 'not set';
    }

        $post_data = array(
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'subscribe' => $_POST['subscribe'],
            'fruits' => $fruits,
            'gender' => $gender,
            'language' => $_POST['language']
        );
}

$number = count($post_data);
$post_data = json_encode($post_data);
echo $post_data;

//$get_total_rows = 0;
//$results = $mysqli->query("SELECT COUNT(*) FROM paginate");
//if($results){
//    $get_total_rows = $results->fetch_row();
//}
//break total records into pages
//$total_pages = ceil($number/2);

?>