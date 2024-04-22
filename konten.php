<div class="content w-full mx-auto mt-8 px-4">
    <!-- Tabs -->
    <div class="border-b border-gray-200">
        <nav class="mb-4 flex" aria-label="Tabs">
            <button onclick="openTab(event, 'slider1')" class="group relative w-1/3 py-4 px-1 border-b-2 font-medium text-sm focus:outline-none focus:border-indigo-500" aria-current="page" id="defaultOpen">
                Slider 1
            </button>
            <button onclick="openTab(event, 'slider2')" class="group relative w-1/3 py-4 px-1 border-b-2 font-medium text-sm focus:outline-none focus:border-indigo-500">
                Slider 2
            </button>
            <button onclick="openTab(event, 'slider3')" class="group relative w-1/3 py-4 px-1 border-b-2 font-medium text-sm focus:outline-none focus:border-indigo-500">
                Slider 3
            </button>
        </nav>
    </div>

    <!-- Slide 1 -->
    <div id="slider1" class="hidden">
        <!-- Konten slider 1 -->
        <p>Konten slider 1</p>
    </div>

    <!-- Slide 2 -->
    <div id="slider2" class="hidden">
        <!-- Konten slider 2 -->
        <p>Konten slider 2</p>
    </div>

    <!-- Slide 3 -->
    <div id="slider3" class="hidden">
        <!-- Konten slider 3 -->
        <p>Konten slider 3</p>
    </div>
</div>

<script>
    document.getElementById("defaultOpen").click();

    function openTab(evt, tabName) {
        // Mengambil semua elemen dengan kelas "hidden" dan menyembunyikannya
        var tabs = document.getElementsByClassName("hidden");
        for (var i = 0; i < tabs.length; i++) {
            tabs[i].style.display = "none";
        }
        // Mengambil semua tombol tab dan menghapus kelas "active"
        var tabButtons = document.getElementsByTagName("button");
        for (var i = 0; i < tabButtons.length; i++) {
            tabButtons[i].className = tabButtons[i].className.replace(" border-b-2", "");
        }
        // Menampilkan tab yang dipilih dan menandai tombol tab sebagai aktif
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " border-b-2";
    }
</script>