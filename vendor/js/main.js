

var data = document.querySelectorAll('.dropdown-menu-item').forEach( function(element, index) {
	element.onclick = function(event) {
		element.querySelector('.container__sidebar-menu-item__ul').classList.toggle("show");
	}
	
});


// COde click removed -> red background and status ->removed
var data = document.querySelectorAll('.member-interface__view-item .removed').forEach( function(element, index) {
	element.onclick = function(event) {
		element.style.backgroundColor = 'red';
	}
	
});


$(document).ready(function() {
    $('#view_product').DataTable();
} );