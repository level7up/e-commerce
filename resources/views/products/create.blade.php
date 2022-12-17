<x-dashboard::full :title="__('ecommerce::keywords.products')">
    <x-dashboard::card.form :action="route('dashboard.product.store')" enctype="multipart/form-data">
        @method('post')
        <x-dashboard::form.input name="name"/>
        <x-dashboard::form.input name="description"/>
        <x-dashboard::form.input type="number" step="0.01" name="price"/>
        <x-dashboard::form.input type="number" name="qty">Quantity <span class="badge badge-danger">leave blank if always available</span></x-dashboard::form.input>
        <x-dashboard::form.select name="category_id" :options="$categories" />
        <x-dashboard::form.toggle name="special">{{ __('Is Special') }}</x-dashboard::form.toggle>
        <x-dashboard::form.image name="image" />
    </x-dashboard::card.form>
</x-dashboard::full>