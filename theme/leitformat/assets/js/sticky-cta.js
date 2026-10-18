// Fester Mobil-Button „Anfragen": nur wenn die Seite #anfrage hat, ab 600 px Scroll.
(() => {
	const bar = document.querySelector('.lf-sticky-cta');
	if (!bar || !document.getElementById('anfrage')) return;
	bar.hidden = false;
	const mobil = matchMedia('(max-width: 767px)');
	const update = () => bar.classList.toggle('is-visible', mobil.matches && window.scrollY > 600);
	mobil.addEventListener('change', update);
	addEventListener('scroll', update, { passive: true });
	update();
})();
