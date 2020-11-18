<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled-4.19.1.min.css?ver=4.19.1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<script type="text/javascript">
  
</script>

<?php
require 'table.php';
//START CODE
$table = new Table();
$tabledata = array(
  array(
    'name',
    'age',
    'gender',
    'country',
  ),
  array(
    'Jason',
    '18',
    'M',
    'USA'
  ),
  array(
    'Janice',
    '22',
    'F',
    'London'
  ),
  array(
    'Vivek',
    '8',
    'M',
    'india'
  )
);
$tabledatajson = json_encode($tabledata);
// echo $tabledatajson;
echo "<br>";
$options = array(
  'striped' => TRUE, 
  'responsive' => TRUE,
  'bordered' => TRUE,
  'small' => FALSE,
  'hoverable' =>TRUE
);
// var_dump($table);
$table->setargs($options);
// print_r($table->getargs());
echo "<br><br>";
$table->adddata($tabledatajson);
$tablescode = $table->compiletable(FALSE); //Leave blank for output here, no need to add to variable if param is blank (TRUE Default)


echo $tablescode;
?>


</body>
</html>
