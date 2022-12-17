<x-dashboard::full :title="__('ecommerce::keywords.categories')">
    <x-dashboard::datatable-mini :data-table="$dataTable"  />
     <x-slot name="toolbarButtons">
        <a href="{{route('dashboard.category.create')}}" class="btn btn-success btn-sm">
            {{ __('Add Category') }}
        </a>
    </x-slot>
</x-dashboard::full>