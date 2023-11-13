<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('Dashboard') }} 
        </h2>
    </x-slot>
   <div class="container" style="padding-top:30px">
    <div class="row justify-content-center ">
    <div class="col-md-8 ">
        <div class="card">
            <div class="card-header bg-info">Main function</div>
            <div class="card-body" style="padding-left: 95px">
                <div class="row">
                    @if(Auth::user()->checkAdmin())
                <div class="col-md-4">
                    <a href="/management/category" wire:navigate>
                        <h4>Managment</h4>
                        <img width="50px" src="{{asset('images/management.svg')}}"/>
                    </a>
                </div>
                @endif
                <div class="col-md-4">
                    <a href="/cashier">
                        <h4>Cashier</h4>
                        <img width="50px" src="{{asset('images/cashier.svg')}}"/>
                    </a>
                </div>
                @if(Auth::user()->checkAdmin())
                <div class="col-md-4">
                    <a href="/report/index">
                        <h4>Report</h4>
                        <img width="50px" src="{{asset('images/report.svg')}}"/>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
    </div>
</div>
</div>
</x-app-layout>
