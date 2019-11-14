<form action="{{ route('carts.add') }}" class="form-inline" method="post">
	@csrf
	<input type="hidden" name="product_id" value="{{ $product->id }}">
	<button type="submit" class="addtocart-btn">Add to Cart</button>
</form>