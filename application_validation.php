<?php

$errors = [];

$first_name = "";
$last_name = "";
$email = "";
$phone = "";
$address = "";
$city = "";
$provinces = "";
$country = "";
$cv = '';
$resume = "";
$start_date = "";
$salary = "";
$portfolio = "";
$linkedin = "";
$experience = "";
$canada_working = "";
$comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //First name validation
    if(empty($_POST['first-name'])){
        array_push($errors, "First Name is required");
    }
    else {
        $first_name = sanitize_input($_POST['first-name']);
    }

    //last name validation
    if(empty($_POST['last-name'])){
        array_push($errors, "Last Name is required");
    }
    else {
        $last_name = sanitize_input($_POST['last-name']);
    }

    //email validation
    if(empty($_POST['email'])){
        array_push($errors, "Email is required");
    }
    else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Email must be valid.");
    }
    else {
        $email = sanitize_input($_POST['email']);
    }

    //phone validation
    if(empty($_POST['phone'])){
        array_push($errors, "Phone number is required.");
    }

    else if (!filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT)){
        array_push($errors, "Phone number must be valid.");
    }
    else {
        $phone = sanitize_input($_POST['phone']);
    }

    //address validation
    if(empty($_POST['address'])){
        array_push($errors, "Address is required.");
    }
    else {
        $address = sanitize_input($_POST['address']);
    }

    //city validation
    if(empty($_POST['city'])){
        array_push($errors, "City Field is required.");
    }
    else {
        $city = sanitize_input($city);
    }

    //Province validation
    if($_POST['province'] == "-select-"){
        array_push($errors, "Province Field is required.");
    }

    //Country Validation
    if($_POST['country'] == "-select-"){
        array_push($errors, "Country field is required.");
    }

    //CV Validation
    $allowed_file_types = array('pdf', 'docx', 'doc');
    $extension = pathinfo($_POST['cv'], PATHINFO_EXTENSION);

    if(empty($_POST['cv'])){
        array_push($errors, "CV is required.");
    }
    else if (!in_array($extension, $allowed_file_types)){
        array_push($errors, "CV must be in pdf, docx, or doc format.");
    }
    else {
        $cv = sanitize_input($_POST['cv']);
    }

    //Resume Validation
    $extension = pathinfo($_POST['resume'], PATHINFO_EXTENSION);

    if(empty($_POST['resume'])){
        array_push($errors, "Resume is required.");
    }
    else if (!in_array($extension, $allowed_file_types)){
        array_push($errors, "Resume must be in pdf, docx, or doc format.");
    }
    else {
        $resume = sanitize_input($_POST['resume']);
    }

    //Start date validation
    if(empty($_POST['start-date'])){
        array_push($errors, "Start date must be provided.");
    }

    //Salary Validation
    if(!empty($_POST['salary']) && !is_numeric($_POST['salary'])){
        array_push($errors, "Salary must be a number.");
    }
    else {
        $salary = sanitize_input($_POST['salary']);
    }

    //Portfolio Validation
    if(!empty($_POST['portfolio']) && !preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $_POST['portfolio'])){
        array_push($errors, "Portfolio URL must be valid.");
    }

    //Linkedin validation
    if(!empty($_POST['portfolio']) && !preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $_POST['linkedin'])){
        array_push($errors, "LinkedIn URL must be valid.");
    }
    
    //Experience validation
    if(empty($_POST['experience'])){
        array_push($errors, "Years of experience is required.");
    }
    else if (!is_numeric($_POST['salary'])){
        array_push($errors, "Years of experience must be a number.");
    }
    else {
        $salary = sanitize_input($_POST['salary']);
    }

    //Work Eligibility
    if($_POST['work-eligibility'] == "No"){
        array_push($errors, "You must be eligible to work in Canada to apply for this position.");
    }

    //Comment validation
    $comment = sanitize_input($comment);

    //Display errors if there are any
    if(empty($errors)){
        header("Location:" . "http://" . $_SERVER["HTTP_HOST"] . "/application_success.php");
    }
    else {
        foreach($errors as $err) {
            echo "<div class='error-message'><p>{$err}</p></div>";
        }
    }
}

function sanitize_input($input){

    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    
    return $input;

}