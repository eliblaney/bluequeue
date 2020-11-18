// Translates home page English/Spanish

var lang = {
	// English
	'en': {
		'login': 'Log in',
		'logout': 'Log out',
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
		'login': 'Iniciar sesión',
		'logout': 'Cerrar sesión',
		'title': 'BlueQueue',
		'subtitle': 'Jugar, hacer ejercicio, lograr.',
		'reservenow': 'Reservar Ahora',
		'sqft': 'pies cuadrados',
		'weightcardio': 'Sala de pesas/cardio',
		'multipurpose': 'Sala multipropósito',
		'lapsmi': 'vueltas/minuto',
		'card1title': 'Hacer más.',
		'card1text': 'Reserve un intervalo de tiempo y mantenga a la gente a salvo.',
		'card2title': 'Aprende Más.',
		'card1button': 'Haga una Reservación',
		'card2text': 'Obtenga más información sobre el KFC y lo que puede hacer para ayudar.',
		'card2button': 'Leer Más',
		'content1title': 'Gimnasio Kiewit',
		'content1subtitle': 'Haz más en Creighton.',
		'desc1': 'En el gimnasio Kiewit, disfrute de características elites como:',
		'desc2': 'Sala de pesas/cardio',
		'desc3': 'Sala multipropósito',
		'desc4': 'Vestuarios con saunas',
		'desc5': 'Cancha de Racquetball',
		'desc6': 'Cancha de Squash',
		'desc7': 'Cancha de Baloncesto',
		'desc8': 'Cancha de Voleibol',
		'desc9': 'Cancha de Tennis',
		'desc10': 'Cancha de Badminton',
		'desc11': 'Pista de atletismo de tres carriles',
		'content2title': '¿Necesita ayuda?',
		'content2subtitle': 'Comuníquese con nosotros enviando un correo electrónico a recreation@creighton.edu or o llamando al (402)&nbsp;280-2114.',
		'home': 'Página Principal',
		'about': 'Acerca de Nosotros',
		'reserve': 'Reservar',
		'admin': 'Administración',
		'translate': 'Inglés'
	}
};
// This variable keeps track of which language is currently being used
var translateIndex = 0;

// These are the tags that are translatable
var textTags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'a', 'li', 'span'];

// This function does the translation
window.translate = function(langCode) {
	// If no language specified, just go to the next language in the array
	if(langCode === undefined) {
		var keys = Object.keys(lang);
		translateIndex = (translateIndex + 1) % keys.length;
		langCode = keys[translateIndex];
	}
	// Get each element that can be translated and do the translation
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
