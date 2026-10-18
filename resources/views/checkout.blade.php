@section('breadcrumb-title')
    <h2>Checkout</h2>
@endsection

@section('breadcrumb')
    <span>›</span>

    <a href="{{ route('shop.index') }}">
        Shop
    </a>

    <span>›</span>

    <a href="{{ route('cart.index') }}">
        Shopping Cart
    </a>

    <span>›</span>

    <span>Checkout</span>
@endsection