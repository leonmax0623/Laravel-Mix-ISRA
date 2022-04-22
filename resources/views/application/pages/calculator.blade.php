@extends('layout.application')

@section('main')
    <div class="calc container">
        <div class="calc-h">
            <img src="/storage/images/calc-icon2.png" alt="calculator" class="calc-h__icon">
            <h1 class="calc-h__title">{{ __('Volume Calculator') }}</h1>
        </div>
        <div class="calc-b">
            <div class="calc-bar">
                <x-application.calculator.block title="{{ __('Living room') }}">
                    <x-application.calculator.block-item title="{{ __('3 Seater Sofa') }}" volume="1.4" />
                    <x-application.calculator.block-item title="{{ __('2 Seater Sofa') }}" volume="1.2" />
                    <x-application.calculator.block-item title="{{ __('Corner') }}" volume="2.2" />
                    <x-application.calculator.block-item title="{{ __('Divan') }}" volume="1.2" />
                    <x-application.calculator.block-item title="{{ __('Chair') }}" volume="0.4" />
                    <x-application.calculator.block-item title="{{ __('Armchair') }}" volume="1" />
                    <x-application.calculator.block-item title="{{ __('Coffee Table') }}" volume="0.5" />
                    <x-application.calculator.block-item title="{{ __('Dining Table') }}" volume="1.5" />
                    <x-application.calculator.block-item title="{{ __('Dining Table (D)') }}" volume="1" />
                    <x-application.calculator.block-item title="{{ __('TV Stand (S)') }}" volume="0.85" />
                    <x-application.calculator.block-item title="{{ __('TV Stand (L)') }}" volume="1.2" />
                    <x-application.calculator.block-item title="{{ __('Paintings (L)') }}" volume="0.4" />
                    <x-application.calculator.block-item title="{{ __('Paintings (M)') }}" volume="0.2" />
                    <x-application.calculator.block-item title="{{ __('Paintings (S)') }}" volume="0.1" />
                </x-application.calculator.block>

                <x-application.calculator.block title="{{ __('Bedroom') }}">
                    <x-application.calculator.block-item title="{!! __('Double Bed & Mattress') !!}" volume="1.8" />
                    <x-application.calculator.block-item title="{!! __('Single Bed & Mattress') !!}" volume="1.4" />
                    <x-application.calculator.block-item title="{{ __('Mattress Double') }}" volume="1.6" />
                    <x-application.calculator.block-item title="{{ __('Mattress Single') }}" volume="1.2" />
                    <x-application.calculator.block-item title="{!! __('Dressing Table & Mirror') !!}" volume="0.8" />
                    <x-application.calculator.block-item title="{{ __('Bedside Table') }}" volume="0.15" />
                    <x-application.calculator.block-item title="{{ __('Wardrobe') }}" volume="1.5" />
                    <x-application.calculator.block-item title="{{ __('Wardrobe (D)') }}" volume="0.5" />
                    <x-application.calculator.block-item title="{{ __('Chest of Drawers') }}" volume="1.2" />
                    <x-application.calculator.block-item title="{{ __('Chest of Drawers (D)') }}" volume="0.3" />
                </x-application.calculator.block>

                <x-application.calculator.block title="{{ __('Office') }}">
                    <x-application.calculator.block-item title="{{ __('Desk') }}" volume="1.5" />
                    <x-application.calculator.block-item title="{{ __('Desk (D)') }}" volume="0.3" />
                    <x-application.calculator.block-item title="{{ __('Bookcase') }}" volume="1" />
                    <x-application.calculator.block-item title="{{ __('Bookcase (D)') }}" volume="0.4" />
                    <x-application.calculator.block-item title="{{ __('Bookshelf') }}" volume="0.8" />
                    <x-application.calculator.block-item title="{{ __('Bookshelf (D)') }}" volume="0.3" />
                    <x-application.calculator.block-item title="{{ __('Reception Desk') }}" volume="1.5" />
                    <x-application.calculator.block-item title="{{ __('Reception Desk (D)') }}" volume="1" />
                    <x-application.calculator.block-item title="{{ __('Chief\'s Table') }}" volume="2" />
                    <x-application.calculator.block-item title="{{ __('Chief\'s Table (D)') }}" volume="1" />
                    <x-application.calculator.block-item title="{{ __('Office Chair') }}" volume="0.7" />
                    <x-application.calculator.block-item title="{{ __('Chair') }}" volume="0.4" />
                    <x-application.calculator.block-item title="{{ __('Office Side Cabinet (L)') }}" volume="0.8" />
                    <x-application.calculator.block-item title="{{ __('Office Side Cabinet (S)') }}" volume="0.5" />
                    <x-application.calculator.block-item title="{{ __('Monitor') }}" volume="0.3" />
                    <x-application.calculator.block-item title="{{ __('Computer') }}" volume="0.3" />
                    <x-application.calculator.block-item title="{{ __('Fax Machine') }}" volume="0.2" />
                    <x-application.calculator.block-item title="{{ __('Printer (L)') }}" volume="0.8" />
                    <x-application.calculator.block-item title="{{ __('Printer (S)') }}" volume="0.3" />
                </x-application.calculator.block>

                <x-application.calculator.block title="{{ __('Kitchen and Laundry') }}">
                    <x-application.calculator.block-item title="{{ __('Fridge Large') }}" volume="1.8" />
                    <x-application.calculator.block-item title="{{ __('Fridge Midsize') }}" volume="1.5" />
                    <x-application.calculator.block-item title="{{ __('Freezer/Fridge (S)') }}" volume="1" />
                    <x-application.calculator.block-item title="{{ __('Microwave') }}" volume="0.15" />
                    <x-application.calculator.block-item title="{{ __('Dishwasher') }}" volume="0.7" />
                    <x-application.calculator.block-item title="{{ __('Oven') }}" volume="0.8" />
                    <x-application.calculator.block-item title="{{ __('Kitchen Table') }}" volume="1.3" />
                    <x-application.calculator.block-item title="{{ __('Kitchen Chair') }}" volume="0.2" />
                    <x-application.calculator.block-item title="{{ __('Washing Machine') }}" volume="0.7" />
                    <x-application.calculator.block-item title="{{ __('Dryer') }}" volume="0.7" />
                    <x-application.calculator.block-item title="{{ __('Ironing Board') }}" volume="0.15" />
                    <x-application.calculator.block-item title="{{ __('Clothes Dryer') }}" volume="0.1" />
                    <x-application.calculator.block-item title="{{ __('Laundry Cupboard') }}" volume="0.8" />
                    <x-application.calculator.block-item title="{{ __('Vacuum Cleaner') }}" volume="0.2" />
                    <x-application.calculator.block-item title="{{ __('Laundry Trolley') }}" volume="0.1" />
                </x-application.calculator.block>

                <x-application.calculator.block title="{{ __('Kid\'s Room') }}">
                    <x-application.calculator.block-item title="{!! __('Kid\'s Bed') !!}" volume="1.4" />
                    <x-application.calculator.block-item title="{!! __('Kid\'s Chair') !!}" volume="0.15" />
                    <x-application.calculator.block-item title="{!! __('Kid\'s Chest Drawers') !!}" volume="0.6" />
                    <x-application.calculator.block-item title="{!! __('Kid\'s Desk') !!}" volume="1" />
                    <x-application.calculator.block-item title="{!! __('Kid\'s Chest') !!}" volume="1" />
                </x-application.calculator.block>

                <x-application.calculator.block title="{{ __('Sundries') }}">
                    <x-application.calculator.block-item title="{{ __('Suitcase') }}" volume="0.2" />
                    <x-application.calculator.block-item title="{{ __('Pram') }}" volume="0.35" />
                    <x-application.calculator.block-item title="{{ __('Bicycle') }}" volume="0.5" />
                    <x-application.calculator.block-item title="{{ __('B.B.Q.') }}" volume="0.8" />
                    <x-application.calculator.block-item title="{{ __('TV') }}" volume="0.4" />
                    <x-application.calculator.block-item title="{{ __('Stereo') }}" volume="0.4" />
                    <x-application.calculator.block-item title="{{ __('Loudspeakers Floor') }}" volume="0.5" />
                    <x-application.calculator.block-item title="{{ __('VCR/DVD/CD Player') }}" volume="0.2" />
                    <x-application.calculator.block-item title="{{ __('Heater') }}" volume="0.3" />
                    <x-application.calculator.block-item title="{{ __('Fan') }}" volume="0.3" />
                    <x-application.calculator.block-item title="{{ __('Folding Chair') }}" volume="0.1" />
                    <x-application.calculator.block-item title="{{ __('Outdoor Table') }}" volume="1" />
                    <x-application.calculator.block-item title="{{ __('Exercise Bike') }}" volume="0.6" />
                    <x-application.calculator.block-item title="{{ __('Carpet/Rug') }}" volume="0.15" />
                    <x-application.calculator.block-item title="{{ __('Bench') }}" volume="0.8" />
                    <x-application.calculator.block-item title="{{ __('Ladder') }}" volume="0.4" />
                    <x-application.calculator.block-item title="{{ __('Floor Lamp') }}" volume="0.2" />
                    <x-application.calculator.block-item title="{{ __('Loudspeakers Small') }}" volume="0.3" />
                </x-application.calculator.block>

                <x-application.calculator.block title="{{ __('Boxes and Cardboards') }}">
                    <x-application.calculator.block-item title="{{ __('Large Cardbox (350*400*600)') }}" volume="1" />
                    <x-application.calculator.block-item title="{{ __('Standard Cardbox (250*300*500)') }}" volume="0.5" />
                    <x-application.calculator.block-item title="{!! __('Book & Wine Cardbox (200*250*400)') !!}" volume="0.25" />
                </x-application.calculator.block>
            </div>
            <div class="calc-title">{{ __('Volume Calculation') }}</div>
            <div class="calc-label">{{ __('Volume Summary') }} <span class="_grey">({{ __('m³') }})</span></div>
            <div class="calc__inner">
                <div class="calc-placeholder">
                    <div class="calc-progress" data-percent-value="35.5">
                        <div class="calc-ind">
                            <div class="calc-ind__val">
                                <span>11</span>{{ __('m³') }}
                            </div>
                            <div class="calc-ind__div"></div>
                        </div>
                    </div>
                </div>
                <div class="calc-divs">
                    @for($i = 0; $i <= 30; $i++)
                        <div class="item">
                            <div class="line"></div>
                            <div class="num">{{ $i }}</div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="calc-f">
            <div class="calc-f-total">
                {{ __('Volume') }} <span class="_red">({{ __('m³') }})</span> = <span class="calc-f-total__val">9</span>
            </div>
            <div class="calc-f-bar">
                <a href="#" class="calc-link section-link _grey">
                    <div class="calc-link__icon section-link__icon">
                        <img src="/storage/images/phone-icon2.png" alt="phone">
                    </div>
                    <div class="calc-link__text">{{ __('Order a Call') }}</div>
                </a>
                <a href="#" class="calc-link section-link link-arrow">
                    <div class="calc-link__icon section-link__icon">
                        <img src="/storage/images/operator-icon.png" alt="operator">
                    </div>
                    <div class="calc-link__text">{{ __('Contact Us') }}</div>
                </a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>


        const calcProgress = document.querySelector(".calc-progress");

        if(calcProgress) {
            const elItemSelectors = document.querySelectorAll('.calc.container .calc-dd .calc-list .calc-list__item .calc-subdd-list > li');

            elItemSelectors.forEach((elem, index) => {
                elem.addEventListener('click', () => {
                    var elItems = document.querySelectorAll('.calc.container .calc-dd .calc-list .calc-list__item');
                    var totalVolume = 0;

                    elItems.forEach((elem2, index) => {
                        var volume = parseFloat(elem2.getAttribute('data-volume'));
                        var count = 0;

                        if(elem.closest('.calc-subdd-list') === elem2.querySelector('.calc-subdd .calc-subdd-list')) {
                            count = parseInt(elem.textContent);
                        } else {
                            count = parseInt(elem2.querySelector('.calc-subdd .calc-subdd__text').textContent);
                        }

                        totalVolume += volume * count;
                    });

                    var maxVolume = document.querySelectorAll('.calc.container .calc-divs > .item').length;

                    calcProgress.dataset.percentValue = 100 / maxVolume * totalVolume;

                    if (calcProgress.dataset.percentValue <= 100) {
                        calcProgress.style.width = calcProgress.dataset.percentValue + '%';
                    } else {
                        calcProgress.style.width = '100%';
                    }

                    calcProgress.querySelector('.calc-ind__val > span').textContent = totalVolume.toFixed(2);
                    document.querySelector('.calc.container .calc-f .calc-f-total .calc-f-total__val').textContent = totalVolume.toFixed(2);
                });
            });

            elItemSelectors[0].dispatchEvent(new Event('click'))
        }
    </script>
@endpush
