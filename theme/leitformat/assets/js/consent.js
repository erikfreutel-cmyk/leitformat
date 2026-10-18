// Consent-Banner: Auswahl 6 Monate im Cookie, Consent Mode v2 aktualisieren, im Footer wieder aufrufbar.
(() => {
	const box = document.querySelector('[data-lf-consent]');
	if (!box) return;
	const get = () => (document.cookie.match(/(?:^|; )lf_consent=(all|necessary)(?:;|$)/) || [])[1];
	const gtag = window.gtag || function () { (window.dataLayer = window.dataLayer || []).push(arguments); };
	const zeigen = () => { box.hidden = false; document.body.classList.add('lf-consent-offen'); };
	const setzen = (wahl) => {
		document.cookie = `lf_consent=${wahl}; Max-Age=${60 * 60 * 24 * 182}; Path=/; SameSite=Lax; Secure`;
		const g = wahl === 'all' ? 'granted' : 'denied';
		gtag('consent', 'update', { ad_storage: g, analytics_storage: g, ad_user_data: g, ad_personalization: g });
		window.dataLayer.push({ event: 'lf_consent', lf_consent: wahl });
		box.hidden = true;
		document.body.classList.remove('lf-consent-offen');
		document.dispatchEvent(new CustomEvent('lf:consent', { detail: wahl }));
	};
	box.addEventListener('click', (e) => {
		const b = e.target.closest('[data-lf-consent-wahl]');
		if (b) setzen(b.dataset.lfConsentWahl);
	});
	document.addEventListener('click', (e) => {
		if (!e.target.closest('[data-lf-consent-open], a[href="#cookie-einstellungen"]')) return;
		e.preventDefault();
		zeigen();
		box.querySelector('button').focus();
	});
	if (!get()) zeigen();
})();
