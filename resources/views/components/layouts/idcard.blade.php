@stack('css')
@livewireStyles
<div class="content">
    <div class="row">
        <div class="col-xl-12">
            @include('components.layouts.part-layout.content')
        </div>



    </div>
</div>

@livewireScripts
@livewireChartsScripts
@stack('js')
