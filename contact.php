<?php
include 'header.php';

// session_start();
if(!isset($_SESSION)) 
    { 
        if ($_SESSION['result']) {
            echo $_SESSION['result'];
            $_SESSION['result'] = NULL;
        }
    } 


?>

<script language="Javascript">
    function hideQuery(x) {
        if (x.checked) {
            document.getElementById("query").style.visibility = "hidden";
            document.getElementById("booking").style.visibility = "visible";
        }
    }

    function hideBooking(x) {
        if (x.checked) {
            document.getElementById("booking").style.visibility = "hidden";
            document.getElementById("query").style.visibility = "visible";
        }
    }
</script>

<div class="contactUs">

    <h1 class="contactUsTitle">Contact Us Here</h1>
    <label>Booking</label>
    <input type="radio" name="selection" onchange="hideQuery(this)" checked> |
    <input type="radio" name="selection" onchange="hideBooking(this)">
    <label class="queryLabel">Query or Complaint</label>


    <div id="query" style="visibility: hidden">
        <div class="queryFormWrapper">
            <h2 class="contactUsTitle">Submit query or complaint</h2>

            <div class="contactInfo">
                <p>
                    +356 2112 3456
                    <br>
                    chummbuket@gmail.com
                    <br>
                    If you have any queries, feel free to contact us using the form below!
                </p>
            </div>
            <form method="POST" name="queryEmailForm" action="emailFunctions/queryEmail.php">
                <div class="formWrapper2">
                    <label>First Name</label>
                    <input class="input" type="text" name="firstName" placeholder="Enter first name">
                    <br>
                    <label>Last Name</label>
                    <input class="input" type="text" name="lastName" placeholder="Enter last name" required>
                    <br>
                    <label>Email</label>
                    <input class="input" type="email" name="email" placeholder="Enter email address" required>
                    <br>
                    <label>Message</label>
                    <textarea class="input" name="message" placeholder="Enter message..." required></textarea>
                    <br>
                </div>
                <button class="btn">
                    <span>
                        Submit
                    </span>
                </button>
            </form>
        </div>
    </div>
    <div id="booking">
        <div class="bookingFormWrapper">
            <h2 class="contactUsTitle">Request a table</h2>

            <div class="contactInfo">
                <p>
                    +356 2112 3456
                    <br>
                    chummbuket@gmail.com
                    <br>
                    If you have any queries, feel free to contact us using the form below!
                </p>
            </div>

            <form method="POST" name="bookingEmailForm" action="emailFunctions/bookingEmail.php">
                <div class="formWrapper2">
                    <label>First Name</label>
                    <input class="input" type="text" name="firstName" placeholder="Enter first name" required>
                    <br>
                    <label>Last Name</label>
                    <input class="input" type="text" name="lastName" placeholder="Enter last name" required>
                    <br>
                    <label>Contact Number</label>
                    <input class="input" type="text" name="contactNumber" placeholder="Enter contact number" required>
                    <br>
                    <label>Email</label>
                    <input class="input" type="email" name="email" placeholder="Enter email address" required>
                    <br>
                    <label>Date</label>
                    <input class="input" type="date" name="date" min=<?php echo date('Y-m-d'); ?> value=<?php echo date('Y-m-d'); ?>>
                    <span class="validity"></span>
                    <br>



                    <label>Time</label>
                    <select class="input" type="text" name="time">
                        <option value="09:00"> 09:00am </option>
                        <option value="09:30"> 09:30am </option>
                        <option value="10:00"> 10:00am </option>
                        <option value="10:30"> 10:30am </option>
                        <option value="11:00"> 11:00am </option>
                        <option value="11:30"> 11:30am </option>
                        <option value="12:00"> 12:00pm </option>
                        <option value="12:30"> 12:30pm </option>
                        <option value="13:00"> 01:00pm </option>
                        <option value="13:30"> 01:30pm </option>
                        <option value="14:00"> 02:00pm </option>
                        <option value="14:30"> 02:30pm </option>
                        <option value="15:00"> 03:00pm </option>
                        <option value="15:30"> 03:30pm </option>
                        <option value="16:00"> 04:00pm </option>
                        <option value="16:30"> 04:30pm </option>
                        <option value="17:00"> 05:00pm </option>
                        <option value="17:30"> 05:30pm </option>
                        <option value="18:00"> 06:00pm </option>
                        <option value="18:30"> 06:30pm </option>
                        <option value="19:00"> 07:00pm </option>
                        <option value="19:30"> 07:30pm </option>
                        <option value="20:00"> 08:00pm </option>
                        <option value="20:30"> 08:30pm </option>
                        <option value="21:00"> 09:00pm </option>
                        <option value="21:30"> 09:30pm </option>
                        <option value="22:00"> 10:00pm </option>
                    </select>
                    <small>Bookings are availible from 9am till 10pm for every 30 minutes</small>
                    <br>
                    <label>Party size</label>
                    <input class="input" type="number" name="numOfPeople" value="1" min="1">
                    <span class="validity"></span>
                    <br>
                    <label>Notes</label>
                    <textarea class="input" name="note" placeholder="Prefer indoor/outdoor, need highchair etc.."></textarea>
                    <br>
                    <button class="btn">
                        <span>
                            Submit
                        </span>
                    </button>
            </form>
        </div>
    </div>
</div>
</div>

<?php
include 'footer.php'
?>