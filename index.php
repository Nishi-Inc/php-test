<!DOCTYPE html>
<html>
<head></head>
<body>
<input type="number" id="number-input" onchange="onInputChange()">
<p id="output-p">
<?php
function convertNumberToWordsForIndia($number){
    $words = array(
        '0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five',
        '6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten',
        '11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen',
        '16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty',
        '30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy',
        '80' => 'eighty','90' => 'ninty');

    //First find the length of the number
    $number_length = strlen($number);
    //Initialize an empty array
    $number_array = array(0,0,0,0,0,0,0,0,0);
    $received_number_array = array();

    //Store all received numbers into an array
    for($i=0;$i<$number_length;$i++){    $received_number_array[$i] = substr($number,$i,1);    }

    //Populate the empty array with the numbers received - most critical operation
    for($i=9-$number_length,$j=0;$i<9;$i++,$j++){ $number_array[$i] = $received_number_array[$j]; }
    $number_to_words_string = "";
    //Finding out whether it is teen ? and then multiplying by 10, example 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
    for($i=0,$j=1;$i<9;$i++,$j++){
        if($i==0 || $i==2 || $i==4 || $i==7){
            if($number_array[$i]=="1"){
                $number_array[$j] = 10+$number_array[$j];
                $number_array[$i] = 0;
            }
        }
    }

    $value = "";
    for($i=0;$i<9;$i++){
        if($i==0 || $i==2 || $i==4 || $i==7){    $value = $number_array[$i]*10; }
        else{ $value = $number_array[$i];    }
        if($value!=0){ $number_to_words_string.= $words["$value"]." "; }
        if($i==1 && $value!=0){    $number_to_words_string.= "Crores "; }
        if($i==3 && $value!=0){    $number_to_words_string.= "Lakhs ";    }
        if($i==5 && $value!=0){    $number_to_words_string.= "Thousand "; }
        if($i==6 && $value!=0){    $number_to_words_string.= "Hundred &amp; "; }
    }
    if($number_length>9){ $number_to_words_string = "Sorry This does not support more than 99 Crores"; }
    return ucwords("INR ".strtolower($number_to_words_string)." Only.");
}

echo convertNumberToWordsForIndia(3453);

?>
</p>

<script>
    function convertNumberToText(number) {
        var fraction = Math.round(frac(number)*100);
        var f_text  = "";

        if(fraction > 0) {
            f_text = "AND "+convert_number(fraction)+" PAISE";
        }

        return "INR "+convert_number(number)+" "+f_text+" only";
    }

    function frac(f) {
        return f % 1;
    }

    function convert_number(number)
    {
        if ((number < 0) || (number > 999999999))
        {
            return "NUMBER OUT OF RANGE!";
        }
        var Gn = Math.floor(number / 10000000);  /* Crore */
        number -= Gn * 10000000;
        var kn = Math.floor(number / 100000);     /* lakhs */
        number -= kn * 100000;
        var Hn = Math.floor(number / 1000);      /* thousand */
        number -= Hn * 1000;
        var Dn = Math.floor(number / 100);       /* Tens (deca) */
        number = number % 100;               /* Ones */
        var tn= Math.floor(number / 10);
        var one=Math.floor(number % 10);
        var res = "";

        if (Gn>0)
        {
            res += (convert_number(Gn) + " CRORE");
        }
        if (kn>0)
        {
            res += (((res=="") ? "" : " ") +
            convert_number(kn) + " LAKH");
        }
        if (Hn>0)
        {
            res += (((res=="") ? "" : " ") +
            convert_number(Hn) + " THOUSAND");
        }

        if (Dn)
        {
            res += (((res=="") ? "" : " ") +
            convert_number(Dn) + " HUNDRED");
        }


        var ones = Array("", "ONE", "TWO", "THREE", "FOUR", "FIVE", "SIX","SEVEN", "EIGHT", "NINE", "TEN", "ELEVEN", "TWELVE", "THIRTEEN","FOURTEEN", "FIFTEEN", "SIXTEEN", "SEVENTEEN", "EIGHTEEN","NINETEEN");
        var tens = Array("", "", "TWENTY", "THIRTY", "FOURTY", "FIFTY", "SIXTY","SEVENTY", "EIGHTY", "NINETY");

        if (tn>0 || one>0)
        {
            if (!(res==""))
            {
                res += " AND ";
            }
            if (tn < 2)
            {
                res += ones[tn * 10 + one];
            }
            else
            {

                res += tens[tn];
                if (one>0)
                {
                    res += ("-" + ones[one]);
                }
            }
        }

        if (res=="")
        {
            res = "zero";
        }
        return res;
    }

    function onInputChange() {
        var number = document.getElementById("number-input").value;
        document.getElementById("output-p").innerHTML = convertNumberToText(number);
    }
</script>
</body>
</html>

