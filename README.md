# php-table
This is a self made class for making html tables for php developers. I have faced a lot of problems while making html tables, this is a simple way to add data to a table and style it using bootstrap. To run this code you will need a server, XAMPP, MAMP or LAMP or even terminal for OSX and Linux users

To use, simply just add
require 'table.php';
in your code


IMPORTANT: This uses bootstrap so please include it in your file: SEE EXAMPLE FILE

The array for storing data should be in such a manner: the main array holding different arrays with data, 0th index of main array holding the table headings

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
