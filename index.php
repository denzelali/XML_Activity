<?php
$conn = mysqli_connect("localhost", "root", "", "xml_smpl");
$affectedRow = 0;

$xml = simplexml_load_file("xmldb.xml") 
    or die("ERROR: cannot create object");

foreach ($xml -> children() as $row){
    $employee_id = $row -> employee_id;
    $first_name = $row -> first_name;
    $last_name = $row -> last_name;
    $email = $row -> email;
    $phone_number = $row -> phone_number;
    $hire_date = $row -> hire_date;
    $job_id = $row -> job_id;
    $salary = $row -> salary;

    $sql = "INSERT INTO employees(employee_id,
                                  first_name,
                                  last_name,
                                  email,
                                  phone_number,
                                  hire_date,
                                  job_id,
                                  salary) VALUES ('".$employee_id."',
                                                '".$first_name."',
                                                '".$last_name."',
                                                '".$email."',
                                                '".$phone_number."',
                                                '".$hire_date."',
                                                '".$job_id."',
                                                '".$salary."')";
    $result = mysqli_query($conn, $sql);

    if(! empty($result)){
        $affectedRow ++;
    } else{
        $error_message = mysqli_error($conn)."\n";
    };


}
?>

<center>
        <h2>INSERT XML TO MYSQL USING PHP</h2>
        <h2>XML Data Storing in DB</h2>
        <h6>Denzel Aliwate - 2R1</h6>

        <?php
            if ($affectedRow > 0) {
             $message = $affectedRow. " Records inserted";
                }
            else{
                "No records inserted";
                }

                ?>

                <style>
                    body {
                        max-width: 550px;
                        font-family: Arial;
                    }
                    .affected-row{
                        background: #cae4ca;
                        padding: 10px;
                        margin-bottom: 20px;
                        border: #dab2b2 1px solid;
                        border-radius: 2px;
                        color: #5d5b5b;
                    }
                    .error-message{
                        background: #eac0c0;
                        padding: 10px;
                        margin-bottom: 20px;
                        border: #dab2b2 1px solid;
                        border-radius: 2px;
                        color: #5d5b5b;
                    }
                    </style>

                    <div class="affected-row">
                        <?php echo $message; ?>
                    </div>

                <?php if(! empty($error_message)) { ?>
                    <div class="error-message">
                    <?php echo n12br ($error_message); ?>
                    </div>
                <?php } ?>
            
</center>