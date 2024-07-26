{{-- <div>
    <!-- Komponen Livewire -->
    @livewire('app')

    <!-- Tambahkan JavaScript langsung di sini atau sertakan file eksternal -->
    <script>
        document.addEventListener('livewire:load', function() {
            // Hook yang akan dijalankan setiap kali ada pembaruan DOM dari Livewire
            Livewire.hook('message.processed', (message, component) => {
                // Inisialisasi ulang plugin atau JavaScript custom di sini
                initializePlugins();
            });
        });

        function initializePlugins() {
            setTimeout(function() {
                $(".form-input-styled").uniform({
                    fileButtonClass: "action btn bg-pink-400",
                });
                $(".form-control-select2").select2();
            }, 500);
        }
    </script>
</div> --}}
