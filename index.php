<?php
	/*
     * read & convert csv file to arrays
     */
	function readCSV($csvFile) {
		$data = array_map('str_getcsv', file($csvFile));
		return $data;
	}

	/*
     * remove null values
     */
	function array_filter_recursive($input) {
		foreach ($input as &$value) {
			if (is_array($value)) {
				$value = array_filter_recursive($value);
			}
		}

		return array_filter($input);
	}

	/*
     * filter rows by value
     */
    function filter_by_value($array, $index, $value) {
        if (is_array($array) && count($array) > 0) {
            foreach (array_keys($array) as $key) {
                $temp[$key] = $array[$key][$index];

                // string contains case-sensitively
                if (strpos($temp[$key], $value) !== false) {
                	$newarray[$key] = $array[$key];
                }

                // string case-sensitive identically
                /*if ($temp[$key] == $value) {
                    $newarray[$key] = $array[$key];
                }*/

                // multi-bytes string to lowercase
                /*if (strpos(mb_strtolower($temp[$key]), mb_strtolower($value)) !== false) {
                	$newarray[$key] = $array[$key];
                }*/
            }
        }
      	
      	return $newarray;
    }

	$csvFile = 'sample.csv';
	$csv = readCSV($csvFile);

	$afr = array_filter_recursive($csv);
	$fbv_pulsa = filter_by_value($afr, '0', 'Pulsa');

	echo '<pre>';
	print_r($csv);
	print_r($fbv_pulsa);
	echo '</pre>';

	foreach ($fbv_pulsa as $key => $value) {
		// echo $key, " => ", $value['0']; echo "<br />";

		$arr_pulsa = array_map('trim', explode('|', $value[0]));
		// echo '<pre>'; print_r($arr_pulsa); echo '</pre>';
	}

?>