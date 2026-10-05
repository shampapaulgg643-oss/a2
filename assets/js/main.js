(function () {
  // Mobile navigation
  var burger = document.querySelector('.burger');
  var list = document.getElementById('nav-list');
  if (burger && list) {
    burger.addEventListener('click', function () {
      var open = list.classList.toggle('open');
      burger.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') { list.classList.remove('open'); burger.setAttribute('aria-expanded', 'false'); }
    });
  }

  // Produce calendar (data is printed by index.php)
  var data = window.AP_CALENDAR;
  var panel = document.getElementById('produce-panel');
  if (data && panel) {
    var render = function (m) {
      var d = data[m];
      panel.querySelector('[data-f="name"]').textContent = d.name;
      panel.querySelector('[data-f="veg"]').innerHTML = d.veg.map(function (x) { return '<li>' + x + '</li>'; }).join('');
      panel.querySelector('[data-f="fruit"]').innerHTML = d.fruit.map(function (x) { return '<li>' + x + '</li>'; }).join('');
      panel.querySelector('[data-f="tip"]').textContent = d.tip;
    };
    document.querySelectorAll('.month').forEach(function (b) {
      b.addEventListener('click', function () {
        document.querySelectorAll('.month').forEach(function (x) { x.setAttribute('aria-pressed', 'false'); });
        b.setAttribute('aria-pressed', 'true');
        render(b.getAttribute('data-m'));
      });
    });
  }

  // Cookie notice
  var bar = document.getElementById('cookie');
  var choice = null;
  try { choice = localStorage.getItem('ap_cookie'); } catch (e) {}
  if (bar && !choice) bar.classList.add('show');
  document.querySelectorAll('[data-cookie]').forEach(function (b) {
    b.addEventListener('click', function () {
      try { localStorage.setItem('ap_cookie', b.getAttribute('data-cookie')); } catch (e) {}
      bar.classList.remove('show');
    });
  });

  var y = document.getElementById('year');
  if (y) y.textContent = new Date().getFullYear();
})();
