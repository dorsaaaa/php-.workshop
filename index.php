<?php
$msg = file_get_contents("messages.txt",1);
$a=str_getcsv($msg);
$random_msg=array_rand( $a);
$message = explode(PHP_EOL,$msg);
$json=file_get_contents("people.json");
$arr=json_decode($json,1);
$arr_k=array_keys($arr);
$arr_v=array_values($arr);
$fa_name = $_POST['person']?:$arr_v[array_rand($arr_v)];
$en_name = array_search ($fa_name,$arr)?:$arr_k[array_rand($arr_k)];
$question = $_POST['question'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/default.css">
    <title>مشاوره بزرگان</title>
</head>
<body>
<p id="copyright">تهیه شده برای درس کارگاه کامپیوتر،دانشکده کامییوتر، دانشگاه صنعتی شریف</p>
<div id="wrapper">
    <div id="title">
    <span id="label" placeholder="asd">پرسش:</span>
        <span id="question" placeholder="..."><?php echo $question ?></span>
    </div>
    <div id="container">
        <div id="message">
            <p ><?php echo $a[$random_msg]; ?></p>
        </div>
        <div id="person">
            <div id="person">
                <img src="images/people/<?php echo "$en_name.jpg" ?>"/>
                <p id="person-name"><?php echo $fa_name ?></p>
            </div>
        </div>
    </div>
    <div id="new-q">
        <form method="post">
            سوال
            <input type="text" name="question" value="<?php echo $question ?>" maxlength="150" placeholder="..."/>
            را از
            <select name="person">
                <?php foreach ($arr as $names) : ?>
                    <option value="<?php echo $names ?>" <?php if($names==$fa_name){echo 'selected' ;} ?>><?php echo $names; ?></option>
                 <?php endforeach; ?>
            </select>
            <input type="submit" value="بپرس"/>
        </form>
    </div>
</div>
</body>
</html>