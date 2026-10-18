// UTM und gclid: ins Formular (Hidden-Felder). Gespeichert (Cookie 30 Tage, erster Kontakt) nur mit Einwilligung.
(() => {
	const FELDER = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'gclid'];
	const ausUrl = {};
	const q = new URLSearchParams(location.search);
	FELDER.forEach((f) => { if (q.get(f)) ausUrl[f] = q.get(f).slice(0, 200); });
	const lesen = () => {
		try { return JSON.parse(decodeURIComponent((document.cookie.match(/(?:^|; )lf_attr=([^;]+)/) || [])[1] || '{}')); } catch (e) { return {}; }
	};
	const speichern = () => {
		if (!Object.keys(ausUrl).length || Object.keys(lesen()).length) return; // erster Kontakt zählt
		document.cookie = `lf_attr=${encodeURIComponent(JSON.stringify(ausUrl))}; Max-Age=${60 * 60 * 24 * 30}; Path=/; SameSite=Lax; Secure`;
	};
	const einwilligung = () => /(?:^|; )lf_consent=all(?:;|$)/.test(document.cookie);
	if (einwilligung()) speichern();
	document.addEventListener('lf:consent', (e) => { if (e.detail === 'all') speichern(); fuellen(); });
	const fuellen = () => {
		const werte = Object.assign({}, einwilligung() ? lesen() : {}, ausUrl);
		document.querySelectorAll('[data-lf-attr]').forEach((i) => { i.value = werte[i.dataset.lfAttr] || ''; });
	};
	fuellen();
})();
