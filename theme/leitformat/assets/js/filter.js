// Referenz-Filter ohne Reload: Buttons mit data-filter, Kacheln mit data-kat.
(() => {
	const bar = document.querySelector('[data-lf-filter]');
	if (!bar) return;
	const tiles = document.querySelectorAll('.lf-ref-grid [data-kat]');
	const status = document.querySelector('[data-lf-filter-status]');
	bar.addEventListener('click', (e) => {
		const b = e.target.closest('button[data-filter]');
		if (!b) return;
		const f = b.dataset.filter;
		bar.querySelectorAll('button').forEach((x) => x.setAttribute('aria-pressed', x === b));
		let n = 0;
		tiles.forEach((t) => {
			const show = f === 'alle' || t.dataset.kat.split(',').includes(f);
			t.hidden = !show;
			n += show;
		});
		if (status) status.textContent = `${n} Projekte`;
	});
})();
