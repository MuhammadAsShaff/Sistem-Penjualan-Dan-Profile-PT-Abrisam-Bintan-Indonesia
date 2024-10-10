<!-- Button to Open Modal -->
<button id="openModalButton" onclick="openModal('editProdukModal-{{ $produk->id_produk }}')"
  class="text-gray-500 transition-colors duration-200 dark:hover:text-blue-500 dark:text-gray-300 hover:text-blue-500 focus:outline-none">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
    class="w-5 h-5">
    <path stroke-linecap="round" stroke-linejoin="round"
      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
  </svg>
</button>

<!-- Modal -->
<dialog id="editProdukModal-{{ $produk->id_produk }}"
  class="modal rounded-lg shadow-lg w-full max-w-4xl overflow-hidden modal-hide"
  style="position: fixed; top: 0%; left: 0%; transform: translate(-50%, -50%);">
  <div class="relative bg-white rounded-lg shadow-lg p-6" id="modalContent">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg">
      <!-- Modal header -->
      <div class="flex items-start justify-between p-5 border-b border-gray-200 rounded-t mb-6">
        <h3 class="text-lg font-semibold text-gray-900">Edit Produk</h3>
        <button id="closeModalButton" type="button"
          class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center"
          onclick="closeModal('editProdukModal-{{ $produk->id_produk }}')">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>

      <!-- Modal body -->
      <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-6">
          <!-- Nama Produk -->
          <div class="col-span-1">
            <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" value="{{ $produk->nama_produk }}"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
              placeholder="Nama Produk" required>
          </div>

          <!-- Harga Produk -->
          <div class="col-span-1">
            <label for="harga_produk" class="block text-sm font-medium text-gray-700">Harga Produk</label>
            <input type="text" name="harga_produk" id="harga_produk"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
              placeholder="Harga Produk" value="{{ number_format($produk->harga_produk, 0, ',', '.') }}"
              oninput="formatCurrency(this)">
          </div>

          <!-- Benefit Dropdown -->
          <div class="col-span-1 relative">
            <label for="benefit" class="block text-sm font-medium text-gray-700">Aplikasi Streaming</label>

            <!-- Input field untuk menampilkan hasil pilihan -->
            <input type="text" id="selectedBenefitsUpdate-{{ $produk->id_produk }}" data-id="{{ $produk->id_produk }}" readonly
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer bg-white"
              placeholder="Pilih Benefit"
              value="{{ isset($produk->benefit) ? implode(', ', json_decode($produk->benefit, true)) : '' }}">

            <p class="mt-2 text-xs text-red-600 mb-[-20px]">* Biarkan kosong jika tidak ada Aplikasi Streaming.</p>

            <!-- Dropdown checkbox -->
            <div id="checkboxDropdownUpdate-{{ $produk->id_produk }}" class="absolute z-10 mt-1 w-full bg-white rounded-md shadow-lg hidden">
              <ul class="py-1 text-sm text-gray-700 max-h-48 overflow-y-auto">
                <li class="flex items-center px-4 py-2 hover:bg-gray-100">
                  <input id="disney-{{ $produk->id_produk }}" name="benefit[]" type="checkbox" value="Disney+"
                    class="mr-2 focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" 
                    {{ in_array('Disney+', json_decode($produk->benefit, true) ?? []) ? 'checked' : '' }}>
                  <label for="disney-{{ $produk->id_produk }}" class="cursor-pointer">Disney+</label>
                </li>
                <li class="flex items-center px-4 py-2 hover:bg-gray-100">
                  <input id="netflix-{{ $produk->id_produk }}" name="benefit[]" type="checkbox" value="Netflix"
                    class="mr-2 focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" 
                    {{ in_array('Netflix', json_decode($produk->benefit, true) ?? []) ? 'checked' : '' }}>
                  <label for="netflix-{{ $produk->id_produk }}" class="cursor-pointer">Netflix</label>
                </li>

                <!-- Amazon Prime Checkbox -->
                <li class="flex items-center px-4 py-2 hover:bg-gray-100">
                  <input id="amazon-{{ $produk->id_produk }}" name="benefit[]" type="checkbox" value="Amazon Prime"
                    class="mr-2 focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" 
                    {{ in_array('Amazon Prime', json_decode($produk->benefit, true) ?? []) ? 'checked' : '' }}>
                  <label for="amazon-{{ $produk->id_produk }}" class="cursor-pointer">Amazon Prime</label>
                </li>

                <!-- Hook Checkbox -->
                <li class="flex items-center px-4 py-2 hover:bg-gray-100">
                  <input id="hook-{{ $produk->id_produk }}" name="benefit[]" type="checkbox" value="Hook"
                    class="mr-2 focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"
                     {{ in_array('Hook', json_decode($produk->benefit, true) ?? []) ? 'checked' : '' }}>
                  <label for="hook-{{ $produk->id_produk }}" class="cursor-pointer">Hook</label>
                </li>

                <!-- HBO Max Checkbox -->
                <li class="flex items-center px-4 py-2 hover:bg-gray-100">
                  <input id="hbo-{{ $produk->id_produk }}" name="benefit[]" type="checkbox" value="HBO Max"
                    class="mr-2 focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" 
                    {{ in_array('HBO Max', json_decode($produk->benefit, true) ?? []) ? 'checked' : '' }}>
                  <label for="hbo-{{ $produk->id_produk }}" class="cursor-pointer">HBO Max</label>
                </li>
              </ul>
            </div>

          </div>

          <!-- Kecepatan Produk -->
          <div class="col-span-1">
            <label for="kecepatan" class="block text-sm font-medium text-gray-700">Kecepatan Produk (Mbps)</label>
            <input type="number" name="kecepatan" id="kecepatan"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
              placeholder="Kecepatan Produk" value="{{ $produk->kecepatan }}" required>
          </div>

          <!-- Kuota Produk -->
          <div class="col-span-1">
            <label for="kuota" class="block text-sm font-medium text-gray-700">Kuota Produk (GB)</label>
            <input type="number" name="kuota" id="kuota"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
              placeholder="Kuota Produk" value="{{ $produk->kuota }}">
            <p class="mt-2 text-xs text-red-600 mb-[-20px]">* Biarkan kosong jika tidak ada Kuota Unlimited.</p>
          </div>

          <!-- Biaya Pasang -->
          <div class="col-span-1">
            <label for="biaya_pasang" class="block text-sm font-medium text-gray-700">Biaya Pasang</label>
            <input type="text" name="biaya_pasang" id="biaya_pasang"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
              placeholder="Biaya Pasang" value="{{ number_format($produk->biaya_pasang, 0, ',', '.') }}"
              oninput="formatCurrency(this)">
            <p class="mt-2 text-xs text-red-600 mb-[-20px]">* Jika tidak ada biaya pasang, biarkan kosong.</p>
          </div>

          <!-- Kategori Produk -->
          <div class="col-span-1">
            <label for="id_kategori" class="block text-sm font-medium text-gray-700">Kategori Produk</label>
            <select name="id_kategori" id="id_kategori" required
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
              <option value="">Pilih Kategori</option>
              @foreach($kategoris as $kategori)
          <option value="{{ $kategori->id_kategori }}" {{ $produk->id_kategori == $kategori->id_kategori ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
        @endforeach
            </select>
          </div>

          <!-- Paket Produk -->
          <div class="col-span-1">
            <label for="id_paket" class="block text-sm font-medium text-gray-700">Paket Produk</label>
            <select name="id_paket" id="id_paket" required
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
              <option value="">Pilih Paket</option>
              @foreach($pakets as $paket)
          <option value="{{ $paket->id_paket }}" {{ $produk->id_paket == $paket->id_paket ? 'selected' : '' }}>
          {{ $paket->nama_paket }}
          </option>
        @endforeach
            </select>
          </div>

          <!-- Deskripsi Produk -->
          <div class="col-span-1">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Produk</label>
            <textarea name="deskripsi" id="deskripsi" required
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
              placeholder="Deskripsi Produk">{{ $produk->deskripsi }}</textarea>
          </div>

          <!-- Diskon Produk -->
          <div class="col-span-1">
            <label for="diskon" class="block text-sm font-medium text-gray-700">Diskon (%)</label>
            <input type="number" name="diskon" id="diskon" step="0.01"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
              placeholder="Diskon Produk" value="{{ $produk->diskon }}">
            <p class="mt-2 text-xs text-red-600 mb-[-20px]">* Jika tidak ada biaya pasang, biarkan kosong.</p>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="flex justify-end p-5 border-t border-gray-200 mt-10">
          <button type="submit"
            class="inline-flex justify-center px-5 py-2.5 text-sm font-medium text-white bg-red-500 border border-transparent rounded-lg shadow-sm hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-300">
            Simpan Perubahan
          </button>
        </div>
      </form>
    </div>
  </div>
</dialog>
<script>
 // Event listener for toggling the dropdown
  document.addEventListener('click', function (event) {
    const clickedElement = event.target;

    // Check if the clicked element is the benefit input field
    if (clickedElement.matches("[id^='selectedBenefitsUpdate']")) {
      event.stopPropagation();  // Prevent event from bubbling up
      const dropdownId = 'checkboxDropdownUpdate-' + clickedElement.getAttribute('data-id');
      const dropdown = document.getElementById(dropdownId);

      // Hide all dropdowns before showing the relevant one
      document.querySelectorAll("[id^='checkboxDropdownUpdate']").forEach(dropdown => {
        dropdown.classList.add('hidden');
      });

      // Show the correct dropdown
      if (dropdown) {
        dropdown.classList.toggle('hidden');
      }
    }

    // If the click is outside any dropdown/input, hide all dropdowns
    if (!clickedElement.matches("[id^='selectedBenefitsUpdate']") && !clickedElement.closest("[id^='checkboxDropdownUpdate']")) {
      document.querySelectorAll("[id^='checkboxDropdownUpdate']").forEach(dropdown => {
        dropdown.classList.add('hidden');
      });
    }
  });

  // Event listener for checkboxes inside dropdowns
  document.querySelectorAll("[id^='checkboxDropdownUpdate']").forEach(function (dropdown) {
    const checkboxes = dropdown.querySelectorAll("input[type='checkbox']");
    const dropdownId = dropdown.id.split('-')[1];  // Extract product ID from dropdown ID
    const inputField = document.getElementById('selectedBenefitsUpdate-' + dropdownId);

    // Update input field when checkbox state changes
    checkboxes.forEach(function (checkbox) {
      checkbox.addEventListener('change', function () {
        const selectedBenefits = Array.from(checkboxes)
          .filter(cb => cb.checked)
          .map(cb => cb.value);

        // Update the input field with the selected values
        inputField.value = selectedBenefits.join(', ');
      });
    });
  });

</script>