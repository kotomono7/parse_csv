<!DOCTYPE html>
<html>
<?php
    if (($open = fopen("contoh.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {        
            $parsedArrData[] = $data; 
        }

        $metaKeyword = $parsedArrData[1][0]; // kolom 1, baris 2
        $title = $parsedArrData[1][1]; // kolom 2, baris 1
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keyword" content="<?php echo $metaKeyword; ?>">
    <title><?php echo $title; ?>
</title>
<?php
        fclose($open);
    }
?>
</head>
<body>
<!-- your content goes here -->
</body>
</html>