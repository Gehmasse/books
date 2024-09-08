<x-app-layout>

    <livewire:books/>

    <style>
        .books {
            display: flex;
            align-content: center;
            align-items: center;
            flex-direction: column;
            gap: 20px;
            padding-block: 30px;
        }

        .books > * {
            min-width: 60%;
        }
    </style>

</x-app-layout>
