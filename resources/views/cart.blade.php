@section('breadcrumb-title')
    <h2>Shopping Cart</h2>
@endsection

@section('breadcrumb')
    <span>›</span>

    <a href="{{ route('shop.index') }}">
        Shop
    </a>

    <span>›</span>

    <span>Shopping Cart</span>
@endsection