<div>
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-around bg-gray-100 p-5 m-4 rounded-lg shadow-md">
        <div>
            <button wire:click="$emit('paymentMethod', 'cellphonePayment')" class="w-full md:w-auto bg-sky-200 flex items-end transition hover:translate-y-1 hover:delay-150 p-2 rounded-lg shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-mobile" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M6 5a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-14z" />
                    <path d="M11 4h2" />
                    <path d="M12 17v.01" />
                </svg>
                <p class="uppercase font-bold">Cellphone payment</p>
            </button>
        </div>

        <div>
            <button wire:click="$emit('paymentMethod', 'bankTransfer')" class="w-full md:w-auto bg-sky-200 flex items-end transition hover:translate-y-1 hover:delay-150 p-2 rounded-lg shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-bank" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3 21l18 0" />
                    <path d="M3 10l18 0" />
                    <path d="M5 6l7 -3l7 3" />
                    <path d="M4 10l0 11" />
                    <path d="M20 10l0 11" />
                    <path d="M8 14l0 3" />
                    <path d="M12 14l0 3" />
                    <path d="M16 14l0 3" />
                </svg>
                <p class="uppercase font-bold">Bank transfer</p>
            </button>
        </div>

        <div>
            <button wire:click="$emit('paymentMethod', 'paypal')" class="w-full md:w-auto bg-sky-200 flex items-end transition hover:translate-y-1 hover:delay-150 p-2 rounded-lg shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-paypal-filled" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12.5 2c3.113 0 5.309 1.785 5.863 4.565c1.725 1.185 2.637 3.152 2.637 5.435c0 2.933 -2.748 5.384 -5.783 5.496l-.217 .004h-1.754l-.466 2.8a1.998 1.998 0 0 1 -1.823 1.597l-.157 .003h-2.68a1.5 1.5 0 0 1 -1.182 -.54a1.495 1.495 0 0 1 -.348 -1.07l.042 -.29h-1.632c-1.004 0 -1.914 -.864 -1.994 -1.857l-.006 -.143l.01 -.141l1.993 -13.954l.003 -.048c.072 -.894 .815 -1.682 1.695 -1.832l.156 -.02l.143 -.005h5.5zm5.812 7.35l-.024 .087c-.706 2.403 -3.072 4.436 -5.555 4.557l-.233 .006h-2.503v.05l-.025 .183l-1.2 5a1.007 1.007 0 0 1 -.019 .07l-.088 .597h2.154l.595 -3.564a1 1 0 0 1 .865 -.829l.121 -.007h2.6c2.073 0 4 -1.67 4 -3.5c0 -1.022 -.236 -1.924 -.688 -2.65z" stroke-width="0" fill="currentColor" />
                </svg>
                <p class="uppercase font-bold">Paypal</p>
            </button>
        </div>
    </div>
</div>

