<?php

// retrive search type
$search_type = $_REQUEST['search'];

echo "Search type".$search_type;

if ($search_type == "all") {
    $heading = "All Results";
    $sql_conditions = "";
}

elseif($search_type == "recent") {
    $heading = "Recent Quotes";
    $sql_conditions = "ORDER BY RAND() LIMIT 10";
}

elseif($search_type == "random") {
    $heading = "Random Quotes";
    $sql_conditions = "ORDER BY q.ID DESC LIMIT 10";
}

elseif ($search_type=="author") {
    // retrieve author ID
    $author_ID = $_REQUEST['Author_ID'];

    $heading = "";
    $heading_Type = "author";

    $sql_conditions = "WHERE q.Author_ID = $author_ID";
}

elseif ($search_type=="subject") {
    // retrieve subject
    $subject_name = $_REQUEST['subject_name'];

    $heading = "";
    $heading_Type = "subject";

    $sql_conditions = "
    WHERE
    s1.Subject '$subject_name'
    OR s2.Subject '$subject_name'
    OR s3.Subject '$subject_name'
    ";
}

else {
    $heading = "No results test";
    $sql_conditions = "WHERE q.ID = 1000";
}

include ("results.php")

?>