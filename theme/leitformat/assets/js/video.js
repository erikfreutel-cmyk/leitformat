// Video-Flächen: Klick lädt erst dann den Player (Vimeo ohne Tracking, YouTube-nocookie oder eigenes MP4).
document.addEventListener('click', (e) => {
	const btn = e.target.closest('.lf-video__play');
	const box = btn && btn.closest('.lf-video');
	if (!box || btn.tagName !== 'BUTTON') return;
	const { vimeo, youtube, start, src, poster } = box.dataset;
	let el;
	if (vimeo) {
		el = document.createElement('iframe');
		el.src = `https://player.vimeo.com/video/${encodeURIComponent(vimeo)}?autoplay=1&dnt=1`;
		el.allow = 'autoplay; fullscreen; picture-in-picture';
		el.title = btn.getAttribute('aria-label');
	} else if (youtube) {
		el = document.createElement('iframe');
		el.src = `https://www.youtube-nocookie.com/embed/${encodeURIComponent(youtube)}?autoplay=1&rel=0${start ? '&start=' + Number(start) : ''}`;
		el.allow = 'autoplay; fullscreen; picture-in-picture';
		el.title = btn.getAttribute('aria-label');
	} else if (src) {
		el = Object.assign(document.createElement('video'), { src, controls: true, autoplay: true, playsInline: true });
		if (poster) el.poster = poster;
	} else return;
	el.className = 'lf-video__player';
	box.classList.add('is-playing');
	box.append(el);
	el.focus();
});
