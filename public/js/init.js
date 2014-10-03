/*
	Prologue by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {

	skel.init({
		reset: 'full',
		breakpoints: {
			'global':	{ range: '*', href: 'css/style.css', containers: 1400, grid: { gutters: 40 }, viewport: { scalable: false } },
			'wide':		{ range: '961-1880', href: 'css/style-wide.css', containers: 1200, grid: { gutters: 40 } },
			'normal':	{ range: '961-1620', href: 'css/style-normal.css', containers: 960, grid: { gutters: 40 } },
			'narrow':	{ range: '961-1320', href: 'css/style-narrow.css', containers: '100%', grid: { gutters: 20 } },
			'narrower':	{ range: '-960', href: 'css/style-narrower.css', containers: '100%', grid: { gutters: 15 } },
			'mobile':	{ range: '-736', href: 'css/style-mobile.css', grid: { collapse: true } }
		},
		plugins: {
			layers: {
				sidePanel: {
					hidden: true,
					breakpoints: 'narrower',
					position: 'top-left',
					side: 'left',
					animation: 'pushX',
					width: 240,
					height: '100%',
					clickToHide: true,
					html: '<div data-action="moveElement" data-args="header"></div>',
					orientation: 'vertical'
				},
				sidePanelToggle: {
					breakpoints: 'narrower',
					position: 'top-left',
					side: 'top',
					height: '4em',
					width: '5em',
					html: '<div data-action="toggleLayer" data-args="sidePanel" class="toggle"></div>'
				}
			}
		}
	});

})(jQuery);