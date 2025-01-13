<?php
session_start();
include("connection.php");
mysqli_query($con, 'SET FOREIGN_KEY_CHECKS = 0');

if(isset($_GET['submit1']))
   { 
    $mobile=$_GET['phone'];
    $name=$_GET['name'];

    $pid=$_GET['pid'];
    $sid=$_GET['sid'];
    $name=$_GET['name'];
    $email=$_GET['email'];
    $adate=$_GET['adate'];
    $bid=$_SESSION['uid'];
    $msg=$_GET['message'];

    // $atime=$_POST['atime'];
    $phone=$_GET['phone'];
    $aptnumber = mt_rand(100000000, 999999999);
  
    $sql="SELECT * from seller where sid='$sid'";
    $result= mysqli_query($con,$sql);

    $srow=mysqli_fetch_assoc($result);
    $sname=$srow["username"];  
    $scontact=$srow["contact"];

    $query=mysqli_query($con,"insert into appointment(appointment_no,name,email,sid,bid,pid,date,contact,comment,status) value('$aptnumber','$name','$email','$sid','$bid','$pid','$adate','$phone','$msg','pending')");
    if ($query) {

     include('whatsapp.php');
     $to=$phone; 

     $body="Your appointment request is send successfully. \n Appointment no. is $aptnumber"; 
     $api=$client->sendChatMessage($to,$body);
    
}
   }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMTPJS TUT</title>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
</head>
<body>
    <form id="submit" action="#">
         <input type="email" id="email" placeholder="Enter email..." value="<?php echo $email ?>" hidden>
        <input type="text" id="fname" placeholder="Enter First Name..." value="<?php echo $name ?>" hidden >
        <input type="hidden" id="aptnum" value="<?php echo $aptnumber ?>">
        <input type="hidden" id="adate" value="<?php echo $adate ?>">
        <input type="hidden" id="sname" value="<?php echo $sname ?>">
        <input type="hidden" id="scontact" value="<?php echo $scontact ?>">

    </form>
    
    <script src="./index.js"></script> 
    <script>
         const email = document.getElementById('email');
        // const fname = document.getElementById('fname');
        // const lname = document.getElementById('lname');

        Email.send({
            Host : "smtp.elasticemail.com",
            Username : "meetsakariya111@gmail.com",
            Password : "5D41A36E9E6D0940CD16CD4D22EE41AD7159",
            To : email.value,
            From : "meetsakariya111@gmail.com",
            Subject : " Successful Appointment Booking",
            Body : `
            Dear ${fname.value},<br><br>

                 I hope this email finds you well.
                 I wanted to inform you that your appointment has been successfully booked with ${sname.value}. 
                 We look forward to meeting with you on ${adate.value} .<br><br><br>
                 Appointment Details:<br><br>

                 Owner Name :${sname.value}<br> 
                 Owner Conact num : ${scontact.value}<br>
                 Apponitment Number :${aptnum.value}<br>

                 Date: ${adate.value}<br><br>
               
                  Thank You,<br>
                <br>Best regards

                
                            `
        }).then(
    message => {
        alert("Your Appointment Book successfully. Appointment number is sent your email and whatsapp number.");
        window.location.href = "property-grid.php";
    }
);






        // window.location.href="property.grid.php";
    </script>
</body>
</html>





















<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMTPJS TUT</title>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
</head>
<body>
    <form id="submit" action="#">
    <input type="email" id="email" placeholder="Enter email...">

        <input type="text" id="fname" placeholder="Enter First Name...">
        <input type="text" id="lname" placeholder="Enter Last Name...">
        <input type="submit" value="Send">
    </form>

    
    
    <script src="./index.js"></script> 
    <script>
                const email = document.getElementById('email');

        const fname = document.getElementById('fname');
const lname = document.getElementById('lname');
const submit = document.getElementById('submit');

submit.addEventListener('submit',(e)=>{
    e.preventDefault();
    let ebody = `
    <h1>First Name: </h1>${fname.value}
    <br>
    <h1>Last Name: </h1>${lname.value}
    `; -->

<!-- //     Email.send({
//         SecureToken : "e72e473c-0cb1-4887-8b3e-87590bcc8888", //add your token here
//         To : email.value, 
//         From : "meetsakariya111@gmail.com",
//         Subject : "This is the subject",
//         Body : ebody
//     }).then(
//       message => alert(message)
//     );
// }); -->

<!-- Email.send({
    Host : "smtp.elasticemail.com",
    Username : "meetsakariya111@gmail.com",
    Password : "5D41A36E9E6D0940CD16CD4D22EE41AD7159",
    To : 'meetssakariya@gmail.com',
    From : "meetsakariya111@gmail.com",
    Subject : "This is the subject",
    Body : "And this is the body"
}).then(
  message => alert(message)
);
});
 -->
    <!-- </script>
</body>
</html> -->



















 <!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMTPJS TUT</title>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
</head>
<body>
    <form id="submit" action="#">
        <input value="<?php echo $email ?>" id="fname" placeholder="Enter First Name...">
        <input value="<?php echo $name ?>" id="lname" placeholder="Enter Last Name...">
        <input type="submit" value="Send">
    </form>

    
    
     <script src="./index.js"></script> 
    <script>
        const fname = document.getElementById('fname');
const lname = document.getElementById('lname');
const submit = document.getElementById('submit');

submit.addEventListener('submit',(e)=>{
    e.preventDefault();
    let ebody = `
    <h1>First Name: </h1>${fname.value}
    <br>
    <h1>Last Name: </h1>${lname.value}
    `;

    Email.send({
        SecureToken : "e72e473c-0cb1-4887-8b3e-87590bcc8888", //add your token here
        To : 'meetsakariya101@gmail.com', 
        From : "meetsakariya111@gmail.com",
        Subject : "This is the subject",
        Body : ebody
    }).then(
      message => alert(message)
    );
});

    </script>
</body>
</html> -->





<?php
    // $apno = 123123123;
    // $name="Ms101 ";
    // echo '<script src="https://smtpjs.com/v3/smtp.js"></script>';
    // echo '<script>
       
    //         const ano = ' . $name . ';
           
                
    //             let ebody = `Your Appointment Request is Successfully Sent<br>Appointment no. is ${ano}`;

    //             Email.send({
    //                 SecureToken: "e72e473c-0cb1-4887-8b3e-87590bcc8888", // Add your token here
    //                 To: "meetsakariya101@gmail.com",
    //                 From: "meetsakariya111@gmail.com",
    //                 Subject: "Appointment Request",
    //                 Body: ebody
    //             }).then(message => {
    //                 alert(message);
    //             });
          

    // </script>';
   
    
    

?>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    < <form id="submit" action="#">
        <input id="email" placeholder="Enter email..." value="<?php $email ?>">
        <input type="text" id="ano" placeholder="Enter Appointment Number...">
        <input type="submit" value="Send">
    </form> 

    




    </body>
</html> -->
