<?php
/**
 * CPC Header with Dynamic WooCommerce Menu
 * This MUST be placed in a PHP Snippet, not a standard HTML/Header plugin box.
 */
?>
<style>
  *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}

  /* استایل‌های هدر */
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
    padding:8px 12px;
    font-size:14px;
    font-weight:600;
    cursor:pointer;
    transition:all 0.2s;
  }

  .cpc-menu-toggle:hover{
    border-color:rgba(37,150,190,0.35);
    color:#2596be;
  }

  .cpc-nav{ display:flex; gap:24px; align-items:center; }
  .cpc-nav-item{ position:relative; padding-bottom:8px; }

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

  /* دراپ‌داون مرحله اول (دسته‌بندی‌ها) */
  .cpc-dropdown{
    display:none;
    position:absolute;
    top:100%;
    left:0;
    margin-top:8px;
    min-width:240px;
    background:rgba(255,255,255,0.98);
    backdrop-filter:blur(10px);
    border-radius:8px;
    box-shadow:0 8px 24px rgba(12,20,30,0.12);
    padding:8px 0;
    border:1px solid rgba(37,150,190,0.1);
  }

  .cpc-dropdown::before{
    content:'';
    position:absolute;
    top:-10px;
    left:0;
    width:100%;
    height:10px;
  }

  .cpc-nav-item:hover .cpc-dropdown,
  .cpc-nav-item:focus-within .cpc-dropdown{
    display:block;
  }

  /* آیتم‌های دراپ‌داون */
  .cpc-dropdown-item {
      position: relative;
      width: 100%;
  }

  .cpc-dropdown a {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding:10px 20px;
    color:rgba(10,20,30,0.8);
    font-size:13px;
    font-weight:500;
    text-decoration: none;
    transition:all 0.2s;
  }

  .cpc-dropdown a:hover {
    background:rgba(37,150,190,0.08);
    color:#2596be;
  }


  /* دراپ‌داون مرحله دوم (محصولات) - باز شدن به سمت راست */
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
      margin-left: 12px;
  }

  .cpc-sub-dropdown::before{
      content:'';
      position:absolute;
      top:0;
      left:-12px;
      width:12px;
      height:100%;
  }

  .cpc-dropdown-item:hover .cpc-sub-dropdown,
  .cpc-dropdown-item:focus-within .cpc-sub-dropdown {
      display: block;
  }

  .cpc-arrow { font-size: 10px; opacity: 0.5; }

  /* باکس جستجو */
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

  /* ریسپانسیو موبایل */
  @media (max-width:768px){
    .cpc-topbar{gap:14px;font-size:10px;}
    .cpc-header{flex-direction:column;gap:14px;top:25px;padding:14px;align-items:stretch;}
    .cpc-brand{justify-content:space-between;}
    .cpc-menu-toggle{display:inline-flex;align-items:center;gap:8px;}
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
    <!-- مسیر لوگو را چک کنید که درست باشد -->
    <img class="cpc-logo" src="/images/cpc-logo.png" alt="CPC - Control Process Components" />
    <button class="cpc-menu-toggle" type="button" aria-expanded="false" aria-controls="cpcMainNav" onclick="cpcToggleMenu()">
      ☰ Menu
    </button>
  </div>

  <nav class="cpc-nav" id="cpcMainNav" aria-label="main navigation">
    <a href="/">HOME</a>

    <div class="cpc-nav-item">
      <a href="/products">PRODUCTS</a>
      <div class="cpc-dropdown">

        <a href="/type-category-bdv.html">BDV</a>
        <a href="/type-category-esdv.html">ESDV</a>
        <a href="/type-category-flow-control-valve.html">Flow Control Valve</a>
        <a href="/type-category-gov.html">GOV</a>
        <a href="/type-category-hipps.html">HIPPS</a>
        <a href="/type-category-lbv.html">LBV</a>
        <a href="/type-category-linear-actuator.html">Linear Actuator</a>
        <a href="/type-category-modular-application.html">Modular Application</a>
        <a href="/type-category-on-off-application.html">On/Off Application</a>
        <a href="/type-category-pressure-control-valve.html">Pressure Control Valve</a>
        <a href="/type-category-quarter-turn-actuator.html">Quarter Turn Actuator</a>
        <a href="/type-category-shut-off-valve.html">Shut-off Valve</a>
        <a href="/type-category-temperature-control-valve.html">Temperature Control Valve</a>
        <a href="/type-category-xv.html">XV</a>
      </div>
    </div>

    <!-- لینک‌های ثابت طبق درخواست -->
    <div class="cpc-nav-item">
      <a href="/brands">BRANDS</a>
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
    // جستجوی استاندارد وردپرس در محصولات
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
