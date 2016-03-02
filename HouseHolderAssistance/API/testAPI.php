<?php

//Login
// $fakeParams = '{"action":"login", "id":1, "password":"mar123", "type":"S", "deviceID":"354360070115472", "wifiMac":"64:BC:0C:83:B2:E6"}';

// Get Student by class ID
// $fakeParams = '{"action":"getClassStudents", "classId":1}';


// Get Student by parent ID
// $fakeParams = '{"action":"getParentStudents", "parentId":3}';

// Regular Report 
// $fakeParams = '{"action":"regularReport","id":1,"datetime":"2016-01-12 16:17:14","batt":42,"signal":99,"pos":{"lat":22.320366,"lng":114.211284,"dt":"2016-01-12 16:16:42","acy":37.5,"att":0, "gpsStatus":1},"movement":3}';
// $fakeParams = '{"id":1,"action":"regularReport","signal":99,"batt":20,"datetime":"2016-01-18 16:19:30","movement":-1,"pos":{"att":0,"dt":"2016-01-18 16:17:31","acy":42.5880012512207,"lng":114.2111699,"gpsStatus":1,"lat":22.3205339}}';


// Get Class
// $fakeParams = '{"action":"getClasses"}';

// Set Place
// $fakeParams = '{"action":"setSafetyPlace","lat":22.33938444309968,"lng":114.16852042078972,"radius":149.4819793701172,"parentId":3}';

// Get Student
// $fakeParams = '{"action":"getStudent", "userId":1}';


// Test Inout Model
// $fakeParams = '{"action":"testInArea"}';





///////////////////////// Panic /////////////////////////////
// Submit Panic
// $fakeParams = '{"action":"submitPanic", "userId":1}';
///////////////////////// Notification //////////////////////
// Get Notification
// $fakeParams = '{"action":"getNotifications", "userId":3}';
//////////////////////  Place ///////////////////////
// Add Place
$fakeParams = '{"action":"addCheckPoint", "userId":"2", "placeName":"Home", "lat":22.33938444309968, "lng":114.16852042078972,"radius":149.4819793701172}';
// Update Place
// $fakeParams = '{"action":"updateCheckPoint", "placeId":"9", "placeName":"Home2", "lat":23.33938444309968, "lng":115.16852042078972,"radius":150.4819793701172}';
// Remove Place
// $fakeParams = '{"action":"removeCheckPoint", "placeId":9}';
// Get Places
// $fakeParams = '{"action":"getCheckPoint", "observeeId":8}';
////////////////////////////////////////////////////////////

