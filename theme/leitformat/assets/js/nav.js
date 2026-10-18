// Mobilmenü: Overlay, Fokus-Falle, Esc schließt. Header-Button zum Anfrage-Block der Seite.
(() => {
	const cta = document.querySelector('[data-lf-cta]');
	if (cta && document.getElementById('anfrage')) cta.href = '#anfrage';
	const btn = document.querySelector('.lf-burger');
	const nav = document.getElementById('lf-nav');
	if (!btn || !nav) return;
	const items = () => [btn, ...nav.querySelectorAll('a')];
	const toggle = (open) => {
		btn.setAttribute('aria-expanded', open);
		btn.setAttribute('aria-label', open ? 'Menü schließen' : 'Menü öffnen');
		nav.classList.toggle('is-open', open);
		document.body.classList.toggle('lf-menu-open', open);
		if (!open) btn.focus();
	};
	btn.addEventListener('click', () => toggle(btn.getAttribute('aria-expanded') !== 'true'));
	nav.addEventListener('click', (e) => e.target.closest('a') && toggle(false));
	document.addEventListener('keydown', (e) => {
		if (!nav.classList.contains('is-open')) return;
		if (e.key === 'Escape') return toggle(false);
		if (e.key !== 'Tab') return;
		const list = items(), first = list[0], last = list[list.length - 1];
		if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
		else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
	});
	matchMedia('(min-width: 900px)').addEventListener('change', (m) => m.matches && nav.classList.contains('is-open') && toggle(false));
})();
