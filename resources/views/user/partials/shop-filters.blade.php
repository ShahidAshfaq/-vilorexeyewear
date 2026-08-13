<div class="filter-sidebar">

    {{-- Filter Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h5 class="filter-title mb-0">
            Shop Filters
        </h5>

        <i class="fas fa-sliders-h" style="color:var(--gold-dark);">
        </i>

    </div>


    {{-- =================================================
                     ALL FILTERS FORM
                ================================================== --}}

    <form action="{{ route('product.index') }}" method="GET">

        {{-- =================================================
                         CATEGORY
                    ================================================== --}}

        <div class="filter-heading">
            Categories
        </div>


        {{-- All Products --}}

        <a href="{{ route('product.index') }}" class="category-link {{ !request('category_id') ? 'active' : '' }}">

            <span>

                <i class="fas fa-border-all me-2"></i>

                All Products

            </span>

        </a>


        {{-- Categories --}}

        @foreach ($categories as $category)
            <a href="{{ route('product.index', ['category_id' => $category->id]) }}"
                class="category-link
                            {{ request('category_id') == $category->id ? 'active' : '' }}">

                <span>
                    {{ $category->name }}
                </span>

            </a>
        @endforeach


        {{-- =================================================
                         PRICE
                    ================================================== --}}

        {{-- <div class="filter-heading mt-4">

                        <span>
                            Price Range
                        </span>

                        <i class="fas fa-tag"
                           style="color:var(--gold-dark);">
                        </i>

                    </div> --}}


    
        @php
            $selectedMin = (int) request('min_price', 0);
            $selectedMax = (int) request('max_price', 50000);
        @endphp

        <div class="filter-heading">
            <span>Price Range</span>
            <i class="fas fa-tag" style="color:var(--gold-dark);"></i>
        </div>

        <div class="price-values">
            <span>
                Rs <strong id="minPriceText">{{ number_format($selectedMin) }}</strong>
            </span>

            <span>
                Rs <strong id="maxPriceText">{{ number_format($selectedMax) }}</strong>
            </span>
        </div>

        <div class="price-slider">

    <div class="slider-track"></div>

    <div class="slider-range" id="sliderRange"></div>

    <input
        type="range"
        id="minPrice"
        name="min_price"
        min="0"
        max="50000"
        step="500"
        value="{{ $selectedMin }}"
    >

    <input
        type="range"
        id="maxPrice"
        name="max_price"
        min="0"
        max="50000"
        step="500"
        value="{{ $selectedMax }}"
    >

</div>

<!-- Toast MUST be outside price-slider -->
<div id="priceToast" class="price-toast">
    <span id="priceToastText"></span>
</div>

        


        {{-- =================================================
                         FRAME TYPE
                    ================================================== --}}

        <div class="filter-heading mt-4">

            <span>
                Frame Type
            </span>

        </div>


        {{-- Full Rim --}}

        <div class="filter-check form-check">

            <input class="form-check-input" type="checkbox" name="frame_type[]" value="Full Rim" id="fullRim"
                {{ in_array('Full Rim', request('frame_type', [])) ? 'checked' : '' }}>

            <label class="form-check-label" for="fullRim">
                Full Rim
            </label>

        </div>


        {{-- Half Rim --}}

        <div class="filter-check form-check">

            <input class="form-check-input" type="checkbox" name="frame_type[]" value="Half Rim" id="halfRim"
                {{ in_array('Half Rim', request('frame_type', [])) ? 'checked' : '' }}>

            <label class="form-check-label" for="halfRim">
                Half Rim
            </label>

        </div>


        {{-- Rimless --}}

        <div class="filter-check form-check">

            <input class="form-check-input" type="checkbox" name="frame_type[]" value="Rimless" id="rimless"
                {{ in_array('Rimless', request('frame_type', [])) ? 'checked' : '' }}>

            <label class="form-check-label" for="rimless">
                Rimless
            </label>

        </div>


        {{-- =================================================
                         LENS TYPE
                    ================================================== --}}

        <div class="filter-heading mt-4">

            <span>
                Lens Type
            </span>

        </div>


        {{-- Single Vision --}}

        <div class="filter-check form-check">

            <input class="form-check-input" type="checkbox" name="lens_type[]" value="Single Vision" id="singleVision"
                {{ in_array('Single Vision', request('lens_type', [])) ? 'checked' : '' }}>

            <label class="form-check-label" for="singleVision">
                Single Vision
            </label>

        </div>


        {{-- Blue Cut --}}

        <div class="filter-check form-check">

            <input class="form-check-input" type="checkbox" name="lens_type[]" value="Blue Cut" id="blueCut"
                {{ in_array('Blue Cut', request('lens_type', [])) ? 'checked' : '' }}>

            <label class="form-check-label" for="blueCut">
                Blue Cut
            </label>

        </div>


        {{-- Progressive --}}

        <div class="filter-check form-check">

            <input class="form-check-input" type="checkbox" name="lens_type[]" value="Progressive" id="progressive"
                {{ in_array('Progressive', request('lens_type', [])) ? 'checked' : '' }}>

            <label class="form-check-label" for="progressive">
                Progressive
            </label>

        </div>


        {{-- Sunglasses --}}

        <div class="filter-check form-check">

            <input class="form-check-input" type="checkbox" name="lens_type[]" value="Sunglasses" id="sunglasses"
                {{ in_array('Sunglasses', request('lens_type', [])) ? 'checked' : '' }}>

            <label class="form-check-label" for="sunglasses">
                Sunglasses
            </label>

        </div>


        {{-- No Power --}}

        <div class="filter-check form-check">

            <input class="form-check-input" type="checkbox" name="lens_type[]" value="No Power" id="noPower"
                {{ in_array('No Power', request('lens_type', [])) ? 'checked' : '' }}>

            <label class="form-check-label" for="noPower">
                No Power
            </label>

        </div>


        {{-- =================================================
                         GENDER
                    ================================================== --}}

        <div class="filter-heading mt-4">
            Gender
        </div>


        {{-- Men --}}

        <div class="filter-check form-check">

            <input class="form-check-input" type="checkbox" name="gender[]" value="Men" id="men"
                {{ in_array('Men', request('gender', [])) ? 'checked' : '' }}>

            <label class="form-check-label" for="men">
                Men
            </label>

        </div>


        {{-- Women --}}

        <div class="filter-check form-check">

            <input class="form-check-input" type="checkbox" name="gender[]" value="Women" id="women"
                {{ in_array('Women', request('gender', [])) ? 'checked' : '' }}>

            <label class="form-check-label" for="women">
                Women
            </label>

        </div>


        {{-- Unisex --}}

        <div class="filter-check form-check">

            <input class="form-check-input" type="checkbox" name="gender[]" value="Unisex" id="unisex"
                {{ in_array('Unisex', request('gender', [])) ? 'checked' : '' }}>

            <label class="form-check-label" for="unisex">
                Unisex
            </label>

        </div>


        {{-- Kids --}}

        <div class="filter-check form-check">

            <input class="form-check-input" type="checkbox" name="gender[]" value="Kids" id="kids"
                {{ in_array('Kids', request('gender', [])) ? 'checked' : '' }}>

            <label class="form-check-label" for="kids">
                Kids
            </label>

        </div>


        {{-- =================================================
                         AVAILABILITY
                    ================================================== --}}

        <div class="filter-heading mt-4">
            Availability
        </div>


        <div class="filter-check form-check">

            <input class="form-check-input" type="checkbox" name="availability" value="in_stock" id="inStock"
                {{ request('availability') == 'in_stock' ? 'checked' : '' }}>

            <label class="form-check-label" for="inStock">
                In Stock
            </label>

        </div>


        {{-- =================================================
                         SALE
                    ================================================== --}}

        <div class="filter-check form-check">

            <input class="form-check-input" type="checkbox" name="sale" value="1" id="saleOnly"
                {{ request('sale') == '1' ? 'checked' : '' }}>

            <label class="form-check-label" for="saleOnly">

                <i class="fas fa-fire me-1" style="color:var(--gold-dark);">
                </i>

                On Sale

            </label>

        </div>


        {{-- =================================================
                         APPLY BUTTON
                    ================================================== --}}

        <button type="submit" class="filter-btn mt-4 w-100">

            <i class="fas fa-filter me-2"></i>

            Apply Filters

        </button>


        {{-- =================================================
                         CLEAR FILTERS
                    ================================================== --}}

        @if (request()->hasAny([
                'category_id',
                'min_price',
                'max_price',
                'frame_type',
                'lens_type',
                'gender',
                'availability',
                'sale',
            ]))
            <a href="{{ route('product.index') }}" class="clear-filter d-block text-center mt-3">

                <i class="fas fa-times me-1"></i>

                Clear All Filters

            </a>
        @endif

    </form>

</div>

<style>
    /* ========================================= PRICE VALUES ========================================= */
    .price-values {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 18px;
        font-size: 14px;
    }

    .price-values strong {
        color: var(--gold-dark);
        font-weight: 700;
    }

    /* ========================================= PRICE SLIDER CONTAINER ========================================= */
    .price-slider {
        position: relative;
        width: 100%;
        height: 40px;
        margin: 5px 0 10px;
    }

    /* ========================================= BACKGROUND TRACK ========================================= */
    .slider-track {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        height: 6px;
        transform: translateY(-50%);
        background: #ddd;
        border-radius: 10px;
        z-index: 1;
    }

    /* ========================================= SELECTED PRICE RANGE ========================================= */
    .slider-range {
        position: absolute;
        top: 50%;
        left: 0;
        height: 6px;
        transform: translateY(-50%);
        background: var(--gold-dark);
        border-radius: 10px;
        z-index: 2;
    }

    /* ========================================= RANGE INPUTS ========================================= */
    .price-slider input[type="range"] {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 40px;
        margin: 0;
        padding: 0;
        background: transparent;
        border: none;
        appearance: none;
        -webkit-appearance: none;
        pointer-events: none;
    }

    /* Maximum slider on top */
    #maxPrice {
        z-index: 5;
    }

    /* Minimum slider */
    #minPrice {
        z-index: 4;
    }

    /* ========================================= CHROME / EDGE / SAFARI TRACK ========================================= */
    .price-slider input[type="range"]::-webkit-slider-runnable-track {
        width: 100%;
        height: 6px;
        background: transparent;
        border: none;
    }

    /* ========================================= CHROME / EDGE / SAFARI THUMB ========================================= */
    .price-slider input[type="range"]::-webkit-slider-thumb {
        appearance: none;
        -webkit-appearance: none;
        width: 20px;
        height: 20px;
        margin-top: -7px;
        background: var(--gold-dark);
        border: 3px solid #fff;
        border-radius: 50%;
        cursor: pointer;
        pointer-events: auto;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25);
        transition: transform 0.15s ease;
    }

    /* Thumb hover */
    .price-slider input[type="range"]::-webkit-slider-thumb:hover {
        transform: scale(1.12);
    }

    /* ========================================= FIREFOX TRACK ========================================= */
    .price-slider input[type="range"]::-moz-range-track {
        width: 100%;
        height: 6px;
        background: transparent;
        border: none;
    }

    /* ========================================= FIREFOX THUMB ========================================= */
    .price-slider input[type="range"]::-moz-range-thumb {
        width: 20px;
        height: 20px;
        background: var(--gold-dark);
        border: 3px solid #fff;
        border-radius: 50%;
        cursor: pointer;
        pointer-events: auto;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25);
    }

    /* ========================================= DESKTOP ========================================= */
   @media (min-width: 992px) {

    .price-slider {
        height: 45px;
        margin-top: 5px;
    }

    .price-slider input[type="range"] {
        height: 45px;
    }

    .slider-track,
    .slider-range {
        height: 6px;
    }

}

    /* ========================================= MOBILE ========================================= */
    @media (max-width: 575px) {
        .price-values {
            font-size: 13px;
        }

        .price-slider {
            height: 40px;
        }
    }

    /* =========================================
   PRICE TOAST
========================================= */

.price-toast {
    position: fixed;
    left: 50%;
    bottom: 30px;

    transform: translate(-50%, 20px);
    opacity: 0;
    visibility: hidden;

    background: var(--gold-dark);
    color: #fff;

    padding: 10px 18px;
    border-radius: 8px;

    font-size: 14px;
    font-weight: 600;

    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);

    z-index: 99999;

    transition:
        opacity 0.25s ease,
        transform 0.25s ease,
        visibility 0.25s ease;

    pointer-events: none;
}

.price-toast.show {
    opacity: 1;
    visibility: visible;
    transform: translate(-50%, 0);
}
.price-slider input[type="range"] {
    position: absolute;
    top: 0;
    left: 0;

    width: 100%;
    height: 40px;

    margin: 0;
    padding: 0;

    background: transparent;
    border: none;

    appearance: none;
    -webkit-appearance: none;

    cursor: pointer;

    /* IMPORTANT */
    pointer-events: none;
}

/* The thumb itself receives the mouse */
.price-slider input[type="range"]::-webkit-slider-thumb {
    pointer-events: auto;
}

.price-slider input[type="range"]::-moz-range-thumb {
    pointer-events: auto;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const minSlider = document.getElementById('minPrice');
    const maxSlider = document.getElementById('maxPrice');

    const minText = document.getElementById('minPriceText');
    const maxText = document.getElementById('maxPriceText');

    const sliderRange = document.getElementById('sliderRange');

    const priceToast = document.getElementById('priceToast');
    const priceToastText = document.getElementById('priceToastText');

    if (
        !minSlider ||
        !maxSlider ||
        !minText ||
        !maxText ||
        !sliderRange
    ) {
        console.log('Price slider elements not found');
        return;
    }

    let toastTimer = null;


    /* =========================================
       SHOW TOAST
    ========================================= */

    function showToast(type, value) {

        if (!priceToast || !priceToastText) {
            return;
        }

        if (type === 'min') {

            priceToastText.textContent =
                'Minimum: Rs ' + value.toLocaleString();

        } else {

            priceToastText.textContent =
                'Maximum: Rs ' + value.toLocaleString();

        }

        priceToast.classList.add('show');

        clearTimeout(toastTimer);

        toastTimer = setTimeout(function () {
            priceToast.classList.remove('show');
        }, 1000);
    }


    /* =========================================
       UPDATE SLIDER
    ========================================= */

    function updatePriceSlider() {

        let minValue = Number(minSlider.value);
        let maxValue = Number(maxSlider.value);

        /*
         * Prevent MIN from going above MAX
         */
        if (minValue > maxValue) {

            if (document.activeElement === minSlider) {

                minValue = maxValue;
                minSlider.value = maxValue;

            } else {

                maxValue = minValue;
                maxSlider.value = minValue;
            }
        }


        /*
         * Update text
         */
        minText.textContent =
            minValue.toLocaleString();

        maxText.textContent =
            maxValue.toLocaleString();


        /*
         * Slider limits
         */
        const min = Number(minSlider.min);
        const max = Number(minSlider.max);


        /*
         * Calculate percentages
         */
        const minPercent =
            ((minValue - min) / (max - min)) * 100;

        const maxPercent =
            ((maxValue - min) / (max - min)) * 100;


        /*
         * Gold selected range
         */
        sliderRange.style.left =
            minPercent + '%';

        sliderRange.style.width =
            (maxPercent - minPercent) + '%';
    }


    /* =========================================
       MIN SLIDER
    ========================================= */

    minSlider.addEventListener('input', function () {

        updatePriceSlider();

        showToast(
            'min',
            Number(this.value)
        );

    });


    /* =========================================
       MAX SLIDER
    ========================================= */

    maxSlider.addEventListener('input', function () {

        updatePriceSlider();

        showToast(
            'max',
            Number(this.value)
        );

    });


    /* =========================================
       CHANGE EVENT
       Useful for desktop browsers
    ========================================= */

    minSlider.addEventListener('change', function () {

        updatePriceSlider();

        showToast(
            'min',
            Number(this.value)
        );

    });


    maxSlider.addEventListener('change', function () {

        updatePriceSlider();

        showToast(
            'max',
            Number(this.value)
        );

    });


    /* =========================================
       INITIAL
    ========================================= */

    updatePriceSlider();

});
</script>
