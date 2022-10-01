@extends('welcome')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 p-3">
                <h2>Все товары для покупки</h2>
                <div class="pagination">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
