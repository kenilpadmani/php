<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (preg_match('/[a-zA-Z]/', $_POST['name'])) {
        $nameLowerCase = strtolower($_POST['name']);
        if ($nameLowerCase == "kenil") {
            echo "Name is :".$_POST['name']."<br><br>";
        }
    } else {
        echo "Invalid Name Format";
    }
    echo "String postion with case sensitive.<br>";
    if (preg_match('/[a-zA-Z ]/', $_POST['answer'])) {
        $yourAnswer = $_POST['answer'];
        echo  $yourAnswer."<br>";
        $findString = 'is a';
        $findStringLength = strlen($findString);
        $offset = 0;
        while ($stringPosition =  strpos($yourAnswer, $findString, $offset)) {
            echo "<strong>".$findString."</strong> is position ".$stringPosition."<br>";
            $offset = $stringPosition + $findStringLength; 
        }
    }
    if (preg_match('/[a-zA-Z0-9]/', $_POST['password'])) {
        echo "Without encryption password : ".$_POST['password']."<br><br>";
        echo "With encryption using sha1 password : ".sha1($_POST['password'])."<br><br>";
        echo "With encryption using md5 password : ".md5($_POST['password'])."<br><br>";
    }
} else {
    echo "Request method is not post";
}

//string postion
echo "<br>String postion with case insensitive.<br>";
if (preg_match('/[a-zA-Z ]/', $_POST['answer'])) {
    $yourAnswer = $_POST['answer'];
    echo  $yourAnswer."<br>";
    $findString = 'Is a';
    $findStringLength = strlen($findString);
    $offset = 0;
    while ($stringPosition =  stripos($yourAnswer, $findString, $offset)) {
        echo "<strong>".$findString."</strong> is position ".$stringPosition."<br>";
        $offset = $stringPosition + $findStringLength; 
    }
}


echo "<br>String replace with case sensitive<br><br>";
$string ="Hii everyone! welcome to javaTpoint website. We will get best technical content here.";  
$stringOldWord = array("Hii", "We");
$stringReplaceWord = array("<strong>Hello</strong>", "<strong>You</strong>");
echo $string."<br>";
$string = str_replace($stringOldWord, $stringReplaceWord, $string);
echo $string."<br>";

echo "<br>String replace with case insensitive<br><br>";
$string ="Hii everyone! welcome to javaTpoint website. We will get best technical content here.";  
$stringOldWord = array("hii", "We");
$stringReplaceWord = array("<strong>Hello</strong>", "<strong>You</strong>");
echo $string."<br>";
$string = str_ireplace($stringOldWord, $stringReplaceWord, $string);
echo $string."<br>";


$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
$onlyconsonants = str_replace($vowels, "", "Hello World of PHP");
echo $onlyconsonants."<br>";

$str = str_replace("ll", "", "good golly miss molly!", $count);
echo $count;

?>


<form method="POST">
    Name: <input type="text" name="name" required><br>
    Answer: <input type="text" name="answer" required><br>
    Password: <input type="text" name="password" required><br>
    <input type="submit" name="submit">
</form>