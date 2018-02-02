<div class="header d-flex flex-row justify-content-between align-items-stretch ">
    <div class="logo-large">
        <a href="index.php" class="logo-link">
            <span class="logo-text logo-text-prefix">Baan</span>
            <span class="logo-text logo-text-subfix">jane</span>
            <span class="logo-text-dotcom">.com</span>
        </a>
    </div>
    <div class="header-search-wrapper d-flex flex-column hide-mobile-xs">
        <form method="GET" action="find_product.php" class="header-search d-flex flex-row align-items-stretch justify-content-between">
            <span class="bg-white d-flex align-items-center text-secondary search-icon">
                <i class="fa fa-search icon" aria-hidden="true"></i>
            </span>
            <input type="text" name="q" class="invisible-input text-secondary search-input" placeholder="ค้นหาสินค้า" />
            <input type="submit" class="search-button" value="ค้นหา" />
        </form>
        <div class="suggest-search">
            <a onclick="goSearch('find_product.php', 'ลิปแมท')" class="text-secondary clickable"><span class="underline-hover">ลิปแมท</span></a>
            <span class="line-sep text-secondary"></span>
            <a onclick="goSearch('find_product.php', 'sureeporn')" class="text-secondary clickable"><span class="underline-hover">sureeporn</span></a>
            <span class="line-sep text-secondary"></span>
            <a onclick="goSearch('find_product.php', 'กระชับผิว')" class="text-secondary clickable"><span class="underline-hover">กระชับผิว</span></a>
            <span class="line-sep text-secondary"></span>
            <a onclick="goSearch('find_product.php', 'กันแดด')" class="text-secondary clickable"><span class="underline-hover">กันแดด</span></a>
        </div>
    </div>
    <div class="my-cart-wrapper hide-mobile-xs">
        <div class="my-cart text-secondary d-flex align-items-stretch justify-content-around">
            <div class="d-flex align-items-center">
                <i class="fa fa-shopping-bag bag-icon" aria-hidden="true"></i>
            </div>
            <a href="cart.php" style="text-decoration: none" class="d-flex align-items-center">ตะกร้าของฉัน</a>
        </div>
    </div>
</div>