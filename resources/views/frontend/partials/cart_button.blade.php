<input type="hidden" name="product_id" value="{{ $row->id }}">
<button type="button" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4"
    onclick="addToCart({{ $row->id }})">Add to Cart</button>