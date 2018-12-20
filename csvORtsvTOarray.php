<?php
$filename=$_FILES["file"]["tmp_name"];
if($_FILES["file"]["size"] > 0) {
    if($_FILES["file"]["type"] == "text/csv" || $_FILES["file"]["type"] == "text/csv") {
    // $file = fopen($filename, "r");
    // $getDataX = fgetcsv($file, 10000, ",");
    $rows = 0;
    $cols = 0;
    $csvarray = array();
    if (($handle = fopen($filename, "r")) !== FALSE) {
        $rows = 0;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $cols = count($data);
            for ($c=0;$c<$cols;$c++)
            {
                $csvarray[$rows][$c] = $data[$c];
            }
            $rows++;
        }
        fclose($handle);
    }
        print_r($csvarray);
    }
    else {
        echo "Invalid File. Please Upload CSV File.";
        $uploadOk = 0;
        exit;
    }
}
else {
    echo "Error: You are trying to upload file with zero size.";
    exit;
}