<x-dashboard::full :title="__('ecommerce::keywords.products')">
    <x-dashboard::datatable-mini :data-table="$dataTable"  />
     <x-slot name="toolbarButtons">
        <a href="{{route('dashboard.product.create')}}" class="btn btn-success btn-sm">
            {{ __('Add Purchase') }}
        </a>
    </x-slot>
</x-dashboard::full>