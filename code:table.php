<?php
function bts($boolean){ //BooleanToString (Needed because code isn't outputting in getargs() )
  if ($boolean) {
    return "TRUE";
  }else{
    return "FALSE";
  }
}

function allarguments(){
  return array('bordered', 'striped', 'responsive', 'small', 'hoverable');
}



function setclasses($setoptns){
  $classoptions = '';
  for ($i=0; $i < count($setoptns); $i++) { 
    switch ($setoptns[$i]) {
      case 'bordered':
        $classoptions .= "table-bordered ";
        break;
      case 'striped':
        $classoptions .= "table-striped ";
        break;
      // case 'responsive':
      //   $responsivetable = TRUE; //Adding Div if it's true so no need
      //   break;
      case 'small':
        $classoptions .= "table-sm ";
        break;
      case 'hoverable':
        $classoptions .= "table-hover ";
        break;
    }
  }
  return $classoptions;
}

class table {
  public $bordered;
  public $striped;
  public $responsive;
  public $small;
  public $tabletype = NULL;
  public $color;
  public $data;
  public $headcolor;
  public $tablecolor;
  function __construct($tabletype ='') { 
    switch ($tabletype) {
      case "red":
        echo "Your favorite color is red!";
        break;
      case "blue":
        echo "Your favorite color is blue!";
        break;
      case "green":
        echo "Your favorite color is green!";
        break;
      default:
        // echo "Your favorite color is neither red, blue, nor green!";
    }
    foreach (allarguments() as $value) {
      $this->$value = FALSE;
    }
  }




  function setargs($args){
    if (is_array($args)) {
      foreach ($args as $key => $value) {
        $this->$key = $value;
        // switch ($key) {
        //   case 'bordered':
        //     if ($value === TRUE) {
        //       $this->bordered = TRUE;
        //     }
        //     break;
        //   case 'striped':
        //     if ($value === TRUE) {
        //       $this->striped = TRUE;
        //     }
        //     break;
        //   case 'responsive':
        //     if ($value === TRUE) {
        //       $this->responsive = TRUE;
        //     }
        //     break;
        //   case 'small':
        //     if ($value === TRUE) {
        //       $this->small = TRUE;
        //     }
        //     break;
        // }
      }
    }
  }






  function getargs(){
    $optns = allarguments();
    $options = array();
    foreach ($optns as $args) {
      $options[$args] = bts($this->$args);
    }
    return $options;
  }

  function adddata($data){
    $this->data = $data;
  }


  function setheadargs($color){

  }


// -------------------------------------------------COMPILING TABLE------------------------------------------




  function compiletable($output = TRUE){ //checking if dev wants output or code in variable
    //Setting variables: 
    $tablecode = '<div class="container">';
    $totaloptns = 0;
    $setoptns = array();
    $tabledata = json_decode($this->data, TRUE);
    $columncount = count($tabledata[0]);
    $rowcount = count($tabledata);
    $classoptions = "table ";
    $optns = allarguments();


    //Finding options set as TRUE
    foreach ($optns as $args) {
      if ($this->$args) {
        $setoptns[] = $args; //Adds option to array if it's true
      }
    }
    //$setoptns is array of all options to be used in Table
    $classoptions .= setclasses($setoptns);
    if ($this->responsive) {
      $tablecode .= "<div class='table-responsive'>";
    }
    //Compiling code:
    $tablecode .= "<table id=\"tablePreview\" class=\"" . $classoptions . "\"><thead class=\"primary-color-dark white-text\"><tr>";
    for ($i=0; $i < $columncount; $i++) { 
      $tablecode .= "<th>" . $tabledata[0][$i] . "</th>";
    }
    $tablecode .= "</tr><thead><tbody><tr>";
    for ($i=1; $i < $rowcount; $i++) { 
      for ($j=0; $j < $columncount; $j++) { 
        $tablecode .= "<td>" . $tabledata[$i][$j] . "</td>";
      }
      $tablecode .= "</tr>";
    }
    $tablecode .= "</tr></tbody></table>";

    if ($this->responsive) {
      $tablecode .= "</div>";
    }
    $tablecode .= "</div>";
    if ($output) {
      //Finally, Echo table code
      echo $tablecode;
    }else{
      return $tablecode;
    }
  }
// -------------------------------------------------COMPILING TABLE------------------------------------------



  // function __destruct() {
  //   echo "The fruit is {$this->name}."; 
  // }
}