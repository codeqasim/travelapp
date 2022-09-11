// INCLUDE VIEWS
$('#header').load('views/inc/header.html');
$('#footer').load('views/inc/footer.html');

// GET AND SET SESSIONS FUNCTION 
function get(item){ return window.sessionStorage.getItem(item); }
function set(item, value){ window.sessionStorage.setItem(item, value); }
