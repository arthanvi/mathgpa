<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


require_once("../includes/db/db_connect.php");

// connecting to db

$db = new DB_CONNECT();

mysql_set_charset('utf8');

// include db connect class
//require_once("db/db_connect.php");
//$con = mysqli_connect('localhost', 'root', '','qalite');
////$con = mysqli_connect('localhost', 'root', '','quizacad_quizacademy');
$schoolName='';
$schoolId='100000';
$teacherId='GUEST';
/*
$queryToGetSchoolName = "SELECT `NAME`,`SCHOOL_ID` FROM `omserver_details` LIMIT 1";
$resultOfQuery1 = mysqli_query($con,$queryToGetSchoolName);
//echo $queryToGetSchoolName; 
while ($row1 = mysqli_fetch_array($resultOfQuery1)) 
{

    //$registeredMacAddress = $row['OM_MAC_ADDRESS'];
    $schoolName = $row1['NAME'];
	$schoolId = $row1['SCHOOL_ID'];
}
//echo $schoolName;
$quertyToGetTeacherID = "SELECT `RELATIONSHIP_OF` FROM `relationship_table` where `RELATIONSHIP_TYPE`='teacher' LIMIT 1";
$resultOfTeacherQuery = mysqli_query($con,$quertyToGetTeacherID);
while ($row2 = mysqli_fetch_array($resultOfTeacherQuery)) 
{

    //$registeredMacAddress = $row['OM_MAC_ADDRESS'];
    $teacherId = $row2['RELATIONSHIP_OF'];
}
*/
$quizName="MATHGPA_".$schoolId."_".$_GET['userId'];
//echo $quizName;
// connecting to db
//$db = new DB_CONNECT();
//$userId=$_GET['userId'];
$quizStatus = $_GET['quizStatus'];
$responses =$schoolId."_".$schoolName;
$rightOrWrong = $_GET['rightOrWrongString'];
$timePerQuestion = 'NA';
$correctAnswers = $_GET['correctAnswers'];
$timeTaken = $_GET['quizDuration'];
$quizType='MATHGPA';
$sessionId=0;
$questionIds='NA';
$quizSize=$_GET['quizSize']; //AT23
$courseId=0;
$topicName='Maths';
$questionSubTopicIds=$_GET['gpaCriteria']; //AT23 31st
$sTime=$_GET['sTime'];
$eTime=$_GET['eTime'];
$referenceQuizId='NA';
//$quizStatsUpdate = "UPDATE `stats_quiz` SET  `RESPONSES` =  '$responses',`RIGHT_OR_WRONG` =  '$rightOrWrong', `TIME_PER_QUESTION` = '$timePerQuestion', `CORRECT_ANSWERS` = $correctAnswers, `END_TIME` = NOW(), `TIME_TAKEN`= '$quizDuration' WHERE `stats_quiz`.`ID` = $quizId;";
//$quizStatsInsert = "INSERT INTO `stats_quiz` (`NAME`,`QUIZ_TYPE`,`QUIZ_STATUS`,`USER_ID`,`SESSION_ID`,`QUESTION_IDS`,`RESPONSES`,`RIGHT_OR_WRONG`,`TIME_PER_QUESTION`,`QUIZ_SIZE`,`CORRECT_ANSWERS`,`COURSE_ID`,`TOPIC_NAME`,`SUBTOPIC_IDS`,`MAPPED_CLASS_ID`,`REFERENCE_QUIZ_ID`) VALUES ('$quizName','$quizType','yi','$teacherId',$sessionId,'$questionIds','$responses','$rightOrWrong','$timePerQuestion',$quizSize,$correctAnswers,'$courseId','$topicName','$questionSubTopicIds','$mappedClassId','$referenceQuizId')";
//$gpaInsertQuery="INSERT INTO `stats_quiz`(`NAME`, `QUIZ_TYPE`, `QUIZ_STATUS`, `USER_ID`, `SESSION_ID`, `QUESTION_IDS`, `RESPONSES`, `RIGHT_OR_WRONG`, `TIME_PER_QUESTION`, `QUIZ_SIZE`, `CORRECT_ANSWERS`, `COURSE_ID`, `TOPIC_NAME`, `SUBTOPIC_IDS`, `MAPPED_CLASS_ID`, `START_TIME`, `END_TIME`, `TIME_TAKEN`, `REFERENCE_QUIZ_ID`) VALUES ('$quizName','$quizType','yi','$teacherId',$sessionId,'$questionIds','$responses','$rightOrWrong','$timePerQuestion',$quizSize,$correctAnswers,$courseId,'$topicName','$questionSubTopicIds',0,'$sTime','$eTime','$timeTaken','$referenceQuizId')";

$gpaInsertQuery="INSERT INTO `stats_quiz`(`NAME`, `QUIZ_TYPE`, `USER_ID`, `SESSION_ID`, `QUESTION_IDS`, `RESPONSES`, `RIGHT_OR_WRONG`, `TIME_PER_QUESTION`, `QUIZ_SIZE`, `CORRECT_ANSWERS`, `COURSE_ID`, `TOPIC_NAME`, `SUBTOPIC_IDS`, `START_TIME`, `END_TIME`, `TIME_TAKEN`, `REFERENCE_QUIZ_ID`) VALUES ('$quizName','$quizType','$teacherId',$sessionId,'$questionIds','$responses','$rightOrWrong','$timePerQuestion',$quizSize,$correctAnswers,$courseId,'$topicName','$questionSubTopicIds','$sTime','$eTime','$timeTaken','$referenceQuizId')";
  
echo $gpaInsertQuery;
$insertId = 25;
if(mysql_query($gpaInsertQuery))
{
	echo ("Inserted");
	 $insertId = mysql_insert_id();
	 
}
else
{
	 $error = mysql_error();
	 print("Error Occurred: ".$error);
}
echo($insertId);
?>