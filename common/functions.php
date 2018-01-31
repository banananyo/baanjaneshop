<script>
	function updateQueryStringParameter(uri, key, value) {
		var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
		var separator = uri.indexOf('?') !== -1 ? "&" : "?";
		if (uri.match(re)) {
			return uri.replace(re, '$1' + key + "=" + value + '$2');
		}
		else {
			return uri + separator + key + "=" + value;
		}
	}
	const goSearch = function(url, cat) {
		const newUrl = updateQueryStringParameter(url, 'q', cat);
		const goPageAlso = updateQueryStringParameter(newUrl, 'page', 1);
		// const clearSearchAlso = updateQueryStringParameter(goPageAlso, 'q', '');
		window.location.href = goPageAlso;
	}
	const goPage = function(page) {
		const newUrl = updateQueryStringParameter(window.location.href, 'page', page);
		window.location.href = newUrl;
	}
	function addToCart(prodId) {
		console.log(prodId);
		alert('เพิ่มสินค้าในตะกร้าแล้ว');
	}
</script>
<?php
function formatPhone($number) {
    $numbers_only = array();
    $number = preg_replace("/[^\d]/","",$number);

    // get number length.
    $length = strlen($number);

    // if number = 10
    if($length == 10) {
        $number = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $number);
    }

    return $number;
}


?>