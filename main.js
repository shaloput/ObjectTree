function hide_sibls(elem) {
	
	if (elem.getAttribute("class") == "pin expand") {
		elem.setAttribute("class","pin collapse");		
		elem.nextElementSibling.setAttribute("class","expanded");
		
	} else {
		elem.setAttribute("class","pin expand");
		elem.nextElementSibling.setAttribute("class","collapsed");
	}
	
}

