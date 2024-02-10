<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['student_number'] = $_POST['student-number'];
    $conn = new mysqli("localhost:3307", "root", "", "medical_db");

  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $student_number = $_POST['student-number'];
    $address = $_POST['address'];
    $school_year = $_POST['school-year'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $civil_status = $_POST['civil-status'];
    $course = $_POST['course'];
    $blood_type = $_POST['blood-type'];
    $email = $_POST['email'];
    $parent_guardian_spouse = $_POST['parent-guardian-spouse'];
    $landline = $_POST['landline'];
    $cellphone = $_POST['cellphone'];

    $sql = "INSERT INTO students (name, student_number, address, school_year, age, sex, civil_status, course, blood_type, email, parent_guardian_spouse, landline, cellphone) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

   
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssissssssss", $name, $student_number, $address, $school_year, $age, $sex, $civil_status, $course, $blood_type, $email, $parent_guardian_spouse, $landline, $cellphone);

   
    if ($stmt->execute()) {
        echo "<script>alert('Student information added successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }

    
    $stmt->close();
    $conn->close();

  
    header("Location: form2.php");
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forms.css">
    <script src="form.js"></script>
    <title>Student Information Form</title>
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
            <h1>HEALTH INFORMATION FORM FOR STUDENT</h1>
            <h2>PART I. STUDENT INFORMATION</h2>
            <h3>(Due to Covid 19 pandemic, physical examination, and chest x-ray submission as requirement for enrollment is temporary
                deferred, however, you will be asked to comply<br> with this upon resumption of face to face classes.)
            </h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name" id="names">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="student-number" id="id-number">PUP Student Number</label>
                        <input type="text" id="student-number" name="student-number" placeholder="Enter your student number" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="address" id="home">Home Address</label>
                        <input type="text" id="address" name="address" placeholder="Enter your permanent address" required>
                    </div>
                    <div class="form-group">
                        <label for="school-year" id="year">School Year</label>
                        <input type="text" id="school-year" name="school-year" placeholder="Enter your school year"required>
                    </div>
                </div>
                <div class="form-row3">
                    <div class="form-group">
                        <label for="age" id="ages">Age</label>
                        <input type="number" id="age" name="age" required>
                    </div>
                    <div class="form-group">
                        <label for="sex" id="sexes">Sex</label>
                        <select id="sex" name="sex" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="civil-status" id="civil">Civil Status</label>
                        <select id="status" name="civil-status" required>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widowed">Widowed</option>
                        </select>
                    </div>

                    <div class="form-group" id="blood-type-container">
                         <label for="blood-type" id="blood">Blood Type</label>
                         <select id="blood-type" name="blood-type" required>
                         <option value="A+">A+</option>
                         <option value="A-">A-</option>
                         <option value="B+">B+</option>
                         <option value="B-">B-</option>
                         <option value="AB+">AB+</option>
                         <option value="AB-">AB-</option>
                         <option value="O+">O+</option>
                         <option value="O-">O-</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="course" id="college">Course/College</label>
                        <input type="text" id="course" name="course" placeholder="Enter your course" required>
                    </div>
                   
                    </div>
                         <div class="form-row">
                             <div class="form-group">
                             <label for="email" id="email-address">Email Address</label>
                             <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                    </div>
                   <div class="form-row">
                    <div class="form-group">
                        <label for="landline" id="landline">Landline</label>
                        <input type="number" id="landlines" name="landline" placeholder="Enter your landline">
                    </div>
                 
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="parent-guardian-spouse" id="guardian">Parent's Name</label>
                        <input type="text" id="parent" name="parent-guardian-spouse" placeholder="Enter you parents name"required>
                    </div>
                </div>
                <div class="form-group">
                        <label for="cellphone" id="cel">Cellphone</label>
                        <input type="tel" id="cellphone" name="cellphone" placeholder="Enter you cellphone number" required>
                    </div>
                
                    
                </div>
                <a href="index.php"><button type="button" id="HomeButton">Home</button></a>
                <input type="hidden" name="form_type" value="form">
                <button type="submit" id="nextButton">Next</button>



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
