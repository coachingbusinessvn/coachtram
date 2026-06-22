class SiteHeader extends HTMLElement {
    connectedCallback() {
        const activePage = window.location.pathname.split("/").pop() || "index.html";
        
        this.innerHTML = `
        <header class="site-header">
            <div class="container nav">
                <a href="index.html" class="nav-logo">Edina <span>Trâm</span></a>
                <button class="nav-toggle" aria-label="Toggle navigation">
                    <span></span><span></span><span></span>
                </button>
                <nav class="nav-links">
                    <a href="index.html" class="${activePage === 'index.html' ? 'active' : ''}">Trang chủ</a>
                    <a href="index.html#services">Dịch vụ</a>
                    <a href="dich-vu-1.html" class="${activePage === 'dich-vu-1.html' ? 'active' : ''}">Passion to Profit</a>
                    <a href="dich-vu-2.html" class="${activePage === 'dich-vu-2.html' ? 'active' : ''}">TINA Awakening</a>
                    <a href="dich-vu-3.html" class="${activePage === 'dich-vu-3.html' ? 'active' : ''}">Business Mastery</a>
                    <a href="lien-he.html" class="btn btn-primary" style="background:var(--color-accent, #C8A244); color:#fff;">Thảo luận chiến lược</a>
                </nav>
            </div>
        </header>
        `;
    }
}
customElements.define('site-header', SiteHeader);

class SiteFooter extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <footer class="site-footer" style="margin-top:0;">
            <div class="container">
                <div class="footer-inner" style="border-top: 1px solid var(--home-border, rgba(255,255,255,0.08)); padding-top: var(--space-8);">
                    <div>
                        <div class="footer-logo">Edina <span>Trâm</span></div>
                        <p class="footer-tagline" style="max-width:320px; line-height:1.6; opacity:0.8;">Edina Trâm đồng hành tại giao điểm của Tâm lý học, Khai vấn, Tâm linh và Tài chính, giúp bạn tìm lại sự rõ ràng, nội lực và kết nối sâu với chính mình.</p>
                    </div>
                    <div>
                        <h4 class="footer-links-title">Dịch vụ</h4>
                        <ul class="footer-links">
                            <li><a href="dich-vu-1.html">Passion to Profit</a></li>
                            <li><a href="dich-vu-2.html">TINA Awakening</a></li>
                            <li><a href="dich-vu-3.html">Business Mastery</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="footer-links-title">Liên hệ</h4>
                        <ul class="footer-links">
                            <li><a href="mailto:lequynhtram@gmail.com">lequynhtram@gmail.com</a></li>
                            <li><a href="tel:+84889590888">(+84) 88-9590-888</a></li>
                            <li><a href="https://edinatram.vn" target="_blank" rel="noopener">edinatram.vn</a></li>
                            <li><a href="https://www.facebook.com/edina.quynhtram" target="_blank" rel="noopener">Facebook</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-bottom">
                    &copy; 2026 Edina Tram. All rights reserved.
                </div>
            </div>
        </footer>
        `;
    }
}
customElements.define('site-footer', SiteFooter);
