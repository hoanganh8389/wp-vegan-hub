/* [2026-11-25 01:06 PM Johnny Chu - Chu Hoàng Anh] HUB-CORE-M1 — JS dùng chung cho mockup: biểu tượng nét, chuyển màn, điện thoại, mở thẳng màn qua #scr=…&phone=1&clean=1 để chụp shots. */
(function () {
  var I = {
    grid: '<rect x="4" y="4" width="7" height="7" rx="1.5"/><rect x="13" y="4" width="7" height="7" rx="1.5"/><rect x="4" y="13" width="7" height="7" rx="1.5"/><rect x="13" y="13" width="7" height="7" rx="1.5"/>',
    users: '<circle cx="9" cy="8" r="3"/><circle cx="17" cy="9" r="2.5"/><path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6M15 14.5c3 0 6 2 6 5.5"/>',
    gift: '<path d="M4 10h16v10H4zM3 7h18v3H3zM12 7v13M12 7c-2-4-6-3-5 0M12 7c2-4 6-3 5 0"/>',
    coach: '<path d="M12 20s-7-4.4-7-10a4 4 0 017-2.6A4 4 0 0119 10c0 5.6-7 10-7 10z"/><path d="M9 11l2 2 4-4"/>',
    cap: '<path d="M2 9l10-5 10 5-10 5z"/><path d="M6 11v5c3 2 9 2 12 0v-5"/>',
    check: '<circle cx="12" cy="12" r="9"/><path d="M8 12l3 3 5-6"/>',
    pin: '<path d="M12 21s-7-6.5-7-12a7 7 0 0114 0c0 5.5-7 12-7 12z"/><circle cx="12" cy="9" r="2.5"/>',
    mega: '<path d="M3 10v4h3l7 4V6L6 10zM16 9a4 4 0 010 6M19 7a7 7 0 010 10"/>',
    cal: '<rect x="4" y="5" width="16" height="15" rx="2"/><path d="M4 10h16M9 3v4M15 3v4"/>',
    hand: '<path d="M4 13l4-4 4 2 3-2 5 4M7 16l3 2 2-1 2 1 3-3"/>',
    book: '<path d="M3 5c3-1 6-1 9 1 3-2 6-2 9-1v14c-3-1-6-1-9 1-3-2-6-2-9-1zM12 6v14"/>',
    wallet: '<rect x="3" y="6" width="18" height="13" rx="2"/><path d="M3 10h18M16 15h2"/>',
    chart: '<path d="M4 20V4M4 20h16M8 16v-5M12 16V8M16 16v-8"/>',
    gear: '<circle cx="12" cy="12" r="3"/><path d="M12 2.5v3M12 18.5v3M2.5 12h3M18.5 12h3M5.3 5.3l2.1 2.1M16.6 16.6l2.1 2.1M5.3 18.7l2.1-2.1M16.6 7.4l2.1-2.1"/>',
    box: '<path d="M12 3l8 4.5v9L12 21l-8-4.5v-9z"/><path d="M4 7.5l8 4.5 8-4.5M12 12v9"/>',
    store: '<path d="M4 9l1.5-5h13L20 9M4 9h16v1.5a2.7 2.7 0 01-5.3 0 2.7 2.7 0 01-5.4 0A2.7 2.7 0 014 10.5zM5 13v7h14v-7"/>',
    calc: '<rect x="5" y="3" width="14" height="18" rx="2"/><path d="M8 7h8M8 12h2M12 12h2M16 12h0M8 16h2M12 16h2"/>',
    web: '<circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c3 3.5 3 14.5 0 18M12 3c-3 3.5-3 14.5 0 18"/>',
    bot: '<rect x="5" y="8" width="14" height="11" rx="3"/><path d="M12 4v4M9 13h.01M15 13h.01M9 16h6"/>',
    trend: '<path d="M3 17l6-6 4 4 8-8M15 7h6v6"/>',
    net: '<circle cx="12" cy="5" r="2.5"/><circle cx="5" cy="19" r="2.5"/><circle cx="19" cy="19" r="2.5"/><path d="M12 7.5v4M12 11.5L6.5 17M12 11.5l5.5 5.5"/>',
    shield: '<path d="M12 3l8 3v6c0 4.5-3.4 8-8 9-4.6-1-8-4.5-8-9V6z"/><path d="M8.5 12l2.5 2.5 4.5-5"/>',
    leaf: '<path d="M5 19c0-8 5-14 15-14 0 10-6 15-14 15"/><path d="M5 19l8-8"/>',
    code: '<path d="M8 7l-5 5 5 5M16 7l5 5-5 5M14 4l-4 16"/>',
    flow: '<rect x="3" y="4" width="7" height="6" rx="1.5"/><rect x="14" y="14" width="7" height="6" rx="1.5"/><path d="M6.5 10v4a3 3 0 003 3H14"/>',
    report: '<path d="M6 3h9l4 4v14H6z"/><path d="M9 17v-3M12 17v-6M15 17v-4"/>',
    doc: '<path d="M6 3h9l4 4v14H6z"/><path d="M9 12h7M9 16h7"/>',
    chat: '<path d="M4 5h16v11H9l-5 4z"/>',
    qr: '<rect x="4" y="4" width="6" height="6"/><rect x="14" y="4" width="6" height="6"/><rect x="4" y="14" width="6" height="6"/><path d="M14 14h2v2h-2zM18 18h2v2h-2zM14 18h2"/>',
    star: '<path d="M12 3.5l2.6 5.4 5.9.8-4.3 4.1 1 5.8L12 16.9 6.8 19.6l1-5.8L3.5 9.7l5.9-.8z"/>',
    baby: '<circle cx="12" cy="8" r="4"/><path d="M6 21c0-3.3 2.7-6 6-6s6 2.7 6 6"/>',
    tool: '<path d="M14 6a4 4 0 005 5l-8 8-3-3 8-8a4 4 0 01-2-2z"/>',
    cart: '<path d="M3 4h3l2 11h11l2-8H7"/><circle cx="9" cy="19" r="1.5"/><circle cx="18" cy="19" r="1.5"/>',
    shirt: '<path d="M8 4l4 2 4-2 4 3-2 4-2-1v10H8V10l-2 1-2-4z"/>',
    pill: '<rect x="3" y="9" width="18" height="6" rx="3" transform="rotate(-35 12 12)"/><path d="M9 8l6 8"/>',
    toy: '<circle cx="8" cy="16" r="3"/><circle cx="16" cy="16" r="3"/><path d="M5 13l2-6h10l2 6"/>',
    lips: '<path d="M3 12c3-4 6-4 9-2 3-2 6-2 9 2-3 4-6 5-9 5s-6-1-9-5zM3 12h18"/>',
    bowl: '<path d="M3 11h18a9 9 0 01-18 0zM8 7c0-2 2-2 2-4M13 7c0-2 2-2 2-4"/>',
    expo: '<path d="M3 21V9l9-5 9 5v12M8 21v-7h8v7"/>',
    arrow: '<path d="M9 6l6 6-6 6"/>',
    lock: '<rect x="5" y="10" width="14" height="10" rx="2"/><path d="M8 10V7a4 4 0 018 0v3"/>',
    clock: '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
    git: '<circle cx="6" cy="6" r="2.5"/><circle cx="6" cy="18" r="2.5"/><circle cx="18" cy="8" r="2.5"/><path d="M6 8.5v7M18 10.5c0 4-6 3-11 6"/>'
  };
  function svg(k, cls) { return '<svg class="ic' + (cls ? ' ' + cls : '') + '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">' + (I[k] || I.star) + '</svg>'; }
  window.HM = { svg: svg };
  document.querySelectorAll('[data-i]').forEach(function (e) { e.insertAdjacentHTML('afterbegin', svg(e.dataset.i, e.dataset.c)); });
  function show(s) {
    document.querySelectorAll('[data-scr]').forEach(function (x) { x.setAttribute('aria-pressed', x.dataset.scr === s); });
    document.querySelectorAll('.scr').forEach(function (x) { x.classList.toggle('on', x.id === 'scr-' + s); });
    window.scrollTo(0, 0);
  }
  document.querySelectorAll('[data-scr]').forEach(function (b) { b.onclick = function () { show(b.dataset.scr); }; });
  document.addEventListener('click', function (e) { var g = e.target.closest('[data-go]'); if (g) { e.preventDefault(); show(g.dataset.go); } });
  var ph = document.getElementById('phone');
  if (ph) ph.onclick = function () { var on = !document.body.classList.contains('phone'); document.body.classList.toggle('phone', on); ph.setAttribute('aria-pressed', on); };
  var q = {}; location.hash.replace(/^#/, '').split('&').forEach(function (kv) { var p = kv.split('='); if (p[0]) q[p[0]] = p[1] || '1'; });
  if (q.scr) show(q.scr); if (q.phone && ph) ph.click(); if (q.clean) { var mk = document.querySelector('.mk'); if (mk) mk.style.display = 'none'; }
})();
