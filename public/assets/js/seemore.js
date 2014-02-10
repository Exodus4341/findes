// Accept a paragraph and return a formatted paragraph with additional html tags
	function formatWords(sentence, show) {

		// split all the words and store it in an array
		var words = sentence.split(' ');
		var new_sentence = '';

		// loop through each word
		for (i = 0; i < words.length; i++) {
	
			// process words that will visible to viewer
			if (i <= show) {
				new_sentence += words[i] + ' ';
				
			// process the rest of the words
			} else {
		
				// add a span at start
				if (i == (show + 1)) new_sentence += '... <span class="more_text hide">';		

				new_sentence += words[i] + ' ';
			
				// close the span tag and add read more link in the very end
				if (words[i+1] == null) new_sentence += '</span><a href="#" class="more_link"> &raquo; more</a>';
			} 		
		} 
	
		return new_sentence;

	}	