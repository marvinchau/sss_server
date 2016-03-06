<?php

// Get Student by class ID
// $fakeParams = '{"action":"getClassStudents", "classId":1}';




// Get Class
// $fakeParams = '{"action":"getClasses"}';

// Set Place
// $fakeParams = '{"action":"setSafetyPlace","lat":22.33938444309968,"lng":114.16852042078972,"radius":149.4819793701172,"parentId":3}';



// Test Inout Model
// $fakeParams = '{"action":"testInArea"}';



////////////////////////// Regular Report //////////////////////////
// $fakeParams = '{"action":"regularReport","id":1,"datetime":"2016-01-12 16:17:14","batt":42,"signal":99,"pos":{"lat":22.320366,"lng":114.211284,"dt":"2016-01-12 16:16:42","acy":37.5,"att":0, "gpsStatus":1},"movement":3}';
// $fakeParams = '{"id":1,"action":"regularReport","signal":99,"batt":20,"datetime":"2016-03-03 16:19:30","movement":-1,"pos":{"att":0,"dt":"2016-01-18 16:17:31","acy":42.5880012512207,"lng":114.2111699,"gpsStatus":1,"lat":22.3205339}}';
////////////////////////// Observee ///////////////////////
// Get Observees by observer ID
//  $fakeParams = '{"action":"getParentStudents", "parentId":3}';
// Get Observee
// $fakeParams = '{"action":"getStudent", "userId":4}';
///////////////////////// Login ///////////////////////////////
//Login
// $fakeParams = '{"action":"login", "name":"teacher", "password":"mar123", "type":"P", "deviceID":"354360070115472", "wifiMac":"64:BC:0C:83:B2:E6"}';
///////////////////////// Panic /////////////////////////////
// Submit Panic
// $fakeParams = '{"action":"submitPanic", "userId":1}';
///////////////////////// Notification //////////////////////
// Get Notification
// $fakeParams = '{"action":"getNotifications", "userId":3}';
//////////////////////  Place ///////////////////////
// Add Place
// $fakeParams = '{"action":"addCheckPoint", "userId":"2", "placeName":"Home", "lat":22.33938444309968, "lng":114.16852042078972,"radius":149.4819793701172}';
// Update Place
// $fakeParams = '{"action":"updateCheckPoint", "placeId":"9", "placeName":"Home2", "lat":23.33938444309968, "lng":115.16852042078972,"radius":150.4819793701172}';
// Remove Place
// $fakeParams = '{"action":"removeCheckPoint", "placeId":9}';
// Get Places
// $fakeParams = '{"action":"getCheckPoint", "observeeId":4}';
////////////////////////////////////////////////////////////
//Submit attendance 
$fakeParams = '{"action":"submitAttendance", "observerId":"2", "datetime":"2016-03-06 00:00:00", "attendRecords":[{"observeeId":1, "attend":true},{"observeeId":2, "attend":false}]}';




/////////////////////// Web API ////////////////////
//Login
// $fakeParams = '{"action":"login", "name":"admin", "password":"mar123", "type":"A"}';
//Add User
// $fakeParams = '{"action":"addUser", "name":"observer3", "password":"mar123", "type":"O"}';
//Update User Status
// $fakeParams = '{"action":"updateUserStatus", "userId":"10", "status":"N"}';
//Get User by Type
// $fakeParams = '{"action":"getUsers", "type":"P"}';
//Get Group Observees by Observer Id
// $fakeParams = '{"action":"getGroupObservees", "userId":"2"}';
//Update Group Observees
// $fakeParams = '{"action":"updateGroupObservees", "observerId":"2", "observeeIds":[1, 4, 6]}';
//Get Location by Date and OBservee
// $fakeParams = '{"action":"getObserveeLocationByDate", "observeeId":6, "date":"2016-03-04"}';


