<!DOCTYPE html>
<html>
<head>
	<title>PHP Functions</title>
</head>
<body>
<?php
/*
1) The following function simply displays an paragraph
a) Write a line of code that will call the printDetails function
b) Modify the function so that you can pass arguments that specify the title of the film and the year of release. See the notes for a similar example.
c) Make several function calls to output details of different films.
*/
function printDetails($name, $year)
{
	echo "<p>The film {$name} was released in {$year}</p>";

}
printDetails("Jaws","1975");
/*
2) The following function converts a value in pounds into euros.
a) Write a line of code that will call this function. Test it works by outputting the result using an echo statement.
*/
function convertToEuros(int $pounds)
{
	return $pounds*1.18;
}
$pounds = 10;
$euros = convertToEuros($pounds);
echo "{$pounds} pounds is {$euros} euros";
/*
b) Write your own similar function, convertToCMs, that will convert a value in inches into centimetres (1cm is 2.54 inches). Test this works. Here's some example code that calls the function:$cms = convertToCMs(1);
echo "<p>One inch is {$cms}cms.</p>";
*/
function convertToCMs(int $inches)
{
	return $inches*2.54;
}
$inches = 3;
$CMs = convertToCMs($inches);
echo "<p>{$inches} inches is {$CMs} CMs</p>";
/*
3) Write a function called addTwoNumbers. The function should accept two arguments and return a single value, the sum of the two numbers. Here's some example code that uses the function:
$result = addTwoNumbers(10,5);
echo "<p>10 + 5 = {$result}</p>"; // 10 + 5 = 15
*/
function addTwoNumbers(int $num1,int $num2)
{

	return $total=$num1+$num2;
	/*return $result;*/
}
$n1 = 20;
$n2 = 10;
$result = addTwoNumbers($n1,$n2);
echo "<p>{$n1} + {$n2} = {$result}</p>"; // 10 + 5 = 15

/*
4) Write a function called isValidUsername. The function should accept a single argument, a string, and return a value of true if the string 6 characters or more in length and false if it isn't. Have a look at http://php.net/manual/en/function.strlen.php for info on determining string length. Again, here's some example code that uses the function:
$userA =  "khutton";
if(isValidUsername($userA)){
	echo "<p>Valid username</p>";
}else{
	echo "<p>Not a valid username</p>";
}
*/
/*
5) Look at the following function. It accepts the name of a continent as an argument and then returns an array of countries from that continent that have won the World Cup. Write a line of code that will call this function. Use a foreach loop output the elements of the returned array.
*/
function getWinnersByContinent(string $continent)
{
	$matchingCountries=[];
	if($continent==="Europe"){
		$matchingCountries=["France","Germany","Spain","England","Italy"];
	}else if($continent==="South America"){
		$matchingCountries=["Argentina","Brazil","Uruguay"];
	}
	return $matchingCountries;
}
/*
6) The following function accepts an array of filenames and returns only those filenames that have a png, jpg or jpeg extension. Write a line of code that will call this function. Using a foreach loop output the elements of the returned array.
*/
function filterImageFileNames(array $arrOfFileNames)
{
	$matchingFileNames=[];
	foreach($arrOfFileNames as $filename){
		$fileExtension = substr($filename, strrpos($filename, '.') + 1);
		if($fileExtension==="png" || $fileExtension==="jpg" || $fileExtension==="jpeg"){
			$matchingFileNames[]=$filename;
		}
	}
	return $matchingFileNames;
}
/*
7)
a) Write a getPositiveNumbers function. It should accept an array of numbers as input and return only those numbers that are greater than zero. Here's some example code that shows the function being called:
$posNumbers = getPositiveNumbers([34,0,-31,4]);
foreach($posNumbers as $num){
	echo "<p>{$num}</p>"; // 34, 4
}
b) Write another function called printList(). It should accept a single argument, an array, and output an HTML list, with each element in the array as an item in the list. It shouldn't return any values. Use this function to print out the positive numbers.
*/
/*
8) Look at the following code:
$scores = [20,13,4,23,65];
$avg = calcAverage($scores);
echo "<p>The average score was {$avg}</p>";  //outputs ' The average score was 25'
Write the calcAverage function. It should accept an array of numbers as input and return the average of all the numbers in the array.
*/
?>

</body>
</html>
