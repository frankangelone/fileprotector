$(function() {
	
	   var filePath = location.pathname + location.search;
	
	   if (filePath == "/file.html?=passcodeincorrect") {
	       alert("The passcode is incorrect.  Please try again.");
	   } else if (filePath == "/file.html?=filesent") {
	       alert("The file was sent to the shared drive successfully.");
	   } else if (filePath == "/file.html?=none") {
	       alert("That file does not exist");
	   } else if (filePath == "/file.html?=nofileentered") {
	       alert("No filename was enetered.");
	   } else if (filePath == "/file.html?=noresultsfound") {
	       alert("That is not a valid password.");
	   } else if (filePath == "/file.html?=nopasswordentered") {
	       alert("You must enter a password to download files.");
	   }
	
});
