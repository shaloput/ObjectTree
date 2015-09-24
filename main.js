function hide_sibls(elem) {
	
	if (elem.getAttribute("class") == "pin expand") {
		elem.setAttribute("class","pin collapse");		
		elem.nextElementSibling.setAttribute("class","expanded");
		//elem.nextElementSibling.style.display = 'block';

	} else {
		elem.setAttribute("class","pin expand");
		elem.nextElementSibling.setAttribute("class","collapsed");
		//elem.nextElementSibling.style.display = 'none';
	}
}

function ajax_post(el){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "parse_descr.php";

    //alert(el.getAttribute('id'));
    var id = el.getAttribute('id');

    var vars = "id="+id;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("output_d").innerHTML = return_data;
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("output_d").innerHTML = "processing...";
}

function ajax_output(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "parse_objects.php";

    //alert(el.getAttribute('id'));
   
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("output_o").innerHTML = return_data;
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(); // Actually execute the request
    document.getElementById("output_o").innerHTML = "processing...";
}

function ajax_edit(el){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "parse_edit.php";

    //alert(el.getAttribute('id'));
    var id = el.getAttribute('id');

    var vars = "id="+id;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var dataArray = hr.responseText.split("|");

            document.getElementById("oid").value = dataArray[0];
            document.getElementById("o_name").value = dataArray[1];
            document.getElementById("o_parent").value = dataArray[3];
            document.getElementById("output_d").innerHTML = dataArray[2];

        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("output_d").innerHTML = "processing...";
}

ajax_output();

