// Translates home page English/Spanish

var lang = {
	// English
	'en': {
		'login': 'Log in',
		'title': 'BlueQueue',
		'subtitle': 'Play, work, achieve.',
		'reservenow': 'Reserve Now',
		'sqft': 'sq ft',
		'weightcardio': 'Weight/cardio room',
		'multipurpose': 'Multi-purpose room',
		'lapsmi': 'laps/mi',
		'card1title': 'Do More.',
		'card1text': 'Reserve a time slot, and keep people safe.',
		'card2title': 'Learn More.',
		'card1button': 'Make Reservation',
		'card2text': 'Find out more about the KFC and what you can do to help.',
		'card2button': 'Read More',
		'content1title': 'Kiewit Fitness Center',
		'content1subtitle': 'Do more at Creighton.',
		'desc1': 'At the Kiewit Fitness Center, enjoy elite features like:',
		'desc2': 'Weight/cardio room',
		'desc3': 'Multi-purpose room',
		'desc4': 'Locker rooms with saunas',
		'desc5': 'Racquetball courts',
		'desc6': 'Squash courts',
		'desc7': 'Basketball courts',
		'desc8': 'Volleyball courts',
		'desc9': 'Tennis courts',
		'desc10': 'Badminton courts',
		'desc11': 'Three-lane running track',
		'content2title': 'Need help?',
		'content2subtitle': 'Reach out to us by emailing recreation@creighton.edu or by calling (402)&nbsp;280-2114.',
		'home': 'Home',
		'about': 'About',
		'reserve': 'Reserve',
		'admin': 'Administration',
		'translate': 'Español'
	},
	// Spanish
	'es': {
		'login': 'Log in',
		'title': 'BlueQueue',
		'subtitle': 'Play, work, achieve.',
		'reservenow': 'Reserve Now',
		'sqft': 'sq ft',
		'weightcardio': 'Weight/cardio room',
		'multipurpose': 'Multi-purpose room',
		'lapsmi': 'laps/mi',
		'card1title': 'Do More.',
		'card1text': 'Reserve a time slot, and keep people safe.',
		'card2title': 'Learn More.',
		'card1button': 'Make Reservation',
		'card2text': 'Find out more about the KFC and what you can do to help.',
		'card2button': 'Read More',
		'content1title': 'Kiewit Fitness Center',
		'content1subtitle': 'Do more at Creighton.',
		'desc1': 'At the Kiewit Fitness Center, enjoy elite features like:',
		'desc2': 'Weight/cardio room',
		'desc3': 'Multi-purpose room',
		'desc4': 'Locker rooms with saunas',
		'desc5': 'Racquetball courts',
		'desc6': 'Squash courts',
		'desc7': 'Basketball courts',
		'desc8': 'Volleyball courts',
		'desc9': 'Tennis courts',
		'desc10': 'Badminton courts',
		'desc11': 'Three-lane running track',
		'content2title': 'Need help?',
		'content2subtitle': 'Reach out to us by emailing recreation@creighton.edu or by calling (402)&nbsp;280-2114.',
		'home': 'Home',
		'about': 'About',
		'reserve': 'Reserve',
		'admin': 'Administration',
		'translate': 'English'
	}
};
var translateIndex = 0;

var textTags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'a', 'li', 'span'];

window.translate = function(langCode) {
	if(langCode === undefined) {
		var keys = Object.keys(lang);
		translateIndex = (translateIndex + 1) % keys.length;
		langCode = keys[translateIndex];
	}
	for(var i in textTags) {
		var t = textTags[i];
		var els = document.getElementsByTagName(t);
		for(var j in els) {
			var el = els[j];
			if(el.dataset && el.dataset.tln) {
				el.innerHTML = lang[langCode][el.dataset.tln];
			}
		}
	}
}
