<div
    x-data="{
        selectedGroup: @entangle('selectedGroup'),
        isOpen: false,
        toggleIsOpen(){
            this.isOpen = !this.isOpen;
        },
        setIsOpenToFalse(){
            this.isOpen = false;
        },
        setGroup(group){
            this.$wire.setGroup(group);
            this.isOpen = !this.isOpen;
        }
    }"
    class="relative"
>

    <div
        x-show="!isOpen"
        x-on:click="toggleIsOpen()"
        class="px-4 py-1.5 flex justify-between items-center gap-6 cursor-pointer rounded-custom bg-white hover:ring hover:ring-blue-400"
    >

        <span x-show="!selectedGroup || isOpen" class="text-sm" style="color: #C0C0C0">GROUP</span>
        <span x-cloak x-show="selectedGroup && !isOpen" class="text-sm" style="color: #2A2A2A">{{$selectedGroup}}</span>

        <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
        </svg>

    </div>


    <ul
        x-cloak
        x-show="isOpen"
        class="
            absolute
            left-0
            z-10
            bg-white
            rounded-custom
            w-max
            cursor-pointer
        "
        :class="{ 'border border-blue-400': isOpen }"
        @click.away.outside="setIsOpenToFalse()"
    >
        <li x-cloak x-show="isOpen" class="px-4 py-1.5 flex justify-between items-center gap-6" x-on:click="setGroup('')">
            <span class="text-sm" style="color: #C0C0C0">GROUP</span>
            <svg x-cloak x-show="isOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" />
            </svg>
        </li>
        @foreach($groups as $group)
            <li x-cloak x-show="isOpen" class="px-4 py-1.5" x-on:click="setGroup('{{$group}}')">
                <span class="text-sm" style="color: #2A2A2A">{{$group}}</span>
            </li>
        @endforeach
    </ul>

</div>
