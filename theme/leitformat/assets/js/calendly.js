// Calendly: lädt per Klick oder nach Einwilligung (sobald sichtbar). Gebuchter Termin → dataLayer lf_termin (einmal).
(() => {
	const boxen = document.querySelectorAll('[data-lf-calendly]');
	if (!boxen.length) return;
	const laden = (box) => {
		if (box.dataset.geladen) return;
		box.dataset.geladen = '1';
		const f = Object.assign(document.createElement('iframe'), { src: box.dataset.lfCalendly, title: 'Termin mit Wolfgang Patz wählen', loading: 'lazy' });
		f.className = 'lf-termin__frame';
		box.replaceChildren(f);
	};
	boxen.forEach((box) => box.addEventListener('click', (e) => { if (e.target.closest('[data-lf-calendly-laden]')) laden(box); }));
	const auto = () => {
		if (!/(?:^|; )lf_consent=all(?:;|$)/.test(document.cookie) || !('IntersectionObserver' in window)) return;
		const io = new IntersectionObserver((es) => es.forEach((en) => { if (en.isIntersecting) { laden(en.target); io.unobserve(en.target); } }), { rootMargin: '200px' });
		boxen.forEach((b) => io.observe(b));
	};
	auto();
	document.addEventListener('lf:consent', (e) => { if (e.detail === 'all') auto(); });
	let gezaehlt = false;
	window.addEventListener('message', (e) => {
		if (e.origin !== 'https://calendly.com' || !e.data || e.data.event !== 'calendly.event_scheduled' || gezaehlt) return;
		gezaehlt = true;
		(window.dataLayer = window.dataLayer || []).push({ event: 'lf_termin' });
	});
})();
