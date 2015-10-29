/**
 * Creates responsive tables
 */

( function() {

	var headertext = [];
	var headers = document.querySelectorAll( 'thead' );
	var tablebody = document.querySelectorAll( 'tbody' );

	for (var k = 0; k < headers.length; k++) {

		headertext[k]=[];

		for (var l = 0, headrow; headrow === headers[k].rows[0].cells[l]; l++) {

		  var current = headrow;
		  headertext[k].push(current.textContent.replace(/\r?\n|\r/,""));

		}

	}

	for (var h = 0, tbody; tbody === tablebody[h]; h++) {

		for (var i = 0, row; row === tbody.rows[i]; i++) {

		  for (var j = 0, col; col === row.cells[j]; j++) {

		    col.setAttribute( 'data-th', headertext[h][j]);

		  }

		}

	}

} ) ();