?>
<style>
  *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}

  /* Header styles */
  .cpc-topbar{
    width:100%;
    background: rgba(37,150,190,0.03);
    border-bottom: 1px solid rgba(37,150,190,0.06);
    padding:6px 28px;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:11px;
    color:rgba(10,20,30,0.6);
    gap:28px;
    position:fixed;
    top:0;
    left: 0;
    z-index:10000;
    backdrop-filter:blur(8px);
    font-family: Inter, system-ui, -apple-system, sans-serif;
  }

  .cpc-header{
    width:100%;
    padding:18px 28px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    position:fixed;
    top:30px;
    left: 0;
    z-index:9999;
    backdrop-filter: blur(8px) saturate(140%);
    -webkit-backdrop-filter: blur(10px) saturate(140%);
    background: rgba(255,255,255,0.85);
    border-bottom: 1px solid rgba(37,150,190,0.08);
    box-shadow: 0 6px 18px rgba(12,20,30,0.03);
    font-family: Inter, system-ui, -apple-system, sans-serif;
  }

  .cpc-brand{ display:flex; align-items:center; gap:12px; }
  .cpc-logo{
    height:48px !important;
    width:auto !important;
    max-height:48px !important;
    object-fit:contain;
  }

  .cpc-menu-toggle{
    display:none;
    border:1px solid rgba(37,150,190,0.18);
    background:rgba(255,255,255,0.65);
    color:#0f1b2b;
    border-radius:8px;
    padding:10px 14px;
    font-size:20px;
    font-weight:400;
    cursor:pointer;
    transition:all 0.2s;
    line-height:1;
  }

  .cpc-menu-toggle:hover{
    border-color:rgba(37,150,190,0.35);
    color:#2596be;
  }

  .cpc-nav{ display:flex; gap:24px; align-items:center; }
  .cpc-nav-item{ position:relative; }

  .cpc-nav > a, .cpc-nav-item > a{
    color:rgba(10,20,30,0.8);
    text-decoration:none;
    font-weight:600;
    font-size:14px;
    transition:color 0.2s;
    display:block;
    padding: 10px 0;
  }

  .cpc-nav a:hover{ color:#2596be; }

  /* First-level dropdown */
  .cpc-dropdown{
    display:none;
    position:absolute;
    top:100%;
    left:0;
    margin-top:-5px;
    min-width:240px;
    background:rgba(255,255,255,0.98);
    backdrop-filter:blur(10px);
    border-radius:8px;
    box-shadow:0 8px 24px rgba(12,20,30,0.12);
    padding:8px 0;
    border:1px solid rgba(37,150,190,0.1);
  }

  .cpc-nav-item:hover .cpc-dropdown{ display:block; }

  /* Dropdown items */
  .cpc-dropdown-item {
    position: relative;
    width: 100%;
  }

  .cpc-dropdown-item > span {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding:10px 20px;
    color:rgba(10,20,30,0.8);
    font-size:13px;
    font-weight:600;
    cursor: default;
    user-select: none;
  }

  .cpc-sub-dropdown a {
    display: block;
    padding:10px 20px;
    color:rgba(10,20,30,0.75);
    font-size:13px;
    font-weight:500;
    text-decoration: none;
    transition:all 0.2s;
  }

  .cpc-sub-dropdown a:hover {
    background:rgba(37,150,190,0.08);
    color:#2596be;
  }

  .cpc-arrow { font-size: 10px; opacity: 0.5; }

  /* Second-level dropdown (products) - opens to the right */
  .cpc-sub-dropdown {
    display: none;
    position: absolute;
    left: 100%;
    top: 0;
    min-width: 240px;
    background:rgba(255,255,255,0.98);
    border-radius:8px;
    box-shadow:0 8px 24px rgba(12,20,30,0.12);
    padding:8px 0;
    border:1px solid rgba(37,150,190,0.1);
    margin-left: -3px;
  }

  .cpc-dropdown-item:hover .cpc-sub-dropdown {
    display: block;
  }

  /* Search box */
  .cpc-search-box{
    display:flex;
    align-items:center;
    background:rgba(255,255,255,0.3);
    border:1px solid rgba(37,150,190,0.12);
    border-radius:8px;
    padding:8px 14px;
    backdrop-filter:blur(8px);
    margin-left:12px;
  }

  .cpc-search-box input{
    border:none;
    background:transparent;
    outline:none;
    font-size:13px;
    width:180px;
    color:#0f1b2b;
  }

  /* Mobile responsive */
  @media (max-width:768px){
    .cpc-topbar{gap:14px;font-size:10px;}
    .cpc-header{flex-direction:column;gap:14px;top:25px;padding:14px;align-items:stretch;}
    .cpc-brand{justify-content:space-between;}
    .cpc-menu-toggle{display:inline-flex;align-items:center;justify-content:center;}
    .cpc-nav{display:none;flex-direction:column;align-items:stretch;gap:6px;background:rgba(255,255,255,0.92);border:1px solid rgba(37,150,190,0.1);border-radius:10px;padding:10px;}
    .cpc-nav.is-open{display:flex;}
    .cpc-nav > a, .cpc-nav-item > a{padding:10px 6px;}
    .cpc-dropdown{
        position:static;
        margin-top:6px;
        box-shadow:none;
        border:none;
        background: transparent;
        padding-left: 16px;
    }
    .cpc-sub-dropdown {
        position: static;
        box-shadow: none;
        border: none;
        background: transparent;
        margin-left: 12px;
        border-left: 1px solid rgba(0,0,0,0.1);
    }
    .cpc-search-box{width:100%;margin-left:0;}
    .cpc-search-box input{width:100%;}
  }
</style>

<div class="cpc-topbar">
  📍 Dubai Digital Park, DSO, Dubai, UAE | ✉️ sales@controlprocesscomponents.ae
</div>

<header class="cpc-header" role="banner">
  <div class="cpc-brand">
    <img class="cpc-logo" src="/images/cpc-logo.png" alt="CPC - Control Process Components" />
    <button class="cpc-menu-toggle" type="button" aria-expanded="false" aria-controls="cpcMainNav" onclick="cpcToggleMenu()">
      ☰
    </button>
  </div>

  <nav class="cpc-nav" id="cpcMainNav" aria-label="main navigation">
    <a href="/">HOME</a>

    <div class="cpc-nav-item">
      <a href="#">PRODUCTS</a>
      <div class="cpc-dropdown">
          
          <!-- Shut Off Valve Category -->
          <div class="cpc-dropdown-item">
            <span>Shut Off Valve <span class="cpc-arrow">›</span></span>
            <div class="cpc-sub-dropdown">
              <a href="/type-category-hipps/">HIPPS - High Integrity Pressure Protection System</a>
              <a href="/type-category-xv/">XV - Emergency Shut Down Valve</a>
              <a href="/type-category-esdv/">ESDV - Emergency Shut Down Valve</a>
              <a href="/type-category-bdv/">BDV - Blowdown Valve</a>
              <a href="/type-category-lbv/">LBV - Level Balance Valve</a>
              <a href="/type-category-gov/">GOV - Gas Over Oil Valve</a>
            </div>
          </div>

          <!-- Control Valve Category -->
          <div class="cpc-dropdown-item">
            <span>Control Valve <span class="cpc-arrow">›</span></span>
            <div class="cpc-sub-dropdown">
              <a href="/type-category-pressure-control-valve/">Pressure Control Valve</a>
              <a href="/type-category-flow-control-valve/">Flow Control Valve</a>
              <a href="/type-category-temperature-control-valve/">Temperature Control Valve</a>
            </div>
          </div>

          <!-- Motor Operated Valve Category -->
          <div class="cpc-dropdown-item">
            <span>Motor Operated Valve <span class="cpc-arrow">›</span></span>
            <div class="cpc-sub-dropdown">
              <a href="/type-category-on-off-application/">ON-OFF Application</a>
              <a href="/type-category-modular-application/">Modular Application</a>
            </div>
          </div>

          <!-- Damper Actuator Category -->
          <div class="cpc-dropdown-item">
            <span>Damper Actuator <span class="cpc-arrow">›</span></span>
            <div class="cpc-sub-dropdown">
              <a href="/type-category-quarter-turn-actuator/">Quarter Turn Actuator</a>
              <a href="/type-category-linear-actuator/">Linear Actuator</a>
            </div>
          </div>

      </div>
    </div>

    <div class="cpc-nav-item">
      <a href="#">BRANDS</a>
      <div class="cpc-dropdown">
        <a href="/ewo">EWO</a>
      </div>
    </div>

    <a href="/about-us">ABOUT US</a>
    <a href="/contact-us">CONTACT US</a>
  </nav>

  <div class="cpc-search-box">
    <input id="cpcSearchInput" type="text" placeholder="Search in CPC ..." />
    <span style="cursor:pointer;" onclick="cpcPerformSearch()">🔍</span>
  </div>
</header>

<script>
function cpcPerformSearch() {
  const searchValue = document.getElementById('cpcSearchInput').value.trim();
  if (searchValue) {
    window.location.href = '/?s=' + encodeURIComponent(searchValue) + '&post_type=product';
  }
}

function cpcToggleMenu() {
  const nav = document.getElementById('cpcMainNav');
  const toggle = document.querySelector('.cpc-menu-toggle');
  const isOpen = nav.classList.toggle('is-open');
  toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
}

document.getElementById('cpcSearchInput').addEventListener('keypress', function(e) {
  if (e.key === 'Enter') {
    cpcPerformSearch();
  }
});
</script>
<?php
