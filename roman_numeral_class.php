<?php
class RomanNumeral {
	public function number_to_roman($num) {
		$n = intval($num);
		$result = '';
		//roman_numerals array
		$roman_numerals = array(
				'M' => 1000,
				'CM' => 900,
				'D' => 500,
				'CD' => 400,
				'C' => 100,
				'XC' => 90,
				'L' => 50,
				'XL' => 40,
				'X' => 10,
				'IX' => 9,
				'V' => 5,
				'IV' => 4,
				'I' => 1);
	
		foreach ($roman_numerals as $roman => $number) {
			//divide to get matches
			$matches = intval($n / $number);
			//assign the roman char * $matches
			$result .= str_repeat($roman, $matches);
			//substract from the number
			$n = $n % $number;
		}
		//then return the result
		return $result;
	}
	
	public function romannum_to_barcode($romannum){
		$result = '';
		//roman_numerals array
		$roman_numeral_widths = array(
				'M' => 13,
				'D' => 11,
				'C' => 9,
				'L' => 7,
				'X' => 5,
				'V' => 3,
				'I' => 1);
		 //Convert roman number array formt  
		 $romannum_array = str_split($romannum,1);
		 foreach ($romannum_array as $key => $roman) {
			if(array_key_exists($roman,$roman_numeral_widths)){
				//assgin thicknesses
				$width=$roman_numeral_widths[$roman];
				$result .= '<div style="width:'.$width.'px;"></div>&nbsp;' ;
			}
		} 
		//return the result
		return $result;
	}
}
?>