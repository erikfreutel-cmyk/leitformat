// Wert-Rechner Interview-Podcast: Folgen × Beziehungen × Abschluss × Kundenwert.
document.querySelectorAll('[data-lf-rechner]').forEach((form) => {
	const eur = new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR', maximumFractionDigits: 0 });
	const num = new Intl.NumberFormat('de-DE', { maximumFractionDigits: 1 });
	const update = () => {
		const v = (n) => Math.max(0, Number(form.elements[n].value) || 0);
		const kunden = v('folgen') * (v('beziehung') / 100) * (v('abschluss') / 100);
		form.querySelector('[data-lf-kunden]').textContent = num.format(kunden);
		form.querySelector('[data-lf-umsatz]').textContent = eur.format(kunden * v('wert'));
	};
	form.addEventListener('input', update);
	update();
});
