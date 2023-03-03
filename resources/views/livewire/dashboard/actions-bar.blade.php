<div
    class="pb-8 pt-2 flex flex-wrap justify-between items-start"
>
    <div class="flex flex-wrap justify-between items-start gap-6">
        <livewire:dashboard.keyword-filter/>
        <livewire:dashboard.group-filter/>
    </div>

    <button
        class="text-lg px-6 rounded-custom text-white" style="background: #9013FE; max-width: 93px; "
        wire:click="$emit('exportResults')"
    >
        EXCEL
    </button>
</div>
