<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyStore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">MyStore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Search</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="/">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div> --}}
        </div>
    </nav>

    <form id="filters-form" action="/" method="get">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-auto bg-light sticky-top" style="min-width: 300px;">

                    <div class="card text-dark bg-light mb-3 mt-3" style="max-width: 18rem;">
                        <div class="card-header">Filters</div>
                        <div class="card-body">
                            <h5 class="card-title pb-1">Price</h5>
                            <div class="row">
                                <div class="col-6">
                                    <select id="filter-price-min" name="filter-price-min" class="form-select"
                                        onchange="this.form.submit()">
                                        <option value="min" @if( request()->get('filter-price-min') == 'min') selected
                                            @endif>Min</option>
                                        <option value="100" @if( request()->get('filter-price-min') == '100') selected
                                            @endif>100</option>
                                        <option value="300" @if( request()->get('filter-price-min') == '300') selected
                                            @endif>300</option>
                                        <option value="500" @if( request()->get('filter-price-min') == '500') selected
                                            @endif>500</option>
                                        <option value="1000" @if( request()->get('filter-price-min') == '1000') selected
                                            @endif>1000</option>
                                        <option value="1500" @if( request()->get('filter-price-min') == '1500') selected
                                            @endif>1500</option>
                                        <option value="2500" @if( request()->get('filter-price-min') == '2500') selected
                                            @endif>2500</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select id="filter-price-max" name="filter-price-max" class="form-select"
                                        onchange="this.form.submit()">
                                        <option value="100" @if( request()->get('filter-price-max') == '100') selected
                                            @endif>100</option>
                                        <option value="300" @if( request()->get('filter-price-max') == '300') selected
                                            @endif>300</option>
                                        <option value="500" @if( request()->get('filter-price-max') == '500') selected
                                            @endif>500</option>
                                        <option value="1000" @if( request()->get('filter-price-max') == '1000') selected
                                            @endif>1000</option>
                                        <option value="1500" @if( request()->get('filter-price-max') == '1500') selected
                                            @endif>1500</option>
                                        <option value="2500" @if( request()->get('filter-price-max') == '2500') selected
                                            @endif>2500</option>
                                        <option value="max" @if( request()->get('filter-price-max') == 'max' ||
                                            request()->get('filter-price-max') == '') selected
                                            @endif>Max</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="py-0" />
                        <div class="card-body pt-0">
                            <h5 class="card-title pb-1">Rating</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="filter-rating" value="4-and-up"
                                    id="filter-rating-4-and-up" onchange="this.form.submit()" @if(
                                    request()->get('filter-rating') == '4-and-up') checked
                                @endif>
                                <label class="form-check-label" for="filter-rating-4-and-up">
                                    4 <i class="bi bi-star-fill text-warning"></i> and up
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="filter-rating" value="3-and-up"
                                    id="filter-rating-3-and-up" onchange="this.form.submit()" @if(
                                    request()->get('filter-rating') == '3-and-up') checked
                                @endif>
                                <label class="form-check-label" for="filter-rating-3-and-up">
                                    3 <i class="bi bi-star-fill text-warning"></i> and up
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="filter-rating" value="2-and-up"
                                    id="filter-rating-2-and-up" @if( request()->get('filter-rating') == '2-and-up')
                                checked
                                @endif>
                                <label class="form-check-label" for="filter-rating-2-and-up">
                                    2 <i class="bi bi-star-fill text-warning"></i> and up
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="filter-rating" value="1-and-up"
                                    id="filter-rating-1-and-up" @if( request()->get('filter-rating') == '1-and-up')
                                checked
                                @endif>
                                <label class="form-check-label" for="filter-rating-1-and-up">
                                    1 <i class="bi bi-star-fill text-warning"></i> and up
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md p-3 min-vh-100">
                    <!-- content -->
                    <div class="row">
                        <div class="col">
                            {{count($products)}} results
                        </div>
                        <div class="col text-end">
                            <div class="mb-3 row">
                                <label for="sortBy" class="col-sm-8 col-form-label">Sort by:</label>
                                <div class="col-sm-4">
                                    <select id="sort-by" name="sort-by" class="form-select"
                                        onchange="this.form.submit()">
                                        <option value="none" @if( request()->get('sort-by') == 'none' ||
                                            request()->get('sort-by') == '') selected
                                            @endif>None</option>
                                        <option value="price-desc" @if( request()->get('sort-by') == 'price-desc')
                                            selected
                                            @endif>Price: High to Low</option>
                                        <option value="price-asc" @if( request()->get('sort-by') == 'price-asc')
                                            selected
                                            @endif>Price: Low to High</option>
                                        <option value="rating-desc" @if( request()->get('sort-by') == 'rating-desc')
                                            selected
                                            @endif>Top Rated</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- products -->
                    <div class="container-fluid g-0 products">
                        <div class="row">
                            @foreach ($products as $product)
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-2 mb-4">
                                <div class="card product">
                                    <img src="{{ asset('img/products/product-'.(($loop->index % 5) + 1).'.png') }}"
                                        class="card-img-top" alt="Product image">
                                    <div class="card-body">
                                        <h5 class="card-title product-name">{{ $product->name }}</h5>
                                        <p class="product-price">R <span class="product-price-value">{{ $product->price
                                                }}</span></p>
                                        <p class="card-text product-description">{{ $product->description }}</p>
                                        <p class="product-rating"><i class="bi bi-star-fill text-warning"></i> {{
                                            $product->rating }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>


</html>