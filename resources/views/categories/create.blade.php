<x-dashboard::full :title="__('ecommerce::keywords.categories')">
    <x-dashboard::card.form :action="route('dashboard.category.store')" enctype="multipart/form-data">
        @method('post')
        <x-dashboard::form.input name="name"/>
        <x-dashboard::form.toggle name="special">{{ __('Is Special') }}</x-dashboard::form.toggle>
        <x-dashboard::form.image name="image" />
    </x-dashboard::card.form>
</x-dashboard::full>