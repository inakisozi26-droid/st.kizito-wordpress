document.addEventListener('DOMContentLoaded', function () {
  const box = document.getElementById('sks-lightbox');
  if (!box) return;
  const preview = box.querySelector('img');
  const caption = box.querySelector('.lightbox-caption');
  const close = box.querySelector('.lightbox-close');
  document.querySelectorAll('.gallery-item img').forEach(function (img) {
    img.addEventListener('click', function () {
      preview.src = img.src; preview.alt = img.alt;
      caption.textContent = img.dataset.caption || img.alt;
      box.classList.add('is-open'); document.body.style.overflow = 'hidden'; close.focus();
    });
  });
  function closeBox() { box.classList.remove('is-open'); document.body.style.overflow = ''; preview.src = ''; }
  close.addEventListener('click', closeBox);
  box.addEventListener('click', function (event) { if (event.target === box) closeBox(); });
  document.addEventListener('keydown', function (event) { if (event.key === 'Escape' && box.classList.contains('is-open')) closeBox(); });
});
