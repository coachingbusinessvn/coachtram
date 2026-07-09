/* ═══════════════════════════════════════════════════════════
   components.js — Edina Trâm V2
   Reusable "chrome" as Web Components (inline templates, no fetch).
   These render synchronously so they work over file:// and http://,
   and stay in the initial DOM for the interaction scripts in main.js.

     <site-header active="coaching-cung-edina.html"></site-header>
     <glow-blobs></glow-blobs>
     <site-footer></site-footer>

   Content sections (bio, testimonials …) live in /sections and are
   loaded through <site-section> — see sections.js.
   ═══════════════════════════════════════════════════════════ */

/* Single source of truth for the primary navigation. Update once here
   and every page picks it up. */
const NAV_ITEMS = [
  { href: 'index.html',              label: 'Trang chủ' },
  { href: 'bai-viet-cua-tram.html',  label: 'Bài viết' },
  { href: 'coaching-cung-edina.html', label: 'Coaching cùng Edina' },
  { href: 'testimonial.html',        label: 'Testimonial' },
];

const FOOTER_SOCIAL = `
        <div class="footer-social">
          <a href="https://zalo.me/84889590888" target="_blank" rel="noopener" aria-label="Zalo"><svg width="18" height="18" fill="none" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 7.5A3.5 3.5 0 018.5 4h7A3.5 3.5 0 0119 7.5v4.9a3.5 3.5 0 01-3.5 3.5h-3.8L7 20v-4.1A3.5 3.5 0 015 12.4V7.5z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M8.2 8.4h5.1l-5.1 5h5.6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
          <a href="https://wa.me/84889590888" target="_blank" rel="noopener" aria-label="WhatsApp"><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 11.7a8 8 0 01-11.9 7L4 20l1.4-4A8 8 0 1120 11.7z"></path><path d="M9.3 8.6c.2-.5.4-.5.7-.5h.5c.2 0 .4 0 .5.4l.7 1.7c.1.3.1.5-.1.7l-.4.5c-.2.2-.2.4 0 .7.3.5.8 1.1 1.3 1.5.6.5 1.1.7 1.5.9.3.1.5.1.7-.1l.7-.8c.2-.2.4-.2.7-.1l1.6.8c.3.2.4.3.4.5-.1.6-.4 1.2-.8 1.5-.4.4-1.4.6-3.2-.1-2.6-1.1-4.3-3.4-4.4-3.6-.1-.1-1.1-1.5-1.1-2.8 0-1.3.6-1.9.9-2.2z"></path></svg></a>
          <a href="mailto:lequynhtram@gmail.com" aria-label="Email"><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></a>
          <a href="https://edinatram.substack.com" target="_blank" rel="noopener" aria-label="Substack"><svg width="18" height="18" fill="none" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 5h14M5 9h14M5 13h14v6l7-3 7 3v-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
          <a href="https://www.facebook.com/edina.quynhtram" target="_blank" rel="noopener" aria-label="Facebook"><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg></a>
        </div>`;

// ── <site-header active="coaching-cung-edina.html"> ────────────────
class SiteHeader extends HTMLElement {
  connectedCallback() {
    // active can be passed explicitly; otherwise infer from the URL.
    const active = this.getAttribute('active')
      || window.location.pathname.split('/').pop()
      || 'index.html';

    const links = NAV_ITEMS.map(item => {
      const cls = item.href === active ? ' class="active"' : '';
      return `        <a href="${item.href}"${cls}>${item.label}</a>`;
    }).join('\n');

    this.innerHTML = `
  <header class="site-header">
    <div class="container nav">
      <a href="index.html" class="nav-logo">Edina <span>Trâm</span></a>
      <button class="nav-toggle" aria-label="Toggle navigation" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
      <nav class="nav-links">
${links}
      </nav>
    </div>
  </header>`;
  }
}
customElements.define('site-header', SiteHeader);

// ── <glow-blobs> — decorative background accents ───────────────────
class GlowBlobs extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
    <div class="glow-blob glow-blob--gold glow-blob--1" aria-hidden="true"></div>
    <div class="glow-blob glow-blob--emerald glow-blob--2" aria-hidden="true"></div>`;
  }
}
customElements.define('glow-blobs', GlowBlobs);

// ── <site-footer> — footer + scroll-to-top button ──────────────────
class SiteFooter extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
  <footer class="site-footer">
    <div class="container">
      <div class="footer-inner">
        <div>
          <div class="footer-logo">Edina <span>Trâm</span></div>
          <p class="footer-tagline">Dẫn lối bình an, khai mở nội lực. Đồng hành cùng bạn trên hành trình kiến tạo cuộc sống chất lượng.</p>
        </div>
        <div class="footer-col">
          <h4>Khám phá</h4>
          <div class="footer-links">
            <a href="index.html">Trang chủ</a>
            <a href="bai-viet-cua-tram.html">Bài viết</a>
            <a href="coaching-cung-edina.html">Coaching cùng Edina</a>
            <a href="testimonial.html">Testimonial</a>
          </div>
        </div>
        <div class="footer-col">
          <h4>Hành động</h4>
          <div class="footer-links">
            <a href="book-lich.html">Book lịch</a>
            <a href="lien-he.html">Liên hệ</a>
            <a href="thanh-toan.html">Thanh toán</a>
          </div>
        </div>
        <div class="footer-col">
          <h4>Kết nối</h4>
          <div class="footer-links">
            <a href="https://zalo.me/84889590888" target="_blank" rel="noopener">Zalo</a>
            <a href="https://wa.me/84889590888" target="_blank" rel="noopener">WhatsApp</a>
            <a href="mailto:lequynhtram@gmail.com">lequynhtram@gmail.com</a>
            <a href="tel:+84889590888">(+84) 88-9590-888</a>
            <a href="https://edinatram.substack.com" target="_blank" rel="noopener">Substack</a>
            <a href="https://www.facebook.com/edina.quynhtram" target="_blank" rel="noopener">Facebook</a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <span>© 2026 Edina Trâm. All rights reserved.</span>${FOOTER_SOCIAL}
      </div>
    </div>
  </footer>

  <button class="scroll-top-btn" aria-label="Cuộn lên đầu trang">↑</button>`;
  }
}
customElements.define('site-footer', SiteFooter);
