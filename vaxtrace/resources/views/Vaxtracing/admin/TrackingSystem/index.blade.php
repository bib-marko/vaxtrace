@extends('Vaxtracing.layout.admin.app')

@section('title', 'Activity Logs')
  
@section('content')
    <div class="col-md-6 col-xl-3">
        <a class="block block-rounded block-transparent bg-gd-sun" href="javascript:void(0)">
            <div class="block-content block-content-full block-sticky-options">
                <div class="block-options">
                    <div class="block-options-item">
                        <i class="si si-users text-white-op"></i>
                    </div>
                </div>
                <div class="py-20 text-center" id="">
                    <div class="font-size-h2 font-w700 mb-0 text-white" id="">
                        <p id="infected"></p>
                    </div>
                    <div class="font-size-sm font-w600 text-uppercase text-white-op">Infected</div>
                </div>
            </div>
        </a>
    </div>

    
    
    <div class="col-md-6 col-xl-3">
        <a class="block block-rounded block-transparent bg-gd-sun" href="javascript:void(0)">
            <div class="block-content block-content-full block-sticky-options">
                <div class="block-options">
                    <div class="block-options-item">
                        <i class="si si-users text-white-op"></i>
                    </div>
                </div>
                <div class="py-20 text-center" id="">
                    <div class="font-size-h2 font-w700 mb-0 text-white" id="">
                        <p id="recovered"></p>
                    </div>
                    <div class="font-size-sm font-w600 text-uppercase text-white-op">Recovered</div>
                </div>
            </div>
        </a>
    </div>
    @section('scripts')
        <script type="text/javascript">
            

            
            $(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                async function fetchText() {
                    const url = 'https://api.apify.com/v2/key-value-stores/lFItbkoNDXKeSWBBA/records/LATEST?disableRedirect=true&fbclid=IwAR3xDqSgPDj8CsokK2OwMtTMzp7_NYLMl4902L9wcVrdsWADhqor7tlark8'
            
                    let response = await fetch(url);
                
                    let dataJson = await response.text();
                    let data = JSON.parse(dataJson);
                    console.log(data);
                    $('#infected').text(data.infected);
                    $('#recovered').text(data.recovered);
                }
                fetchText();
            });
        </script>
    @endsection
@endsection