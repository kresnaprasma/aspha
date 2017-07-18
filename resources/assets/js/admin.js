var nanobar = new Nanobar({
	target: document.getElementById('myDivId'),
	id: 'pageloadbar'
});

//move bar
nanobar.go( 30 ); // size bar 30%

// Finish progress bar
nanobar.go(100);

$('#check_all').change(function(){
	$('.checkin').not(this).prop('checked', this.checked);
});

function updateQueryStringParam(key, value) {
  var baseUrl = [location.protocol, '//', location.host, location.pathname].join(''),
  urlQueryString = document.location.search,
  newParam = key + '=' + value,
  params = '?' + newParam;

  // If the "search" string exists, then build params from it
  if (urlQueryString) {

      updateRegex = new RegExp('([\?&])' + key + '[^&]*');
      removeRegex = new RegExp('([\?&])' + key + '=[^&;]+[&;]?');

      if( typeof value == 'undefined' || value == null || value == '' ) { // Remove param if value is empty

          params = urlQueryString.replace(removeRegex, "$1");
          params = params.replace( /[&;]$/, "" );

      } else if (urlQueryString.match(updateRegex) !== null) { 
        // If param exists already, update it
          params = urlQueryString.replace(updateRegex, "$1" + newParam);
      } else { // Otherwise, add it to end of query string

          params = urlQueryString + '&' + newParam;
      }
  }
  var iurl = window.history.replaceState({}, "", baseUrl + params);
  window.location = baseUrl + params;
};