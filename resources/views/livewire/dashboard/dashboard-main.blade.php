<div class="relative px-16 py-5">
    <livewire:dashboard.actions-bar :group="$group" :keyword="$keyword"/>
    <livewire:dashboard.results-table :translations="$translations" :keyword="$keyword"/>

    {{-- Modal --}}
    <livewire:modals.translation-modal/>
</div>

