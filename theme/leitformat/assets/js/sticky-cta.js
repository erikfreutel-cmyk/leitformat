// Fester Mobil-Button „Anfragen": nur wenn die Seite #anfrage hat, ab 600 px Scroll.
(() => {
	const bar = document.querySelector('.lf-sticky-cta');
	if (!bar || !document.getElementById('anfrage')) return;
	bar.hidden = false;
	const update = () => bar.classList.toggle('is-visible', window.scrollY > 600);
	addEventListener('scroll', update, { passive: true });
	update();
})();
