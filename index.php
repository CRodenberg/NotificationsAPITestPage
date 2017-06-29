<head>
	<title>Test Notifications</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>


<script>

//getNotifications takes in the userID and target location on the page, and calls to notifications.php to receive all of
//the notifications for the given user. If the returned json contains notifications, the function will output the first 3 notifications' titles and bodies
//along with any necessary buttons for getAll/getUnread
//Developer: Cole Rodenberg Date: 6/29/17
function getNotifications(userID, target) {
	var destination = "responsedata" + target;
    if (userID.length == 0) { 
        document.getElementById(destination).innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            	var notificationInfo = JSON.parse(this.responseText);
            	var notificationsOutput = 'Total Notifications: ' + notificationInfo.length + '</br>';

            	if(notificationInfo.length > 3){
            		for(var i = 0; i < 3; i++){
            			notificationsOutput += notificationInfo[i].title + ' ' + notificationInfo[i].body;
            			notificationsOutput += '</br>';
            		}
            		notificationsOutput += '<button onclick="getAllNotifications(' + userID + ', ' + target + ')">See All</button>';
            		notificationsOutput += '<button onclick="getAllUnreadNotifications(' + userID + ', ' + target + ')">See Unread</button>';
            	} else if(notificationInfo.length == 3){
            		for(var i = 0; i < 3; i++){
            			notificationsOutput += notificationInfo[i].title + ' ' + notificationInfo[i].body;
            			notificationsOutput += '</br>';
            		}
            	} else if(notificationInfo.length < 3){
            		for(var i in notificationInfo){
            			notificationsOutput += notificationInfo[i].title + ' ' + notificationInfo[i].body;
            			notificationsOutput += '</br>';            			
            		}
            	}
            	

                document.getElementById(destination).innerHTML = notificationsOutput;
            }
        }
        xmlhttp.open("GET", "notifications.php?customerID=" + userID, true);
        xmlhttp.send();
    }
}

//getAllNotifications takes in the userID and target location on the page, and calls to notifications.php to receive all of
//the notifications for the given user. If the returned json contains notifications, the function will output the notifications' titles and bodies
//along with the necessary button for See Less
//Developer: Cole Rodenberg Date: 6/29/17
function getAllNotifications(userID, target) {
	var destination = "responsedata" + target;
	if (userID.length == 0) { 
        document.getElementById(destination).innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            	var notificationInfo = JSON.parse(this.responseText);
            	var notificationsOutput = 'Total Notifications: ' + notificationInfo.length + '</br>';
        		
        		for(var i in notificationInfo){
        			notificationsOutput += notificationInfo[i].title + ' ' + notificationInfo[i].body;
        			notificationsOutput += '</br>';
        		}
        		notificationsOutput += '<button onclick="getNotifications(' + userID + ', ' + target + ')">See Less</button>';

                document.getElementById(destination).innerHTML = notificationsOutput;
            }
        }
        xmlhttp.open("GET", "notifications.php?customerID=" + userID, true);
        xmlhttp.send();
    }
}

//getUnreadNotifications takes in the userID and target location on the page, and calls to notifications.php to receive all of
//the notifications for the given user. If the returned json contains notifications, the function will check for the unread notifications
//and output the notifications' titles and bodies along with any necessary buttons for getAll/getUnread
//Developer: Cole Rodenberg Date: 6/29/17
function getAllUnreadNotifications(userID, target) {
	var destination = "responsedata" + target;
	if (userID.length == 0) { 
        document.getElementById(destination).innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            	var notificationInfo = JSON.parse(this.responseText);
            	var notificationsOutput = 'Total Notifications: ' + notificationInfo.length + '</br>';
        		
        		for(var i in notificationInfo){
        			if(notificationInfo[i].readFlag == "false"){
        				notificationsOutput += notificationInfo[i].title + ' ' + notificationInfo[i].body;
        				notificationsOutput += ' ' + notificationInfo[i].readFlag;
        				notificationsOutput += '</br>';
        			}
        			
        		}
        		notificationsOutput += '<button onclick="getAllNotifications(' + userID + ', ' + target + ')">See All</button>';
                document.getElementById(destination).innerHTML = notificationsOutput;
            }
        }
        xmlhttp.open("GET", "notifications.php?customerID=" + userID, true);
        xmlhttp.send();
    }
}

//Simple jQuery to hide/show the forms
var Tabs = {};

Tabs.SetTab = function(tab){
    jQuery('#NotificationBodyCreate').hide();
    jQuery('#NotificationBodyUpdate').hide();
    jQuery('#NotificationBodyDelete').hide();
    jQuery('#NotificationBodyDeleteAll').hide();
    jQuery('#NotificationBodyGetTop').hide();
    jQuery('#NotificationBodyGetAll').hide();
    jQuery('#NotificationBodyGetUnread').hide();


    if (tab === 'B1') {
        jQuery('#NotificationBodyCreate').show();
    } else if (tab === 'B2') {
        jQuery('#NotificationBodyUpdate').show();
    } else if (tab === 'B34') {
        jQuery('#NotificationBodyDelete').show();
        jQuery('#NotificationBodyDeleteAll').show();
    } else if (tab === 'B5') {
        jQuery('#NotificationBodyGetTop').show();
    } else if (tab === 'B6') {
    	jQuery('#NotificationBodyGetAll').show();
    } else if (tab === 'B7') {
        jQuery('#NotificationBodyGetUnread').show();
    }
}
</script>





<body>
	<div class="header">
		<h1 class = "title">Notification Test Page</h1>
		<div class="nav">
			<ul class = main-nav>
				<a href = "javascript:Tabs.SetTab('B1');"><li>
					Create
				</li></a>
				<a href = "javascript:Tabs.SetTab('B2');"><li>
					Update
				</li></a>
				<a href = "javascript:Tabs.SetTab('B34');"><li>
					Delete
				</li></a>
				<a href = "javascript:Tabs.SetTab('B5');"><li>
					GetTop
				</li></a>
				<a href = "javascript:Tabs.SetTab('B6');"><li>
					GetAll
				</li></a>
				<a href = "javascript:Tabs.SetTab('B7');"><li>
					GetUnread
				</li></a>
			</ul>
		</div>
	</div>
	
	<div class="database-section">

		<div id = "NotificationBodyCreate" class = "form-body">
			<h2>Database Functions</h2>
			<h4>Creating a Notification: CreateNotification</h4>
			<form action = "/create-notification.php" method = "get">
				Title:<br>
				<input type="text" name="title" placeholder="Title..."><br>
				Body:<br>
				<textarea id="body" rows ="4" cols="20"></textarea><br>
				Link To:<br>
				<input type="text" name="link" placeholder="Link to..."><br>
				Global:
				<input type="radio" name="global" value="Yes">Yes
				<input type="radio" name="global" value="No" checked>No<br>
				Date:
				<input type="date" name="startDate"><br>
				<input type="submit" value="Submit">
				<input type="reset">
			</form>
			<div id="Response1" class = "response-body">
				<h4>Response:</h4>
				<div id="responsedata1">
					
				</div>
			</div>
		</div>

		<div id = "NotificationBodyUpdate" class = "form-body">
			<h2>Database Functions</h2>
			<h4>Updating a Notification: UpdateNotification</h4>
			<form action = "/update-notification.php" method = "get">
				Title:<br>
				<input type="text" name="title" placeholder="Title..."><br>
				Body:<br>
				<textarea id="body" rows ="4" cols="20"></textarea><br>
				Link To:<br>
				<input type="text" name="link" placeholder="Link to..."><br>
				Global:
				<input type="radio" name="global" value="Yes">Yes
				<input type="radio" name="global" value="No" checked>No<br>
				Date:
				<input type="date" name="startDate"><br>
				<input type="submit" value="Submit">
				<input type="reset">
			</form>
			<div id="Response2" class = "response-body">
				<h4>Response:</h4>
				<div id="responsedata2">
					
				</div>
			</div>
		</div>

		<div id="NotificationBodyDelete" class = "form-body">
			<h2>Database Functions</h2>
			<h4>Deleting a Notification: DeleteNotication</h4>
			<form action = "/delete-notification.php" method = "get">
				Notification ID to Delete:<br>
				<input type="text" name="notificationID" placeholder="i.e. 37456"><br>
				<input type="submit" value="Submit">
				<input type="reset">
			</form>
			<div id="Response3" class = "response-body">
				<h4>Response:</h4>
				<div id="responsedata3">
					
				</div>
			</div>
		</div>

		<div id="NotificationBodyDeleteAll" class = "form-body">
			<h2>Database Functions</h2>
			<h4>Deleting all Notifications: DeleteAllNotications</h4>
			<form action = "/delete-notifications.php" method = "get">
				Delete All:<br>
				<input type="radio" name="deleteAll" value="Yes">Yes<br>
				<input type="radio" name="deleteAll" value="No" checked>No<br>
				<input type="submit" value="Submit">
				<input type="reset">
			</form>
			<div id="Response4" class = "response-body">
				<h4>Response:</h4>
				<div id="responsedata4">
					
				</div>
			</div>
		</div>
	</div>

	<div class="api-section">

		<div id="NotificationBodyGetTop" class = "form-body">
			<h2>API Calls</h2>
			<h4>Get Top Notifications: GetTopNotications</h4>
			<form id="get-top-form" method = "get">
				Customer ID:<br>
				<input type="text" name="customerID" placeholder="i.e. 37456"><br>
				<input type="button" value="Submit" onclick="getNotifications(customerID.value, 5)">
				<input type="reset">
			</form>
			<div id="Response5" class = "response-body">
				<h4>Response:</h4>
				<div id="responsedata5" class = "response-text">
					
				</div>
			</div>
		</div>

		<div id="NotificationBodyGetAll" class = "form-body">
			<h2>API Calls</h2>
			<h4>Get All Notifications: GetAllNotications</h4>
			<form id= "get-all-form" method = "get">
				Customer ID:<br>
				<input type="text" name="customerID" placeholder="i.e. 37456"><br>
				<input type="button" value="Submit" onclick="getAllNotifications(customerID.value, 6)">
				<input type="reset">
			</form>
			<div id="Response6" class = "response-body">
				<h4>Response:</h4>
				<div id="responsedata6" class = "response-text">
					
				</div>
			</div>
		</div>

		<div id="NotificationBodyGetUnread" class = "form-body">
			<h2>API Calls</h2>
			<h4>Get Unread Notifications: GetUnreadNotications</h4>
			<form method = "get">
				Customer ID:<br>
				<input type="text" name="customerID" placeholder="i.e. 37456"><br>
				<input type="button" value="Submit" onclick="getAllUnreadNotifications(customerID.value, 7)">
				<input type="reset">
			</form>
			<div id="Response7" class = "response-body">
				<h4>Response:</h4>
				<div id="responsedata7">
					
				</div>
			</div>
		</div>
	</div>
	

</body>

<?php

?>