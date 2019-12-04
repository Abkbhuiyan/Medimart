function displayResult(item, val, text) {
    console.log(item);
    $('.alert').show().html('You selected <strong>' + val + '</strong>: <strong>' + text + '</strong>');
}

$(function () {

    $('#demo3').typeahead({
        source: [
		    { id: 1, full_name: 'Aciphin', first_two_letters: 'A' },
		    { id: 2, full_name: 'Adora', first_two_letters: 'A' },
		    { id: 3, full_name: 'Bimodin', first_two_letters: 'B' },
		    { id: 10, full_name: 'Valex', first_two_letters: 'V' }
	    ],
        display: 'full_name',
        itemSelected: displayResult
    });

 
});