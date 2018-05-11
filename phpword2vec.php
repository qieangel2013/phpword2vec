<?php
function distance_pre($keyword) {
	exec ( dirname ( __FILE__ ) . "/distancecli " . dirname ( __FILE__ ) . "/w2v/trunk/vectors.bin " . $keyword, $outputArray );
	if (isset ( $outputArray[0] )) {
		return $outputArray;
	} else {
		return array();
	}
}
function distance($keyword) {
	exec ( dirname ( __FILE__ ) . "/distancecli " . dirname ( __FILE__ ) . "/w2v/trunk/vectors.bin " . $keyword, $outputArray );
	$resultdata=array();
	if (isset ( $outputArray[0] )) {
		$tmparr=explode(",",$outputArray[0]);
		$tmpssr=distance_pre($tmparr[0]);
		foreach ($tmpssr as $k => $v) {
			$tmpdata=explode(",",$v);
			if($tmpdata[0]==$keyword){
				$resultdata=$tmpdata;
				break;
			}
		}
		return $resultdata;
	} else {
		return array();
	}
}
print_r(distance("警察"));
?>
