if (window.location !== window.parent.location) { 
    // In iframe
} else {	 
    window.location = "/error/not-authorized";
}