<?php

// retrive search type
$search_type = $_POST['search_type'];
$search_type = $_POST['quick_search'];

// set up searches
$quote_search = "q.quote LIKE '%search_term&'";

$subject_search = "
s1.Subject LIKE '%$search_term%'
OR s2.Subject LIKE '%$search_term%'
OR s3.Subject LIKE '%$search_term%'";

$name_search = "
CONCAT(a.First,' ', a.Middle, ' ', a.Last) LIKE %$search_term%'
OR CONCAT(a.First, ' ', a.Last) LIKE %$search_term%'
";

if ($search_type == "quote") {
    $sql_conditions = "WHERE $quote_search";
};

elseif ($search_type == "author") {
    $sql_conditions = "WHERE $name_sarch";
};

elseif ($search_type == "subject") {
    $sql_conditions = "WHERE $subject_search";
};

else {
    $sql_conditions = "
    WHERE $name_search OR $quote_search OF $subject_search";
};

$heading = "'$search_term' Quotes";
include ("results.php")

?>