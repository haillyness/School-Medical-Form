<?php

session_start();


if (!isset($_SESSION['student_number'])) {
   
    header("Location: form.php");
    exit(); 
}


$student_number = $_SESSION['student_number'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = new mysqli("localhost:3307", "root", "", "medical_db");


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $medical_attention = $_POST['medical-attention'] ?? "";
    $illness_details = $_POST['illness-details'] ?? "";
    $food_allergies = $_POST['food-allergies'] ?? "";
    $food_allergies_details = $_POST['food-allergies-details'] ?? "";
    $medicine_allergies = $_POST['medicine-allergies'] ?? "";
    $medicine_allergies_details = $_POST['medicine-allergies-details'] ?? "";
    $cigarette_smoker = $_POST['cigarette-smoker'] ?? "";
    $alcoholic = $_POST['alcoholic'] ?? "";


    $sql_insert_medical_history = "INSERT INTO medical_history (student_number, medical_attention, illness_details, food_allergies, food_allergies_details, medicine_allergies, medicine_allergies_details, cigarette_smoker, alcoholic) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_insert_medical_history = $conn->prepare($sql_insert_medical_history);
    $stmt_insert_medical_history->bind_param("sssssssss", $student_number, $medical_attention, $illness_details, $food_allergies, $food_allergies_details, $medicine_allergies, $medicine_allergies_details, $cigarette_smoker, $alcoholic);

    if ($stmt_insert_medical_history->execute()) {
        echo "<script>alert('Medical history added successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }

 
    $stmt_insert_medical_history->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formtwo.css">
    <script src="form2.js"></script>
    <title>Medical Form</title>
</head>
<body>
    <div class="header">
        <div class="logo-container">
            <img src="./logo.png" alt="Logo" class="logo">
            <div class="school-name">Polytechnic University of the Philippines<span class="sub-header"><br>MEDICAL SERVICES DEPARTMENT</span></div>
        </div>
    </div>

    <div class="container">
        <div class="form-container">
            <h1>HEALTH INFORMATION FORM FOR STUDENTS</h1>
            <h2>PART II. STUDENT INFORMATION</h2>
            <h3>(The medical history section of this form collects essential details about your past illnesses, surgeries, and chronic conditions. It also includes sections for noting any food allergies 
                or medication sensitivities you may have.<br>Your responses will help us personalize 
                your care to ensure your safety and well-being during medical treatments or procedures.)</h2>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <label for="medical-attention" id="medical">Do you need medical attention or have a known medical illness?</label>
                <div>
                    <input type="checkbox" id="medical-attention-yes" name="medical-attention" value="yes">
                    <label for="medical-attention-yes">Yes</label>
                    
                    <input type="checkbox" id="medical-attention-no" name="medical-attention" value="no">
                    <label for="medical-attention-no">No</label>
                </div>

                <div id="illness-specification" style="display: none;">
                    <label for="illness-details">Please specify the illness:</label>
                    <input type="text" id="illness-details" name="illness-details">
                </div>

                <label for="food-allergies" id="food">Do you have food allergies?</label>
                <div>
                    <input type="checkbox" id="food-allergies-yes" name="food-allergies" value="yes">
                    <label for="food-allergies-yes">Yes</label>
                    
                    <input type="checkbox" id="food-allergies-no" name="food-allergies" value="no">
                    <label for="food-allergies-no">No</label>
                </div>

                <div id="food-allergies-specification" style="display: none;">
                    <label for="food-allergies-details">Please specify the food allergies:</label>
                    <input type="text" id="food-allergies-details" name="food-allergies-details">
                </div>

                <label for="medicine-allergies" id="medicine">Do you have medicine allergies?</label>
                <div>
                    <input type="checkbox" id="medicine-allergies-yes" name="medicine-allergies" value="yes">
                    <label for="medicine-allergies-yes">Yes</label>
                    
                    <input type="checkbox" id="medicine-allergies-no" name="medicine-allergies" value="no">
                    <label for="medicine-allergies-no">No</label>
                </div>

                <div id="medicine-allergies-specification" style="display: none;">
                    <label for="medicine-allergies-details">Please specify the medicine allergies:</label>
                    <input type="text" id="medicine-allergies-details" name="medicine-allergies-details">
                </div>

                <h2 id="Part3">Part III. Additional Questions</h2>
                <h3>(
For the cigarette history section, simply indicate whether you are a current or former smoker. In the alcohol history section, specify if you currently drink alcohol or have done so in the past.)</h3>
                <label for="cigarette-smoker" id="smoke">Are you a cigarette smoker?</label>
                <div>
                    <input type="radio" id="cigarette-smoker-yes" name="cigarette-smoker" value="yes">
                    <label for="cigarette-smoker-yes">Yes</label>
                    
                    <input type="radio" id="cigarette-smoker-no" name="cigarette-smoker" value="no">
                    <label for="cigarette-smoker-no">No</label>
                </div>

                <label for="alcoholic" id="alc">Are you an alcoholic?</label>
                <div>
                    <input type="radio" id="alcoholic-yes" name="alcoholic" value="yes">
                    <label for="alcoholic-yes">Yes</label>
                    
                    <input type="radio" id="alcoholic-no" name="alcoholic" value="no">
                    <label for="alcoholic-no">No</label>
                </div>

                <div class="button-container">
                    <a href="form.php"><button type="button" id="prevButton">Previous</button></a>
                    <input type="submit" id="nextButton" value="Submit">
                </div>

                <div class="progress-container">
                    <div class="circle" id="circle1">1</div>
                    <div class="line"></div>
                    <div class="circle" id="circle2">2</div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
