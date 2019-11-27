<!-- <form action="" class="form-inline" method="post"> -->
	<!-- @csrf -->
	<!-- <input type="hidden" name="product_id" value="{{ $product->id }}"> -->
	<button type="button" class="addtocart-btn" onclick="addToCart( {{ $product->id }} )">Add to Cart</button>
<!-- </form> -->